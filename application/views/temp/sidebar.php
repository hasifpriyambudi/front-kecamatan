<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="index.html" class="navbar-brand sidebar-gone-hide">Dashboard Banjarnegara</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <form class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Pengunjung</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" data-toggle="modal" data-target="#modalInformasi" class="dropdown-item has-icon">
                                <i class="fas fa-tachometer-alt"></i> Informasi Dashboard
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item <?= $this->uri->segment(2) == '' ? 'active' : '' ?>">
                            <a href="<?= base_url('welcome') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Beranda</span></a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(2) == 'penduduk' ? 'active' : '' ?>">
                            <a href="<?= base_url('welcome/penduduk') ?>" class="nav-link"><i class="fas fa-user"></i><span>Data Kependudukan</span></a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(2) == 'keluarga' ? 'active' : '' ?>">
                            <a href="<?= base_url('welcome/keluarga') ?>" class="nav-link"><i class="fas fa-users"></i><span>Data Keluarga</span></a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(2) == 'anggaran' ? 'active' : '' ?>">
                            <a href="<?= base_url('welcome/anggaran') ?>" class="nav-link"><i class="fas fa-money-bill-wave"></i><span>Data Keuangan</span></a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(2) == 'bantuan' ? 'active' : '' ?>">
                            <a href="<?= base_url('welcome/bantuan') ?>" class="nav-link"><i class="fas fa-praying-hands"></i><span>Data Program & Bantuan</span></a>
                        </li>
                    </ul>
                </div>
            </nav>