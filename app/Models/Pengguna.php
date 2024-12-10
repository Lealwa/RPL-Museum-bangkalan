<?php

namespace App\Models;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Model
{
    use HasFactory;

    public function Pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }

    public function History(){
        return $this->hasMany(History::class);
    }
    
    protected $fillable = [
        'name', 'email', 'pass', 'no', 'lvl',
    ];

    protected $hidden = [
        'pass',
    ];
}
