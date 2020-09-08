<?php

namespace App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    const STATUS_ABERTA = 'aberta';
    const STATUS_CONCLUIDA = 'concluida';

    use Uuid;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
