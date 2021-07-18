<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php echo form_open(base_url('/admin/mitra/update')) ?>
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-4">
                            <h4 class="card-title"><?= $meta['title'] ?></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="form-group">
                                    <label class="mr-sm-2">Nama Perusahaan/Organisasi</label><span class="text-danger">*</span>
                                    <input type="hidden" name="id" class="form-control" value="<?= $data->id ?>" required>
                                    <input type="text" name="nama" class="form-control" value="<?= $data->nama ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Bidang Usaha</label><span class="text-danger">*</span>
                                    <select name="bidang_usaha_id" class="form-control w-50" required>
                                        <?php foreach($bidangUsaha as $value){ ?>
                                            <option value="<?= $value->id ?>" <?= ($value->id === $data->bidang_usaha_id) ? "selected" : "" ?>><?= $value->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Sektor Usaha</label><span class="text-danger">*</span>
                                    <select name="sektor_usaha_id" class="form-control w-50" required>
                                        <?php foreach($sektorUsaha as $value){ ?>
                                            <option value="<?= $value->id ?>" <?= ($value->id === $data->sektor_usaha_id) ? "selected" : "" ?>><?= $value->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Alamat Kantor</label>
                                    <textarea name="alamat" class="form-control" required><?= $data->alamat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Kontak Person</label>
                                    <input type="text" name="kontak" class="form-control" value="<?= $data->kontak ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">No HP/Telepon</label>
                                    <input type="text" name="telpon" class="form-control" value="<?= $data->telpon ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $data->email ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Alamat Web</label>
                                    <input type="text" name="web" class="form-control" value="<?= $data->web ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('/admin/mitra') ?>" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
