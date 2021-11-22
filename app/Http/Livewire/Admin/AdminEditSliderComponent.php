<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status = 0;
    public $slider_id;
    public $newimage;

    public function mount($slider_id)
    {
        $slider = Slider::find($slider_id);
        $this->slider_id = $slider->id;
        $this->title = $slider->title;
        $this->image = $slider->image;
        $this->status = $slider->status;
    }

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);
        if ($this->newimage) {
            $this->validateOnly($fields, [
                'newimage' => 'required|mimes:png,jpg'
            ]);
        }
    }
    public function updateSlider()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);
        if ($this->newImage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
        }

        $slider = Slider::find($this->slider_id);

        $slider->title = $this->title;
        if ($this->newimage) {
            unlink('images/services' . '/' . $slider->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('slider', $imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'slider  has been Edit successufly');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.base');
    }
}
