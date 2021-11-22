<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;

class HomeComponent extends Component
{
    public function render()
    {
        $scategory=ServiceCategory::inRandomOrder()->take(18)->get();
        $fservices=Service::where('Featured',1)->inRandomOrder()->take(8)->get();
        $fcategory=ServiceCategory::where('featured',1)->inRandomOrder()->take(8)->get();
        $sid=ServiceCategory::whereIn('slug',['ac','tv','refrigerator','geyser','water-purifier'])->get()->pluck('id');
        $aservices=Service::whereIn('service_category_id',$sid)->inRandomOrder()->take(8)->get();
        $sliders=Slider::where('status',1)->get();
        return view('livewire.home-component',[
            'scategory'=>$scategory,
            'fservices'=>$fservices,
            'fcategory'=>$fcategory,
            'aservices'=>$aservices,
            'sliders'=>$sliders
            ])->layout('layouts.base');
    }
}
