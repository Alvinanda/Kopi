
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('manajer/index') ?>">

                <div class="sidebar-brand-text mx-3">Manajer <?= $session['nama_outlet'] ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('manajer/index') ?>">
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
                        <a class="collapse-item" href="<?= base_url('manajer/tambahStarMember') ?>">Star Member</a>
                        <a class="collapse-item" href="<?= base_url('manajer/tambahBahanbaku') ?>">Bahan Baku</a>
                        <a class="collapse-item" href="<?= base_url('manajer/tambahShift') ?>">Shift</a>
                        <a class="collapse-item" href="<?= base_url('manajer/tambahJadwalShift') ?>">Jadwal Shift</a>
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
                        <a class="collapse-item" href="<?= base_url('manajer/lihatStarMember') ?>">Star Member</a>
                        <a class="collapse-item" href="<?= base_url('manajer/lihatBahanBaku') ?>">Bahan Baku</a>
                        <a class="collapse-item" href="<?= base_url('manajer/lihatShift') ?>">Shift</a>
                        <a class="collapse-item" href="<?= base_url('manajer/lihatJadwalShift') ?>">Jadwal Shift</a>
                        <a class="collapse-item" href="<?= base_url('manajer/lihatValidasi') ?>">Validasi Absensi</a>
                        <a class="collapse-item" href="<?= base_url('manajer/lihatMenuBar') ?>">Menu Bar</a>
                        <a class="collapse-item" href="<?= base_url('manajer/lihatMenuRetail') ?>">Menu Retail</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('manajer/lihatPenjualanHariIni') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjualan Hari Ini</span></a>
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
