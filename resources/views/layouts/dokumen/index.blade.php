@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
{{--    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">--}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        div.bawah {
            display: block;
            text-align: center;
            color: white;
            position: fixed;
            right: 18px;
            bottom: 65px;
        }
    </style>
@endsection

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
{{--                                    <form class="form-inline ml-3 float-md-left" action="{{route('dokumen')}}" method="GET">--}}
{{--                                        <div class="input-group input-group-sm">--}}
{{--                                            <select class="form-control select2" style="width: 10%;" name="id_jenis" id="id_jenis">--}}
{{--                                                <option value="" selected class="align-middle">--Pilih Kategori--</option>--}}
{{--                                                @foreach ($jenisBelanjas as $jenisBelanja)--}}
{{--                                                    <option value="{{$jenisBelanja->id_jenis}}">{{$jenisBelanja->jenis_belanja}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <button class="btn btn-navbar" type="submit">--}}
{{--                                                    <i class="fas fa-search"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
                                </div>
                                <div class="col-sm-6">
{{--                                    <form class="form-inline ml-3 float-md-right" action="{{route('dokumen')}}" method="GET">--}}
{{--                                        <div class="input-group input-group-sm">--}}
{{--                                            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search" value="{{Request::get('search') }}">--}}
{{--                                            <div class="input-group-append">--}}
{{--                                                <button class="btn btn-navbar" type="submit">--}}
{{--                                                    <i class="fas fa-search"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="example2" class="table">
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
    {{--                                <?php $no = 1 ?>--}}
    {{--                                @foreach($dokumens as $dokumen)--}}
    {{--                                    <tr>--}}
    {{--                                        <td class="project-state text-md-center">{{$no++}}</td>--}}
    {{--                                        <td class="project-state">{{$dokumen->jenisBelanja->jenis_belanja}}</td>--}}
    {{--                                        <td class="project-state">{{$dokumen->instansi}}</td>--}}
    {{--                                        <td class="project-state">{{$dokumen->keterangan_belanja}}</td>--}}
    {{--                                        @if($dokumen->rincian_belanja == null)--}}
    {{--                                            <td class="project-state">{{$dokumen->rincian_belanja}}</td>--}}
    {{--                                        @else--}}
    {{--                                            <td class="project-state"> {{substr($dokumen->rincian_belanja,0,15).'....'}}</td>--}}
    {{--                                        @endif--}}
    {{--                                        @if($dokumen->no_spk == null)--}}
    {{--                                            <td class="project-state">{{$dokumen->no_spk}}</td>--}}
    {{--                                        @else--}}
    {{--                                            <td class="project-state">{{substr($dokumen->no_spk,0,20).'...'}}</td>--}}
    {{--                                        @endif--}}
    {{--                                        <td class="project-state">{{$dokumen->tgl_spk}}</td>--}}
    {{--                                        @if($dokumen->no_bast == null)--}}
    {{--                                            <td class="project-state">{{$dokumen->no_bast}}</td>--}}
    {{--                                        @else--}}
    {{--                                            <td class="project-state">{{substr($dokumen->no_bast,0,20).'...'}}</td>--}}
    {{--                                        @endif--}}
    {{--                                        <td class="project-state">{{$dokumen->tgl_bast}}</td>--}}
    {{--                                        @if($dokumen->status== 1 && $dokumen->status_belanja == 0)--}}
    {{--                                            <td class="project-actions text-center">--}}
    {{--                                                <a class="btn bg-yellow btn-sm" href="{{route('dokumen.show', $dokumen->id_dokumen)}}">--}}
    {{--                                                    <i class="fas fa-search"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </td>--}}
    {{--                                        @elseif($dokumen->status == 1 && $dokumen->status_belanja == 1)--}}
    {{--                                            <td class="project-actions text-center">--}}
    {{--                                                <a class="btn btn-success btn-sm" href="{{route('dokumen.show', $dokumen->id_dokumen)}}">--}}
    {{--                                                    <i class="fas fa-search"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </td>--}}
    {{--                                        @elseif($dokumen->status == 0 && $dokumen->status_belanja == 0)--}}
    {{--                                            <td class="project-actions text-center">--}}
    {{--                                                <a class="btn btn-dark btn-sm" href="{{route('dokumen.show', $dokumen->id_dokumen)}}">--}}
    {{--                                                    <i class="fas fa-search"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </td>--}}
    {{--                                        @elseif($dokumen->status == 0 && $dokumen->status_belanja == 1)--}}
    {{--                                            <td class="project-actions text-center">--}}
    {{--                                                <a class="btn btn-danger btn-sm" href="{{route('dokumen.show', $dokumen->id_dokumen)}}">--}}
    {{--                                                    <i class="fas fa-search"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </td>--}}
    {{--                                        @endif--}}
    {{--                                    </tr>--}}
    {{--                                @endforeach--}}
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
        <div class="bawah">
            <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-info-circle"></i>
            </button>
        </div>
        <!-- Modal induk belanja -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informasi Tombol Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('iBelanja.store')}}" method="POST">
                            <div class="form-group">
                                <table id="example2" class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="project-state">
                                                <a class="btn bg-dark btn-sm">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                            <td class="project-state">Berkas Dokumen belum di validasi</td>
                                        </tr>
                                        <tr>
                                            <td class="project-state">
                                                <a class="btn bg-yellow btn-sm">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                            <td class="project-state">Berkas Dokumen sudah divalidasi di Modul Dokumen tetapi belum sampai validasi di Modul Belanja</td>
                                        </tr>
                                        <tr>
                                            <td class="project-state">
                                                <a class="btn bg-success btn-sm">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                            <td class="project-state">Berkas telah tervalidasi di Modul Dokumen dan Belanja </td>
                                        </tr>
                                        <tr>
                                            <td class="project-state">
                                                <a class="btn bg-danger btn-sm">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                            <td class="project-state">Berkas telah dibatalkan di Modul Belanja </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                // processing: true,
                serverSide: true,
                responsive:true,
                ajax: "{{ url('/dokumen')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'jenis', name: 'jenis'},
                    {data: 'instansi', name: 'instansi'},
                    {data: 'keterangan_belanja', name: 'keterangan_belanja'},
                    {data: 'rincian_belanja', name: 'rincian_belanja'},
                    {data: 'no_spk', name: 'no_spk'},
                    {data: 'tgl_spk', name: 'tgl_spk'},
                    {data: 'no_bast', name: 'no_bast'},
                    {data: 'tgl_bast', name: 'tgl_bast'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
