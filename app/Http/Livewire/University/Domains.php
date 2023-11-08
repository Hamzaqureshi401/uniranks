<?php

namespace App\Http\Livewire\University;

use App\Models\General\DomainType;
use App\Models\University\Information\UniversityDomains;
use Livewire\Component;

class Domains extends Component
{
    public $domains;
    public $domainTypes;

    public $url;
    public $domain_type_id;

    public function mount(){
        $this->domainTypes = DomainType::orderBy('title')->get();
        $this->loadDomains();
        $this->initForm();
    }

    public function initForm(){
        $this->url = '';
        $this->domain_type_id = '';
    }

    public function loadDomains(){
        $this->domains = \Auth::user()->selected_university->domains()->with(['type','createdByUser'])->get();
    }

    public function deleteDomain(UniversityDomains $domain){
        $domain->delete();
        $this->loadDomains();
        session()->flash('status', 'Operation Successful!');
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
        session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university.domains');
    }
}
