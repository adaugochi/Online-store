<?php

namespace App\Http\Requests;

class BillingRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => "required",
            'phone_number' => "required",
            'first_name' => "required",
            'last_name' => "required",
            'state' => "required",
            'country' => "required",
            'address' => "required",
            'city' => "required",
            'payment_method' => "required",
            'total_amount' => "required"
        ];
    }
}
