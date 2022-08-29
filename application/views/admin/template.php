<?php $this->load->view('_partials/head.php'); ?>

<div class="d-flex" >
    <div class="p-0 sidebar  d-none d-md-block" id="sidebar">
        <div class="row m-0">
            <div class="card rounded-0 border-bottom border-end" style="height: 10vh; z-index: 11;">
                            <div class="card rounded-0 overflow-hidden my-auto  ">
                <img src="<?= base_url('assets/image/logo.png') ?>" style="height:50px; width:175px" alt="">
            </div>
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
    <div class="col p-0 "id="main">
        <div class="row m-0">
            <div class="card rounded-0 border-bottom shadow-box" style="height:10vh; z-index: 10;">
                <button class="btn btn-sm btn-dark my-auto d-md-block d-none" style="width:50px" onclick="sidebar();"><i class="fas fa-bars"></i></button>
            <button class="btn btn-sm btn-dark my-auto d-md-none d-block" style="width:50px"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"><i class="fas fa-bars"></i></button>

            </div>
        </div>
    <div class="row m-0" style="">
        <div class="col m-0 p-0">
            <div class="card rounded-0 overflow-auto" style="height:90vh">
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
        // console.log(asd.clientWidth);
        // console.log(newWidth);
        // console.log(newHeight);
        const qwe = newWidth - asd.clientWidth;
        const rst = aasd.style.width = ""+ qwe +"px";
        aasd.style.width = ''+ qwe +'px';
    }
    
    window.addEventListener('resize', function(event){
        const asd = document.getElementById('sidebar');
        const aasd = document.getElementById('main');
        var newWidth = window.innerWidth;
        var newHeight = window.innerHeight; 
        // console.log(asd.clientWidth);
        // console.log(newWidth);
        // console.log(newHeight);
        const qwe = newWidth - asd.clientWidth;
        const rst = aasd.style.width = ""+ qwe +"px";
        aasd.style.width = ''+ qwe +'px';
    });
</script>