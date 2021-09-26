@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cetak Laporan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Cetak Laporan</li>
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
                                <div class="col-sm-9">
{{--                                    <form class="form-inline ml-3 float-md-right" action="#" method="GET">--}}
{{--                                        <div class="input-group input-group-sm">--}}
{{--                                            <div class="input-group-append">--}}
{{--                                                <a href="#" class="btn btn-success next" id="btn-cetak"><i class="fas fa-download"></i> Cetak Laporan</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
                                </div>
                                <div class="col-sm-3">
                                    <div class="float-md-right">
                                        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
                                            Cetak
                                        </button>
                                    </div>
                                    <!-- Modal induk belanja -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Filter Cetak Laporan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('cetakLap')}}" method="GET">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label>Tanggal SP2D:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                      <span class="input-group-text">
                                                                        <i class="far fa-calendar-alt"></i>
                                                                      </span>
                                                                </div>
                                                                <input type="text" name="date" class="form-control float-right" id="reservation">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Master Belanja</label>
                                                            <select class="form-control select2" style="width: 100%;" name="id_jenis" id="id_jenis">
                                                                <option value="">Pilih Master Belanja</option>
                                                                @foreach ($jenisBelanjas as $jenisBelanja)
                                                                    <option value="{{$jenisBelanja->id_jenis}}" data-kategori="{{str_replace(' ','_',strtolower($jenisBelanja->kategori))}}" {{request()->get('jenis') == $jenisBelanja->id_jenis ? 'selected':''}}>[{{$jenisBelanja->norek_jenis}}] - {{$jenisBelanja->jenis_belanja}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--                                                            <button type="submit" class="btn btn-primary">Filter</button>--}}
                                                            <a href="#" class="btn btn-success next" id="btn-cetak"><i class="fas fa-download"></i> Cetak Laporan</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-md-center">
                                    <th>No.</th>
                                    <th>Instansi</th>
                                    <th>Belanja</th>
                                    <th>Total Belanja</th>
                                    <th>Rekanan</th>
                                    <th>No. PBB</th>
                                    <th>No. SP2D</th>
                                    <th>Tanggal</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="text-md-center">
                                    <th>No.</th>
                                    <th>Instansi</th>
                                    <th>Belanja</th>
                                    <th>Total Belanja</th>
                                    <th>Rekanan</th>
                                    <th>No. PBB</th>
                                    <th>No. SP2D</th>
                                    <th>Tanggal</th>
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            // $('#reservation').daterangepicker()
            $( "#btn-cetak" ).click(function() {
                var url = '{{ route("export", ['id_jenis' => ':id_jenis', 'tanggal'=>':date']) }}';

                url = url.replace('%3Aid_jenis', $('#id_jenis').val());

                url = url.replace('%3Adate', $('#reservation').val());
                url = url.replace('&amp;','&');

                window.open(url, '_blank');
            });


        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable({
                processing: true,
                // serverSide: true,
                responsive:true,
                ajax: {
                    "url": "{{ url('/cetak-laporan') }}",
                    "data": {

                    }

                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'instansi', name: 'instansi'},
                    {data: 'dokumen', name: 'dokumen'},
                    {data: 'total_belanja', name: 'total_belanja', render: $.fn.dataTable.render.number( ',', ' ',0,'Rp. ')},
                    {data: 'rekanan', name: 'rekanan'},
                    {data: 'no_pbb_ls', name: 'no_pbb_ls'},
                    {data: 'sp2d', name: 'sp2d'},
                    {data: 'tanggal_sp2d', name: 'tanggal_sp2d'},
                ]
            });
        });
    </script>
@endsection
