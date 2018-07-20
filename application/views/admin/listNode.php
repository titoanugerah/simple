<div class="box">
  <div class="box-header">
    <h3 class="box-title">Rekap Akun Pelanggan<h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>ID Node</th>
            <th>Nama Perangkat</th>
            <th>Nama Pelanggan</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($list as $item) : ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo "NODE".$item->id; ?></td>
              <td><?php echo $item->node_name; ?></td>
              <td><?php echo $item->fullname; ?></td>
              <td><?php if($item->status==1){ echo "Aktif";} else { echo "Nonaktif";} ?></td>
              <td><a href="<?php echo base_url('detailNode/'.$item->id);?>">Detail</a></td>
            </tr>
            <?php $i++; endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>ID Node</th>
              <th>Nama Perangkat</th>
              <th>Nama Pelanggan</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
