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
                            <li class="breadcrumb-item"><a href="#">Jenis Belanja</a></li>
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
                            <form action="{{route('jBelanja.update', $jenisBelanja)}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ID Jenis Belanja</label>
                                        <input type="text" class="form-control" name="id_jenis" id="id_jenis"  value="{{$jenisBelanja->id_jenis}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Induk Jenis Belanja</label>
                                        <input type="text" class="form-control" name="induk_jenis" id="induk_jenis"  value="{{$jenisBelanja->induk_jenis}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sub Jenis Belanja</label>
                                        <input type="text" class="form-control" name="sub_jenis" id="sub_jenis"  value="{{$jenisBelanja->sub_jenis}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Induk Jenis</label>
                                        <select class="form-control" name="kategori" id="kategori">
                                            <option value="{{$jenisBelanja->kategori}}">{{$jenisBelanja->kategori}}</option>
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
