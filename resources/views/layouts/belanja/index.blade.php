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
                            @if(Auth::user()->status == 1)
                                <li class="breadcrumb-item active">Belanja Admin {{Auth::user()->nama_instansi}}</li>
                            @elseif(Auth::user()->status == 0)
                                <li class="breadcrumb-item active">Belanja User {{Auth::user()->nama_instansi}}</li>
                            @endif
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
                                    <form class="form-inline" action="{{route('belanja')}}" method="GET">
                                        <div class="col-sm-4">
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" id="min" name="min" data-target="#reservationdate" placeholder="Tanggal awal belanja"/>
{{--                                                @if()--}}
{{--                                                    <script type="text/javascript">--}}
{{--                                                        let min = [];--}}
{{--                                                        var x--}}
{{--                                                        if (Array.isArray(min) && min.length){--}}
{{--                                                            x = 'hello'--}}
{{--                                                        }else {--}}
{{--                                                            document.getElementById('min').value = "<?php echo $_GET['min'];?>";--}}
{{--                                                        }--}}
{{--                                                    </script>--}}
{{--                                                @endif--}}
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" id="max" name="max" data-target="#reservationdate1" placeholder="Tanggal akhir belanja"/>
{{--                                                @if($_GET['max'] != null)--}}
{{--                                                    <script type="text/javascript">--}}
{{--                                                        document.getElementById('max').value = "<?php echo $_GET['max'];?>";--}}
{{--                                                    </script>--}}
{{--                                                @endif--}}
                                                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                            <a type="button" class="btn btn-default" href="{{route('belanja')}}">Refresh</a>
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
                                                        <label>Dokumen Belanja <span class="text-danger">*</span></label>
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
                                                        <label for="inputNama">Satuan <span class="text-danger">*</span></label>
                                                        <input name="satuan" type="text" class="form-control" id="inputNama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Volume <span class="text-danger">*</span></label>
                                                        <input name="volume" type="number" class="form-control" id="inputNama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Nominal Belanja Per Satuan <span class="text-danger">*</span></label>
                                                        <input name="nominal_belanja" type="number" class="form-control" id="nominal_belanja">
                                                    </div>
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="inputNama">Total Belanja <span class="text-danger">*</span></label>--}}
{{--                                                        <input name="total_belanja" type="number" class="form-control" id="total_belanja">--}}
{{--                                                    </div>--}}
                                                    <div class="form-group">
                                                        <label for="inputNama">Rekanan <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" style="width: 100%;" name="id_rekanan" id="id_rekanan">
                                                            <option disable value>--Pilih Induk Belanja--</option>
                                                            @foreach ($rekanans as $rekanan)
                                                                <option value="{{$rekanan->id_rekanan}}">{{$rekanan->nama_rekanan}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Nomor PBB/SPM <span class="text-danger">*</span></label>
                                                        <input name="no_pbb_ls" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal PPB/SPM <span class="text-danger">*</span></label>
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
                            <br>
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr class="text-md-center">
    {{--                                        <th>NO</th>--}}
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
    {{--                                <?php $no = 1 ?>--}}
    {{--                                @foreach($belanjas as $belanja)--}}
    {{--                                    <tr>--}}
    {{--                                        <td class="project-state text-md-center">{{$no++}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->Dokumen->keterangan_belanja}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->satuan}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->volume}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->nominal_belanja}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->rekanan}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->no_pbb_ls}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->tanggal_belanja}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->sp2d}}</td>--}}
    {{--                                        <td class="project-state">{{$belanja->tanggal_sp2d}}</td>--}}
    {{--                                        <td class="project-actions text-center">--}}
    {{--                                            @if($belanja->Dokumen->status == 1 && $belanja->Dokumen->status_belanja == 1)--}}
    {{--                                            <a class="btn btn-success btn-sm" href="{{route('belanja.show', $belanja->id_belanja)}}">--}}
    {{--                                                <i class="fas fa-search"></i>--}}
    {{--                                            </a>--}}
    {{--                                            @elseif($belanja->Dokumen->status == 0 && $belanja->Dokumen->status_belanja == 1)--}}
    {{--                                                <a class="btn btn-danger btn-sm" href="{{route('belanja.show', $belanja->id_belanja)}}">--}}
    {{--                                                    <i class="fas fa-search"></i>--}}
    {{--                                                </a>--}}
    {{--                                            @endif--}}
    {{--                                        </td>--}}
    {{--                                    </tr>--}}
    {{--                                @endforeach--}}
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-md-center">
    {{--                                        <th>NO</th>--}}
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable({
                processing: true,
                // serverSide: true,
                responsive:true,
                ajax: {
                    "url": "{{ url('/belanja') }}",
                    "data": {
                        {{--"id_jenis": "{{app('request')->input('id_jenis')}}",--}}

                        "min": "{{app('request')->input('min')}}",

                        "max": "{{app('request')->input('max')}}",
                    }

                },
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'dokumen', name: 'dokumen'},
                    {data: 'satuan', name: 'satuan'},
                    {data: 'volume', name: 'volume'},
                    {data: 'nominal_belanja', name: 'nominal_belanja'},
                    {data: 'rekanan', name: 'rekanan'},
                    {data: 'no_pbb_ls', name: 'no_pbb_ls'},
                    {data: 'tanggal_belanja', name: 'tanggal_belanja'},
                    {data: 'sp2d', name: 'sp2d'},
                    {data: 'tanggal_sp2d', name: 'tanggal_sp2d'},
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
