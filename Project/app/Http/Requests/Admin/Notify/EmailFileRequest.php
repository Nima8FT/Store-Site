<?php

namespace App\Http\Requests\Admin\Notify;

use Illuminate\Foundation\Http\FormRequest;

class EmailFileRequest extends FormRequest
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
                'file.*' => 'required|mimes:jpg,png,jpeg,gif,pdf,zip,txt,doc,docx',
                'status' => 'required|numeric|in:0,1',
            ];
        } else {
            return [
                'file.*' => 'mimes:jpg,png,jpeg,gif,pdf,zip',
                'status' => 'numeric|in:0,1',
            ];
        }
    }
}
