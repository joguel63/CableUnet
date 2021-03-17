<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public $timestamps=false;
    public $timestamp=false;
    //relaciones uno a muchos inversa
    //para canales
    public function channel(){
        return $this->belongsTo('App\Models\Channel');
    }
    //para programas
    public function programa(){
        return $this->belongsTo('App\Models\Programa');
    }
}
