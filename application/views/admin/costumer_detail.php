    <!-- Script Pemanggilan GMap -->
    <?php if (isset($map['js'])) echo $map['js']; ?>
    <script type="text/javascript">
        var centreGot = false;
    </script>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Sekilas Informasi</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <!-- srart -->
                            <h4 class="text-muted"><?= $get_costumer_detail->nama_costumer ?></h4>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                            <p class="text-muted"><?= $get_costumer_detail->alamat ?></p>
                            <hr>
                            <strong><i class="fas fa-phone"></i> Telepon</strong>
                            <p class="text-muted"><?= $get_costumer_detail->no_telp ?></p>
                            <hr>
                            <strong><i class="fas fa-tv"></i> Jenis TV Kabel Disewa</strong>
                            <p class="text-muted"><?= $get_costumer_detail->jenis ?></p>
                            <hr>
                            <a href="<?= base_url('admin/costumer/route/' . $get_costumer_detail->id_costumer) ?>" class="btn btn-danger btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-search-plus"></i>
                                </span>
                                <span class="text">Cari Rute Terpendek</span>
                            </a>
                            <!-- finish -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Peta</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <?php echo $map['html'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Lanjut</h6>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="form-group">
                            <label>Kode Costumer</label>
                            <input type="text" class="form-control" name="id_costumer" value="<?= $get_costumer_detail->id_costumer ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label>Jenis Berlangganan</label>
                            <input type="text" class="form-control" name="jenis_tvkabel" value="<?= $get_costumer_detail->jenis ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Costumer</label>
                            <input type="text" class="form-control" name="nama_costumer" value="<?= $get_costumer_detail->nama_costumer ?>" placeholder="Masukkan Nama Pimpinan.." required readonly>
                        </div>
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" class="form-control" name="latitude" placeholder="Geser Kursor Map.." id="lat" value="<?= $get_costumer_detail->latitude ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" class="form-control" name="longitude" placeholder="Geser Kursor Map.." id="long" value="<?= $get_costumer_detail->longitude ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>ALamat Lengkap</label>
                            <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap.." required readonly><?= $get_costumer_detail->alamat ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="number" class="form-control" name="no_telp" value="<?= $get_costumer_detail->no_telp ?>" placeholder="08*******" required readonly>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('admin/costumer/'); ?>" class=" btn btn-dark"> Back</a>
                        <a href="<?= base_url('admin/costumer/edit/' . $get_costumer_detail->id_costumer); ?>" class=" btn btn-info float-right"> Perbaharui</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                        <h6 class="m-0 font-weight-bold text-primary">Foto Lokasi</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample1">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?= base_url('assets/foto/' . $get_costumer_detail->foto); ?>" alt="foto lokasi costumer <?= $get_costumer_detail->nama_costumer ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>