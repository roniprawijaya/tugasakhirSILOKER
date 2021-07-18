<?php $this->view('frontend/layouts/header'); ?>
<?php $this->view('frontend/layouts/navbar'); ?>
<div class="container" style="min-height: calc(90vh - 210px);">
    <?php $this->view($subview); ?>
</div>
<?php $this->view('frontend/layouts/footer'); ?>