<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class UpdateUserEmailController extends Controller
{
    public function create(){
        $user_email = \Auth::user()->email;
        return view('auth.update-email',compact('user_email'));
    }

    public function store(Request $request){
        $request->validate(['email'=>['email','required',Rule::unique('users','email')->ignore(\Auth::id())]]);
        $user = \Auth::user();
        if ($request->email != $user->email){
            $user->update($request->only('email'));
            $user->sendEmailVerificationNotification();
            session()->flash('status', 'verification-link-sent');
        }
        return Redirect::to('admin/dashboard');
    }
}
