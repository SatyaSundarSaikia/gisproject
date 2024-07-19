<?php
   include('database/config.php');
   
   // Check if a session is already active before starting a new one
   if (session_status() == PHP_SESSION_NONE) {
       session_start();
   }

   $user_admin = $_SESSION['login_admin'];
   
   $ses_sql = mysqli_query($db,"select * from admin where username = '$user_admin' ");
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if (!isset($_SESSION['login_admin'])) {
      header("location:login.php");
      die();
   }
?>
