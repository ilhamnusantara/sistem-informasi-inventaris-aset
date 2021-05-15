@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Akun</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Akun</a></li>
                            <li class="breadcrumb-item active">Tambah Akun</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Masukkan detail akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('akun.store')}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ID Akun</label>
                                        <input type="text" class="form-control" name="id_akun" id="id_akun"  placeholder="ID Akun">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_user" id="nama_user"  placeholder="Nama lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>Instansi</label>
                                        <select class="form-control" name="instansi" id="instansi">
                                            <option value="" selected>--Pilih Kelurahan--</option>
                                            <option value="Kelurahan Bebekan">Kelurahan Bebekan</option>
                                            <option value="Kelurahan Ngelom">Kelurahan Ngelom</option>
                                            <option value="Kelurahan Geluran">Kelurahan Geluran</option>
                                            <option value="Kelurahan Taman">Kelurahan Taman</option>
                                            <option value="Kelurahan Ketegan">Kelurahan Ketegan</option>
                                            <option value="Kelurahan Sepanjang">Kelurahan Sepanjang</option>
                                            <option value="Kelurahan Sepanjang">Kelurahan Wonocolo</option>
                                            <option value="Kelurahan Sepanjang">Kelurahan Kalijaten</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Username</label>
                                        <input type="text" class="form-control" name="username" id="username"  placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="password">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
