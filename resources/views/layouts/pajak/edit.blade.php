@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pajak Belanja</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Jenis Belanja</a></li>
                            <li class="breadcrumb-item active">Edit Pajak Belanja</li>
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
                                <h3 class="card-title">Edit Pajak Belanja</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('pajak.update', $pajak)}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>id_belanja</label>
                                        <input type="text" class="form-control" name="Sid_belanja" id="id_belanja"  value="{{$pajak->id_belanja}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Pajak</label>
                                        <input type="text" class="form-control" name="Sjenis_pajak" id="jenis_pajak"  value="{{$pajak->jenis_pajak}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nominal Pajak</label>
                                        <input type="text" class="form-control" name="nominal_pajak" id="nominal_pajak"  value="{{$pajak->nominal_pajak}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Id Billing</label>
                                        <input type="text" class="form-control" name="id_billing" id="nominal_pajak"  value="{{$pajak->id_billing}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NTPN</label>
                                        <input type="text" class="form-control" name="ntpn" id="ntpn"  value="{{$pajak->ntpn}}">
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
