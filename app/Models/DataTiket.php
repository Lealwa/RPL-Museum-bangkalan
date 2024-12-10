<?php

namespace App\Models;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataTiket extends Model
{
    use HasFactory;

    public function historys(){
        return $this->belongsTo(History::class);
    }
}
