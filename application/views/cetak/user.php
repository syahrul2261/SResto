<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DATA USER</title>
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
    <table class="styled-table" >
          <thead>
              <tr>
                  <th>NO</th>
                  <th>USERNAME</th>
                  <th>EMAIL</th>
                  <th>NAMA</th>
                  <th>TANGGAL LAHIR</th>
                  <th>ALAMAT</th>
                  <th>PROFILE</th>
                  <th>AKSES</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $i = 0;
              foreach($get_user as $p):
                  $i++;
                  ?>
              <tr>
                  <td><?= $i ?></td>
                  <td><?= $p->username ?></td>
                  <td><?= $p->email ?></td>
                  <td><?= $p->nama ?></td>
                  <td><?= $p->tgl_lahir ?></td>
                  <td><?= $p->alamat ?></td>
                  <td><img src="<?= base_url('assets/image/profile/'.$p->profile) ?>" width="50px" alt=""></td>
                  <td><?= $p->akses ?></td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <script>
        window.print();
      </script>
  </body>  
</html>
