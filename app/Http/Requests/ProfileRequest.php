<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends BaseRequest
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
            'country'               => ['required', 'string',],
            'state'                 => ['required', 'string'],
            'city'                  => ['required'],
            'street_address'        => ['required', 'string'],
        ];
    }
}
