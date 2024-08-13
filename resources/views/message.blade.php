<!doctype html>
<html>

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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    /* *{
   border: 1px solid black;
  } */
</style>

<body class="font-poppins ">
    <nav class=" w-full fixed z-30">
        <div class="container mx-auto bg-sky-500 py-4 flex justify-between items-center px-4">
            <div class="brand">
                <h1 class="text-white text-lg font-bold">MUDIK GRATIS</h1>
            </div>
            <div class="flex mx-auto gap-5">
                <a href="" class="text-white font-medium text-sm">Beranda</a>
                <a href="" class="text-white font-medium text-sm">Rute</a>
                <a href="" class="text-white font-medium text-sm">syarat & Ketentuan</a>
            </div>
            <div class="relative">
                <i id="menuToggle" class="fa-solid fa-bars text-white font-bold text-xl cursor-pointer me-5"></i>
                <div id="menu" class="hidden absolute top-6 right-10 w-28 h-20 bg-slate-200 rounded-md p-3">
                    <a href="{{ route('profile') }}" class="text-slate-800 font-semibold text-sm flex gap-2">
                        <p>Profile</p>
                        <i class="fa-solid fa-user font-bold"></i>
                    </a>
                    <a href="{{ route('logout') }}" class="text-slate-800 font-semibold text-sm flex gap-2 mt-4">
                        <p>Logout</p>
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @if (session('alert'))
    <script>
        Swal.fire({
            title: '{{ session('alert.title') }}',
            text: '{{ session('alert.text') }}',
            icon: '{{ session('alert.icon') }}',
        });
    </script>
@endif
    <main class="flex h-screen items-center justify-center bg-gradient-to-b from-sky-500 to-slate-50">
        <div class="flex flex-col md:flex-row  justify-center w-full  max-w-6xl p-6 mt-24  ">
            <div class="flex-grow flex justify-end mb-4 md:mb-0 md:mr-4">
                <img src="{{ asset('images/logo-mudik.png') }}" alt="Mudik" class="  h-2/3">
            </div>
            <div class="flex-grow text-center md:text-left mt-6">
                <h2 class="text-5xl font-bold text-txt text-center">MUDIK NYAMAN BERSAMA<br>PT. TUNAS BARU</h2>
                <div class=" text-center">
                    <h2 class=" text-base font-semibold text-slate-500">25-26 Maret 2025</h2>
                    <p class="text-sm font-semibold text-slate-500">Tujuan:</p>
                    <p class="text-sm font-semibold text-slate-500">Semarang-Solo-Jogja-Wonogiri</p>
                    <h4 class=" mt-2 text-lg font-semibold text-slate-500">Pendaftaran dibuka tanggal 5 Maret 2025 Pukul 09.00 WIB</h4>
                </div>

            </div>
        </div>
    </main>

    <section>
        <h1 class="text-center font-semibold text-xl text-txt mt-5">Jadwal dan Rute Kota Tujuan</h1>
        <div class="flex mt-3 justify-center h-fit p-5 mb-5">
            <div class=" w-full flex h-fit rounded-sm p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
                    <!-- Card 1 -->
                    <div class=" bg-neutral-50 rounded-md shadow-lg shadow-sky-300 p-4">
                        <div class="flex justify-center mb-3">
                            <i class="fa-regular fa-calendar-days text-4xl text-sky-500"></i>
                        </div>
                        <div>
                                    <p class="text-gray-700 text-sm mb-2 text-center font-bold">Jadwal :</p>
                                    <p class="text-gray-700 text-xs mb-1">-Pendaftaran dibuka tanggal 5-9 Maret</p>
                                    <p class="text-gray-700 text-xs mb-1">-Konfirmasi data tanggal 15-16 Maret</p>      
                                    <p class="text-gray-700 text-xs mb-1">-Keberangkatan Tanggal 25-26 Maret
                                        </p>
                        </div>

                    </div>
                    <div class=" bg-neutral-50 rounded-md shadow-lg shadow-sky-300 p-4">
                        <div class="flex justify-center mb-3">
                            <i class="fa-solid fa-location-dot text-4xl text-sky-500"></i>
                        </div>
                         <div>
                                    <p class="text-gray-700 text-sm mb-2 text-center font-bold">Lokasi Keberangkatan :</p>
                                    <p class="text-gray-700 text-xs mb-1">-Monas <span class=" font-semibold text-slate-700">25 Maret jam 06.00 WIB</span></p>
                                    <p class="text-gray-700 text-xs mb-1">-Senayan <span class=" font-semibold text-slate-700">26 Maret jam 06.00 WIB</span></p>
                               
                        </div>
                    </div>
                    <div class=" bg-neutral-50 rounded-md shadow-lg shadow-sky-300 p-4">
                        <div class="flex justify-center mb-3">
                            <i class="fa-solid fa-map-location-dot text-4xl text-sky-500"></i>
                        </div>
                         <div>
                                    <p class="text-gray-700 text-sm mb-2 text-center font-bold">Kota Tujuan :</p>
                                    <p class="text-gray-700 text-xs mb-1">-Terminal Giri Adi Purwa (Wonogiri)</p>
                                    <p class="text-gray-700 text-xs mb-1">-Terminal Tirtonadi (Solo)</p>      
                                    <p class="text-gray-700 text-xs mb-1">-Terminal Terboyo (Semarang)</p>      
                                    <p class="text-gray-700 text-xs mb-1">-Terminal Giwangan (Jogja)
                                        </p>
                        </div>
                    </div>
                    <div class=" bg-neutral-50 rounded-md shadow-lg shadow-sky-300 p-4">
                        <div class="flex justify-center mb-3">
                            <i class="fa-solid fa-bus text-4xl text-sky-500"></i>
                        </div>
                         <div>
                                    <p class="text-gray-700 text-sm mb-2 text-center font-bold">Fasilitas :</p>
                                    <p class="text-gray-700 text-xs mb-1">-2 Bus Executive setiap kota </p>
                                    <p class="text-gray-700 text-xs mb-1">-Kapasitas 30 Seat</p>      
                                    <p class="text-gray-700 text-xs mb-1">-Ac dan Toilet </p>
                                    <p class="text-gray-700 text-xs mb-1">-Snack dan obat-obatan </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <section>
        <div class=" w-full max-w-5xl h-fit bg-txt rounded-sm p-6 mx-auto mb-7">
            <h2 class=" text-2xl font-bold text-white text-center">Informasi Dan Persyaratan</h2>
            <div class=" grid grid-cols-2 gap-2 my-7">

                <div class=" my-3">
                    <h1 class=" font-bold text-base text-slate-200 mb-3 ">informasi Pendaftaran:</h1>
                    <p class=" text-sm text-slate-400">-pendaftaran dibuka tanggal 5-8 Maret 2025 </p>
                    <p class=" text-sm text-slate-400">-konfirmasi data tanggal 15 Maret 2025 </p>
                    <p class=" text-sm text-slate-400">-jadwal keberangkatan dari Monas 25 Maret 2025 pukul 06.00 WIB
                    </p>
                </div>
                <div class=" my-3">
                    <h1 class=" font-bold text-base text-slate-200 mb-3 ">persyaratan </h1>
                    <p class=" text-sm text-slate-400">-1 akun hanya untuk 1 tujuan </p>
                    <p class=" text-sm text-slate-400">-maksimal 4 orang untuk 1 akun</p>
                    <p class=" text-sm text-slate-400">-jadwal keberangkatan dari Monas 25 Maret 2025 pukul 06.00 WIB
                    </p>
                </div>
            </div>

        </div>
    </section>




    {{-- <main class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-2/3 h-1/2 bg-white rounded-md shadow-md flex items-center justify-center">
            <div class="grid grid-cols-2 gap-4 p-4">
                <div>
                    <img src="{{ asset('images/mudik.png') }}" alt="Mudik Gratis" class="">
                </div>
                <div class="text-center  justify-center mt-10">
                   <h1 class=" text-xl font-bold text-sky-500">MUDIK GRATIS 2025 </h1>
                   <P class=" text-xs font-light text-slate-900">di selenggarakan oleh PT.tunas baru bekerja sama dengan <br> <span class=" text-sky-500">JASA RAHARJA</span></P>
                   <P class=" text-xs font-light text-slate-900">melayani penumpang arus mudik tahun 2025 tanpa di pungut biaya</P>
                </div>
            </div>
        </div>
    </main> --}}



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var menuToggle = document.getElementById('menuToggle');
            var menu = document.getElementById('menu');

            menuToggle.addEventListener('click', function(event) {
                menu.classList.toggle('hidden');
                setTimeout(() => {
                    if (menu.classList.contains('hidden')) {
                        menu.classList.remove('opacity-100');
                        menu.classList.add('opacity-0');
                    } else {
                        menu.classList.remove('opacity-0');
                        menu.classList.add('opacity-100');
                    }
                }, 10);
            });

            document.addEventListener('click', function(event) {
                var isClickInside = menu.contains(event.target) || menuToggle.contains(event.target);

                if (!isClickInside) {
                    menu.classList.add('hidden');
                    menu.classList.remove('opacity-100');
                    menu.classList.add('opacity-0');
                }
            });
        });
    </script>
</body>

</html>
