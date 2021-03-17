<?php

namespace App\Http\Livewire\Admin;

use App\Models\Channel;
use App\Models\Servicio;
use Livewire\Component;

class CreatePlan extends Component
{
    public $serv_id=1;
    public $tv=false;
    public function namee(){
        if(Servicio::find($this->serv_id)->nombre=="Television"){
           $this->tv=true;
        }else{
            $this->tv=false;
        }
    }
    public function render()
    {
        $channels=Channel::all();
        $servicios=Servicio::pluck('nombre','id');
        return view('livewire.admin.create-plan',['servicios' => $servicios,'channels'=>$channels]);
    }
}
