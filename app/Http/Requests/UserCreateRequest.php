<?php

namespace App\Http\Requests;

use Doctrine\Inflector\Rules\Pattern;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'email' => 'required|max:130',
            'name' => 'required|max:130',
            'password' => 'required|max:255'
        ];
    }

    public function messages(): array
{
    return [
        'email.required' => 'Um email é obrigatório',
        'name.required' => 'Um nome é obrigatório',
        'password.required' => 'Uma senha é obrigatória',
    ];
}
}
