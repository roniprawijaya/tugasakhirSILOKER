<div class="row pt-4">
    <div class="col-md-12">
        <?php if (!$this->session->userdata('logIn')) { ?>
            <div class="alert alert-danger" role="alert">
                <i class="dripicons-wrong mr-2"></i><strong>Anda tidak bisa mengisi loker karena anda belum login!!! <a href="<?= base_url("auth") ?>">Klik disini untuk login</a> </strong>
            </div>
        <?php } elseif (isUser()) { ?>
            <div class="alert alert-warning" role="alert">
                <i class="dripicons-wrong mr-2"></i><strong>Anda tidak bisa mengisi loker karena anda bukan Mitra!!! <a href="<?= base_url("mitra/daftar") ?>">Klik disini untuk daftar mitra</a> </strong>
            </div>
        <?php } elseif (empty($data)) { ?>
            <div class="alert alert-warning" role="alert">
                <i class="dripicons-wrong mr-2"></i><strong>Anda belum memiliki data Mitra!!! <a href="<?= base_url("mitra/daftar") ?>">Klik disini untuk daftar mitra</a> </strong>
            </div>
        <?php } else { ?>
            <div class="card">
                <?php echo form_open('/loker/save') ?>
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-4">
                        <h4 class="card-title"><?= $meta['title'] ?></h4>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <label class="mr-sm-2">Nama Perusahaan/Organisasi</label><span class="text-danger">*</span>
                                <input type="hidden" name="mitra_id" value="<?= $data->id ?>">
                                <input type="text" disabled class="form-control" value="<?= $data->nama ?>">
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Deskripsi Lowongan</label>
                                <textarea name="deskripsi_lowongan" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Deskripsi Kualifikasi Lowongan</label>
                                <textarea name="deskripsi_kualifikasi_lowongan" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Kategori Lowongan</label><br>
                                <?php foreach ($keahlian as $value) { ?>
                                    <label class="pr-3"><input class="mr-1" name="kategori_lowongan[]" type="checkbox" value="<?= $value->id ?>"><?= $value->nama ?></label>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Tanggal Dateline</label>
                                <input type="date" name="tanggal_akhir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>