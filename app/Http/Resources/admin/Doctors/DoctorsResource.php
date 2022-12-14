<?php

namespace App\Http\Resources\Admin\Doctors;

use App\Models\Admin\Doctor\DoctorFaq;
use App\Models\Admin\Doctor\DoctorInfo;
use App\Http\Resources\Admin\FaqResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $doctor_infos = DoctorInfo::all();
        $doctor_faqs = DoctorFaq::all();
        return [
            'id'                    => $this->id,
            'header_image'          => $this->header_image,
            'header_title_uz'       => $this->translate('uz')->header_title,
            'header_title_ru'       => $this->translate('ru')->header_title,
            'header_description_uz' => $this->translate('uz')->header_description,
            'header_description_ru' => $this->translate('ru')->header_description,
            'doctor_infos'          => DoctorInfosResource::collection($doctor_infos),
            'doctor_faqs'           => FaqResource::collection($doctor_faqs),
        ];
    }
}
