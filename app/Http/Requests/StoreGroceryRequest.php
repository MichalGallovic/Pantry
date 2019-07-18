<?php

namespace App\Http\Requests;

class StoreGroceryRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'expiration_days' => 'required|numeric',
            'after_open_days' => 'required|numeric',
            'price' => 'required|numeric',
            'shop_id' => 'required|numeric',
            'units' => 'required|numeric',
            'unit_type_id' => 'required|numeric'
        ];
    }
}
