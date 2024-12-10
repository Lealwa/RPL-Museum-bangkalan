<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\History;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoController extends Controller
{
    use SoftDeletes;
    public function index(){

        $history = History::with('Pengguna')->get();
        $pemesanan = Pemesanan::with('Pengguna')->get();
        
        $user = Auth::user();

        return view('info', compact('history', 'pemesanan'), ['user'=>$user]);
    }

    public function accept(Request $request){

        $user = Auth::user();

        if(isset($request['accept'])){
            $tiketDone = Pemesanan::find($request['tiketID']);
            $tiketDone->status = '0';
            $tiketDone->tanggal = now();
            $tiketDone->save();
    
            return redirect("/info");
        }elseif(isset($request['delete'])){

            $tiketDelete = Pemesanan::find($request['tiketID']);
            $tiketUp = Tiket::find($request['IDtiket']);
    
            if($tiketDelete->status == "1"){
                $tiketUp->total_tiket = $tiketUp['total_tiket'] + $tiketDelete['total_tiket'];
                $tiketUp->save();
            }
    
            $tiketDelete->delete();

            if($user['lvl'] == "1"){
                return redirect("/tiket");
            }else{
                return redirect("/info");
            }
        }elseif(isset($request['hapus'])){
            $tiketDelete = Pemesanan::find($request['tiketID']);
    
            $tiketDelete->delete();
    
            if($user['lvl'] == "1"){
                return redirect("/tiket");
            }else{
                return redirect("/info");
            }
        }
    }


}
