<?php

namespace App\Http\Resources\Admin\Doctors;

use App\Models\Admin\Operation\Operation;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorInfosResource extends JsonResource
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
            'full_name_uz'      =>  $this->translate('uz')->full_name,
            'biography_uz'      =>  $this->translate('uz')->biography,
            'specification_uz'  =>  $this->translate('uz')->specification,
            'edu_bachelor_uz'   =>  $this->translate('uz')->edu_bachelor,
            'edu_master_uz'     =>  $this->translate('uz')->edu_master,
            'edu_phd_uz'        =>  $this->translate('uz')->edu_phd,
            'edu_asperanture_uz'=>  $this->translate('uz')->edu_asperanture,
            'edu_addition_uz'   =>  $this->translate('uz')->edu_addition,
            'full_name_ru'      =>  $this->translate('ru')->full_name,
            'biography_ru'      =>  $this->translate('ru')->biography,
            'specification_ru'  =>  $this->translate('ru')->specification,
            'edu_bachelor_ru'   =>  $this->translate('ru')->edu_bachelor,
            'edu_master_ru'     =>  $this->translate('ru')->edu_master,
            'edu_phd_ru'        =>  $this->translate('ru')->edu_phd,
            'edu_asperanture_ru'=>  $this->translate('ru')->edu_asperanture,
            'edu_addition_ru'   =>  $this->translate('ru')->edu_addition,
            'link_linkedin'     =>  $this->link_linkedin,
            'link_facebook'     =>  $this->link_facebook,
            'link_instagram'    =>  $this->link_instagram,
            'attended_operations'=> DoctorOperationsResource::collection($this->operations()->get()),
            'gethered_awards'   =>  AwardDoctorsResource::collection($this->awards()->get()),
        ];
    }
}
