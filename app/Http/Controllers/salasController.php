<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;
use App\Maquina;
use App\Http\Requests\MyRequest;
use Illuminate\Support\Facades\Auth;

class salasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $salas= Sala::all();
        if($user->esAdmin()){
            return view('salas.indexAdmin', compact("salas"));
        }
        
        return view('salas.indexUser', compact("salas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view("salas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MyRequest $request)
    {

        $validateData = $request->validated();
        $sala = new Sala;
        $sala->Nombre_Sala=$request->Nombre_Sala;
        $sala->numero_maquinas=$request->numero_maquinas;

        $sala->save();
        return redirect('/salas');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "holi";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = Sala::findOrFail($id);
        return view('salas.edit', compact("sala"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MyRequest $request, $id)
    {
        $validateData = $request->validated();
        $sala = Sala::findOrFail($id);
        $sala->update($request->all());
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
        //
    }

    /*public function get_maquinas($id)
    {

        $maquinas = Sala::find($id)->maquinas;
        return view('maquinas_sala',compact("maquinas"),compact("id"));
    }
    */
}
