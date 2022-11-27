@extends('AdminPage.master')

@section('content')

    <div class="page-breadcrumb">

        <div class="container-fluid">
                
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pesanan Masuk</h4>
                            <div class="dropdown show">
                                <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Export Data
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item" href="#">ke .xlsx</a>
                                  <a class="dropdown-item" href="#">ke .csv</a>
                                  <a class="dropdown-item" href="#">ke .pdf</a>
                                  <a class="dropdown-item" href="#">ke .json</a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="multi_col_order"
                                    class="table table-striped table-bordered display no-wrap" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat Email</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Banyak Barang</th>
                                            <th>Total Harga</th>
                                            <th>Lokasi Pengiriman</th>
                                            <th>Waktu Pemesanan</th>
                                            <th>Edit | Approve</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order -> username }}</td>
                                                <td>{{ $order -> email }}</td>
                                                <td>{{ $order -> product_name }}</td>
                                                <td>{{ $order -> product_price }}</td>
                                                <td>{{ $order -> order_quantity }}</td>
                                                <td>{{ $order -> order_price_total }}</td>
                                                <td>{{ $order -> location }}</td>
                                                <td>{{ $order -> order_date }}</td>
                                                <td style="display: inline-block;">
                                                    <form action="{{ route('approve') }}" method="POST" style="display: inline-block;" onSubmit="if(!confirm('Apakah barang sudah terkirim ?.')){return false;}">
                                                        @csrf
                                                        <input type="hidden" name="email" value="{{ $order -> email }}">
                                                        <input type="hidden" name="product_url" value="{{ $order -> product_url }}">
                                                        <button class="btn btn-success">kirim</button> 
                                                    </form>
                                                    <form action="{{ route('admin_delete_order') }}" style="display: inline-block;" method="POST" onSubmit="if(!confirm('Hapus pesanan ini ?.')){return false;}">
                                                        @csrf
                                                        <input type="hidden" name="email" value="{{ $order -> email }}">
                                                        <input type="hidden" name="product_url" value="{{ $order -> product_url }}">
                                                        <button class="btn btn-danger">hapus</button> 
                                                    </form>
                                                </td>
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
            
        <footer class="footer text-center text-muted">
            Created By KopiLoe Software Engineer Division.
        </footer>
    </div>
@endsection