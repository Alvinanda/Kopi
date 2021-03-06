
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3">Owner <?= $session['nama_outlet'] ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/index') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tambahkan data:</h6>
                        <a class="collapse-item" href="<?= base_url('owner/tambahPegawai') ?>">Pegawai</a>
                        <a class="collapse-item" href="<?= base_url('owner/tambahPengeluaran') ?>">Pengeluaran </a>
                        <a class="collapse-item" href="<?= base_url('owner/tambahPengeluaranTetap') ?>">Pengeluaran Tetap</a>
                        <a class="collapse-item" href="<?= base_url('owner/tambahMenuBar') ?>">Menu Bar</a>
                        <a class="collapse-item" href="<?= base_url('owner/tambahMenuRetail') ?>">Menu Retail</a>
                        <a class="collapse-item" href="<?= base_url('owner/tambahGaji') ?>">Gaji</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Lihat Data</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Lihat data:</h6>
                        <a class="collapse-item" href="<?= base_url('owner/lihatPegawai') ?>">Pegawai</a>
                        <a class="collapse-item" href="<?= base_url('owner/lihatPengeluaran') ?>">Pengeluaran</a>
                        <a class="collapse-item" href="<?= base_url('owner/lihatPengeluaranTetap') ?>">Pengeluaran Tetap</a>
                        <a class="collapse-item" href="<?= base_url('owner/lihatMenuBar') ?>">Menu Bar</a>
                        <a class="collapse-item" href="<?= base_url('owner/lihatMenuRetail') ?>">Menu Retail</a>
                        <a class="collapse-item" href="<?= base_url('owner/lihatGaji') ?>">Gaji</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/lihatPenjualan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjualan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/lihatPenjualanHariIni') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjualan Hari Ini</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/lihatPenjualanMingguan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjualan Mingguan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/lihatPenjualanBulanan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjualan Bulanan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('owner/lihatInvoice') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Invoice Bulan Ini</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
