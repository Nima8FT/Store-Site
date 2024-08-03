<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class RoleRequest extends FormRequest
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
        $route = Route::currentRouteName();
        if ($route === 'user.role.store') {
            return [
                'name' => 'required|min:2|max:120',
                'description' => 'required|min:2|max:200',
                'permissions.*' => 'exists:permissions,id',
            ];
        } else if ($route === 'user.role.update') {
            return [
                'name' => 'required|min:2|max:120',
                'description' => 'required|min:2|max:200',
            ];
        } else if ($route === 'user.role.permission-update') {
            return [
                'permissions.*' => 'exists:permissions,id',
            ];
        }
    }
}
