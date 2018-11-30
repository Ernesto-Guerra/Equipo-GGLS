<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login(){
        $credentials = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials)){
            return view('home');
        }
        else{
            return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));
        }
    }

    public function nuevo(Request $request){
        $user = new User;

        $user->nombre='Test';
        $user->apellido_paterno='Test';
        $user->apellido_materno='Test';
        $user->telefono='Test';
        $user->email='Test@gmail.com';
        $user->email_verified_at=now();
        $user->remember_token=str_random(10);
        $user->password=bcrypt('123');
        $user->genero='Test';
        $user->tipo='Test';

        $user->save();

        return $user;
    }
}
