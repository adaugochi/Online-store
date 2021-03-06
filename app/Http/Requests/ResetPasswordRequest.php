<?php

namespace App\Http\Requests;


class ResetPasswordRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
