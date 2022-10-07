<?php

namespace App\Http\Resources\Admin\News;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsInfosResource extends JsonResource
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
            'news_id'           =>  $this->id,
            'image'             =>  $this->image,
            'title_uz'          =>  $this->translate('uz')->title,
            'title_ru'          =>  $this->translate('ru')->title,
            'description_uz'    =>  $this->translate('uz')->full_description,
            'description_ru'    =>  $this->translate('ru')->full_description,
            'popularity'        =>  $this->popularity,
        ];
    }
}
