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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('title')</title>
</head>

<body class="bg-white font-inter">
    <main class="w-full h-screen flex justify-center items-center">
        <div class="w-full max-w-5xl h-5/6 mt-5 border-2 border-slate-200 shadow-lg rounded-md">
            <div class="grid grid-cols-4 h-full">
                <aside class="border-r-2 border-slate-200 rounded-md h-full p-3">
                    <nav class="space-y-4">
                        <a href="{{ route('profile') }}" class="{{ request()->is('profile') ? 'bg-sky-500 text-white' : 'text-gray-700 hover:bg-sky-500 hover:text-white' }} block rounded-md">
                            <div class="flex items-center justify-center p-2 border border-sky-200 rounded-md">
                               <i class="fa-solid fa-user text-sm font-bold "></i>
                                <p class="font-bold text-sm px-2">Profile</p>
                            </div>
                        </a>
                        <a href="{{ route('tiket') }}" class="{{ request()->is('/') ? 'bg-sky-500 text-white' : 'text-gray-700 hover:bg-sky-500 hover:text-white' }} block rounded-md">
                            <div class="flex items-center justify-center p-2 border border-sky-200 rounded-md">
                               <i class="fa-solid fa-ticket text-sm font-bold "></i>
                                <p class="font-bold text-sm px-2">Tiket Ku</p>
                            </div>
                        </a>
                        <a href="{{ route('message') }}" class="{{ request()->is('/') ? 'bg-sky-500 text-white' : 'text-gray-700 hover:bg-sky-500 hover:text-white' }} block rounded-md">
                            <div class="flex items-center justify-center p-2 border border-sky-200 rounded-md">
                              <i class="fa-solid fa-arrow-left text-sm font-bold "></i>
                                <p class="font-bold text-sm px-2">Home</p>
                            </div>
                        </a>
                        <!-- Add more links as needed -->
                    </nav>
                </aside>
                <div class="col-span-3">
                    <section class="w-full bg-slate-50 ">
                        @yield('content')
                    </section>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
