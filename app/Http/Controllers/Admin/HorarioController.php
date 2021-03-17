<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Horario;
use App\Models\Programa;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($channel_id,$fecha)
    {
        $horarios=Horario::whereDate('fecha',$fecha)->where('channel_id',Channel::find($channel_id)->id)->get();
        return view('admin.horarios.index',['horarios'=>$horarios,'fecha'=>$fecha]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($channel_id)
    {   
        
        return view('admin.horarios.create',['channel_id'=>$channel_id]);
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
            
            'fecha'=> "required|unique:horarios,fecha,NULL,NULL,channel_id,".$request->channel_id[0]
        ]);
    
    
        for($i=0;$i<count($request->channel_id);$i++){
            $datos[$i]=['channel_id'=>$request->channel_id[$i],
                        'fecha'=>$request->fecha[$i],
                        'programa_id'=>$request->programa_id[$i]];
            

            Horario::create($datos[$i]);
        }
        
        return redirect()->route('admin.channels.index')->with('info','Se ha añadido la progrmacion correctamente');
        
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(/* $datos */)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($channel_id, $fecha)
    {
        $horarios=Horario::whereDate('fecha',$fecha)->where('channel_id',Channel::find($channel_id)->id)->get();
        $programas=Programa::pluck('nombre','id');
        return view('admin.horarios.edit',['horarios'=>$horarios,'programas'=>$programas,'channel_id'=>$channel_id,'fecha'=>$fecha]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        for($i=0;$i<count($request->channel_id);$i++){
            $datos[$i]=['channel_id'=>$request->channel_id[$i],
                        'fecha'=>$request->fecha[$i],
                        'programa_id'=>$request->programa_id[$i]];
            
            
             Horario::find($request->horario_id[$i])->update($datos[$i]); 
             Horario::find($request->horario_id[$i])->update($datos[$i]); 
        }
        
        return redirect()->route('admin.channels.index')->with('info','Se ha editado la progrmacion correctamente');

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
}
