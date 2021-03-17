<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Plan;
class CardPlan extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $icono;
    public $plan;
    public $color;
    public function __construct($icon,$plan)
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
        $this->plan=Plan::find($plan);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card-plan');
    }
}
