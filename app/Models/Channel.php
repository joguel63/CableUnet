<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=['nombre'];
    //relacion muchos a muchos
    public function plans(){
        return $this->belongsToMany('App\Modeles\Plan');
    }

    //relacion uno a muchos
    public function horarios(){
        return $this->hasMany('App\Models\Horario');
    }
}
