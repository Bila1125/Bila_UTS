<?php 

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use illuminate\Database\Eloquent\Model;


class JadwalGuru extends Model
{

    use HasFactory;

    protected $fillable= [
        'hari','jam','kelas','mata_pelajaran', 'nip'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }
}
