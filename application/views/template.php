<?php
  if ($this->session->userdata['login']==false) {
  redirect(base_url('login'));
} ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPLE | <?php echo $this->session->userdata['privileges']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/datepicker/datepicker3.css'); ?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/iCheck/all.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/datatables/dataTables.bootstrap.css');?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/datepicker/datepicker3.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/iCheck/flat/blue.css'); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/morris/morris.css'); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/fullcalendar/fullcalendar.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('./assets/plugins/fullcalendar/fullcalendar.print.css'); ?>" media="print">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
  #container {
    min-width: 310px;
    max-width: 800px;
    height: 400px;
    margin: 0 auto
  }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url($this->session->userdata['privileges'].'Dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIM</b>PLE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- coming soon
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-flat">*</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>

                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
        -->
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata['fullname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo "@".$this->session->userdata['username']." - ".$this->session->userdata['privileges']; ?>
                  <small>Logged In</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>

          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('./assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata['fullname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata['privileges']; ?></a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Dashboard</li>
        <li>
          <a href="<?php echo base_url($this->session->userdata['privileges'].'Dashboard'); ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
      </ul>

      <?php $this->load->view($this->session->userdata['privileges'].'/menu'); ?>
  </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
    <?php $this->load->view('notification/'.$notification); ?>
    </section>
    <section class="content">
      <?php $this->load->view($view_name); ?>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.2
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://polines.ac.id/">Politeknik Negeri Semarang</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('./assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('./assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--select2-->
<script src="<?php echo base_url('./assets/plugins/select2/select2.full.min.js'); ?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('./assets/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('./assets/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('./assets/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>

<!-- jQuery UI 1.11.4 -->
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url('./assets/plugins/morris/morris.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('./assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('./assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('./assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('./assets/plugins/knob/jquery.knob.js'); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('./assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>


<!-- SlimScroll -->
<script src="<?php echo base_url('./assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('./assets/plugins/fastclick/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('./assets/dist/js/app.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('./assets/dist/js/demo.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('./assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('./assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('./assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('./assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('./assets/plugins/fullcalendar/fullcalendar.min.js'); ?>"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
        });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>

<script src="<?php echo base_url('./assets/high')?>/code/highcharts.js"></script>
<script src="<?php echo base_url('./assets/high')?>/code/modules/series-label.js"></script>
<script src="<?php echo base_url('./assets/high')?>/code/modules/exporting.js"></script>
<script src="<?php echo base_url('./assets/high')?>/code/modules/export-data.js"></script>


<script type="text/javascript">
 Highcharts.chart('container', {
	 title: {
		 text: 'Grafik Monitoring Suhu'
	 },
	 subtitle: {
		 text: 'Sumber: Node <?php echo $detail->node_name; ?>'
	 },
	 yAxis: {
		 title: {
			 text: 'Suhu dalam celcius'
		 }
	 },
	 legend: {
		 layout: 'vertical',
		 align: 'right',
		 verticalAlign: 'middle'
	 },
   xAxis: {
        categories: [<?php foreach ($listPH as $item): ?>
          <?php  echo '"'.$item->record_time.'",'; ?>
        <?php endforeach; ?>]
    },
	 series: [{
		 name: 'Suhu',
		 data: [<?php foreach ($listTemp as $item): ?>
       <?php echo $item->temp.","; ?>
     <?php endforeach; ?>]
	 },{
		 name: 'Batas Minimum',
		 data: [<?php foreach ($listTemp as $item): ?>
       <?php echo "25".","; ?>
     <?php endforeach; ?>]
	 },{
		 name: 'Batas Maksimum',
		 data: [<?php foreach ($listTemp as $item): ?>
       <?php echo "30".","; ?>
     <?php endforeach; ?>]
	 }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
	});
		</script>

    <script type="text/javascript">
     Highcharts.chart('container1', {
    	 title: {
    		 text: 'Grafik Monitoring PH'
    	 },
    	 subtitle: {
    		 text: 'Sumber: Node <?php echo $detail->node_name; ?>'
    	 },
    	 yAxis: {
    		 title: {
    			 text: 'pH'
    		 }
    	 },
    	 legend: {
    		 layout: 'vertical',
    		 align: 'right',
    		 verticalAlign: 'middle'
    	 },
       xAxis: {
            categories: [<?php foreach ($listPH as $item): ?>
              <?php  echo '"'.$item->record_time.'",'; ?>
            <?php endforeach; ?>]
        },
    	 series: [{
    		 name: 'PH',
    		 data: [<?php foreach ($listPH as $item): ?>
           <?php echo $item->ph.","; ?>
         <?php endforeach; ?>]
    	 },{
    		 name: 'Batas Minimum',
    		 data: [<?php foreach ($listPH as $item): ?>
           <?php echo "6.5".","; ?>
         <?php endforeach; ?>]
    	 },{
    		 name: 'Batas Maksimum',
    		 data: [<?php foreach ($listPH as $item): ?>
           <?php echo "10".","; ?>
         <?php endforeach; ?>]
    	 }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    	});
    		</script>

<script>
  $(function () {
    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#datepicker').datepicker({
      autoclose: true
    });
    $('#datepicker1').datepicker({
      autoclose: true
    });
  });
</script>

</body>
</html>
