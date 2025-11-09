<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbsUnitUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'sometimes|string',
            'wing_id' => 'sometimes|numeric',
        ];
    }

    protected function prepareForValidation()
    {
        $data = $this->all();

        foreach (['description', 'wing_id'] as $field) {
            if (empty($data[$field])) {
                unset($data[$field]);
            }
        }

        $this->replace($data);
    }
}