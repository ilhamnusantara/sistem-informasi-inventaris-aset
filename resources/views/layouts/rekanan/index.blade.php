@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{--    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">--}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        /*a.btn-info{*/
        /*    line-height: 1em;*/
        /*    display: inline-block;*/
        /*    text-decoration: none;*/
        /*    padding: 8px;*/
        /*    margin: 10px;*/
        /*}*/
    </style>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Rekanan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @include('layouts.partials.flash-message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-md-center">
                                <h2>Data Rekanan</h2>
                            </div>
                        </div>
                    <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6">
                                    <div class="float-md-right">
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                            Tambah Data Rekanan
                                        </button>
                                    </div>
                                </div>
                                <!-- Modal Rekanan -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rekanan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('rekanan.store')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="inputNama">Nama Rekanan</label>
                                                        <input name="nama_rekanan" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Alamat</label>
                                                        <input name="alamat" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Nama Pimpinan</label>
                                                        <input name="nama_pimpinan" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">No. Telp</label>
                                                        <input name="no_telp" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">No. NPWP</label>
                                                        <input name="no_npwp" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">No. SIUP</label>
                                                        <input name="no_siup" type="text" class="form-control" id="inputNama" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNama">Email</label>
                                                        <input name="email" type="email" class="form-control" id="inputNama" aria-describedby="emailHelp">
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
                                    <th>No</th>
                                    <th>Nama Rekanan</th>
                                    <th>Alamat</th>
                                    <th>Nama Pimpinan</th>
                                    <th>No. Telp</th>
                                    <th>No. NPWP</th>
                                    <th>No. SIUP</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                <?php $no = 1 ?>--}}
{{--                                @foreach($rekanan as $rekanan)--}}
{{--                                    <tr>--}}
{{--                                        <td class="project-state text-md-center ">{{$rekanan->id_rekanan}}</td>--}}
{{--                                        <td class="project-state">{{$rekanan->nama_rekanan}}</td>--}}
{{--                                        <td class="project-state">{{$rekanan->alamat}}</td>--}}
{{--                                        <td class="project-state">{{$rekanan->nama_pimpinan}}</td>--}}
{{--                                        <td class="project-state">{{$rekanan->no_telp}}</td>--}}
{{--                                        <td class="project-state">{{$rekanan->no_npwp}}</td>--}}
{{--                                        <td class="project-state">{{$rekanan->no_siup}}</td>--}}
{{--                                        <td class="project-state">{{$rekanan->email}}</td>--}}
{{--                                        <td class="project-actions text-center">--}}
{{--                                            <a class="btn btn-info btn-sm" href="{{route('rekanan.edit', $rekanan->id_rekanan)}}">--}}
{{--                                                <i class="fas fa-pencil-alt">--}}
{{--                                                </i>--}}
{{--                                                Edit--}}
{{--                                            </a>--}}
{{--                                            <a class="btn btn-danger btn-sm" href="{{route('rekanan.delete', $rekanan)}}" onclick="return confirm('Data akan dihapus, lanjutkan?')">--}}
{{--                                                <i class="fas fa-trash">--}}
{{--                                                </i>--}}
{{--                                                Delete--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                                <tfoot>
                                <tr class="text-md-center">
                                    <th>No</th>
                                    <th>Nama Rekanan</th>
                                    <th>Alamat</th>
                                    <th>Nama Pimpinan</th>
                                    <th>No. Telp</th>
                                    <th>No. NPWP</th>
                                    <th>No. SIUP</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <hr/>
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
                // serverSide: true,
                responsive:true,
                ajax: {
                    "url": "{{ url('/rekanan') }}",
                    "data": {
                        {{--"id_jenis": "{{app('request')->input('id_jenis')}}",--}}

                        {{--"min": "{{app('request')->input('min')}}",--}}

                        {{--"max": "{{app('request')->input('max')}}",--}}
                    }

                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_rekanan', name: 'nama_rekanan'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'nama_pimpinan', name: 'nama_pimpinan'},
                    {data: 'no_telp', name: 'no_telp'},
                    {data: 'no_npwp', name: 'no_npwp'},
                    {data: 'no_siup', name: 'no_siup'},
                    {data: 'email', name: 'email'},
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
