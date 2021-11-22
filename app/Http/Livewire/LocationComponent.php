<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LocationComponent extends Component
{
    protected $listeners=['refreshcomponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.location-component');
    }
}
