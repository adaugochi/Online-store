<?php

namespace App\Http\Requests;

class CouponRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'coupon_code' => 'required',
            'coupon_type' => 'required',
            'amount'      => 'required'
        ];
    }
}
