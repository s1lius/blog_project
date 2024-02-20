<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Имя пользователя должно быть строкой',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Email должен быть строкой',
            'email.email' => 'Поле не соответствует типу email',
            'email.unique' => 'Такой email уже существует',
        ];
    }
}
