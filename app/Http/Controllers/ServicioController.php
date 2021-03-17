<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
class ServicioController extends Controller
{
    public function index(){
        $servicios=Servicio::all();
        return view('servicios.index',['servicios'=>$servicios]);    
    }

    public function show(Servicio $servicio){
        
        return view('servicios.show',['servicio'=>$servicio]);    
    }
    
}
