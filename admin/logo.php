<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('style.php'); ?>
<title>Logo & Icon - Admin Panel | <?php echo $r18['company'];?></title>
</head>
<?php
if(isset($_POST["masterupdate"]))
{
if(empty($_FILES['logo']['name']))
{
$file_namemark=$_POST['logo_img'];
}
if(!empty($_FILES['logo']['name']))
{
$temp2 = explode(".", $_FILES["logo"]["name"]);
$file_namemark= round(microtime(true)) . '.' . end($temp2);
move_uploaded_file($_FILES["logo"]["tmp_name"], "images/logo/". $file_namemark);
}

if(empty($_FILES['favicon']['name']))
{
$file_favicon=$_POST['favicon_img'];
}
if(!empty($_FILES['favicon']['name']))
{
$temp = explode(".", $_FILES["favicon"]["name"]);
$file_favicon= round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["favicon"]["tmp_name"], "images/favicon/". $file_favicon);
}
$sql="UPDATE `master` SET logo='$file_namemark',favicon='$file_favicon' WHERE id='1'";
$res=mysqli_query($db,$sql);
if($res)
{
$_SESSION['status17']="Icon Updated Successfully!";
$_SESSION['status_code17']="success";
}
else
{
$_SESSION['status17']="Some Thing Error!";
$_SESSION['status_code17']="Error";
}
}
?>
<?php
$sql="SELECT * FROM master WHERE id='1'";
$test = mysqli_query($db, $sql);
$r18 = mysqli_fetch_array($test);

?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Logo & Icon</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active">Logo & Icon</li>
</ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<!-- jquery validation -->
<div class="card card-info">
<div class="card-header">
<h3 class="card-title">Logo & Icon</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="card-body">
<div class="row">
<div class="col-md-2">
<label for="inputPassword3" class="col-form-label">Logo</label>
</div>
<div class="col-md-4">
<div class="custom-file">
<input type="file" class="custom-file-input" name="logo">
<label class="custom-file-label" for="exampleInputFile">Upload Logo</label>
<input type="hidden" value="<?php echo $r18['logo'];?>" name="logo_img">
<a href="images/logo/<?php echo $r18['logo'];?>" data-toggle="lightbox" data-title="Logo" data-gallery="gallery"><img src="images/logo/<?php echo $r18['logo'];?>" alt="Logo" width="50%" height="70"></a>
</div>
</div>
<div class="col-md-2">
<label for="inputPassword3" class="col-form-label">Icon</label>
</div>
<div class="col-md-4">
<div class="custom-file">
<input type="file" class="custom-file-input" name="favicon" >
<label class="custom-file-label" for="exampleInputFile">Upload Icon</label>
<input type="hidden" value="<?php echo $r18['favicon'];?>" name="favicon_img">
<a href="images/favicon/<?php echo $r18['favicon'];?>" data-toggle="lightbox" data-title="" data-gallery="gallery"><img src="images/favicon/<?php echo $r18['favicon'];?>" alt="Icon" target="_blank" width="50%" height="70"></a>
</div>
</div>
</div><br>
</div>
<div class="card-footer">
<button type="submit" name="masterupdate" class="btn btn-info">Save & Update</button>
</div>
</form>
</div>
</div>
<div class="col-md-6"></div>
</div>
</div>
</section>
</div>
<?php include('footer.php'); ?>
<aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<?php include('script.php'); ?>
</body>
</html>