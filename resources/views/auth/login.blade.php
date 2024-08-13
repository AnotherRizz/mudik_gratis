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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class=" bg-slate-200">
    <main class=" w-full h-screen flex justify-center align-middle">
      @if (session('alert'))
      <script>
          Swal.fire({
              title: '{{ session('alert.title') }}',
              text: '{{ session('alert.text') }}',
              icon: '{{ session('alert.icon') }}',
          });
      </script>
  @endif
        <div class=" w-full max-w-3xl h-2/3 mt-16 p-6 bg-white">
         <div class=" grid grid-cols-3">
            <div>
               <img src="{{ asset('images/logo-mudik.png') }}" class=" w-full" alt="">
            </div>
            <div class=" col-span-2 ">
               <h1 class=" font-extrabold text-slate-500 text-center text-2xl">LOGIN</h1>
               <form action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class=" w-full grid grid-cols-1 gap-4 mt-10">
                   
                      <div class="mb-4">
                          <label for="email" class="block  text-slate-500 font-bold text-sm">e-mail</label>
                          <input type="email" id="email" name="email" placeholder="risqi@gmail.com"
                              class="w-full px-3 py-2 border-2 rounded-sm shadow-sm text-slate-500 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent @error('email') border-red-500 @enderror">
                          @error('email')
                              <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror
   
                      </div>
                      <!-- Password -->
                      <div class="mb-4">
                          <label for="password" class="block  text-slate-500 font-bold text-sm">password</label>
                          <input type="password" id="password" name="password" placeholder="min 5 karakter"
                              class="w-full px-3 py-2 border-2 rounded-sm shadow-sm text-slate-500 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent @error('password') border-red-500 @enderror">
                          @error('password')
                              <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror
                      </div>
   
                   
                  </div>
                  <div class="mt-5">
                    <button type="submit" class="  px-3 py-1 font-bold bg-sky-500 rounded-md text-white w-full ">masuk
                     </button>
               
               
                  </div>
              </form>
            </div>
         </div>
           

        </div>
    </main>
</body>

</html>
