<?php

namespace App\Models;

use App\Models\User;
use App\Models\DataTiket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    public function Pengguna(){
        return $this->belongsTo(User::class);
    }

    public function Data(){
        return $this->hasMany(DataTiket::class);
    }
}
