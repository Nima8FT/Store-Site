<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => 'required|min:2|max:120',
            'description' => 'required|min:2|max:500',
            'keywords' => 'required|min:2|max:120',
            'logo' => 'image|mimes:jpg,png,jpeg,gif',
            'icon' => 'image|mimes:jpg,png,jpeg,gif',
        ];
    }
}
