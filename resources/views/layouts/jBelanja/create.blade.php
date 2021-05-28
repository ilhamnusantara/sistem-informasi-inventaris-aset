@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Jenis Belanja</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('jBelanja')}}">Jenis Belanja</a></li>
                            <li class="breadcrumb-item active">Tambah Jenis Belanja Admin Kecamatan</li>
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
                                <h3 class="card-title">Masukan Jenis Belanja</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('jBelanja.store')}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Induk Belanja</label>
                                        <input type="text" class="form-control" name="induk_belanja" id="induk_belanja"  placeholder="Nama Induk Belenja">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Sub Belanja</label>
                                        <input type="text" class="form-control" name="sub_belanja" id="sub_belanja"  placeholder="Nama Sub Belanja">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Induk Belanja</label>
                                        <input type="text" class="form-control" name="jenis_belanja" id="jenis_belanja"  placeholder="Nama Jenis Belenja">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori Belanja</label>
                                        <select class="form-control" name="kategori" id="kategori">
                                            <option value="Belanja Mebel">Belanja Meubel</option>
                                            <option value="Belanja Elektronik">Belanja Elektronik</option>
                                            <option value="Belanja Konstruksi">Belanja Konstruksi</option>
                                            <option value="Belanja Konstruksi">Belanja Pemeliharaan</option>
                                        </select>
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
