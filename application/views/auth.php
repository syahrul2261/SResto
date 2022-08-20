<?php include('_partials/head.php'); ?>

<div class="card position-absolute top-50 start-50 translate-middle shadow-box">
    <div class="card-body mx-auto">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxjH3TXHIFe5UR3590DqAVa6GenxieHbRPCQ&usqp=CAU" style="width:200px" alt="">
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
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="password" name="password" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        
        <button type="submit" class="btn btn-sm btn-primary float-end">LOGIN</button>
        </form>
    </div>
</div>


<?php include('_partials/footer.php'); ?>
<!-- sajasjdhakjda -->