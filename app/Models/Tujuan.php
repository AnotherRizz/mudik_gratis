<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kota_tujuan',
        'keberangkatan',
        'tgl_berangkat',
    ];

    protected $table = 'tujuan';

    /**
     * Relasi ke model Bus.
     * Satu tujuan memiliki banyak bus.
     */
    public function bus()
    {
        return $this->hasMany(Bus::class);
    }
}