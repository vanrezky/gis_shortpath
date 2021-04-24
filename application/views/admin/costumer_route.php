    <script type="text/javascript">
        var centreGot = false;
    </script>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <?php echo $this->session->flashdata('message'); ?>
                <div class="card shadow mb-4">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Sekilas Informasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <p class="m-0 font-weight-bold text-info"><?= $get_costumer_detail->nama_costumer ?></p>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted"><i class="fas fa-map-marker-alt mr-1"> <?= $get_costumer_detail->alamat ?></i></p>
                                </div>
                                <div class="col-2">
                                    <strong class="text-muted"><i class="fas fa-phone"> <?= $get_costumer_detail->no_telp ?></i></strong>
                                </div>
                                <div class="col-3">
                                    <form role="form" method="post" action="<?php echo base_url('admin/costumer/get_route/' . $get_costumer_detail->id_costumer) ?>">
                                        <a href="<?= base_url('admin/costumer/') ?>" class="btn btn-danger btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text">Kembali</span>
                                        </a>

                                        <input hidden type="text" class="form-control" name="latitude" placeholder="Geser Kursor Map.." id="lat" value="<?php echo set_value('latitude') ?>" readonly required>
                                        <input hidden type="text" class="form-control" name="longitude" placeholder="Geser Kursor Map.." id="long" value="<?php echo set_value('longitude') ?>" readonly required>
                                        <button class="btn btn-info btn-icon-split btn-sm" type="submit">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-map-marker"></i>
                                            </span>
                                            <span class="text">Cari Rute..</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Rute</h6>
                    </div>
                    <div class="card-body">
                        <div id="directionsDiv"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Peta</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $map['html'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>