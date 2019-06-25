<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitTypeResource extends JsonResource
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
            'shorthand' => $this->shorthand,
            'category' => $this->category,
            'groceries' => GroceryResource::collection($this->whenLoaded('groceries'))
        ];
    }
}
