<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="brand-image">
            <img src="{{url('/dashboard/dist/img/sda.png')}}" class="brand-image" style="opacity: .8" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Admin | Kecamatan Taman</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('home')}}" class="{{Request::is('home')?'nav-link active':'nav-link'}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-header">MASTER</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa fa-briefcase"></i>
                    <p>
                        Data Master
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('akun.index')}}" class="{{Request::is('akun')?'nav-link active':'nav-link'}}">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Akun</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{route('iBelanja')}}" class="{{Request::is('jenis-belanja')?'nav-link active':'nav-link'}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Master Belanja</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">AKSI</li>
            <li class="nav-item">
                <a href="{{route('dokumen')}}" class="{{Request::is('dokumen')?'nav-link active':'nav-link'}}">
                    <i class="nav-icon fa fa-file"></i>
                    <p>
                        Dokumen
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('belanja')}}" class="{{Request::is('belanja')?'nav-link active':'nav-link'}}">
                    <i class="nav-icon fa fa-shopping-bag"></i>
                    <p>
                        Belanja
{{--                        <span class="badge badge-info right">3</span>--}}
                    </p>
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="{{route('pajak')}}" class="nav-link">--}}
{{--                    <i class="nav-icon fa fa-shopping-bag"></i>--}}
{{--                    <p>--}}
{{--                        Tes Pajak--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-header">LAPORAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa fa-list-alt"></i>
                    <p>
                        Cetak
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('cetakLap')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cetak Laporan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cetakDok')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cetak Dokumen</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
