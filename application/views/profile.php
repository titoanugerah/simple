<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo "@".$this->session->userdata['username']; ?></h3>

        <p class="text-muted text-center"><?php echo $this->session->userdata['fullname']; ?></p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Address</b> <a class="pull-right"><?php echo $this->session->userdata['address']; ?></a>
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
          <?php echo $this->session->userdata['fullname'] ?>
        </p>

        <hr>

        <strong><i class="fa fa-envelope margin-r-5"></i>E-mail</strong>

        <p class="text-muted"><?php  if($this->session->userdata['email']==''){echo "Belum terisi";} else {echo $this->session->userdata['email'];} ?></p>

        <hr>

        <strong><i class="fa fa-phone-square margin-r-5"></i>Nomor Telepon</strong>

        <p class="text-muted"><?php  echo $this->session->userdata['phone_number']; ?></p>

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
      </ul>
      <div class="tab-content">
        <!-- /.tab-pane -->

        <!-- /.tab-pane -->

        <div class="active tab-pane" id="editProfile">
          <form class="form-horizontal" method="post">

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan username" name="username" value="<?php echo $this->session->userdata['username']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Masukan password" name="password" value="">
              </div>
            </div>


            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Panjang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masukan nama panjang" name="fullname" value="<?php echo $this->session->userdata['fullname']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $this->session->userdata['email']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">No. HP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nomor HP" name="phone_number" value="<?php echo $this->session->userdata['phone_number']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Alamat" name="address" value="<?php echo $this->session->userdata['address']; ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" name="updateProfile" value="updateProfile">Simpan Data</button>
                <button type="submit" class="btn btn-info" name="updatePassword" value="updatePassword">Perbaharui password</button>
              </div>
            </div>
          </form>
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
