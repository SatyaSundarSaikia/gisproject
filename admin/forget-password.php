<?php
   include("database/config.php");
   session_start();
   ?>
   <?php
$sql="SELECT * FROM master WHERE id='1'";
$test = mysqli_query($db, $sql);
$r = mysqli_fetch_array($test);
$client_status=$r['client_status'];
$comp=$r['company'];
$add=$r['address'];
$phn=$r['phonea'];
$logo=$r['logo'];
?>
<?php
// Define the base URL for your API
$apiImageUrl='https://myworkstatus.in/gis/admin/images/logo/';
$dynamicLogoUrl = $apiImageUrl . $logo;
?>
  <?php
if(isset($_POST) & !empty($_POST)){
$email = mysqli_real_escape_string($db, $_POST['email']);
//$chars = "0123456789HERGHAR";
//$password = substr( str_shuffle( $chars ), 0, 6 ); 
$sql = "SELECT * FROM `admin` WHERE email = '$email'";
$res = mysqli_query($db, $sql);
$count = mysqli_num_rows($res);
if($count == 1){
$r = mysqli_fetch_assoc($res);
$password = $r['password'];
$username = $r['username'];
$to = "$email";
$subject = 'Gis Admin Panel : - Forget Password ';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = 'Hello,'.$username.'
You have successfully reset your account password.
New Login Credential will be:
E-mail: '.$email.'
Your new password : '.$password.'
Now you can login with this email and password.';
// mail($to,$subject,$message);

$message3='<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<title></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
<!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
<!--<![endif]-->
<style>
* {
box-sizing: border-box;
}

body {
margin: 0;
padding: 0;
}

a[x-apple-data-detectors] {
color: inherit !important;
text-decoration: inherit !important;
}

#MessageViewBody a {
color: inherit;
text-decoration: none;
}

p {
line-height: inherit
}

.desktop_hide,
.desktop_hide table {
mso-hide: all;
display: none;
max-height: 0px;
overflow: hidden;
}

@media (max-width:670px) {

.desktop_hide table.icons-inner,
.social_block.desktop_hide .social-table {
display: inline-block !important;
}

.icons-inner {
text-align: center;
}

.icons-inner td {
margin: 0 auto;
}

.image_block img.big,
.row-content {
width: 100% !important;
}

.mobile_hide {
display: none;
}

.stack .column {
width: 100%;
display: block;
}

.mobile_hide {
min-height: 0;
max-height: 0;
max-width: 0;
overflow: hidden;
font-size: 0px;
}

.desktop_hide,
.desktop_hide table {
display: table !important;
max-height: none !important;
}
}
</style>
</head>
<body style="background-color: #000000; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad" style="padding-bottom:15px;padding-top:15px;width:100%;padding-right:0px;padding-left:0px;">
<div align="center" class="alignment" style="line-height:10px"><img alt="your logo" src="' . $dynamicLogoUrl . '" style="display: block; height: auto; border: 0; width: 130px; max-width: 100%;" title="your logo" width="130"/></div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; background-image: url("https://myworkstatus.in/kdecosystem/dev/images/ResetPassword_BG_2.png"); background-position: center top; background-repeat: no-repeat; color: #000000; width: 650px;" width="650">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 45px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="20" cellspacing="0" class="divider_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad">
<div align="center" class="alignment">
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span></span></td>
</tr>
</table>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="20" cellspacing="0" class="image_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad">
<div align="center" class="alignment" style="line-height:10px"><img alt="Forgot your password?" class="big" src="https://myworkstatus.in/globaladmin/admin/images/lock5.png" style="display: block; height: auto; border: 0; width: 358px; max-width: 100%;" title="Forgot your password?" width="358"/></div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="heading_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad" style="padding-top:35px;text-align:center;width:100%;">
<h1 style="margin: 0; color: #f63457; direction: ltr; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 28px; font-weight: 400; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>New Password Generated!</strong></h1>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td class="pad" style="padding-left:45px;padding-right:45px;padding-top:10px;">
<div style="font-family: Arial, sans-serif">
<div class="" style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5;">
<p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#aa67cf;">We received a request to change your password.</span></p>
<p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#aa67cf;">We generate a new password for your account.</span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="20" cellspacing="0" class="divider_block block-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad">
<div align="center" class="alignment">
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="80%">
<tr>
<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #E1B4FC;"><span></span></td>
</tr>
</table>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block block-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td class="pad" style="padding-bottom:10px;padding-left:45px;padding-right:45px;padding-top:10px;">
<div style="font-family: Arial, sans-serif">
<div class="" style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5;">
<p style="margin: 0; mso-line-height-alt: 19.5px;"><span style="font-size:13px;color:#8412c0;">This is system generated password, please change after login.</span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="10" cellspacing="0" class="button_block block-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad">
<div align="center" class="alignment">
<!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://www.example.com" style="height:50px;width:139px;v-text-anchor:middle;" arcsize="0%" strokeweight="0.75pt" strokecolor="#f63457" fillcolor="#f63457"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:14px"><![endif]--><a href="http://www.example.com" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#f63457;border-radius:0px;width:auto;border-top:1px solid transparent;font-weight:400;border-right:1px solid transparent;border-bottom:1px solid transparent;border-left:1px solid transparent;padding-top:10px;padding-bottom:10px;font-family:"Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif;font-size:14px;text-align:center;mso-border-alt:none;word-break:keep-all;" target="_blank"><span style="padding-left:40px;padding-right:40px;font-size:14px;display:inline-block;letter-spacing:normal;"><span dir="ltr" style="word-break: break-word;"><span data-mce-style="" dir="ltr" style="line-height: 28px;"> '.$password.'</span></span></span></a>
<!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block block-8" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td class="pad" style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:10px;">
<div style="font-family: sans-serif">
<div class="" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #8412c0; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;"><span style="color:#8a3b8f;">&copy; '.$comp.'·</span><span style=""> </span><span style=""><a href="http://[unsubscribe]/" rel="noopener" style="color: #8412c0;" target="_blank">All Rights Reserved.</a></span></p>
</div>
</div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="5" cellspacing="0" class="divider_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad">
<div align="center" class="alignment">
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span></span></td>
</tr>
</table>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td class="pad">
<div style="font-family: sans-serif">
<div class="" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #f63457; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; text-align: center; mso-line-height-alt: 14.399999999999999px;"><span style="font-size:11px;"><span style="color:#8a3b8f;">'.$add.' /+91'.$phn.'</span><a href="http://www.example.com" style="color: #8412c0;"></a></span></p>
<p style="margin: 0; mso-line-height-alt: 14.399999999999999px;"></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="10" cellspacing="0" class="social_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad">
<div align="center" class="alignment">
<table border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block;" width="72px">
<tr>
<td style="padding:0 2px 0 2px;"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="https://myworkstatus.in/globaladmin/admin/images/facebook2x.png" style="display: block; height: auto; border: 0;" title="facebook" width="32"/></a></td>
<td style="padding:0 2px 0 2px;"><a href="https://www.twitter.com/" target="_blank"><img alt="Twitter" height="32" src="https://myworkstatus.in/globaladmin/admin/images/twitter2x.png" style="display: block; height: auto; border: 0;" title="twitter" width="32"/></a></td>
</tr>
</table>
</div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="icons_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="pad" style="vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
<table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="alignment" style="vertical-align: middle; text-align: center;">
<!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
<!--[if !vml]><!-->
<table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;">
<!--<![endif]-->

</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table><!-- End -->
</body>
</html> ';

mail($to,$subject,$message3,$headers);
echo "<script> alert('Your Password Send to Email .'); window.location.href='login.php';  </script>";
}
else
{
echo "<script> alert('Email ID Does not Exist.'); window.location.href='index.php';  </script>";
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Forget Password</title>

  <!-- Google Font: Source Sans Pro -->
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
      <a href="#" class="h1"><img src="images/logo/<?php echo $r['logo'];?>" alt="Logo" width="40%"></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Admin Forget Password</p>
 <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control"  placeholder="Promoter Email ID " required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <label for="remember">
                <a href="login.php">Back to Login?</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Get Password</button>
          </div>
          <!-- /.col -->
          
        </div>
        <span><font color="red"><?php echo $error ?></font></span>
      </form>
   

  <div class="social-auth-links text-center mt-2 mb-3">
<a href="<?php echo $r['website'];?>" target="_blank" class="btn btn-block btn-danger">
&copy; <?php echo date('Y'); ?> <?php echo $r['company'];?>. All Rights Reserved.

</a>
<b>Developed By</b><a href="https://www.rmanaminfotech.com/">  &nbsp;Rmanam Infotech</a>
</div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
