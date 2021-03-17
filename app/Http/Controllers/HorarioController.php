<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        $channels = Channel::all();
        $fechas = $this->date_whith_time($horarios);
        return view('horarios.index', ['horarios' => $horarios, 'channels' => $channels, 'fechas' => $fechas]);
    }

    //funcion para saber cuales fechas tienen una programacion establecida
    public function date_whith_time( $horarios)
    {
        $fechas = array();

        foreach ($horarios as $horario) {

            $separar = (explode(" ", $horario->fecha));

            $fechas[] = $separar[0];
        }

        $fecha_unica = array_unique($fechas);

        return $fecha_unica;
    }

    
}
