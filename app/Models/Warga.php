<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    protected $fillable = [
        'warga_nama',
        'warga_ktp',
        'warga_jk',
        'warga_desa',
        'warga_dusun',
        'warga_rt',
        'warga_rw',
        'warga_status',
        'warga_pendidikan',
        'warga_agama',
    ];

    public function desa()
    {
        return $this->hasOne(Desa::class, 'desa_id', 'warga_desa');
    }

    public function dusun()
    {
        return $this->hasOne(Dusun::class, 'dusun_id', 'warga_dusun');
    }
}
