<?php
session_start();
include('admin/database/config.php');
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ccaptcha"]) && $_POST["ccaptcha"] != "" && $_SESSION["concode"] == $_POST["ccaptcha"]) {
        if (isset($_POST["done"])) {
            // username and password sent from form
            $myusername = mysqli_real_escape_string($db, $_POST['email']);
            $mypassword = mysqli_real_escape_string($db, $_POST['password']);
            $sql = "SELECT * FROM user WHERE email= '$myusername' AND password = '$mypassword' AND t_status='1'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            // If result matched $myusername and $mypassword, table row must be 1 row
            if ($count == 1) {
                $_SESSION['login_user'] = $myusername;
                header("Location: map_project/index.php");
                exit();
            } else {
                $error = "Your Login Name or Password is invalid";
            }
        }
    } else {
        $error = "Invalid captcha code.";
    }
}
?>
<html class="no-js" lang="zxx">
<head>
<?php include('style.php'); ?>
   <title>Login - <?php echo $r18['company'];?></title>
</head>
<body>
<?php include('preloader.php'); ?>
   <!-- Back to top start -->
   <div class="backtotop-wrap cursor-pointer">
      <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!-- Back to top end -->
   <?php include('header.php'); ?>
 <main>
 
 <!-- Breadcrumb area start -->
<div class="breadcrumb__area theme-bg-1 p-relative pt-40 pb-40">
   <div class="breadcrumb__thumb" data-background="assets/media/hbg.png"></div>
   <div class="breadcrumb__thumb_2" data-background="assets/imgs/resources/page-title-bg-2.png"></div>
   <div class="small-container">
      <div class="row justify-content-center">
         <div class="col-xxl-12">
            <div class="breadcrumb__wrapper p-relative">
               <h2 class="breadcrumb__title">Login </h2>
               <div class="breadcrumb__menu">
                  <nav>
                     <ul>
                        <li><span><a href="index.php">Home</a></span></li>
                        <li><span>Login</span></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 <!-- Breadcrumb area end -->

 <section class="contact-page-section section-space">
   <div class="small-container">
      <div class="row">
         <div class="col-xxl-4 col-xl-4 col-lg-4">
            <div class="contact-p-info-area">
               <div class="contact-box mb-30">
                  <div class="icon-1">
                     <i class="fat fa-location-dot"></i>
                  </div>
                  <div class="info">
                     <span>Location:</span>
                     <h6><?php echo $r18['address'];?>,&nbsp;<?php echo $r18['city'];?>,</br>&nbsp;<?php echo $r18['state'];?> - <?php echo $r18['pin'];?></h6>
                  </div>
               </div>
               <div class="contact-box mb-30">
                  <div class="icon-1">
                     <i class="fat fa-phone-volume"></i>
                  </div>
                  <div class="info">
                     <span>Call Us:</span>
                     <h4><a href="tel:+91<?php echo $r18['phonea'];?>"><?php echo $r18['phonea'];?>&nbsp;</a> <a href="tel:+91<?php echo $r18['phoneb'];?>"><?php echo $r18['phoneb'];?></a></h4>
                  </div>
               </div>
               <div class="contact-box">
                  <div class="icon-1">
                     <i class="fat fa-envelope"></i>
                  </div>
                  <div class="info">
                     <span>Email Us</span>
                <h6><?php echo $r18['emaila'];?></h6>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xxl-8 col-xl-8 col-lg-8">
            <div class="contact-page-form-area">
               <div class="title-box mb-40 wow fadeInLeft" data-wow-delay=".5s">
                  <span class="section-sub-title">LET’S EXPLORE</span>
                  <h3 class="section-title mt-10">Login To Get Started</h3>
               </div>
               <div class="contact-page-form">
                  <form action="#" method="post" >
                     <div class="row">
                        <div class="col-lg-6">
                           <label>Register Email<span class="text-danger">*</span></label>
                           <input type="email" placeholder="Register Email*" name="email"  required>
                        </div>
                        <div class="col-lg-6">
                           <label>Password<span class="text-danger">*</span></label>
                           <input type="password" placeholder="Password*" name="password" maxlength="20" required>
                        </div>
                     
                        <div class="col-lg-6">
                          <div class="form-group">
                                   <span><img src="captcha/contact-captcha.php" class="capp"/></span>
                                   
                                 </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                         <input type="text" name="ccaptcha" placeholder="Enter Captcha Code" required="required" />
                         </div>
                        </div>
                         
                        <div class="col-lg-12">
                           <button  type="submit" name="done" class="primary-btn-1 btn-hover">
                              Explore Now &nbsp; | <i class="icon-right-arrow"></i>
                              <span style="top: 147.172px; left: 108.5px;"></span>
                           </button>
                        </div>
                        <strong style="color: red;"><?php echo $error ?></strong>
                     </div>
                  </form>
                  <label for="remember">
                <a href="forget-password.php"><i class="fa fa-lock"></i>Reset Password?</a>
              </label>
               </div>
            </div>
         </div>
      </div>
   </div>
 </section>

 <!-- <div class="container-fluid g-0 fix">
   <div class="row">
      <div class="col-xxl-12">
         <div class="contact-map">
            <?php// echo $r18['map'];?>
         </div>
      </div>
   </div>
</div> -->


 </main>    

   <!-- Footer area start -->
   <?php include('footer.php'); ?>
   <!-- Footer area end -->
   

   <?php include('script.php'); ?>

</body>
</html>