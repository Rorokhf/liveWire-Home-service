<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class EditSproviderProfileComponent extends Component
{
    use WithFileUploads;
    public $service_category_id;
    public $image;
    public $about;
    public $city;
    public $service_locations;
    public $service_provider_id;
    public $newimage;

    public function mount()
    {
        $sprovider=ServiceProvider::where('user_id',Auth::user()->id)->first();
        $this->service_provider_id=$sprovider->id;
        $this->image=$sprovider->image;
        $this->about=$sprovider->about;
        $this->city=$sprovider->city;
        $this->service_category_id=$sprovider->service_category_id;
        $this->service_locations=$sprovider->service_locations;

    }

    public function updateprofile(){
        $sprovider=ServiceProvider::where('user_id',Auth::user()->id)->first();
        if($this->newimage)
        {
            $imageName=Carbon::now()->timestamp. '.' . $this->newimage->extension();
        $this->newimage->storeAs('sproviders',$imageName);
        $sprovider->image=$imageName;
        }

        $sprovider->about=$this->about;
        $sprovider->city=$this->city;
        $sprovider->service_category_id=$this->service_category_id;
        $sprovider->service_locations=$this->service_locations;
        $sprovider->save();
        session()->flash('message','Profile has been updated Successfully');

    }
    public function render()
    {
        $scategories=ServiceCategory::all();
        return view('livewire.sprovider.edit-sprovider-profile-component',
        ['scategories'=>$scategories])->layout('layouts.base');
    }
}
