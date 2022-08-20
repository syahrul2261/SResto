<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3">
    KATEGORI
</div>
<div class="card shadow-box fw-bold">
    <div class="card-header bg-primary text-light">
        <div class="float-end">
            <div class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#add_kategori">ADD</div>
            <a href="<?= site_url('manager/kategori/delete_all') ?>" class="btn btn-sm btn-light">DELETE</a>
        </div>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">KATEGORI</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; 
                foreach ($get_kategori as $k): 
                    $i++;
                    ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $k->nama_kategori ?></td>
                    <td class="text-center" style="width: 150px">
                        <div class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#update_kategori<?= $k->id_kategori ?>">EDIT</div>
                        <a onclick="return confirm('Apa Anda Yakin Untuk Menghapus Data Ini?')" href="<?= site_url('manager/kategori/delete/'.$k->id_kategori) ?>" class="btn btn-sm btn-danger mb-1">HAPUS</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="add_kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('manager/kategori/add') ?>" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary text-light fw-bold" id="basic-addon3">Nama Kategori</span>
                        <input type="text" class="form-control" name='nama_kategori' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach($get_kategori as $k): ?>
<div class="modal fade" id="update_kategori<?= $k->id_kategori ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('manager/kategori/update') ?>" method="post">
                <input type="hidden" name="id_kategori" value="<?= $k->id_kategori ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary text-light fw-bold" id="basic-addon3">Nama Kategori</span>
                        <input value="<?= $k->nama_kategori ?>" type="text" class="form-control" name='nama_kategori' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- adasdadsa -->