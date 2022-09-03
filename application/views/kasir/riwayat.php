<div class="card">
  <div class="card-header bg-primary text-light fw-bold text-center">
    RIWAYAT
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
        <?php $i = 0;foreach($get_riwayat as $r): $i++; ?>
          <?= ($r->operator == $this->session->userdata('id'))?
            '
            <tr>
                <th>'.$i.'</th>
                <td>'.$r->kode_transaksi.'</td>
                <td>'.$r->nama_pelanggan.'</td>
                <td>'.$r->tgl_transaksi.'</td>
                <td>'.$r->jam_transaksi.'</td>
                <td style="width:170px">
                <div class="mx-1 mb-1 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detail'.$r->kode_transaksi.'">Detail</div>
                <a href="'.site_url('kasir/riwayat/cetak/'.$r->id_detail_pesanan).'" target="_black" type="button" class="btn btn-sm btn-success mb-1">CETAK</a>

            </tr>'
            :
            ''
            ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
</div>


<!-- Modal -->
<?php foreach($get_riwayat as $r): ?>
<div class="modal fade" id="detail<?= $r->kode_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Struk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card rounded-1 shadow-box mx-auto px-2" style="width: 400px; font-size: 14px">
          <h6 class="text-center mb-3">BUKTI PEMBAYARAN</h6>
          <pre class="m-0">TANGGAL        : <?= $r->tgl_transaksi ?>||<?= $r->jam_transaksi ?></pre>
          <pre class="m-0">KODE TRANSAKSI : <?= $r->kode_transaksi ?></pre>
          <pre class="m-0">NAMA PELANGGAN : <?= $r->nama_pelanggan ?></pre>
          <pre class="m-0">OPERATOR       : <?= $r->nama ?></pre>
          <table class="table table-striped" style="font-size:12px">
            <thead>
              <tr>
                <th class="py-1" scope="col">Nama Produk</th>
                <th class="py-1" scope="col">Harga</th>
                <th class="py-1" scope="col">QTY</th>
                <th class="py-1" scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_pesanan as $p): ?>
              <?php echo (($p->id_detail_pesanan == $r->id_detail_pesanan)?
              '
              <tr>
                <th class="py-1">'.$p->nama_produk.'</th>
                <th class="py-1">'.number_format($p->harga_produk).'</th>
                <th class="py-1">'.$p->qty.'</th>
                <th class="py-1">'.number_format($p->total_harga).'</th>
              </tr>
              ' : ''); ?>
              <?php endforeach; ?>
              <?= '
                <tr>
                    <th class="py-1" colspan="3">TOTAL + TAX</th>
                    <th class="py-1 text-end" colspan="2">'.number_format($r->total_harga).'</th>
                </tr>                        
                <tr>
                    <th class="py-1" colspan="3">BAYAR</th>
                    <th class="py-1 text-end" colspan="2">'.number_format($r->bayar).'</th>
                </tr>                        
                <tr>
                    <th class="py-1" colspan="3">KEMBALIAN</th>
                    <th class="py-1 text-end" colspan="2">'.number_format($r->kembalian).'</th>
                </tr>
                <tr>
                    <th class="py-1" colspan="0.5">Catatan :</th>
                      <th class="py-1 pe-0" colspan="4.5"><textarea disabled style="width:100%" rows="5">'.$r->catatan.'</textarea></th>
                </tr>
                ';
                  ?>
            </tbody>
          </table>
          <h6 class="text-center">TERIMAKASIH SUDAH BERBELANJA</h6>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
        <a href="<?= site_url('kasir/riwayat/cetak/'.$r->id_detail_pesanan) ?>" target="_black" type="button" class="btn btn-primary">CETAK</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>