<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $table = 'dusun';
    protected $primaryKey = 'dusun_id';
    protected $fillabel = [
        'dusun_nama',
        'dusun_desa',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function desa()
    {
        return $this->hasOne(Desa::class, 'desa_id', 'dusun_desa');
    }
}
