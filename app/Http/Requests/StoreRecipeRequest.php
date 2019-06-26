<?php

namespace App\Http\Requests;

class StoreRecipeRequest extends ApiRequest
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
            'servings' => 'required|numeric|min:1',
            'preparation_minutes' => 'required|numeric',
            'groceries' => 'required',
            'groceries.*.grocery_id' => 'required|numeric',
            'groceries.*.units' => 'required|numeric'
        ];
    }
}
