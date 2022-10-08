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
            'news_id'               =>  $this->id,
            'image'                 =>  $this->image,
            'title_uz'              =>  $this->translate('uz')->title,
            'title_ru'              =>  $this->translate('ru')->title,
            'full_description_uz'   =>  $this->translate('uz')->full_description,
            'full_description_ru'   =>  $this->translate('ru')->full_description,
            'description_1_uz'      =>  $this->translate('uz')->description_1,
            'description_1_ru'      =>  $this->translate('ru')->description_1,
            'description_2_uz'      =>  $this->translate('uz')->description_2,
            'description_2_ru'      =>  $this->translate('ru')->description_2,
            'popularity'            =>  $this->popularity == 1 ? 'Ha' : 'Yo`q',
        ];
    }
}
