<?php

namespace App\Http\Livewire\Admin;

use App\Models\Channel;
use Livewire\Component;
use Livewire\WithPagination;

class ChannelsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $channels=Channel::where('nombre','like','%'.$this->search.'%')->latest('id')->paginate();
        return view('livewire.admin.channels-index',['channels'=>$channels]);
    }
}
