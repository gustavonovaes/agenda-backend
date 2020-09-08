<?php

namespace App\Http\Requests;

use App\Atividade;
use Illuminate\Foundation\Http\FormRequest;

class AtividadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => ['required', 'max:255'],
            'descricao' => ['nullable', 'max:2048'],
            'tipo' => ['required', 'max:255'],
            'user_id' => ['bail', 'required', 'not_in:0', 'exists:users,id'],
            'data_inicio' => ['bail', 'required', 'date', 'not_weekend'],
            'data_prazo' => ['bail', 'nullable', 'date', 'not_weekend', 'after_or_equal:data_inicio'],
            'status' => ['required', "in:" . implode(',', [Atividade::STATUS_ABERTA, Atividade::STATUS_CONCLUIDA])]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo.required' => 'Campo "título" é obrigatório',
            'titulo.max' => 'Título muito grande, tente um menor',
            'descricao.max' => 'Descrição muito grande, tente uma menor',
            'tipo.required' => 'Campo "tipo" é obrigatório',
            'tipo.max' => 'Tipo muito grande, tente um menor',
            'user_id.required' => 'Campo "responsável" é um campo obrigatório',
            'user_id.not_in' => 'Campo "responsável" é um campo obrigatório',
            'user_id.exists' => 'Responsável selecionado não é um usuário válido',
            'data_inicio.required' => 'Campo "data inicio" é obrigatório',
            'data_inicio.date' => 'Campo "data inicio" contém um formato de data inválido',
            'data_inicio.not_weekend' => 'Campo "data inicio" deve ser um dia útil',
            'data_prazo.date' => 'Campo "data prazo" contém um formato de data inválido',
            'data_prazo.not_weekend' => 'Campo "data prazo" deve ser um dia útil',
            'data_prazo.after_or_equal' => 'Campo "data prazo" deve ser igual ou maior que "data inicio"',
            'status.required' => 'Campo "status" é obrigatório',
            'status.in' => 'Campo "status" deve ser uma das seguintes opções: ' . implode(', ', [Atividade::STATUS_ABERTA, Atividade::STATUS_CONCLUIDA]),
        ];
    }
}