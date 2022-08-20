<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3">
    LOG
</div>
<div class="card shadow-box fw-bold">
    <div class="card-header bg-primary text-light">
        <div class="float-end">
            <div class="btn btn-sm btn-light">ADD</div>
            <div class="btn btn-sm btn-light">DELETE</div>
        </div>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">KODE</th>
                    <th scope="col">USER</th>
                    <th scope="col">KEGIATAN</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">JAM</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($get_log as $l): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $l->kode_log ?></td>
                    <td><?= $l->id_user ?></td>
                    <td><?= $l->kegiatan ?></td>
                    <td><?= $l->tanggal ?></td>
                    <td><?= $l->waktu ?></td>
                    <td>
                        <div class="btn btn-sm btn-warning">CETAK</div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- adasdadsa -->