<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-4">
                        <h4 class="card-title">List <?= $meta['title'] ?></h4>
                        <a href="<?= base_url("/admin/usaha/add/$type") ?>" class="btn btn-info">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap w-100">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">No</th>
                                    <th><?= ucfirst($type) ?></th>
                                    <th width="10" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $key+1 ?></td>
                                        <td><?= $value->nama ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url("/admin/usaha/edit/$type") ?>/<?= $value->id ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            <a onclick="if(! confirm('Hapus <?= $value->nama ?>')) return false;" href="<?= base_url("/admin/usaha/delete/$type") ?>/<?= $value->id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>