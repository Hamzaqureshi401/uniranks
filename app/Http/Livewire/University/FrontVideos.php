<?php

namespace App\Http\Livewire\University;

use App\Models\General\Language;
use App\Models\University\Information\UniversityFrontVideos;
use Livewire\Component;

class FrontVideos extends Component
{
    public $title;
    public $url;
    public $videos;

    public function mount(){
        $this->initForm();
        $this->loadVideos();
    }
    public function initForm(){
        $this->title = '';
        $this->url = '';
    }

    public function loadVideos(){
        $this->videos = \Auth::user()->selected_university->frontVideos()->get();
    }

    protected function Rules(){
        return [
            'title'=>['required','string'],
            'url'=>['required','string']
        ];
    }
    public function save(){
        $inputs = $this->validate();
        $inputs ['created_by_id'] = \Auth::id();
        \Auth::user()->selected_university->frontVideos()->create($inputs);
        $this->initForm();
        $this->loadVideos();
        session()->flash('status', 'Operation Successful!');
    }

    public function deleteVideo(UniversityFrontVideos  $video){
        $video->delete();
        $this->loadVideos();
        session()->flash('status', 'Operation Successful!');
    }
    public function disable(UniversityFrontVideos  $video){
        $video->update(['status'=>\AppConst::DISABLED]);
        $this->loadVideos();
        session()->flash('status', 'Operation Successful!');
    }

    public function enable(UniversityFrontVideos  $video){
        $video->update(['status'=>\AppConst::ENABLED]);
        $this->loadVideos();
        session()->flash('status', 'Operation Successful!');
    }
    public function render()
    {
        return view('livewire.university.front-videos');
    }
}
