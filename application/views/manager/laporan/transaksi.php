<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3">
  LAPORAN TRANSAKSI
</div>

<div class="row mb-3" id="dashboard">
  <div class="col-12 col-md-6 col-xl-3">
    <div class="card shadow-box my-1 mx-1" style="height:90%">
      <div class="card-header bg-primary text-light fw-bold">
        PENDAPATAN
      </div>
      <div class="card-body fw-bold ">
        <h3 class="font-monospace">RP <?= number_format($get_pendapatan_transaksi) ?></h3>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-xl-3">
    <div class="card shadow-box my-1 mx-1" style="height:90%">
      <div class="card-header bg-primary text-light fw-bold">
        PRODUK TERJUAL
      </div>
      <div class="card-body fw-bold">
        <h3 class="font-monospace"><?= $get_produk_terjual_transaksi ?></h3>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-xl-3">
    <div class="card shadow-box my-1 mx-1" style="height:90%">
      <div class="card-header bg-primary text-light fw-bold">
        TOTAL TRANSAKSI
      </div>
      <div class="card-body fw-bold">
        <h3 class="font-monospace"><?= $get_total_transaksi_transaksi ?></h3>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-xl-3">
    <div class="card shadow-box my-1 mx-1" style="height:90%">
      <div class="card-header bg-primary text-light fw-bold">
        PRODUK TERLARIS
      </div>
      <div class="card-body fw-bold">
        <h3 class="font-monospace"><?= $get_produk_terlaris_transaksi ?></h3>
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
    min :
    <input class="btn btn-sm mt-1 btn-light" type="date" name="" id="mindate" value="" max="" min="" onchange="filter()" >
    max :
    <input class="btn btn-sm mt-1 btn-light" type="date" name="" id="maxdate" value="" max="" min="" onchange="filter()">
    <div class="float-end">
      <a href="<?= site_url('manager/laporan/cetak/true/true/true/true') ?>" id="pdf" class="btn btn-sm mt-1 btn-light" target="_blank">CETAK PDF</a>
      <a href="<?= site_url('manager/laporan/export/true/true/true/true') ?>" id="excel" class="btn btn-sm mt-1 btn-light">CETAK XLSX</a>
      <a class="btn btn-sm mt-1 btn-light" href="<?= site_url('manager/laporan/print/true/true/true/true') ?>" id="print" target="_blank">PRINT</a>
    </div>
  </div>
  <div class="card-body">
    <div class="card overflow-auto">
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
          <tr id="tbody">
            <td><?= $i++ ?></td>
            <td><?= $k->kode_transaksi ?></td>
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
              <?php 
                foreach($get_pesanan as $p): 
                ?>


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
  
  
  
  <!-- adasdadsa -->
  <?php $i=1; foreach ($get_all as $s): ?>
    <p class="d-none" id="nama"><?= $s->operator ?></p>
    <p class="d-none" id="tanggal"><?= $s->tgl_transaksi ?></p>
    <?php endforeach; ?>
    
    
<script>
      
  window.onload = function(){
    
    const mindate = document.getElementById('mindate');
    const maxdate = document.getElementById('maxdate');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    
    today = yyyy + '-' + mm + '-' + dd;
    mindate.max = today;
    maxdate.max = today;
    maxdate.value = today;
  }
  function filter(){
    a();
    b();
    c();
  }
  
  function a(){
    const filter = document.getElementById('filter').value;
    const nama = document.querySelectorAll('#nama');
    const tanggal = document.querySelectorAll('#tanggal');
    const tbody = document.querySelectorAll('#tbody');
    const excel = document.getElementById('excel');
    const pdf = document.getElementById('pdf');
    const print = document.getElementById('print');
    const mindate = document.getElementById('mindate');
    const maxdate = document.getElementById('maxdate');
    const a = document.getElementById('dashboard');
    const b = document.getElementById('dash');
    for(i = 0 ; i < nama.length; i++){
      if(filter == "true"){
        if(mindate.value == '' && maxdate.value == ''){
          tbody[i].classList.remove('d-none');
          tbody[i].classList.add('a1');        
        }else if(tanggal[i].innerText >= mindate.value && maxdate.value == ''){
          tbody[i].classList.remove('d-none');
          tbody[i].classList.add('a1');        
        }else if(tanggal[i].innerText == '' && tanggal[i].innerText <= maxdate.value){
          tbody[i].classList.remove('d-none');
          tbody[i].classList.add('a1');        
        }else if(tanggal[i].innerText >= mindate.value && tanggal[i].innerText <= maxdate.value){
          tbody[i].classList.remove('d-none');
          tbody[i].classList.add('a1');        
        }else {
          tbody[i].classList.add('d-none');
          tbody[i].classList.remove('a1');
        }
      } else if(filter == nama[i].innerText){
        if(mindate.value == '' && maxdate.value == ''){
          tbody[i].classList.remove('d-none');
          tbody[i].classList.add('a1');        
        }else if(tanggal[i].innerText >= mindate.value && maxdate.value == ''){
          tbody[i].classList.remove('d-none');
          tbody[i].classList.add('a1');        
        }else if(mindate.value == '' && tanggal[i].innerText <= maxdate.value){
          tbody[i].classList.remove('d-none');
          tbody[i].classList.add('a1');        
        }else if(tanggal[i].innerText >= mindate.value && tanggal[i].innerText <= maxdate.value){
          tbody[i].classList.remove('d-none');
          tbody[i].classList.add('a1');        
        }else {
          tbody[i].classList.add('d-none');
          tbody[i].classList.remove('a1');
        }
      } else {
        tbody[i].classList.add('d-none');
        tbody[i].classList.remove('a1');
      }
    }
    
    if(b.checked){
      a.classList.remove('d-none');
    } else{
      a.classList.add('d-none');
    }
    
    if(filter == 'true' && b.checked == true){
      if(mindate.value == '' && maxdate.value == ''){
        pdf.href= "cetak/" + 'true' + '/' + 'true' + '/' + 'true' + '/' + 'true';
        excel.href= "export/" + 'true' + '/' + 'true' + '/' + 'true' + '/' + 'true';
        print.href= "print/" + 'true' + '/' + 'true' + '/' + 'true' + '/' + 'true';
      } else if(mindate.value == ''){
        pdf.href= "cetak/" + 'true' + '/' + 'true' + '/' + 'true' + '/' + maxdate.value;
        excel.href= "export/" + 'true' + '/' + 'true' + '/' + 'true' + '/' + maxdate.value;
        print.href= "print/" + 'true' + '/' + 'true' + '/' + 'true' + '/' + maxdate.value;
      } else if(maxdate.value == ''){
        pdf.href= "cetak/" + 'true' + '/' + 'true' + '/' + mindate.value + '/' + 'true';
        excel.href= "export/" + 'true' + '/' + 'true' + '/' + mindate.value + '/' + 'true';
        print.href= "print/" + 'true' + '/' + 'true' + '/' + mindate.value + '/' + 'true';
      } else {
        pdf.href= "cetak/" + 'true' + '/' + 'true' + '/' + mindate.value + '/' + maxdate.value;
        excel.href= "export/" + 'true' + '/' + 'true' + '/' + mindate.value + '/' + maxdate.value;
        print.href= "print/" + 'true' + '/' + 'true' + '/' + mindate.value + '/' + maxdate.value;
      }
    } else if(filter == 'true' && b.checked == false){
      if(mindate.value == '' && maxdate.value == ''){
        pdf.href= "cetak/" + 'false' + '/' + 'true' + '/' + 'true' + '/' + 'true';
        excel.href= "export/" + 'false' + '/' + 'true' + '/' + 'true' + '/' + 'true';
        print.href= "print/" + 'false' + '/' + 'true' + '/' + 'true' + '/' + 'true';
      } else if(mindate.value == ''){
        pdf.href= "cetak/" + 'false' + '/' + 'true' + '/' + 'true' + '/' + maxdate.value;
        excel.href= "export/" + 'false' + '/' + 'true' + '/' + 'true' + '/' + maxdate.value;
        print.href= "print/" + 'false' + '/' + 'true' + '/' + 'true' + '/' + maxdate.value;
      } else if(maxdate.value == ''){
        pdf.href= "cetak/" + 'false' + '/' + 'true' + '/' + mindate.value + '/' + 'true';
        excel.href= "export/" + 'false' + '/' + 'true' + '/' + mindate.value + '/' + 'true';
        print.href= "print/" + 'false' + '/' + 'true' + '/' + mindate.value + '/' + 'true';
      } else {
        pdf.href= "cetak/" + 'false' + '/' + 'true' + '/' + mindate.value + '/' + maxdate.value;
        excel.href= "export/" + 'false' + '/' + 'true' + '/' + mindate.value + '/' + maxdate.value;
        print.href= "print/" + 'false' + '/' + 'true' + '/' + mindate.value + '/' + maxdate.value;
      }
    } else if(filter != 'true' && b.checked == true){
      if(mindate.value == '' && maxdate.value == ''){
        pdf.href= "cetak/" + 'true' + '/' + filter + '/' + 'true' + '/' + 'true';
        excel.href= "export/" + 'true' + '/' + filter + '/' + 'true' + '/' + 'true';
        print.href= "print/" + 'true' + '/' + filter + '/' + 'true' + '/' + 'true';
      } else if(mindate.value == ''){
        pdf.href= "cetak/" + 'true' + '/' + filter + '/' + 'true' + '/' + maxdate.value;
        excel.href= "export/" + 'true' + '/' + filter + '/' + 'true' + '/' + maxdate.value;
        print.href= "print/" + 'true' + '/' + filter + '/' + 'true' + '/' + maxdate.value;
      } else if(maxdate.value == ''){
        pdf.href= "cetak/" + 'true' + '/' + filter+ '/' + mindate.value + '/' + 'true';
        excel.href= "export/" + 'true' + '/' + filter+ '/' + mindate.value + '/' + 'true';
        print.href= "print/" + 'true' + '/' + filter+ '/' + mindate.value + '/' + 'true';
      } else {
        pdf.href= "cetak/" + 'true' + '/' + filter + '/' + mindate.value + '/' + maxdate.value;
        excel.href= "export/" + 'true' + '/' + filter + '/' + mindate.value + '/' + maxdate.value;
        print.href= "print/" + 'true' + '/' + filter + '/' + mindate.value + '/' + maxdate.value;
      }
    } else if(filter != 'true' && b.checked == false){
      if(mindate.value == '' && maxdate.value == ''){
        pdf.href= "cetak/" + 'false' + '/' + filter + '/' + 'true' + '/' + 'true';
        excel.href= "export/" + 'false' + '/' + filter + '/' + 'true' + '/' + 'true';
        print.href= "print/" + 'false' + '/' + filter + '/' + 'true' + '/' + 'true';
      } else if(mindate.value == ''){
        pdf.href= "cetak/" + 'false' + '/' + filter + '/' + 'true' + '/' + maxdate.value;
        excel.href= "export/" + 'false' + '/' + filter + '/' + 'true' + '/' + maxdate.value;
        print.href= "print/" + 'false' + '/' + filter + '/' + 'true' + '/' + maxdate.value;
      } else if(maxdate.value == ''){
        pdf.href= "cetak/" + 'false' + '/' + filter+ '/' + mindate.value + '/' + 'true';
        excel.href= "export/" + 'false' + '/' + filter+ '/' + mindate.value + '/' + 'true';
        print.href= "print/" + 'false' + '/' + filter+ '/' + mindate.value + '/' + 'true';
      } else {
        pdf.href= "cetak/" + 'false' + '/' + filter + '/' + mindate.value + '/' + maxdate.value;
        excel.href= "export/" + 'false' + '/' + filter + '/' + mindate.value + '/' + maxdate.value;
        print.href= "print/" + 'false' + '/' + filter + '/' + mindate.value + '/' + maxdate.value;
      }
    }
  }

  
  function b(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    const mindate = document.getElementById('mindate');
    const maxdate = document.getElementById('maxdate');
    maxdate.min = mindate.value;
    mindate.max = maxdate.value;
  }
  
  function c(){
    const count = document.querySelectorAll('.a1');
    const excel = document.getElementById('excel');
    const pdf = document.getElementById('pdf');
    const print = document.getElementById('print');
    if(count.length == 0){
      pdf.classList.add('disabled');
      excel.classList.add('disabled');
      print.classList.add('disabled');
    } else if(count.length >= 0){
      pdf.classList.remove('disabled');
      excel.classList.remove('disabled');
      print.classList.remove('disabled');
    }
    
  }
</script>