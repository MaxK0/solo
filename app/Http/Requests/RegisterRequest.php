<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'confirmed', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
