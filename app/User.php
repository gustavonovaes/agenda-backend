<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function atividades()
    {
        return $this->hasMany(Atividade::class);
    }

    public function atividadesPendentesInterseccaoDatas(string $dataInicio, ?string $dataPrazo)
    {
        if (\is_null($dataPrazo)) {
            $dataPrazo = $dataInicio;
        }

        return $this->atividades()
            ->where('status', Atividade::STATUS_ABERTA)
            ->whereRaw("(
                '{$dataInicio}' between data_inicio and ifnull(data_prazo,data_inicio)
                or data_inicio between '{$dataInicio}' and '{$dataPrazo}'
                or ifnull(data_prazo,data_inicio) between '{$dataInicio}' and '{$dataPrazo}'
            )")
            ->orderBy('created_at', 'desc')
            ->get();
    }
}