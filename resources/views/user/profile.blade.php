@extends('layout.main')

@section('title', 'Profile')

@section('content')
<div class="p-8 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Profil Pengguna</h1>

    <div class="grid grid-cols-2 gap-6">
        <!-- Informasi Dasar -->
        <div class="bg-slate-100 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-600 mb-4">Informasi Dasar</h2>
            <p class="text-gray-600"><strong>Nama:</strong> {{$user->name }}</p>
            <p class="text-gray-600 mt-2"><strong>Email:</strong> {{$user->email }}</p>
            <p class="text-gray-600 mt-2"><strong>Tanggal Bergabung:</strong> {{$user->created_at->format('d M Y') }}</p>
        </div>

        <!-- Pengaturan Akun -->
        <div class="bg-slate-100 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-600 mb-4">Pengaturan Akun</h2>
            <a href="" class="block w-full text-center px-4 py-2 mt-2 text-white bg-sky-500 rounded-md hover:bg-sky-600">
                Edit Profil
                <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a href="{{ route('logout') }}" class="block w-full text-center px-4 py-2 mt-4 text-white bg-red-500 rounded-md hover:bg-red-600">
                Logout
            </a>
        </div>
    </div>
</div>
@endsection
