<?php

namespace App\Http\Controllers;
use App\Sala;
use App\User;
use App\Maquina;
use App\RsvMaquina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reservaMaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "holi";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas = Sala::all();
        return view('reservaMaquinas.create',compact("salas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $reserva = new RsvMaquina;
        $reserva->user_id = $user->id;
        $reserva->maquina_id = $request->maquina_id;
        $reserva->status = "Pendiente";
        $reserva->save();
        $reserva->turnos()->attach($request->hora1,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora2,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora3,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora4,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora5,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora6,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora7,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora8,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora9,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora10,['semana'=>$request->semana,'dia'=>$request->dia]);
        $reserva->turnos()->attach($request->hora11,['semana'=>$request->semana,'dia'=>$request->dia]);
        return redirect('reservas');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = RsvMaquina::findOrFail($id);
        $reserva->turnos()->detach();
        $reserva->delete();
        return redirect('/reservas');
    }
    public function solicitudMaquina($id)
    {
        $sala = Sala::findOrFail($id);
        $maquinas = $sala->maquinas;
        return view('reservaMaquinas.solicitudMaquina',compact("maquinas"));
    }
    public function formReserva($id)
    {
        $maquina = Maquina::findOrFail($id);
        return view('reservaMaquinas.formReserva_dia',compact("maquina"));

    }

    public function formReservaTurno(Request $request,$id)
    {
        $turnos_aux = DB::table('turnos')->select('id')->whereNotIn('id', function ($query) use($request,$id){
            $query->select('turno_id')
                  ->from('rsvmaquina_turno')
                  ->join('rsv_maquinas','rsv_maquinas.id','=','rsvmaquina_turno.rsv_maquina_id')
                  ->where('rsvmaquina_turno.dia','=',$request->dia)
                  ->where('rsvmaquina_turno.semana','=',$request->semana)
                  ->where('rsv_maquinas.maquina_id','=',$id)
                  ->where('status','=','Aprobado');
            });
        $turnos = $turnos_aux->addSelect('name')->get();
        return view('reservaMaquinas.formReserva_turno', compact("turnos","request","id"));

    }
}
