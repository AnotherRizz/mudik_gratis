<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Kursi;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index(Request $request)
    {
        $tujuan = Tujuan::all();
        $busList = Bus::all();
        $kursis = collect();
        $selectedBus = null;
       
    
        if ($request->has('bus')) {
            $selectedBusId = $request->input('bus');
            $selectedBus = Bus::find($selectedBusId);
            if ($selectedBus) {
                $kursis = Kursi::where('bus_id', $selectedBus->id)->get();
            }
        }
    
        return view('user.daftar', compact('tujuan', 'busList', 'kursis', 'selectedBus'));
    }
    
    
    

    public function store(Request $request)
    {
        $request->validate([
            'kota_tujuan' => 'required|string|max:255',
            'keberangkatan' => 'required|string|max:255',
            'tgl_berangkat' => 'required|date',
        ]);

        $tujuan = Tujuan::create($request->all());
        return response()->json($tujuan, 201);
    }

    public function show($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        return response()->json($tujuan);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kota_tujuan' => 'string|max:255',
            'keberangkatan' => 'string|max:255',
            'tgl_berangkat' => 'date',
        ]);

        $tujuan = Tujuan::findOrFail($id);
        $tujuan->update($request->all());
        return response()->json($tujuan);
    }

    public function destroy($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        $tujuan->delete();
        return response()->json(null, 204);
    }
}