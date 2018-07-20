<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo "NODE".$detail->id; ?></h3>

        <p class="text-muted text-center"><?php echo $detail->node_name; ?></p>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tentang</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-user margin-r-5"></i> Nama Panjang</strong>

        <p class="text-muted">
          <?php echo $detail->fullname ?>
        </p>

        <hr>

        <strong><i class="fa fa-envelope margin-r-5"></i>E-mail</strong>

        <p class="text-muted"><?php echo $detail->email; ?></p>

        <hr>

        <strong><i class="fa fa-phone-square margin-r-5"></i>Nomor Telepon</strong>

        <p class="text-muted"><?php  echo $detail->phone_number; ?></p>

        <hr>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#editProfile" data-toggle="tab">Edit Akun</a></li>
        <li class=""><a href="#listTemp" data-toggle="tab">Data Suhu</a></li>
        <li class=""><a href="#listPH" data-toggle="tab">Data PH</a></li>
      </ul>
      <div class="tab-content">
        <!-- /.tab-pane -->

        <!-- /.tab-pane -->

        <div class="active tab-pane" id="editProfile">
          <form class="form-horizontal" method="post">

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Perangkat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nama Perangkat" name="node_name" value="<?php echo $detail->node_name; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Letak Perangkat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Letak Perangkat" name="address" value="<?php echo $detail->node_address; ?>" disabled>
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
              <select class="form-control" name="status" disabled>
                <option value="1" <?php if ($detail->status==1){ echo "selected";} ?>>Aktif</option>
                <option value="0" <?php if ($detail->status==0){ echo "selected";} ?>>Nonaktif</option>
              </select>
            </div>
          </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" name="updateNode" value="updateNode">Simpan Data</button>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="listTemp">

            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal dan Waktu</th>
                    <th>Temperatur</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($listTemp as $item) : ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $item->record_time; ?></td>
                      <td><?php echo $item->temp." c"; ?></td>
                      <td><?php if ($item->temp >= 25 && $item->temp <= 30) { echo "Baik";} else { echo " Buruk";}?></td>

                    </tr>
                    <?php $i++; endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal dan Waktu</th>
                      <th>Temperatur</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <div class="tab-pane" id="listPH">
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal dan Waktu</th>
                      <th>Temperatur</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($listPH as $item) : ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $item->record_time; ?></td>
                        <td><?php echo $item->ph; ?></td>
                        <td><?php if ($item->ph >= 6.5 && $item->ph <= 8) { echo "Baik";} else { echo " Buruk";}?></td>

                      </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Tanggal dan Waktu</th>
                        <th>Temperatur</th>
                        <th>Status</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
            </div>

        </div>

        <!-- /.tab-pane -->

      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
