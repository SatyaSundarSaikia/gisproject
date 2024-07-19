<!doctype html>
<html class="no-js" lang="zxx">
<head>
<?php include('style.php'); ?>
   <title>Contact Us - <?php echo $r18['company'];?></title>
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
   <?php
if(isset($_POST["submit"]))
{ 
$name=mysqli_real_escape_string($db,trim($_POST['contact_name']));
$mobile=mysqli_real_escape_string($db,trim($_POST['contact_phone']));
$email=mysqli_real_escape_string($db,trim($_POST['contact_email']));
$contact_sub=mysqli_real_escape_string($db,trim($_POST['contact_sub']));
$message=mysqli_real_escape_string($db,trim($_POST['contact_msg']));
$enq_on=date('d-m-Y');
$sql1="INSERT INTO contact_us (contact_name,contact_phone,contact_email,contact_sub,contact_msg,enq_on) VALUES ('$name','$mobile','$email','$contact_sub','$message','$enq_on')";
$res=mysqli_query($db,$sql1);
if($res)
{
echo"<script> alert('Message Send Successfully!'); window.location.href='index.php';  </script>";
}
else 
{
echo "<script> alert('Message Not Send..!'); window.location.href='contact-us.php';  </script>";
}
}
?>
 <!-- Breadcrumb area start --> 
<div class="breadcrumb__area theme-bg-1 p-relative pt-40 pb-40">
   <div class="breadcrumb__thumb" data-background="assets/media/hbg.png"></div>
   <div class="breadcrumb__thumb_2" data-background="assets/imgs/resources/page-title-bg-2.png"></div>
   <div class="small-container">
      <div class="row justify-content-center">
         <div class="col-xxl-12">
            <div class="breadcrumb__wrapper p-relative">
               <h2 class="breadcrumb__title">Contact Us</h2>
               <div class="breadcrumb__menu">
                  <nav>
                     <ul>
                        <li><span><a href="index.php">Home</a></span></li>
                        <li><span>Contact</span></li>
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
                     <h6><?php echo $r18['address'];?>,&nbsp;<?php echo $r18['city'];?>,&nbsp;<?php echo $r18['state'];?> - <?php echo $r18['pin'];?></h6>
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
                  <span class="section-sub-title">LET’S TALK</span>
                  <h3 class="section-title mt-10">Let’s Get in Touch</h3>
               </div>
               <div class="contact-page-form">
                  <form action="#" method="post" >
                     <div class="row">
                        <div class="col-lg-6">
                           <label>Your Name<span class="text-danger">*</span></label>
                           <input type="text" placeholder="Your Name"  name="contact_name"  maxlength="30"  required>
                        </div>
                        <div class="col-lg-6">
                           <label>Your Email<span class="text-danger">*</span></label>
                           <input type="email" placeholder="Your Email" name="contact_email" maxlength="50"  required>
                        </div>
                           <div class="col-lg-6">
                           &nbsp;
                        </div>
                        <div class="col-lg-6">
                           &nbsp;
                        </div>
                        <div class="col-lg-6">
                           <label>Your Phone<span class="text-danger">*</span></label>
                           <input type="tel" placeholder="Your Phone" name="contact_phone" maxlength="10" required>
                        </div>
                        <div class="col-lg-6">
                           <label>Subject<span class="text-danger">*</span></label>
                           <input type="text" placeholder="Subject" name="contact_sub" maxlength="30"  required>
                        </div>
                           <div class="col-lg-6">
                           &nbsp;
                        </div>
                        <div class="col-lg-6">
                           &nbsp;
                        </div>
                        <div class="col-lg-12">
                           <label>Your Message<span class="text-danger">*</span></label>
                           <textarea  placeholder="Write Message" name="contact_msg" maxlength="200"  required></textarea>
                        </div>
                        <div class="col-lg-12">
                           <button  type="submit" name="submit" class="primary-btn-1 btn-hover">
                              Send Now &nbsp; | <i class="icon-right-arrow"></i>
                              <span style="top: 147.172px; left: 108.5px;"></span>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
 </section>

<!-- <div class="container-fluid g-0 fix">-->
<!--   <div class="row">-->
<!--      <div class="col-xxl-12">-->
<!--         <div class="contact-map">-->
<!--            <?php //echo $r18['gmap'];?>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</div>-->


 </main>     

   <!-- Footer area start -->
   <?php include('footer.php'); ?>
   <!-- Footer area end -->
   

   <?php include('script.php'); ?>

</body>
</html>