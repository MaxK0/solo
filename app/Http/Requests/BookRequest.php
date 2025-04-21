<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
