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
                            <li class="breadcrumb-item"><a href="{{route('belanja')}}">Belanja</a></li>
                            <li class="breadcrumb-item active">Detail Belanja</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-outline">
                            <div class="card-header">
                                <div class="row mb-14">
                                    <div class="col-md-2">
                                        <a class="btn btn-sm bg-orange btn-flat" href="{{route('belanja')}}"><i class="fas fa-arrow-left"></i> Kembali</a>
                                        <span>Detail Belanja</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{route('belanja.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Dokumen Belanja</label>
                                                <input type="text" class="form-control" name="id_dokumen" id="id_dokumen" value="{{$belanja->Dokumen->keterangan_belanja}}" readonly >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Satuan</label>
                                                <input type="text" class="form-control" name="instansi" id="instansi" value="{{$belanja->satuan}}" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Rekanan</label>
                                                <input type="text" class="form-control" name="rekanan" id="rekanan" value="{{$belanja->rekanan->nama_rekanan}}" readonly >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Volume</label>
                                                <input type="text" class="form-control" name="volume" id="volume" value="{{$belanja->volume}}" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nominal Belanja</label>
                                                <input type="text" class="form-control" name="nominal_belanja" id="nominal_belanja" placeholder="{{$belanja->nominal_belanja}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nomor PBB/LS</label>
                                                <input type="text" class="form-control" name="no_pbb_ls" id="no_pbb_ls" placeholder="{{$belanja->no_pbb_ls}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tanggal Belanja</label>
                                                <input type="text" class="form-control datetimepicker-input" name="tanggal_belanja" data-target="#reservationdate" value="{{$belanja->tanggal_belanja}}" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nomor SP2D</label>
                                                <input type="text" class="form-control" name="sp2d" id="sp2d" placeholder="{{$belanja->sp2d}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tanggal SP2D</label>
                                                <input type="text" class="form-control datetimepicker-input" name="tanggal_sp2d" data-target="#reservationdate" value="{{$belanja->tanggal_sp2d}}" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="content float-md-right">
                                        @if($belanja->Dokumen->status == 1 && $belanja->Dokumen->status_belanja == 1)
                                            <a class="btn btn-info btn-sm" href="{{route('belanja.edit', $belanja->id_belanja)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="{{route('belanja.unvervalbelanja',$belanja->id_dokumen)}}" onclick="return confirm('Batalkan validasi')"><i class="fas fa-times"></i>  Batal Validasi</a>

                                        @elseif($belanja->Dokumen->status == 0 && $belanja->Dokumen->status_belanja == 1)
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
                                            <a class="btn btn-success btn-sm" href="{{route('belanja.vervalbelanja', $belanja->id_dokumen)}}"> <i class="fas fa-check"></i> Validasi</a>
{{--                                            <a class="btn btn-danger btn-sm" href="{{route('dokumen.noverifikasi',$dokumen->id_dokumen)}}" onclick="return confirm('Batalkan validasi')"><i class="fas fa-times"></i>  Batal Validasi</a>--}}
{{--                                        @elseif($dokumen->status == 0 && $dokumen->status_belanja == 1)--}}
{{--                                            <a class="btn btn-info btn-sm" href="{{route('dokumen.edit', $dokumen->id_dokumen)}}">--}}
{{--                                                <i class="fas fa-pencil-alt">--}}
{{--                                                </i>--}}
{{--                                                Edit--}}
{{--                                            </a>--}}
{{--                                            <a class="btn btn-success btn-sm" href="{{route('dokumen.verifikasi', $dokumen->id_dokumen)}}"> <i class="fas fa-check"></i> Validasi</a>--}}
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content-header -->
    </div>
@endsection
