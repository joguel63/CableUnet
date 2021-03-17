<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Horario;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.channels.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.channels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required|unique:channels'
        ]);

        Channel::create($request->all());
        return redirect()->route('admin.channels.index')->with('info','Se ha añadido el canal correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        $horarios=Horario::where('channel_id',$channel->id)->get();
        $fechas=$this->date_whith_time($horarios);
        return view('admin.channels.show',['channel'=>$channel,'horarios'=>$horarios,'fechas'=>$fechas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('admin.channels.edit',['channel'=>$channel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        $request->validate([
            'nombre'=> "required|unique:channels,nombre,$channel->id"
        ]);

        $channel->update($request->all());
        return redirect()->route('admin.channels.index')->with('info','Se ha actualizado el canal correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();
        return redirect()->route('admin.channels.index')->with('info','Se ha eliminado el canal correctamente');

    }

     //funcion para saber cuales fechas tienen una programacion establecida
     public function date_whith_time( $horarios)
     {
         $fechas = array();
 
         foreach ($horarios as $horario) {
 
             $separar = (explode(" ", $horario->fecha));
 
             $fechas[] = $separar[0];
         }
 
         $fecha_unica = array_unique($fechas);
 
         return $fecha_unica;
     }
}
