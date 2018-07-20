<ul class="sidebar-menu">
  <li class="header">Layanan Monitoring</li>
  <?php foreach ($menu as $item): ?>
    <li><a href="<?php echo base_url('detailNodeClient/'.$item->id); ?>"><i class="fa fa-cube"></i>Node <?php echo $item->node_name; ?></a></li>

  <?php endforeach; ?>

</ul>
