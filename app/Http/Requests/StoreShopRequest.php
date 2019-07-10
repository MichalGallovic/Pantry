<?php

namespace App\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;

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
            'name' => [
                'required',
                Rule::unique('shops', 'name')->where(function (Builder $query) {
                    $query->whereNull('deleted_at');
                })
            ]
        ];
    }
}
