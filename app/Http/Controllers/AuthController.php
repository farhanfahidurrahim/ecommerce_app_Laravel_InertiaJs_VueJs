<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return redirect()->back()->withSuccess("Done!");
    }
}
