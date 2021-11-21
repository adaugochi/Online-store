<?php

namespace App\Http\Requests;

class UserRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'            => ['required', 'string', 'max:255'],
            'last_name'             => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'          => ['required', 'unique:users'],
            'international_number'  => ['required', 'unique:users'],
            'password'              => ['required', 'string', 'min:8'],
        ];
    }
}
