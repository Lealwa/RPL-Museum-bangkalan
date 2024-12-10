<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tiket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;

    public function Pengguna(){
        return $this->belongsTo(User::class);
    }
    public function Tiket(){
        return $this->belongsTo(Tiket::class);
    }

    protected $fillable = [
        'no', 'email', 'tanggal', 'total_harga', 'total_tiket', 'status', 'pengguna_id', 'tiket_id'
    ];

}
