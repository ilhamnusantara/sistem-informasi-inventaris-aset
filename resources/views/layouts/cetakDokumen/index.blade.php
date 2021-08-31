@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cetak Dokumen</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Cetak Dokumen Admin Kecamatan</li>
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
                                <div class="col-sm-12">
                                    <form class="form-inline" action="{{route('cetakDok')}}" method="GET">
                                        <div class="col-md-1">
                                            <input type="checkbox" id="file_spk" name="file_spk" value="1" @if(request()->file_spk) checked @endif>
                                            <label for="vehicle1" class="text-red">SPK Kosong</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="checkbox" id="file_bast" name="file_bast" value="1" @if(request()->file_bast) checked @endif>
                                            <label for="vehicle2" class="text-red">BAST Kosong</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="checkbox" id="foto" name="foto" value="1" @if(request()->foto) checked @endif>
                                            <label for="vehicle3" class="text-red">Foto Kosong</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                            <a type="button" class="btn btn-default" href="{{route('cetakDok')}}">Refresh</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-md-center">
{{--                                    <th>NO</th>--}}
                                    <th>Instansi</th>
                                    <th>Keterangan Belanja</th>
{{--                                    <th>Rincian Belanja</th>--}}
                                    <th>File SPK</th>
                                    <th>File BAST</th>
                                    <th>File Foto</th>
                                </tr>
                                </thead>
{{--                                <tbody>--}}
{{--                                <?php $no = 1 ?>--}}
{{--                                @foreach($dokumens as $dokumen)--}}
{{--                                    <tr>--}}
{{--                                        <td class="project-state text-md-center">{{$no++}}</td>--}}
{{--                                        <td class="project-state">{{$dokumen->nama_instansi}}</td>--}}
{{--                                        <td class="project-state">{{$dokumen->keterangan_belanja}}</td>--}}
{{--                                        <td class="project-state"> {{substr($dokumen->rincian_belanja,0,15).'....'}}</td>--}}
{{--                                        @if($dokumen->file_spk == null)--}}
{{--                                            <td class="project-state text-md-center text-red">Belum Upload File SPK</td>--}}
{{--                                        @else--}}
{{--                                            <td class="project-state text-md-center"><a href="{{ route('cetakDok.file', ['namafile' => $dokumen->file_spk])}}" target="_blank">Download</a></td>--}}
{{--                                        @endif--}}
{{--                                        @if($dokumen->file_bast == null)--}}
{{--                                            <td class="project-state text-md-center text-red">Belum Upload File BAST</td>--}}
{{--                                        @else--}}
{{--                                            <td class="project-state text-md-center"><a href="{{ route('cetakDok.file', ['namafile' => $dokumen->file_bast])}}" target="_blank">Download</a></td>--}}
{{--                                        @endif--}}
{{--                                        @if($dokumen->foto == null)--}}
{{--                                            <td class="project-state text-md-center text-red">Belum Upload File BAST</td>--}}
{{--                                        @else--}}
{{--                                            <td class="project-state text-md-center"><a href="{{ route('cetakDok.foto', ['namafoto' => $dokumen->foto])}}" >Download</a></td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
                                <tfoot>
                                <tr class="text-md-center">
{{--                                    <th>NO</th>--}}
                                    <th>Instansi</th>
                                    <th>Keterangan Belanja</th>
{{--                                    <th>Rincian Belanja</th>--}}
                                    <th>File SPK</th>
                                    <th>File BAST</th>
                                    <th>File Foto</th>
                                </tr>
                                </tfoot>
                            </table>
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
    <script type="text/javascript">

        $(document).ready(function() {
            var table = $('#example2').DataTable({
                processing: true,
                serverSide: true,
                responsive:true,
                ajax: {
                    "url": "{{ url('/cetak-dokumen')}}",
                    "data": {
                        "file_spk": "{{app('request')->input('file_spk')}}",

                        "file_bast": "{{app('request')->input('file_bast')}}",

                        "foto": "{{app('request')->input('foto')}}",
                    }

                },
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    // {data: 'jenis', name: 'jenis'},
                    {data: 'instansi', name: 'instansi'},
                    {data: 'keterangan_belanja', name: 'keterangan_belanja'},
                    // {data: 'rincian_belanja', name: 'rincian_belanja'},
                    {data: 'file_spk', name: 'file_spk', orderable: false, searchable: false},
                    {data: 'file_bast', name: 'file_bast', orderable: false, searchable: false},
                    {data: 'foto', name: 'foto', orderable: false, searchable: false},
                ]
            });

        });


    </script>
@endsection
