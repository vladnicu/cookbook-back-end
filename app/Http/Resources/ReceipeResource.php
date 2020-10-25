<?php

namespace App\Http\Resources;

use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Tag;
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'serves' => $this->serves,
            'difficulty' => $this->difficulty,
            'total_time' => $this->total_time,
            'user' => new UserResource($this->user),
            'ingredients' => IngredientResource::collection($this->ingredients),
            'steps' => StepResource::collection($this->steps),
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
