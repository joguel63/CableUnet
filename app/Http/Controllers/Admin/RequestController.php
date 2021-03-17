<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.requests.index')->only('index');
        $this->middleware('can:admin.requests.create')->only('create','store');
        $this->middleware('can:admin.requests.edit')->only('edit','update');
        $this->middleware('can:admin.requests.show')->only('show');
        $this->middleware('can:admin.requests.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests=ModelsRequest::all();
        return view('admin.requests.index',['requests'=>$requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::where('id',auth()->user()->id)->first();
        return view('admin.requests.create',['user'=>$user]);
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
            'requerimento'=>'required'
        ]);
        ModelsRequest::create($request->all());
        return redirect()->route('admin.contratos.create')->with('info','Se ha enviado tu correctamente correctamente');

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
    public function edit(ModelsRequest $request)
    {   
       
       return view('admin.requests.edit',['request'=>$request]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $request_id)
    {
        
        ModelsRequest::find($request_id)->update($request->all());
       
        return redirect()->route('admin.requests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsRequest $request)
    {
        $request->delete();
        return redirect()->route('admin.requests.index')->with('info','La solicitud se elimino correctamente');
    }
}
