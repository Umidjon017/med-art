<?php

namespace App\Http\Resources\Admin\News;

use App\Models\Admin\News\NewsInfos;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $news_infos = NewsInfos::all();
        return [
            'id'                    => $this->id,
            'header_image'          => $this->header_image,
            'header_title_uz'       => $this->translate('uz')->header_title,
            'header_title_ru'       => $this->translate('ru')->header_title,
            'header_description_uz' => $this->translate('uz')->header_description,
            'header_description_ru' => $this->translate('ru')->header_description,
            'news_infos'            => NewsInfosResource::collection($news_infos),
        ];
    }
}
