<?php

namespace App\Http\Resources\Admin\OurService;

use Illuminate\Http\Resources\Json\JsonResource;

class OurServiceDepartmentsResourse extends JsonResource
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
            'department_id'     =>  $this->id,
            'image'             =>  $this->image,
            'name_uz'           =>  $this->translate('uz')->name,
            'name_ru'           =>  $this->translate('ru')->name,
            'description_uz'    =>  $this->translate('uz')->description,
            'description_ru'    =>  $this->translate('ru')->description,
        ];
    }
}
