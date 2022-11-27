@extends('AdminPage.master')

@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Datang, {{ $username }}.</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- *************************************************************** -->
            <!-- Start First Cards -->
            <!-- *************************************************************** -->
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $parameters -> customers}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pelanggan</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-users" style="font-size: 30px; color: #4762e7"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $parameters -> products}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Produk</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-cubes" style="font-size: 30px; color: #4762e7"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $parameters -> orders}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pesanan</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-cart-plus" style="font-size: 30px; color: #4762e7"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium"><sup
                                    class="set-doller">Rp.</sup>{{ $parameters -> incomes}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pemasukan</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-plus" style="font-size: 30px; color: #4762e7"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sekilas Pesanan Masuk</h4>
                            <h6 class="card-subtitle">Untuk melakukan perubahan dan menghapus, harap menuju fitur 
                                <a href="/orders"><b>Pesanan</b></a>
                            .</h6>
                            <div class="table-responsive">
                                <table id="multi_col_order"
                                    class="table table-striped table-bordered display no-wrap" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Barang</th>
                                            <th>Banyak Barang</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($parameters -> active_orders as $order)
                                            <tr>
                                                <td>{{ $order -> username }}</td>
                                                <td>{{ $order -> product_name }}</td>
                                                <td>{{ $order -> quantity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
        </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            Created By KopiLoe Software Engineer Division.
        </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
    </div>
@endsection