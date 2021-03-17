<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded=['id'];
    //llamo al registro que coincida con la llave foranea

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relacion de muchos a muchos
    public function paquetes(){
        return $this->belongsToMany('App\Models\Paquete');
    }
}
