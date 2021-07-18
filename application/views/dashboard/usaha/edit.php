<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php echo form_open(base_url("/admin/usaha/update/$type")) ?>
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-4">
                            <h4 class="card-title"><?= $meta['title'] ?></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label class="mr-sm-2"><?= ucfirst($type) ?> Usaha</label><span class="text-danger">*</span>
                                    <input type="hidden" name="id" class="form-control" value="<?= $data->id ?>" required>
                                    <input type="text" name="nama" class="form-control" value="<?= (set_value('nama')) ? set_value('nama') : $data->nama ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url("/admin/usaha/$type") ?>" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
