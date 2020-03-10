<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preparador extends Model
{
    protected $fillable = ["name","last_name","email","rank"];
}
