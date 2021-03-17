<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public $timestamps=false;
    //muchos a muchos
    //con planes
    public function plans(){
        return $this->belongsToMany('App\Models\Plan');
    }
    //con contratos
    public function contratos(){
        return $this->belongsToMany('App\Models\Contrato');
    }
}
