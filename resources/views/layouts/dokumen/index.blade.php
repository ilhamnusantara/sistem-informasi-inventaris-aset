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
                            <h3 class="card-title m-0">DataTable with minimal features & hover style</h3>
                            <form method="get" action="{{route('dokumen.create')}}">
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
                                    <th>Jenis</th>
                                    <th>Keterangan Belanja</th>
                                    <th>Rincian Belanja</th>
                                    <th>Nomor SPK</th>
                                    <th>tgl SPK</th>
                                    <th>file SPK</th>
                                    <th>Nomor BAST</th>
                                    <th>tgl BAST</th>
                                    <th>file BAST</th>
                                    <th>Merk</th>
                                    <th>Bahan</th>
                                    <th>Type</th>
                                    <th>Ukuran</th>
                                    <th>Foto</th>
                                    <th>action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($dokumens as $dokumen)
                                    <tr>
                                        <td class="project-state">{{$no++}}</td>
                                        <td class="project-state">{{$dokumen->jenisBelanja->nama_jenis}}</td>
                                        <td class="project-state">{{$dokumen->keterangan_belanja}}</td>
                                        <td class="project-state">{{$dokumen->rincian_belanja}}</td>
                                        <td class="project-state">{{$dokumen->no_spk}}</td>
                                        <td class="project-state">{{$dokumen->tgl_spk}}</td>
                                        <td class="project-state"><a href="{{route('dokumen.download', $dokumen->id_dokumen)}}">View</a></td>
                                        <td class="project-state">{{$dokumen->no_bast}}</td>
                                        <td class="project-state">{{$dokumen->tgl_bast}}</td>
                                        <td class="project-state"><a href="{{route('dokumen.filespk', $dokumen->id_dokumen)}}">View</a></td>
                                        <td class="project-state">{{$dokumen->merk}}</td>
                                        <td class="project-state">{{$dokumen->bahan}}</td>
                                        <td class="project-state">{{$dokumen->type}}</td>
                                        <td class="project-state">{{$dokumen->ukuran}}</td>
                                        <td class="project-state">{{$dokumen->foto}}</td>
                                        <td class="project-actions text-center">
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
                                            <a class="btn btn-success btn-sm" href="#" onclick="return confirm('Data akan validasi')">
                                                <i class="fas fa-check">
                                                </i>
                                                Validasi
                                            </a>
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
                                    <th>file SPK</th>
                                    <th>Nomor BAST</th>
                                    <th>tgl BAST</th>
                                    <th>file BAST</th>
                                    <th>Merk</th>
                                    <th>Bahan</th>
                                    <th>Type</th>
                                    <th>Ukuran</th>
                                    <th>Foto</th>
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
