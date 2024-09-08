<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->type === 'admin';
    }

    public function rules(): array
    {
        return [
            'username' => 'required|min:3|max:20',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
            'type' => 'required|in:admin,client',
            // Add other fields as necessary
        ];
    }
}
