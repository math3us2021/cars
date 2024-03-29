<?php

    namespace App\Http\Requests;

    use Illuminate\Contracts\Validation\ValidationRule;
    use Illuminate\Foundation\Http\FormRequest;

    class StoreCarRequest extends FormRequest
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
         * @return array<string, ValidationRule|array|string>
         */
        public function rules(): array
        {
            return [
                'marca' => 'required|string|max:100|min:3',
                'modelo' => 'required|string|max:100|min:3',
                'cor' => 'required|string|max:100|min:3',
                'ano' => 'required|string|max:100|min:3',
                'placa' => 'required|string|max:100|min:3',
                'chassi' => 'required',
                'renavam' => 'required|string|max:100|min:3',
                'valor' => 'required',
                'type' => 'required',
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



