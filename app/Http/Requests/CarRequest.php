<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'manufacturer' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'numeric|required',
            'vin' => 'string|max:17|required|min:17',
            'description' => 'string|max:255|required',
            'imageURL' => 'required|string',
            'branchID' => 'required|integer',
        ];
    }
}
