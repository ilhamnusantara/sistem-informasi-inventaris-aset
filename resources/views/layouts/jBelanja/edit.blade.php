@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Master Belanja</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('jBelanja')}}">Master Belanja</a></li>
                            <li class="breadcrumb-item active">Edit Master Belanja Admin Kecamatan</li>
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
                                <h3 class="card-title">Edit Master Belanja</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('jBelanja.update', $jenisBelanja)}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputPassword1">Kode Rekening Induk Belanja</label>--}}
{{--                                        <input type="text" class="form-control" value="{{$jenisBelanja->subBelanja->indukBelanja->norek_induk}}" readonly>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputPassword1">Induk Belanja</label>--}}
{{--                                        <input type="text" class="form-control" value="{{$jenisBelanja->subBelanja->indukBelanja->induk_belanja}}" readonly>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputPassword1">Kode Rekening Sub Belanja</label>--}}
{{--                                        <input type="text" class="form-control" value="{{$jenisBelanja->subBelanja->norek_sub}}" readonly>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputPassword1">Master Belanja</label>--}}
{{--                                        <select class="form-control" name="id_sub" id="id_sub">--}}
{{--                                            <option value="{{$jenisBelanja->id_sub}}">{{$jenisBelanja->subBelanja->sub_belanja}}</option>--}}
{{--                                            @foreach ($subBelanjas as $subBelanja)--}}
{{--                                                <option value="{{$subBelanja->id_sub}}">{{$subBelanja->sub_belanja}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kode Rekening Master Belanja</label>
                                        <input type="text" class="form-control" name="norek_jenis" value="{{$jenisBelanja->norek_jenis}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Master Belanja</label>
                                        <input type="text" class="form-control" name="jenis_belanja" id="jenis_belanja"  value="{{$jenisBelanja->jenis_belanja}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
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
