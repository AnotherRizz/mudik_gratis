<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat', // Sesuaikan dengan nama field di form
        'email',
        'no_telp', // Sesuaikan dengan nama field di form
        'no_kursi',
        'nomor_bus',
        'tujuan_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class, 'tujuan_id');
    }
}