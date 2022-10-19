<?php

namespace App\Http\Resources\Admin\Doctors;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorInfosForOthersResource extends JsonResource
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
            'doctor_id'         =>  $this->id,
            'image'             =>  $this->image,
            'card_image'        =>  $this->card_image,
            'full_name_uz'      =>  $this->translate('uz')->full_name,
            'full_name_ru'      =>  $this->translate('ru')->full_name,
        ];
    }
}
