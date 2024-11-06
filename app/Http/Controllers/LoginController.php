<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function Login(){
        return view('auth.login');
    }

    public function LoginUser(request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if(!Auth::attempt($credentials)){
            $user = \App\Models\User::where('email', $request->email)->first();
            
            if(!$user){
                return back()->with('error', 'Email not found');
            }
            
            return back()->with('error', 'Password invalid');
        }

        // Change the redirection URL here
        return redirect()->to('/dashboard')->with('success', 'successfully logged in');
    }

    public function Logout(){
        Auth::logout();
        return redirect()->to('/login')->with('success', 'Berhasil keluar dari sistem');
    }
}
