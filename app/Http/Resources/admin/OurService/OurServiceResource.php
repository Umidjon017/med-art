<?php

namespace App\Http\Resources\Admin\OurService;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'id' => $this->id,
            'header_image' => $this->header_image,
        ];
    }
}
