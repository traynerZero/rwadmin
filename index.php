<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RW Admin</title>
  <link rel="shortcut icon" type="image/png" href="favicon.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="plugins/pace/pace.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Pre loader css -->
  <link rel="stylesheet" href="dist/css/preload.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo dash">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>W</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RW</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/rwfont.png" alt="User Image">
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview dash">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="rates"><a href="#"><i class="fa fa-circle-o"></i> Rates</a></li>
            <li id="deduct"><a href="#"><i class="fa fa-circle-o"></i> Deductions</a></li>
            <li id="member"><a href="#"><i class="fa fa-circle-o"></i> Member Type</a></li>
            <li id="area"><a href="#"><i class="fa fa-circle-o"></i> Area</a></li>
            <li id="terminal"><a href="#"><i class="fa fa-circle-o"></i> Terminal</a></li>
            <li id="user"><a href="#"><i class="fa fa-circle-o"></i> Users</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="index.php">
            <i class="fa fa-file-text"></i> <span>Reports</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="body-loader">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper display-content" style="display: none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="pad margin no-print">
      <div class="callout callout-info" id="title" style="margin-bottom: 0!important;">
        <h4>
        Dashboard
        </h4>
      <small>Control panel</small>
      </div>
      </div>
    </section>
    
    <section id="content" class="content">
      <?php include "maintenance/dashboard.php"; ?>
    </section>
    <!-- /.content -->
  </div>

  <div class="container-loader preload">
  <div class="item-1"></div>
  <div class="item-2"></div>
  <div class="item-3"></div>
  <div class="item-4"></div>
  <div class="item-5"></div>
</div>

</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong> <a href="http://www.ipark.ph">Tekno Logika Pilipinas Inc. </a></strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="bower_components/PACE/pace.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
  $(document).ajaxStart(function() { Pace.restart(); });

  $(document).ready(function(){
    var timeout = 800;

  setTimeout(function(){
             $('.container-loader').css('display','none');

             $('.display-content').show('blind');
    },timeout);
         


    $('#user').on('click',function(){
        $('#content').html("");

        $('.container-loader').show();

        $('.display-content').hide();

        $('#content').load("maintenance/users.php",function(){
          setTimeout(function(){
             $('.container-loader').css('display','none');

             $('.display-content').show('blind');
          },timeout);
         
        });

        $('#title').html("<h4>User</h4> <small>Add,Edit and Delete Users in this page</small>");
        sessionStorage.setItem("url","user");
    });

    $('#deduct').on('click',function(){
        $('#content').html("");

        $('.container-loader').show();

        $('.display-content').hide();

        $('#content').load("maintenance/deduct.php",function(){
          setTimeout(function(){
             $('.container-loader').css('display','none');

             $('.display-content').show('blind');
          },timeout);
         
        });

        $('#title').html("<h4>Deductions</h4> <small>Add,Edit and Delete Discounts/Vouchers in this page</small>");
        sessionStorage.setItem("url","deduct");
    });

    $('#area').on('click',function(){
        $('#content').html("");

        $('.container-loader').show();

        $('.display-content').hide();

        $('#content').load("maintenance/area.php",function(){
          setTimeout(function(){
             $('.container-loader').css('display','none');

             $('.display-content').show('blind');
          },timeout);
         
        });

        $('#title').html("<h4>Area</h4> <small>Add,Edit and Delete Area in this page</small>");
        sessionStorage.setItem("url","area");
    });

    $('#terminal').on('click',function(){
        $('#content').html("");

        $('.container-loader').show();

        $('.display-content').hide();

        $('#content').load("maintenance/terminal.php",function(){
          setTimeout(function(){
             $('.container-loader').css('display','none');

             $('.display-content').show('blind');
          },timeout);
         
        });

        $('#title').html("<h4>Terminal</h4> <small>Add,Edit and Delete Terminals in this page</small>");
        sessionStorage.setItem("url","terminal");
    });

    $('#member').on('click',function(){
        $('#content').html("");

        $('.container-loader').show();

        $('.display-content').hide();

        $('#content').load("maintenance/member.php",function(){
          setTimeout(function(){
             $('.container-loader').css('display','none');

             $('.display-content').show('blind');
          },timeout);
         
        });

        $('#title').html("<h4>Member</h4> <small>Add,Edit and Delete Member types in this page</small>");
        sessionStorage.setItem("url","member");
    });

    $('#rates').on('click',function(){
        $('#content').html("");

        $('.container-loader').show();

        $('.display-content').hide();

        $('#content').load("maintenance/rates.php",function(){
          setTimeout(function(){
             $('.container-loader').css('display','none');

             $('.display-content').show('blind');
          },timeout);
         
        });

        $('#title').html("<h4>Rates</h4> <small>Add,Edit and Delete Rates in this page</small>");
        sessionStorage.setItem("url","rates");
    });

    $('.dash').on('click',function(){
        $('#content').html("");

        $('.container-loader').show();

        $('.display-content').hide();

        $('#content').load("maintenance/dashboard.php",function(){
          setTimeout(function(){
             $('.container-loader').css('display','none');

             $('.display-content').show('blind');
          },timeout);
         
        });

        $('#title').html("<h4>Dashboard</h4> <small>Control panel</small>");
        sessionStorage.setItem("url","dashboard");
    });
    
    if (typeof(Storage) !== "undefined") {
    // Store
    // Retrieve
    if(sessionStorage.getItem("url") != null){
      //check last page ajax
      var url = sessionStorage.getItem("url");
      if(url == 'user')
        {
          $('#user').click();
        }
        else if(url == 'area')
        {
          $('#area').click();
        }
        else if(url == 'rates')
        {
          $('#rates').click();
        }
        else if(url == 'terminal')
        {
          $('#terminal').click();
        }
        else if(url == 'member')
        {
          $('#member').click();
        }
        else if(url == 'deduct')
        {
          $('#deduct').click();
        }
        else if(url == 'dashboard')
        {
          $('.dash').click();
        }

        //end check last page ajax

    }

    } else {
        alert("Sorry, your browser does not support Web Storage... some function might not work.");
    }



  });
</script>
<!-- Bootstrap 3.3.7 -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->

<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
