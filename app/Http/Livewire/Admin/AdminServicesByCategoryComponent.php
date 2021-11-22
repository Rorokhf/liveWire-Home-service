<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServicesByCategoryComponent extends Component
{
    use WithPagination;
    public $scategory_slug;

    public function mount($scategory_slug)
    {
        $this->scategory_slug=$scategory_slug;
    }
    public function render()
    {
        $scategories=ServiceCategory::where('slug',$this->scategory_slug)->first();
        $services=Service::where('service_category_id',$scategories->id)->paginate(10);
        return view('livewire.admin.admin-services-by-category-component',[
            'scategory_num'=>$scategories->name,
            'services'=>$services
        ])->layout('layouts.base');
    }
}
