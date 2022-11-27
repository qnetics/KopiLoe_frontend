@extends('AdminPage.master')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12"> 
                <div class="card">
                    <div class="card-body">

                        {{-- form --}}
                        <label for="category-name">
                            <h4 class="card-title">Tambah Kategori</h4>
                        </label>
                        <form method="POST" action="{{ route('add_category') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="category" type="text" id="category-name" class="form-control" placeholder="Masukan Nama Kategori" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-info">Tambahkan</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kategori Produk</h4>
                        <h6 class="card-subtitle">Daftar Jenis Kategori Produk</h6>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Jenis Kategori Produk</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category }}</td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection