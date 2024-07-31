<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
        if ($this->isMethod("post")) {
            return [
                'first_name' => 'required|max:120|min:1',
                'last_name' => 'required|min:1|max:120',
                'email' => 'required|email|string|unique:users',
                'mobile' => 'required|digits:11|unique:users',
                'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
                'profile_photo_path' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                'activation' => 'required|numeric|in:0,1',
                'status' => 'required|numeric|in:0,1',
            ];
        } else {
            return [
                'first_name' => 'required|max:120|min:1',
                'last_name' => 'required|min:1|max:120',
                'activation' => 'required|numeric|in:0,1',
                'status' => 'required|numeric|in:0,1',
                'profile_photo_path' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                'national_code' => 'nullable|digits:10|unique:users',
            ];
        }
    }
}
