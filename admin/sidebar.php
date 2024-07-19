<?php
  $sql="SELECT * FROM admin WHERE username='$user_admin'";
  $test = mysqli_query($db, $sql);
  $a= mysqli_fetch_array($test);
  $id=$a['id'];
  ?> 
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<a href="index.php" class="brand-link">
<h6><?php echo $r18['company'];?></h6>
</a>
<div class="sidebar">
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="images/favicon/<?php echo $r18['favicon'];?>" class="img-circle elevation-2" alt="User Image" width="100%">&nbsp;<font color="#fff">Admin Panel</font>
</div>
<div class="info">
</div>
</div>
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<li class="nav-item"><a href="index.php" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Home</p></a></li>
<li class="nav-item"><a href="user.php" class="nav-link"><i class="fa fa-users nav-icon"></i><p>User</p></a></li>
<li class="nav-item"><a href="enquiry.php" class="nav-link"><i class="nav-icon fa fa-comment"></i><p>Enquiry</i></p></a></li>
<!--<li class="nav-item"><a href="gallery.php" class="nav-link"><i class="nav-icon fa fa-image"></i><p>Gallery</p></a></li>-->
<li class="nav-item"><a href="service.php" class="nav-link"><i class="nav-icon as fa fa-shield-alt"></i><p>Service</p></a></li>
<!--<li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-cogs"></i><p>Setting<i class="right fas fa-angle-left"></i></p></a>-->
<!--<ul class="nav nav-treeview">-->
<!--<li class="nav-item"><a href="setting.php" class="nav-link"><i class="fa fa-cog nav-icon"></i><p>General Setting</p></a></li>-->
<!--<li class="nav-item"><a href="about-us.php" class="nav-link"><i class="fa fa-cog nav-icon"></i><p>About us</p></a></li>-->
<!--<li class="nav-item"><a href="logo.php" class="nav-link"><i class="fa fa-file-image nav-icon"></i><p>Logo & Icons</p></a></li>-->
<!--<li class="nav-item"><a href="social-media.php" class="nav-link"><i class="far fa-thumbs-up nav-icon"></i><p>Social Media</p></a></li>-->
<!--</ul>-->
<!--</li>-->
<li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-key"></i><p>Security<i class="right fas fa-angle-left"></i></p></a>
<ul class="nav nav-treeview">
<li class="nav-item"><a href="reset-password.php" class="nav-link"><i class="fa fa-lock nav-icon"></i><p>Change Password</p></a></li>
</ul>
</li>
<li class="nav-item"><a href="logout.php" class="nav-link" onclick="return confirm('Are you sure to logout?')"><i class="nav-icon fas fa-power-off"></i><p>Logout</p></a></li>
</ul>
</nav>

</div>

</aside>