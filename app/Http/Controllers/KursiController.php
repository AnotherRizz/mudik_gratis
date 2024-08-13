<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Kursi;
use Illuminate\Http\Request;

class KursiController extends Controller
{
    /**
     * Tampilkan halaman pemesanan kursi berdasarkan ID bus.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Ambil data bus berdasarkan ID
        $bus = Bus::findOrFail($id);
        
        // Ambil data kursi untuk bus tersebut
        $kursis = Kursi::where('bus_id', $id)->get();

        return view('kursi.show', compact('bus', 'kursis'));
    }
}