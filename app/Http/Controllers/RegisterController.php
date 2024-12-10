<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request)
    {
        // Validasi input sebelum menyimpan data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pass' => 'required|string|min:6|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/',
            'no' => 'required|string|size:12',
        ]);
    
        // Jika validasi sukses, lanjutkan dengan penyimpanan data
        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->no = $request->no;
        $user->lvl = '1'; // asumsi ini adalah level yang tetap
    
        $user->save();
    
        return redirect("/login")->with("success", "Pengguna Berhasil Ditambahkan!");
    }
    
}
