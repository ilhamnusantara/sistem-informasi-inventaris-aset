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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form class="form-inline ml-3 float-md-left" action="{{route('belanja')}}" method="GET">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search PBB/SPM" aria-label="Search" value="{{Request::get('search') }}">
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
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Belanja</h5>
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
                                                                @if($dokumen->status == 1 && $dokumen->status_belanja == 0)
                                                                    <option value="{{$dokumen->id_dokumen}}">{{$dokumen->keterangan_belanja}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Satuan</label>
                                                        <input name="satuan" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Volume</label>
                                                        <input name="volume" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Nominal Belanja</label>
                                                        <input name="nominal_belanja" type="text" class="form-control" id="nominal_belanja" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Rekanan</label>
                                                        <input name="rekanan" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Nomor PBB/SPM</label>
                                                        <input name="no_pbb_ls" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Belanja</label>
                                                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" name="tanggal_belanja" data-target="#reservationdate2"/>
                                                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
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
                                                        <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" name="tanggal_sp2d" data-target="#reservationdate3"/>
                                                            <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
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
                                    <tr class="text-md-center">
                                        <th>NO</th>
                                        <th>Belanja</th>
                                        <th>Satuan</th>
                                        <th>Volume</th>
                                        <th>Nominal Belanja</th>
                                        <th>Rekanan</th>
                                        <th>no pbb/spm</th>
                                        <th>Tanggal</th>
                                        <th>SP2D</th>
                                        <th>Tgl SP2D</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @foreach($belanjas as $belanja)
                                    <tr>
                                        <td class="project-state text-md-center">{{$no++}}</td>
                                        <td class="project-state">{{$belanja->Dokumen->keterangan_belanja}}</td>
                                        <td class="project-state">{{$belanja->satuan}}</td>
                                        <td class="project-state">{{$belanja->volume}}</td>
                                        <td class="project-state">{{$belanja->nominal_belanja}}</td>
                                        <td class="project-state">{{$belanja->rekanan}}</td>
                                        <td class="project-state">{{$belanja->no_pbb_ls}}</td>
                                        <td class="project-state">{{$belanja->tanggal_belanja}}</td>
                                        <td class="project-state">{{$belanja->sp2d}}</td>
                                        <td class="project-state">{{$belanja->tanggal_sp2d}}</td>
                                        <td class="project-actions text-center">
                                            @if($belanja->Dokumen->status == 1 && $belanja->Dokumen->status_belanja == 1)
                                            <a class="btn btn-success btn-sm" href="{{route('belanja.show', $belanja->id_belanja)}}">
                                                <i class="fas fa-search"></i>
                                            </a>
                                            @elseif($belanja->Dokumen->status == 0 && $belanja->Dokumen->status_belanja == 1)
                                                <a class="btn btn-danger btn-sm" href="{{route('belanja.show', $belanja->id_belanja)}}">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="text-md-center">
                                        <th>NO</th>
                                        <th>Belanja</th>
                                        <th>Satuan</th>
                                        <th>Volume</th>
                                        <th>Nominal Belanja</th>
                                        <th>Rekanan</th>
                                        <th>no pbb/spm</th>
                                        <th>Tanggal</th>
                                        <th>SP2D</th>
                                        <th>Tgl SP2D</th>
                                        <th>Detail</th>
                                    </tr>
                                </tfoot>
                            </table>
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
    <script type="text/javascript">
        $('#reservationdate2').datetimepicker({
            format: 'L'
        });
        $('#reservationdate3').datetimepicker({
            format: 'L'
        });
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            rupiah     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endsection
