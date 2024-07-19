<?php include('session.php');
include('style.php'); ?>

<html>
<title>Change Password - Admin Panel | <?php echo $r18['company'];?></title>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Navbar -->
<?php include('header.php'); ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('sidebar.php'); ?>
<?php
  $sql="SELECT * FROM admin WHERE username='$user_admin'";
  $test = mysqli_query($db, $sql);
  $a= mysqli_fetch_array($test);
  $id=$a['id'];
  ?> 
  <?php
if (count($_POST) > 0) {
    $passnew=mysqli_real_escape_string($db,$_POST['newPassword']);
    $pass=mysqli_real_escape_string($db,$_POST['currentPassword']);
    $result = mysqli_query($db,"SELECT * FROM admin WHERE username='$user_admin'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($db, "UPDATE admin set password='" . $passnew. "' WHERE username='$user_admin'");
      $_SESSION['status01']="Your Password Updated Successfully!";
$_SESSION['status_code01']="success";
} 
else{
$_SESSION['status01']="Current Password is not correct!";
$_SESSION['status_code01']="Error";
}
}
?>
<!-- <?php
// $sql="SELECT * FROM master WHERE id='1'";
// $test = mysqli_query($db, $sql);
// $r = mysqli_fetch_array($test);
// $client_status=$r['client_status'];
?> -->

<div class="content-wrapper">
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Change Password</a></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active">Change Password</li>
</ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card card-info">
<div class="card-header">
<h3 class="card-title">Change Password</h3>
</div>
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="card-body">
<div class="row">
<div class="col-md-4">
<label for="inputEmail3" class="col-form-label">Current Password</label>  
<input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="Current Password" required>
</div>
<div class="col-md-4">
<label for="inputEmail3" class="col-form-label">New password</label>  
<input class="form-control" type="password" name="newPassword" id="password" placeholder="New Password" required>
</div>
<div class="col-md-4">
<label for="inputEmail3" class="col-form-label">Re-type New Password</label>  
<input class="form-control" type="text" id="confirm-password" placeholder="Re-type New Password" required>
</div>
</div>
</div>
<div class="card-footer">
<a href="index.php"><button type="button" class="btn btn-danger">Back To Home</button></a>
<input type="submit" name="submit" id="addemp" class="btn btn-info" value="Save Changes" />
<!--<button type="submit" name="submit" id="addemp" onclick="return confirm('Are you sure to change admin password?')" class="btn btn-info">Save & Update</button>-->
</div>
</form>
</div>
</div>
</div>

</div>
</section>
</div>
<?php include('footer.php'); ?>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script type="text/javascript">
    $(function () {
        $("#addemp").click(function () {
            var currentPassword = $("#currentPassword").val();
            var newPassword = $("#password").val();
            var confirmPassword = $("#confirm-password").val();

            // Check if the new password is the same as the current password
            if (newPassword === currentPassword) {
                swal({
                    title: "New Password cannot be the same as Current Password.",
                    icon: "error",
                    button: "Ok. Done!",
                }).then(function () {
                    location.reload(); // Refresh the page
                });
                return false;
            }

            // Check if the new password and confirm password match
            if (newPassword !== confirmPassword) {
                swal({
                    title: "Password & Confirm Password do not match.",
                    icon: "error",
                    button: "Ok. Done!",
                }).then(function () {
                    location.reload(); // Refresh the page
                });
                return false;
            }

            return true;
        });
    });
</script>
<?php include('script.php'); ?>
</body>
</html>