<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('contact', ['user'=>$user]);
    }
}
