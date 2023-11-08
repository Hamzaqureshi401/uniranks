<?php

namespace App\Http\Livewire\User\Tabs;

use App\Actions\User\AddNewUser;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class UserSubAccounts extends Component
{
    public $accounts;
    /**
     * @var User $user ;
     */
    public $user;
    public $confirmingUserDeletion = false;
    public $user_account_state = [];
    public $openAddUserModal = false;
    protected $listeners = ['onModelClose' => 'initUserForm'];

    public function mount()
    {
        $this->user = \Auth::user();
        $this->loadSubAccounts();
        $this->initUserForm();
    }

    public function showAddUserModal()
    {
        $this->user_account_state ['school_id'] = $this->user->selected_university->id;
        $this->openAddUserModal = true;
    }

    public function initUserForm()
    {
        $this->resetErrorBag();
        $this->user_account_state = [
            'school_id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
        ];
    }

    public function saveNewUser()
    {
        $this->resetErrorBag();
        AddNewUser::run(['user_account_state' => $this->user_account_state]);
        $this->loadSubAccounts();
        $this->initUserForm();
        session()->flash('status', 'New account account created!');
        $this->openAddUserModal = false;
    }

    public function sendResetPassword($email)
    {
        Password::broker(config('fortify.passwords'))->sendResetLink(['email' => $email]);
        session()->flash('status', 'Reset reset password email sent to ' . $email . '.');
    }

    public function sendVerification(User $user)
    {
        $user->sendEmailVerificationNotification();
        session()->flash('status', 'Verification email sent to ' . $user->email . ' .');
    }

    public function deleteSubAccount(User $user)
    {
        (new \App\Actions\Jetstream\DeleteUser)->delete($user);
        $this->loadSubAccounts();
        session()->flash('status', $user->email . ' Deleted.');
    }


    public function loadSubAccounts()
    {
        $this->accounts = User::whereMainUserId(\Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.user.tabs.user-sub-accounts');
    }

    public function confirmDelete(User $user)
    {
        $this->dispatchBrowserEvent('confirming-delete-user');
        $this->confirmingUserDeletion = true;
    }

    public function makeEmailPrimary(User $user)
    {
        $old_data = ['email' => $this->user->email, 'email_verified_at' => $this->user->email_verified_at];
        $new_data = ['email' => $user->email, 'email_verified_at' => $user->email_verified_at];
        $this->user->update($new_data);
        $user->update($old_data);
        session()->flash('status', $new_data['email'] . ' is your new email!');
        $this->dispatchBrowserEvent('refresh');
    }
}
