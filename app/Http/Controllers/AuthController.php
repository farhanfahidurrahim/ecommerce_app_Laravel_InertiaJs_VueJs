<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }
    public function registerStore(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|unique:users|min:6|max:35',
            'password'=>'required|confirmed|max:35',
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->back()->withSuccess("Registration Successfully... Please Login!");
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $credentials=$request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // return $credentials;
        if (Auth::attempt($credentials)) {
            $id=Auth::user()->id;
            //$request->session()->regenerate();

            Auth::loginUsingId($id,true);
            return redirect('/');
        }

        return back()->withErrors([
            'email'=>'The provided credentials do not match our records!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
