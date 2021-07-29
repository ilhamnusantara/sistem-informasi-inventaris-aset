@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ganti Password</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Akun</a></li>--}}
{{--                            <li class="breadcrumb-item active">Edit Akun</li>--}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center bg-gradient-danger">Ganti Password Yaa, Awas Lupa !!!</div>
                            @if(session()->has('error'))
                                <span class="alert alert-danger">
                        <strong>{{ session()->get('error') }}</strong>
                    </span>
                            @endif
                            @if(session()->has('success'))
                                <span class="alert alert-success">
                        <strong>{{ session()->get('success') }}</strong>
                    </span>
                            @endif
                            <div class="card-body">
                                <form method="POST" action="{{ route('change.password') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current_password">
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="password_confirmation">
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
