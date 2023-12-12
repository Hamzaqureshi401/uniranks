<?php

namespace App\Http\Livewire\Auth;

use App\Actions\Fortify\PasswordValidationRules;
use Livewire\Component;

class Passwords extends Component
{
    use PasswordValidationRules;
    public $password;
    public $password_confirmation;

    protected function rules(){
        return [
            'password' => $this->passwordRules(),
        ];
    }
    protected function messages()
    {
        return [
            'required.required'=>__('Please enter password'),
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function validateInputs($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth.passwords');
    }
}
