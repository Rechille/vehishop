<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lastname' => 'required|max:255|string',
            'firstname'=> 'required|max:255|string',
            'middlename'=> 'max:255|string',
            'phone_number'=> 'required|max:12|numeric|min:11',
            'address'=> 'required|max:255|string',
            'email'=> 'required|string|unique',
            'password' => 'required|string|max:12|min:12',
        ];
    }
}
