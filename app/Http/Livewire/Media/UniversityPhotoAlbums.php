<?php

namespace App\Http\Livewire\Media;

use App\Models\General\Language;
use App\Models\Multimedia\Media;
use App\Models\Multimedia\MediaAlbum;
use Livewire\Component;
use Livewire\WithFileUploads;

class UniversityPhotoAlbums extends Component
{
    use WithFileUploads;
    public $photos = [];

    public $albums;
    public $album_id;

    /**
     * @var MediaAlbum $selected_album
     */
    public $selected_album;
    public $selected_images = [];

    protected $queryString = ['album_id'=>['except'=>'']];
    protected $listeners = ['onAlbumCreated'=>'loadAlbums'];


    public function mount()
    {
        $this->loadAlbums();
        $this->loadAlbumData();
    }

    public function render()
    {
        return view('livewire.media.university-photo-albums');
    }

    public function loadAlbums()
    {
        $this->albums = \Auth::user()->selected_university->mediaAlbums()->whereContentTypeImages()->orderBy('title')->get();
    }

    public function loadAlbumData()
    {
        $this->selected_album = MediaAlbum::whereId($this->album_id)->with('media')->first();
    }

    public function deleteTemp($key){

        $this->photos[$key] = null;
       unset($this->photos[$key]);
        sort($this->photos);
    }

    public function savePhotos(){
        $images = [];
        foreach ($this->photos as $photo){
           $path=$photo->storePublicly('images/university-photos', 's3');
           $images [] = [ 'media_type'=>Media::TYPE_IMAGE, 'url'=>$path, 'created_by'=>\Auth::id()];
        }
        $this->selected_album->media()->createMany($images);
        $this->selected_album->refresh();
        $this->photos = [];
    }

    public function deleteSelected(){
        Media::whereIn('id',$this->selected_images)->get()->each(fn(Media $media)=>$media->delete());
        $this->selected_album->refresh();
        $this->selected_images= [];
    }

    public function disable(){
        $this->selected_album->update(['status'=>\AppConst::DISABLED]);
        $this->selected_album->refresh();
    }
    public function enable(){
        $this->selected_album->update(['status'=>\AppConst::ENABLED]);
        $this->selected_album->refresh();
    }

    public function deleteAlbum(){
        $this->selected_album->delete();
        $this->selected_album = null;
        $this->album_id = "";
        $this->loadAlbums();
    }

}
