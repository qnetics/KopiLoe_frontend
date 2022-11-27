<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
 
  <head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/kopiloe-fav.png') }}">
    <link rel="stylesheet" href="{{ asset('tailwind/css/output.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
      integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
      crossorigin=""
    />
    <title>Selamat datang di KopiLoe.</title>
  </head>
  <body class="font-poppins bg-primary">
    <!-- Navbar -->
    <nav id="navBlur" class="w-full fixed py-2 z-50 transition-all ease-in-out">
      <div class="container mx-auto flex justify-center md:justify-between items-center text-color">
        <img class="hidden md:block w-32"
            src="{{ asset('tailwind/img/company-icon/KOPILOE (new).png') }}" alt=""/>
        <ul class="hidden md:flex space-x-10">

          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="{{ route('home') }}">Beranda</a>
          </li>

          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="{{ route('home') }}#menu">Menu</a>
          </li>
          
          @if ($cart_active)
            <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
              <a href="{{ route('cart') }}">Keranjang</a>
            </li>
          @endif

          @if ($cart_active)
            <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
              <a href="{{ route('user_order') }}">Pesanan</a>
            </li>
          @endif

          @if ($cart_active)
            <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
              <a href="/location">Lokasi</a>
            </li>
          @endif

          @if ($login_success)
            <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
              <a href="{{ route('profile') }}">Profil</a>
            </li>
          @endif

          @if (!$login_success) 
            <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
              <a href="/about">Tentang Produk</a>
            </li>
          @endif

          @if (!$login_success) 
            <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
              <a href="/teams">Team Kami</a>
            </li>
          @endif

          @if ($login_success && !$cart_active)
            <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
              <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
          @endif

        </ul>

        @if ($login_success) 
          <form action="{{ route('logout') }}" method="POST" onSubmit="if(!confirm('Yakin ingin keluar ?.')){return false;}">
            <button btnLogin btnClose class="hidden md:block font-semibold group border-[3px] border-black shadow-md">
              <div class="px-3 py-1 transition duration-300 ease-out transform -translate-x-1 -translate-y-1 bg-color text-color2 group-hover:bg-color2 group-hover:text-color group-hover:-translate-x-0 group-hover:-translate-y-0">
                KELUAR
              </div>
            </button>
          </form>
        @else
          <button btnLogin class="hidden md:block font-semibold group border-[3px] border-black shadow-md">
            <div class="px-3 py-1 transition duration-300 ease-out transform -translate-x-1 -translate-y-1 bg-color text-color2 group-hover:bg-color2 group-hover:text-color group-hover:-translate-x-0 group-hover:-translate-y-0">
              MASUK
            </div>
          </button>
        @endif
        
        <button btnMenu class="md:hidden flex flex-col gap-2 group z-50 p-2">
          <span
            class="w-[30px] h-0.5 bg-color group-focus:rotate-45 origin-top-left transition ease-in-out duration-300"
          ></span>
          <span
            class="w-[30px] h-0.5 bg-color group-focus:scale-0 transition ease-in-out duration-300"
          ></span>
          <span
            class="w-[30px] h-0.5 bg-color group-focus:-rotate-45 origin-bottom-left transition ease-in-out duration-300"
          ></span>
        </button>
      </div>
 
      <ul class="absolute w-full mt-2 bg-inherit flex flex-col md:hidden shadow-lg items-center gap-4 py-2 transition duration-300 ease-in-out"
        id="m-menu">

        <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
          <a href="{{ route('home') }}">Beranda</a>
        </li>

        <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
          <a href="{{ route('home') }}#menu">Menu</a>
        </li>
        
        @if ($cart_active)
          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="{{ route('cart') }}">Keranjang</a>
          </li>
        @endif

        @if ($cart_active)
          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="/order">Pesanan</a>
          </li>
        @endif

        @if ($cart_active)
          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="/location">Lokasi</a>
          </li>
        @endif

        @if ($login_success)
          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="{{ route('profile') }}">Profil</a>
          </li>
        @endif

        @if (!$login_success) 
          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="/about">Tentang Produk</a>
          </li>
        @endif

        @if (!$login_success) 
          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="/teams">Team Kami</a>
          </li>
        @endif

        @if ($login_success && !$cart_active)
          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="{{ route('dashboard') }}">Dashboard</a>
          </li>
        @endif

      </ul>
    </nav>

    <!-- Login & Register -->
    <section id="loginRegis"
      class="h-screen fixed inset-0 flex justify-center items-center backdrop-blur-md z-50 -translate-y-full transition-all duration-300 ease-in-out">
      
      <div
        class="relative flex w-[300px] h-[500px] shadow-2xl shadow-black rounded-xl overflow-hidden">
        
        <button btnClose
          class="absolute right-2 top-0 text-3xl font-black z-10">
          X
        </button>

        <div id="loginPage"
          class="flex flex-col bg-color2 items-center w-full h-full py-10 px-8 transition-all duration-300 ease-in-out">
          <img src="{{ asset('tailwind/img/company-icon/login.png') }}" width="60px" alt="" />

            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-y-10 mt-10">

                <div class="relative">
                    <input
                        class="h-12 w-60 border-b-2 text-color border-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
                        id="email" type="email" placeholder="..." name="email" required/>
                    <label
                        class="absolute transition-all duration-300 left-0 -top-3 flex items-center cursor-text gap-1 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-3.5 peer-focus:-top-3 peer-focus:text-sm peer-focus:font-normal"
                        for="email">Email</label>
                </div>

                <div class="relative">
                    <input
                        class="h-12 w-60 border-b-2 border-color text-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
                        id="password" type="password" placeholder="..." name="password" required/>
                    <label
                        class="absolute transition-all duration-300 left-0 -top-3 flex items-center cursor-text gap-1 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-3.5 peer-focus:-top-3 peer-focus:text-sm peer-focus:font-normal"
                        for="password">Password</label>

                    @if ($type == 'login' && $failed)
                      <br>
                      <br>
                      {{-- password / email salah --}}
                      <p id="login-alert" class="text-center font-bold" style="color: rgb(255, 70, 70)">
                        {{ $message }}</p>
                    @endif

                </div>
                <div class="flex flex-col space-y-5 items-center mt-1">
                    <button btnAuthFailed class="font-semibold group border-[3px] border-black shadow-md w-fit">
                        <div class="px-3 py-1 transition duration-300 ease-out transform -translate-x-1 -translate-y-1 bg-color text-color2 group-hover:bg-color2 group-hover:text-color group-hover:-translate-x-0 group-hover:-translate-y-0">
                            Masuk
                        </div>
                      </button>
                    <div style="cursor: pointer">
                      <div btnRegis class="text-sm">Belum Punya Akun ?.</div>
                    </div>
                </div>
            </form>
        </div>

        <div id="regisPage"
          class="flex flex-col bg-color2 items-center w-full h-full py-10 px-8 transition-all duration-300 ease-in-out">

          <img src="{{ asset('tailwind/img/company-icon/personal.png') }}" width="60px" alt="" />
            
            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-y-5 mt-10">
                @csrf
                <div class="relative">
                    <input class="h-12 w-60 border-b-2 text-color border-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
                        id="username-regis" type="text" placeholder="..." name="username" required/>
                    <label class="absolute transition-all duration-300 left-0 -top-3 flex items-center cursor-text gap-1 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-3.5 peer-focus:-top-3 peer-focus:text-sm peer-focus:font-normal"
                        for="username-regis">Username</label>
                </div>

                <div class="relative">
                    <input class="h-12 w-60 border-b-2 text-color border-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
                        id="email-regis" type="email" placeholder="..." name="email" required/>
                    <label
                        class="absolute transition-all duration-300 left-0 -top-3 flex items-center cursor-text gap-1 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-3.5 peer-focus:-top-3 peer-focus:text-sm peer-focus:font-normal"
                        for="email-regis">Email</label>
                </div>

                <div class="relative">
                    <input
                        class="h-12 w-60 border-b-2 border-color text-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
                        id="password-regis" type="password" placeholder="..." name="password" required/>
                    <label class="absolute transition-all duration-300 left-0 -top-3 flex items-center cursor-text gap-1 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-3.5 peer-focus:-top-3 peer-focus:text-sm peer-focus:font-normal"
                        for="password-regis">Password</label>

                    @if ($type == 'register' && $failed)
                      <br>
                      <br>
                      {{-- password / email salah --}}
                      <p id="login-alert" class="text-center font-bold" style="color: rgb(255, 70, 70)">
                        {{ $message }}</p>
                    @endif
                </div>
                
                <div class="flex flex-col space-y-5 items-center mt-1">
                    <button class="font-semibold group border-[3px] border-black shadow-md w-fit">
                        <div class="px-3 py-1 transition duration-300 ease-out transform -translate-x-1 -translate-y-1 bg-color text-color2 group-hover:bg-color2 group-hover:text-color group-hover:-translate-x-0 group-hover:-translate-y-0">
                            Buat Akun
                        </div>
                    </button>

                    <div style="cursor: pointer">
                        <div btnKeLogin class="text-sm">Sudah Punya Akun ?</div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </section>

    @yield('content')

    <!-- Footer -->
    <footer class="mt-10 bg-color">
      <div class="container py-8 mx-auto flex items-center text-color2">
        <p class="text-sm ml-4 pl-4 border-l-2 border-color2 py-2">
          © 2022 KopiLoe.
        </p>
        <span
          class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start"
        >
          <a class="">
            <svg
              fill="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
              ></path>
            </svg>
          </a>
          <a class="ml-3">
            <svg
              fill="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
              ></path>
            </svg>
          </a>
          <a class="ml-3">
            <svg
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
              <path
                d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
              ></path>
            </svg>
          </a>
          <a class="ml-3">
            <svg
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="0"
              class="w-5 h-5"
              viewBox="0 0 24 24"
            >
              <path
                stroke="none"
                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
              ></path>
              <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
          </a>
        </span>
      </div>
    </footer>

    <!-- Script -->
    <script src="{{ asset('tailwind/js/nav.js') }}"></script>
    <script src="{{ asset('tailwind/js/app.js') }}"></script>
    <script src="{{ asset('tailwind/js/map.js') }}"></script>
    <script src="{{ asset('tailwind/js/cart.js') }}"></script>
    <script>
      const gotoRegisWithMessage = () => {

        loginRegis.classList.remove("-translate-y-full");
        loginPage.classList.toggle("-translate-x-full");
        regisPage.classList.toggle("-translate-x-full");
      }

      @if ($type == 'register')
        gotoRegisWithMessage();
      
      @elseif ($type == 'login')
        loginRegis.classList.remove("-translate-y-full");
        
      @endif
      
      document.getElementById("default-tab").click();
      
    </script>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
      integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
  </body>
</html>
