<?php

namespace App\Http\Livewire\University;

use Livewire\Component;

class SocialMedia extends Component
{
    public $sm_columns;

    public function mount()
    {
        $this->initForm();
    }

    public function initForm()
    {
        $university = \Auth::user()->selected_university;
        $this->sm_columns = $university->socialMedia()->firstOrCreate()->makeHidden(['id', 'google', 'university_id', 'created_at', 'updated_at', 'updated_by'])->toArray();
    }

    public function rules()
    {
        return [
            'sm_columns' => ['array'],
            'sm_columns.*' => ['present'],
        ];
    }

    public function save()
    {
        $inputs = $this->validate()['sm_columns'];
        \Auth::user()->selected_university->socialMedia()->update($inputs);
        $this->initForm();
        $this->emit('returnResponseModal',[
        'title'=>'Social Media Update',
            'message'=>'Social media has been updated.',
            'btn'=>'Oky',
            'link'=>null,
            'viewTitle' => null
        ]);
        //session()->flash('status', 'Operation Successful!');
    }

    public function render()
    {
        return view('livewire.university.social-media');
    }
}
