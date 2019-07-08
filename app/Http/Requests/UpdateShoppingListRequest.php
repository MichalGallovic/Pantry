<?php

namespace App\Http\Requests;

class UpdateShoppingListRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:shopping_lists'
        ];
    }
}
