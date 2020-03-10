<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RsvSala extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sala()
    {
        return $this->belongsTo('App\Sala');
    }

    public function turnos()
    {
        return $this->belongsToMany('App\Turno','rsvsala_turno')->withPivot('semana','dia','tipo');
    }
}
