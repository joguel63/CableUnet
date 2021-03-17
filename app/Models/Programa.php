<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    public $timestamps=false;
    protected $fillable=['nombre'];
    use HasFactory;

    //relacion uno a muchos
    public function horarios(){
        return $this->hasMany('App\Models\Horario');
    }
}
