<?php $this->load->view('_partials/head.php'); ?>

<div class="row m-0">
    <div class="p-0 sidebar" id="sidebar">
        <div class="row m-0">
            <div class="card rounded-0 border-bottom border-end" style="height: 10vh; z-index: 11;">
                sadasd
            </div>
        </div>
        <div class="row m-0">
            <div class="card rounded-0 border-end shadow-box" style="height:90vh; z-index: 11;">
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
            </div>
            
            <div class="overflow-hidden">
                <div class="card mb-3"  style="width: 175px">
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
<div class="col text-start p-0 ">
    <div class="row m-0">
        <div class="card rounded-0 border-bottom shadow-box" style="height:10vh; z-index: 10;">
            <button class="btn btn-sm btn-dark my-auto" style="width:50px" onclick="sidebar();"><i class="fas fa-bars"></i></button>
        </div>
    </div>
    <div class="row m-0" style="">
        <div class="card rounded-0 overflow-auto" style="height:90vh">
            <div class="card-body" >
                <?php $this->load->view($content); ?>
            </div>
        </div>
    </div>
</div>



<?php $this->load->view('_partials/footer.php'); ?>
<!-- asdhsadkjashkash -->
<!-- asdsadasd -->
<!-- asdsadasdasdasasdassad -->