<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;
use App\Models\Tujuan;

class BusSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua tujuan yang ada di tabel tujuan
        $tujuans = Tujuan::all();

        foreach ($tujuans as $tujuan) {
            for ($i = 1; $i <= 2; $i++) {
                Bus::create([
                    'nomor_bus' => 'Bus ' . $i . ' ke ' . $tujuan->kota_tujuan,
                    'tujuan_id' => $tujuan->id,
                ]);
            }
        }
    }
}