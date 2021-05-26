@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cetak Dokumen</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Cetak Dokumen Admin Kecamatan</li>
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
                                            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search" value="{{Request::get('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-navbar" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Instansi</th>
                                    <th>Keterangan Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>Download SPK</th>
                                    <th>Download BAST</th>
                                    <th>Download Foto</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($dokumens as $dokumen)

                                    <tr>
                                        <td class="project-state">{{$no++}}</td>
                                        <td class="project-state">#</td>
                                        <td class="project-state">{{$dokumen->keterangan_belanja}}</td>
                                        <td class="project-state"> {{substr($dokumen->rincian_belanja,0,15).'....'}}</td>
                                        <td class="project-state"><a href="{{ route('cetakDok.file', ['namafile' => $dokumen->file_spk])}}" target="_blank">Download</a></td>
                                        <td class="project-state"><a href="{{ route('cetakDok.file', ['namafile' => $dokumen->file_bast])}}" target="_blank">Download</a></td>
                                        <td class="project-state"><a href="{{ route('cetakDok.foto', ['namafoto' => $dokumen->foto])}}" >Download</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Instansi</th>
                                    <th>Keterangan Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>Download SPK</th>
                                    <th>Download BAST</th>
                                    <th>Download Foto</th>
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
