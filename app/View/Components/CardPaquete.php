<?php

namespace App\View\Components;

use App\Models\Paquete;
use Illuminate\View\Component;

class CardPaquete extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $icono;
    public $paquete;
    public $color;
    public function __construct($icon,$paquete)
    {
        if($icon=="Internet"){
            $this->icono="fab fa-internet-explorer fa-5x";
            $this->color="blue";
        }else 
        if($icon=="Television"){
            $this->icono="fas fa-tv fa-5x";
            $this->color="yellow";
        }else 
        if($icon=="Telefonia"){
            $this->icono="fas fa-mobile-alt fa-5x";
            $this->color="green";
        }else{
            $this->icono="fab fa-servicestack fa-5x";
            $this->color="blue";
        }
        $this->plan=Paquete::find($paquete);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card-paquete');
    }
}
