<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg.png'); ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo "@".$detail->username; ?></h3>

        <p class="text-muted text-center"><?php echo $detail->fullname; ?></p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Address</b> <a class="pull-right"><?php echo $detail->address; ?></a>
          </li>
        </ul>

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
        <li class=""><a href="#listNode" data-toggle="tab">Perangkat Terpasang</a></li>
        <li class=""><a href="#createNode" data-toggle="tab">Tambahkan Perangkat</a></li>
      </ul>
      <div class="tab-content">
        <!-- /.tab-pane -->

        <!-- /.tab-pane -->

        <div class="active tab-pane" id="editProfile">
          <form class="form-horizontal" method="post">

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan username" name="username" value="<?php echo $detail->username; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Dirahasiakan" name="password" value="">
              </div>
            </div>


            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Panjang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan nama panjang" name="fullname" value="<?php echo $detail->fullname; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $detail->email; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">No. HP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nomor HP" name="phone_number" value="<?php echo $detail->phone_number; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Alamat" name="address" value="<?php echo $detail->address; ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" name="updateAccount" value="updateAccount">Simpan Data</button>
                <button type="submit" class="btn btn-info" name="updatePassword" value="updatePassword">Perbaharui password</button>
                <button type="submit" class="btn btn-danger" name="deleteAccount" value="deleteAccount">Hapus Pelanggan</button>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="listNode">

            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>ID Node</th>
                    <th>Nama Perangkat</th>
                    <th>Letak Perangkat</th>
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
                      <td><?php echo $item->node_address; ?></td>
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
                      <th>Letak Perangkat</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <div class="tab-pane" id="createNode">
              <form class="form-horizontal" method="post">
                <?php $this->load->view('notification/createNode'); ?>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Nama Perangkat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukan nama perangkat" name="node_name" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Alamat Perangkat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukan alamat perangkat" name="address" value="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" name="createNode" value="createNode">Tambah Perangkat Baru</button>
                  </div>
                </div>

              </form>
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
