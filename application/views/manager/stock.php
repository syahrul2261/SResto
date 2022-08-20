<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3">
    STOCK
</div>
<div class="card shadow-box fw-bold">
    <div class="card-header bg-primary text-light">
        STOCK PRODUK
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">FOTO</th>
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
                    <td><?= $p->stock ?></td>
                    <td class="text-center" width="150px">
                        <div class="row">
                            <div class="col">
                                <div class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit_stock<?= $p->id_produk ?>">EDIT</div>
                            </div>
                            <div class="col">
                                <div>
                                    <form action="<?= site_url('manager/stock/reset') ?>" method="post">
                                        <input type="hidden" name="id_produk" value="<?= $p->id_produk ?>">
                                        <input type="hidden" name="nama_produk" value="<?= $p->nama_produk ?>">
                                        <input type="hidden" name="harga_produk" value="<?= $p->harga_produk ?>">
                                        <input type="hidden" name="id_kategori" value="<?= $p->id_kategori ?>">
                                        <input type="hidden" name="foto_produk" value="<?= $p->foto_produk ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin Untuk Mereset Stock Data Ini?')" type="submit" class="btn btn-sm btn-danger mb-1">RESET</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php foreach($get_produk as $p): ?>
<!-- Modal -->
<div class="modal fade" id="edit_stock<?= $p->id_produk ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('manager/stock/update') ?>" method="post">
                    <input type="hidden" name="id_produk" value="<?= $p->id_produk ?>">
                    <input type="hidden" name="nama_produk" value="<?= $p->nama_produk ?>">
                    <input type="hidden" name="harga_produk" value="<?= $p->harga_produk ?>">
                    <input type="hidden" name="id_kategori" value="<?= $p->id_kategori ?>">
                    <input type="hidden" name="foto_produk" value="<?= $p->foto_produk ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Harga</span>
                        <input type="text" name="stock" value="<?= $p->stock ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- adasdadsa -->