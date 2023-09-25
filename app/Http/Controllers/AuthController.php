<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function save(Request $request){
        $request->validate([
            'email'=> 'required|unique:users',
            'password' => 'required', 'string',
            Password::min(8)->letters()->numbers()->mixedCase()->symbols(),
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('sucess', 'Cadastrado com sucesso');
    }

    public function login(){
        return view('welcome');   
    }

    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password'=> 'required', 'string',
            Password::min(8)->letters()->numbers()->mixedCase()->symbols(),
        ],[
            'email' => $request->email,
            'password' => $request->password,
        ]);
        

        if(Auth::attempt($credentials)) {
            return view('home');
        } else {
            return back()->with('error', 'E-mail ou Senha inválidos');            
        }
    }
}
