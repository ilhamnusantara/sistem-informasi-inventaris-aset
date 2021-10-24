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
                            <form action="{{route('belanja.update',$belanja)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Dokumen Belanja</label>
                                                <select class="form-control select2" style="width: 100%;" name="id_dokumen" id="id_dokumen">
                                                    <option value="{{$belanja->id_dokumen}}" class="fas fa-check">{{$belanja->Dokumen->keterangan_belanja}}</option>
                                                    @foreach ($dokumens as $dokumen)
                                                        @if($dokumen->status == 1 && $dokumen->status_belanja == 0)
                                                            <option value="{{$dokumen->id_dokumen}}">{{$dokumen->keterangan_belanja}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Satuan</label>
                                                <input type="text" class="form-control" name="satuan" id="satuan" value="{{$belanja->satuan}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Rekanan</label>
                                                <select class="form-control select2" style="width: 100%;" name="id_rekanan" id="id_rekanan">
                                                    <option value="{{$belanja->id_rekanan}}" class="fas fa-check">{{$belanja->rekanan->nama_rekanan}}</option>
                                                    @foreach ($rekanans as $rekanan)
                                                        @if($rekanan->id_rekanan != $belanja->id_rekanan)
                                                            <option value="{{$rekanan->id_rekanan}}">{{$rekanan->nama_rekanan}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Volume</label>
                                                <input type="number" class="form-control" name="volume" id="volume" value="{{$belanja->volume}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nominal Belanja</label>
                                                <input type="number" class="form-control" name="nominal_belanja" id="nominal_belanja" value="{{$belanja->nominal_belanja}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Total Belanja</label>
                                                <input type="text" class="form-control" value="{{'Rp. '.strrev(implode('.',str_split(strrev(strval($belanja->total_belanja)),3)))}}" readonly >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nomor PBB/LS</label>
                                                <input type="text" class="form-control" name="no_pbb_ls" id="no_pbb_ls" value="{{$belanja->no_pbb_ls}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tanggal Belanja</label>
                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" name="tanggal_belanja" data-target="#reservationdate2" value="{{\Carbon\Carbon::parse($belanja->tanggal_belanja)->format('d F Y')}}"/>
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nomor SP2D</label>
                                                <input type="text" class="form-control" name="sp2d" id="sp2d" placeholder="{{$belanja->sp2d}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tanggal SP2D</label>
                                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                    @if($belanja->tanggal_sp2d == null)
                                                        <input type="text" class="form-control datetimepicker-input" name="tanggal_sp2d" data-target="#reservationdate1"/>
                                                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    @else
                                                        <input type="text" class="form-control datetimepicker-input" name="tanggal_sp2d" data-target="#reservationdate1" value="{{\Carbon\Carbon::parse($belanja->tanggal_sp2d)->format('d F Y')}}"/>
                                                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nilai SP2D</label>
                                                <input type="number" class="form-control" name="nilai_sp2d" id="nilai_sp2d" value="{{$belanja->nilai_sp2d}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-md-right">Update</button>
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
@section('script')

@endsection
