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
            <th>Username</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($list as $item) : ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $item->username; ?></td>
              <td><?php echo $item->email; ?></td>
              <td><?php echo $item->address; ?></td>
              <td><a href="<?php echo base_url('detailAccount/'.$item->id);?>">Detail</a></td>
            </tr>
            <?php $i++; endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Username</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
