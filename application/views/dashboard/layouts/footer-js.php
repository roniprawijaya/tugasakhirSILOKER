<script src="<?= base_url('/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('/assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
<script src="<?= base_url('/assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- apps -->
<!-- apps -->
<script src="<?= base_url('/assets/js/app-style-switcher.js') ?>"></script>
<script src="<?= base_url('/assets/js/feather.min.js') ?>"></script>
<script src="<?= base_url('/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') ?>"></script>
<script src="<?= base_url('/assets/js/sidebarmenu.js') ?>"></script>
<script src="<?= base_url('/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('/assets/js/custom.min.js') ?>"></script>
<!--This page JavaScript -->

<script>
    if($('#default_order').html()){
        $('#default_order').DataTable();
    }    
</script>

</body>

</html>