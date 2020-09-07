    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data <?= $title ?></h1>
        <p class="mb-4">Berikut adalah <?= $title ?></a>.</p>
        <?php echo $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/dashboard/update_pengaturan/' . $get_pengaturan->id) ?>">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Website</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Website</label>
                                <input type="text" class="form-control" name="nama_website" value="<?= $get_pengaturan->nama_website ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Website</label>
                                <textarea < class="form-control" name="deskripsi" required rows="4"><?= $get_pengaturan->deskripsi ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Zoom Peta</label>
                                <input type="text" class="form-control" name="zoom" value="<?= $get_pengaturan->zoom ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo Website</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="file-input" name="logo" class="form-control-file">
                                        <input type="text" name="logo_delete_foto" value="<?= $get_pengaturan->logo ?>" hidden readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <img class="img-fluid" src="<?= base_url('assets/img/' . $get_pengaturan->logo) ?>" alt="Logo Website">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info  float-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>