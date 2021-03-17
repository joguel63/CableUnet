<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded=['id'];
    //uno a muchos
    public function user(){

        return $this->belongsTo('App\Models\User');
    }
}
