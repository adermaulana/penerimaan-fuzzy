<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peserta;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request) {
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');

        } else if (Auth::guard('peserta')->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success','Berhasil login!');
        }


        return back()->with('loginError','Login Failed');

    }


    public function logout(Request $request){
        if(Auth::logout());

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');

    }
}
