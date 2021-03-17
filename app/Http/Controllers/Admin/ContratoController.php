<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Paquete;
use Illuminate\Http\Request;

class ContratoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.contratos.index')->only('index');
        $this->middleware('can:admin.contratos.create')->only('create','store');
        $this->middleware('can:admin.contratos.edit')->only('edit','update');
        $this->middleware('can:admin.contratos.show')->only('show');
        $this->middleware('can:admin.contratos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('admin.contratos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paquetes=Paquete::all();
        return view('admin.contratos.create',['paquetes'=>$paquetes]);
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
            'paquetes_id'=>'required'
        ]);

        $pago=0;
        foreach($request->paquetes_id as $paquetes_id){
            $pago=$pago+Paquete::find($paquetes_id)->costo;
        }

        $contrato=Contrato::create(['costo'=>$pago,'user_id'=>$request->user_id]);
        $contrato->paquetes()->sync($request->paquetes_id);
        return redirect()->route('admin.contratos.show',$contrato)->with('info','Felicidades por tu compra, esta es tu factura');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        return view('admin.contratos.show',['contrato'=>$contrato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato)
    {
        $paquetes=Paquete::all();
        return view('admin.contratos.edit',['contrato'=>$contrato,'paquetes'=>$paquetes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'paquetes'=>'required'
        ]);

        $pago=0;
        foreach($request->paquetes as $paquetes){
            $pago=$pago+Paquete::find($paquetes)->costo;
        }

        $contrato->update(['costo'=>$pago]);
        $contrato->paquetes()->sync($request->paquetes);
        return redirect()->route('admin.contratos.index')->with('info','El contrato se actualizo satisfactoriamente');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('admin.contratos.index')->with('info','El contrato se elimino satisfactoriamente');

    }
}
