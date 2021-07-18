<header class="my-5">
    <div class="pt-3 text-center col-12">
        <h1>Sistem Informasi Lowongan Kerja NF - SILOKERNF</h1>
    </div>
</header>

<div class="container">
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("lowongan")?>">Lowongan Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->session->userdata('logIn') ? base_url('loker') : 'javascript:alertlogin()' ?>">Isi Loker</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("mitra")?>">Daftar Mitra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("berita")?>">Berita</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control rounded-pill mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <?php if ($this->session->userdata('logIn')) { ?>
                <a href="<?= base_url("auth/logout")?>">Logout</a>
            <?php } else { ?>
                <a href="<?= base_url("auth")?>">Login</a>
            <?php } ?>
        </div>
    </nav>
</div>