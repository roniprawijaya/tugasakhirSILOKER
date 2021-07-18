<div class="col-md-3">
    <h4 class="card-title">Link Berita Terbaru</h4>
    <div class="list-group">
        <?php if ($berita) {
            foreach ($berita as $value) { ?>
                <a href="<?= base_url("/berita/$value->id") ?>" class="list-group-item"><?= $value->judul ?></a>
        <?php }
        } ?>
    </div>
</div>