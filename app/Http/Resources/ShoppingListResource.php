<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $definition = [
            'id' => $this->id,
            'name' => $this->name,
            'items' => ShoppingListItemResource::collection($this->whenLoaded('items'))
        ];

        if ($this->items_count) {
            $definition['items_count'] = $this->items_count;
        }

        return $definition;
    }
}
