 <?php echo $map['js']; ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
         <a href="<?= base_url('petugas/aksi_petugas/cetak_laporan')?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
     </div>

     <!-- Content Row -->
     <div class="row">

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Costumer</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_costumer ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-calendar fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Pelanggan Basic</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $basic ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-tv fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggan Medium</div>
                             <div class="row no-gutters align-items-center">
                                 <div class="col-auto">
                                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $medium ?></div>
                                 </div>
                                 <div class="col">
                                     <div class="progress progress-sm mr-2">
                                         <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-tv fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-warning shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pelanggan Advanced</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $advanced ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-tv fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-8 col-lg-7">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Persebaran Pelanggan</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <?php echo $map['html'] ?>
                 </div>
             </div>
         </div>
         <div class="col-xl-4 col-lg-5">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Jenis Berlanggan</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="chart-pie pt-4 pb-2">
                         <canvas id="myPieChart"></canvas>
                     </div>
                     <div class="mt-4 text-center small">
                         <span class="mr-2">
                             <i class="fas fa-circle text-primary"></i> Costumer
                         </span>
                         <span class="mr-2">
                             <i class="fas fa-circle text-success"></i> Basic
                         </span>
                         <span class="mr-2">
                             <i class="fas fa-circle text-info"></i> Medium
                         </span>
                         <span class="mr-2">
                             <i class="fas fa-circle text-warning"></i> Advanced
                         </span>
                     </div>
                 </div>
             </div>
             </.>
         </div>
         <div class="col-xl-7 col-lg-7">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Log User</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="card-body table-responsive p-0" style="height: 300px;">
                         <table class="table table-head-fixed text-nowrap">
                             <thead>
                                 <tr>
                                     <th>Tanggal</th>
                                     <th>Tipe</th>
                                     <th>Deskripsi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $i = 0;
                                    foreach ($get_aktivitas_user as $user) {
                                        $i++;
                                    ?>
                                     <tr>
                                         <td><?= tgl_jam_indo($user->log_time) ?></td>
                                         <td class="m-0 font-weight-bold text-primary"><?= aktivitas($user->log_tipe) ?></td>
                                         <td><?= $user->log_desc ?></td>
                                     </tr>
                                 <?php } ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-xl-5 col-lg-5">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Jenis Berlangganan</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <!-- /.card-header -->
                     <div class="card-body table-responsive p-0" style="height: 300px;">
                         <table class="table table-head-fixed text-nowrap" style="color: darkblue;">
                             <thead>
                                 <tr>
                                     <th>Nama</th>
                                     <th>Deskripsi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $i = 0;
                                    foreach ($get_jenisBerlangganan as $tv) {
                                        $i++;
                                    ?>
                                     <tr>
                                         <td><?= $tv->jenis ?></td>
                                         <td><?= $tv->deskripsi ?></td>
                                     </tr>
                                 <?php } ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <!-- Pie Chart -->

             </div>
             <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->
         <script src="<?= base_url(); ?>assets/sb_admin/vendor/chart.js/Chart.min.js"></script>

         <!-- Page level custom scripts -->
         <script>
             // Pie Chart Example
             var ctx = document.getElementById("myPieChart");
             var myPieChart = new Chart(ctx, {
                 type: 'doughnut',
                 data: {
                     labels: ["Costumer", "Berlangganan Basic", "Berlangganan Medium", "Berlangganan Advanced"],
                     datasets: [{
                         data: [
                             <?= $total_costumer ?>, <?= $basic ?>, <?= $medium ?>, <?= $advanced ?>
                         ],
                         backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                         hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#c49929'],
                         hoverBorderColor: "rgba(234, 236, 244, 1)",
                     }],
                 },
                 options: {
                     maintainAspectRatio: false,
                     tooltips: {
                         backgroundColor: "rgb(255,255,255)",
                         bodyFontColor: "#858796",
                         borderColor: '#dddfeb',
                         borderWidth: 1,
                         xPadding: 15,
                         yPadding: 15,
                         displayColors: false,
                         caretPadding: 10,
                     },
                     legend: {
                         display: false
                     },
                     cutoutPercentage: 80,
                 },
             });
         </script>