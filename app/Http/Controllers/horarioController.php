<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use Illuminate\Support\Facades\Auth;

class horarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $horarios = Horario::all();
        $dias = ["Martes", "Miercoles", "Jueves", "Viernes"];
        $highest = $horarios->where('dia', "Lunes")->count();
        foreach ($dias as $dia) {
            if ($highest < $horarios->where('dia', $dia)->count()) {
                $highest = $horarios->where('dia', $dia)->count();
            }
        }
        if($user->esAdmin()){
            return view('horarios.indexAdmin', compact("horarios"), compact("highest"));
        }
        
        return view('horarios.indexUser', compact("horarios"), compact("highest"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('horarios.create', compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horario = new Horario;
        $horario->preparador=$request->preparador;
        $horario->dia=$request->dia;
        $horario->hora=$request->hora;

        $horario->save();
        return redirect('/horarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $horario = Horario::findOrFail($id);

        if ($user->esAdmin()) {
            return view('horarios.showAdmin', compact("horario"));
        }
        
        return view('horarios.showUser', compact("horario"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        return view('horarios.edit', compact("horario"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->update($request->all());
        return redirect('/horarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Horario::findOrFail($id);
        $sala->delete();
        return redirect('/horarios');
    }
}
