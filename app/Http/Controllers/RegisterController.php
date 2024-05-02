<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }

    public function store(Request $request){
       
 
        $this->validate($request, [
            'name' => 'required|max:30|unique:users|min:3',
            'email' => 'required|unique:users|email|max:70',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ) 
        ]);

        auth()->attempt($request->only('email','password'));

 
     return redirect()->route('dashboard');
 
     }

}
