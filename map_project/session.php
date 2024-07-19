<?php
   include('../admin/database/config.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select * from user WHERE email = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['phone'];
   if(!isset($_SESSION['login_user'])){
      header("Location: {$hostname}/gis/login.php");
      die();
   }
?>