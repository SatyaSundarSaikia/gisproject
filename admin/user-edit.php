<?php include('style.php'); ?>
<title>Update Member Profile - Admin Panel|<?php echo $r18['company'];?> </title>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Navbar -->
<?php include('header.php'); ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('sidebar.php'); ?>

<?php
$ed= mysqli_real_escape_string($db,trim($_GET['edit']));
$sql1="SELECT * FROM user WHERE t_id='$ed'";
$test = mysqli_query($db, $sql1);
$r1 = mysqli_fetch_array($test);
$id=$r1['t_id'];
?>

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
$id_proof = mysqli_real_escape_string($db, trim($_POST['id_proof']));

if(empty($_FILES['document']['name']))
{
$file_namephoto=$_POST['image_img'];
}
if(!empty($_FILES['document']['name']))
{
$temp = explode(".", $_FILES["document"]["name"]);
$file_namephoto= round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["document"]["tmp_name"], "../assets/media/document/". $file_namephoto);
}
$sql="UPDATE `user` SET `name`='$name', `phone`='$phone',`email`='$email',`address`='$address',`city`='$city',`state`='$state',`pin`='$pin',`password`='$password',`document`='$file_namephoto',`id_proof`='$id_proof' WHERE t_id='$t_id'";
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Update User</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Update Member</li>
</ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<!-- general form elements -->

<!-- general form elements -->

<!-- Input addon -->
<!-- Horizontal Form -->
<div class="card card-info">
<div class="card-header">
<h3 class="card-title">Update User Details</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<input type="hidden" class="form-control" value="<?php echo $r1['t_id'];?>" name="t_id"  >
<div class="card-body">
<div class="row">
<div class="col-md-1">
<label for="inputEmail3" class="col-form-label">Name</label>  
</div>
<div class="col-md-3">
<input type="text" class="form-control" id="inputEmail3" name="name" onkeypress="return accept_char_with_one_spcae(event,value)"   value="<?php echo $r1['name'];?>" placeholder="Member Name" required>
</div>
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">Phone</label>
</div>
<div class="col-md-3">
<input type="text" class="form-control" id="inputPassword3" onkeypress="return accept_only_number(event)" name="phone"   value="<?php echo $r1['phone'];?>" placeholder="Enter Phone Number" maxlength="10" required>
</div>
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">Email</label>
</div>
<div class="col-md-3">
<input type="email" class="form-control" id="inputPassword3" name="email" placeholder="Enter Email "  value="<?php echo $r1['email'];?>" required>
</div>
</div><br>
<div class="row">
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">Password</label>
</div>
<div class="col-md-3">
<input type="text" class="form-control" id="inputPassword3" onkeypress="return accept_char_with_one_spcae(event,value)"  name="password" placeholder="Enter Password" value="<?php echo $r1['password'];?>" required>
</div>

<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">Document</label>
</div>
<div class="col-md-3">
<input type="file" class="custom-file-input" id="file1" onchange="return fileValidation1()"  name="document" placeholder=" upload Document">
<input type="hidden" name="image_img" value="<?php echo $r1['document']; ?>"/>
<label class="custom-file-label" for="exampleInputFile">Upload Document</label>
<a href="../assets/media/document/<?php echo $r1['document'];?>" target="_blank"><i class="fa fa-file-pdf" style='font-size:18px;color:red'></i></a>
</div>

<div class="col-md-1">
 <label for="inputEmail3" class="col-form-label">ID Proof</label>  
</div>
<div class="col-md-3">
  <select class="form-control" id="id_proof" name="id_proof" required>
                            <option value="">Select Option</option>
                    <option value="Aadhar" <?php if($r1['id_proof']=='Aadhar'){echo"selected";}?>>Aadhar</option>
                    <option value="Driving Licence"<?php if($r1['id_proof']=='Driving Licence'){echo"selected";}?>>Driving Licence</option>
                    <option value="Passport" <?php if($r1['id_proof']=='Passport'){echo"selected";}?>>Passport</option>
                    <option value="Voter ID" <?php if($r1['id_proof']=='Voter ID'){echo"selected";}?>>Voter ID</option>
                </select>
</div>
</div></br>
<div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">City<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="city1" name="city" value="<?php echo $r1['city'];?>" placeholder="Enter City"  required>
                    </div>
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">State<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-3">
                      <input type="text" class="form-control" id="state1" name="state" value="<?php echo $r1['state'];?>" placeholder="Enter State"  required>
                    </div>
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">PIN<span class="text-danger">*</span></label>  
                    </div>
                   <div class="col-md-3">
                      <input type="text" class="form-control" id="pin1" name="pin" value="<?php echo $r1['pin'];?>" placeholder="Enter PIN" maxlength="6"  required>
                    </div>
                  </div><br>
<div class="row">
<div class="col-md-1">
<label for="inputPassword3" class="col-form-label">Address</label>
</div>
<div class="col-md-11">
<input type="text" class="form-control" id="inputPassword3" name="address" placeholder="Enter Address" value="<?php echo $r1['address'];?>" required>
</div>
</div>
<br>
</div>
<!-- /.card-body -->
<div class="card-footer">
<a href="user.php"><button type="button" class="btn btn-danger">Back To User List</button></a>
<button type="submit" name="update" class="btn btn-info">Save & Update</button>
</div>
<!-- /.card-footer -->
</form>
</div>
<!-- /.card -->
</div>

</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('footer.php'); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('script.php'); ?>
<script>
function fileValidation1(){
var fileInput = document.getElementById('file1');
var filePath = fileInput.value;
var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
if(!allowedExtensions.exec(filePath)){
alert('Please upload file having extensions .jpeg/.jpg/.png only.');
fileInput.value = '';
return false;
}else{
//Image preview
if (fileInput.files && fileInput.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
};
reader.readAsDataURL(fileInput.files[0]);
}
}
}
</script>

</body>
