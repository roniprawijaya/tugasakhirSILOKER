<div class="row pt-4">
    <div class="col-md-9">
        <div class="list-lowongan">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= $data->judul ?></h4>
                    <img src="<?= base_url($data->foto) ?>" class="img-fluid" alt="">
                    <p class="card-text"><?= $data->created_at ?></p>
                    <p><?= $data->isi ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('frontend/layouts/sidebar') ?>
</div>