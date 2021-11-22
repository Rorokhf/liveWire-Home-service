<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;

class ServicesByCategoryComponent extends Component
{
    public function mount($category_slug)
    {
        $this->category_slug=$category_slug;
    }
    public function render()
    {

        $scategory=ServiceCategory::where('slug',$this->category_slug)->first();

        return view('livewire.services-by-category-component',
        ['scategory'=>$scategory])->layout('layouts.base');
    }
}
