<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuwi</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Akun</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Akun</li>
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
                        <h3 class="card-title m-0">Daftar Akun</h3>
                        <button class="btn btn-info btn-lg float-right" type="submit" data-toggle="modal" data-target="#exampleModal">
                            Create
                        </button>
                    </div>
                    <!-- Modal induk belanja -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Induk Belanja</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" action="{{ route('usex.stor') }}" method="POST">
                                        {{ csrf_field() }}
                                        @if(session()->has('error'))
                                            <span class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </span>
                                        @endif
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                            <div class="col-md-6">
                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" >
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                            <div class="col-md-6">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="">Pilih Status</option>
                                                    <option value="0">User</option>
                                                    <option value="1">Admin</option>
                                                </select>

                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="status" class="col-md-4 col-form-label text-md-right">Nama Instansi</label>
                                            <div class="col-md-6">
                                                <select class="form-control" name="nama_instansi" id="nama_instansi">
                                                    <option value="">Pilih Instansi</option>
                                                    <option value="Kecamatan Taman">Kecamatan Taman</option>
                                                    <option value="Kelurahan Bebekan">Kelurahan Bebekan</option>
                                                    <option value="Kelurahan Geluran">Kelurahan Geluran</option>
                                                    <option value="Kelurahan Kalijaten">Kelurahan Kalijaten</option>
                                                    <option value="Kelurahan Ketegan">Kelurahan Ketegan</option>
                                                    <option value="Kelurahan Ngelom">Kelurahan Ngelom</option>
                                                    <option value="Kelurahan Sepanjang">Kelurahan Sepanjang</option>
                                                    <option value="Kelurahan Taman">Kelurahan Taman</option>
                                                    <option value="Kelurahan Wonocolo">Kelurahan Wonocolo</option>
                                                </select>

                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Registrasi
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Instansi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach($users as $user)
                                <tr>
                                    <td class="project-state text-center">{{$no++}}</td>
                                    <td class="project-state">{{$user->name}}</td>
                                    <td class="project-state">{{$user->username}}</td>
                                    <td class="project-state">{{$user->nama_instansi}}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm" type="submit" data-toggle="modal" data-target="#exampleModal">
{{--                                            <a class="btn btn-info btn-sm" href="{{route('user.edit', $user->id)}}">--}}
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
{{--                                        <a class="btn btn-danger btn-sm" href="#" onclick="return confirm('Data akan dihapus, lanjutkan?')">--}}
                                        <a class="btn btn-danger btn-sm" href="{{route('usex.dedel', $user->id)}}" onclick="return confirm('Data akan dihapus, lanjutkan?')">
                                            <i class="fas fa-trash">
                                            </i>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Instansi</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{asset('/dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('/dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('/dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/toastr/toastr.min.css')}}">
    <script src="{{asset('/dashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        $(document).ready(function (){
            $(document).on('change' , '#gambar' , function (){
                let gambar =  $('#gambar').val()
                $('.custom-file-label').text(gambar)
            });
        });
    </script>
    <!-- ChartJS -->
{{--    <script src="{{asset('/dashboard/plugins/chart.js/Chart.min.js')}}"></script>--}}
    <!-- Sparkline -->
    {{--<script src="{{asset('/dashboard/plugins/sparklines/sparkline.js')}}"></script>--}}
    <!-- JQVMap -->
    <script src="{{asset('/dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('/dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('/dashboard/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('/dashboard/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('/dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/dashboard/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/dashboard/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('/dashboard/dist/js/pages/dashboard.js')}}"></script>
</body>
</html>
