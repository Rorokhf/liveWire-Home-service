<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Livewire\WithFileUploads;

class AdminEditServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $newImage;
    public $sCategory_id;
    public $featured;


    public function mount($sCategory_id)
    {
        $scategory = ServiceCategory::find($sCategory_id);
        $this->sCategory_id = $scategory->id;
        $this->name = $scategory->name;
        $this->slug = $scategory->slug;
        $this->image = $scategory->image;
        $this->featured=$scategory->featured;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' =>'required',
            'slug' => 'required',

         ]);
         if($this->newImage)
         {
             $this->validateOnly($fields,[
                 'image' => 'required|mimes:png,jpg'
             ]);
         }
    }
    public function updateService(){
        $this->validate([
           'name' =>'required',
           'slug' => 'required',

        ]);
        if($this->newImage)
        {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
        }

        $scategory=ServiceCategory::find($this->sCategory_id);
        $scategory->name=$this->name;
        $scategory->slug=$this->slug;
        $scategory->featured=$this->featured;
        if($this->newImage)
        {
            $imageName=Carbon::now()->timestamp. '.' . $this->newImage->extension();
        $this->newImage->storeAs('categories',$imageName);
        $scategory->image=$imageName;
        }
        $scategory->save();
        session()->flash('message','Category has been updated Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-service-category-component')->layout('layouts.base');
    }
}
