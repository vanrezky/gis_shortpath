        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data TV Kabel</h1>
            <p class="mb-4">Berikut adalah data TV kabel yang ada di kota Pekanbaru</a>.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="float-right">
                        <a href="<?= base_url('admin/costumer/add/') ?>" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add Record</span>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>TV Kabel</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>TV Kabel</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($get_all_costumer as $tv) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $tv->id_costumer; ?></td>
                                        <td><?= $tv->nama_costumer; ?></td>
                                        <td><?= $tv->jenis; ?></td>
                                        <td><?= $tv->alamat; ?></td>
                                        <td><span class="badge badge-primary"><?= $tv->no_telp; ?></span></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php echo base_url('admin/costumer/view/' . $tv->id_costumer); ?>" class="btn btn-success"><i class="fas fa-eye" title="View"></i></a>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?php echo base_url('admin/costumer/edit/' . $tv->id_costumer); ?>" class="btn btn-warning"><i class="fas fa-pencil-alt" title="Edit"></i></a>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="<?php echo base_url('admin/costumer/delete/' . $tv->id_costumer); ?>" class="btn btn-danger" onClick="return confirm('Anda yakin..???');"><i class="fas fa-trash" title="Delete"></i></a>
                                                    </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>