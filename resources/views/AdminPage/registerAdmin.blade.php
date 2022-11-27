@extends('AdminPage.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12"> 
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Admin</h4>
                        {{--  --}}
                        <form method="POST" action="{{ route('admin_register') }}">
                            @csrf
                            <div class="form-body">
                                <label id="product-name">Nama Lengkap Admin</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="username" type="text" id="username" class="form-control" placeholder="Masukan Nama Lengkap" required>
                                        </div>
                                    </div>
                                </div>
                                <label for="product-price">Alamat Email</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="email" type="email" id="email" class="form-control" placeholder="Masukan Alamat Email" required>
                                        </div>
                                    </div>
                                </div>
                                <label for="product-price">Kata Sandi</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="password" type="password" id="password" class="form-control" placeholder="Masukan Kata Sandi" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Tambahkan</button>
                                    <a href="{{ route('admin_register_view') }}">
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