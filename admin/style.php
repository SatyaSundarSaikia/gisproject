<?php 
include('database/config.php');
include('session.php');
?>
<?php
$sql18="SELECT * FROM master WHERE id='1'";
$test18 = mysqli_query($db, $sql18);
$r18 = mysqli_fetch_array($test18);
$id=$r18['id'];
$company=$r18['company'];
?>
<?php
  $sql="SELECT * FROM admin WHERE username='$user_admin'";
  $test = mysqli_query($db, $sql);
  $a= mysqli_fetch_array($test);
  $id=$a['id'];
  ?> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link href="images/favicon/<?php echo $r18['favicon'];?>" rel="shortcut icon" type="image/png">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
 <!--<link rel="stylesheet" href="assets/lightbox/lightbox.min.css">-->
 <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
            padding-bottom: 60px; /* Adjust this value based on your footer's height */
        }

        .footer {
            margin-top: auto;
            height: 60px; /* Adjust this value based on your footer's height */
            background-color: #f8f9fa; /* Set your footer background color */
        }
    </style>
