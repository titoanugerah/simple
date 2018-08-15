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
            <th>Nama Pelanggan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($list as $item) : ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><a href="<?php echo base_url('detailNode/'.$item->id);?>"><?php echo 'NODE'.$item->id; ?></a></td>
              <td><?php echo $item->fullname; ?></td>
              <td><?php if($item->status==1){ echo "Aktif";} else { echo "Nonaktif";} ?></td>
            </tr>
            <?php $i++; endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>ID Node</th>
              <th>Nama Pelanggan</th>
              <th>Status</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
