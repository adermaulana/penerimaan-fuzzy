<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register',[
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request) {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:pesertas|unique:users',
            'number' => 'required|min:6|max:13',
            'password' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        Peserta::create($validateData);

        // $request->session()->flash('success','Registration successfull! please Login');

        return redirect('/login')->with('success','Pendaftaran berhasil! Silahkan login');

    }
}
