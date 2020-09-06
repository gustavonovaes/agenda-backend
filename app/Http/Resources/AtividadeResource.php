<?php

namespace App\Http\Resources;

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
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'data_inicio' => $this->data_inicio,
            'data_prazo' => $this->data_inicio,
            'data_conclusao' => $this->data_inicio,
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