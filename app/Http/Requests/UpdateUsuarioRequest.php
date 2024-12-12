<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
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
            'nome' => [
                'required',
                Rule::unique('usuarios')->ignore($this->usuario),
                'max:255'
            ],
            'email' => 'email'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é de preenchimento obrigatório',
            'nome.unique' => 'Já existe um usuário cadastrado com esse nome',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres',
            'email.email' => 'O email digitado não é válido'
        ];
    }
}
