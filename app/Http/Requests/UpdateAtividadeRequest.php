<?php

namespace App\Http\Requests;

class UpdateAtividadeRequest extends AtividadeRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // FIXME:TODO: Checar se atividade pertence ao usuario logado
        return true;
    }
}