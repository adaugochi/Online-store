<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255'],
            'phone_number'          => ['required'],
            'international_number'  => ['required'],
            'quantity'              => ['required', 'string'],
            'item_name'             => ['required', 'string']
        ];
    }
}
