<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preparador;

class perfilController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preparador = new Preparador;
        $preparador->name = $request->Nombre_Preparador;
        $preparador->last_name = $request->Apellido_Preparador;
        $preparador->email = $request->Email;
        $preparador->rank = $request->Rango;
        $preparador->save();
        return redirect('/preparadores');
    }
}
