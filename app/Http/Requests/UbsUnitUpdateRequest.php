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
            'description' => 'sometimes',
            'wing_id' => 'sometimes|numeric',
        ];
    }
    protected function prepareforValidation()
    {
        if ($this->description == null) {
            $this->request->remove( key:'description');
        }
        if ($this->wing_id == null) {
            $this->request->remove( key:'wing_id');
        }
    }
}