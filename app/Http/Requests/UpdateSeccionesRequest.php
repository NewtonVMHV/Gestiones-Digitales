<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeccionesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Secciones' => 'required|string|max:5',
            'Distrito' => 'required|string|max:50',
            'Municipio' => 'required|string|max:16',
            'Distritacion' => 'required|string|max:35'
        ];
    }
}
