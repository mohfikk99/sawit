<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-tree"></i>
    </div>
    <div class="sidebar-brand-text mx-3"><?= $_SESSION['level']; ?></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url('admin'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Data Akses</span></a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/harga_sawit'); ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Harga Sawit</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/kelompok'); ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Nama Kelompok</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/total_timbangan_harga'); ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Total Timbangan Harga</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->