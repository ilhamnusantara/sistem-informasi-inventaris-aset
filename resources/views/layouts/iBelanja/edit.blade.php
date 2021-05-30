@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Induk Belanja</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('jBelanja')}}">Jenis Belanja</a></li>
                            <li class="breadcrumb-item active">Edit Induk Belanja Admin Kecamatan</li>
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
                                <h3 class="card-title">Edit Induk Belanja</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('iBelanja.update', $indukBelanja)}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kode Rekening Induk Belanja</label>
                                        <input type="text" class="form-control" name="norek_induk" id="norek_induk" value="{{$indukBelanja->norek_induk}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Induk Belanja</label>
                                        <input type="text" class="form-control" name="induk_belanja" id="induk_belanja" value="{{$indukBelanja->induk_belanja}}">
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
