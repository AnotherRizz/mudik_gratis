<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat', 
        'email',
        'no_telp', 
        'no_kursi',
        'nomor_bus',
        'tujuan_id',
        'user_id',
        'status' // Tambahkan user_id
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class, 'tujuan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}