<?php

namespace App\Http\Livewire;

use App\Models\Horario as ModelsHorario;
use Livewire\Component;

class Horario extends Component
{
    public $horarios;
    public $channels;
    public $fechas;
    public $show=false;
    public $date_search="seleccionar";
    public $channel_search="todos";
    public function render( /* $horarios */)
    {           
        return view('livewire.horario');
    }

    public function show_table(){
        if($this->date_search != "seleccionar"){
            
            $this->show=true;
        }else
        {
            $this->show=false;
        }
        
    }
}
