<div class="card shadow-box bg-primary fw-bold text-light text-center mb-3">
    STOCK
</div>
<div class="card shadow-box fw-bold">
    <div class="card-header bg-primary text-light">
         <select class="btn btn-sm btn-light mt-1 text-start" onchange="filter()" id="filter">
            <option value="true" hidden>PILIH</option>
            <option value="true" >SEMUA</option>
            <?php foreach($get_kategori as $kt): ?>
            <option value="<?= $kt->nama_kategori ?>"><?= $kt->nama_kategori ?></option>
            <?php endforeach; ?>
        </select>
        <a href="<?= site_url('manager/stock/cetak/true') ?>" id="pdf" class="btn btn-sm btn-light mt-1"  target="_blank">CETAK PDF</a>
        <a href="<?= site_url('manager/stock/export/true') ?>" id="excel" class="btn btn-sm btn-light mt-1">CETAK XLSX</a>
        <a class="btn btn-sm btn-light mt-1" href="<?= site_url('manager/stock/print/true') ?>" id="print" target="_blank">PRINT</a>
    </div>
    <div class="card-body">
                    <div class="card overflow-auto">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">FOTO</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach($get_produk as $p) :
                                    $i++;
                                    ?>
                                <tr id="tbody">
                                    <td><?= $i ?></td>
                                    <td><?= $p->nama_produk ?></td>
                                    <td><img src="<?= base_url('assets/image/produk/'.$p->foto_produk) ?>" width="50px" alt=""></td>
                                    <td><?= $p->stock ?></td>
                                    <td class="text-center" width="150px">
                                        <div class="row">
                                            <div class="col">
                                                <div class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit_stock<?= $p->id_produk ?>">EDIT</div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <form action="<?= site_url('manager/stock/reset') ?>" method="post">
                                                        <input type="hidden" name="id_produk" value="<?= $p->id_produk ?>">
                                                        <input type="hidden" name="nama_produk" value="<?= $p->nama_produk ?>">
                                                        <input type="hidden" name="harga_produk" value="<?= $p->harga_produk ?>">
                                                        <input type="hidden" name="id_kategori" value="<?= $p->id_kategori ?>">
                                                        <input type="hidden" name="foto_produk" value="<?= $p->foto_produk ?>">
                                                        <button onclick="return confirm('Apakah Anda Yakin Untuk Mereset Stock Data Ini?')" type="submit" class="btn btn-sm btn-danger mb-1">RESET</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
            </div>
    </div>
</div>
<?php foreach($get_produk as $p) : ?>
    <p class="d-none" id="kategori"><?= $p->nama_kategori ?></p>
<?php endforeach; ?>


<?php foreach($get_produk as $p): ?>
<!-- Modal -->
<div class="modal fade" id="edit_stock<?= $p->id_produk ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('manager/stock/update') ?>" method="post">
                    <input type="hidden" name="id_produk" value="<?= $p->id_produk ?>">
                    <input type="hidden" name="nama_produk" value="<?= $p->nama_produk ?>">
                    <input type="hidden" name="harga_produk" value="<?= $p->harga_produk ?>">
                    <input type="hidden" name="id_kategori" value="<?= $p->id_kategori ?>">
                    <input type="hidden" name="foto_produk" value="<?= $p->foto_produk ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-4 bg-primary text-light fw-bold" id="basic-addon3">Harga</span>
                        <input type="text" name="stock" value="<?= $p->stock ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- adasdadsa -->



<script>
      function filter(){
        a();
        b();
    }
    
    function a(){        
        const filter = document.getElementById('filter').value;
        const kategori = document.querySelectorAll('#kategori');
        const tbody = document.querySelectorAll('#tbody');
        const excel = document.getElementById('excel');
        const pdf = document.getElementById('pdf');
        const print = document.getElementById('print');
        for(i=0; i<kategori.length; i++){
          if(filter == "true"){
            tbody[i].classList.remove('d-none');
            } else {
            if(filter == kategori[i].innerText){
                    tbody[i].classList.remove('d-none');
                    tbody[i].classList.add('a1');
                } else {
                    tbody[i].classList.add('d-none');
                    tbody[i].classList.remove('a1');
                }
            }
        }
        pdf.href= "stock/cetak/"+filter;
        excel.href= "stock/export/"+filter;
        print.href= "stock/print/"+filter;
    
        console.log(filter);
  }

  function b(){
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