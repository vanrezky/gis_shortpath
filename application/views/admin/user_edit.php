    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data <?= $get_admin_detail->nama ?></h1>
        <p class="mb-4">Masukkan data dengan valid dan benar</a>.</p>
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/admin/update') ?>">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data <?= $get_admin_detail->nama_role ?></h6>
                        </div>
                        <div class="card-body">
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan Username.." value="<?= $get_admin_detail->username ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Member</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Administrator.." value="<?= $get_admin_detail->nama ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengganti password..">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Kosongkan jika tidak ingin mengganti password</div>
                            </div>
                        </div>
                        <input type="text" value="<?= $get_admin_detail->id_user ?>" name="id_user" readonly hidden>
                        <input type="text" value="<?= $get_admin_detail->id_role ?>" name="id_role" readonly hidden>
                        <div class="card-footer">
                            <a href="<?= base_url('admin/dashboard/'); ?>" class=" btn btn-dark"> Back</a>
                            <button type="submit" class="btn btn-info  float-right"> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>