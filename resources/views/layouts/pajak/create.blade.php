@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Pajak</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('dokumen')}}">Dokumen</a></li>
                            <li class="breadcrumb-item active">Tambah Pajak</li>
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
                                <h3 class="card-title">Masukan Pemungutan Pajak</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('pajak.store')}}" enctype="multipart/form-data"  method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>id_belanja</label>
                                        <input type="text" class="form-control" name="id_belanja" id="id_belanja"  placeholder="ID Belanja">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Pajak</label>
                                        <select class="form-control" name="jenis_pajak[]" id="jenis_pajak">
                                            <option value="PPN">PPN</option>
                                            <option value="Pph21">PPh21</option>
                                            <option value="PPh22">Pph22</option>
                                            <option value="PPh23">PPh23</option>
                                            <option value="PPh Psl 4 ayat 2">PPh Psl 4 ayat 2</option>
                                            <option value="Pajak Resto">Pajak Resto</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nominal Pajak</label>
                                        <input type="text" class="form-control" name="nominal_pajak[]" id="nominal_pajak"  placeholder="Nominal Pajak">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Id Billing</label>
                                        <input type="text" class="form-control" name="id_billing[]" id="nominal_pajak"  placeholder="ID Billing">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NTPN</label>
                                        <input type="text" class="form-control" name="ntpn[]" id="ntpn"  placeholder="NTPN">
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-success" href="javascript:void(0);" id="add_button" title="Add field">TAMBAH</a>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        var maxField = 3; //Input fields increment limitation
                                        var addButton = $('#add_button'); //Add button selector
                                        var wrapper = $('.card-body'); //Input field wrapper
                                        var fieldHTML = '<div class="form-group">';
                                        fieldHTML=fieldHTML + '<div class="form-group"><label for="">Jenis Belanja</label><select class="form-control" name="jenis_pajak[]" id="jenis_pajak"><option value="PPN">PPN</option><option value="Pph21">PPh21</option><option value="PPh22">Pph22</option><option value="PPh23">PPh23</option><option value="PPh Psl 4 ayat 2">PPh Psl 4 ayat 2</option><option value="Pajak Resto">Pajak Resto</option></select></div>';
                                        fieldHTML=fieldHTML + '<div class="form-group"><label for="">Nominal Pajak</label><input class="form-control" placeholder="Nominal Pajak" type="text" name="nominal_pajak[]" /></div>';
                                        fieldHTML=fieldHTML + '<div class="form-group"><label for="">ID Billing</label><input class="form-control" placeholder="Id Billing" type="text" name="id_billing[]" /></div>';
                                        fieldHTML=fieldHTML + '<div class="form-group"><label for="">NTPN</label><input class="form-control" placeholder="NTPN" type="text" name="ntpn[]" /></div>';
                                        fieldHTML=fieldHTML + '<div class="col-md-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">HAPUS</a></div>';
                                        fieldHTML=fieldHTML + '</div>';
                                        var x = 1; //Initial field counter is 1

                                        //Once add button is clicked
                                        $(addButton).click(function(){
                                            //Check maximum number of input fields
                                            if(x < maxField){
                                                x++; //Increment field counter
                                                $(wrapper).append(fieldHTML); //Add field html
                                            }
                                        });

                                        //Once remove button is clicked
                                        $(wrapper).on('click', '.remove_button', function(e){
                                            e.preventDefault();
                                            $(this).parent('').parent('').remove(); //Remove field html
                                            x--; //Decrement field counter
                                        });
                                    });
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
