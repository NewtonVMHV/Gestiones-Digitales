<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImagnesRequest extends FormRequest
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
            'Curp' => 'required|string|max:18',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Fotografia' => 'required|image|mimes:jpeg,png',
            'Inef' => 'required|image|mimes:jpeg,png',
            'Inea' => 'required|image|mimes:jpeg,png',
            'Domicilio' => 'required|string|max:150'
        ];
    }
}
