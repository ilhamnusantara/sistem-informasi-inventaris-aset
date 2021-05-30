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
                            <form action="{{route('sBelanja.update', $subBelanja)}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kode Rekening Induk Belanja</label>
                                        <input type="text" class="form-control" value="{{$subBelanja->indukBelanja->norek_induk}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sub Jenis Belanja</label>
                                        <select class="form-control" name="id_induk" id="id_induk">
                                            <option value="{{$subBelanja->id_induk}}">{{$subBelanja->indukBelanja->induk_belanja}}</option>
                                            @foreach ($indukBelanjas as $indukBelanja)
                                                <option value="{{$indukBelanja->id_induk}}">{{$indukBelanja->induk_belanja}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kode Rekening Sub Belanja</label>
                                        <input type="text" class="form-control" name="norek_sub" id="norek_sub" value="{{$subBelanja->norek_sub}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Induk Jenis Belanja</label>
                                        <input type="text" class="form-control" name="sub_belanja" id="sub_belanja" value="{{$subBelanja->sub_belanja}}">
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
