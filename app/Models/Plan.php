<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $guarded=['id'];
    //relacion 1a1 inversa
    public function servicio(){
        return $this->belongsTo('App\Models\Servicio');
    }

    //relacion muchos a muchos
    //con paquete
    public function paquetes(){
        return $this->belongsToMany('App\Models\Paquete');
    }
    //con canales
    public function channels(){
        return $this->belongsToMany('App\Models\Channel');
    }
}
