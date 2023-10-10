<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('AdminLTE-2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                </a>
            </li>

            <li class="header">MASTER</li>

            <li>
                <a href="{{ route('kategori.index') }}">
                    <i class="fa fa-cube"></i> <span>Kategori</span>

                </a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}">
                    <i class="fa fa-cubes"></i> <span>Produk</span>
                </a>
            </li>

            <li>
                <a href="{{ route('member.index') }}">
                    <i class="fa fa-id-card"></i> <span>Member</span>

                </a>
            </li>

            <li>
                <a href="{{ route('supplier.index') }}">
                    <i class="fa fa-truck"></i> <span>Supplier</span>

                </a>
            </li>

            <li class="header">TRANSAKSI</li>
            <li>
                <a href="{{ route('pengeluaran.index') }}">
                    <i class="fa fa-money"></i> <span>Pengeluaran</span>
                </a>
            </li>

            <li>
                <a href="{{ route('daftarbeli.index') }}">
                    <i class="fa fa-download"></i> <span>Daftar Pembelian</span>
                </a>
            </li>

            <li>
                <a href="{{ route('daftarjual.index') }}">
                    <i class="fa fa-upload"></i> <span>Daftar Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksibeli.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Pembelian</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksijual.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Penjualan</span>
                </a>
            </li>

            <li class="header">REPORT</li>
            <li>
                <a href="#">
                    <i class="fa fa-file-pdf-o"></i> <span>Laporan</span>
                </a>
            </li>

            <li class="header">PENGATURAN</li>
            <li>
                <a href="{{ route('user.index')}}">
                    <i class="fa fa-user-circle"></i> <span>User</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Setting</span>
                </a>
            </li>
            {{-- <li>
                <a href="#">
                    <i class="fa fa-users"></i> <span>Profil</span>
                </a>
            </li> --}}
            <li>
            <a href="{{route('logout')}}">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
            </li>









        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
