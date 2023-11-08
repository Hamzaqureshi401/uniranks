<?php

namespace App\Http\Livewire\University;

use App\Models\University\Information\UniversityFrontBanners;
use Livewire\Component;
use Livewire\WithFileUploads;

class FrontBanners extends Component
{

    use WithFileUploads;
    public $title;
    public $image;
    public $banners;
    public $image_validation_rule = ['required','image','dimensions:min_width=980,min_height=420'];

    public function mount(){
        $this->initForm();
        $this->loadBanners();
    }

    public function updatedImage(){
        $this->validate(['image'=>$this->image_validation_rule],['image.dimensions'=>'Image size must be 2600px x 500px']);
    }

    public function initForm(){
        $this->title = '';
        $this->image = null;
    }

    public function loadBanners(){
        $this->banners = \Auth::user()->selected_university->frontBanners()->get();
    }

    protected function Rules(){
        return [
            'title'=>['required','string'],
            'image'=>$this->image_validation_rule,
        ];
    }
    public function save(){
        $this->validate();
        $path = $this->image->storePublicly('images/universities-front-banners', 's3');
        \Auth::user()->selected_university->frontBanners()->create(['created_by_id'=>\Auth::id(),'image_path'=>$path,'title'=>$this->title]);
        $this->initForm();
        $this->loadBanners();
        session()->flash('status', 'Operation Successful!');
    }

    public function delete(UniversityFrontBanners $banner){
        $banner->delete();
        $this->loadBanners();
        session()->flash('status', 'Operation Successful!');
    }
    public function disable(UniversityFrontBanners  $banner){
        $banner->update(['status'=>\AppConst::DISABLED]);
        $this->loadBanners();
        session()->flash('status', 'Operation Successful!');
    }

    public function enable(UniversityFrontBanners  $banner){
        $banner->update(['status'=>\AppConst::ENABLED]);
        $this->loadBanners();
        session()->flash('status', 'Operation Successful!');
    }
    public function render()
    {
        return view('livewire.university.front-banners');
    }
}
