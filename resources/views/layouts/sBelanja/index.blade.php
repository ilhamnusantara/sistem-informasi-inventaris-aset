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
                                <h2>Sub Belanja</h2>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6">
                                    <div class="float-md-right">
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal2">
                                            Tambah Data Sub Belanja
                                        </button>
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
                                                            <option disable value>--Pilih Induk Belanja--</option>
                                                            @foreach ($indukBelanjas as $indukBelanja)
                                                                <option value="{{$indukBelanja->id_induk}}">[ {{$indukBelanja->norek_induk}} ] - {{$indukBelanja->induk_belanja}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Kode Rekening Sub Belanja</label>
                                                        <input name="norek_sub" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
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
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Kode Rekening</th>
                                    <th>Induk Belanja</th>
                                    <th>Kode Rekening</th>
                                    <th>Sub Belanja</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($subBelanjas as $subBelanja)
                                    <tr>
                                        <td class="project-state">{{$no++}}</td>
                                        <td class="project-state">{{$subBelanja->indukBelanja->norek_induk}}</td>
                                        <td class="project-state">{{$subBelanja->indukBelanja->induk_belanja}}</td>
                                        <td class="project-state">{{$subBelanja->norek_sub}}</td>
                                        <td class="project-state">{{$subBelanja->sub_belanja}}</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="{{route('sBelanja.edit', $subBelanja->id_sub)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            {{--                                            <a class="btn btn-danger btn-sm" href="{{route('jBelanja.delete', $subBelanja)}}" onclick="return confirm('Data akan dihapus, lanjutkan?')">--}}
                                            {{--                                                <i class="fas fa-trash">--}}
                                            {{--                                                </i>--}}
                                            {{--                                                Delete--}}
                                            {{--                                            </a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Kode Rekening</th>
                                    <th>Induk Belanja</th>
                                    <th>Kode Rekening</th>
                                    <th>Sub Belanja</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <hr/>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="content float-md-right">
                                <a href="{{route('iBelanja')}}" class="previous">&laquo; Previous</a>
                                <a href="{{route('jBelanja')}}" class="next">Next &raquo;</a>
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
