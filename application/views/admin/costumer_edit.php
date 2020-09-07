    <!-- Script Pemanggilan GMap -->
    <?php if (isset($map['js'])) echo $map['js']; ?>
    <script type="text/javascript">
        var centreGot = false;
    </script>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Lanjut</h6>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/costumer/update/' . $get_costumer_detail->id_costumer) ?>">
                        <div class="card-body">
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group">
                                <label>Kode Costumer</label>
                                <input type="text" class="form-control" name="id_costumer" value="<?= $get_costumer_detail->id_costumer ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label>Jenis Berlangganan</label>
                                <select class="form-control" style="width: 100%;" id="jenis_tvkabel" name="jenis_tvkabel">
                                    <option disabled selected="selected">Pilih Jenis TV Kabel Costumer</option>
                                    <?php
                                    foreach ($get_jenis as $data) {
                                        echo "<option value='" . $data->id . "'>" . $data->jenis . "</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pimpinan</label>
                                <input type="text" class="form-control" name="nama_costumer" value="<?= $get_costumer_detail->nama_costumer ?>" placeholder="Masukkan Nama Pimpinan.." required>
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
                                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap.." required><?= $get_costumer_detail->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" class="form-control" name="no_telp" value="<?= $get_costumer_detail->no_telp ?>" placeholder="08*******" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto Lokasi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="file-input" name="foto" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                                <input type="text" class="form-control" name="costumer_delete_foto" value="<?= $get_costumer_detail->foto ?>" readonly hidden>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('admin/costumer/'); ?>" class=" btn btn-dark"> Back</a>
                            <button type="submit" class="btn btn-info  float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                        <h6 class="m-0 font-weight-bold text-primary">Peta Lokasi</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample1">
                        <div class="card-body">
                            <?php echo $map['html'] ?>
                            <div class="col-sm-12">
                            </div>
                        </div>
                    </div>
                </div>
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
    <script>
        document.getElementById('jenis_tvkabel').value = <?= $get_costumer_detail->jenis_tvkabel; ?>;
    </script>