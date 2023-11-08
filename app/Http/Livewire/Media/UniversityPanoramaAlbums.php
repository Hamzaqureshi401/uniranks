<?php

namespace App\Http\Livewire\Media;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use App\Models\Multimedia\MediaAlbum;
use Livewire\Component;

class UniversityPanoramaAlbums extends Component
{
    public $languages;
    public $language_id;
    public $title;
    public $url;

    public $albums;
    public $album_id;

    /**
     * @var MediaAlbum $selected_album
     */
    public $selected_album;

    protected $queryString = ['album_id'=>['except'=>'']];
    protected $listeners = ['onAlbumCreated'=>'loadAlbums'];
    public function mount(){
        $this->languages = Language::orderBy('name')->get();
        $this->initForm();
        $this->loadAlbums();
        $this->loadAlbumData();
    }

    public function initForm(){
        $this->title = '';
        $this->language_id = Language::whereCode('en')->value('id');
        $this->url = '';
    }

    protected function rules(){
        return [
            'title'=>['required'],
            'language_id'=>['required'],
            'url'=>['required'],
        ];
    }
    public function save(){
        $inputs = $this->validate();
        $inputs['media_type']= Media::TYPE_PENORAMA;
        $inputs['created_by']= \Auth::id();
        $this->selected_album->media()->create($inputs);
        $this->selected_album->refresh();
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
    }

    public function loadAlbums()
    {
        $this->albums = \Auth::user()->selected_university->mediaAlbums()->whereContentTypePanorama()->orderBy('title')->get();
    }

    public function loadAlbumData()
    {
        $this->selected_album = MediaAlbum::whereId($this->album_id)->with('media.language')->first();
    }

    public function deleteAlbum(){
        $this->selected_album->delete();
        $this->selected_album = null;
        $this->album_id = "";
        $this->loadAlbums();
    }
    public function deleteMedia(Media $media){
        $media->delete();
    }
    public function render()
    {
        return view('livewire.media.university-panorama-albums');
    }
}
