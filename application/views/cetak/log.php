<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DATA LOG</title>
        <link rel="icon" href="<?= base_url('assets/image/icon.png') ?>">
        
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
                    <th>No</th>
                    <th>KODE</th>
                    <th>USER</th>
                    <th>KEGIATAN</th>
                    <th>TANGGAL</th>
                    <th>WAKTU</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach($get_log as $p):
                $i++;
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $p->kode_log ?></td>
                    <td><?= $p->nama ?></td>
                    <td><?= $p->kegiatan ?></td>
                    <td><?= $p->tanggal ?></td>
                    <td><?= $p->waktu ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            window.print();
        </script>
    </body>  
</html>
