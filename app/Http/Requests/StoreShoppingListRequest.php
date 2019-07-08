<?php

namespace App\Http\Requests;

class StoreShoppingListRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:shopping_lists',
            'items' => 'required|array',
            'items.*.name' => 'required_without:items.*.grocery_id',
            'items.*.order' => 'required|numeric',
            'items.*.grocery_id' => 'required_without:items.*.name'
        ];
    }
}
