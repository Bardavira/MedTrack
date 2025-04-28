<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbsWingUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'description' => 'required|max:255',
        ];
    }
}