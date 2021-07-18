<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hii <?= $this->session->userdata('username') ?>!</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <?php foreach ($meta['breadcrumb'] as $key => $value) {
                            if (!empty($value)) { ?>
                                <li class="breadcrumb-item"><a href="<?= base_url($value) ?>"><?= $key ?></a></li>
                            <?php } else { ?>
                                <li class="breadcrumb-item text-muted active" aria-current="page"><?= $key ?></li>
                        <?php } } ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>