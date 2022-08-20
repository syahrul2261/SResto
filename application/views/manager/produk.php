<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3">
    PRODUK
</div>
<div class="card shadow-box fw-bold">
    <div class="card-header bg-primary text-light">
        <div class="float-end">
            <a href="<?= site_url('manager/produk/cetak') ?>" class="btn btn-sm btn-light">CETAK</a>
            <div class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#add_produk">ADD</div>
            <a href="<?= site_url('manager/produk/delete_all') ?>" onclick="return confirm('Apa Anda Yakin Untuk Menghapus Semua Data?')" class="btn btn-sm btn-light">DELETE</a>
        </div>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">KATEGORI</th>                                            
                    <th scope="col">HARGA</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach($get_produk as $p) :
                    $i++;
                    ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $p->nama_produk ?></td>
                    <td><img src="<?= base_url('assets/image/produk/'.$p->foto_produk) ?>" width="50px" alt=""></td>
                    <td><?= $p->nama_kategori ?></td>
                    <td><?= $p->harga_produk ?></td>
                    <td><?= $p->stock ?></td>
                    <td class="text-center" style="width: 150px">
                        <div class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit_produk<?= $p->id_produk ?>">EDIT</div>
                        <a href="<?= site_url('manager/produk/delete/'.$p->id_produk) ?>" onclick="return confirm('Apa Anda Yakin Untuk Menghapus Data Ini?')" class="btn btn-sm btn-danger mb-1">HAPUS</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add_produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('manager/produk/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Nama Produk</span>
                        <input type="text" name="nama_produk" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Kategori</span>
                        <select name="id_kategori" class="form-select" aria-label="Default select example" required>
                            <option disable hidden>Pilih Kategori...</option>
                            <?php foreach($get_kategori as $k): ?>
                                <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Harga</span>
                        <input type="text" name="harga_produk" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Foto</span>
                        <input type="file" name="foto_produk" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach($get_produk as $p): ?>
<div class="modal fade" id="edit_produk<?= $p->id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('manager/produk/update') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $p->id_produk ?>" name="id_produk">
                <input type="hidden" value="<?= $p->stock ?>" name="stock">
                <input type="hidden" value="<?= $p->foto_produk ?>" name="foto_produk">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light" id="basic-addon3">Nama Produk</span>
                        <input type="text" name="nama_produk" value="<?= $p->nama_produk ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Kategori</span>
                        <select name="id_kategori" class="form-select" aria-label="Default select example" required>
                            <option hidden value="<?= $p->id_kategori ?>"><?= $p->nama_kategori ?></option>
                            <?php foreach($get_kategori as $k): ?>
                                <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Harga</span>
                        <input type="text" name="harga_produk" value="<?= $p->harga_produk ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Foto</span>
                        <input type="file" name="foto_produk" value="<?= $p->foto_produk ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        <label for="">*kosongkan jika tidak ingin mengubah gambar</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- adasdadsa -->
<!-- asdasasasd -->
    <!-- asdsadsad -->