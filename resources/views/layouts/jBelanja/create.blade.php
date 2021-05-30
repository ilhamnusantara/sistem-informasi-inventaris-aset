@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Master Belanja</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <h3 >Tambah Induk Belanja</h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <h3 >Tambah Sub Belanja</h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal2">
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <h3 >Tambah Jenis Belanja</h3>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal3">
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>
                                <!-- Modal induk belanja -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Induk Belanja</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('iBelanja.store')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="inputNama">Induk Belanja</label>
                                                        <input name="induk_belanja" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal sub belanja -->
                                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sub Belanja</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('sBelanja.store')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label>Induk Belanja</label>
                                                        <select class="form-control select2" style="width: 100%;" name="id_induk" id="id_induk">
                                                            @foreach ($indukBelanjas as $indukBelanja)
                                                                <option value="{{$indukBelanja->id_induk}}">{{$indukBelanja->induk_belanja}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Sub Belanja</label>
                                                        <input name="sub_belanja" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal jenis belanja -->
                                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis Belanja</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('jBelanja.store')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label>Sub Belanja</label>
                                                        <select class="form-control select2" style="width: 100%;" name="id_sub" id="id_sub">
                                                            @foreach ($subBelanjas as $subBelanja)
                                                                <option value="{{$subBelanja->id_sub}}">{{$subBelanja->sub_belanja}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Jenis Belanja</label>
                                                        <input name="jenis_belanja" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
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
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                </div>
            </div>
        </section>
    </div>
@endsection
