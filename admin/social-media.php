<?php include('session.php');
include('style.php'); ?>
<title>Social Media - Admin Panel | <?php echo $r18['company'];?></title>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Navbar -->
<?php include('header.php'); ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('sidebar.php'); ?>
<?php
$sql="SELECT * FROM master WHERE id='1'";
$test = mysqli_query($db, $sql);
$r = mysqli_fetch_array($test);
$client_status=$r['client_status'];
?>
<?php
if(isset($_POST["masterupdate"]))
{
$facebook=mysqli_real_escape_string($db,trim($_POST['facebook']));
$twitter=mysqli_real_escape_string($db,trim($_POST['twitter']));
$instagram=mysqli_real_escape_string($db,trim($_POST['instagram']));
$linkedin=mysqli_real_escape_string($db,trim($_POST['linkedin']));
$youtube=mysqli_real_escape_string($db,trim($_POST['youtube']));
$gplus=mysqli_real_escape_string($db,trim($_POST['gplus']));
$rss=mysqli_real_escape_string($db,trim($_POST['rss']));
$sql="UPDATE `master` SET facebook='$facebook',twitter='$twitter',instagram='$instagram',linkedin='$linkedin',youtube='$youtube',gplus='$gplus',rss='$rss' WHERE id='1'";
$res=mysqli_query($db,$sql);
if($res)
{
$_SESSION['status19']="Data Updated Successfully!";
$_SESSION['status_code19']="success";
}
else
{
$_SESSION['status19']="Some Thing Error!";
$_SESSION['status_code19']="Error";
}
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Social Media</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Social Media</li>
</ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<div class="card card-info">
<div class="card-header">
<h3 class="card-title">Social Media Profile Link</h3>
</div>
<form class="form-horizontal" method="post" action="">
<div class="card-body">
<div class="row">
<div class="col-md-2">
<label for="inputEmail3" class="col-form-label">Facebook</label>  
</div>
<div class="col-md-6">
<input type="text" class="form-control" id="inputEmail3" name="facebook" value="<?php echo $r['facebook'];?>" placeholder="Facebook Profile Link">
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label for="inputEmail3" class="col-form-label">Twitter</label>  
</div>
<div class="col-md-6">
<input type="text" class="form-control" id="inputEmail3" name="twitter" value="<?php echo $r['twitter'];?>" placeholder="Twitter Profile Link" >
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label for="inputEmail3" class="col-form-label">Instagram</label>  
</div>
<div class="col-md-6">
<input type="text" class="form-control" id="inputEmail3" name="instagram" value="<?php echo $r['instagram'];?>" placeholder="Instagram Profile Link">
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label for="inputEmail3" class="col-form-label">LinkedIn</label>  
</div>
<div class="col-md-6">
<input type="text" class="form-control" id="inputEmail3" name="linkedin" value="<?php echo $r['linkedin'];?>" placeholder="LinkedIn Profile Link">
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label for="inputEmail3" class="col-form-label">Youtube</label>  
</div>
<div class="col-md-6">
<input type="text" class="form-control" id="inputEmail3" name="youtube" value="<?php echo $r['youtube'];?>" placeholder="Youtube Profile Link">
</div>
</div><br>

</div>
<!-- /.card-body -->
<div class="card-footer">
<button type="submit" name="masterupdate" class="btn btn-info">Save & Update</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
</div>
<?php include('footer.php'); ?>
<aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<?php include('script.php'); ?>
</body>
