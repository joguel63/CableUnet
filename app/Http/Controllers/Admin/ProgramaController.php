<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.programas.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.programas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.programas.create');
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
            'nombre'=> 'required|unique:programas'
        ]);

        Programa::create($request->all());
        return redirect()->route('admin.programas.index')->with('info','Se ha añadido el programa correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        return view('admin.programas.show',['programa'=>$programa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        return view('admin.programas.edit',['programa'=>$programa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Programa $programa)
    {
        $request->validate([
            'nombre'=> "required|unique:programas,nombre,$programa->id"
        ]);
        $programa->update($request->all());
        return redirect()->route('admin.programas.index')->with('info','Se ha actualizado el programa correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();
        return redirect()->route('admin.programas.index')->with('info','Se ha eliminado el programa correctamente');

    }
}
