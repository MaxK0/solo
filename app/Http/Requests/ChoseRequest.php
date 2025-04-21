<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChoseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'start' => ['required', 'date', 'after_or_equal:today'],
            'price_id' => ['required', 'integer', 'exists:service_prices,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
