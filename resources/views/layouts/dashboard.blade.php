@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Sistem Elektronik Belanja Modal Barang <small>Kecamatan Taman</small></h5>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            @if(Auth::user()->status == 1)
                            <li class="breadcrumb-item active">Dashboard Admin {{Auth::user()->nama_instansi}}</li>
                            @elseif(Auth::user()->status == 0)
                                <li class="breadcrumb-item active">Dashboard User {{Auth::user()->nama_instansi}}</li>
                            @endif
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
                    <h6>Laporan Rekap Pembelian Aset</h6>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
