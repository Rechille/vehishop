<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules() : array
    {

        return [
                'lastname'               => 'required|string|max:255',
                'firstname'              => 'required|string|max:255',
                'middlename'             => 'string|max:255',
                'email'                  => 'required|string|email|unique:App\Models\User,email|max:255',
                'phone_number'           => 'required|digits_between:11,12|unique:App\Models\User,phone_number',
                'address'                => 'required|string|max:255',
                'password'               => 'required|min:8|confirmed',
                'role'                   => 'nullable|string',
        ];

    }
}
