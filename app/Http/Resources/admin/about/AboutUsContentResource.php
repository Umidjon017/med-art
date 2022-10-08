<?php

namespace App\Http\Resources\Admin\About;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'content_id'        => $this->id,
            'image'             => $this->image,
            'title_uz'          => $this->translate('uz')->title,
            'title_ru'          => $this->translate('ru')->title,
            'description_1_uz'  => $this->translate('uz')->description_1,
            'description_1_ru'  => $this->translate('ru')->description_1,
            'description_2_uz'  => $this->translate('uz')->description_2,
            'description_2_ru'  => $this->translate('ru')->description_2,
        ];
    }
}
