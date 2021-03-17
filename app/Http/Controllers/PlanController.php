<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
class PlanController extends Controller
{
    public function show(Plan $plan){
        
        return view('plans.show',['plan'=>$plan]);    
    }
}
