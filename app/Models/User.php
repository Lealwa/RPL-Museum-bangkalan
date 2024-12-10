<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    use HasFactory;

    public function pemesanans(){
        return $this->hasMany(Pemesanan::class);
    }
    
    protected $fillable = [
        'name', 'email', 'password', 'no', 'lvl',
    ];

    protected $hidden = [
        'pass',
    ];
}
