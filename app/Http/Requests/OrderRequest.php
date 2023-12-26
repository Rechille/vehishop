<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'date' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'quantity' => 'numeric|required',
            'sales_total' => 'string|max:17|required|min:17',
            'payment_method' => 'string|max:255|required',
            'customerID' => 'required|integer',
            'branchID' => 'required|integer',
        ];
    }
}
