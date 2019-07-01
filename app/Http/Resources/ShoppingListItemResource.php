<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingListItemResource extends JsonResource
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
            'name' => $this->name,
            'order' => $this->order,
            'completed' => $this->completed,
            'grocery' => new GroceryResource($this->whenLoaded('grocery')),
            'shopping_list' => new ShoppingListResource($this->whenLoaded('shoppingList'))
        ];
    }
}
