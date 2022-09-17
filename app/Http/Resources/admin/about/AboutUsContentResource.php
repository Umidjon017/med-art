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
            'id' => $this->id,
            'image' => $this->image,
            'title_uz' => $this->translate('uz')->title,
            'title_ru' => $this->translate('ru')->description,
            'description_uz' => $this->translate('uz')->title,
            'description_ru' => $this->translate('ru')->description,
        ];
    }
}
