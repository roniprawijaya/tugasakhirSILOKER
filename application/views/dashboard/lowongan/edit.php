<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php echo form_open(base_url('/admin/lowongan/update')) ?>
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-4">
                            <h4 class="card-title"><?= $meta['title'] ?></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="form-group">
                                    <label class="mr-sm-2">Nama Perusahaan/Organisasi</label><span class="text-danger">*</span>
                                    <input type="hidden" name="id" class="form-control" value="<?= $data->id ?>" required>
                                    <select name="mitra_id" class="form-control w-75" required>
                                        <?php foreach($mitra as $value){ ?>
                                            <option value="<?= $value->id ?>" <?= ($value->id === $data->mitra_id) ? "selected" : "" ?>><?= $value->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Deskripsi Lowongan</label>
                                    <textarea name="deskripsi_lowongan" class="form-control" required><?= $data->deskripsi_pekerjaan ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Deskripsi Kualifikasi Lowongan</label>
                                    <textarea name="deskripsi_kualifikasi_lowongan" class="form-control" required><?= $data->deskripsi_kualifikasi_pekerjaan ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Kategori Lowongan</label><br>
                                    <?php foreach ($keahlian as $value) { ?>
                                        <label class="pr-3"><input class="mr-1" name="kategori_lowongan[]" type="checkbox" value="<?= $value->id ?>" <?= in_array($value->id, $lowonganKeahlian) ? "checked" : "" ?>><?= $value->nama ?></label>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Tanggal Dateline</label>
                                    <input type="date" name="tanggal_akhir" class="form-control" value="<?= $data->tanggal_akhir ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $data->email ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('/admin/lowongan') ?>" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
