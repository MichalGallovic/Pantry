<?php

namespace App\Http\Requests;

class StoreShopRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:shops'
        ];
    }
}
