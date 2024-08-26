<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoFilterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:25'],
            'weight_from' => ['nullable', 'numeric'],
            'weight_to' => ['nullable', 'numeric'],
            'distance_from' => ['nullable', 'numeric'],
            'distance_to' => ['nullable', 'numeric'],
            'price_from' => ['nullable', 'numeric'],
            'price_to' => ['nullable', 'numeric'],
            'payment_type' => ['nullable', 'string'],
            'body_type' => ['nullable', 'string'],
            'load_region' => ['nullable', 'numeric'],
            'load_region' => ['nullable', 'numeric'],
            'load_date_from' => ['nullable', 'date'],
            'load_date_to' => ['nullable', 'date'],
            'unload_region' => ['nullable', 'numeric'],
            'unload_region' => ['nullable', 'numeric'],
            'unload_date_from' => ['nullable', 'date'],
            'unload_date_to' => ['nullable', 'date'],
        ];
    }
}
