<?php

namespace App\Http\Resources;

use App\Models\AboutusContent;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $content = AboutusContent::all();
        return [
            'id' => $this->id,
            'header_image' => $this->header_image,
            'aboutus_content' => AboutUsContentResource::collection($content),
        ];
    }
}
