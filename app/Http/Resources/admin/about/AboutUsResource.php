<?php

namespace App\Http\Resources\Admin\About;

use App\Models\Admin\About\AboutusContent;
use App\Models\Admin\About\AboutusFaq;
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
            'id' => $this->id,
            'header_image' => $this->header_image,
            'aboutus_content' => AboutUsContentResource::collection($content),
            'aboutus_faqs' => AboutUsFaqResource::collection($faqs),
        ];
    }
}
