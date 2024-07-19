<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('style.php'); ?>
<title>General Setting - Admin Panel | <?php echo $r18['company'];?></title>
</head>
<?php
if(isset($_POST["masterupdate"]))
{
$company=mysqli_real_escape_string($db,trim($_POST['company']));
$whatsapp=mysqli_real_escape_string($db,trim($_POST['whatsapp']));
$address=mysqli_real_escape_string($db,trim($_POST['address']));
$city=mysqli_real_escape_string($db,trim($_POST['city']));
$state=mysqli_real_escape_string($db,trim($_POST['state']));
$pin=mysqli_real_escape_string($db,trim($_POST['pin']));
$website=mysqli_real_escape_string($db,trim($_POST['website']));
$phonea=mysqli_real_escape_string($db,trim($_POST['phonea']));
$phoneb=mysqli_real_escape_string($db,trim($_POST['phoneb']));
$emaila=mysqli_real_escape_string($db,trim($_POST['emaila']));
$gmap=mysqli_real_escape_string($db,trim($_POST['gmap']));

$sql="UPDATE `master` SET company='$company',whatsapp='$whatsapp',address='$address',city='$city',state='$state',pin='$pin',phonea='$phonea',phoneb='$phoneb',website='$website',emaila='$emaila',gmap='$gmap' WHERE id='1'";
$res=mysqli_query($db,$sql);
if($res)
{
$_SESSION['status18']="Data Updated Successfully!";
$_SESSION['status_code18']="success";
}
else
{
$_SESSION['status18']="Some Thing Error!";
$_SESSION['status_code18']="Error";
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
<h1>General Setting</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active">General Setting</li>
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
<h3 class="card-title">General Setting</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="card-body">
<div class="row">
<div class="col-md-2">
<label for="inputEmail3" class="col-form-label">Organization Name<span class="text-danger">*</span></label>  
</div>
<div class="col-md-10">
<input type="text" class="form-control" id="inputEmail3" name="company" value="<?php echo $r18['company'];?>" placeholder="Organization Name"  required>
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label for="inputPassword3" class="col-form-label">Address<span class="text-danger">*</span></label>
</div>
<div class="col-md-10">
<input type="text" class="form-control" id="inputPassword3" name="address" value="<?php echo $r18['address'];?>" placeholder="Company Address" required maxlength="500">
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label for="inputPassword3" class="col-form-label">City<span class="text-danger">*</span></label>
</div>
<div class="col-md-3">
<input type="text" class="form-control" id="inputPassword3" name="city" value="<?php echo $r18['city'];?>" placeholder="City" required onkeypress="return accept_char_with_one_space(event)">
</div>
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">State<span class="text-danger">*</span></label>
</div>
<div class="col-md-3">
<select class="form-control select2" name="state" value="<?php echo $r18['state'];?>" required> 
<option value="">Select State</option>
 <?php
        $sizeSql=mysqli_query($db,"SELECT * FROM state ORDER BY id ASC");
        while($sizeRow=mysqli_fetch_assoc($sizeSql)){
        $is_selected="";
        if($sizeRow['name']==$r18['state']){
        $is_selected="selected";
       }
      echo'<option value="'.$sizeRow['name'].'" '.$is_selected.'>'.$sizeRow['name'].' </option>'; 
     }
    ?>
</select>
</div>
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">PIN<span class="text-danger">*</span></label>
</div>
<div class="col-md-2">
<input type="text" class="form-control Number" name="pin" value="<?php echo $r18['pin'];?>" placeholder="PIN" minlength="6" maxlength="6" required onkeypress="return accept_only_number(event)">
</div>
</div><br>
<hr>
<div class="row">
<div class="col-md-2">
<label for="inputPassword3" class="col-form-label">Google Map</label>
</div>
<div class="col-md-10">
<input type="text" class="form-control" id="inputPassword3" name="gmap" value="<?php echo htmlspecialchars($r18['gmap']);?>" placeholder="Google Map" required maxlength="2000">
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label for="inputPassword3" class="col-form-label">Phone<span class="text-danger">*</span></label>
</div>
<div class="col-md-3">
<input type="text" class="form-control Number" id="inputPassword3" name="phonea" value="<?php echo $r18['phonea'];?>" required placeholder="Phone" minlength="10" maxlength="12" onkeypress="return accept_only_number(event)">
</div>
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">Mobile</label>
</div>
<div class="col-md-3">
<input type="text" class="form-control Number" id="inputPassword3" name="phoneb" value="<?php echo $r18['phoneb'];?>" placeholder="Mobile" minlength="10" maxlength="12" onkeypress="return accept_only_number(event)">
</div>
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">Whatsapp</label>
</div>
<div class="col-md-2">
<input type="text" class="form-control" id="inputPassword3" name="whatsapp" value="<?php echo $r18['whatsapp'];?>" placeholder="Whatsapp" minlength="10" onkeypress="return accept_only_number(event)">
</div>
</div><br>
<div class="row">
<div class="col-md-2">
<label for="inputPassword3" class="col-form-label">Email<span class="text-danger">*</span></label>
</div>
<div class="col-md-3">
<input type="email" class="form-control" id="inputPassword3" name="emaila" value="<?php echo $r18['emaila'];?>" placeholder="Email" required maxlength="70">
</div>
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">Website<span class="text-danger">*</span></label>
</div>
<div class="col-md-3">
<input type="text" class="form-control" id="inputPassword3" name="website" value="<?php echo $r18['website'];?>" placeholder="Website URL">
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
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<?php include('script.php'); ?>
</body>
</html>