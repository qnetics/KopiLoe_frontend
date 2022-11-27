@extends('AdminPage.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pelanggan</h4>
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
                                            <th>Nomor HP</th>
                                            <th>Alamat Email</th>
                                            <th>Waktu Pemesanan</th>
                                            <th>Edit | Hapus</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>William</td>
                                            <td>085718906257</td>
                                            <td>test@test.com</td>
                                            <td>12-05-2021 08:40:41</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">edit</button> 
                                                <button type="button" class="btn btn-success">selesai</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Thomas Rafles</td>
                                            <td>085718906257</td>
                                            <td>test@test.com</td>
                                            <td>12-05-2021 08:40:41</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">edit</button> 
                                                <button type="button" class="btn btn-success">hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Adinda Puspa</td>
                                            <td>085718906257</td>
                                            <td>test@test.com</td>
                                            <td>12-05-2021 08:40:41</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">edit</button> 
                                                <button type="button" class="btn btn-success">hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>richard stallaman</td>
                                            <td>085718906257</td>
                                            <td>test@test.com</td>
                                            <td>12-05-2021 08:40:41</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" onclick="alert('order_id=1')">edit</button> 
                                                <button type="button" class="btn btn-success" onclick="confirm('Ingin Menyelesaikan Pesanan ?') ? console.log('hapus') : console.log('tidak hapus')">hapus</button>
                                            </td>
                                        </tr>
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