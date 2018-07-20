<ul class="sidebar-menu">
  <li class="header">Administrasi</li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-group"></i>
      <span>Pelanggan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url('createAccount'); ?>"><i class="fa fa-plus"></i>Tambah Pelanggan</a></li>
      <li><a href="<?php echo base_url('listAccount'); ?>"><i class="fa fa-user"></i> Rekap Pelanggan</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-cubes"></i>
      <span>Perangkat</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url('createNode'); ?>"><i class="fa fa-plus"></i> Tambah Perangkat</a></li>
      <li><a href="<?php echo base_url('listNode'); ?>"><i class="fa fa-cube"></i>List Perangkat</a></li>
    </ul>
  </li>
</ul>
