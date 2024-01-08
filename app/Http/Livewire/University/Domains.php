<?php

namespace App\Http\Livewire\University;

use App\Models\General\DomainType;
use App\Models\University\Information\UniversityDomains;
use Livewire\Component;

class Domains extends Component
{

    public $domains;
    public $edit;
    public $domainTypes;

    public $url;
    public $domain_type_id;

    public $edit_url;
    public $edit_domain_type_id;

    public function mount(){
        $this->domainTypes = DomainType::orderBy('title')->get();
        $this->initForm();
    }

    public function initForm(){
        $this->loadDomains();
        $this->url = '';
        $this->domain_type_id = '';
    }

    public function loadDomains(){
        $this->domains = \Auth::user()->selected_university->domains()->with(['type','createdByUser'])->get();
    }

    public function edit($id){
        $this->edit = $this->domains->where('id' , $id)->first();
        $this->edit_url = $this->edit->url;
        $this->edit_domain_type_id = $this->edit->domain_type_id;
        $this->emit('showEditModal');
    }

   public function updateDomain()
{
    $this->edit->url = $this->edit_url !== '' ? $this->edit_url : $this->edit->url;
    $this->edit->domain_type_id = $this->edit_domain_type_id ?? $this->edit->domain_type_id;
    $this->edit->save();
       $this->emit('returnResponseModal', [
        'title' => 'University Domain Update',
        'message' => 'University Domain has been updated.',
        'btn' => 'Oky',
        'link' => null,
        'viewTitle' => null
    ]);
    $this->emit('closeModal');
    $this->initForm();
}



    public function deleteDomain(UniversityDomains $domain){
        $domain->delete();
        $this->loadDomains();
        $this->emit('returnResponseModal',[
        'title'=>'Record Deleted',
            'message'=>'Domain has been deleted.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function rules(){
        return [
            'url'=> ['required','string'],
            'domain_type_id'=>['required']
        ];
    }

    public function save(){
        $inputs = $this->validate();
        $inputs['created_by'] = \Auth::id();
        $user = \Auth::user()->selected_university->domains()->create($inputs);
        $this->initForm();
        $this->loadDomains();
        $this->emit('returnResponseModal',[
        'title'=>'Domain Added',
            'message'=>'1 New domain has been added',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university.domains');
    }
}
