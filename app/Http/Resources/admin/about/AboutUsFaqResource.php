<?php

namespace App\Http\Resources\Admin\About;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsFaqResource extends JsonResource
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
            'question_uz' => $this->translate('uz')->question,
            'question_ru' => $this->translate('ru')->question,
            'answer_uz' => $this->translate('uz')->answer,
            'answer_ru' => $this->translate('ru')->answer,
        ];
    }
}
