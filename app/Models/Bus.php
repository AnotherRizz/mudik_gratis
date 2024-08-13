<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_bus',
        'tujuan_id',
    ];

    // Nama tabel secara eksplisit (opsional jika mengikuti konvensi penamaan Laravel)
    protected $table = 'bus';

    /**
     * Relasi ke model Kursi.
     * Satu bus memiliki banyak kursi.
     */
    public function kursi()
    {
        return $this->hasMany(Kursi::class);
    }

    /**
     * Relasi ke model Tujuan.
     * Satu bus berada di satu tujuan.
     */
    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class);
    }
}