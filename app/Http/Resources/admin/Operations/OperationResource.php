<?php

namespace App\Http\Resources\Admin\Operations;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Doctors\DoctorInfosForOthersResource;

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
            'header_title_uz'       =>  $this->translate('uz')->header_title,
            'header_title_ru'       =>  $this->translate('ru')->header_title,
            'header_description_uz' =>  $this->translate('uz')->header_description,
            'header_description_ru' =>  $this->translate('ru')->header_description,
            'detail_image'          =>  OperationImageResource::collection($this->images()->get()),
            'date'                  =>  $this->date,
            'link_video'            =>  $this->link_video,
            'title_uz'              =>  $this->translate('uz')->title,
            'title_ru'              =>  $this->translate('ru')->title,
            'detail_description_uz' =>  $this->translate('uz')->detail_description,
            'detail_description_ru' =>  $this->translate('ru')->detail_description,
            'full_description_uz'   =>  $this->translate('uz')->full_description,
            'full_description_ru'   =>  $this->translate('ru')->full_description,
            'attended_doctors'      =>  DoctorInfosForOthersResource::collection($this->doctors()->get()),
        ];
    }
}
