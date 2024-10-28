<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    // Menentukan atribut yang bisa diisi
    protected $fillable = [
        'title',
        'caption', // Ganti content menjadi caption
        'category',
        'date',
        'image'
    ];
}
