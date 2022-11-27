@extends('UniversalPage.master')

@section('content')

    {{-- content --}}
    <div class="container mx-auto pt-20">
      <div class="flex space-x-1 py-5 font-medium">
        <span class="cursor-default text-color">Riwayat Pemesanan > </span>
        <span class="cursor-default text-color2">Informasi > </span>
        <span class="cursor-default text-color2">Pembayaran & Pengiriman</span>
      </div>

      <div class="flex my-1 rounded-l-[50px] overflow-hidden shadow-xl">
        <div class="w-3/4 bg-color text-color2 px-10 py-10">

          <div class="flex justify-between border-b-color2 border-b-2 pb-10">
            <h1 class="font-semibold text-2xl">Riwayat Pemesanan</h1>
            <h2 class="font-semibold text-2xl">{{ count($orders) }} Barang</h2> {{-- total product --}}
          </div>

          <div class="flex mt-10 mb-5 text-color2">
            
            <h3 class="font-semibold text-center text-xs uppercase w-1/5">
              Nama Produk
            </h3>

            <h3 class="font-semibold text-center text-xs uppercase w-1/5">
              total
            </h3>

            <h3 class="font-semibold text-center text-xs uppercase w-1/5">
              Harga
            </h3>

            <h3 class="font-semibold text-center text-xs uppercase w-1/5">
              Total
            </h3>

            <h3 class="font-semibold text-center text-xs uppercase w-1/5">
                Status
            </h3>
          </div>

          {{-- product on the cart --}}
          @foreach ($orders as $order)
            <div class="flex items-center hover:bg-color2 hover:bg-opacity-20 transition-all duration-300 -mx-8 px-6 py-5 group">
              {{-- <div class="flex w-1/5">
                
                    <div class="w-20">
                    <img class="h-20 rounded-full" src="upload/{{ $order -> product_image }}"
                        alt="{{ $order -> product_image }}"/>
                    </div>

                    <div class="flex flex-col justify-between ml-4 flex-grow">
                    <span class="font-bold text-sm">  {{ $order -> product_name }}</span>
                    <form action="{{ route('delete_cart') }}" method="POST" onSubmit="if(!confirm('Apakah Anda Ingin Menghapus {{ $order['product_name'] }} ?.')){return false;}">
                        @csrf
                        <input type="hidden" name="product_url" value="{{ $order['product_url'] }}">
                        <button class="font-semibold w-fit text-color2 text-xs transition-all duration-300">
                            Hapus
                        </button>
                    </form>
                    </div>
              </div> --}}

              <div class="flex justify-center w-1/5 font-semibold">
                {{-- <button id="decrement" onclick="decrement('{{ $order['product_url'] }}', '{{ $order['product_price'] }}');">-</button> --}}

                <h3 class="mx-2 transition-all duration-300 text-center" id="{{ $order -> product_url }}">{{ $order -> product_name }}</h3>
                
                {{-- <button id="increment" onclick="increment('{{ $order['product_url'] }}', '{{ $order['product_price'] }}', '{{ $api_token }}');">+</button> --}}
              </div>

              <div class="flex justify-center w-1/5 font-semibold">
                {{-- <button id="decrement" onclick="decrement('{{ $order['product_url'] }}', '{{ $order['product_price'] }}');">-</button> --}}

                <h3 type="number" class="mx-2 bg-color2 text-color transition-all duration-300 text-center w-8 rounded-xl" id="quantity_{{ $order -> product_url }}">{{ $order -> order_quantity }}</h3>
                
                {{-- <button id="increment" onclick="increment('{{ $order['product_url'] }}', '{{ $order['product_price'] }}', '{{ $api_token }}');">+</button> --}}
              </div>

              {{-- single product price --}}
              <span class="text-center w-1/5 font-semibold text-sm">{{ $order -> product_price }}</span>

              {{-- total single product price --}}
              <span id="total_{{ $order -> product_url }}" class="text-center w-1/5 font-semibold text-sm">{{ $order -> order_price_total }}</span>

              <span id="total_{{ $order -> product_url }}" class="text-center w-1/5 font-semibold text-sm">{{ $order -> order_status }}</span>
            </div>
          @endforeach
      
        </div>


        <div id="summary" class="w-1/4 px-8 py-10 bg-color2 text-color">
          <h1 class="font-semibold text-2xl text-center border-b-color border-b-2 pb-10">
            Pemesanan
          </h1>

          <div class="flex justify-between mt-10 mb-5 font-semibold">
            <span class="text-sm uppercase"><span id="total_item_cart">{{ $items }}</span> Item</span>
            {{-- <span id="total_cart_price" class="text-sm">{{ $total_price }}</span> --}}
          </div>

          @for ($__idx_br = 0; $__idx_br < 12; $__idx_br ++)
            <br>
          @endfor

        </div>
        
      </div>

    </div>
@endsection