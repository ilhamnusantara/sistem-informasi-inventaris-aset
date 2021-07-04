@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cetak Laporan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Cetak Laporan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-inline ml-3 float-md-right" action="#" method="GET">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <a href="{{route('export')}}" class="btn btn-sm btn-success next"><i class="fas fa-download"></i> Cetak Laporan</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-md-center">
                                    <th>NO</th>
                                    <th>Instansi</th>
                                    <th>Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>sSatuan</th>
                                    <th>Volume</th>
                                    <th>Nilai</th>
                                    <th>Rekanan</th>
                                    <th>NO PBB /tanggal</th>
                                    <th>No SP2D</th>
                                    <th>Tanggal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($belanjas as $belanja)

                                    <tr>
                                        <td class="project-state text-md-center">{{$no++}}</td>
                                        <td class="project-state">{{$belanja->Dokumen->instansi}}</td>
                                        <td class="project-state">{{$belanja->Dokumen->rincian_belanja}}</td>
                                        <td class="project-state"> {{$belanja->satuan}}</td>
                                        <td class="project-state"> {{$belanja->volume}}</td>
                                        <td class="project-state"> {{$belanja->nominal_belanja}}</td>
                                        <td class="project-state"> {{$belanja->satuan}}</td>
                                        <td class="project-state"> {{$belanja->rekanan}}</td>
                                        <td class="project-state"> {{$belanja->no_pbb_ls}}</td>
                                        <td class="project-state"> {{$belanja->sp2d}}</td>
                                        <td class="project-state"> {{$belanja->tanggal_sp2d}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="text-md-center">
                                    <th>NO</th>
                                    <th>Instansi</th>
                                    <th>Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>sSatuan</th>
                                    <th>Volume</th>
                                    <th>Nilai</th>
                                    <th>Rekanan</th>
                                    <th>NO PBB /tanggal</th>
                                    <th>No SP2D</th>
                                    <th>Tanggal</th>
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
