<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiputadosRequest extends FormRequest
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
            'Legislatura' => 'required|string|max:45',
            'NombreDl' => 'required|string|max:25',
            'ApellidoDl' => 'required|string|max:25',
            'Estatus' => 'required'
        ];
    }
}
