<?php

namespace App\Http\Resources\Admin\Sponsors;

use Illuminate\Http\Resources\Json\JsonResource;

class SponsorsResource extends JsonResource
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
            'sponsor_id'    =>  $this->id,
            'name'          =>  $this->name,
            'image'         =>  $this->image,
        ];
    }
}
