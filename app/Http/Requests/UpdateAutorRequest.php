<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAutorRequest extends FormRequest
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
                Rule::unique('autores')->ignore($this->autor),
                'max:255']
        ];
    }


    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é de preenchimento obrigatório',
            'nome.unique' => 'Já existe outro autor cadastrado com esse nome',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres'
        ];
    }
}
