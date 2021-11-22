<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class ServiceCategoriesComponent extends Component
{
    public function render()
    {
        $sCategory=ServiceCategory::all();
        return view('livewire.service-categories-component',['sCategory'=>$sCategory])->layout('layouts.base');
    }
}
