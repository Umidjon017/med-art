<?php

namespace App\Http\Resources\Admin\Doctors;

use Illuminate\Http\Resources\Json\JsonResource;

class AwardDoctorsResource extends JsonResource
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
            'award_id'    =>  $this->id,
            'title'       =>  $this->title,
            'description' =>  $this->description,
            'image'       =>  $this->image,
        ];
    }
}
