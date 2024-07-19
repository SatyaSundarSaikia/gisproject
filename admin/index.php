<?php include('session.php'); ?>
<?php include('style.php');
 $count=mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) FROM service "));
 $count1=mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) FROM user"));
 $count2=mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) FROM contact_us "));
?>
<title>Home - Admin Panel|<?php echo $r18['company'];?></title>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<div class="content-wrapper">
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Welcome <a href="#">Admin!</a></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
</ol>
</div>
</div>
</div>
</div>
<section class="content">
<div class="container-fluid">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-lg-4 col-6">
<!-- small box -->
<div class="small-box bg-info">
<div class="inner">
<h3><?php echo $count[0];?></h3>

<p>User</p>
</div>
<div class="icon">
<i class="fa fa-users"></i>
</div>
<a href="user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-4 col-6">
<!-- small box -->
<div class="small-box bg-success">
<div class="inner">
<h3><?php echo $count2[0];?></h3>
<p>Service</p>
</div>
<div class="icon">
<i class="fa fa-camera"></i>
</div>
<a href="service.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<!-- ./col -->
<div class="col-lg-4 col-6">
<!-- small box -->
<div class="small-box bg-danger">
<div class="inner">
<h3><?php echo $count1[0];?></h3>

<p>Enquiry</p>
</div>
<div class="icon">
<i class="fa fa-comment"></i>
</div>
<a href="enquiry.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
<!--<div class="row">-->
<!--          <div class="col-md-12">  -->
<!--            <div class="card-body">-->
<!--                <div class="card-header">-->
                <!--<h3 class="card-title">Recent General Enquiry</h3>-->
<!--              </div>-->
<!--          <div class="">-->
         
<!--                 </div>-->
<!--        </div>-->
<!--        </div>-->
<!--      </div>-->
</section>
</div>
</div>
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
</body>