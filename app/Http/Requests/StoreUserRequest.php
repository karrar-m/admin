<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users',
            'phone'      => 'required|string|unique:users',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|string|min:6',
            'role'       => 'nullable|string|max:50',
        ];
    }
}