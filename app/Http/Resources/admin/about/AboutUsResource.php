<?php

namespace App\Http\Resources\Admin\About;

use App\Models\Admin\About\AboutusFaq;
use App\Http\Resources\Admin\FaqResource;
use App\Models\Admin\About\AboutusContent;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $content = AboutusContent::all();
        $faqs = AboutusFaq::all();
        
        return [
            'id'                    => $this->id,
            'header_image'          => $this->header_image,
            'header_title_uz'       => $this->translate('uz')->header_title,
            'header_title_ru'       => $this->translate('ru')->header_title,
            'header_description_uz' => $this->translate('uz')->header_description,
            'header_description_ru' => $this->translate('ru')->header_description,
            'aboutus_content'       => AboutUsContentResource::collection($content),
            'aboutus_faqs'          => FaqResource::collection($faqs),
        ];
    }
}
