<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'payment_method' => 'sometimes|required',
            'service_date' => 'sometimes|required',
            'description' => 'sometimes|required',
            'total_amount' => 'sometimes|required',
            'from' => 'sometimes|required',
            'destination' => 'sometimes|required',
            'service_id' => 'sometimes|required|array',
            'service_id.*' => 'exists:services,id',
            'disassembly_service_id' => 'nullable|exists:services,id',
            'disassembly_service_id.*' => 'exists:services,id',
            'order_status' => 'sometimes|required|in:Pending,Paid,In progress,Done,Cancelled',
        ];
    }
}
