<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3 py-1">
    LAPORAN BULANAN
</div>

<div class="row mb-3" id="dashboard">
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card shadow-box my-1 mx-1" style="height:90%">
            <div class="card-header bg-primary text-light fw-bold">
                PENDAPATAN
            </div>
            <div class="card-body fw-bold ">
                <h3 class="font-monospace">RP <?= number_format($get_pendapatan_bulanan) ?></h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card shadow-box my-1 mx-1" style="height:90%">
            <div class="card-header bg-primary text-light fw-bold">
                PRODUK TERJUAL
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace"><?= $get_produk_terjual_bulanan ?></h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card shadow-box my-1 mx-1" style="height:90%">
            <div class="card-header bg-primary text-light fw-bold">
                TOTAL TRANSAKSI
            </div>
            <div class="card-body fw-bold">
                <h3 class="font-monospace"><?= $get_total_transaksi_bulanan ?></h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card shadow-box my-1 mx-1" style="height:90%">
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
        Dashboard : <input type="checkbox" class="btn btn-sm mt-1 btn-outline-light border border-5 border-dark" checked style="height:29px; width:29px" onchange="filter()" id="dash">
        FILTER :
        <select class="btn btn-sm mt-1 btn-light text-start asd" onchange="filter()" id="filter">
            <option value="true" hidden>PILIH</option>
            <option value="true" >SEMUA</option>
            <?php foreach($get_akun as $ak): ?>
                <?= ($ak->akses == 'kasir')?
            '<option value="'.$ak->nama.'">'.$ak->nama.'</option>' : ''
            ?>
            <?php endforeach; ?>
        </select>
        <div class="float-end">
            <a href="<?= site_url('manager/laporan/bulanan_cetak/true/true') ?>" id="pdf" class="btn btn-sm mt-1 btn-light" target="_blank">CETAK PDF</a>
            <a href="<?= site_url('manager/laporan/bulanan_export/true/true') ?>" id="excel" class="btn btn-sm mt-1 btn-light">CETAK XLSX</a>
            <a class="btn btn-sm mt-1 btn-light" href="<?= site_url('manager/laporan/bulanan_print/true/true') ?>" id="print" target="_blank">PRINT</a>
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
                            <div class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#detail<?=$k->kode_transaksi ?>">DETAIL</div>
                            <a href="<?= site_url('kasir/riwayat/cetak/'.$k->id_detail_pesanan) ?>" target="_black" type="button" class="btn btn-sm btn-success">CETAK</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- adasdadsa -->

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
                            <?= 
                            '
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
            print.href= "bulanan_print/true/true";
            excel.href= "bulanan_export/true/true";
            pdf.href= "bulanan_cetak/true/true";
        } else if(b.checked && filter != 'true'){
            print.href= "bulanan_print/true/"+filter;
            excel.href= "bulanan_export/true/"+filter;
            pdf.href= "bulanan_cetak/true/"+filter;
        } else if(b.checked == false && filter == 'true'){
            print.href= "bulanan_print/false/true";
            excel.href= "bulanan_export/true/true";
            pdf.href= "bulanan_cetak/false/true";
        } else if(b.checked == false && filter != 'true'){
            print.href= "bulanan_print/false/"+filter;
            excel.href= "bulanan_export/true/"+filter;
            pdf.href= "bulanan_cetak/false/"+filter;
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