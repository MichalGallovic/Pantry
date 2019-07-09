<?php

namespace App\Http\Requests;

class UpdateShoppingListItemRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'completed' => 'nullable|boolean',
            'order' => 'nullable|numeric'
        ];
    }
}
