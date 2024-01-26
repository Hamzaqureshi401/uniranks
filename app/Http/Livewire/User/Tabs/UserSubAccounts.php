<?php

namespace App\Http\Livewire\User\Tabs;

use App\Actions\User\AddNewUser;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



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
    public $edit = false;
    public $edit_user;
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


    public function edit(User $user){
        list($first_name, $last_name) = explode(' ', $user->name, 2);
        
        // Set the user_account_state values
        $this->user_account_state = [
            'first_name' => $first_name ?? '',
            'last_name' => $last_name ?? '',
            'email' => $user->email ?? '',
        ];
        $this->edit = true;
        $this->edit_user = $user;
        $this->openAddUserModal = true;
    }

    protected function rules()
    {
        return [
            'user_account_state.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->edit_user->id ?? null),
            ],
            'user_account_state.first_name' => 'required|string',
            'user_account_state.last_name' => 'required|string',
            'user_account_state.password' => 'required_if:edit,true|confirmed|min:8',
        ];
    }

    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->user_account_state['first_name'] . ' ' . $this->user_account_state['last_name'],
            'email' => $this->user_account_state['email'],
        ];

        if (!empty($this->user_account_state['password'])) {
            $data['password'] = Hash::make($this->user_account_state['password']);
        }

        $this->edit_user->update($data);

        $this->reset(['openAddUserModal', 'user_account_state', 'edit', 'edit_user']);
        $this->edit = false;
        $this->user_account_state = '';

        $this->emit('returnResponseModal', [
            'title' => 'Update Secondary Email/Sub account',
            'message' => 'User has been updated successfully.',
            'btn' => 'Okay',
            'link' => null,
            'viewTitle' => null,
        ]);
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
