@extends('layouts.master')

@section('content')
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
                            <form method="get" action="{{route('akun.create')}}">
                                <button class="btn btn-info btn-lg float-right" type="submit">
                                    Create
                                </button>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No ID.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Instansi</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($akuns as $akun)
                                <tr>
                                    <td class="project-state">{{$akun->id_akun}}</td>
                                    <td class="project-state">{{$akun->nama_user}}</td>
                                    <td class="project-state">{{$akun->instansi}}</td>
                                    <td class="project-state">{{$akun->username}}</td>
                                    <td class="project-state">{{$akun->password}}</td>
                                    <td class="project-actions text-center">
                                        <form action="{{route('akun.destroy', $akun->id_akun)}}" method="POST">
                                            <a class="btn btn-info btn-sm" href="{{route('akun.edit', $akun->id_akun)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No. ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Instansi</th>
                                    <th>Username</th>
                                    <th>Password</th>
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

@endsection