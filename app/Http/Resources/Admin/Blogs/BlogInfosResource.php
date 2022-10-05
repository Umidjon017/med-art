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
            'title_uz'          =>  $this->translate('uz')->title,
            'title_ru'          =>  $this->translate('ru')->title,
            'description_uz'    =>  $this->translate('uz')->description,
            'description_ru'    =>  $this->translate('ru')->description,
            'theme_uz'          =>  $this->translate('uz')->theme,
            'theme_ru'          =>  $this->translate('ru')->theme,
            'link_video'        =>  $this->link_video,
        ];
    }
}
