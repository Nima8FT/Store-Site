<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        if ($this->isMethod("POST")) {
            return [
                'persian_name' => 'required',
                'original_name' => 'required',
                'logo' => 'required|image|mimes:jpg,png,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        } else {
            return [
                'persian_name' => 'required',
                'original_name' => 'required',
                'logo' => 'image|mimes:jpg,png,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }
    }
}
