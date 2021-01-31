<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';
    protected $primaryKey = 'desa_id';
    protected $fillable = [
        'desa_nama',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function dusun()
    {
        return $this->belongsToMany(Dusun::class);
    }
}
