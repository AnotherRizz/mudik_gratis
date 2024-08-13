<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kursi;

class KursiSeeder extends Seeder
{
    public function run()
    {
        // Asumsi ada 4 tujuan, masing-masing tujuan memiliki 2 bus, setiap bus memiliki 30 kursi
        $jumlah_kursi = 28;
        $jumlah_bus_per_tujuan = 2;
        $jumlah_tujuan = 4;

        // Loop melalui setiap tujuan
        for ($tujuan_id = 1; $tujuan_id <= $jumlah_tujuan; $tujuan_id++) {
            // Loop melalui setiap bus di tujuan tersebut
            for ($bus_id = 1; $bus_id <= $jumlah_bus_per_tujuan; $bus_id++) {
                // Loop melalui setiap kursi di bus tersebut
                for ($nomor_kursi = 1; $nomor_kursi <= $jumlah_kursi; $nomor_kursi++) {
                    Kursi::create([
                        'nomor_kursi' => $nomor_kursi,
                        'bus_id' => (($tujuan_id - 1) * $jumlah_bus_per_tujuan) + $bus_id,
                        'status' => 'tersedia'
                    ]);
                }
            }
        }
    }
}