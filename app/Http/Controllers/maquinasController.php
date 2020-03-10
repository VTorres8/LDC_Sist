<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;
use App\Maquina;
use App\Http\Requests\MaquinaRequest;
use Illuminate\Support\Facades\Auth;

class maquinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = Auth::user();
        $maquinas= Sala::find($id)->maquinas;
        if($user->esAdmin()){
            return view('maquinas.indexAdmin', compact("maquinas"),compact("id"));
        }
        return view('maquinas.indexUser', compact("maquinas"),compact("id"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */


    public function create($id)
    {
       return view('maquinas.create',compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaquinaRequest $request)
    {
        $validateData = $request->validated();
        $maquina = new Maquina;
        $maquina->ip=$request->ip;
        $maquina->sistema_operativo=$request->sistema_operativo;
        $maquina->ram=$request->ram;
        $maquina->disco_duro=$request->disco_duro;
        $maquina->programas=$request->programas;
        $maquina->sala_id=$request->sala_id;

        $maquina->save();
        //echo "/salas/{$maquina->sala_id}/maquinas";
        return redirect("/salas/{$maquina->sala_id}/maquinas");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$sala = Sala::find($id);
        $maquinas = $sala->maquinas();
        return view('maquinas.show',compact("maquinas"));*/
        echo "holis";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maquina = Maquina::findOrFail($id);
        return view('maquinas.edit', compact("maquina"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaquinaRequest $request, $id)
    {
        $validateData = $request->validated();
        $maquina = Maquina::findOrFail($id);
        $maquina->update($request->all());
        return redirect('/salas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $maquina = Maquina::findOrFail($id);
        $maquina->delete();
        return redirect('/salas');
    }

    /*public function get_maquinas($id)
    {

        $maquinas = Sala::find($id)->maquinas;
        return view('maquinas.sala_maquinas',compact("maquinas"),compact("id"));
    }*/
}
