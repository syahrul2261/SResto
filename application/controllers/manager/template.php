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
            <div class="" style="height:100%">
                <div class="card mt-3"><a href="<?= site_url('manager/home') ?>" class="btn btn-sm btn-primary">HOME</a></div>
                <div class="card mt-3"><a href="<?= site_url('manager/produk') ?>" class="btn btn-sm btn-primary">PRODUK</a></div>
                <div class="card mt-3"><a href="<?= site_url('manager/stock') ?>" class="btn btn-sm btn-primary">STOCK</a></div>
                <div class="card mt-3"><a href="<?= site_url('manager/kategori') ?>" class="btn btn-sm btn-primary">KATEGORI</a></div>
                <div class="card mt-3"><a href="<?= site_url('manager/riwayat') ?>" class="btn btn-sm btn-primary">RIWAYAT</a></div>
                <div class="card mt-3">
                    <button onclick="side_drop()" class="btn btn-sm btn-primary">LOG <span class="float-end"><i class="fas fa-caret-down caret" id="caret"></i></span></button>
                    <div class="card rounded-0 p-2 side_drop shadow-box" style="width: 175px" id="side_drop">
                        <a href="<?= site_url('manager/riwayat') ?>" class="btn btn-sm btn-primary col-12 my-1">LOG</a>
                        <a href="<?= site_url('manager/riwayat') ?>" class="btn btn-sm btn-primary col-12 my-1">LOG</a>
                    </div>
                </div>
                <div class="card mt-3"><a href="<?= site_url('manager/akun') ?>" class="btn btn-sm btn-primary">AKUN</a></div>
            </div>
                <div class="mb-3">
                    <div class="card"><a href="<?= site_url('auth/logout') ?>" class="btn btn-sm btn-primary">LOGOUT</a></div>
                </div>
        </div>
    </div>

    </div>
    <div class="col p-0 ">
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
</div>


<?php $this->load->view('_partials/footer.php'); ?>