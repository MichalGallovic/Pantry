<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShoppingListItemsRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'items' => 'required|array',
            'items.*.name' => 'required_without:items.*.grocery_id',
            'items.*.order' => 'required|numeric',
            'items.*.grocery_id' => 'required_without:items.*.name|exists:groceries,id'
        ];
    }
}
