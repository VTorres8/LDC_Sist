<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    public function sala()
    {
        return $this->belongsTo('App\Sala');
    }

    protected $fillable = ["ip","sistema_operativo","ram","disco_duro","programas"];
}
