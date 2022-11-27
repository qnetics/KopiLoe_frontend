@extends('AdminPage.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12"> 
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Produk</h4>
                        {{--  --}}
                        <form method="POST" action="{{ route('add_new_product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <label id="product-name">Nama Produk</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="product_name" type="text" id="product-name" class="form-control" placeholder="Masukan Nama Produk" required>
                                        </div>
                                    </div>
                                </div>
                                <label for="product-price">Harga Produk</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="product_price" type="number" id="product-price" class="form-control" placeholder="Masukan Harga" required>
                                        </div>
                                    </div>
                                </div>
                                <label for="product-category">Kategori Produk</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select name="product_category" id="product-category" class="form-control" required>
                                                <option selected><b>--- Kategori ---</b></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category }}">{{ $category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <label for="product-image">Upload Gambar Produk</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="product_image" type="file" id="product-image" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Tambahkan</button>
                                    <a href="{{ route('products') }}">
                                        <div class="btn btn-dark">Kembali</div>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection