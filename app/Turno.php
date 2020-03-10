<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    public function rsvsalas()
    {
        return $this->belongsToMany('App\RsvSala','rsvsala_turno')->withPivot('semana','dia','tipo');
    }
}
