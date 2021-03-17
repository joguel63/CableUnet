<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Servicio;
use App\Models\Channel;
class Plancontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.plans.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans=Plan::all();
       
        return view('admin.plans.index',['plans'=>$plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.plans.create');
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
                'nombre' => 'required|unique:plans',
                'servicio_id' => 'required'                
            ]);

            $plan=Plan::create($request->all());

            if($request->channels){
                $plan->channels()->sync($request->channels);
            }
            return redirect()->route('admin.plans.index')->with('info','Se ha añadido el Plan correctamente');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return view('admin.plans.show',['plan'=>$plan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $channels=Channel::all();
        $servicios=Servicio::pluck('nombre','id');
        return view('admin.plans.edit',['plan'=>$plan,'channels'=>$channels,'servicios'=>$servicios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Plan $plan)
    {
        $request->validate([
            'nombre' => "required|unique:plans,nombre,$plan->id",
            'servicio_id' => 'required'                
        ]);
        
        $plan->update($request->all());

        if($request->channels){
                $plan->channels()->sync($request->channels);
            }
        return redirect()->route('admin.plans.index')->with('info','El Plan se actualizo satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.plans.index')->with('info','El Plan se elimino con exito');;
    }
}
