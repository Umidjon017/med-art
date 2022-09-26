<?php

namespace App\Http\Resources\Admin\Operations;

use Illuminate\Http\Resources\Json\JsonResource;

class OperationImageResource extends JsonResource
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
            'detail_image'  =>  $this->detail_image,
        ];
    }
}
