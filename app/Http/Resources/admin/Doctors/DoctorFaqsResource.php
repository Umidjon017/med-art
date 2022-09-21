<?php

namespace App\Http\Resources\Admin\Doctors;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorFaqsResource extends JsonResource
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
            'id'    =>  $this->id,
            'question_uz'   =>  $this->translate('uz')->question,
            'answer_uz'     =>  $this->translate('uz')->answer,
            'question_ru'   =>  $this->translate('ru')->question,
            'answer_ru'     =>  $this->translate('ru')->answer,
        ];
    }
}
