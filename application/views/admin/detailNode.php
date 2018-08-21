<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg.png'); ?>" alt="User profile picture">
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
        <li class="active"><a href="#editProfile" data-toggle="tab">Edit Node</a></li>
        <li class=""><a href="#listTemp" data-toggle="tab">Data Suhu</a></li>
        <li class=""><a href="#listPH" data-toggle="tab">Data PH</a></li>
        <li class=""><a href="#downloadReport" data-toggle="tab">Unduh Data</a></li>
      </ul>
      <div class="tab-content">
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
                <input type="text" class="form-control" placeholder="Letak Perangkat" name="address" id="address" value="<?php echo $detail->node_address; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
                <select class="form-control" name="status">
                  <option value="1" <?php if ($detail->status==1){ echo "selected";} ?>>Aktif</option>
                  <option value="0" <?php if ($detail->status==0){ echo "selected";} ?>>Nonaktif</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" name="updateNode" value="updateNode">Simpan Data</button>
                <button type="submit" class="btn btn-danger" name="deleteNode" value="deleteNode">Hapus Node</button>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="listTemp">
          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
                  <?php $i=1; $bad=false; foreach ($listTemp as $item) : ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $item->record_time; ?></td>
                      <td><?php echo $item->temp." c"; ?></td>
                      <td><?php if ($item->temp >= 25 && $item->temp <= 30) { echo "Baik";} else { echo " Buruk"; $bad = true; }?></td>
                    </tr>
                    <?php $i++; endforeach; if ($bad==true) {$this->load->view('notification/badRecord');}?>

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
              <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal dan Waktu</th>
                      <th>pH</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; $bad=false; foreach ($listPH as $item) : ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $item->record_time; ?></td>
                        <td><?php echo $item->ph; ?></td>
                        <td><?php if ($item->ph >= 6.5 && $item->ph <= 8) { echo "Baik";} else { echo " Buruk";$bad=true;}?></td>

                      </tr>
                      <?php $i++; endforeach; if ($bad==true) {$this->load->view('notification/badRecord');}?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Tanggal dan Waktu</th>
                        <th>pH</th>
                        <th>Status</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
            <div class="tab-pane" id="downloadReport">
              <div class="box-body">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#byDate" data-toggle="tab">Per Hari</a></li>
                    <li class=""><a href="#custom" data-toggle="tab">Lainnya</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="byDate">
                      <form class="form-horizontal" method="post">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Data</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="data">
                              <option value="ph">pH</option>
                              <option value="temp">Suhu</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Tanggal</label>
                          <div class="col-sm-10">
                            <input type="text" name="date" class="form-control pull-right" id="datepicker">

                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success" name="downloadData" value="downloadData">Unduh Data</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane" id="custom">
                      <form class="form-horizontal" method="post">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Data</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="data">
                              <option value="ph">pH</option>
                              <option value="temp">Suhu</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Tahun</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="year">
                              <option value=""></option>
                              <?php $a=0; foreach ($download as $item): ?>
                                <?php if ($a != $item->year): ?>
                                  <option value="<?php echo $item->year; ?>"><?php echo $item->year; $a=$item->year; ?></option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Bulan</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="month">
                              <option value=""></option>
                              <?php $a=0; foreach ($download as $item): ?>
                                <?php if ($a != $item->month): ?>
                                  <option value="<?php echo $item->month; ?>"><?php echo $item->monthName; $a=$item->month; ?></option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Minggu</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="week">
                              <option value=""></option>
                              <?php $a=0; foreach ($download as $item): ?>
                                <?php if ($a != $item->week): ?>
                                  <option value="<?php echo $item->week; ?>"><?php echo $item->week; $a=$item->week; ?></option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success" name="downloadData" value="downloadData">Unduh Data</button>
                          </div>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <script type="text/javascript">

      function play()
   {
       var embed = document.createElement('object');

       embed.setAttribute('src', 'c:\\test.wav');
       embed.setAttribute('hidden', true);
       embed.setAttribute('autostart', true);
       embed.setAttribute('enablejavascript', true);

       document.childNodes[0].appendChild(embed);

   }

  // -->
  </script>
