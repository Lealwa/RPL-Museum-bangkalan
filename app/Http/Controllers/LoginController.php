<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authentifikasi(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            $user = Auth::user();

            if($user['lvl'] == "1"){
                return redirect('/home');
            }else if($user['lvl'] == "0"){
                $request->session()->regenerate();
                return redirect('/dashboard');
            }
        }else{
            $error = ["Email Salah","Password Salah"];
            return redirect('/login')->withErrors($error);
        }
    }
    
    
}
