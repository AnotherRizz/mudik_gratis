<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telp');
            $table->string('no_kursi');
            $table->string('nomor_bus');
            $table->foreignId('tujuan_id')->constrained('tujuan')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['menunggu konfirmasi', 'terkonfirmasi'])->default('menunggu konfirmasi'); // Tambahkan kolom status dengan nilai default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};