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
            'name' => 'required',
            'order' => 'required|integer',
            'completed' => 'required|boolean',
            'shopping_list_id' => 'required',
            'grocer_id' => 'nullable|integer'
        ];
    }
}
