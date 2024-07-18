<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable'],
            'type' => ['nullable', Rule::in(['B', 'I', 'b', 'i'])],
            'email' => ['nullable', 'email'],
            'address' => ['nullable'],
            'city' => ['nullable'],
            'postalCode' => ['nullable']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'postal_code' => $this->postalCode
        ]);
    }
}
