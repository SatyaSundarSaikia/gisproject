<!doctype html>
<html class="no-js" lang="zxx">
<head>
<?php include('style.php'); ?>
   <title>Features - <?php echo $r18['company'];?></title>
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
               <h2 class="breadcrumb__title">Our Features</h2>
               <div class="breadcrumb__menu">
                  <nav>
                     <ul>
                        <li><span><a href="index.php">Home</a></span></li>
                        <li><span>Features</span></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 <!-- Breadcrumb area end --> 
 <!-- Service Slider area start --> 
 <section class="service-page-section section-space">
   <div class="small-container">
      <div class="row g-4">
          <?php
$sn=1;
$sql11="SELECT * FROM service";
$result=mysqli_query($db,$sql11);
while($row=mysqli_fetch_array($result))
{
?>
         <div class="col-xxl-4 col-xl-4 col-lg-4 mb-15">
            <!-- block -->
            <div class="service-slider-area p-relative">
               <figure class="image w-img">
                  <img src="admin/images/service/<?php echo $row['serviceimg'];?>" alt="">
               </figure>
               <div class="content">
                  <h4 class="mb-15"><a href="#"><?php echo $row['servicename'];?></a></h4>
                  <p class="mb-25"><?php echo $row['servicedetails'];?>.</p>
               </div>
            </div>
         </div>
         
          <?php  $sn++;}  ?>
      </div>
   </div>
 </section>
 <!-- Service Slider area end --> 
 </main>       
   <!-- Footer area start -->
   <?php include('footer.php'); ?>
   <!-- Footer area end -->
   <?php include('script.php'); ?>

</body>
</html>