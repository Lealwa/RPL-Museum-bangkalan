<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('akun', ['user'=>$user]);
    }

    public function store(Request $request){
        $user = Auth::user();

        
        $request->validate([
            'old_pass' => 'required',
            'new_pass' => 'required|min:6',
            'confirm_pass' => 'required|min:6'
        ]);

        if($request['new_pass'] === $request['confirm_pass'])
        {

            $newUser = User::find($user['id']);
            $newUser->password = Hash::make($request['new_pass']);
            $newUser->save();
    
            return redirect("/akun");

        }
        else
        {
            return redirect("/akun")->withErrors("Password Salah");
        }


    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

}
