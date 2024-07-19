<?php 
include('database/config.php');
include('session.php');

if(isset($_POST['delete_btn1_set']))
{
  $del_id= $_POST['delete_id'];
  $reg_query="DELETE FROM user WHERE t_id='$del_id'";
  $reg_query_run=mysqli_query($db,$reg_query);
}
if(isset($_POST['delete_btn6_set']))
{
  $del_id= $_POST['delete_id'];
  $reg_query="DELETE FROM service WHERE serviceid='$del_id'";
  $reg_query_run=mysqli_query($db,$reg_query);
}
if(isset($_POST['delete_btn7_set']))
{
  $del_id= $_POST['delete_id'];
  $reg_query="DELETE FROM photos WHERE id='$del_id'";
  $reg_query_run=mysqli_query($db,$reg_query);
}
?>