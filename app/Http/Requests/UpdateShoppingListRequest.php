<?php

namespace App\Http\Requests;

class UpdateShoppingListRequest extends ApiRequest
{
    public function rules()
    {
        $ignoreId = $this->get('id');

        return [
            'name' => "required|unique:shopping_lists,id,{$ignoreId}"
        ];
    }
}
