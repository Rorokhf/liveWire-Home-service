<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ServiceCategory;

class AdminEditServicesComponent extends Component
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

    public $newImage;
    public $newThumbnail;

    public $service_id;
    public $Featured;
    public function mount($service_slug)
    {
        $service = Service::where('slug', $service_slug)->first();
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->slug = $service->slug;
        $this->thumbnail = $service->thumbnail;
        $this->image = $service->image;
        $this->tagline = $service->tagline;
        $this->Price = $service->Price;
        $this->discount = $service->discount;
        $this->description = $service->description;
        $this->inclusion = str_replace("\n", '|', trim($service->inclusion));
        $this->exclusion = str_replace("\n", '|', trim($service->exclusion));
        $this->service_category_id = $service->service_category_id;
        $this->discount_type = $service->discount_type;
        $this->Featured=$service->Featured;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function update($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'Price' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'service_category_id' => 'required',
            'discount_type' => 'required'
        ]);
        if ($this->newThumbnail) {
            $this->validateOnly($fields, [
                'newThumbnai' => 'required|mimes:png,jpg'
            ]);
        }
        if ($this->newImage) {
            $this->validateOnly($fields, [
                'newImage' => 'required|mimes:png,jpg'
            ]);
        }
    }
    public function updateService()
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
        if ($this->newThumbnail) {
            $this->validate([
                'newThumbnai' => 'required|mimes:png,jpg'
            ]);
        }
        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:png,jpg'
            ]);
        }
        $service = Service::find($this->service_id);
        $service->name = $this->name;
        $service->slug = $this->slug;
        if ($this->newThumbnail) {
            unlink('images/services/thumbnails' . '/' . $service->thumbnail);
            $imageName = Carbon::now()->timestamp . '.' . $this->newThumbnail->extension();
            $this->newThumbnail->storeAs('services/thumbnails', $imageName);
            $service->newThumbnail = $imageName;
        }
        if ($this->newImage) {
            unlink('images/services' . '/' . $service->image);
            $imageName2 = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('services', $imageName2);
            $service->newImage = $imageName2;
        }
        $service->tagline = $this->tagline;
        $service->Price = $this->Price;
        $service->discount = $this->discount;
        $service->description = $this->description;

        $service->inclusion = str_replace("\n", '|', trim($this->inclusion));
        $service->exclusion = str_replace("\n", '|', trim($this->exclusion));

        $service->service_category_id = $this->service_category_id;
        $service->discount_type = $this->discount_type;
        $service->Featured=$this->Featured;

        $service->save();
        session()->flash('message', 'Survice  has been updated successufly');
    }
    public function render()
    {
        $scategory = ServiceCategory::all();
        return view('livewire.admin.admin-edit-services-component', [
            'scategory' => $scategory
        ])->layout('layouts.base');
    }
}
