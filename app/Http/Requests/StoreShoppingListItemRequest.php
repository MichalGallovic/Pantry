<?php

namespace App\Http\Requests;

class StoreShoppingListItemRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required_without:grocery_id',
            'order' => 'required|integer',
            'completed' => 'required|boolean',
            'shopping_list_id' => 'required',
            'grocery_id' => 'required_without:name|integer'
        ];
    }
}
