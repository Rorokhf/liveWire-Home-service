<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status=0;

    public function update($field)
    {
        $this->validateOnly($field,[
            'title'=>'required',
            'image'=>'required|mimes:png,jpg'
        ]);
    }
    public function addSlider()
    {
        $this->validate([
            'title'=>'required',
            'image'=>'required|mimes:png,jpg'
        ]);

        $slider=new Slider();

        $slider->title=$this->title;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('slider', $imageName);
        $slider->image = $imageName;

        $slider->status=$this->status;
        $slider->save();
        session()->flash('message','slider  has been Add successufly');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-slider-component')->layout('layouts.base');
    }
}
