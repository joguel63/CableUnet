<?php

namespace App\Http\Livewire\Admin;

use App\Models\Programa;
use Livewire\Component;

class HorarioCreate extends Component
{
    public $date;
    public $channel_id;
    public function render()
    {
        $programas=Programa::pluck('nombre','id');
        return view('livewire.admin.horario-create',['programas'=>$programas]);
    }
}
