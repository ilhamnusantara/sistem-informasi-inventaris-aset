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
                                                <option value=""><a href="{{route('jBelanja')}}">Tambah</a></option>
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
                                <tr>
                                    <th>NO</th>
                                    <th>Jenis</th>
                                    <th>Keterangan Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>Nomor SPK</th>
                                    <th>tgl SPK</th>
                                    <th>Nomor BAST</th>
                                    <th>tgl BAST</th>
                                    <th>Merk</th>
                                    <th>Bahan</th>
                                    <th>Type</th>
                                    <th>Ukuran</th>
                                    <th>action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($dokumens as $dokumen)
                                    <tr>
                                        <td class="project-state">{{$no++}}</td>
                                        <td class="project-state">{{$dokumen->jenisBelanja->sub_belanja}}</td>
                                        <td class="project-state">{{$dokumen->keterangan_belanja}}</td>
                                        <td class="project-state"> {{substr($dokumen->rincian_belanja,0,15).'....'}}</td>
                                        <td class="project-state">{{substr($dokumen->no_spk,0,20).'...'}}</td>
                                        <td class="project-state">{{$dokumen->tgl_spk}}</td>
                                        <td class="project-state">{{substr($dokumen->no_bast,0,20).'...'}}</td>
                                        <td class="project-state">{{$dokumen->tgl_bast}}</td>
                                        <td class="project-state">{{$dokumen->merk}}</td>
                                        <td class="project-state">{{$dokumen->bahan}}</td>
                                        <td class="project-state">{{$dokumen->type}}</td>
                                        <td class="project-state">{{$dokumen->ukuran}}</td>
                                        <td class="project-actions text-center">
                                            @if($dokumen->status == 0)
                                                <a class="btn btn-info btn-sm" href="{{route('dokumen.edit', $dokumen->id_dokumen)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="{{route('dokumen.delete', $dokumen->id_dokumen)}}" onclick="return confirm('Data akan dihapus, lanjutkan?')">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Hapus
                                                </a>
                                               <a class="btn btn-success btn-sm" href="#" onclick="return confirm('Data akan validasi')"> <i class="fas fa-check"></i> Validasi</a>
                                            @elseif($dokumen->status == 1)
                                                <a class="btn btn-success btn-sm" href="#" onclick="return confirm('Data akan validasi')"> <i class="fas fa-check"></i>Batal Validasi</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Jenis</th>
                                    <th>Keterangan Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>Nomor SPK</th>
                                    <th>tgl SPK</th>
                                    <th>Nomor BAST</th>
                                    <th>tgl BAST</th>
                                    <th>Merk</th>
                                    <th>Bahan</th>
                                    <th>Type</th>
                                    <th>Ukuran</th>
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
