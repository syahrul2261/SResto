<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3 py-1">
    LAPORAN BULANAN
</div>

<div class="row mb-3">
    <div class="col">
        <div class="card shadow-box">
            <div class="card-header bg-primary text-light fw-bold">
                PENDAPATAN
            </div>
            <div class="card-body fw-bold ">
                <h3 class="font-monospace">RP <?= number_format($get_pendapatan_bulanan) ?></h3>
                
            </div>
        </div>
    </div>
    <div class="col">
            <div class="card shadow-box">
                <div class="card-header bg-primary text-light fw-bold">
                    PRODUK TERJUAL
                </div>
                <div class="card-body fw-bold">
                    <h3 class="font-monospace"><?= $get_produk_terjual_bulanan ?></h3>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-box">
            <div class="card-header bg-primary text-light fw-bold">
                TOTAL TRANSAKSI
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace"><?= $get_total_transaksi_bulanan ?></h3>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-box">
            <div class="card-header bg-primary text-light fw-bold">
                PRODUK TERLARIS
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace"><?= $get_produk_terlaris_bulanan ?></h3>
            </div>
        </div>
    </div>
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
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($get_all as $k): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $k->kode_transaksi ?></td>
                    <td><?= $k->nama_pelanggan ?></td>
                    <td><?= $k->tgl_transaksi ?></td>
                    <td><?= $k->jam_transaksi ?></td>
                    <td>
                        <div class="btn btn-sm btn-warning">DETAIL</div>
                        <div class="btn btn-sm btn-danger">CETAK</div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- adasdadsa -->