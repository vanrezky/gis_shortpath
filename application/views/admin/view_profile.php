        <!-- Begin Page Content -->
        <?php if ($get_admin_detail->id_role == 1) { ?>

          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"> <?= $title ?></h1>
            <p class="mb-4">Berikut adalah data <?= $get_admin_detail->nama_role ?> Aplikasi</a>.</p>
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
              <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/user.png') ?>" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?= $get_admin_detail->nama ?></h3>

                    <p class="text-muted text-center"><?= $get_admin_detail->nama_role ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#aktivitas" data-toggle="tab">Aktivitas</a></li>
                      <li class="nav-item"><a class="nav-link" href="#ubah_nama" data-toggle="tab">Ubah Nama</a></li>
                      <li class="nav-item"><a class="nav-link" href="#ganti_password" data-toggle="tab">Ganti Password</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="aktivitas">
                        <?php
                        $i = 0;
                        foreach ($get_aktivitas_detail as $singe_aktivitas) {
                          $i++;
                        ?>
                          <div class="post">
                            <div class="user-block">
                              <span class="username">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= aktivitas($singe_aktivitas->log_tipe) ?> - <?= tgl_jam_indo($singe_aktivitas->log_time) ?></div>
                                <a></a>
                                <i class="fas fa-calendar fa-2x text-gray-300 float-right"></i>
                              </span>
                              <span class="description"></span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                              <?= $singe_aktivitas->log_desc ?>
                            </p>
                          </div>
                          <hr>
                        <?php } ?>
                      </div>
                      <div class="tab-pane" id="ubah_nama">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/admin/ubahnama/' . $get_admin_detail->id_user) ?>">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName" name="nama" placeholder="Masukkan Nama Lengkap..">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="tab-pane" id="ganti_password">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/admin/change_password') ?>">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Password Lama</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" name="old" placeholder="Ketik Password lama">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-4 col-form-label">Password Baru</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" name="new" placeholder="Ketik Password baru..">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-4 col-form-label">Ulangi Password Baru</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" name="re_new" placeholder="Ketik Ulang Password baru">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>

        <?php } else { ?>
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Aktifitas <?= $title ?></h1>
            <p class="mb-4">Berikut adalah data Aktivitas <?= $get_admin_detail->nama_role ?></a>.</p>
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
              <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/worker.png') ?>" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?= $get_admin_detail->nama ?></h3>

                    <p class="text-muted text-center"><?= $get_admin_detail->nama_role ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#aktivitas" data-toggle="tab">Aktivitas</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="aktivitas">
                        <?php
                        $i = 0;
                        foreach ($get_aktivitas_detail as $singe_aktivitas) {
                          $i++;
                        ?>
                          <div class="post">
                            <div class="user-block">
                              <span class="username">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= aktivitas($singe_aktivitas->log_tipe) ?> - <?= tgl_jam_indo($singe_aktivitas->log_time) ?></div>
                                <a></a>
                                <i class="fas fa-calendar fa-2x text-gray-300 float-right"></i>
                              </span>
                              <span class="description"></span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                              <?= $singe_aktivitas->log_desc ?>
                            </p>
                          </div>
                          <hr>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        <?php } ?>