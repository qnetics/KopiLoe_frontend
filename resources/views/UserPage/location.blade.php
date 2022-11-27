@extends('UniversalPage.master')

@section('content')
    <main class="flex items-center justify-center h-screen pt-10">
        <!-- Component Start -->
        <div class="grid grid-cols-3 gap-8 items-center rounded-xl bg-color2 text-color p-5">
            <div class="col-span-2">
                <h1 class=" w-fit px-2 py-1 bg-color2 text-color font-bold">
                    LOKASI PENGIRIMAN
                </h1>
            <div class="bg-color overflow-hidden text-color2 rounded-xl mt-4 shadow-lg">
                <div id="map" class="h-[300px]"></div>
                <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
                    integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
                <div class="p-5">
                    <h3 class="border-2 w-fit px-2 py-1 bg-color2 text-color font-bold rounded-full">
                        POWERED BY OPENSTREETMAP
                    </h3>
                </div>
            </div>
        </div>
        <div class="text-color2">
            <div class="bg-color rounded-xl mt-4 shadow-2xl shadow-black py-6">
                
                <form action="{{ route('add_location') }}" method="POST" onSubmit="if(!confirm('Apakah Sudah Sesuai Dengan Alamat Anda ?.')){return false;}">
                    <div class="px-8 mt-4">
                        <div class="flex items-end justify-between">
                            <textarea style="border-radius : 10px;" class="bg-color2 border-color text-color font-semibold peer" style="color : black" name="user_location" id="" cols="30" rows="10" placeholder="Masukan Lokasi Anda..." required>{{ $location }}</textarea>
                        </div>
                    </div>
                    <div class="p-4 mt-5">
                        <button class="font-semibold group border-[3px] border-color2 hover:border-opacity-70 shadow-md w-full">
                            <div class="px-3 py-1 transition duration-300 ease-out transform -translate-x-1 -translate-y-1 bg-color2 text-color group-hover:bg-opacity-70 group-hover:-translate-x-0 group-hover:-translate-y-0">
                                Tentukan Lokasi
                            </div>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </main>
@endsection