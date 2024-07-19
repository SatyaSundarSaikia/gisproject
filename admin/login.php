<?php include("database/config.php"); ?>
<?php 
session_start();
$error="";
// Check if the user has exceeded the maximum allowed failed login attempts
if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 5 && isset($_SESSION['login_time']) && time() - $_SESSION['login_time'] < 300) {
    // If the user has exceeded the maximum allowed failed login attempts within the last 15 minutes, display an error message
    $error = "You have exceeded the maximum allowed failed login attempts. Please try again after 5 minutes.";
        $disabled = "disabled";
} else {
    // If the user has not exceeded the maximum allowed failed login attempts or the 15 minutes block has expired, proceed with login attempt
     $disabled = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //$active = $row['active'];
        $count = mysqli_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row
        if ($count == 1) {
            $_SESSION['login_admin'] = $username;
            $_SESSION['login_attempts'] = 0; // Reset login attempts
            header("location: index.php");
        } else {
            // Increment login attempts
            if (isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts']++;
            } else {
                $_SESSION['login_attempts'] = 1;
            }

            // Update login time
            $_SESSION['login_time'] = time();

            $error = "Your Username and Password combination is wrong.";
        }
    }
}
?>
<?php
$sql18="SELECT * FROM master WHERE id='1'";
$test18 = mysqli_query($db, $sql18);
$r18 = mysqli_fetch_array($test18);
$id=$r18['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login - <?php echo $r18['company'];?></title>

  <!-- Google Font: Source Sans Pro -->
   <link rel="icon" href="images/favicon/<?php echo $r18['favicon']?>" type="image/gif" sizes="20x20">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><img src="images/logo/<?php echo $r18['logo'];?>" alt="Logo" width="50%"></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Admin Login</p>
<div style="text-align: center;">
    <strong style="color: red;"><?php echo $error ?></strong>
</div>
    <form action="" method="post">
<div class="input-group mb-3">
<input type="text" name="username" class="form-control" placeholder="Enter Admin UserName"  <?php echo $disabled; ?> required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div> 
</div>
</div>
<div class="input-group mb-3">
<input type="password" name="password" class="form-control" placeholder="Enter Admin Password"  <?php echo $disabled; ?> required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">
<div class="icheck-primary">
<label for="remember">
                <!--<a href="forget-password.php"><i class="fa fa-lock"></i> Forget Password?</a>-->
              </label>
</div>
</div>
<!-- /.col -->
<div class="col-4">
<button type="submit" name="submit" class="btn btn-primary btn-block" <?php echo $disabled; ?>>Sign In</button>
</div>
<!-- /.col -->

</div>
</form>

   <div class="social-auth-links text-center mt-2 mb-3">
<a href="<?php echo $r['website'];?>" target="_blank" class="btn btn-block btn-danger">
&copy; <?php echo date('Y'); ?> <?php echo $r18['company'];?>. All Rights Reserved.

</a>
</div>
    </div>
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>