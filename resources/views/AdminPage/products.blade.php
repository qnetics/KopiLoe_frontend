@extends('AdminPage.master')

@section('content') 

    <div class="container">
        <br><br>
        <a href="{{ route('add_products') }}" class="btn btn-primary"><b>Tambah Produk</b></a>
        <br><hr><br>
        <div class="row">
            <div class="col-12">
                <!-- Row -->
                <div class="row">
                    <!-- column -->

                    @foreach ($data_response as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height: 200px; width: 300px" src="{{ asset('uploads/'.$product -> product_image) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $product -> product_name }}</h4>
                                    <p class="card-text"><b>{{ $product -> product_price }}</b></p>

                                    {{-- edit button --}}
                                    <a style="display : inline-block;"
                                          href="{{ route('edit_product_view'). '/?product_url=' .$product -> product_url }}">

                                        <button type="submit" class="btn btn-success">edit</button>
                                    </a>

                                    {{-- delete button --}}
                                    <form style="display : inline-block;"
                                          action="{{ route('delete_product'). '/?product_url=' .$product -> product_url }}"
                                          method="POST"
                                          onSubmit="if(!confirm('Apakah Anda Ingin Menghapus {{ $product -> product_name }} ?.')){return false;}">

                                        <button type="submit" class="btn btn-danger">hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <!-- Row -->
            </div>
        </div>
    </div>

@endsection