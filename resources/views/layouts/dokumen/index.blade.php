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
                                <div class="col-sm-12">
                                <form class="form-inline" action="{{route('dokumen')}}" method="GET">
                                    <div class="col-sm-3">
                                            <div class="input-group">
                                                <select class="form-control select2" style="width: 10%;" name="id_jenis" id="id_jenis">
                                                    <option value="" selected class="align-middle">--Pilih Kategori--</option>
                                                    @foreach ($jenisBelanjas as $jenisBelanja)
                                                        <option value="{{$jenisBelanja->id_jenis}}" {{ (app('request')->input('id_jenis') == $jenisBelanja->id_jenis) ? 'selected' : '' }}>{{$jenisBelanja->jenis_belanja}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="min" name="min" data-target="#reservationdate" placeholder="Tanggal awal"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="max" name="max" data-target="#reservationdate1" placeholder="Tanggal Akhir"/>
                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                        <a type="button" class="btn btn-default" href="{{route('dokumen')}}">Refresh</a>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="example2" class="table">
                                    <thead>
                                    <tr class="text-md-center">
{{--                                        <th>NO</th>--}}
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
                                    <tfoot>
                                    <tr class="text-md-center">
{{--                                        <th>NO</th>--}}
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
        // var minDate, maxDate;
        // $.fn.dataTable.ext.search.push(
        //     function( settings, data, dataIndex ) {
        //         var min = minDate.val();
        //         var max = maxDate.val();
        //         var date = new Date( data[5] );
        //
        //         if (
        //             ( min === null && max === null ) ||
        //             ( min === null && date <= max ) ||
        //             ( min <= date   && max === null ) ||
        //             ( min <= date   && date <= max )
        //         ) {
        //             return true;
        //         }
        //         return false;
        //     }
        // );

        $(document).ready(function() {
            // minDate = Date($('#min'), {
            //     format: 'mm/dd/yyyy'
            // });
            // maxDate = Date($('#max'), {
            //     format: 'mm/dd/yyyy'
            // });
            // $.fn.dataTable.ext.search.push(
            //     function (settings, data, dataIndex) {
            //         var min = $('#min').datepicker('getDate');
            //         var max = $('#max').datepicker('getDate');
            //         var startDate = new Date(data[5]);
            //         if (min == null && max == null) return true;
            //         if (min == null && startDate <= max) return true;
            //         if (max == null && startDate >= min) return true;
            //         if (startDate <= max && startDate >= min) return true;
            //         return false;
            //     }
            // );
            // $('#min').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            // $('#max').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            var table = $('#example2').DataTable({
                processing: true,
                serverSide: true,
                responsive:true,
                ajax: {
                    "url": "{{ url('/dokumen')}}",
                    "data": {
                        "id_jenis": "{{app('request')->input('id_jenis')}}",

                        "min": "{{app('request')->input('min')}}",

                        "max": "{{app('request')->input('max')}}",
                    }

                },
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
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
            // Event listener to the two range filtering inputs to redraw on input
            // $('#min, #max').change(function () {
            //     table.draw();
            // });
            // $(document).on('change' ,'#min,#max', function (){
            //     table.draw();
            // });
            // $('#min,#max').on('change', function () {
            //     table.draw();
            // });

        });


    </script>
@endsection
