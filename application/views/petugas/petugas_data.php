        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Petugas
                <div style="float: right">
                </div>
            </h1>
            <p class="mb-4">Berikut adalah data Petugas</a>.</p>
            <?php echo $this->session->flashdata('message'); ?>

            <!-- DataTales Example -->
            <div class="row">
                <?php
                $i = 0;
                foreach ($get_all_petugas as $petugas) {
                    $i++;
                ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $petugas->nama_role; ?></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $petugas->nama; ?></div>

                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= tgl_jam_indo($petugas->last_login); ?></div>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="<?= base_url('assets/img/worker.png') ?>" alt="" class="img-circle img-fluid" style="width: 50%">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Petugas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/petugas/save') ?>">

                                <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Petugas.." required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username.." required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                                </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-info  float-right">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        </div>