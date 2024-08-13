<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tujuan;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user= Auth::user();
        $tujuan = Tujuan::all();
    return view('message', compact('tujuan','user'));
    }
    public function profile()
    {
        $user= Auth::user();
       
    return view('user.profile', compact('user'));
    }
   
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}