<?php

namespace App\Http\Livewire\University\Components;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadLogo extends Component
{
    use WithFileUploads;

    public $photo;
    public $university;

    public function rules()
    {
        return [
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024']
        ];
    }

    protected function validationAttributes()
    {
        return [
            'photo' => "Logo",
        ];
    }


    public function updatedPhoto()
    {
        $this->validate();
        $monogram = $this->photo->storePublicly('images/universities-logos', 's3');
        \Auth::user()->selected_university->update(['logo' => $monogram]);
    }

    public function removeLogo(){
        $university = \Auth::user()->selected_university;
        \Storage::disk('s3')->delete($university->monogram);
        $university->update(['logo'=>null]);
    }


    public function render()
    {
        $this->university = \Auth::user()->selected_university;
        return view('livewire.university.components.upload-logo');
    }
}
