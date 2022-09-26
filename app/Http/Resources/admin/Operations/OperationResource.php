<?php

namespace App\Http\Resources\Admin\Operations;

use App\Models\Admin\Operation\OperationImage;
use Illuminate\Http\Resources\Json\JsonResource;

class OperationResource extends JsonResource
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
            'operation_id'          =>  $this->id,
            'header_image'          =>  $this->header_image,
            'detail_image'          =>  OperationImageResource::collection($this->images()->get()),
            'date'                  =>  $this->date,
            'link_video'            =>  $this->link_video,
            'title_uz'              =>  $this->translate('uz')->title,
            'detail_description_uz' =>  $this->translate('uz')->detail_description,
            'full_description_uz'   =>  $this->translate('uz')->full_description,
            'title_ru'              =>  $this->translate('ru')->title,
            'detail_description_ru' =>  $this->translate('ru')->detail_description,
            'full_description_ru'   =>  $this->translate('ru')->full_description,
            'created_at'            =>  $this->created_at,
            'updated_at'            =>  $this->updated_at,
        ];
    }
}
