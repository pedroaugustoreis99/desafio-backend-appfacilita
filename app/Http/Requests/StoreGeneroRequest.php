<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGeneroRequest extends FormRequest
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
            'genero' => 'required|unique:generos|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'genero.required' => 'O campo gênero é de preenchimento obrigatório',
            'genero.unique' => 'Já existe um gênero cadastrado com esse nome',
            'genero.max' => 'O campo gênero deve ter no máximo 255 caracteres'
        ];
    }
}