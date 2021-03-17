<?php

namespace App\Http\Livewire\Admin;

use App\Models\Programa;
use Livewire\Component;
use Livewire\WithPagination;
class ProgramaIndex extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $programas=Programa::where('nombre','like','%'.$this->search.'%')->latest('id')->paginate();
        return view('livewire.admin.programa-index',['programas'=>$programas]);
    }
}
