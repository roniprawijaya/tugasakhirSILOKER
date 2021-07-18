<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="<?= base_url('/admin') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('/admin/user') ?>" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu">User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Lowongan </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?= base_url('/admin/keahlian') ?>" class="sidebar-link">
                                <span class="hide-menu"> Keahlian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('/admin/lowongan') ?>" class="sidebar-link">
                                <span class="hide-menu"> Lowongan Kerja</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Mitra </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?= base_url('/admin/usaha/bidang') ?>" class="sidebar-link">
                                <span class="hide-menu"> Bidang Usaha</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('/admin/usaha/sektor') ?>" class="sidebar-link">
                                <span class="hide-menu"> Sektor Usaha</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('/admin/mitra') ?>" class="sidebar-link">
                                <span class="hide-menu"> Mitra</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('/admin/berita') ?>" aria-expanded="false">
                        <i data-feather="list" class="feather-icon"></i>
                        <span class="hide-menu">Berita</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>