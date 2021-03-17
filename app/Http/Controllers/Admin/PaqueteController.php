<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paquete;
use App\Models\Plan;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.paquetes.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquetes=Paquete::all();
        return view('admin.paquetes.index',['paquetes'=>$paquetes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans=Plan::all();
        return view('admin.paquetes.create',['plans'=>$plans]);
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
            'nombre'=> 'required',
            'costo'=> 'required',
            'plans'=> 'required'
        ]);

        $paquete=Paquete::create($request->all());

        if($request->plans){
            $paquete->plans()->sync($request->plans);
        }
        return redirect()->route('admin.paquetes.index')->with('info','Se ha añadido el Paquete correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paquete $paquete)
    {
        return view('admin.paquetes.show',['paquete'=>$paquete]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paquete $paquete)
    {
        $plans=Plan::all();
        return view('admin.paquetes.edit',['paquete'=>$paquete,'plans'=>$plans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Paquete $paquete)
    {
        $request->validate([
            'nombre' => "required|unique:paquetes,nombre,$paquete->id",
            'plans' => 'required'                
        ]);
        
        $paquete->update($request->all());

        if($request->plans){
                $paquete->plans()->sync($request->plans);
            }
       
        return redirect()->route('admin.paquetes.index')->with('info','El paquete se actualizo satisfactoriamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paquete $paquete)
    {
        $paquete->delete();
        return redirect()->route('admin.paquetes.index')->with('info','El paquete se elimino satisfactoriamente');

    }
}
