<!doctype html>
<html class="no-js" lang="zxx">
<head>
<?php include('style.php'); ?>
   <title>About Us - <?php echo $r18['company'];?></title>
</head>
<body>
   <?php include('preloader.php'); ?>
   <div class="backtotop-wrap cursor-pointer">
      <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <?php include('header.php'); ?>
 <main>
<div class="breadcrumb__area theme-bg-1 p-relative pt-40 pb-40">
   <div class="breadcrumb__thumb" data-background="assets/media/hbg.png"></div>
   <div class="breadcrumb__thumb_2" data-background="assets/imgs/resources/page-title-bg-2.png"></div>
   <div class="small-container">
      <div class="row justify-content-center">
         <div class="col-xxl-12">
            <div class="breadcrumb__wrapper p-relative">
               <h2 class="breadcrumb__title">About Us</h2>
               <div class="breadcrumb__menu">
                  <nav>
                     <ul>
                        <li><span><a href="index.php">Home</a></span></li>
                        <li><span>About Us</span></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 <!-- Breadcrumb area end --> 


 <!-- About us area start --> 
<section class="about-us-section section-space p-relative">
   <div class="small-container">
      <div class="row g-4">
         <div class="col-xxl-6 col-xl-6 col-lg-6">
            <!-- image area start -->
            <div class="about-us-image-area p-relative wow fadeInRight" data-wow-delay=".5s">
               <div class="border-shape" data-background="assets/imgs/shapes/shape-6.png"></div>
               <figure class="image-1">
                  <img src="assets/media/about1.jpeg" alt="">
               </figure>
               <div class="image-2-area">
                  <div class="image-2 p-relative">
                     <img src="assets/media/about2.jpeg" alt="">  
                  </div>                  
               </div>
            </div>
            <!-- image area end -->
         </div>
         <div class="col-xxl-6 col-xl-6 col-lg-6">
            <!-- .content start -->
            <div class="about-us-content-area p-relative z-1 pl-30">
               <div class="title-box mb-35 wow fadeInLeft" data-wow-delay=".5s">
                  <span class="section-sub-title">About Us</span>
                  <h3 class="section-title mt-10">Assam State Geographic Information System</h3>
               </div>
               <p class="mb-35 wow fadeInLeft" data-wow-delay=".5s">This project aims to provide a user-friendly interface for exploring various layers of geographical information, enabling users to perform tasks such as visualization, measurement, geocoding, and data manipulation.</p>
               <div class="icon-box mb-20 wow fadeInLeft" data-wow-delay=".8s">
                  <div class="content">
                     <h5><a href="about-us.php">Interactive Mapping</a></h5>
                     <p>Addresses or GPS coordinates of your offices, service centers, or project sites.</p>
                  </div>
               </div>
               <div class="icon-box mb-20 wow fadeInLeft" data-wow-delay=".9s">
                  <div class="content">
                     <h5><a href="about-us.php">Data Visualization</a></h5>
                     <p>Details about ongoing and completed projects, including locations, timelines, and statuses.</p>
                  </div>
               </div>
               <div class="about-btn-box wow fadeInLeft" data-wow-delay="1s">
                  <a class="primary-btn-1 btn-hover" href="about-us.php">
                     about us &nbsp; | <i class="icon-right-arrow"></i>
                     <span style="top: 147.172px; left: 108.5px;"></span>
                  </a>
               </div>
            </div>
            <!-- .content end -->
         </div>
      </div>
   </div>
</section>

 <!-- About us area end --> 

 </main>     

   <!-- Footer area start -->
   <?php include('footer.php'); ?>
   <!-- Footer area end -->
   

   <?php include('script.php'); ?>

</body>
</html>