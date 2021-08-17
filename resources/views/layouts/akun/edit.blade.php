@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Akun</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Akun</a></li>
                            <li class="breadcrumb-item active">Edit Akun</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ubah detail akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('user.update',$user)}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputPassword1">ID Akun</label>--}}
{{--                                        <input type="text" class="form-control" name="id" id="id" value="{{$user->id}}" placeholder="ID Akun">--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" placeholder="Nama lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>Instansi</label>
                                        <select class="form-control" name="nama_instansi" id="nama_instansi">
                                            <option class="text-bold" value="{{$user->nama_instansi}}">{{$user->nama_instansi}}</option>
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
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                @if($user->status == 0)
                                                    <option class="text-bold" value="0">User</option>
                                                @else
                                                    <option class="text-bold" value="1">Admin</option>
                                                @endif
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
