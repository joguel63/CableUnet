<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contrato;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ContratosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $contratos=Contrato::where('id','like','%'.$this->search.'%')->latest('id')->paginate();
        return view('livewire.admin.contratos-index',['contratos'=>$contratos]);
    }
}
