<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'serves' => $this->serves,
            'difficulty' => $this->difficulty,
            'prep_time' => $this->prep_time,
            'cook_time' => $this->cook_time,
            'user' => $this->user,
        ];
    }
}
