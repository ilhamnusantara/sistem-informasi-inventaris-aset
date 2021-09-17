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
                            <li class="breadcrumb-item"><a href="{{route('dokumen')}}">Dokumen</a></li>
                            <li class="breadcrumb-item active">Edit Dokumen</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-outline">
                            <div class="card-header">
                                <div class="row mb-14">
                                    <div class="col-md-2">
                                        <a class="btn btn-sm bg-orange btn-flat" href="{{route('dokumen.show', $dokumen->id_dokumen)}}"><i class="fas fa-arrow-left"></i> Kembali</a>
                                        <span>Edit Dokumen</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('dokumen.update',$dokumen)}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Jenis Belanja <span class="text-danger">*</span></label>
                                                <select class="form-control select2" style="width: 100%;" name="id_jenis" id="id_jenis">
                                                    <option value="{{$dokumen->jenisBelanja->id_jenis}}" class="fas fa-check">{{$dokumen->jenisBelanja->jenis_belanja}}</option>
                                                    @foreach ($jenisBelanjas as $jenisBelanja)
                                                        <option value="{{$jenisBelanja->id_jenis}}">{{$jenisBelanja->jenis_belanja}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Instansi <span class="text-danger">*</span></label>
                                                @if($dokumen->instansi == null)
                                                    @if(Auth::user()->status == 1)
                                                        <input type="text" class="form-control" name="instansi"  id="instansi" placeholder="Anda Admin" readonly>
                                                    @elseif(Auth::user()->status == 0)
                                                        <input type="text" class="form-control" name="instansi" id="instansi" value="{{Auth::user()->nama_instansi}}" readonly>
                                                    @endif
                                                @elseif($dokumen->instansi != null)
                                                    <input type="text" class="form-control" name="instansi" id="instansi" value="{{$dokumen->instansi}}" readonly>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Keterangan Belanja <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="keterangan_belanja" id="keterangan_belanja" value="{{$dokumen->keterangan_belanja}}">
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-12">--}}
{{--                                            <!-- text input -->--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Rincian Belanja <span class="text-danger">*</span></label>--}}
{{--                                                <input type="text" class="form-control" name="rincian_belanja" id="rincian_belanja" value="{{$dokumen->rincian_belanja}}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nomor SPK</label>
                                                <input type="text" class="form-control @error('no_spk', 'dokumen') is-invalid @enderror" name="no_spk" id="no_spk" value="{{$dokumen->no_spk}}">
                                                @error('no_spk')
                                                <div class="alert alert-danger alert-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nomor BAST</label>
                                                <input type="text" class="form-control @error('no_bast', 'dokumen') is-invalid @enderror" name="no_bast" id="no_bast" value="{{$dokumen->no_bast}}">
                                                @error('no_bast')
                                                <div class="alert alert-danger alert-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tanggal SPK</label>
                                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                      @if($dokumen->tgl_spk == null)
                                                          <input type="text" class="form-control datetimepicker-input" name="tgl_spk" data-target="#reservationdate"/>
                                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                      @else
                                                          <input type="text" class="form-control datetimepicker-input" name="tgl_spk" data-target="#reservationdate" value="{{\Carbon\Carbon::parse($dokumen->tgl_spk)->format('d F Y')}}"/>
                                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                      @endif
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tanggal BAST</label>
                                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                    @if($dokumen->tgl_bast == null)
                                                        <input type="text" class="form-control datetimepicker-input" name="tgl_bast" data-target="#reservationdate1"/>
                                                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    @else
                                                        <input type="text" class="form-control datetimepicker-input" name="tgl_bast" data-target="#reservationdate1" value="{{\Carbon\Carbon::parse($dokumen->tgl_bast)->format('d F Y')}}"/>
                                                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>File SPK</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="@error('file_spk') is-invalid @enderror" name="file_spk" accept="application/pdf"/>
                                                    </div>
                                                </div>
                                                @error('file_spk')
                                                <div class="alert alert-danger alert-block">Ukuran maksimal file SPK : 800KB</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>File BAST</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="@error('file_bast') is-invalid @enderror" name="file_bast" accept="application/pdf"/>
                                                    </div>
                                                </div>
                                                @error('file_bast')
                                                <div class="alert alert-danger alert-block">Ukuran maksimal file BAST : 800KB</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>@if($dokumen->jenisBelanja->kategori=='Belanja Mebel')
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Bahan</label>
                                                    <input type="text" class="form-control" name="bahan" id="bahan" value="{{$dokumen->bahan}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <input type="text" class="form-control" name="type" id="type" value="{{$dokumen->type}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Ukuran (pxlxt)</label>
                                                    <input type="text" class="form-control" name="ukuran" id="ukuran" value="{{$dokumen->type}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="@error('foto') is-invalid @enderror" name="foto" accept="image/jpeg, image/jpg, image/png"/>
                                                        </div>
                                                    </div>
                                                    @error('foto')
                                                    <div class="alert alert-danger alert-block">Ukuran maksimal file foto : 1000KB</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Merk</label>
                                                    <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk">
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($dokumen->jenisBelanja->kategori=='Belanja Elektronik')
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Bahan</label>
                                                    <input type="text" class="form-control" name="bahan" id="bahan" value="{{$dokumen->bahan}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <input type="text" class="form-control" name="type" id="type" value="{{$dokumen->type}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Merk</label>
                                                    <input type="text" class="form-control" name="merk" id="merk" value="{{$dokumen->merk}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="@error('foto') is-invalid @enderror" name="foto" accept="image/jpeg, image/jpg, image/png"/>
                                                        </div>
                                                    </div>
                                                    @error('foto')
                                                    <div class="alert alert-danger alert-block">Ukuran maksimal file foto : 1000KB</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($dokumen->jenisBelanja->kategori=='Belanja Konstruksi')
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Ukuran (pxlxt)</label>
                                                    <input type="text" class="form-control" name="ukuran" id="ukuran" value="{{$dokumen->ukuran}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Alamat / Lokasi</label>
                                                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{$dokumen->alamat}}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-md-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
