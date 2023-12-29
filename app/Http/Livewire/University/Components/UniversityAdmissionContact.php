<?php

namespace App\Http\Livewire\University\Components;

use App\Models\General\Countries;
use App\Models\Institutes\University;
use App\Models\University\UniversityContactNumber;
use Livewire\Component;

class UniversityAdmissionContact extends Component
{
    public $contacts;
    public $countries;
    public $dial_code;
    public $phone_number;
    public $ext;



    public function mount(){
        $this->initForm();
        $this->loadContacts();
        $this->countries = Countries::whereNotNull('country_code')->orderBy('country_code')->get();
    }
    public function loadContacts(){
        $this->contacts = \Auth::user()->selected_university->contactNumbers()->with('createdBy')->get();
    }
    public function initForm(){
        $this->dial_code = '';
        $this->phone_number = '';
        $this->ext = '';
    }


    protected function rules(){
        return [
            'dial_code'=>['required'],
            'phone_number'=>['required'],
            'ext'=>[''],
        ];
    }

    public function save(){
        $inputs = $this->validate();
        $inputs['created_by_id']= \Auth::id();
        \Auth::user()->selected_university->contactNumbers()->create($inputs);
        $this->initForm();
        $this->loadContacts();
        $this->emit('returnResponseModal',[
        'title'=>'New Contact Added to your Main Information',
            'message'=>'1 New contact has been added main information.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function deleteContact(UniversityContactNumber $contactNumber){
        $contactNumber->delete();
        $this->loadContacts();
        $this->emit('returnResponseModal',[
        'title'=>'Record Deleted',
            'message'=>'Your Contact has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university.components.university-admission-contact');
    }
}
