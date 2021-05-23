<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $image;
    public $link;
    public $price;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slide_id){

        $slider = HomeSlider::find($slide_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->link = $slider->link;
        $this->price = $slider->price;
        $this->status = $slider->status;
        $this->image = $slider->image;
        $this->slider_id = $slider->id;
    }

    public function updateSlider(){

        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('sliders' , $imageName);
            $slider->image = $imageName;
        }
        $slider->save();
        session()->flash('message' , 'Home Slider Updated successfully!');


    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.admin');
    }
}
