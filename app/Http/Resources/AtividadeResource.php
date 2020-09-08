<?php

namespace App\Http\Resources;

use App\Atividade;
use Illuminate\Http\Resources\Json\JsonResource;

class AtividadeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'user_id' => $this->user_id,
            'tipo' => $this->tipo,
            'data_inicio' => $this->data_inicio,
            'data_prazo' => $this->data_prazo,
            'status' => $this->status,
            'data_conclusao' => $this->data_conclusao,
            'concluida' => $this->status === Atividade::STATUS_CONCLUIDA,
            'responsavel' => $this->responsavel->name,
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => 'https://github.com/gustavonovaes',
        ];
    }
}