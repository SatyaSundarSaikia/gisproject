<?php include('session.php'); ?>
<?php include('style.php'); ?>
<title>User Record- Admin Panel |&nbsp;<?php echo $r18['company'];?></title>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<div class="content-wrapper">
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>User Record</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active">User</li>
</ol>
</div> 
</div>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">Add User</button>
</div>
</section>
<?php
if(isset($_GET['type']) && $_GET['type']!=''){
$type=mysqli_real_escape_string($db,$_GET['type']);
if($type=='t_status'){
$operation=mysqli_real_escape_string($db,$_GET['operation']);
$id=mysqli_real_escape_string($db,$_GET['t_id']);
if($operation=='availabel'){
$status='0';
}else{
$status='1';
}
$update_status_sql="update user set t_status='$status' where t_id='$id'";
mysqli_query($db,$update_status_sql);
}
}
?>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<table id="example" class="table table-bordered table-striped">
<thead>
<tr>
<th>SNo</th>
<th>Status</th>
<th>Name</th>
<th>Phone</th>
<th>Email</th>
<th>City</th>
<th>State</th>
<th>PIN</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sn=1;
$sql1="SELECT * FROM user ORDER BY t_id DESC";
$result=mysqli_query($db,$sql1);
while($r=mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $sn;?></td>
<td><?php
if($r['t_status']==0){
echo "<a class='btn btn-danger btn-sm' href='?type=t_status&operation=unavailabel&t_id=".$r['t_id']."'>DEACTIVE</a>&nbsp;";
}else{
echo "<a  class='btn btn-success btn-sm' href='?type=t_status&operation=availabel&t_id=".$r['t_id']."'>ACTIVE</a></span>&nbsp;";
}
?>
</td>
<td><?php echo $r['name'];?> </td>
<td><?php echo $r['phone'];?> </td>
<td><?php echo $r['email'];?> </td>
<td><?php echo $r['city'];?> </td>
<td><?php echo $r['state'];?> </td>
<td><?php echo $r['pin'];?> </td>
<td>
    <a href="user-edit.php?edit=<?php echo $r['t_id'];?>" class="btn btn-sm btn-info" 
data-toggle="tooltip" data-placement="top" title="Update User Detail"><i class="fa fa-edit"></i> </a>&nbsp;
    <!--<button type="button" class="btn btn-sm btn-info  edit-btn" data-toggle="modal" data-target="#exampleBrand1" data-eid="<?php echo $r['t_id'];?>"><i class="fa fa-edit"></i></button>&nbsp;-->
<input type="hidden" class="delete_id_value" value="<?php echo $r['t_id'];?>"><a href="javascript:void(0)" class="delete_btn1_ajax btn btn-sm btn-danger"><i class="fa fa-trash"></i></td>
</tr>
<?php  $sn++;}  ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</section>
</div>
<?php
if(isset($_POST["add"]))
{
$name=mysqli_real_escape_string($db,trim($_POST['name']));
$phone=mysqli_real_escape_string($db,trim($_POST['phone']));
$email=mysqli_real_escape_string($db,trim($_POST['email']));
$address=mysqli_real_escape_string($db,trim($_POST['address']));
$city=mysqli_real_escape_string($db,trim($_POST['city']));
$state=mysqli_real_escape_string($db,trim($_POST['state']));
$pin=mysqli_real_escape_string($db,trim($_POST['pin']));
$password=12345;
$sql = "INSERT INTO `user`(`name`, `phone`, `email`,`address`,`city`,`state`,`pin`,`password`) VALUES ('$name','$phone','$email','$address','$city','$state','$pin','$password')";
$res=mysqli_query($db,$sql);
if($res)
{
$_SESSION['status1']="User Added Successfully!";
$_SESSION['status_code1']="success";
}
else
{
$_SESSION['status1']="Some Thing Error!";
$_SESSION['status_code1']="Error";
}
}
?>
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"> 
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-2">
                      <label for="inputEmail3" class="col-form-label">Name<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="name1" name="name" placeholder="Name"  required>
                    </div>
                    <div class="col-md-2">
                      <label for="inputEmail3" class="col-form-label">Phone<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-4">
                      <input type="text" class="form-control" id="phone1" name="phone" placeholder=" Enter Phone"  maxlength="10" required>
                    </div>
                    
                  </div><br>
                   <div class="row">
                    <div class="col-md-2">
                      <label for="inputEmail3" class="col-form-label">Email<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="email1" name="email" placeholder="Enter Email"  required>
                    </div>
                    <div class="col-md-2">
                      <label for="inputEmail3" class="col-form-label">Password<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-4">
                      <input type="text" class="form-control" id="password1" name="password" placeholder="Enter Password"  required>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">City<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="city1" name="city" placeholder="Enter City"  required>
                    </div>
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">State<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-3">
                      <input type="text" class="form-control" id="state1" name="state" placeholder="Enter State"  required>
                    </div>
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">PIN<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-3">
                      <input type="text" class="form-control" id="pin1" name="pin" placeholder="Enter PIN" maxlength="6"  required>
                    </div>
                  </div><br>
                   <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">Address<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-11">
                      <textarea class="form-control" id="address1" name="address" placeholder="Enter Address" required></textarea>
                    </div>
                  </div><br>
                 </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" name="add" class="btn btn-info">Add</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            
          </div>
        </div>
    </section>
  </div>
<?php
if(isset($_POST["update"]))
{
$t_id=mysqli_real_escape_string($db,trim($_POST['t_id']));
$name=mysqli_real_escape_string($db,trim($_POST['name']));
$phone=mysqli_real_escape_string($db,trim($_POST['phone']));
$email=mysqli_real_escape_string($db,trim($_POST['email']));
$address=mysqli_real_escape_string($db,trim($_POST['address']));
$city=mysqli_real_escape_string($db,trim($_POST['city']));
$state=mysqli_real_escape_string($db,trim($_POST['state']));
$pin=mysqli_real_escape_string($db,trim($_POST['pin']));
$password=mysqli_real_escape_string($db,trim($_POST['password']));
$sql="UPDATE `user` SET `name`='$name', `phone`='$phone',`email`='$email',`address`='$address',`city`='$city',`state`='$state',`pin`='$pin',`password`='$password' WHERE t_id='$t_id'";
$res=mysqli_query($db,$sql);
if($res)
{
$_SESSION['status2']="User Updated Successfully!";
$_SESSION['status_code2']="success";
}
else
{
$_SESSION['status2']="Some Thing Error!";
$_SESSION['status_code2']="Error";
}
}
?>
  <div class="modal fade" id="exampleBrand1" tabindex="-1" role="dialog" aria-labelledby="exampleBrand" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleBrandLabel">Update User</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
 <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"> 
                <div class="card-body">
                    <input type="hidden" class="form-control" id="t_id" name="t_id" placeholder=""  >
                    <div class="row">
                    <div class="col-md-2">
                      <label for="inputEmail3" class="col-form-label">Name<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name"  required>
                    </div>
                    <div class="col-md-2">
                      <label for="inputEmail3" class="col-form-label">Phone<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-4">
                      <input type="text" class="form-control" id="phone" name="phone" placeholder=" Enter Phone"  maxlength="10" required>
                    </div>
                    
                  </div><br>
                   <div class="row">
                    <div class="col-md-2">
                      <label for="inputEmail3" class="col-form-label">Email<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"  required>
                    </div>
                    <div class="col-md-2">
                      <label for="inputEmail3" class="col-form-label">Password<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-4">
                      <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password"  required>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">City<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"  required>
                    </div>
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">State<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-3">
                      <input type="text" class="form-control" id="state" name="state" placeholder="Enter State"  required>
                    </div>
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">PIN<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-3">
                      <input type="text" class="form-control" id="pin" name="pin" placeholder="Enter PIN" maxlength="6"  required>
                    </div>
                  </div><br>
                   <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">Address<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-11">
                      <textarea class="form-control" id="address" name="address" placeholder="Enter Address" required></textarea>
                    </div>
                  </div><br>
                 </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" name="update" class="btn btn-info">Save & Update</button>
                </div>
                <!-- /.card-footer -->
              </form>
</div>
</div>
</div>
  <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
//Fetch Single Record : Show in Edit Modal Box 
$(document).on("click",".edit-btn",function(e){   
e.preventDefault();   
var t_id = $(this).data("eid");
console.log(t_id);
$.ajax({
url : 'modal-crud.php',  
type : "POST",
data: {
t_id:t_id
},
dataType: "json",
success : function(data){
console.log(data);
$('#t_id').val(data.t_id);
$('#name').val(data.name);
$('#phone').val(data.phone);
$('#email').val(data.email);
$('#address').val(data.address);
$('#city').val(data.city);
$('#state').val(data.state);
$('#pin').val(data.pin);
$('#password').val(data.password);
}
}); 
});
});
</script> 
</body>
</html>