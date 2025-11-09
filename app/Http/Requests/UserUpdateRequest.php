<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function Laravel\Prompts\password;

class UserUpdateRequest extends FormRequest
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
            'name' => 'sometimes',
            'email' => 'sometimes',
            'password' => 'sometimes',
            'unit_id' => 'sometimes|numeric'
        ];
    }

    protected function prepareForValidation()
    {
        $data = $this->all();

        foreach (['email', 'name', 'password', 'unit_id'] as $field) {
            if (empty($data[$field])) {
                unset($data[$field]);
            }
        }

        $this->replace($data);
    }
}
