<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmprestimoRequest extends FormRequest
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
            'usuario_id' => 'required|exists:usuarios,id',
            'livro_id' => 'required|exists:livros,id',
            'dt_limite_devolucao' => 'required|date'
        ];
    }

    public function messages(): array
    {
        return [
            'usuario_id.required' => 'Selecione um usuário',
            'usuario_id.exists' => 'O usuário selecionado não está cadastrado, recarregue a página e selecione um usuário válido',
            
            'livro_id.required' => 'Selecione um livro',
            'livro_id.exists' => 'O livro selecionado não está cadastrado, recarregue a página e selecione um livro válido',

            'dt_limite_devolucao.required' => 'Digite uma data de devolução',
            'dt_limite_devolucao.date' => 'Recarregue a página e digite uma data válida',
        ];
    }
}
