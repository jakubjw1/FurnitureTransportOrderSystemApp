<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'payment_method' => 'required',
            'service_date' => 'required|date',
            'description' => 'required',
            'total_amount' => 'required|numeric',
            'from' => 'required',
            'destination' => 'required',
            'service_id' => 'required',
            'include_disassembly' => 'nullable',
            'disassembly_service_id' => 'required_if:include_disassembly,true|exists:services,id',
        ];
    }
}
