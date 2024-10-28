<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms'; // Pastikan nama tabel sesuai
    
    protected $fillable = [
        'email',
        'nama',
        'pesan'
    ];

    protected $dates = ['created_at', 'updated_at'];
}