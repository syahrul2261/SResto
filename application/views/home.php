<div class="row position-relative">
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card rounded-1 shadow-box mx-2 my-2" style="height:90%"> 
            <div class="card-header bg-primary text-center fw-bold text-light">
                Pengahasilan Hari ini
            </div>
            <div class="card-body fw-bold">
                <h3  class="font-monospace">
                    <?= ($penghasilan_hari) ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card rounded-1 shadow-box mx-2 my-2" style="height:90%"> 
            <div class="card-header bg-primary text-center fw-bold text-light">
                Penghasilan Bulan Ini
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace">
                    <?= $penghasilan_bulan ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card rounded-1 shadow-box mx-2 my-2" style="height:90%"> 
            <div class="card-header bg-primary text-center fw-bold text-light">
                Produk Terlaris Hari ini
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace">
                    <?= $produk_terlaris_hari ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card rounded-1 shadow-box mx-2 my-2" style="height:90%"> 
            <div class="card-header bg-primary text-center fw-bold text-light">
                Produk Terlaris Bulan ini
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace">
                    <?= $produk_terlaris_bulan ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card rounded-1 shadow-box mx-2 my-2" style="height:90%">
            <div class="card-header bg-primary text-center fw-bold text-light">
                Produk Terlaris Bulan Ini
            </div>
            <div class="card-body">
                <?= ($laporan_produk_terlaris_bulan->num_rows() == null)? '<h3 class="text-center my-auto fw-bold font-monospace">Belum Terjadi Transaksi</h3><div id="myChart2"></div>' 
                :
                '
                <canvas style="width:100%" id="myChart2"></canvas>
                '
                ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card rounded-1 shadow-box mx-2 my-2" style="height:90%">
            <div class="card-header bg-primary text-center fw-bold text-light">
                Produk Terlaris Bulan Lalu
            </div>
            <div class="card-body">
                <?= ($laporan_produk_terlaris_bulan_lalu->num_rows() == null)? '<h3 class="text-center my-auto fw-bold font-monospace">Belum Terjadi Transaksi</h3> <div id="myChart3"></div>'
                :
                '
                <canvas style="width:100%" id="myChart3"></canvas>
                '
                ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card rounded-1 shadow-box mx-2 my-2" style="height:90%">
            <div class="card-header bg-primary text-center fw-bold text-light">
                Produk Tidak Laris Bulan Ini
            </div>
            <div class="card-body">
                <?= ($laporan_produk_tidak_laris_bulan->num_rows() == null)? '<h3 class="text-center my-auto fw-bold font-monospace">Belum Terjadi Transaksi</h3><div id="myChart4"></div>'
                :
                '
                <canvas style="width:100%" id="myChart4"></canvas>
                '
                ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card rounded-1 shadow-box mx-2 my-2" style="height:90%">
            <div class="card-header bg-primary text-center fw-bold text-light">
                Produk Tidak Laris Bulan Lalu
            </div>
            <div class="card-body">
                    <?= ($laporan_produk_tidak_laris_bulan_lalu->num_rows() == null)? '<h3 class="text-center my-auto fw-bold font-monospace">Belum Terjadi Transaksi<div id="myChart5"></div></h3>'
                    :
                    '
                    <canvas style="width:100%" id="myChart5"></canvas>
                    '
                    ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card rounded-1 shadow-box mx-2 my-2">
            <div class="card-header bg-primary text-center fw-bold text-light">
                Pendapatan Tahunan
            </div>
            <div class="card-body">
                <canvas style="width:100%" id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card rounded-1 shadow-box mx-2 my-2">
            <div class="card-header bg-primary text-center fw-bold text-light">
                Pendapatan Bulanan
            </div>
            <div class="card-body">
                <canvas style="width:100%" id="myChart1"></canvas>
            </div>
        </div>
    </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = [
        'January',
        'February',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];
    
    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Pendapatan Tahun Ini',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?= $laporan_tahunan->a.',' ?>
                    <?= $laporan_tahunan->b.',' ?>
                    <?= $laporan_tahunan->c.',' ?>
                    <?= $laporan_tahunan->d.',' ?>
                    <?= $laporan_tahunan->e.',' ?>
                    <?= $laporan_tahunan->f.',' ?>
                    <?= $laporan_tahunan->g.',' ?>
                    <?= $laporan_tahunan->h.',' ?>
                    <?= $laporan_tahunan->i.',' ?>
                    <?= $laporan_tahunan->j.',' ?>
                    <?= $laporan_tahunan->k.',' ?>
                    <?= $laporan_tahunan->l ?>
                ],
            },
            {
                label: 'Pendapatan Tahun Lalu',
                backgroundColor: '	rgb(14, 0, 214)',
                borderColor: '	rgb(14, 0, 214)',
                data: [
                    <?= $laporan_tahunan_lalu->a.',' ?>
                    <?= $laporan_tahunan_lalu->b.',' ?>
                    <?= $laporan_tahunan_lalu->c.',' ?>
                    <?= $laporan_tahunan_lalu->d.',' ?>
                    <?= $laporan_tahunan_lalu->e.',' ?>
                    <?= $laporan_tahunan_lalu->f.',' ?>
                    <?= $laporan_tahunan_lalu->g.',' ?>
                    <?= $laporan_tahunan_lalu->h.',' ?>
                    <?= $laporan_tahunan_lalu->i.',' ?>
                    <?= $laporan_tahunan_lalu->j.',' ?>
                    <?= $laporan_tahunan_lalu->k.',' ?>   
                    <?= $laporan_tahunan_lalu->l ?>
                ],
            }
        ]
    };
    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: false,
        }
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
        
    






    

    const labels1 = [
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        '11',
        '12',
        '13',
        '14',
        '15',
        '16',
        '17',
        '18',
        '19',
        '20',
        '21',
        '22',
        '23',
        '24',
        '25',
        '26',
        '27',
        '28',
        '29',
        '30',
        '31',
    ];
    
    const data1 = {
        labels: labels1,
        datasets: [
            {
                label: 'Pendapatan Bulan Ini',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?= $laporan_bulanan->h1.',' ?>
                    <?= $laporan_bulanan->h2.',' ?>
                    <?= $laporan_bulanan->h3.',' ?>
                    <?= $laporan_bulanan->h4.',' ?>
                    <?= $laporan_bulanan->h5.',' ?>
                    <?= $laporan_bulanan->h6.',' ?>
                    <?= $laporan_bulanan->h7.',' ?>
                    <?= $laporan_bulanan->h8.',' ?>
                    <?= $laporan_bulanan->h9.',' ?>
                    <?= $laporan_bulanan->h10.',' ?>
                    <?= $laporan_bulanan->h11.',' ?>
                    <?= $laporan_bulanan->h12.',' ?>
                    <?= $laporan_bulanan->h13.',' ?>
                    <?= $laporan_bulanan->h14.',' ?>
                    <?= $laporan_bulanan->h15.',' ?>
                    <?= $laporan_bulanan->h16.',' ?>
                    <?= $laporan_bulanan->h17.',' ?>
                    <?= $laporan_bulanan->h18.',' ?>
                    <?= $laporan_bulanan->h19.',' ?>
                    <?= $laporan_bulanan->h20.',' ?>
                    <?= $laporan_bulanan->h21.',' ?>
                    <?= $laporan_bulanan->h22.',' ?>
                    <?= $laporan_bulanan->h23.',' ?>
                    <?= $laporan_bulanan->h24.',' ?>
                    <?= $laporan_bulanan->h25.',' ?>
                    <?= $laporan_bulanan->h26.',' ?>
                    <?= $laporan_bulanan->h27.',' ?>
                    <?= $laporan_bulanan->h28.',' ?>
                    <?= $laporan_bulanan->h29.',' ?>
                    <?= $laporan_bulanan->h30.',' ?>
                    <?= $laporan_bulanan->h31 ?>
                    
                ],
            },
            {
                label: 'Pendapatan Bulan Lalu',
                backgroundColor: '	rgb(14, 0, 214)',
                borderColor: '	rgb(14, 0, 214)',
                data: [
                    <?= $laporan_bulanan_lalu->h1.',' ?>
                    <?= $laporan_bulanan_lalu->h2.',' ?>
                    <?= $laporan_bulanan_lalu->h3.',' ?>
                    <?= $laporan_bulanan_lalu->h4.',' ?>
                    <?= $laporan_bulanan_lalu->h5.',' ?>
                    <?= $laporan_bulanan_lalu->h6.',' ?>
                    <?= $laporan_bulanan_lalu->h7.',' ?>
                    <?= $laporan_bulanan_lalu->h8.',' ?>
                    <?= $laporan_bulanan_lalu->h9.',' ?>
                    <?= $laporan_bulanan_lalu->h10.',' ?>
                    <?= $laporan_bulanan_lalu->h11.',' ?>
                    <?= $laporan_bulanan_lalu->h12.',' ?>
                    <?= $laporan_bulanan_lalu->h13.',' ?>
                    <?= $laporan_bulanan_lalu->h14.',' ?>
                    <?= $laporan_bulanan_lalu->h15.',' ?>
                    <?= $laporan_bulanan_lalu->h16.',' ?>
                    <?= $laporan_bulanan_lalu->h17.',' ?>
                    <?= $laporan_bulanan_lalu->h18.',' ?>
                    <?= $laporan_bulanan_lalu->h19.',' ?>
                    <?= $laporan_bulanan_lalu->h20.',' ?>
                    <?= $laporan_bulanan_lalu->h21.',' ?>
                    <?= $laporan_bulanan_lalu->h22.',' ?>
                    <?= $laporan_bulanan_lalu->h23.',' ?>
                    <?= $laporan_bulanan_lalu->h24.',' ?>
                    <?= $laporan_bulanan_lalu->h25.',' ?>
                    <?= $laporan_bulanan_lalu->h26.',' ?>
                    <?= $laporan_bulanan_lalu->h27.',' ?>
                    <?= $laporan_bulanan_lalu->h28.',' ?>
                    <?= $laporan_bulanan_lalu->h29.',' ?>
                    <?= $laporan_bulanan_lalu->h30.',' ?>
                    <?= $laporan_bulanan_lalu->h31 ?>
                ],
            }
        ]
    };
    
    const config1 = {
        type: 'line',
        data: data1,
        options: {
            responsive: false,
        }
    };
    
    const myChart1 = new Chart(
        document.getElementById('myChart1'),
        config1
    );
        





        
    
    

    const label2 = [
        <?php foreach($laporan_produk_terlaris_bulan->result() as $a): ?>
        '<?= $a->nama_produk ?>',
        <?php endforeach; ?>
    ];
    const data2 = {
        labels: label2,
        datasets: [
            {
                label: 'Pendapatan Tahun Ini',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?php $i=1; foreach($laporan_produk_terlaris_bulan->result() as $a): ?>
                    <?= $a->a ?><?= ($i++ == $laporan_produk_terlaris_bulan->num_rows() )?"":"," ?>
                    <?php endforeach; ?>
                ],
            }
        ]
    };
    const config2 = {
        type: 'bar',
        data: data2,
        options: {
            responsive: false,
        }
    };
    
    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
        
    
    const label3 = [
        <?php foreach($laporan_produk_terlaris_bulan_lalu->result() as $a): ?>
        '<?= $a->nama_produk ?>',
        <?php endforeach; ?>
    ];
    
    const data3 = {
        labels: label3,
        datasets: [
            {
                label: 'Pendapatan Tahun Ini',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?php $i=1; foreach($laporan_produk_terlaris_bulan_lalu->result() as $a): ?>
                    <?= $a->a ?><?= ($i++ == $laporan_produk_terlaris_bulan_lalu->num_rows() )?"":"," ?>
                    <?php endforeach; ?>                
                ],
            }
        ]
    };
    
    const config3 = {
        type: 'bar',
        data: data3,
        options: {
            responsive: false,
        }
    };
    
    const myChart3 = new Chart(
        document.getElementById('myChart3'),
        config3
    );
    
    
    






    const label4 = [
        <?php foreach($laporan_produk_tidak_laris_bulan->result() as $a): ?>
        '<?= $a->nama_produk ?>',
        <?php endforeach; ?>
    ];
    
    const data4 = {
        labels: label4,
        datasets: [
            {
                label: 'Pendapatan Tahun Ini',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?php $i=1; foreach($laporan_produk_tidak_laris_bulan->result() as $a): ?>
                    <?= $a->a ?><?= ($i++ == $laporan_produk_tidak_laris_bulan->num_rows() )?"":"," ?>
                    <?php endforeach; ?>
                    
                ],
            }
        ]
    };
    
    const config4 = {
        type: 'bar',
        data: data4,
        options: {
            responsive: false,
        }
    };
    
    const myChart4 = new Chart(
        document.getElementById('myChart4'),
        config4
    );
    
    
    







    const label5 = [
        <?php foreach($laporan_produk_tidak_laris_bulan_lalu->result() as $a): ?>
        '<?= $a->nama_produk ?>',
        <?php endforeach; ?>
    ];
    
    const data5 = {
        labels: label5,
        datasets: [
            {
                label: 'Pendapatan Tahun Ini',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?php $i=1; foreach($laporan_produk_tidak_laris_bulan_lalu->result() as $a): ?>
                    <?= $a->a ?><?= ($i++ == $laporan_produk_tidak_laris_bulan_lalu->num_rows() )?"":"," ?>
                    <?php endforeach; ?>
                ],
            }
        ]
    };
    
    const config5 = {
        type: 'bar',
        data: data5,
        options: {
            responsive: false,
        }
    };
    
    const myChart5 = new Chart(
        document.getElementById('myChart5'),
        config5
    );
</script>