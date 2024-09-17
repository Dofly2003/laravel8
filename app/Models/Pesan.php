<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'massage'; // Pastikan nama tabel sesuai

    protected $fillable = ['name', 'instansi', 'jabatan', 'kota', 'no_whatsapp', 'message'];
}
