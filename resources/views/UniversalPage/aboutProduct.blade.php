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
            <a href="#beranda">Beranda</a>
          </li>

          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="#menu">Menu</a>
          </li>

          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="/cart">Keranjang</a>
          </li>

          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="/about">Tentang Produk</a>
          </li>

          <li class="hover:text-color2 hover:-translate-y-1 transition-all duration-300 font-semibold">
            <a href="/teams">Team Kami</a>
          </li>

        </ul>

        @if ($login_success == true) 
          <form action="#" method="post">
            <button btnLogin class="hidden md:block font-semibold group border-[3px] border-black shadow-md">
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

        <li
          class="hover:text-color2 hover:translate-x-1 transition-all duration-300 font-semibold">
          <a href="#beranda">Beranda</a>
        </li>

        <li class="hover:text-color2 hover:translate-x-1 transition-all duration-300 font-semibold">
          <a href="#menu">Menu</a>
        </li>

        <li class="hover:text-color2 hover:translate-x-1 transition-all duration-300 font-semibold">
          <a href="/src/public/cart.html">Keranjang</a>
        </li>

        <li class="hover:text-color2 hover:translate-x-1 transition-all duration-300 font-semibold">
          <a href="/src/public/about-product.html">Tentang Produk</a>
        </li>

        <li class="hover:text-color2 hover:translate-x-1 transition-all duration-300 font-semibold">
          <a href="/src/public/teams-card.html">Team Kami</a>
        </li>

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

            {{-- action="" method="POST" --}}
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
            
            {{-- action="" method="POST" --}}
            <form class="flex flex-col gap-y-5 mt-10">
                @csrf
                <div class="relative">
                    <input class="h-12 w-60 border-b-2 text-color border-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
                        id="username-regis" type="text" placeholder="..." />
                    <label class="absolute transition-all duration-300 left-0 -top-3 flex items-center cursor-text gap-1 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-3.5 peer-focus:-top-3 peer-focus:text-sm peer-focus:font-normal"
                        for="username-regis">Username</label>
                </div>

                <div class="relative">
                    <input class="h-12 w-60 border-b-2 text-color border-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
                        id="email-regis" type="email" placeholder="..."/>
                    <label
                        class="absolute transition-all duration-300 left-0 -top-3 flex items-center cursor-text gap-1 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-3.5 peer-focus:-top-3 peer-focus:text-sm peer-focus:font-normal"
                        for="email-regis">Email</label>
                </div>

                <div class="relative">
                    <input
                        class="h-12 w-60 border-b-2 border-color text-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
                        id="password-regis" type="password" placeholder="..."/>
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
    
    <div
      class="container mx-auto flex px-5 py-28 md:flex-row flex-col items-center"
    >
      <div
        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center"
      >
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-bold">
          Mahakarya kopi dari seorang penikmat kopi
        </h1>
        <p class="mb-8 leading-relaxed font-sm">
          Berawal dari mencoba mencicipi setiap rasa kopi, kami menggagas ide
          dan inovasi untuk membangun sebuah bisnis kopi dengan menggunakan
          sistem digital yang dapat semua orang akses dimanapun kapanpun, dengan
          banyak varian menu dan harga yang terjangkau, serta dengan pengiriman
          yang cepat dan aman.
          <span class="text-color2 font-semibold">
            Silahkan masukan email kamu untuk mendapatkan berita terkini dari
            KOPI.LOE
          </span>
        </p>
        <div class="flex flex-col">
          <div class="relative">
            <input
              class="h-12 w-60 border-b-2 text-color border-color focus:outline-none bg-transparent placeholder-transparent font-semibold peer"
              id="email-regis"
              type="email"
              placeholder="..."
            />
            <label
              class="absolute transition-all duration-300 left-0 -top-3 flex items-center cursor-text gap-1 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-3.5 peer-focus:-top-3 peer-focus:text-sm peer-focus:font-normal"
              for="email-regis"
              >Email</label
            >
          </div>
        </div>
        <button
          class="mt-5 font-semibold group border-[3px] border-black shadow-md w-fit"
        >
          <div
            class="px-3 py-1 transition duration-300 ease-out transform -translate-x-1 -translate-y-1 bg-color text-color2 group-hover:bg-color2 group-hover:text-color group-hover:-translate-x-0 group-hover:-translate-y-0"
          >
            Berlangganan
          </div>
        </button>
      </div>
      <div class="max-w-lg w-full rounded-xl overflow-hidden drop-shadow-2xl">
        <img
          class="object-cover object-center rounded"
          alt="hero"
          src="https://www.yaycork.ie/wp-content/uploads/2018/01/coffee-1-1200x738.jpg"
        />
      </div>
    </div>

    <section class="text-color">
      <div
        class="container px-5 py-10 mx-auto flex flex-wrap bg-color2 rounded-[50px]"
      >
        <div class="flex flex-wrap w-full">
          <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
            <div class="flex relative pb-12">
              <div
                class="h-full w-10 absolute inset-0 flex items-center justify-center"
              >
                <div class="h-full w-1 bg-color pointer-events-none"></div>
              </div>
              <div
                class="flex-shrink-0 w-10 h-10 rounded-full bg-primary2 inline-flex items-center justify-center text-color relative z-10"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-box-arrow-in-right"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                  />
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2
                  class="font-bold title-font text-sm text-color mb-1 tracking-wider"
                >
                  STEP 1 | LOGIN / REGISTER
                </h2>
                <p class="leading-relaxed">
                  Silahkan register atau login terlebih dahulu dengan mengklik
                  tombol yang terdapat di menu navigasi
                </p>
              </div>
            </div>
            <div class="flex relative pb-12">
              <div
                class="h-full w-10 absolute inset-0 flex items-center justify-center"
              >
                <div class="h-full w-1 bg-color pointer-events-none"></div>
              </div>
              <div
                class="flex-shrink-0 w-10 h-10 rounded-full bg-primary2 inline-flex items-center justify-center text-color relative z-10"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-cup-hot-fill"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l.131-.59a3 3 0 0 0 1.3-5.854l.221-.99A.5.5 0 0 0 13.5 6H.5ZM13 12.5a2.01 2.01 0 0 1-.316-.025l.867-3.898A2.001 2.001 0 0 1 13 12.5Z"
                  />
                  <path
                    d="m4.4.8-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 3.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 3.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 3 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 4.4.8Zm3 0-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 6.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 6.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 6 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 7.4.8Zm3 0-.003.004-.014.019a4.077 4.077 0 0 0-.204.31 2.337 2.337 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.198 3.198 0 0 1-.202.388 5.385 5.385 0 0 1-.252.382l-.019.025-.005.008-.002.002A.5.5 0 0 1 9.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 9.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 9 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 10.4.8Z"
                  />
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2
                  class="font-bold title-font text-sm text-color mb-1 tracking-wider"
                >
                  STEP 2 | PILIH PRODUK
                </h2>
                <p class="leading-relaxed">
                  Kemudian silhakan pilih produk yang mau kamu beli
                </p>
              </div>
            </div>
            <div class="flex relative pb-12">
              <div
                class="h-full w-10 absolute inset-0 flex items-center justify-center"
              >
                <div class="h-full w-1 bg-color pointer-events-none"></div>
              </div>
              <div
                class="flex-shrink-0 w-10 h-10 rounded-full bg-primary2 inline-flex items-center justify-center text-color relative z-10"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-cart-check"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"
                  />
                  <path
                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                  />
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2
                  class="font-bold title-font text-sm text-color mb-1 tracking-wider"
                >
                  STEP 3 | KERANJANG
                </h2>
                <p class="leading-relaxed">
                  Semua produk yang kamu pilih akan dimasukan kedalam keranjang,
                  kemudian semua jumlah produk akan di kalkulasi
                </p>
              </div>
            </div>
            <div class="flex relative pb-12">
              <div
                class="h-full w-10 absolute inset-0 flex items-center justify-center"
              >
                <div class="h-full w-1 bg-color pointer-events-none"></div>
              </div>
              <div
                class="flex-shrink-0 w-10 h-10 rounded-full bg-primary2 inline-flex items-center justify-center text-color relative z-10"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-wallet"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"
                  />
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2
                  class="font-bold title-font text-sm text-color mb-1 tracking-wider"
                >
                  STEP 4 | PEMBAYARAN
                </h2>
                <p class="leading-relaxed">
                  Silahkan memberikan informasi alamat lengkap mu guna untuk
                  mengirimkan pesanan
                </p>
              </div>
            </div>
            <div class="flex relative">
              <div
                class="flex-shrink-0 w-10 h-10 rounded-full bg-primary2 inline-flex items-center justify-center text-color relative z-10"
              >
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                >
                  <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                  <path d="M22 4L12 14.01l-3-3"></path>
                </svg>
              </div>
              <div class="flex-grow pl-4">
                <h2
                  class="font-bold title-font text-sm text-color mb-1 tracking-wider"
                >
                  SELESAI | KOPI KAMU SIAP DIANTAR
                </h2>
                <p class="leading-relaxed">
                  Pesanan telah berhasil di buat dan siap diantar ke tujuan
                </p>
              </div>
            </div>
          </div>
          <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
          <lord-icon
            class="flex justify-center items-center ml-32"
            src="https://cdn.lordicon.com/tvyxmjyo.json"
            trigger="loop"
            delay="2000"
            style="width: 250px; height: 250px"
          >
          </lord-icon>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="mt-10 bg-color">
      <div class="container py-8 mx-auto flex items-center text-color2">
        <p class="text-sm ml-4 pl-4 border-l-2 border-color2 py-2">
          © 2022 KOPI.LOE
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

    <!-- script -->
    <script src="{{ asset('tailwind/js/nav.js') }}"></script>
  </body>
</html>
