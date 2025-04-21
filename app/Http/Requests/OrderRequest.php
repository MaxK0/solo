<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'service_id' => ['required', 'exists:services'],
            'user_id' => ['required', 'exists:users'],
            'employee_id' => ['nullable', 'exists:employees'],
            'status' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
