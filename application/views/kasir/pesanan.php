<div class="row" style="height:100%">
    <div class="col" style="height: 100%">
        <div class="card shadow-box" style="height: 100%;">
            <div class="container-fluid overflow-auto">
                <ul class="nav nav-pills mb-3 d-flex" id="pills-tab" role="tablist">
                    <?php 
                    $i=0;
                    foreach($get_kategori as $k): 
                        $i++;
                        ?>
                    
                    
                    <li class="col mx-auto nav-item  border-0" role="presentation">
                        <button class="col-11 nav-link shadow-box tab-class <?= ($i == 1)?'active' :'' ?>" data-bs-toggle="pill" data-bs-target="#tab<?= $k->id_kategori ?>" type="button"><?= $k->nama_kategori ?></button>
                    </li>
                    
                    <?php endforeach; ?>
                    
                </ul>
                <div class="float-end">
                    <label for="">Cari:</label>
                    <input type="text" name="cari" id="cari">
                </div>
                
                <div class="tab-content">
                    <?php 
                    $y=0;
                    foreach($get_kategori as $b): 
                        $y++;
                        ?>
                    <div class="tab-pane fade <?= ($y == 1)?'show active' :'' ?>" id="tab<?= $b->id_kategori ?>" role="tabpanel">
                        <div class="container overflow-auto" style="height:65vh">
                            <div class="row">
                                
                                
                                <?php foreach($get_produk as $p): ?>
                                    <?= ($p->id_kategori == $b->id_kategori) ? 
                                    '<div class="card mx-auto my-2 shadow-box p-0 text-center" id="content" style="width: 200px; hight:100%">
                                    <div class="card-header bg-primary fw-bold text-light nama_produk">
                                    '.$p->nama_produk.'
                                    </div>
                                    <div class="card-body p-0 d-flex overflow-hidden justify-content-center">
                                    <div class="card mt-1 p-1 position-absolute shadow-box border border-dark text-light '.(($p->stock <= 5)?'bg-danger': (($p->stock <= 10)? 'bg-warning' : 'bg-success') ).'" style="margin-left: -90%;"><h6>Stock: <span id="stock">'.$p->stock.'</span></h6></div>
                                    <img src="'.site_url('assets/image/produk/'.$p->foto_produk).'" height="150px"  alt="">
                                    </div>
                                    <div class="card-footer ps-1 bg-primary fw-bold text-light">
                                    <div class="float-start">
                                    RP '.number_format($p->harga_produk).'
                                    </div>
									<input type="hidden" name="jumlah_produk" id="'. $p->id_produk.'" value="1" class="quantity form-control">
                                    <div class="float-end">
                                    <button class="btn btn-sm btn-success add_cart '.(($p->stock == 0)?'disabled bg-danger' : '').'" data-produkid="'.$p->id_produk.'" data-produknama="'.$p->nama_produk.'" data-produkharga="'.$p->harga_produk.'">ADD</button>
                                    </div>
                                    </div>
                                    </div>'
                                    : 
                                    ''
                                    ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="" style="width: 370px;">
        <div class="card shadow-box" style="height: 100%; font-size:16px">
            <div class="container-fluid">
                <div class="card text-center my-2 bg-primary text-light fw-bold shadow-box">
                    PESANAN
                </div>
            </div>
            <div class="container-fluid overflow-auto" style="height: 70vh">
                <div id="show_cart"></div>
            </div>
            <div class="container-fluid">
                <div class="btn btn-sm btn-primary card disabled" id="btn-bayar" data-bs-toggle="modal" data-bs-target="#bayar">BAYAR</div>
            </div>
        </div>
    </div>
    
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url("kasir/pesanan/payment") ?>" method="POST">  
                    <div id="modal"></div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button onclick="return confirm('Pastikan Sudah Terjadi Pembayaran')" type="submit" id="btn-submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    
    
    
    
    
</div>


<?= 
$modal; 

?>

<!-- Modal -->
<div class="modal fade  modal-after" id="modal-after" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close modal-after" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card rounded-1 shadow-box mx-auto px-2" style="width: 400px; font-size: 14px">
                    <h6 class="text-center mb-3">BUKTI PEMBAYARAN</h6>
                    <pre class="m-0">TANGGAL        : <?= date('Y-m-d') ?>||<?= date('H:i:s') ?></pre>
                    <pre class="m-0">KODE TRANSAKSI : <?= $kode ?></pre>
                    <pre class="m-0">NAMA PELANGGAN : <?= $this->input->post('nama_pelanggan') ?></pre>
                    <pre class="m-0">OPERATOR       : <?= $this->session->userdata('nama') ?></pre>
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
    foreach($this->cart->contents() as $cc): 
        ?>



<tr>
    <th class="py-1"><?= $cc['name'] ?></th>
    <th class="py-1"><?= number_format($cc['price']) ?></th>
    <th class="py-1"><?= $cc['qty'] ?></th>
    <th class="py-1"><?= number_format($cc['subtotal']) ?></th>
</tr>
<tr>
    <th class="py-1" colspan="3">TOTAL + TAX</th>
    <th class="py-1 text-end" colspan="2"><?= number_format($this->cart->total() * 1.1) ?></th>
</tr>                        
<tr>
    <th class="py-1" colspan="3">BAYAR</th>
    <th class="py-1 text-end" colspan="2"><?= number_format($this->input->post('bayar')) ?></th>
</tr>                        
<tr>
    <th class="py-1" colspan="3">KEMBALIAN</th>
    <th class="py-1 text-end" colspan="2"><?= number_format($this->input->post('bayar') - ($this->cart->total() * 1.1)) ?></th>
</tr>

<?php endforeach; ?>
</tbody>
</table>
<h6 class="text-center">TERIMAKASIH SUDAH BERBELANJA</h6>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary modal-after" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Cetak</button>
</div>
</div>
</div>
</div>
<!-- sadkjsahdkjsahdkjsahdkjsah -->
<!-- sdsadasdsadasdsad -->
<!-- dasdasdasdassadsad -->