<?php if ($this->session->userdata('id_role') == 1) { ?>
  <!-- ////////////////////////////////// -->
  <!--///////// Sidebar Admin ///////////-->
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard/') ?>">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Short Path <sup>GIS</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('admin/dashboard/') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Masterdata</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Lokasi :</h6>
              <a class="collapse-item" href="<?= base_url('admin/costumer/'); ?>">Lokasi Costumer</a>
              <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess" aria-expanded="true" aria-controls="collapseUtilitiess">
            <i class="fas fa-fw fa-users"></i>
            <span>Pengguna</span>
          </a>
          <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Daftar Pengguna:</h6>
              <a class="collapse-item" href="<?= base_url('admin/admin') ?>">Administrator</a>
              <a class="collapse-item" href="<?= base_url('admin/petugas') ?>">Petugas</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengaturan</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Pengaturan:</h6>
              <a class="collapse-item" href="<?= base_url('admin/admin/view/' . $this->session->userdata('id_user')); ?>">View Profile</a>
              <a class="collapse-item" href="<?= base_url('admin/dashboard/pengaturan/') ?>">Pengaturan Website</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-power-off"></i>
            <span>Log Out</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->
    <?php } else { ?>

      <!-- ////////////////////////////////// -->
      <!--///////// Sidebar Petugas ///////////-->

      <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

          <!-- Sidebar -->
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('petugas/aksi_petugas') ?>">
              <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
              </div>
              <div class="sidebar-brand-text mx-3">Short Path <sup>GIS</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('petugas/aksi_petugas/') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Masterdata</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Lokasi :</h6>
                  <a class="collapse-item" href="<?= base_url('petugas/aksi_petugas/view_costumer/'); ?>">Lokasi Costumer</a>
                  <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess" aria-expanded="true" aria-controls="collapseUtilitiess">
                <i class="fas fa-fw fa-users"></i>
                <span>Pengguna</span>
              </a>
              <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Daftar Pengguna:</h6>
                  <a class="collapse-item" href="<?= base_url('petugas/aksi_petugas/view_petugas/') ?>">Petugas</a>
                </div>
              </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Pengaturan</span>
              </a>
              <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Pengaturan:</h6>
                  <a class="collapse-item" href="<?= base_url('petugas/aksi_petugas/view_profile/' . $this->session->userdata('id_user')); ?>">View Profile</a>
                </div>
              </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-power-off"></i>
                <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          </ul>
          <!-- End of Sidebar -->

        <?php } ?>