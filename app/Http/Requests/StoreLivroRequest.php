<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivroRequest extends FormRequest
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
            'titulo' => 'required|unique:livros|max:255',
            'numero_registro' => 'required|unique:livros|max:255',
            'autor_id' => 'required|exists:autores,id',
            'generos' => 'required|array|min:1',
            'generos.*' => 'exists:generos,id'
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O título é um campo de preenchimento obrigatório',
            'titulo.unique' => 'Já existe um livro cadastrado com esse título',
            'titulo.max' => 'O título deve ter no máximo 255 caracteres',

            'numero_registro.required' => 'O número de registro é um campo de preenchimento obrigatório',
            'numero_registro.unique' => 'Já existe um livro cadastrado com esse número de registro',
            'numero_registro.max' => 'O número de registro deve ter no máximo 255 caracteres',

            'autor_id.required' => 'Você deve selecionar o autor desse livro',
            'autor_id.exists' => 'O autor selecionado não está cadastrado, recarregue a página e selecione um autor disponível',

            'generos.required' => 'Você deve selecionar um ou mais gêneros',
            'generos.array' => 'Recarregue a página e selecione pelo menos 1 gênero',
            'generos.min' => 'Você deve selecionar pelo menos um gênero',
        ];
    }
}