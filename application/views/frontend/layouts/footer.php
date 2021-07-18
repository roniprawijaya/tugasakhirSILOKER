<footer class="container-fluid">
        <div class="row pt-4 card">
            <div class="col-12">
                <p>Develop By Mahasiswa @STT-NF 2020</p>
            </div>
        </div>
    </footer>
    <script src="<?= base_url("assets/js/bootstrap.bundle.min.js") ?>"></script>
    <script>
        function alertlogin() {
            window.alert('Anda Belum Login, Silahkan Login Terlebih dahulu!');
            window.location.href="<?= base_url('auth') ?>"
        }
    </script>
</body>

</html>