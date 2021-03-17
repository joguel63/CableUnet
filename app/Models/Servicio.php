<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable=['nombre']; 
    //relacion uno a muchos
    public function plans(){
        return $this->hasMany('App\Models\Plan','servicio_id');
    }
}
