<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'email', 'token', 'created_at',
    ];

    protected $table = 'password_resets';

    protected $primaryKey = 'email';

    public $incrementing = false; // Pastikan bahwa incrementing di-set ke false jika menggunakan primary key non-incrementing (seperti email)

    public $timestamps = false;
}
