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
            'name' => 'required|unique:shopping_lists'
        ];
    }
}
