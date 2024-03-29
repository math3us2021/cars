<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'marca' => 'required|string|max:100|min:3',
            'modelo' => 'required|string|max:100|min:3',
            'cor' => 'required|string|max:100|min:3',
            'ano' => 'required|string|max:100|min:3',
            'placa' => 'required|string|max:100|min:3',
            'chassi' => 'required|string|max:100|min:3',
            'renavam' => 'required|string|max:100|min:3',
            'valor' => 'required|string|max:100|min:3',
            'type' => 'required|string|max:100|min:3',
            'user_id' => '',
            'cover' => '',
            'state' => 'boolean',
        ];
    }
    public function messages()
    {
        return [
            'body.required' => 'Campos obrigatórios não preenchidos',
        ];
    }
}
