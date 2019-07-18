<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroceryResource extends JsonResource
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
            'expiration_days' => $this->expiration_days,
            'after_open_days' => $this->after_open_days,
            'price' => $this->price,
            'units' => $this->units,
            'unit_type_id' => $this->unit_type_id,
            'unit_type' => new UnitTypeResource($this->whenLoaded('unitType')),
            'shop_id' => $this->shop_id,
            'shop' => new ShopResource($this->whenLoaded('shop'))
        ];
    }
}
