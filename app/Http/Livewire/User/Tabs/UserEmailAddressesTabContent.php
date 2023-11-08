<?php

namespace App\Http\Livewire\User\Tabs;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserEmailAddressesTabContent extends Component
{
    public $email;
    /**
    * @var User $user;
     */
    public $user;
    public function mount(){
        $this->user = \Auth::user();
        $this->resetEmail();
    }


    public function rules(){
        return [
            'email'=>['required', 'string', 'email:rfc,filter', 'max:255',Rule::unique('users','email')->ignore(\Auth::id())]
        ];
    }
    public function updateCurrentEmail(){
        $this->validate();
        if ($this->email == $this->user->email) return;
        $this->user->update(['email'=>$this->email,'email_verified_at'=>null]);
        $this->user->sendEmailVerificationNotification();
        session()->flash('status', 'Email Updated Successfully and Verification sent, Please Verify Your New Email Address.');
        $this->dispatchBrowserEvent('refresh');
    }

    public function resetEmail(){
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.user.tabs.user-email-addresses-tab-content');
    }
}
