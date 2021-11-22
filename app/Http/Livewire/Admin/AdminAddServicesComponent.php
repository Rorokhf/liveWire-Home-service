<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Livewire\WithFileUploads;

class AdminAddServicesComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $thumbnail;
    public $image;
    public $tagline;
    public $Price;
    public $discount;
    public $description;
    public $inclusion;
    public $exclusion;
    public $service_category_id;
    public $discount_type;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'thumbnail' => 'required|mimes:png,jpg',
            'image' => 'required|mimes:png,jpg',
            'tagline' => 'required',
            'Price' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'service_category_id' => 'required',
            'discount_type' => 'required'
        ]);
    }
    public function creatService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'thumbnail' => 'required|mimes:png,jpg',
            'image' => 'required|mimes:png,jpg',
            'tagline' => 'required',
            'Price' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'service_category_id' => 'required',
            'discount_type' => 'required'

        ]);
        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug;

        $imageName = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('services/thumbnails', $imageName);
        $service->thumbnail = $imageName;

        $imageName2 = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('services', $imageName2);
        $service->image = $imageName2;

        $service->tagline = $this->tagline;
        $service->Price = $this->Price;
        $service->discount = $this->discount;
        $service->description = $this->description;

        $service->inclusion =str_replace("\n",'|',trim( $this->inclusion));
        $service->exclusion =str_replace("\n",'|',trim( $this->exclusion));

        $service->service_category_id = $this->service_category_id;
        $service->discount_type = $this->discount_type;

        $service->save();
        session()->flash('message','Survice  has been Add successufly');
    }
    public function render()
    {
        $scategory = ServiceCategory::all();
        
        return view('livewire.admin.admin-add-services-component', [
            'scategory' => $scategory
        ])->layout('layouts.base');
    }
}
