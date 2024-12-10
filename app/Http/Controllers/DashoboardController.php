<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashoboardController extends Controller
{
    

    public function index()
{
    $user = Auth::user();
    $pemesanan = Pemesanan::all();

    $newPemesanan = [];

    foreach ($pemesanan as $pesanan) {
        if ($pesanan->status == "0") {
            if (isset($newPemesanan[$pesanan->tanggal])) {
                $newPemesanan[$pesanan->tanggal]['total_harga'] += $pesanan->total_harga;
                $newPemesanan[$pesanan->tanggal]['total_tiket'] += $pesanan->total_tiket;
            } else {
                $newPemesanan[$pesanan->tanggal] = [
                    'tanggal' => $pesanan->tanggal,
                    'total_harga' => $pesanan->total_harga,
                    'total_tiket' => $pesanan->total_tiket
                ];
            }
        }
    }

    return view('dashboard', ['user' => $user, 'newPemesanan' => $newPemesanan]);
}

}
