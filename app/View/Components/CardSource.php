<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardSource extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $color;
    public $icono;
    public function __construct($color,$icono)
    {
        $this->color=$color;
        $this->icono=$icono;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card-source');
    }
}
