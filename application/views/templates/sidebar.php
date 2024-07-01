<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <div>
                <img src="<?= base_url(); ?>assets/img/logos1.png" class="  w-75 content-center">
            </div>
            <a class="text-primary h4">SISTUNTING</a>
        </div>

        <ul class="sidebar-menu mt-3">
            <li class="menu-header">Menu</li>
            <li <?= $this->uri->segment(1) == 'dashboard' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                    <i class='bx bxs-home'></i> <span>Dashboard</span></a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Kelola Balita</span></a>
                <ul class="dropdown-menu">
                    <li <?= $this->uri->segment(1) == 'data_balita' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                        <a class="nav-link" href="<?= base_url('data_balita'); ?>">
                            </i> <span>Data Balita</span></a>
                    </li>

                    <li <?= $this->uri->segment(1) == 'gizi_balita' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                        <a class="nav-link" href="<?= base_url('gizi_balita'); ?>">
                            <span>Data Gizi Balita </span></a>
                    </li>
                </ul>
            </li>

            <li <?= $this->uri->segment(1) == 'data_gejala' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                <a class="nav-link" href="<?= base_url('data_gejala'); ?>">
                    <i class='bx bx-dna'></i> <span>Data Gejala</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'testing' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                <a class="nav-link" href="<?= base_url('testing'); ?>">
                    <i class='bx bx-street-view'></i> <span>Testing Stunting</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'data_konsultasi' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                <a class="nav-link" href="<?= base_url('data_konsultasi'); ?>">
                    <i class='bx bx-archive'></i> <span>Daftar Konsultasi</span></a>
            </li>



    </aside>
</div>