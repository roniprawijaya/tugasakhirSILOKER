<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php if (!empty(form_error('email'))) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <?php echo form_error('email'); ?>
                </div>
            <?php } ?>
            <div class="card">
                <?php echo form_open(base_url('/admin/user/save')) ?>
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-4">
                            <h4 class="card-title"><?= $meta['title'] ?></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label class="mr-sm-2">Nama</label><span class="text-danger">*</span>
                                    <input type="text" placeholder="Nama" name="nama" class="form-control" value="<?php echo set_value('nama') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Email</label><span class="text-danger">*</span>
                                    <input type="email" placeholder="email@gmail.com" name="email" class="form-control" value="<?php echo set_value('email') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Password</label><span class="text-danger">*</span>
                                    <input type="password" placeholder="....." name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2">Role</label><span class="text-danger">*</span>
                                    <select name="role" class="form-control" required>
                                        <option value="admin">Admin</option>
                                        <option value="mitra">Mitra</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="active" id="active">
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('/admin/user') ?>" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
