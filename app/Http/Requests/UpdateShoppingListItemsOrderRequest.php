<?php

namespace App\Http\Requests;

class UpdateShoppingListItemsOrderRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.id' => 'required|integer',
            '*.order' => 'required|integer'
        ];
    }
}
