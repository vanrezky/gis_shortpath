    <!-- Script Pemanggilan GMap -->
    <script type="text/javascript">
        var centreGot = false;
    </script>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/costumer/save') ?>">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                        </div>
                        <div class="card-body">
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group">
                                <label>Kode Costumer</label>
                                <input type="text" class="form-control" name="id_costumer" value="<?= $buat_id ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label>Jenis TV Kabel Costumer</label>
                                <select class="form-control" style="width: 100%;" name="jenis_tvkabel">
                                    <option disabled selected="selected">Pilih Jenis TV Kabel Costumer</option>

                                    <?php
                                    foreach ($get_jenis as $data) {
                                        echo "<option value='" . $data->id . "'>" . $data->jenis . "</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Costumer</label>
                                <input type="text" class="form-control" name="nama_costumer" placeholder="Masukkan Nama Costumer.." required>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" name="latitude" placeholder="Geser Kursor Map.." id="lat" value="<?php echo set_value('latitude') ?>" readonly required>
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" name="longitude" placeholder="Geser Kursor Map.." id="long" value="<?php echo set_value('longitude') ?>" readonly required>
                            </div>
                            <div class="form-group">
                                <label>ALamat Lengkap</label>
                                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap.." required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" class="form-control" name="no_telp" placeholder="08*******" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto Lokasi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="file-input" name="foto" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('admin/costumer/'); ?>" class=" btn btn-dark"> Back</a>
                            <button type="submit" class="btn btn-info  float-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <?php echo $map['html'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>