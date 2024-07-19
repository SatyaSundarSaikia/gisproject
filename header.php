   <!-- Offcanvas area start -->
   <div class="fix">
      <div class="offcanvas__info">
         <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo">
                     <a href="index.php">
                        <img src="admin/images/logo/<?php echo $r18['logo'];?>" alt="Header Logo">
                     </a>
                  </div>
                  <div class="offcanvas__close">
                     <button>
                        <i class="fal fa-times"></i>
                     </button>
                  </div>
               </div>
               <div class="offcanvas__search mb-25">
                  <p class="text-white"><?php echo $r18['address'];?></p>
               </div>
               <div class="mobile-menu fix mb-40"></div>
               <div class="offcanvas__contact mt-30 mb-20">
                  <h4>Contact Info</h4>
                  <ul>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a target="_blank"
                              href="#"><?php echo $r18['city'];?>, <?php echo $r18['state'];?>, <?php echo $r18['pin'];?></a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="far fa-phone"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a href="tel:+<?php echo $r18['phonea'];?>">+91<?php echo $r18['phonea'];?></a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="fal fa-envelope"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a href="tel:+012-345-6789"><span class="mailto:<?php echo $r18['emaila'];?>"><?php echo $r18['emaila'];?></span></a>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="offcanvas__social">
                  <ul>
                     <li><a href="<?php echo $r18['facebook'];?>"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="<?php echo $r18['twitter'];?>"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="<?php echo $r18['youtube'];?>"><i class="fab fa-youtube"></i></a></li>
                     <li><a href="<?php echo $r18['linkedin'];?>"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="offcanvas__overlay"></div>
   <div class="offcanvas__overlay-white"></div>
   <!-- Offcanvas area start -->

   <!-- Header area start -->
   <header>
      <div class="container-fluid bg-color-1">
         <div class="header-top">
            <div class="header-top-contact-info">
               <span class="email p-relative"><a href="mailto:<?php echo $r18['emaila'];?>"><?php echo $r18['emaila'];?></a></span>
               <span class="time p-relative"><?php echo $r18['phonea'];?></span>
            </div>
            <div class="header-top-socials">
               <span><a href="<?php echo $r18['facebook'];?>"><i class="fab fa-facebook-f"></i></a></span>
               <span><a href="<?php echo $r18['instagram'];?>"><i class="fab fa-instagram"></i></a></span>
               <span><a href="<?php echo $r18['linkedin'];?>"><i class="fab fa-linkedin-in"></i></a></span>
               
               <span><a href="https://wa.me/91<?php echo $r18['whatsapp'];?>"><i class="fab fa-whatsapp"></i></a></span>
            </div>
         </div>
      </div>
      <div class="header-area">
         <div class="large-container">
            <div class="mega-menu-wrapper">
               <div class="header-main">
                  <div class="header-left">
                     <div class="header-logo">
                        <a href="index.php">
                           <img src="admin/images/logo/<?php echo $r18['logo'];?>" alt="header logo" >
                        </a>
                     </div>                     
                  </div>                  
                  <div class="header-right d-flex justify-content-end">
                     <div class="mean__menu-wrapper d-none d-lg-block">
                        <div class="main-menu">
                           <nav id="mobile-menu">
                              <ul>
                                  <li><a href="index.php">Home</a></li>
                                  <li><a href="about-us.php">About Us</a></li>
                                  <li><a href="features.php">Features</a></li>
                                  <li><a href="admin">Admin</a></li>
                                  <li><a href="contact-us.php">Contact Us</a></li>
                              </ul>
                           </nav>
                           <!-- for wp -->
                           <div class="header__hamburger ml-50 d-none">
                              <button type="button" class="hamburger-btn offcanvas-open-btn">
                                 <span>01</span>
                                 <span>01</span>
                                 <span>01</span>
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="header-action d-none d-xl-inline-flex gap-5">
                        <div class="header-link">
                           <a class="primary-btn-1 btn-hover" href="registration.php">
                              REGISTER NOW &nbsp; | <i class="icon-right-arrow"></i>
                              <span style="top: 147.172px; left: 108.5px;"></span>
                           </a>
                        </div>
                     </div>
                     <div class="header-action">
                        <div class="header-link-1">
                          <div class="icon">
                           <i class="fal fa-phone-volume"></i>
                          </div>
                          <div class="content">
                           <span>Call Us Now</span>
                              <h6><a href="tel:<?php echo $r18['phonea'];?>">+<?php echo $r18['phonea'];?></a></h6>
                          </div>
                        </div>
                     </div>
                     <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                           <a class="bar-icon" href="javascript:void(0)">
                              <i class="fa-light fa-bars-sort"></i>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Header area end --> 