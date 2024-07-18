<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UpdateInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customerId' => ['nullable'],
            'amount' => ['nullable', 'numeric', 'between:10000,100000000'],
            'status' => ['nullable', Rule::in(['B', 'V', 'P', 'b', 'v', 'p'])],
            'billedDate' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'paidDate' => ['nullable', 'date_format:Y-m-d H:i:s']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'customer_id' => $this->customerId,
            'billed_date' => $this->billedDate,
            'paid_date' => $this->paidDate
        ]);
    }
}
