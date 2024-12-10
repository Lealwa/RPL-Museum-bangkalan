<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemeesananController extends Controller
{
    public function index(){
        $tiket = Tiket::all();
        $user = Auth::user();

        return view('pemesanan',compact('tiket'),['user'=>$user]);
    }

    public function buy(Request $request){
        $tiket = Tiket::all();
        $user = Auth::user();

        $tiketDibeli = $request['bayar'];

        $totalTiket = $tiketDibeli/3000;

        $upTiket = Tiket::find($tiket[0]->id);
        $upTiket->total_tiket = $tiket[0]->total_tiket - $totalTiket;
        $upTiket->save();

        Pemesanan::create([
            'no' => $user['no'],
            'email' => $user['email'],
            'tanggal' => now(),
            'total_harga' => $tiketDibeli,
            'total_tiket' => $totalTiket,
            'status' => 1,
            'pengguna_id' => $user['id'],
            'tiket_id' => $tiket[0]->id
        ]);

        return redirect("/tiket")->with("Pemesanan Success");
    }

}
