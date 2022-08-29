<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DATA LAPORAN bulanan</title>
    <!-- Bootstrap CSS -->

  </head>

  <style>

    body{
        font-family: monospace;
    }
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;

}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  margin: 0 5px;
  font-size: 30px;
  text-align: center;
}
.grid-item-1 {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  margin-left : 5px;
  font-size: 30px;
  text-align: center;
}

.grid-item-2 {
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.8);
    margin-right : 5px;
  font-size: 30px;
  text-align: center;
}

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
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
                <td style="font-size: 20px; text-align:center">RP <?= number_format($get_pendapatan_bulanan) ?></td>
                <td style="font-size: 20px; text-align:center"><?= $get_produk_terjual_bulanan ?></td>
                <td style="font-size: 20px; text-align:center"><?= $get_total_transaksi_bulanan ?></td>
                <td style="font-size: 20px; text-align:center"><?= $get_produk_terlaris_bulanan ?></td>
            </tr>
          </tbody>
      </table>
    <table class="styled-table" >
          <thead>
              <tr>
                  <th>No</th>
                  <th>KODE TRANSAKSI</th>
                  <th>OPERATOR</th>
                  <th>NAMA PELANGGAM</th>
                  <th>TANGGAL</th>
                  <th>JAM</th>
              </tr>
          </thead>
          <tbody>
                <?php $i=1; foreach($get_bulanan as $a): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $a->kode_transaksi ?></td>
                    <td><?= $a->nama ?></td>
                    <td><?= $a->nama_pelanggan ?></td>
                    <td><?= $a->tgl_transaksi ?></td>
                    <td><?= $a->jam_transaksi ?></td>
                </tr>
                    <?php endforeach; ?>
          </tbody>
      </table>
      <script>
        window.print();
      </script>
  </body>  
</html>
