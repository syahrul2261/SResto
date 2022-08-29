<?php include('_partials/head.php'); ?>
<div class="card position-absolute top-50 start-50 translate-middle shadow-box col-8 col-sm-6 col-md-4 col-lg-3">
    <div class="card-body mx-auto">
        <img src="<?= base_url('assets/image/logo.png') ?>" style="width:100%" alt="">
    </div>
    <div class="card-body">
        <?php
        // Cek apakah terdapat session nama message
        if($this->session->flashdata('message')){ // Jika ada
            echo '<div class="alert alert-danger my-1 p-0 p-1 text-center">'.$this->session->flashdata('message').'</div>'; // Tampilkan pesannya
        }
        ?>
        <form action="<?= site_url('auth/login'); ?>" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <button type="submit" class="btn btn-sm btn-primary float-end">LOGIN</button>
        </form>
    </div>
</div>
<?php include('_partials/footer.php'); ?>


<!-- adsadasdsadsada -->
<!-- sajasjdhakjda -->