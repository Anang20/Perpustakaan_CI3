<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Beranda'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Perpus</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Data Anggota -->
    <li class="nav-item active">
        <!-- akan di arahkan ke controller anggota -->
        <a class="nav-link" href="<?= base_url('anggota'); ?>">
            <i class="fas fa-user"></i>
            <span>Data Anggota</span>
        </a>
    </li>

    <!-- Nav Item - Data Anggota -->
    <li class="nav-item active">
        <!-- akan di arahkan ke controller cetak -->
        <a class="nav-link" href="<?= base_url('cetak'); ?>">
            <i class="fas fa-id-card"></i>
            <span>Cetak Kartu Anggota</span>
        </a>
    </li>

    <!-- Nav Item - Pages Master Buku -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-book"></i>
            <span>Master Buku</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Buku</h6>
                <b><a class="collapse-item text-success" href="<?= base_url('Pengarang'); ?>">Pengarang</a></b>
                <b><a class="collapse-item text-success" href="<?= base_url('Penerbit'); ?>">Penerbit</a></b>
                <b><a class="collapse-item text-success" href="<?= base_url('Buku'); ?>">Buku</a></b>
            </div>
        </div>
    </li>

     <!-- Nav Item - Transaksi -->
     <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-exchange-alt"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Transaksi</h6>
                <b><a class="collapse-item text-success" href="<?= base_url('Peminjaman') ?>">Peminjaman</a></b>
                <b><a class="collapse-item text-success" href="<?= base_url('Pengembalian') ?>">Pengembalian</a></b>
            </div>
        </div>
    </li>

    <!-- Nav Item - Laporan -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-file-alt"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Laporan</h6>
                <b><a class="collapse-item text-success" href="<?= base_url('Laporan/peminjaman'); ?>">Laporan Peminjaman</a></b>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Data Master -->
    <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="#">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->




