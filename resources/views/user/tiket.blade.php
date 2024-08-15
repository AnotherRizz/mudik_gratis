@extends('layout.main')

@section('title', 'Tiket Ku')

@section('content')
    <div class="p-6">
        <div class="w-full p-2 flex bg-sky-500 rounded-t-md">
         <i class="fa-solid fa-bus mt-4 mr-3 text-3xl text-white"></i>
            <h1 class="text-2xl font-bold my-2 text-white">
                Tiket Bus <br><span class=" text-xs ms-1 line-clamp-5">
                  Tujuan {{ $orders->first()->tujuan->kota_tujuan }}
               </span> 
            </h1>
        </div>
        @if ($orders->isEmpty())
            <p class="text-gray-600">Anda belum memiliki tiket yang dipesan.</p>
        @else
            <div class=" grid grid-cols-3 border p-4  bg-slate-100" id="tiket" >
              
                @foreach ($orders as $order)
                    <div class=" my-8 ">
                        <h1 class=" text-sm font-bold text-gray-500 mb-4">Nama :{{ $order->name }}</h1>
                        <h1 class=" text-sm font-bold text-gray-500 mb-4">No Kursi: {{ $order->no_kursi }}</h1>
                        <h1 class=" text-sm font-bold text-gray-500 mb-4">No Bus: {{ $order->nomor_bus }}</h1>
                    </div>
                    <div class="my-8 ">
                        <h1 class=" text-sm font-bold text-gray-500 mb-4">Dari: {{ $order->tujuan->keberangkatan }}</h1>
                        <h1 class=" text-sm font-bold text-gray-500 mb-4">Tujuan: {{ $order->tujuan->kota_tujuan }}</h1>
                        <h1 class=" text-sm font-bold text-gray-500 mb-4">Tanggal Berangkat: {{ \Carbon\Carbon::parse($order->tujuan->tgl_berangkat)->format('d M Y') }}
                        </h1>
                    </div>
                    <div class="text-end my-8 ">
                        @php
                            $statusClasses = [
                                'diproses' => 'bg-yellow-500 text-white',
                                'terdaftar' => 'bg-green-500 text-white',
                                'menunggu konfirmasi' => 'bg-red-500 text-white',
                            ];
                            $statusClass = $statusClasses[$order->status] ?? 'bg-gray-500 text-white';
                        @endphp
                        <span class="px-3 py-1 rounded-full {{ $statusClass }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                @endforeach

            </div>
        @endif
    </div>
@endsection
