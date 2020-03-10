<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RsvMaquina extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function maquina()
    {
        return $this->belongsTo('App\maquina');
    }
    public function turnos()
    {
        return $this->belongsToMany('App\Turno','rsvmaquina_turno')->withPivot('semana','dia');
    }
}
