<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3 py-1">
    LAPORAN HARIAN
</div>

<div class="row mb-3" id="dashboard">
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card shadow-box my-1 mx-1" style="height:100%">
            <div class="card-header bg-primary text-light fw-bold">
                PENDAPATAN
            </div>
            <div class="card-body fw-bold ">
                <h3 class="font-monospace">RP <?= number_format($get_pendapatan_harian) ?></h3>
                
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
            <div class="card shadow-box my-1 mx-1" style="height:100%">
                <div class="card-header bg-primary text-light fw-bold">
                    PRODUK TERJUAL
                </div>
                <div class="card-body fw-bold">
                    <h3 class="font-monospace"><?= $get_produk_terjual_harian ?></h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card shadow-box my-1 mx-1" style="height:100%">
            <div class="card-header bg-primary text-light fw-bold">
                TOTAL TRANSAKSI
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace"><?= $get_total_transaksi_harian ?></h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card shadow-box my-1 mx-1" style="height:100%">
            <div class="card-header bg-primary text-light fw-bold">
                PRODUK TERLARIS
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace"><?= $get_produk_terlaris_harian ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-box fw-bold">
    <div class="card-header bg-primary text-light">
        Dashboard : <input type="checkbox" class="btn btn-sm mt-1 btn-outline-light border border-5 border-dark" checked style="height:29px; width:29px" onchange="filter()" id="dash">
              FILTER :
        <select class="btn btn-sm mt-1 btn-light text-start asd" onchange="filter()" id="filter">
            <option value="true" hidden>PILIH</option>
            <option value="true" >SEMUA</option>
            <?php foreach($get_akun as $ak): ?>
            <option value="<?= $ak->nama ?>"><?= $ak->nama ?></option>
            <?php endforeach; ?>
        </select>
        <div class="float-end">
            <a href="<?= site_url('manager/laporan/harian_cetak/true/true') ?>" id="pdf" class="btn btn-sm mt-1 btn-light" target="_blank">CETAK PDF</a>
            <a href="<?= site_url('manager/laporan/harian_export/true/true') ?>" id="excel" class="btn btn-sm mt-1 btn-light">CETAK XLSX</a>
            <a class="btn btn-sm mt-1 btn-light" href="<?= site_url('manager/laporan/harian_print/true/true') ?>" id="print" target="_blank">PRINT</a>
        </div>
    </div>
    <div class="card-body">
                            <div class="card overflow-auto">
                                <table id="example" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Transaksi</th>
                                            <th scope="col">OPERATOR</th>
                                            <th scope="col">Nama Pelanggan</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($get_all as $k): ?>
                                        <tr id="tbody">
                                            <td><?= $i++ ?></td>
                                            <td><?= $k->kode_transaksi ?></td>
                                            <td id="operator"><?= $k->nama ?></td>
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
</div>
<!-- adasdadsa -->

<script>

    function filter(){
        a();
        b();
    }
    
    function a(){
        const filter = document.getElementById('filter').value;
        const operator = document.querySelectorAll('#operator');
        const tbody = document.querySelectorAll('#tbody');
        const pdf = document.getElementById('pdf');
        const print = document.getElementById('print');
        const a = document.getElementById('dashboard');
        const b = document.getElementById('dash');
        for(i=0; i<tbody.length; i++){
            if(filter == 'true'){
                tbody[i].classList.remove('d-none');
                tbody[i].classList.add('a1');
                console.log('1');
            } else{
                if(filter == operator[i].innerText){
                    tbody[i].classList.remove('d-none');
                    tbody[i].classList.add('a1');
                    console.log('2');
                } else {
                    tbody[i].classList.add('d-none');
                    tbody[i].classList.remove('a1');
                    console.log('3');
                }
            }
        }

        if(b.checked){
            a.classList.remove('d-none');
        } else{
            a.classList.add('d-none');
        }

        if(b.checked && filter == 'true'){
            print.href= "harian_print/true/true";
            excel.href= "harian_export/true/true";
            pdf.href= "harian_cetak/true/true";
        } else if(b.checked && filter != 'true'){
            print.href= "harian_print/true/"+filter;
            excel.href= "harian_export/true/"+filter;
            pdf.href= "harian_cetak/true/"+filter;
        } else if(b.checked == false && filter == 'true'){
            print.href= "harian_print/false/true";
            excel.href= "harian_export/true/true";
            pdf.href= "harian_cetak/false/true";
        } else if(b.checked == false && filter != 'true'){
            print.href= "harian_print/false/"+filter;
            excel.href= "harian_export/true/"+filter;
            pdf.href= "harian_cetak/false/"+filter;
        }
    }

    function b(){
    const pdf = document.getElementById('pdf');
    const excel = document.getElementById('excel');
    const print = document.getElementById('print');
        const a1 = document.querySelectorAll('.a1');
        if(a1.length == 0){
        print.classList.add('disabled');
        excel.classList.add('disabled');
        pdf.classList.add('disabled');
    } else if(a1.length >= 1){
            print.classList.remove('disabled');
            excel.classList.remove('disabled');
            pdf.classList.remove('disabled');
        }
    }
</script>