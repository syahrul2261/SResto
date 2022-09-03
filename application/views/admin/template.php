<?php $this->load->view('_partials/head.php'); ?>

<div class="d-flex" >
    <div class="p-0 sidebar  d-none d-md-block" id="sidebar">
        <div class="row m-0">
            <div class="card rounded-0 border-bottom border-end b1" style="height: 65px; z-index: 11;">
                <div class="card rounded-0 overflow-hidden my-auto  ">
                    <img src="<?= base_url('assets/image/logo.png') ?>" style="height:50px; width:175px" alt="">
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="card rounded-0 border-end shadow-box b2" style=" z-index: 11;">
                <div class="overflow-auto" style="height:100%">
                    <div class="overflow-hidden">
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
                        <div class="card mt-3 mb-3" style="width: 175px">
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
    <div class="col p-0 "id="main">
        <div class="row m-0">
            <div class="card rounded-0 border-bottom shadow-box b1" style="height:65px; z-index: 10;">
                <div class="row my-auto">
                    <div class="col-4">
                        <button class="btn btn-sm btn-dark my-auto d-md-block d-none" style="width:50px" onclick="sidebar();"><i class="fas fa-bars"></i></button>
                        <button class="btn btn-sm btn-dark my-auto d-md-none d-block" style="width:50px"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"><i class="fas fa-bars"></i></button>
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
                                                    <a href="<?= site_url('admin/akun') ?>" class="btn btn-sm btn-primary rounded-0 p-0 p-1 py-2">
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



<div class="offcanvas offcanvas-start w-auto" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" >
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body"   >
        <div class="card overflow-auto">
            <div class="overflow-hidden">
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
                <div class="card mt-3" style="width: 175px">
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