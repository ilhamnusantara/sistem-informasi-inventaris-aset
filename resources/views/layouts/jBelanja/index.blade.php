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
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Jenis Belanja Admin Kecamatan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @include('layouts.partials.flash-message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-md-center">
                                <h2>Jenis Belanja</h2>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6">
                                    <div class="float-md-right">
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal3">
                                            Tambah Data Jenis Belanja
                                        </button>
                                    </div>
                                </div>
                                <!-- Modal Jenis Belanja -->
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
                                                            <option disable value>--Pilih Sub Belanja--</option>
                                                            @foreach ($subBelanjas as $subBelanja)
                                                                <option value="{{$subBelanja->id_sub}}">[ {{$subBelanja->norek_sub}} ] - {{$subBelanja->sub_belanja}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Kode Rekening Jenis Belanja</label>
                                                        <input name="norek_jenis" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-md-center">
                                    <th>NO</th>
                                    <th>Induk Belanja</th>
                                    <th>Kode Rekening</th>
                                    <th>Sub Belanja</th>
                                    <th>Kode Rekening</th>
                                    <th>Jenis Belanja</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <?php $no = 1 ?>
                                @foreach($jenis_belanjas as $jenis_belanja)
                                <tr>
                                    <td class="project-state text-md-center">{{$no++}}</td>
                                    <td class="project-state">{{$jenis_belanja->subBelanja->indukBelanja->induk_belanja}}</td>
                                    <td class="project-state">{{$jenis_belanja->subBelanja->norek_sub}}</td>
                                    <td class="project-state">{{$jenis_belanja->subBelanja->sub_belanja}}</td>
                                    <td class="project-state">{{$jenis_belanja->norek_jenis}}</td>
                                    <td class="project-state">{{$jenis_belanja->jenis_belanja}}</td>
                                    <td class="project-state">{{$jenis_belanja->kategori}}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm" href="{{route('jBelanja.edit', $jenis_belanja->id_jenis)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
{{--                                        <a class="btn btn-danger btn-sm" href="{{route('jBelanja.delete', $jenis_belanja)}}" onclick="return confirm('Data akan dihapus, lanjutkan?')">--}}
{{--                                            <i class="fas fa-trash">--}}
{{--                                            </i>--}}
{{--                                            Delete--}}
{{--                                        </a>--}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="text-md-center">
                                    <th>NO</th>
                                    <th>Induk Belanja</th>
                                    <th>Kode Rekening</th>
                                    <th>Sub Belanja</th>
                                    <th>Kode Rekening</th>
                                    <th>Jenis Belanja</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <hr/>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="content float-md-right">
                                <a href="{{route('sBelanja')}}" class="btn btn-sm btn-dark previous">&laquo; Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--@section('script')--}}
{{--    --}}
{{--@endsection--}}
