<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasInteraktif extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_interaktif';
    protected $primaryKey = 'aktivitas_id';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'kategori',
    ];
}
