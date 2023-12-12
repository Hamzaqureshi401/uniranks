<?php

namespace App\Http\Livewire\School\Attach;

use App\Models\User\UserSchool;
use Livewire\Component;

class PendingSchools extends Component
{
    public $user_schools = null;
    protected $listeners = ['schoolAttached'=>'loadUserSchools'];

    public function loadUserSchools(){
        $this->user_schools = \Auth::user()->pendingSchools()->with(['country','city','state'])->get();
    }

    public function removeLinkSchool(UserSchool $request){
        $request_school = $request->school;
        if ($request_school->created_by == \Auth::id()){
            $request_school->delete();
        }
        $request->delete();
    }

    public function render()
    {
        $this->loadUserSchools();
        return view('livewire.school.attach.pending-schools');
    }
}
