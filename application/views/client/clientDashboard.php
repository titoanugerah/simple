<!-- Default box -->
<div class="row">

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php $phval = 0; foreach ($phInfo as $item) {
          $phval = $phval + $item->warning;
        } echo $phval; ?></h3>
        <p>Peringatan PH</p>
      </div>
      <div class="icon">
        <i class="fa fa-magic"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php $phval = 0; foreach ($phInfo as $item) {
          $phval = $phval + $item->danger;
        } echo $phval; ?></h3>
        <p>Darurat PH </p>
      </div>
      <div class="icon">
        <i class="fa fa-magic"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php $tempval = 0; foreach ($tempInfo as $item) {
          $tempval = $tempval + $item->warning;
        } echo $tempval; ?></h3>
        <p>Peringatan Suhu</p>
      </div>
      <div class="icon">
        <i class="fa fa-eyedropper"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php $tempval = 0; foreach ($tempInfo as $item) {
          $tempval = $tempval + $item->danger;
        } echo $tempval; ?></h3>
        <p>Darurat Suhu</p>
      </div>
      <div class="icon">
        <i class="fa fa-eyedropper"></i>
      </div>
    </div>
  </div>

  <!-- ./col -->
</div>

<div class="row">
  <div class="col-lg-6 col-xs-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Rekaman Peringatan PH<h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Perangkat</th>
                <th>Waktu</th>
                <th>Ph</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($phWarningTable as $item) : ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $item->node_name; ?></td>
                  <td><?php echo $item->record_time; ?></td>
                  <td><?php echo $item->ph; ?></td>
                </tr>
                <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Perangkat</th>
                  <th>Waktu</th>
                  <th>Ph</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
  </div>
  <div class="col-lg-6 col-xs-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Rekaman Peringatan Suhu<h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Perangkat</th>
                <th>Waktu</th>
                <th>Temp</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($tempWarningTable as $item) : ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $item->node_name; ?></td>
                  <td><?php echo $item->record_time; ?></td>
                  <td><?php echo $item->temp; ?></td>
                </tr>
                <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Perangkat</th>
                  <th>Waktu</th>
                  <th>Ph</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-xs-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Rekaman Peringatan PH<h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Perangkat</th>
                <th>Waktu</th>
                <th>Ph</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($phDangerTable as $item) : ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $item->node_name; ?></td>
                  <td><?php echo $item->record_time; ?></td>
                  <td><?php echo $item->ph; ?></td>
                </tr>
                <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Perangkat</th>
                  <th>Waktu</th>
                  <th>Ph</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
  </div>
  <div class="col-lg-6 col-xs-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Rekaman Peringatan Suhu<h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example4" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Perangkat</th>
                <th>Waktu</th>
                <th>Temp</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($tempDangerTable as $item) : ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $item->node_name; ?></td>
                  <td><?php echo $item->record_time; ?></td>
                  <td><?php echo $item->temp; ?></td>
                </tr>
                <?php $i++; endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Perangkat</th>
                  <th>Waktu</th>
                  <th>Ph</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
  </div>
</div>
