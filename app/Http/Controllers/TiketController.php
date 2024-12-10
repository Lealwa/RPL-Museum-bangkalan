<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\History;
use App\Models\DataTiket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TiketController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if($user != NULL){
            $pemesanan = Pemesanan::where('pengguna_id', $user->id)->get();
    
            return view('tiket', ['user'=>$user], compact('pemesanan'));
        }else{
            return view('tiket', ['user'=>$user]);
        }
    }

    public function transfer(Request $request){

        $user = Auth::user();

        $pemesanan_id = $request['transaction_id'];
        $to_email = $user->email;
        $subject = 'Tagihan Pembayaran';
        $message = 'Lakukan Pembayaran Dengan Menekan Tombol Dibawah';
        $payment_url = url('/payment/' . $pemesanan_id); // URL halaman pembayaran

        $data = [
            'subject' => $subject,
            'message' => $message,
            'payment_url' => $payment_url,
            'pemesanan_id' => $pemesanan_id
        ];

        Mail::send('emails.payment', $data, function ($message) use ($to_email, $subject) {
            $message->to($to_email)
                    ->subject($subject)
                    ->from(config('mail.from.address'), config('mail.from.name'));
        });

        return redirect('tiket')->with('success', 'Email Sent Successfully');
    }

    public function payment($pemesanan_id)
    {

        $user = Auth::user();

        $pemesanan = Pemesanan::where('id', $pemesanan_id)->first();


        // Logika untuk halaman pembayaran
        return view('payment', compact('pemesanan'));
    }

    public function pembayaran(Request $request){
        $user = Auth::user();

        $pemesanan = Pemesanan::find($request['pemesanan_id']);

        $pemesanan->status = "0";
        $pemesanan->save();

        $user = User::find($pemesanan['pengguna_id']);

        $history = new History();
        $history->nama = $user->name;
        $history->no = $user->no;
        $history->total_tiket = $pemesanan->total_tiket;
        $history->total_harga = $pemesanan->total_harga;
        $history->user_id = $user->id;
        $history->save();


        $pemesanan_id = $request['transaction_id']; 
        $to_email = $user->email; 
        $subject = 'E-Tiket Pembayaran Berhasil';

        $jumlah_tiket = $pemesanan->total_tiket; 

        $pemesanan_tiket = Pemesanan::all();

        $urutan = 0;

        foreach($pemesanan_tiket as $pesan){
            if($pesan->status == '0' && $pesan->id != $pemesanan->id){
                $urutan += $pesan->total_tiket;
            }
        }


        $tanggal_besok = Carbon::now()->addDay()->format('Y-m-d');

        $tickets = [];
        for ($i = 1; $i <= $jumlah_tiket; $i++) {
            $tickets[] = [
                'ticket_id' => 'T' . str_pad($urutan + $i, 6, '0', STR_PAD_LEFT), // ID tiket otomatis
                'event_name' => 'Museum Cakraningrat',
                'event_date' => $tanggal_besok,
            ];
        }

        $data = new DataTiket();

        $count = 0;

        foreach($tickets as $tiket){
            $data->id_tiket = $tiket['ticket_id'];
            $data->history_id = $history->id;
            $data->tanggal = now();
            $count += 1;
        }
        
        $data->save();

        // Data yang akan dikirim ke view email
        $data = [
            'subject' => $subject,
            'tickets' => $tickets,
            'pemesanan_id' => $pemesanan_id
        ];

        // Mengirim email menggunakan Mail::send
        Mail::send('emails.tickets', $data, function ($message) use ($to_email, $subject) {
            $message->to($to_email) // Mengirim ke alamat email pengguna
                    ->subject($subject) // Subjek email
                    ->from(config('mail.from.address'), config('mail.from.name')); // Alamat email pengirim
        });

    }

}
