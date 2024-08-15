<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>
<style>
    .seat.tersedia {
        background-color: transparent;
        color: white;
    }

    .seat.terisi {
        background-color: #dc3545;
        color: white;
    }

    .seat.selected {
        border: 2px solid #007bff;
        background-color: #007bff;
    }
</style>

<body>
    @if (session('alert'))
    <script>
        Swal.fire({
            title: '{{ session('alert.title') }}',
            text: '{{ session('alert.text') }}',
            icon: '{{ session('alert.icon') }}',
        });
    </script>
@endif
    <main class="h-screen bg-gradient-to-b from-sky-500 to-slate-50">
        <div class="w-full max-w-3xl h-fit p-4 shadow-sm mx-auto bg-sky-500">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Form Pencarian -->
                <div>
                    <form action="{{ route('daftar') }}" method="GET">
                        <div class="mb-4">
                            <select id="bus" name="bus"
                                class="w-full font-semibold text-sm px-3 py-2 border rounded-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent">
                                <option value="" disabled selected class="font-semibold text-xs">Pilih Tujuan
                                </option>
                                @foreach ($busList as $bus)
                                    <option class="font-semibold text-sm" value="{{ $bus->id }}">
                                        {{ $bus->nomor_bus }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full py-2 bg-sky-700 font-semibold text-white rounded-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500">Cari</button>
                    </form>
                </div>
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tampilan Kursi -->
                <div class="w-full">
                    @if ($kursis->isNotEmpty())
                        <h2 class="text-lg font-semibold mb-4">
                            @if ($selectedBus)
                                {{ $busList->firstWhere('id', $selectedBus)->nomor_bus ?? 'Nomor Bus Tidak Ditemukan' }}
                            @else
                                Semua Nomor Bus
                            @endif
                        </h2>
                        <div class="w-fit grid grid-cols-2 md:grid-cols-4 gap-2 h-fit p-2 m-3 bg-slate-200 rounded-sm">
                            @foreach ($kursis as $kursi)
                                <div class="seat block h-8 p-2 border border-slate-500 cursor-pointer {{ $kursi->status }}"
                                    data-id="{{ $kursi->id }}">
                                    <h1
                                        class="text-xs text-center {{ $kursi->status == 'terisi' ? 'text-white cursor-default' : 'text-slate-500' }}">
                                        {{ $kursi->nomor_kursi }}
                                    </h1>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="w-full max-w-5xl h-fit p-5 shadow-sm mx-auto">
            <div class="w-full p-5 bg-white">
                <form action="{{ route('orders.store') }}" method="POST" class="grid grid-cols-3 gap-4">
                    @csrf
                
                    <!-- Hidden Inputs -->
                    <input type="hidden" name="nomor_bus" id="nomor_bus" value="{{ $selectedBus->nomor_bus ?? '' }}">
                    <input type="hidden" name="tujuan_id" id="tujuan_id" value="{{ $selectedBus->tujuan_id ?? '' }}">
                    <input type="hidden" value="" id="kursi" name="no_kursi">
                
                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold text-sm">Nama Pendaftar</label>
                        <input type="text" id="name" name="name" 
                            class="w-full font-semibold text-sm px-3 py-2 border rounded-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent @error('name') border-red-500 @enderror">
                        @error('name')
                            <span class="text-red-500 text-xs font-bold">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <!-- Telepon -->
                    <div class="mb-4">
                        <label for="no_telp" class="block text-gray-700 font-bold text-sm">Telepon</label>
                        <input type="text" inputmode="numeric" id="no_telp" name="no_telp"
                            class="w-full font-semibold text-sm px-3 py-2 border rounded-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent @error('no_telp') border-red-500 @enderror">
                        @error('no_telp')
                            <span class="text-red-500 text-xs font-bold">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold text-sm">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full font-semibold text-sm px-3 py-2 border rounded-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent @error('email') border-red-500 @enderror">
                        @error('email')
                            <span class="text-red-500 text-xs font-bold">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <!-- Alamat -->
                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700 font-bold text-sm">Alamat</label>
                        <input type="text" id="alamat" name="alamat"
                            class="w-full font-semibold text-sm px-3 py-2 border rounded-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent @error('alamat') border-red-500 @enderror">
                        @error('alamat')
                            <span class="text-red-500 text-xs font-bold">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <!-- Submit Button -->
                    <div class="col-span-2 text-center">
                        <button type="submit"
                            class="px-6 py-2 bg-sky-500 text-white rounded-sm shadow-md hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-opacity-50">Submit</button>
                    </div>
                </form>
                
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat.tersedia');
            const kursiInput = document.getElementById('kursi');
            let selectedSeats = [];

            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    const seatNumber = seat.querySelector('h1').innerText.trim();

                    if (seat.classList.contains('selected')) {
                        selectedSeats = selectedSeats.filter(s => s !== seatNumber);
                    } else {
                        if (selectedSeats.length < 4) {
                            selectedSeats.push(seatNumber);
                        } else {
                            alert('Maksimal 4 kursi dapat dipilih.');
                            return;
                        }
                    }

                    seat.classList.toggle('selected');
                    kursiInput.value = selectedSeats.join(', ');
                    consol.log($selectedBus)
                });
            });
        });
    </script>
</body>

</html>
