@extends('UniversalPage.master')

@section('content')

    <div class="container mx-auto flex flex-col pt-20">
        <form action="{{ route('edit_profile') }}" method="POST" class="flex flex-col items-center mt-10 text-color"
            onSubmit="if(!confirm('Apakah Anda Ingin Mengedit Profile?.')){return false;}">
            <h1 class="font-semibold">Profil</h1>

            <div class="relative mt-5">
                <input class="p-1 w-full border-2 text-color border-color focus:outline-none bg-color2 rounded-full placeholder-transparent font-semibold peer"
                    id="nomor" type="text" placeholder="..." name="username"/>
                <label class="absolute -top-5 text-sm transition-all duration-300 flex cursor-text peer-placeholder-shown:left-3 peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-sm peer-focus:left-2 peer-focus:font-normal"
                    for="nomor">{{ $profile -> username }}</label>
            </div>

            <br>

            <div class="flex space-x-1 mt-5">
                <div class="relative">
                    <input class="p-1 w-full border-2 text-color border-color focus:outline-none bg-color2 rounded-full placeholder-transparent font-semibold peer"
                        id="namaDepan" type="email" placeholder="..." name="email"/>
                    <label class="absolute -top-5 text-sm transition-all duration-300 flex cursor-text peer-placeholder-shown:left-3 peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-sm peer-focus:left-2 peer-focus:font-normal"
                        for="namaDepan">{{ $profile -> email }}</label>
                </div>
                <div class="relative">
                    <input class="p-1 w-full border-2 text-color border-color focus:outline-none bg-color2 rounded-full placeholder-transparent font-semibold peer"
                        id="namaBelakang" type="password" placeholder="..." name="password" />
                    <label class="absolute -top-5 text-sm transition-all duration-300 flex cursor-text peer-placeholder-shown:left-3 peer-placeholder-shown:text-base peer-placeholder-shown:font-medium peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-sm peer-focus:left-2 peer-focus:font-normal"
                        for="namaBelakang">Kata Sandi</label>
                </div>
            </div>

            <br>

            <div class="flex flex-col gap-y-5 mt-5">
                <div class="flex justify-evenly">
                    <button class="font-semibold group border-[3px] border-color shadow-md w-fit flex">
                        <div class="px-3 py-1 transition duration-300 ease-out transform -translate-x-1 -translate-y-1 bg-color text-color2 group-hover:bg-color2 group-hover:text-color group-hover:-translate-x-0 group-hover:-translate-y-0">
                            Edit Profil
                        </div>
                    </button>
                </div>
            </div>
            
        </form>

        @for($i = 1; $i < 8; $i ++)
            <br>
        @endfor

    </div>

@endsection