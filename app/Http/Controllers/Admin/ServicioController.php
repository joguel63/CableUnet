<?php

namespace App\Http\Controllers\Admin;
use App\Models\Servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('can:admin.servicios.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios=Servicio::all();
        return view('admin.servicios.index',['servicios'=>$servicios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicios.create');
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
            'nombre'=> 'required|unique:servicios'
        ]);

        Servicio::create($request->all());
        return redirect()->route('admin.servicios.index')->with('info','Se ha añadido el servicio correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        return view('admin.servicios.show',['servicio'=>$servicio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        return view('admin.servicios.edit',['servicio'=> $servicio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Servicio $servicio)
    {
        $request->validate([
            'nombre'=> 'required|unique:servicios'
        ]);

            $servicio->update($request->all());
            return redirect()->route('admin.servicios.index')->with('info','El Servicio se actualizo satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
          return redirect()->route('admin.servicios.index')->with('info','El Servicio se elimino con exito');
    }
}
