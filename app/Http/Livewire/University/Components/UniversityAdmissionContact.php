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
    public $edit;
public $edit_phone_number;
public $edit_dial_code;
public $edit_ext;



    public function mount(){
        $this->initForm();
        
        $this->countries = Countries::whereNotNull('country_code')->orderBy('country_code')->get();
    }
    public function loadContacts(){
        $this->contacts = \Auth::user()->selected_university->contactNumbers()->with('createdBy')->get();
    }
    public function initForm(){
        $this->loadContacts();
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
        $this->validate([
        'phone_number' => 'required|unique:university_contact_numbers,phone_number',
        
            ]);
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

    public function edit($id){

        

        $this->edit = \Auth::user()->selected_university->contactNumbers()->get()->where('id' , $id)->first();

        //dd($this->edit);
        $this->edit_phone_number    =  $this->edit->phone_number;
        $this->edit_dial_code       =  $this->edit->dial_code;
        $this->edit_ext             =  $this->edit->ext;

       
        $this->emit('showContactModal');
        //dd($this->eidt , $id);

    
    }

     public function updateContact($id){

        //dd($this->edit_name , $this->edit_name_type);
        $university = \Auth::user()->selected_university->contactNumbers()->find($id);

        if ($university) {
            $university->update([
                'phone_number'  => $this->edit_phone_number ?? $this->edit->phone_number,
                'dial_code'     => $this->edit_dial_code ?? $this->edit->dial_code,
                'ext'           => $this->edit_ext ?? $this->edit->ext,
            ]);
        }
        $this->emit('closeModalcontact');

        
        $this->emit('returnResponseModal',[
        'title'=>'University Contact Updated',
            'message'=>'Your University Contact has been updated.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        $this->initForm();


    }

    

    public function render()
    {
        return view('livewire.university.components.university-admission-contact');
    }
}
