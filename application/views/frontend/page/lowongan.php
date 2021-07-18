<div class="row pt-4">
    <div class="col-md-9">
        <div class="list-lowongan">
            <?php foreach ($data as $value) { ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $value->nama_perusahaan ?></h4>
                        <p class="card-text"><?= $value->deskripsi_kualifikasi_pekerjaan ?></p>
                        <span><?= $value->tanggal_akhir ?></span>
                        <a href="<?= base_url("lowongan/detail/$value->id") ?>" class="ml-2 card-link">Lihat detail</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php $this->load->view('frontend/layouts/sidebar') ?>
</div>