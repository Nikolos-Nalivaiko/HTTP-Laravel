<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:20', 'not_regex:/[!@#$%^&*()_\-+=.,\[\]{}\\|\/<>`~?*:;]/'],
            'weight' => ['required', 'numeric'],
            'body' => ['required', 'string'],
            'distance' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'pay_method' => ['required', 'string'],
            'load_region_id' => ['required', 'numeric'],
            'load_city_id' => ['required', 'numeric'],
            'load_date' => ['required', 'date'],
            'unload_region_id' => ['required', 'numeric'],
            'unload_city_id' => ['required', 'numeric'],
            'unload_date' => ['required', 'date'],
            'description' => ['nullable', 'string', 'min:2']
        ];
    }
}
