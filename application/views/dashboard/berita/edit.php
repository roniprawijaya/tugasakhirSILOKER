<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php echo form_open_multipart(base_url('/admin/berita/update')) ?>
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-4">
                        <h4 class="card-title"><?= $meta['title'] ?></h4>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="mr-sm-2">Judul</label><span class="text-danger">*</span>
                                <input type="hidden" name="id" value="<?= $data->id ?>">
                                <input type="text" placeholder="Judul" name="judul" class="form-control" value="<?= $data->judul ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Isi</label><span class="text-danger">*</span>
                                <textarea name="isi" class="form-control" cols="30" rows="10"><?= $data->isi ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mr-sm-2">Foto</label><span class="text-danger">*</span><br>
                                <img src="<?= base_url($data->foto) ?>" class="img-fluid w-75 mt-2 mb-4" alt="">
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url('/admin/berita') ?>" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>