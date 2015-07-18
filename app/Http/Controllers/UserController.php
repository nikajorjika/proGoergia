<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function auth(Request $request)
    {
        $rules = array(
            'name'     => 'required',
            'password' => 'required'
        );

        $messages = array(
            'name.required'     => 'სახელი სავალდებულოა',
            'password.required' => 'პაროლი სავალდებულოა'
        );

        $this->validate($request, $rules, $messages);

        $user = User::where('name', Input::get('name'))
                    ->first();

        if (empty($user)) {
            return redirect('/user/login');
        }

        if (!Hash::check('password', $user->password)) {
            Auth::loginUsingId($user->id);
            return redirect('/');
        }

        return redirect('/user/login');
    }

    public function admin()
    {
        if (!Auth::user())
            return redirect('/');

        return view('user.admin');
    }
}
