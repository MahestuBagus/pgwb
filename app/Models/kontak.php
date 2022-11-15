<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'id_jenis',
        'deskripsi'
    ];
    protected $table = 'jenis_kontak_siswa';

    public function siswa()
    {
        return $this->belongsTo('App\Models\siswa', 'id_siswa');
    }
    // kl yg belongsto itu buat child nya
    public function kontak()
    {
        return $this->belongsTo('App\Models\jenis_kontak', 'id_jenis');
    }
}
