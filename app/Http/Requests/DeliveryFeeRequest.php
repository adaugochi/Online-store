<?php

namespace App\Http\Requests;

class DeliveryFeeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country' => 'required',
            'amount' => 'required'
        ];
    }
}
