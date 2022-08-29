<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DATA LAPORAN TRANSAKSI</title>
    <!-- Bootstrap CSS -->

  </head>
  <style>
 
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    text-align: left;
}
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
 
</style>
  <body>
        <table class="styled-table" style="display:  <?= $dashboard ?>">
          <thead>
              <tr>
                  <th style="width: 25%; text-align:center">PENDAPATAN</th>
                  <th style="width: 25%; text-align:center">PRODUK TERJUAL</th>
                  <th style="width: 25%; text-align:center">TOTAL TRANSAKSI</th>
                  <th style="width: 25%; text-align:center">PRODUK TERLARIS</th>
              </tr>
          </thead>
          <tbody>
            <tr>
                <td style="font-size: 20px; text-align:center">RP <?= number_format($get_pendapatan_transaksi) ?></td>
                <td style="font-size: 20px; text-align:center"><?= $get_produk_terjual_transaksi ?></td>
                <td style="font-size: 20px; text-align:center"><?= $get_total_transaksi_transaksi ?></td>
                <td style="font-size: 20px; text-align:center"><?= $get_produk_terlaris_transaksi ?></td>
            </tr>
          </tbody>
      </table>
    <table class="styled-table" >
          <thead>
              <tr>
                  <th>No</th>
                  <th>KODE TRANSAKSI</th>
                  <th>OPERATOR</th>
                  <th>NAMA_PELANGGAN</th>
                  <th>TANGGAL</th>
                  <th>JAM</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $i = 0;
              foreach($get_transaksi as $p):
                  $i++;
                  ?>
              <tr>
                  <td><?= $i ?></td>
                  <td><?= $p->kode_transaksi ?></td>
                  <td><?= $p->nama ?></td>
                  <td><?= $p->nama_pelanggan ?></td>
                  <td><?= $p->tgl_transaksi ?></td>
                  <td><?= $p->jam_transaksi ?></td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <script>
        window.print();
      </script>
  </body>  
</html>
