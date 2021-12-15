<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'quantity' => 'required',
            'unit_price' => 'required',
            'description' => 'required',
            'size' => 'required',
            //'image' => 'required',
            'category_id' => 'required'
        ];
    }
}
