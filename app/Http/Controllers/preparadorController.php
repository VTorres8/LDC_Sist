<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preparador;
use Illuminate\Support\Facades\Auth;
class preparadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $preparadores = Preparador::all();
        if($user->esAdmin()){
            return view('preparadores.indexAdmin', compact("preparadores"));
        }

        return view('preparadores.indexUser', compact("preparadores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('preparadores.create', compact("user"));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preparador = Preparador::findOrFail($id);
        return view('preparadores.edit', compact("preparador"));
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
        //$validateData = $request->validated();

        $preparador = Preparador::findOrFail($id);
        $preparador->update($request->all());
        return redirect('/preparadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preparador = Preparador::findOrFail($id);
        $preparador->delete();
        return redirect('/preparadores');
    }
}
