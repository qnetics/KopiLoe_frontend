@extends('UniversalPage.master')

@section('content')
    <!-- Beranda -->
    <section id="beranda">
      <div class="container h-screen mx-auto flex justify-center items-center">
        <div
          class="w-full text-color tracking-wide flex flex-col items-center lg:text-start"
        >
          <span class="text-8xl font-bold mb-3"
            >Kopi<span class="text-color2">Loe.</span>
          </span>
          <h1 class="text-2xl font-semibold text-color2 mb-7">
            Praktis,Cepat <span class="text-color">dan Mudah</span>
          </h1>
          <a
            href="#menu"
            class="w-fit font-semibold group border-[3px] border-black shadow-md z-10"
          >
            <div
              class="px-3 py-1 transition duration-300 ease-out transform -translate-x-1 -translate-y-1 bg-color text-color2 group-hover:bg-color2 group-hover:text-color group-hover:-translate-x-0 group-hover:-translate-y-0"
            >
              Menu Kami
            </div>
          </a>
        </div>
        <span
          class="hidden md:block absolute w-1/2 h-1/2 border-y-2 border-y-color"
        ></span>
      </div>
    </section>

    <!-- Menu -->
    <section id="menu">
      <div class="container flex flex-col items-center mx-auto">
        <!-- Tabs -->
        <ul id="tabs" class="flex space-x-2 w-fit bg-color2 px-2 py-1 rounded-full mb-10">

          @for ($category_index = 0; $category_index < count($categories); $category_index ++)

            @if ($category_index == 0)
              <li class="bg-color px-3 rounded-full text-color2 font-semibold py-1 transition-all duration-300 ease-in-out">
                <a id="default-tab" href="#{{ $categories[$category_index] }}">
                  {{ $categories[$category_index] }}</a>
              </li>
            @else 
              <li class="px-3 rounded-full font-semibold py-1 transition-all duration-300 ease-in-out">
                <a href="#{{ $categories[$category_index] }}">
                  {{ $categories[$category_index] }}</a>
              </li>
            @endif

          @endfor

        </ul>

        <!-- Tab Contents -->
        <div id="tab-contents" class="bg-color2 p-5 rounded-[50px]">

          @for ($product_category_index = 0; $product_category_index < count($products); $product_category_index ++)
            <div id="{{ $products[$product_category_index] -> category }}" class="flex flex-wrap justify-center gap-3">

              @for ($product_index = 0; $product_index < count($products[$product_category_index] -> products); $product_index ++)
                <div class="sm:w-full lg:w-1/4">
                  <div class="flex relative rounded-xl overflow-hidden">
                    <img
                      alt="gallery"
                      class="absolute w-full h-full object-cover object-center"
                      src="{{ asset('uploads/'.$products[$product_category_index] -> products[$product_index] -> product_image) }}"
                    />
                    <div
                      class="px-8 py-10 relative z-10 w-full backdrop-blur-xl opacity-0 hover:opacity-100 transition-all duration-300 ease-in-out"
                    >
                      <h2
                        class="tracking-wider text-center text-2xl font-bold text-color2 mb-1"
                      >
                      {{ $products[$product_category_index] -> products[$product_index] -> product_name }}
                      </h2>
                      <div class="flex space-x-2">
                        <span
                          class="text-sm font-medium bg-color text-color2 px-2 py-1 rounded-full"
                          >{{ $products[$product_category_index] -> category }}</span
                        >
                        <span
                          class="text-sm font-medium bg-color text-color2 px-2 py-1 rounded-full"
                          >Best</span
                        >
                      </div>

                      <div class="pt-2 flex space-x-2">
                        <span class="text-2xl font-bold">★★★★☆</span>
                      </div>
                      <div class="flex justify-between items-center pt-2">
                        <h3 class="font-semibold text-color2 text-xl">{{ $products[$product_category_index] -> products[$product_index] -> product_price }}</h3>
                        <form action="{{ route('add_to_cart') }}" method="POST" onSubmit="if(!confirm('Masukan {{

                              $products[$product_category_index] -> products[$product_index] -> product_name
                              
                            }} ke dalam keranjang?.')){return false;}">
                            <input type="hidden" name="product_url" value="{{ $products[$product_category_index] -> products[$product_index] -> product_url }}">
                            <button class="px-2 py-1 rounded-xl bg-color text-color2 hover:bg-opacity-80 transition-all duration-300 ease-in-out">
                              Tambahkan
                            </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endfor
            </div>
          @endfor
        </div>
      </div>
    </section>
@endsection
