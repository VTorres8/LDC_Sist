<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Sala;
use App\User;
use App\RsvSala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $reservas= $user->reservasSala;
        $reservasMaq = $user->reservasMaquinas;
        return view('reservas.index', compact("reservas","reservasMaq"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas = Sala::all();
        return view('reservas.create', compact("salas"));

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
        $reserva = new RsvSala;
        $reserva->user_id = $user->id;
        $reserva->sala_id = $request->sala_id;
        $reserva->status = "Pendiente";
        $reserva->save();
        if ($request->tipo == "Materia"){
            foreach (range(1,12) as $semana){
                $reserva->turnos()->attach($request->hora1,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora2,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora3,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora4,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora5,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora6,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora7,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora8,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora9,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora10,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
                $reserva->turnos()->attach($request->hora11,['semana'=>$semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            }
        }
        else {
            $reserva->turnos()->attach($request->hora1,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora2,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora3,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora4,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora5,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora6,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora7,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora8,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora9,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora10,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
            $reserva->turnos()->attach($request->hora11,['semana'=>$request->semana,'dia'=>$request->dia,'tipo'=>$request->tipo]);
        }    
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
        $reserva = RsvSala::findOrFail($id);
        $reserva->turnos()->detach();
        $reserva->delete();
        return redirect('/reservas');
    }
    public function solicitudMateria($id)
    {
        $sala = Sala::findOrFail($id);
        return view('reservas.solicitudMateria',compact("sala"));
    }

    public function solicitudEvento($id)
    {
        $sala = Sala::findOrFail($id);
        return view('reservas.solicitud_dia_evento',compact("sala"));
    }

    public function solicitud($id){
        
        $sala = Sala::findOrFail($id);
        return view('reservas.solicitud_dia', compact("sala"));
    }

    public function solicitudTurno(Request $request,$id){
        
        
        $turnos_aux = DB::table('turnos')->select('id')->whereNotIn('id', function ($query) use($request,$id){
                                                                    $query->select('turno_id')
                                                                          ->from('rsvsala_turno')
                                                                          ->join('rsv_salas','rsv_salas.id','=','rsvsala_turno.rsv_sala_id')
                                                                          ->where('rsvsala_turno.dia','=',$request->dia)
                                                                          ->where('rsv_salas.sala_id','=',$id)
                                                                          ->where('status','=','Aprobado');

                                                             
        });
        $turnos = $turnos_aux->addSelect('name')->get();
        return view('reservas.solicitud_turno', compact("turnos","request","id"));
    }

    public function solicitudTurnoEvento(Request $request,$id){
        
        
        $turnos_aux = DB::table('turnos')->select('id')->whereNotIn('id', function ($query) use($request,$id){
                                                                    $query->select('turno_id')
                                                                          ->from('rsvsala_turno')
                                                                          ->join('rsv_salas','rsv_salas.id','=','rsvsala_turno.rsv_sala_id')
                                                                          ->where('rsvsala_turno.dia','=',$request->dia)
                                                                          ->where('rsvsala_turno.semana','=',$request->semana)
                                                                          ->where('rsv_salas.sala_id','=',$id)
                                                                          ->where('status','=','Aprobado');

                                                             
        });
        $turnos = $turnos_aux->addSelect('name')->get();
        return view('reservas.solicitud_turno_evento', compact("turnos","request","id"));
    }

}
