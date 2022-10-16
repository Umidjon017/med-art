<?php

namespace App\Http\Resources\Admin\Blogs;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogInfosResource extends JsonResource
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
            'blog_id'           =>  $this->id,
            'image'             =>  $this->image,
            'title_1_uz'        =>  $this->translate('uz')->title_1,
            'title_1_uz'        =>  $this->translate('uz')->title_1,
            'title_2_ru'        =>  $this->translate('ru')->title_2,
            'title_2_ru'        =>  $this->translate('ru')->title_2,
            'description_1_uz'  =>  $this->translate('uz')->description_1,
            'description_1_uz'  =>  $this->translate('uz')->description_1,
            'description_2_ru'  =>  $this->translate('ru')->description_2,
            'description_2_ru'  =>  $this->translate('ru')->description_2,
            'description_3_ru'  =>  $this->translate('ru')->description_3,
            'description_3_ru'  =>  $this->translate('ru')->description_3,
            'description_4_ru'  =>  $this->translate('ru')->description_4,
            'description_4_ru'  =>  $this->translate('ru')->description_4,
            'addition_select_uz'=>  $this->translate('uz')->addition_select,
            'addition_select_ru'=>  $this->translate('ru')->addition_select,
            'theme_uz'          =>  $this->translate('uz')->theme,
            'theme_ru'          =>  $this->translate('ru')->theme,
            'link_video'        =>  $this->link_video,
            'created_at'        =>  $this->created_at->format('d/m/y'),
            'updated_at'        =>  $this->updated_at->format('d/m/y'),
        ];
    }
}
