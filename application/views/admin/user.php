<div class="card shadow-box bg-primary text-light fw-bold text-center mb-2">
    USER
</div>


        <div class="card shadow-box">
            <div class="card-header bg-primary text-light fw-bold text-center d-flex justify-content-end">
                <div class="btn- btn-sm btn-light mx-1" data-bs-toggle="modal" data-bs-target="#add_user">TAMBAH</div>
                <a href="<?= site_url('admin/user/delete_all') ?>" class="btn- btn-sm btn-light mx-1">HAPUS</a>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>username</th>
                            <th>email</th>
                            <th>nama</th>
                            <th>tgl_lahir</th>
                            <th>alamat</th>
                            <th>profile</th>
                            <th>akses</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($get_user as $u): $i++?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $u->username ?></td>
                            <td><?= $u->email ?></td>
                            <td><?= $u->nama ?></td>
                            <td><?= $u->tgl_lahir ?></td>
                            <td><?= $u->alamat ?></td>
                            <td>
                    <img class="rounded-2" src="<?= base_url('assets/image/profile/'.$u->profile) ?>" style="width:50PX" alt="">
                            </td>   
                            <td><?= $u->akses ?></td>
                            <td>
                                <div class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $u->id_user ?>">EDIT</div>
                                <a href="<?= site_url('admin/user/delete/'.$u->id_user) ?>" class="btn btn-sm btn-danger">HAPUS</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>



<!-- Modal -->
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/user/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">USERNAME</span>
                        <input type="text" class="form-control" name='username' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">EMAIL</span>
                        <input type="text" class="form-control" name='email' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">NAMA</span>
                        <input type="text" class="form-control" name='nama' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">PASSWORD</span>
                        <input type="password" class="form-control" name='password' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">TANGGAL LAHIR</span>
                        <input type="date" class="form-control" name='tgl_lahir' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">ALAMAT</span>
                        <textarea row="2" type="text" class="col-8" name='alamat' id="basic-url" aria-describedby="basic-addon3"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">PROFILE</span>
                        <input type="file" class="form-control" name='profile' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">AKSES</span>
                        <select class="form-control" name="akses" id="">
                            <option value="" disable selected hidden>AKSES</option>
                            <option value="kasir">KASIR</option>
                            <option value="manager">ADMIN</option>
                            <option value="admin">MANAGER</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php foreach ($get_user as $z): ?>
<!-- Modal -->
<div class="modal fade" id="edit<?= $z->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title <?= $z->id_user ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/user/update') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $z->id_user ?>">
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">USERNAME</span>
                        <input value="<?= $z->username ?>" type="text" class="form-control" name='username' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">EMAIL</span>
                        <input value="<?= $z->email ?>" type="text" class="form-control" name='email' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">NAMA</span>
                        <input value="<?= $z->nama ?>" type="text" class="form-control" name='nama' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">PASSWORD</span>
                        <input value="" type="password" class="form-control" name='password' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">TANGGAL LAHIR</span>
                        <input value="<?= $z->tgl_lahir ?>" type="date" class="form-control" name='tgl_lahir' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">ALAMAT</span>
                        <input value="<?= $z->alamat ?>" type="text" class="form-control" name='alamat' id="basic-url" aria-describedby="basic-addon3"  ></input>
                    </div>
                    <input type="hidden" name="old_profile" value="<?= $z->profile ?>">
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">PROFILE</span>
                        <input type="file" class="form-control" name='profile' id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="col-4 input-group-text bg-primary text-light fw-bold" id="basic-addon3">AKSES</span>
                        <select class="form-control" name="akses" id="">
                            <option value="<?= $z->akses ?>" selected hidden><?= $z->akses ?></option>
                            <option value="kasir">KASIR</option>
                            <option value="manager">ADMIN</option>
                            <option value="admin">MANAGER</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php endforeach; ?>