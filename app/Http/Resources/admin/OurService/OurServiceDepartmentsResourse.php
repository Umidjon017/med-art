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
            'department_id'         =>  $this->id,
            'image'                 =>  $this->image,
            'icon'                  =>  $this->icon,
            'name_uz'               =>  $this->translate('uz')->name,
            'name_ru'               =>  $this->translate('ru')->name,
            'description_uz'        =>  $this->translate('uz')->description,
            'description_ru'        =>  $this->translate('ru')->description,
            'full_description_uz'   =>  $this->translate('uz')->full_description,
            'full_description_ru'   =>  $this->translate('ru')->full_description,
        ];
    }
}
