<!DOCTYPE html>
<html>
<!-- Isinya head itu kayak font, logo ato fitur apa aja yang dipake-->
<head>
  <!--encodingnya pake utf-8, jadi kalo didunia komputer, sebelom jadi huruf itu masih dalam berbentuk sandi, nah encoding ini berfungsi untuk merubah sandi itu jadi huruf yang bisa dibaca, kebetulan tamplate ini make nya utf-8 -->
  <meta charset="utf-8">
  <!-- ini buat ngatur logo-->
  <link rel="icon"  href="<?php echo base_url() ?>assets/dist/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- ini buat ngatur nama yang ada di tab itu lho-->
  <title> SIMPLE </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">
</head>
<!-- body ini yang buat ngatur tampilan yang biasa kita lihat-->
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- disini kita buat logo dari tulisan gituu-->
    <a><b>SIM</b>PLE</a> <br>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- p itu artinya paragraf, yang mana nanti kita akan menampilkan paragraf silahkan blablablablablabala-->
    <p class="login-box-msg">Silahkan login dengan memasukan username dan password anda</p>
    <!-- form itu buat membuat suatu form (kotakan), nah nanti kalo di-->
    <form action="" method="post">
      <!-- daerah khusus bikin kotakan buat username-->
      <div class="form-group has-feedback">
        <!-- bikin kotakan username -->
        <input type="type" class="form-control" placeholder="Username" name="username">
        <!-- bikin logo user di sebelah kanan kotakan username-->
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <!-- bikin kotakan password -->
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">

          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <!-- bikin button login -->
          <button type="submit" class="btn btn-primary btn-block btn-flat" value="loginValidation" name="loginValidation">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
$(function () {
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
  });
});
</script>
</html>
