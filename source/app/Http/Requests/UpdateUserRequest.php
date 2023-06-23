<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('userId');

        return [
            'name' => [
                'sometimes',
                'required',
                'string',
                Rule::unique('users')->ignore($userId),
                'max:255',
            ],
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('users')->ignore($userId),
                'max:255',
            ],
            'password' => 'sometimes|required|string|min:8',
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'company_name' => 'sometimes|nullable|string|max:255',
            'tax_id' => [
                'sometimes',
                'required',
                'numeric',
                'digits:10',
                Rule::unique('users')->ignore($userId),
            ],
            'role' => 'sometimes|required|in:user,admin',
        ];
    }
}
