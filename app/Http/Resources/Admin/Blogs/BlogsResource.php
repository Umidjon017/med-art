<?php

namespace App\Http\Resources\Admin\Blogs;

use App\Models\Admin\Blog\BlogInfo;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $blog_infos = BlogInfo::all();
        return [
            'id'                    => $this->id,
            'header_image'          => $this->header_image,
            'header_title_uz'       => $this->translate('uz')->header_title,
            'header_title_ru'       => $this->translate('ru')->header_title,
            'header_description_uz' => $this->translate('uz')->header_description,
            'header_description_ru' => $this->translate('ru')->header_description,
            'blog_infos'            => BlogInfosResource::collection($blog_infos),
        ];
    }
}
