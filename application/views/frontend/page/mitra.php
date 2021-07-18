<div class="row pt-4">
    <div class="col-md-9">
        <a href="<?= $this->session->userdata('logIn') ? base_url('mitra/daftar') : 'javascript:alertlogin()' ?>" class="card-link">Daftar Menjadi Mitra</a>
        <div class="list-lowongan pt-3">
            <?php foreach ($data as $value) { ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $value->nama ?></h4>
                        <h5 class="card-subtitle mb-2 text-muted"><?= $value->nama_bidang ?></h5>
                        <p class="card-text"><?= $value->alamat ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php $this->load->view('frontend/layouts/sidebar') ?>
</div>