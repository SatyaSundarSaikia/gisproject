<?php include('admin/database/config.php');
$sql18="SELECT * FROM master WHERE id='1'";
$test18 = mysqli_query($db, $sql18);
$r18 = mysqli_fetch_array($test18);
$id=$r18['id'];
$company=$r18['company'];
$sql1="SELECT * FROM about WHERE id='1'";
$test1= mysqli_query($db, $sql1);
$r1= mysqli_fetch_array($test1);
$content=$r1['content'];
?>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="admin/images/favicon/<?php echo $r18['favicon'];?>">
   <!-- CSS here -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/meanmenu.min.css">
   <link rel="stylesheet" href="assets/css/animate.css">
   <link rel="stylesheet" href="assets/css/swiper.min.css">
   <link rel="stylesheet" href="assets/css/slick.css">
   <link rel="stylesheet" href="assets/css/magnific-popup.css">
   <link rel="stylesheet" href="assets/css/fontawesome-pro.css">
   <link rel="stylesheet" href="assets/css/icomoon.css">
   <link rel="stylesheet" href="assets/css/spacing.css">
   <link rel="stylesheet" href="assets/css/main.css">