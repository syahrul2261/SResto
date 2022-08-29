<?php $this->load->view('_partials/head.php'); ?>

  <div class="position-absolute top-50 start-50 translate-middle d-block d-lg-none">
    <div class="card">
        <div class="card-body text-center fw-bold font-monospace bg-light ">
            <div>HALAMAN KASIR TIDAK DAPAT DI AKSES DI HP</div>
            <a href="<?= site_url('auth/logout') ?>" class="btn btn-sm btn-success">Keluar</a>
        </div>
    </div>
  </div>

<div class="card-body d-none d-lg-block" style="height:100vh">
    <div class="row" style="height:100%;">
        <div class="p-0 me-3" style="width : 100px">
            <div class="card rounded-0 shadow-box" style="height:93vh;">
            <div class="my-auto">
                <div class="text-center my-2">
                    <a href="<?= site_url('kasir/home'); ?>" class="btn btn-primary p-0 pt-2" style="width: 90%;">
                    <i class="fas fa-tachometer-alt fa-3x"></i>
                    <pre class="m-0 p-1 fw-bold font-monospace" style="font-size: 15px;">DASHBOARD</pre>
                    </a>
                </div>
                <div class="text-center my-2">
                    <a href="<?= site_url('kasir/pesanan'); ?>" class="btn btn-primary p-0 pt-2" style="width: 90%;">  
                    <i class="fas fa-shopping-cart fa-3x"></i>
                    <pre class="m-0 p-1 fw-bold font-monospace" style="font-size: 15px;">PESANAN</pre>
                </a>
                </div>
                <div class="text-center my-2">
                    <a href="<?= site_url('kasir/riwayat'); ?>" class="btn btn-primary p-0 pt-2" style="width: 90%;">
                    <i class="fas fa-history fa-3x"></i>
                    <pre class="m-0 p-1 fw-bold font-monospace" style="font-size: 15px;">RIWAYAT</pre>
                </a>
                </div>
                <div class="text-center my-2">
                    <a href="<?= site_url('kasir/akun') ?>" class="btn btn-primary p-0 pt-2" style="width: 90%;">
                    <i class="fas fa-cog fa-3x"></i>
                    <pre class="m-0 p-1 fw-bold font-monospace" style="font-size: 15px;">AKUN</pre>
                </a>
                </div>
            </div>
            <div class="text-center my-2">
                <a href="<?= site_url('auth/logout'); ?>" class="btn btn-primary p-0 pt-2" style="width: 90%;">
                    <i class="far fa-caret-square-left fa-3x"></i>
                    <pre class="m-0 p-1 fw-bold font-monospace" style="font-size: 15px;">LOG OUT</pre> 
                </a>
            </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="card rounded-0 shadow-box overflow-auto" style="height:93vh">
            <div class="card-body">
                <?php $this->load->view($content) ?>
            </div>
            </div>
        </div>
    </div>
</div>  


<?php $this->load->view('_partials/footer.php'); ?>