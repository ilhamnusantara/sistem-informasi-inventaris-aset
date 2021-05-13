@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jenis Belanja</h1>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="{{route('jBelanja.create')}}">
                                <button class="btn btn-info btn-lg float-right" type="submit">
                                    Create
                                </button>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Induk Jenis Belanja</th>
                                    <th>Sub Jenis Belanja</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($jenis_belanjas as $jenis_belanja)
                                <tr>
                                    <td class="project-state">{{$no++}}</td>
                                    <td class="project-state">{{$jenis_belanja->induk_jenis}}</td>
                                    <td class="project-state">{{$jenis_belanja->sub_jenis}}</td>
                                    <td class="project-state">{{$jenis_belanja->kategori}}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm" href="{{route('jBelanja.edit', $jenis_belanja->id_jenis)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{route('jBelanja.delete', $jenis_belanja)}}" onclick="return confirm('Data akan dihapus, lanjutkan?')">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Induk Jenis Belanja</th>
                                    <th>Sub Jenis Belanja</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
