<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_kursi',
        'bus_id',
        'status',
    ];

    protected $table = 'kursi';

    /**
     * Relasi ke model Bus.
     * Satu kursi dimiliki oleh satu bus.
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}