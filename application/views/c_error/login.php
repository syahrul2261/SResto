<?php $this->load->view('_partials/head.php'); ?>


  <div class="position-absolute top-50 start-50 translate-middle">
    <div class="card">
        <div class="card-body text-center fw-bold font-monospace bg-light ">
            <div>ANDA BELUM LOGIN, LOGIN UNTUK MENGAKSES HALAMAN</div>
            <a href="<?= site_url('auth') ?>" class="btn btn-sm btn-success">LOGIN</a>
        </div>
    </div>
  </div>


<?php $this->load->view('_partials/footer.php'); ?>