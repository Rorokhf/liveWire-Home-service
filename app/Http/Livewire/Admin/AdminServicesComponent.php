<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;


class AdminServicesComponent extends Component
{
    use WithPagination;
    public function deletSurvice($id)
    {
        $service=Service::find($id);
        if($service->image)
        {
            unlink('images/services' . '/'. $service->image);
        }
        if($service->thumbnail)
        {
            unlink('images/services/thumbnails' . '/'. $service->thumbnail);
        }
        $service->delete();
        session()->flash('message','Survice Category has been deleted successufly');
    }

    public function render()
    {
        $services=Service::paginate(10);

        return view('livewire.admin.admin-services-component',
        ['services'=>$services])->layout('layouts.base');
    }
}
