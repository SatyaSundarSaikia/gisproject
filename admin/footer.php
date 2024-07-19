<?php 
include('database/config.php');
include('session.php');
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="dist/js/sweetalert.js" ></script>
<?php
 if(isset($_SESSION['status01'] )&& $_SESSION['status01']!='')
 {
     ?>
     <script>
         swal({
       title: "<?php echo $_SESSION['status01'];?>",
       //text: "You clicked the button!",
       icon: "<?php echo $_SESSION['status_code01']; ?>",
       button: "Ok. Done!",
       }).then((result)=>{
                   window.location.href = "reset-password.php";
              });
 </script>
     <?php
     unset($_SESSION['status01']);
 }
 ?>
<!--ADD TEAM-->
<?php
if(isset($_SESSION['status1'] )&& $_SESSION['status1']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status1'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code1']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "user.php";
});
</script>
<?php
unset($_SESSION['status1']);
}
?>
<!--UPDATE TEAM-->
<?php
if(isset($_SESSION['status2'] )&& $_SESSION['status2']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status2'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code2']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "user.php";
});
</script>
<?php
unset($_SESSION['status2']);
}
?>

<!---About--->

<?php
if(isset($_SESSION['status7'] )&& $_SESSION['status7']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status7'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code7']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "about-us.php";
});
</script>
<?php
unset($_SESSION['status7']);
}
?>
<!--GALLERY MEDIA-->
<?php
if(isset($_SESSION['status10'] )&& $_SESSION['status10']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status10'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code10']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "gallery.php";
});
</script>
<?php
unset($_SESSION['status10']);
}
?>
  <!--UPDATE SERVICE   -->
<?php
if(isset($_SESSION['status12'] )&& $_SESSION['status12']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status12'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code12']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "service.php";
});
</script>
<?php
unset($_SESSION['status12']);
}
?>
<!--ADD SERVICE   -->
<?php
if(isset($_SESSION['status13'] )&& $_SESSION['status13']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status13'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code13']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "service.php";
});
</script>
<?php
unset($_SESSION['status13']);
}
?>
<!--MASTER LOGO-->
<?php
if(isset($_SESSION['status17'] )&& $_SESSION['status17']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status17'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code17']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "logo.php";
});
</script>
<?php
unset($_SESSION['status17']);
}
?>


<!--MASTER SETTING-->
<?php
if(isset($_SESSION['status18'] )&& $_SESSION['status18']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status18'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code18']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "setting.php";
});
</script>
<?php
unset($_SESSION['status18']);
}

?>
<!--MASTER SETTING SOCIAL MEDIA-->
<?php
if(isset($_SESSION['status19'] )&& $_SESSION['status19']!='')
{
?>
<script>
swal({
title: "<?php echo $_SESSION['status19'];?>",
//text: "You clicked the button!",
icon: "<?php echo $_SESSION['status_code19']; ?>",
button: "Ok. Done!",
}).then((result)=>{
window.location.href = "social-media.php";
});
</script>
<?php
unset($_SESSION['status19']);
}
?>
<!--======DELETE BUTTON CODE STRAT======-->
<!---delete button for team--->  
<script>
$(document).ready(function (){
$('.delete_btn1_ajax').click(function(e){
e.preventDefault();
var deleteid =$(this).closest("tr").find('.delete_id_value').val();
swal({
title: "Are you sure?",
text: "Once deleted, you will not be able to recover this Data!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
$.ajax({
type:"POST",
url:"del.php",
data: {
"delete_btn1_set": 1,
"delete_id":deleteid,
},
success: function(response){
swal("Data Deleted Successfully.!",{
icon:"success",
}).then((result)=>{
location.reload();
});
}
});
} 
});
});
});
</script>
<!---delete button for gallery media--->  
<script>
$(document).ready(function (){
$('.delete_btn7_ajax').click(function(e){
e.preventDefault();
var deleteid =$(this).closest("div").find('.delete_id_value').val();
//console.log("Hello");
swal({
title: "Are you sure?",
text: "Once deleted, you will not be able to recover this Data!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
$.ajax({
type:"POST",
url:"del.php",
data: {
"delete_btn7_set": 1,
"delete_id":deleteid,
},
success: function(response){
swal("Data Deleted Successfully.!",{
icon:"success",
}).then((result)=>{
location.reload();
});

}
});

} 
});

});
});

</script>
<!---delete button for service--->  
<script>
$(document).ready(function (){
$('.delete_btn6_ajax').click(function(e){
e.preventDefault();
var deleteid =$(this).closest("td").find('.delete_id_value').val();   
//console.log("Hello");
swal({
title: "Are you sure?",
text: "Once deleted, you will not be able to recover this Data!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
$.ajax({
type:"POST",
url:"del.php",
data: {
"delete_btn6_set": 1,
"delete_id":deleteid,
},
success: function(response){
swal("Data Deleted Successfully.!",{
icon:"success",
}).then((result)=>{
location.reload();
});

}
});

} 
});

});
});

</script>


<footer class="main-footer">
<strong>&copy; <?php echo date('Y');?> &nbsp;<a href="#"><?php echo $r18['company'];?></a>.&nbsp;All Right Reserved.</strong>  
</footer>