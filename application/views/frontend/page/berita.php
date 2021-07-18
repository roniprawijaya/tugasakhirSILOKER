<div class="row pt-4">
    <div class="col-md-12">
        <div class="row">
            <?php if ($berita) {
                foreach ($berita as $value) { ?>
                    <div class="col-md-6">
                        <div class="card">
                            <img class="card-img-top img-fluid" style="height: 275px; object-fit: cover;" src="<?= base_url($value->foto) ?>" alt="<?= $value->foto ?>">
                            <div class="card-body">
                                <h4 class="card-title"><?= $value->judul ?></h4>
                                <p class="card-text"><?= substr($value->isi, 0, 120) ?></p>
                                <a href="<?= base_url("berita/$value->id") ?>" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
            <?php } } ?>
        </div>
    </div>
</div>