<div class="card shadow-box">
    <div class="card-body">
    
    <div class="card shadow-box rounded-2 mb-1" style="width:250px">
        <div class="card-body">
            <div class="card shadow-box rounded-2">
                <img class="rounded-2" src="<?= base_url('assets/image/profile/'.$get_akun->profile) ?>" style="width:100%" alt="">
            </div>
            <form action="<?= site_url('admin/akun/update') ?>" method="post" enctype="multipart/form-data">
                
                <div class="card shadow-box rounded-2 mt-2 p-1">
                    <input type="file" name="profile" id="">
                    <input type="hidden" name="old_profile" value="<?= $get_akun->profile ?>">
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-12">
                    <div class="card shadow-box">
                        <div class="card-body font-monospace">
                            <input type="hidden" name="id_user" value="<?= $get_akun->id_user ?>">
                            <div class="card shadow-box p-1">
                                <div class="row">
                                    <div class="col-3 my-auto ms-1">
                                        USERNAME
                                    </div>
                                    <div class="col">
                                        <input class="w-100 form-control" type="text" name="username" id="" value="<?= $get_akun->username ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-box p-1  my-3">
                                <div class="row">
                                    <div class="col-3 my-auto ms-1">
                                        EMAIL
                                    </div>
                                    <div class="col">
                                        <input class="w-100 form-control" type="text" name="email" id="" value="<?= $get_akun->email ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-box p-1  my-3">
                                <div class="row">
                                    <div class="col-3 my-auto ms-1">
                                        NAMA
                                    </div>
                                    <div class="col">
                                        <input class="w-100 form-control" type="text" name="nama" id="" value="<?= $get_akun->nama ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-box p-1 my-3">
                                <div class="row">
                                    <div class="col-3 my-auto ms-1">
                                        PASSWORD
                                    </div>
                                    <div class="col">
                                        <input class="w-100 form-control" type="text" name="password" id="" value="">
                                        <label class="" style="font-size: 10px">*KOSONGKAN JIKA TIDAK INGIN MENGUBAH PASSWORD</label>
                                        <input type="hidden" name="old_password" value="<?= $get_akun->password ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-box p-1 my-3">
                                <div class="row">
                                    <div class="col-3 my-auto ms-1">
                                        TANGGAL LAHIR
                                    </div>
                                    <div class="col">
                                        <input class="w-100 form-control" type="date" name="tgl_lahir" id="" value="<?= $get_akun->tgl_lahir?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-box p-1 my-3">
                                <div class="row">
                                    <div class="col-3 my-auto ms-1">
                                        ALAMAT
                                    </div>
                                    <div class="col">
                                        <input class="w-100 form-control" type="text" name="alamat" id="" value="<?= $get_akun->alamat ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-box mt-3 float-end">
                        <button type="submit" class="btn btn-sm">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>