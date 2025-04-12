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
        ];
    }

    protected function prepareforValidation()
    {
        if ($this->email == null) {
            $this->request->remove( key:'email');
        }
        if ($this->name == null) {
            $this->request->remove( key:'name');
        }
        if ($this->password == null) {
            $this->request->remove( key:'password');
        }
    }
}
