<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; 
    protected $primaryKey = 'nim'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    public $timestamps = false;


    protected $fillable = ['nim', 'nama', 'no_hp', 'alamat'];
}
