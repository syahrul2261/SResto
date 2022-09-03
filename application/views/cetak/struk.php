<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STRUK PESANAN</title>
    <link rel="icon" href="<?= base_url('assets/image/icon.png') ?>">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    
    <!-- Flickity CSS -->
    <link src="<?= base_url('assets/flickity.min.css') ?>"></link>
    
    <!-- Material Desain Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/mdb5/css/mdb.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/mdb5/js/mdb.min.js') ?>">
    
    <!-- Multi Select -->
    <link rel="stylesheet" href="<?= base_url('assets/multiselect-20/css/chosen.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/multiselect-20/css/style.css') ?>">
    
    <!-- DataTables -->
    <link src="<?= base_url('assets/dataTables.min.css') ?>"></link>
    <link src="<?= base_url('assets/dataTables.bootstrap5.min.css') ?>"></link>
    
    <!-- Manual CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
  </head>
  <body>    
    
    <div class="card rounded-1 shadow-box mx-auto px-2" style="width: 400px; font-size: 14px">
      <h6 class="text-center mb-3">BUKTI PEMBAYARAN</h6>
      <pre class="m-0">TANGGAL        : <?= $get_riwayat->tgl_transaksi ?>||<?= $get_riwayat->jam_transaksi ?></pre>
      <pre class="m-0">KODE TRANSAKSI : <?= $get_riwayat->kode_transaksi ?></pre>
      <pre class="m-0">NAMA PELANGGAN : <?= $get_riwayat->nama_pelanggan ?></pre>
      <pre class="m-0">OPERATOR       : <?= $get_riwayat->nama ?></pre>
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
          <?php 
          foreach($get_pesanan as $p): 
          ?>
          <tr>
            <th class="py-1"><?= $p->nama_produk ?></th>
            <th class="py-1"><?= number_format($p->harga_produk) ?></th>
            <th class="py-1"><?= $p->qty ?></th>
            <th class="py-1"><?= number_format($p->total_harga) ?></th>
          </tr>
          <?php endforeach; ?>
          <tr>
            <th class="py-1" colspan="3">TOTAL + TAX</th>
            <th class="py-1 text-end" colspan="2"><?= number_format($get_riwayat->total_harga) ?></th>
          </tr>                        
          <tr>
            <th class="py-1" colspan="3">BAYAR</th>
            <th class="py-1 text-end" colspan="2"><?= number_format($get_riwayat->bayar) ?></th>
          </tr>                        
          <tr>
            <th class="py-1" colspan="3">KEMBALIAN</th>
            <th class="py-1 text-end" colspan="2"><?= number_format($get_riwayat->kembalian) ?></th>
          </tr>
          <tr>
            <th class="py-1" colspan="0.5">Catatan :</th>
            <th class="py-1 pe-0" colspan="4.5"><textarea disabled style="width:100%" rows="5"><?= $get_riwayat->catatan ?></textarea></th>
          </tr>
          
        </tbody>
      </table>
      <h6 class="text-center">TERIMAKASIH SUDAH BERBELANJA</h6>
    </div>
  </body>
  <script>
    window.print();
  </script>