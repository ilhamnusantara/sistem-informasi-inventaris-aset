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
                                <h2>Induk Belanja</h2>
                            </div>
                        </div>
                    <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6">
                                    <div class="float-md-right">
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                            Tambah Data Induk Belanja
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
                                                        <label for="inputNama">Kode Rekening Induk Belanja</label>
                                                        <input name="norek_induk" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
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
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-md-center">
                                    <th>NO</th>
                                    <th>Kode Rekening</th>
                                    <th>Induk Belanja</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($indukBelanjas as $indukBelanja)
                                    <tr>
                                        <td class="project-state text-md-center ">{{$no++}}</td>
                                        <td class="project-state">{{$indukBelanja->norek_induk}}</td>
                                        <td class="project-state">{{$indukBelanja->induk_belanja}}</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="{{route('iBelanja.edit', $indukBelanja->id_induk)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
{{--                                            <a class="btn btn-danger btn-sm" href="{{route('iBelanja.delete', $indukBelanja)}}" onclick="return confirm('Data akan dihapus, lanjutkan?')">--}}
{{--                                                <i class="fas fa-trash">--}}
{{--                                                </i>--}}
{{--                                                Delete--}}
{{--                                            </a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="text-md-center">
                                    <th>NO</th>
                                    <th>Kode Rekening</th>
                                    <th>Induk Belanja</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <hr/>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="content float-md-right">
                                <a href="{{route('sBelanja')}}" class="btn btn-sm btn-success next">Next &raquo;</a>
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
