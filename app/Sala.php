<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = ["Nombre_Sala","numero_maquinas"];

    public function maquinas()
    {
        return $this->hasMany('App\Maquina');
    }

    public function reservas()
    {
        return $this->hasMany('App\Reserva');
    }


}
