<?php $this->load->view('_partials/head.php'); ?>


<div class="d-flex" >
    <div class="p-0 sidebar d-none d-md-block" id="sidebar">
        <div class="row m-0">
            <div class="card rounded-0 border-bottom border-end b1" style="height: 65px; z-index: 11;">
                <div class="card rounded-0 overflow-hidden my-auto  ">
                    <img src="<?= base_url('assets/image/logo.png') ?>" style="height:50px; width:175px" alt="">
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="card rounded-0 border-end shadow-box b2 overflow-auto" style=" z-index: 11;">
                <div class="mb-3" style="height:80vh">
                    <div class="overflow-hidden">
                        <div class="card mt-3" style="width: 175px">
                            <a href="<?= site_url('manager/home') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                                <div class="row">
                                    <div class="mx-auto" style="width: 50px">
                                        <i class="fas fa-home fa-2x"></i>
                                    </div>
                                    <div class="text-start p-0" style="width:125px">
                                        HOME
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="card mt-3"  style="width: 175px">
                            <a href="<?= site_url('manager/produk') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                                <div class="row">
                                    <div class="mx-auto" style="width: 50px">
                                        <i class="fab fa-product-hunt fa-2x"></i>
                                    </div>
                                    <div class="text-start p-0" style="width:125px">
                                        PRODUK
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="card mt-3"  style="width: 175px">
                            <a href="<?= site_url('manager/stock') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                                <div class="row">
                                    <div class="mx-auto" style="width: 50px">
                                        <i class="fas fa-boxes fa-2x"></i>
                                    </div>
                                    <div class="text-start p-0" style="width:125px">
                                        STOCK
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="card mt-3"  style="width: 175px">
                            <a href="<?= site_url('manager/kategori') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                                <div class="row">
                                    <div class="mx-auto" style="width: 50px">
                                        <i class="fas fa-bookmark fa-2x"></i>
                                    </div>
                                    <div class="text-start p-0" style="width:125px">
                                        KATEGORI
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="card mt-3"  style="width: 175px">
                            <button  class="btn btn-sm btn-primary p-0 p-1 py-2" onclick="side_caret()">
                                <div class="row">
                                    <div class="mx-auto" style="width: 50px">
                                        <i class="fas fa-tasks fa-2x"></i>
                                    </div>
                                    <div class="text-start p-0" style="width:125px">
                                        LAPORAN <span class="float-end me-3"><i class="fas fa-caret-down caret_laporan" id="caret_laporan"></i></span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="card rounded-0 p-2 side_caret shadow-box border position-absolute" style="width: 175px; z-index: 100;" id="side_caret">
                        <a href="<?= site_url('manager/laporan/harian') ?>" class="btn btn-sm btn-primary col-12 my-1">LAPORAN HARIAN</a>
                        <a href="<?= site_url('manager/laporan/bulanan') ?>" class="btn btn-sm btn-primary col-12 my-1">LAPORAN BULANAN</a>
                        <a href="<?= site_url('manager/laporan/transaksi') ?>" class="btn btn-sm btn-primary col-12 my-1">LAPORAN TRANSAKSI</a>
                    </div>
                    <div class="overflow-hidden">
                        <div class="card mt-3" style="width: 175px">
                            <a href="<?= site_url('manager/LOG') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                                <div class="row">
                                    <div class="mx-auto" style="width: 50px">
                                        <i class="fas fa-history fa-2x"></i>
                                    </div>
                                    <div class="text-start p-0" style="width:125px">
                                        LOG
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="card mt-3"  style="width: 175px">
                            <a href="<?= site_url('manager/akun') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                                <div class="row">
                                    <div class="mx-auto" style="width: 50px">
                                        <i class="fas fa-cog fa-2x"></i>
                                    </div>
                                    <div class="text-start p-0" style="width:125px">
                                        AKUN
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="card mb-3 mt-3"  style="width: 175px">
                            <a href="<?= site_url('auth/logout') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                                <div class="row">
                                    <div class="mx-auto" style="width: 50px">
                                        <i class="fas fa-caret-square-left fa-2x"></i>
                                    </div>
                                    <div class="text-start p-0" style="width:125px">
                                        LOGOUT
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col m-0" id="main">
        <div class="row m-0">
            <div class="p-0">
                <div class="row m-0">
                    <div class="card rounded-0 border-bottom shadow-box b1" style="height:65px; z-index: 10;">
                        <div class="row my-auto">
                            <div class="col-4">
                                <button class="btn btn-sm btn-dark my-auto d-none d-md-block" onclick="sidebar();"><i class="fas fa-bars"></i></button>
                                <button class="btn btn-sm btn-dark my-auto d-md-none d-block"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"><i class="fas fa-bars"></i></button>
                            </div>
                            <div class="col-8">
                                <div class="float-end">
                                    <div class="card shadow-box bg-primary me-4">
                                        <div class="row p-0 m-0">
                                            <div class="col p-0">
                                                <img src="<?= base_url('assets/image/profile/'.$this->session->userdata('profile')) ?>" height="50px" alt="">
                                            </div>
                                            <div class="col px-1">
                                                <h6 class="text-light font-monospace"><?= $this->session->userdata('nama') ?></h6>
                                                <h6 class="text-light font-monospace" style="font-size: 10px"><?= $this->session->userdata('email') ?></h6>
                                            </div>
                                            <div class="col p-1 my-auto">
                                                <div onclick="h1()"><i class="text-light fas fa-chevron-circle-down fa-2x p1" id="p1"></i></div>
                                            </div>
                                            <div class="row">
                                                <div class="position-absolute card bg-primary border border-dark rounded-0 text-light h1" style="width:100%"  id="h1">
                                                    <div class="overflow-hidden">
                                                        <div class="card mb-3 shadow-box mx-auto mt-3 border border-dark border-3 rounded-0 border-start-0 border-end-0"  style="width: 175px">
                                                            <a href="<?= site_url('manager/akun') ?>" class="btn btn-sm btn-primary rounded-0 p-0 p-1 py-2">
                                                                <div class="row">
                                                                    <div class="mx-auto" style="width: 50px">
                                                                        <i class="fas fa-cog fa-2x"></i>
                                                                    </div>
                                                                    <div class="text-start p-0" style="width:125px">
                                                                        AKUN
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-hidden">
                                                        <div class="card mb-3 shadow-box mx-auto border border-dark border-3 rounded-0  border-start-0 border-end-0"  style="width: 175px">
                                                            <a href="<?= site_url('auth/logout') ?>" class="btn btn-sm btn-primary rounded-0 p-0 p-1 py-2">
                                                                <div class="row">
                                                                    <div class="mx-auto" style="width: 50px">
                                                                        <i class="fas fa-caret-square-left fa-2x"></i>
                                                                    </div>
                                                                    <div class="text-start p-0" style="width:125px">
                                                                        LOGOUT
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0" style="">
                    <div class="col m-0 p-0">
                        <div class="card rounded-0 overflow-auto b2" style="">
                            <div class="card-body">
                                <?php $this->load->view($content); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width:auto">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="card mt-3" style="width: 175px">
            <a href="<?= site_url('manager/home') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                <div class="row">
                    <div class="mx-auto" style="width: 50px">
                        <i class="fas fa-home fa-2x"></i>
                    </div>
                    <div class="text-start p-0" style="width:125px">
                        HOME
                    </div>
                </div>
            </a>
        </div>
        <div class="card mt-3"  style="width: 175px">
            <a href="<?= site_url('manager/produk') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                <div class="row">
                    <div class="mx-auto" style="width: 50px">
                        <i class="fab fa-product-hunt fa-2x"></i>
                    </div>
                    <div class="text-start p-0" style="width:125px">
                        PRODUK
                    </div>
                </div>
            </a>
        </div>
        <div class="card mt-3"  style="width: 175px">
            <a href="<?= site_url('manager/stock') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                <div class="row">
                    <div class="mx-auto" style="width: 50px">
                        <i class="fas fa-boxes fa-2x"></i>
                    </div>
                    <div class="text-start p-0" style="width:125px">
                        STOCK
                    </div>
                </div>
            </a>
        </div>
        <div class="card mt-3"  style="width: 175px">
            <a href="<?= site_url('manager/kategori') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                <div class="row">
                    <div class="mx-auto" style="width: 50px">
                        <i class="fas fa-bookmark fa-2x"></i>
                    </div>
                    <div class="text-start p-0" style="width:125px">
                        KATEGORI
                    </div>
                </div>
            </a>
        </div>
        <div class="card mt-3"  style="width: 175px">
            <button  class="btn btn-sm btn-primary p-0 p-1 py-2" onclick="side_caret_s()">
                <div class="row">
                    <div class="mx-auto" style="width: 50px">
                        <i class="fas fa-tasks fa-2x"></i>
                    </div>
                    <div class="text-start p-0" style="width:125px">
                        LAPORAN <span class="float-end me-3"><i class="fas fa-caret-down caret_laporan_s" id="caret_laporan_s"></i></span>
                    </div>
                </div>
            </button>
        </div>
        <div class="card rounded-0 p-2 side_caret_s shadow-box border position-absolute" style="width: 175px; z-index: 100;" id="side_caret_s">
            <a href="<?= site_url('manager/laporan/harian') ?>" class="btn btn-sm btn-primary col-12 my-1">LAPORAN HARIAN</a>
            <a href="<?= site_url('manager/laporan/bulanan') ?>" class="btn btn-sm btn-primary col-12 my-1">LAPORAN BULANAN</a>
            <a href="<?= site_url('manager/laporan/transaksi') ?>" class="btn btn-sm btn-primary col-12 my-1">LAPORAN TRANSAKSI</a>
        </div>
        <div class="card mt-3" style="width: 175px">
            <a href="<?= site_url('manager/LOG') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                <div class="row">
                    <div class="mx-auto" style="width: 50px">
                        <i class="fas fa-history fa-2x"></i>
                    </div>
                    <div class="text-start p-0" style="width:125px">
                        LOG
                    </div>
                </div>
            </a>
        </div>
        <div class="card mt-3"  style="width: 175px">
            <a href="<?= site_url('manager/akun') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                <div class="row">
                    <div class="mx-auto" style="width: 50px">
                        <i class="fas fa-cog fa-2x"></i>
                    </div>
                    <div class="text-start p-0" style="width:125px">
                        AKUN
                    </div>
                </div>
            </a>
        </div>
        <div class="card mt-3"  style="width: 175px">
            <a href="<?= site_url('auth/logout') ?>" class="btn btn-sm btn-primary p-0 p-1 py-2">
                <div class="row">
                    <div class="mx-auto" style="width: 50px">
                        <i class="fas fa-caret-square-left fa-2x"></i>
                    </div>
                    <div class="text-start p-0" style="width:125px">
                        LOGOUT
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php $this->load->view('_partials/footer.php'); ?>

<script>
    
    
    window.onload = function(){
        const asd = document.getElementById('sidebar');
        const aasd = document.getElementById('main');
        var newWidth = window.innerWidth;
        var newHeight = window.innerHeight; 
        const qwe = newWidth - asd.clientWidth;
        const rst = aasd.style.width = ""+ qwe +"px";
        aasd.style.width = ''+ qwe +'px';
        
        const b1 = document.querySelectorAll('.b1');
        const b2 = document.querySelectorAll('.b2');
        const aa1 = newHeight - b1[0].clientHeight-1;
        for(k=0; k<b1.length; k++){
            b2[k].style.height = '' + aa1 + "px";
        }
    }
    
    window.addEventListener('resize', function(event){
        const asd = document.getElementById('sidebar');
        const aasd = document.getElementById('main');
        var newWidth = window.innerWidth;
        var newHeight = window.innerHeight; 
        const qwe = newWidth - asd.clientWidth;
        const rst = aasd.style.width = ""+ qwe +"px";
        aasd.style.width = ''+ qwe +'px';
        
        const b1 = document.querySelectorAll('.b1');
        const b2 = document.querySelectorAll('.b2');
        const aa1 = newHeight - b1[0].clientHeight-1;
        for(k=0; k<b1.length; k++){
            b2[k].style.height = '' + aa1 + "px";
        }
    });
    
    function h1(){
        const button = document.getElementById('p1');
        const content = document.getElementById('h1');
        
        button.classList.toggle('p2');
        content.classList.toggle('h2');
    }
    
</script>