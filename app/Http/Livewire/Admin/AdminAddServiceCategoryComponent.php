<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Livewire\WithFileUploads;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;

    public function generateSlug(){
        $this->slug =Str::slug($this->name,'-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            // 'name' =>'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);
    }

    public function creatServiceCat(){
        $this->validate([
            // 'name '=>'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);

        $scategories=new ServiceCategory();
        $scategories->name=$this->name;
        $scategories->slug=$this->slug;
        $imageName=Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $scategories->image=$imageName;
        $scategories->save();
        session()->flash('message','Category has been created Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-service-category-component')->layout('layouts.base');
    }
}
