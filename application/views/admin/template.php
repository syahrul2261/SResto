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
                <div class="overflow-hidden" style="height:100%">
                    <div class="card mt-3" style="width: 175px">
                        <a href="<?= site_url('admin/home') ?>" class="btn btn-sm btn-primary p-0 py-2">
                            <div class="row p-0">
                                <div class=" p-0 text-end" style="width: 50px">
                                    <i class="fas fa-home fa-2x"></i>
                                </div>    
                                <div class="col p-0 my-auto text-start ps-3 font-monospace fw-bold">
                                    HOME
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card mt-3" style="width: 175px">
                        <a href="<?= site_url('admin/user') ?>" class="btn btn-sm btn-primary p-0 py-2">
                            <div class="row p-0">
                                <div class=" p-0 text-end" style="width: 50px">
                                    <i class="fas fa-user fa-2x"></i>
                                </div>    
                                <div class="col p-0 my-auto text-start ps-3 font-monospace fw-bold">
                                    USER
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card mt-3" style="width: 175px">
                        <a href="<?= site_url('admin/log') ?>" class="btn btn-sm btn-primary p-0 py-2">
                            <div class="row p-0">
                                <div class=" p-0 text-end" style="width: 50px">
                                    <i class="fas fa-history fa-2x"></i>
                                </div>    
                                <div class="col p-0 my-auto text-start ps-3 font-monospace fw-bold">
                                    LOG
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card mt-3" style="width: 175px">
                        <a href="<?= site_url('admin/akun') ?>" class="btn btn-sm btn-primary p-0 py-2">
                            <div class="row p-0">
                                <div class=" p-0 text-end" style="width: 50px">
                                    <i class="fas fa-cog fa-2x"></i>
                                </div>    
                                <div class="col p-0 my-auto text-start ps-3 font-monospace fw-bold">
                                    AKUN
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <div class="mb-3" style="width: 175px">
                        <div class="card">
                            <a href="<?= site_url('auth/logout') ?>" class="btn btn-sm btn-primary p-0 py-2">
                                <div class="row p-0">
                                    <div class=" p-0 text-end" style="width: 50px">
                                        <i class="fas fa-caret-square-left fa-2x"></i>
                                    </div>    
                                    <div class="col p-0 my-auto text-start ps-3 font-monospace fw-bold">
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