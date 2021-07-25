@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Sistem Informasi Laporan Inventaris <small>Kecamatan Taman</small></h5>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard Admin Kecamatan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="lockscreen-wrapper">
                <div class="lockscreen-logo">
                    <img src="https://siksda.sidoarjokab.go.id/images/logo.png" alt="logo sidoarjo">
                    <h2>Kecamatan Taman Kabupaten Sidoarjo</h2>
                    <h6>Laporan Inventaris Terpadu</h6>
                </div>
                <!-- Small boxes (Stat box) -->
{{--                <div class="row">--}}
{{--                    <div class="col-lg-3 col-6">--}}
{{--                        <!-- small box -->--}}
{{--                        <div class="small-box bg-warning">--}}
{{--                            <div class="inner">--}}
{{--                                <h3>150</h3>--}}

{{--                                <p>Belanja Keseluruhan</p>--}}
{{--                            </div>--}}
{{--                            <div class="icon">--}}
{{--                                <i class="ion ion-bag"></i>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- ./col -->--}}
{{--                    <div class="col-lg-3 col-6">--}}
{{--                        <!-- small box -->--}}
{{--                        <div class="small-box bg-success">--}}
{{--                            <div class="inner">--}}
{{--                                <h3>80</h3>--}}

{{--                                <p>Belanja Modal</p>--}}
{{--                            </div>--}}
{{--                            <div class="icon">--}}
{{--                                <i class="ion ion-stats-bars"></i>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- ./col -->--}}
{{--                    <div class="col-lg-3 col-6">--}}
{{--                        <!-- small box -->--}}
{{--                        <div class="small-box bg-info">--}}
{{--                            <div class="inner">--}}
{{--                                <h3>40</h3>--}}

{{--                                <p>Pemeliharaan</p>--}}
{{--                            </div>--}}
{{--                            <div class="icon">--}}
{{--                                <i class="ion ion-person-add"></i>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- ./col -->--}}
{{--                    <div class="col-lg-3 col-6">--}}
{{--                        <!-- small box -->--}}
{{--                        <div class="small-box bg-danger">--}}
{{--                            <div class="inner">--}}
{{--                                <h3>65</h3>--}}

{{--                                <p>Konstruksi</p>--}}
{{--                            </div>--}}
{{--                            <div class="icon">--}}
{{--                                <i class="ion ion-pie-graph"></i>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- ./col -->--}}
{{--                </div>--}}
                <!-- /.row -->
                <!-- drop menu-->
{{--                <div class="col-3"></div>--}}
{{--                <div class="btn-group dropright">--}}
{{--                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        Belanja Keselurahan--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <!-- Dropdown menu links -->--}}
{{--                        <a class="dropdown-item" href="#">Belanja Keseluruhan</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Modal</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Pemeliharaan Kendaraan</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Pemeliharaan Gedung</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Pemeliharaan Gorong-gorong</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Pemeliharaan Jalan</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Konstruksi Paving</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Konstruksi Gedung</a>--}}
{{--                    </div>--}}
{{--                </div><div class="btn-group dropright">--}}
{{--                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        Belanja Keselurahan--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <!-- Dropdown menu links -->--}}
{{--                        <a class="dropdown-item" href="#">Belanja Keseluruhan</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Modal</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Pemeliharaan Kendaraan</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Pemeliharaan Gedung</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Pemeliharaan Gorong-gorong</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Pemeliharaan Jalan</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Konstruksi Paving</a>--}}
{{--                        <a class="dropdown-item" href="#">Belanja Konstruksi Gedung</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
{{--            <h3></h3>--}}
            <!-- /.drop menus -->
{{--            <!-- tabel view-->--}}
{{--            <table class="table table-hover">--}}
{{--                <thead>--}}
{{--                <tr  class="table-success">--}}
{{--                    <th scope="col">No</th>--}}
{{--                    <th scope="col">Instansi</th>--}}
{{--                    <th scope="col">Nama Belanja</th>--}}
{{--                    <th scope="col">Rincian</th>--}}
{{--                    <th scope="col">Harga</th>--}}
{{--                    <th scope="col">Tgl</th>--}}
{{--                    <th scope="col">PPB/LS</th>--}}
{{--                    <th scope="col">CV</th>--}}
{{--                    <th scope="col">Nomor Pesanan/SPK</th>--}}
{{--                    <th scope="col">Tgl SPK</th>--}}
{{--                    <th scope="col">Nomor BAST</th>--}}
{{--                    <th scope="col">Tgl BAST</th>--}}
{{--                    <th scope="col">no SP2D</th>--}}
{{--                    <th scope="col">Tgl SP2D</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                <tr>--}}
{{--                    <th scope="row">1</th>--}}
{{--                    <td>Kelurahan Kalijaten</td>--}}
{{--                    <td>Belanja Modal Alat Pendingin ( AC 1 PK )</td>--}}
{{--                    <td>AC Daikin 1 PK Malaysia FTV 25 CXV 14 RV 25 CXV 14</td>--}}
{{--                    <td>3.000.000</td>--}}
{{--                    <td>12-03-2021</td>--}}
{{--                    <td>000021/PPB/6010111-03/2021</td>--}}
{{--                    <td>CV EL SHADDAI KONSULTAN</td>--}}
{{--                    <td>027/3.5.3.1/ppkom.438.7.7/2021</td>--}}
{{--                    <td>29-02-2021</td>--}}
{{--                    <td>027/3.5.3.4/ppkom.438.7.7/2021</td>--}}
{{--                    <td>10-03-2021</td>--}}

{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th scope="row">2</th>--}}
{{--                    <td>Keluarahan Taman</td>--}}
{{--                    <td>Belanja Modal Mebel Backdrop Pelayanan</td>--}}
{{--                    <td>backdrop Ruang Pelayanan</td>--}}
{{--                    <td>13.500.000</td>--}}
{{--                    <td>23-02-2021</td>--}}
{{--                    <td>00015/PPB/7011100-07/2021</td>--}}
{{--                    <td>setia jaya</td>--}}
{{--                    <td>027/2.8.2.6.1/ppkom.438.7.7/2021</td>--}}
{{--                    <td>03-02-2021</td>--}}
{{--                    <td>027/2.8.2.6.4/ppkom.438.7.7/2021</td>--}}
{{--                    <td>11-02-2021</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th scope="row">3</th>--}}
{{--                    <td colspan="2">Larry the Bird</td>--}}
{{--                    <td>@twitter</td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
            <!-- /.row (table view) -->
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
