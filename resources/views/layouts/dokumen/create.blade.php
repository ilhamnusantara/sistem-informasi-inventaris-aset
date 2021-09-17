@extends('layouts.master')
@section('style')
<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .bukan{ background: #ff0000; }
    .green{ background: #228B22; }
    .blue{ background: #0000ff; }
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
                            <form action="{{route('dokumen.create')}}" method="get" id="form_jenis" class="d-none">
                                <input type="hidden" name="jenis">
                                <input type="type" name="kategori">
                            </form>
                            <form action="{{route('dokumen.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Master Belanja <span class="text-danger">*</span></label>
                                                <select class="form-control select2" style="width: 100%;" name="id_jenis" id="id_jenis">
                                                    <option value="">Pilih Master Belanja</option>
                                                        @foreach ($jenisBelanjas as $jenisBelanja)
                                                            <option value="{{$jenisBelanja->id_jenis}}" data-kategori="{{str_replace(' ','_',strtolower($jenisBelanja->kategori))}}" {{request()->get('jenis') == $jenisBelanja->id_jenis ? 'selected':''}}>[{{$jenisBelanja->norek_jenis}}] - {{$jenisBelanja->jenis_belanja}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                @if(Auth::user()->status == 1)
                                                    <label>Apakah Anda Pemilik Dokumen / Berkas ? <span class="text-danger">*</span></label>
                                                    <div>
                                                        <h6><input type="radio" name="colorRadio" value="{{Auth::user()->nama_instansi}}"> Pemilik Dokumen</h6>
                                                        <h6><input type="radio" name="colorRadio" value=""> Bukan Pemilik Dokumen</h6>
                                                    </div>
                                                @else
                                                    <label> Instansi </label>
                                                    <input type="text" class="form-control" name="colorRadio" placeholder="{{Auth::user()->nama_instansi}}" value="{{Auth::user()->nama_instansi}}" readonly>
                                                @endif
                                                @include('layouts.partials.flash-message')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Keterangan Belanja <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="keterangan_belanja" id="keterangan_belanja" placeholder="Keterangan Belanja" value="{{ old('keterangan_belanja') }}">
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-12">--}}
{{--                                            <!-- text input -->--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Rincian Belanja <span class="text-danger">*</span></label>--}}
{{--                                                <input type="text" class="form-control" name="rincian_belanja" id="rincian_belanja" placeholder="Rincian Belanja" value="{{ old('rincian_belanja') }}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nomor SPK</label>
                                                <input type="text" class="form-control @error('no_spk') is-invalid @enderror" name="no_spk" id="no_spk" value="{{ old('no_spk') }}" placeholder="Nomor SPK">
                                                @error('no_spk')
                                                <div class="alert alert-danger alert-block">Nomor SPK Sudah Digunakan</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nomor BAST</label>
                                                <input type="text" class="form-control  @error('no_bast') is-invalid @enderror" name="no_bast" id="no_bast"  value="{{ old('no_bast') }}" placeholder="Nomor BAST">
                                                @error('no_bast')
                                                <div class="alert alert-danger alert-block">Nomor BAST Sudah Digunakan</div>
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
                                                        <input type="file" class="@error('file_spk') is-invalid @enderror" name="file_spk" accept="application/pdf" />
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
                                    </div>
                                        @if(request()->get('kategori')=='belanja_mebel')
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Bahan</label>
                                                <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Bahan">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <input type="text" class="form-control" name="type" id="type" placeholder="Type">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Ukuran (pxlxt)</label>
                                                <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran">
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
                                        @elseif(request()->get('kategori')=='belanja_elektronik')
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Bahan</label>
                                                    <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Bahan">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <input type="text" class="form-control" name="type" id="type" placeholder="Type">
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
                                        @elseif(request()->get('kategori')=='belanja_konstruksi')
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Ukuran (pxlxt)</label>
                                                    <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Alamat / Lokasi</label>
                                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn float-md-right btn-primary btn-lg" id="create">Create</button>
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
    <script>
        $(document).ready(function (){
            $(document).on('change' , '#id_jenis' , function (){
                let id_jenis =  $(this).val()
                let kategori = $(this).find(':selected').data('kategori')
                $('input[name="jenis"]').val(id_jenis)
                $('input[name="kategori"]').val(kategori)
                $('#form_jenis').submit()
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $("box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script>
@endsection
