<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        // Log the entire request data
        Log::info('Form Input Data:', $request->all());
    
        // Lakukan validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:15',
            'no_kursi' => 'required|string',
            'nomor_bus' => 'required|string|max:255',
            'tujuan_id' => 'required|exists:tujuan,id',
        ],[
            'name.required' => 'Nama Harus di Isi!!',
            'alamat.required' => 'Alamat Harus di Isi!!',
            'email.required' => 'email Harus di Isi!!',
            'no_telp.required' => 'No telp Harus di Isi!!',
        ]);
    
        // Data yang akan disimpan
        $data = [
            'name' => $request->input('name'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'no_kursi' => $request->input('no_kursi'),
            'nomor_bus' => $request->input('nomor_bus'),
            'tujuan_id' => $request->input('tujuan_id'),
        ];
    
        // Log data yang akan disimpan
        Log::info('Data yang disimpan:', $data);
    
        // Simpan data ke database
        Order::create($data);
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Order created successfully!');
    }
    
}