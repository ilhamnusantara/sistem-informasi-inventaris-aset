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
                            <li class="breadcrumb-item active">Detail Dokumen</li>
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
                                        <a class="btn btn-sm bg-orange btn-flat" href="{{route('dokumen')}}"><i class="fas fa-arrow-left"></i> Kembali</a>
                                        <span>Detail Dokumen</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{route('dokumen.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Jenis Belanja</label>
                                                <input type="text" class="form-control" name="id_jenis" id="id_jenis" value="{{$dokumen->jenisBelanja->jenis_belanja}}" readonly >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Instansi</label>
                                                <input type="text" class="form-control" name="instansi" id="instansi" value="{{$dokumen->instansi->nama_instansi}}" readonly >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Keterangan Belanja</label>
                                                <input type="text" class="form-control" name="keterangan_belanja" id="keterangan_belanja" value="{{$dokumen->keterangan_belanja}}" readonly >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Rincian Belanja</label>
                                                <input type="text" class="form-control" name="rincian_belanja" id="rincian_belanja" placeholder="{{$dokumen->rincian_belanja}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nomor SPK</label>
                                                <input type="text" class="form-control" name="no_spk" id="no_spk" placeholder="{{$dokumen->no_spk}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nomor BAST</label>
                                                <input type="text" class="form-control" name="no_bast" id="no_bast" placeholder="{{$dokumen->no_bast}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tanggal SPK</label>
                                                    <input type="text" class="form-control datetimepicker-input" name="tgl_spk" data-target="#reservationdate" value="{{$dokumen->tgl_spk}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tanggal BAST</label>
                                                    <input type="text" class="form-control datetimepicker-input" name="tgl_bast" data-target="#reservationdate1" value="{{$dokumen->tgl_bast}}" readonly/>
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
                                                        @if($dokumen->file_spk == null)
                                                            <h6 class="text-red"> <i class="far fa-times-circle"></i> Belum Upload File SPK</h6>
                                                        @else
                                                            <input type="text" class="form-control datetimepicker-input" name="tgl_bast" data-target="#reservationdate1" value="{{$dokumen->file_spk}}" readonly/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>File BAST</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        @if($dokumen->file_bast == null)
                                                            <h6 class="text-red"> <i class="far fa-times-circle"></i> Belum Upload File BAST</h6>
                                                        @else
                                                            <input type="text" class="form-control datetimepicker-input" name="tgl_bast" data-target="#reservationdate1" value="{{$dokumen->file_bast}}" readonly/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($dokumen->jenisBelanja->kategori=='Belanja Mebel')
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Bahan</label>
                                                <input type="text" class="form-control" name="bahan" id="bahan" value="{{$dokumen->bahan}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <input type="text" class="form-control" name="type" id="type" value="{{$dokumen->type}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Ukuran (pxlxt)</label>
                                                <input type="text" class="form-control" name="ukuran" id="ukuran" value="{{$dokumen->type}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        @if($dokumen->foto == null)
                                                            <h6 class="text-red"> <i class="far fa-times-circle"></i> Belum Upload Foto</h6>
                                                        @else
                                                            <input type="text" class="form-control datetimepicker-input" name="tgl_bast" data-target="#reservationdate1" value="{{$dokumen->foto}}" readonly/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($dokumen->jenisBelanja->kategori=='Belanja Elektronik')
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Bahan</label>
                                                <input type="text" class="form-control" name="bahan" id="bahan" value="{{$dokumen->bahan}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <input type="text" class="form-control" name="type" id="type" value="{{$dokumen->type}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Merk</label>
                                                <input type="text" class="form-control" name="ukuran" id="ukuran" value="{{$dokumen->merk}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        @if($dokumen->foto == null)
                                                            <h6 class="text-red"> <i class="far fa-times-circle"></i> Belum Upload Foto</h6>
                                                        @else
                                                            <input type="text" class="form-control datetimepicker-input" name="tgl_bast" data-target="#reservationdate1" value="{{$dokumen->foto}}" readonly/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <div class="content float-md-right">
                                        @if($dokumen->status == 0 && $dokumen->status_belanja == 0)
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
                                        <a class="btn btn-success btn-sm" href="{{route('dokumen.verifikasi', $dokumen->id_dokumen)}}"> <i class="fas fa-check"></i> Validasi</a>
                                        @elseif($dokumen->status == 1 && $dokumen->status_belanja == 0)
                                            <a class="btn btn-danger btn-sm" href="{{route('dokumen.noverifikasi',$dokumen->id_dokumen)}}" onclick="return confirm('Batalkan validasi')"><i class="fas fa-times"></i>  Batal Validasi</a>
                                        @elseif($dokumen->status == 0 && $dokumen->status_belanja == 1)
                                            <a class="btn btn-info btn-sm" href="{{route('dokumen.edit', $dokumen->id_dokumen)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-success btn-sm" href="{{route('dokumen.verifikasi', $dokumen->id_dokumen)}}"> <i class="fas fa-check"></i> Validasi</a>
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
