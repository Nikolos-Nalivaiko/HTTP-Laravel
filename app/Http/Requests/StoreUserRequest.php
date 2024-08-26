<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:4', 'max:20', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:4', 'max:20'],
            'login' => ['required', 'string', 'min:4', 'max:20', 'not_regex:/[!@#$%^&*()_\-+=.,\[\]{}\\|\/<>`~?*:;]/'],
            'name' => ['required', 'string', 'min:4', 'max:20', 'not_regex:/[!@#$%^&*()_\-+=.,\[\]{}\\|\/<>`~?*:;]/'],
            'middleName' => ['required', 'string', 'min:2', 'max:20', 'not_regex:/[!@#$%^&*()_\\-+=.,\[\]{}\\|\/<>`~?*:;]/'],
            'lastName' => ['required', 'string', 'min:2', 'max:20', 'not_regex:/[!@#$%^&*()_\\-+=.,\[\]{}\\|\/<>`~?*:;]/'],
            'region_id' => ['required', 'numeric'],
            'city_id' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'unique:users,phone'],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];

    }
}
