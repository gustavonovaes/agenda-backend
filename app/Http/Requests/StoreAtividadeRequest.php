<?php

namespace App\Http\Requests;

class StoreAtividadeRequest extends AtividadeRequest
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
}