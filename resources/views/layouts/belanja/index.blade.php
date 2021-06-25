@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Belanja</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Belanja Admin Kecamatan</li>
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
                            <form method="get" action="{{route('belanja.create')}}">
                                <button class="btn btn-info btn-lg float-right" type="submit">
                                    Create
                                </button>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form class="form-inline ml-3 float-md-left" action="{{route('belanja')}}" method="GET">
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
                                <div class="col-sm-6">
                                    <div class="float-md-right">
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal2">
                                            Tambah Belanja
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
                                                <form action="{{route('belanja.store')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label>Dokumen Belanja</label>
                                                        <select class="form-control select2" style="width: 100%;" name="id_dokumen" id="id_dokumen">
                                                            <option disable value>--Pilih Induk Belanja--</option>
                                                            @foreach ($dokumens as $dokumen)
                                                                    <option value="{{$dokumen->id_dokumen}}">{{$dokumen->keterangan_belanja}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Nomor PBB/SPM</label>
                                                        <input name="no_pbb_ls" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Rekanan</label>
                                                        <input name="rekanan" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">nominal_belanja</label>
                                                        <input name="nominal_belanja" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Belanja</label>
                                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" name="tanggal_belanja" data-target="#reservationdate1"/>
                                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">SP2D</label>
                                                        <input name="sp2d" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal SP2D</label>
                                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" name="tanggal_sp2d" data-target="#reservationdate1"/>
                                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
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
                                    <th>Belanja</th>
                                    <th>no pbb/spm</th>
                                    <th>Rekanan</th>
                                    <th>Nominal Belanja</th>
                                    <th>Tanggal</th>
                                    <th>SP2D</th>
                                    <th>Tgl SP2D</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($belanjas as $belanja)
                                    <tr>
                                        <td class="project-state">{{$no++}}</td>
                                        <td class="project-state">{{$belanja->id_dokumen}}</td>
                                        <td class="project-state">{{$belanja->no_pbb_ls}}</td>
                                        <td class="project-state">{{$belanja->rekanan}}</td>
                                        <td class="project-state">{{$belanja->nominal_belanja}}</td>
                                        <td class="project-state">{{$belanja->tanggal_belanja}}</td>
                                        <td class="project-state">{{$belanja->sp2d}}</td>
                                        <td class="project-state">{{$belanja->tanggal_sp2d}}</td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm" href="{{route('belanja.edit', $belanja->id_belanja)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="{{route('belanja.delete', $belanja->id_belanja)}}" onclick="return confirm('Data akan dihapus, lanjutkan?')">
                                                <i class="fas fa-trash">
                                                </i>
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Belanja</th>
                                    <th>no pbb/spm</th>
                                    <th>Rekanan</th>
                                    <th>Nominal Belanja</th>
                                    <th>Tanggal</th>
                                    <th>SP2D</th>
                                    <th>Tgl SP2D</th>
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
