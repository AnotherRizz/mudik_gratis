<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tujuan;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showlogin(){
        
        return view('auth.login');
        
     }
     public function register(){
        
        return view('auth.register');
        
     }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'password.required' => 'Password wajib diisi.',
          
        ]);
        
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            // Jika berhasil login, redirect ke halaman home atau halaman yang diinginkan
            return redirect()->intended('/')->with('alert', [
            'title' => 'Berhasil!',
            'text' => 'Berhasil login',
            'icon' => 'success',

        ]);
        }

        // Jika gagal login, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/login')->with('alert', [
            'title' => 'Berhasil!',
            'text' => 'Berhasil logout',
            'icon' => 'success',

        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus memiliki minimal 5 karakter.',
            'password.confirmed' => 'Password konfirmasi tidak cocok.',
        ]);
    
        // Buat user baru
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
    
        // Redirect ke halaman login atau halaman lain setelah registrasi
        return redirect()->route('showlogin')->with('alert', [
            'title' => 'Berhasil!',
            'text' => 'Akun berhasil dibuat. silahkan login',
            'icon' => 'success',

        ]);
        
    }
}