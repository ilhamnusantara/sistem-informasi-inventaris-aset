@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Data Rekanan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('rekanan')}}">Rekanan</a></li>
                            <li class="breadcrumb-item active">Edit Data Rekanan</li>
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
                                <h3 class="card-title">Edit Data Rekanan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('rekanan.update', $rekanan)}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Rekanan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nama_rekanan" id="nama_rekanan" value="{{$rekanan->nama_rekanan}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" value="{{$rekanan->alamat}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pimpinan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nama_pimpinan" id="nama_pimpinan" value="{{$rekanan->nama_pimpinan}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNama">No. Rekening<span class="text-danger">*</span></label>
                                        <input name="no_rek" type="text" class="form-control" id="inputNama" value="{{$rekanan->no_rek}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No. Telp <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{$rekanan->no_telp}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No. NPWP</label>
                                        <input type="text" class="form-control" name="no_npwp" id="no_npwp" value="{{$rekanan->no_npwp}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No. SIUP</label>
                                        <input type="text" class="form-control" name="no_siup" id="no_siup" value="{{$rekanan->no_siup}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$rekanan->email}}">
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
