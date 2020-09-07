<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Http\Requests\ConcluiAtividadeRequest;
use App\Http\Requests\RemoveAtividadeRequest;
use App\Http\Requests\StoreAtividadeRequest;
use App\Http\Requests\UpdateAtividadeRequest;
use App\Http\Resources\AtividadeResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class AtividadeController extends Controller
{
    /**
     * Lista todas as atividades.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $atividades = Atividade::orderBy('created_at', 'desc')->paginate(10);

        return AtividadeResource::collection($atividades);
    }

    /**
     * Amazena uma atividade.
     *
     * @param  App\Http\Requests\StoreAtividadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAtividadeRequest $request): Response
    {
        // TODO: Validar intersecção de datas entre atividades

        // FIXME: $userId = $request->user()->id;
        $userId = 1;

        $atividade = Atividade::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'data_inicio' => $request->data_inicio,
            'data_prazo' => $request->data_prazo,
            'user_id' => $userId,
        ]);

        return \response(
            new AtividadeResource($atividade),
            Response::HTTP_CREATED
        );
    }

    /**
     * Atualiza uma atividade.
     *
     * @param  App\Http\Requests\UpdateAtividadeRequest  $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtividadeRequest $request, Atividade $atividade): Response
    {
        // TODO: Validar intersecção de datas entre atividades

        $atividade->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'data_inicio' => $request->data_inicio,
            'data_prazo' => $request->data_prazo,
        ]);

        return \response(new AtividadeResource($atividade), Response::HTTP_OK);
    }

    /**
     * Remove uma atividade.
     *
     * @param  App\Http\Requests\RemoveAtividadeRequest $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(RemoveAtividadeRequest $request, Atividade $atividade): Response
    {
        $atividade->delete();

        return \response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Marca atividade como concluída.
     *
     * @param  App\Http\Requests\ConcluiAtividadeRequest $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function conclui(ConcluiAtividadeRequest $request, Atividade $atividade): Response
    {
        $atividade->update([
            'data_conclusao' => \now(),
        ]);

        return \response(new AtividadeResource($atividade), Response::HTTP_OK);
    }
}
