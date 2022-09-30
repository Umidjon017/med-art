<?php

namespace App\Http\Resources\Admin\OurService;

use App\Http\Resources\Admin\FaqResource;
use App\Models\Admin\OurService\OurServiceFaq;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Admin\OurService\OurServiceDepartment;

class OurServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $departments = OurServiceDepartment::all();
        $faqs = OurServiceFaq::all();

        return [
            'id' => $this->id,
            'header_image' => $this->header_image,
            'our_service_departments' => OurServiceDepartmentsResourse::collection($departments),
            'our_service_faqs'  =>  FaqResource::collection($faqs),
            'created_at'    =>  $this->created_at,
            'updated_at'    =>  $this->updated_at,
        ];
    }
}
