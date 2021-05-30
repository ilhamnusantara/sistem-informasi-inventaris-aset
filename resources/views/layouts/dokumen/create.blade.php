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
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('dokumen')}}">Dokumen Admin Kecamatan</a></li>
                            <li class="breadcrumb-item active">Buat Dokumen</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <form action="{{route('dokumen.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Jenis Belanja</label>
                                                <select class="form-control select2" style="width: 100%;" name="id_jenis" id="id_jenis">
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
                                                <label>Keterangan Belanja</label>
                                                <input type="text" class="form-control" name="keterangan_belanja" id="keterangan_belanja" placeholder="Keterangan Belanja">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Rincian Belanja</label>
                                                <input type="text" class="form-control" name="rincian_belanja" id="rincian_belanja" placeholder="Rincian Belanja">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nomor SPK</label>
                                                <input type="text" class="form-control" name="no_spk" id="no_spk" placeholder="Nomor SPK">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nomor BAST</label>
                                                <input type="text" class="form-control" name="no_bast" id="no_bast" placeholder="Nomor BAST">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tanggal SPK</label>
                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" name="tgl_spk" data-target="#reservationdate"/>
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tanggal BAST</label>
                                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" name="tgl_bast" data-target="#reservationdate1"/>
                                                    <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
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
                                                <label>File SPK</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="file_spk"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>File BAST</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="file_bast" class="custom-file-input" @error('gambar') is-invalid @enderror id="gambar"/>
                                                        <label class="custom-file-label" for="">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Merk</label>

                                                <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Bahan</label>
                                                <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Bahan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Type</label>
                                                <input type="text" class="form-control" name="type" id="type" placeholder="Type">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Ukuran</label>
                                                <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="foto"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg" id="create">Create</button>
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
