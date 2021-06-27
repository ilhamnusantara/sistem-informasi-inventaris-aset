@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dokumen</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dokumen Admin Kecamatan</li>
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
                            <form method="get" action="{{route('dokumen.create')}}">
                                <button class="btn btn-info btn-lg float-right" type="submit">
                                    Create
                                </button>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form class="form-inline ml-3 float-md-left" action="{{route('dokumen')}}" method="GET">
                                        <div class="input-group input-group-sm">
                                            <select class="form-control select2" style="width: 10%;" name="id_jenis" id="id_jenis">
                                                <option value="" selected class="align-middle">--Pilih Kategori--</option>
                                                @foreach ($jenisBelanjas as $jenisBelanja)
                                                    <option value="{{$jenisBelanja->id_jenis}}">{{$jenisBelanja->jenis_belanja}}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-group">
                                                <button class="btn btn-navbar" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <form class="form-inline ml-3 float-md-right" action="{{route('dokumen')}}" method="GET">
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
                                <tr class="text-md-center">
                                    <th>NO</th>
                                    <th>Jenis</th>
                                    <th>Instansi</th>
                                    <th>Ket. Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>Nomor SPK</th>
                                    <th>tgl SPK</th>
                                    <th>Nomor BAST</th>
                                    <th>tgl BAST</th>
                                    <th>Detail</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($dokumens as $dokumen)
                                    <tr>
                                        <td class="project-state text-md-center">{{$no++}}</td>
                                        <td class="project-state">{{$dokumen->jenisBelanja->jenis_belanja}}</td>
                                        <td class="project-state">{{$dokumen->instansi}}</td>
                                        <td class="project-state">{{$dokumen->keterangan_belanja}}</td>
                                        @if($dokumen->rincian_belanja == null)
                                            <td class="project-state">{{$dokumen->rincian_belanja}}</td>
                                        @else
                                            <td class="project-state"> {{substr($dokumen->rincian_belanja,0,15).'....'}}</td>
                                        @endif
                                        @if($dokumen->no_spk == null)
                                            <td class="project-state">{{$dokumen->no_spk}}</td>
                                        @else
                                            <td class="project-state">{{substr($dokumen->no_spk,0,20).'...'}}</td>
                                        @endif
                                        <td class="project-state">{{$dokumen->tgl_spk}}</td>
                                        @if($dokumen->no_bast == null)
                                            <td class="project-state">{{$dokumen->no_bast}}</td>
                                        @else
                                            <td class="project-state">{{substr($dokumen->no_bast,0,20).'...'}}</td>
                                        @endif
                                        <td class="project-state">{{$dokumen->tgl_bast}}</td>
                                        @if($dokumen->status== 1 && $dokumen->status_belanja == 0)
                                            <td class="project-actions text-center">
                                                <a class="btn bg-yellow btn-sm" href="{{route('dokumen.show', $dokumen->id_dokumen)}}">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        @elseif($dokumen->status == 1 && $dokumen->status_belanja == 1)
                                            <td class="project-actions text-center">
                                                <a class="btn btn-success btn-sm" href="{{route('dokumen.show', $dokumen->id_dokumen)}}">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        @elseif($dokumen->status == 0 && $dokumen->status_belanja == 0)
                                            <td class="project-actions text-center">
                                                <a class="btn btn-dark btn-sm" href="{{route('dokumen.show', $dokumen->id_dokumen)}}">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        @elseif($dokumen->status == 0 && $dokumen->status_belanja == 1)
                                            <td class="project-actions text-center">
                                                <a class="btn btn-danger btn-sm" href="{{route('dokumen.show', $dokumen->id_dokumen)}}">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="text-md-center">
                                    <th>NO</th>
                                    <th>Jenis</th>
                                    <th>Instansi</th>
                                    <th>Ket. Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>Nomor SPK</th>
                                    <th>tgl SPK</th>
                                    <th>Nomor BAST</th>
                                    <th>tgl BAST</th>
                                    <th>action</th>
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
