<?php include('session.php'); ?>
<?php include('style.php'); ?>
<title>Service - Admin Panel |&nbsp;<?php echo $r18['company'];?></title>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Navbar -->
<?php include('header.php'); ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include('sidebar.php'); ?>
<div class="content-wrapper">
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Service</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active">Service</li>
</ol>
</div> 
</div>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">Add New Service</button>
</div>
</section>
<?php
if(isset($_GET['type']) && $_GET['type']!=''){
$type=mysqli_real_escape_string($db,$_GET['type']);
if($type=='status'){
$operation=mysqli_real_escape_string($db,$_GET['operation']);
$serviceid=mysqli_real_escape_string($db,$_GET['serviceid']);
if($operation=='avilabel'){
$status='0';
}else{
$status='1';
}
$update_status_sql="update service set status='$status' where serviceid='$serviceid'";
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
                    <th>Detail</th>
                      <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                          $sn=1;
                          $sql1="SELECT * FROM service ORDER BY serviceid DESC";
                          $result=mysqli_query($db,$sql1);
                          while($r=mysqli_fetch_array($result))
                          {
                          ?>
                  <tr>
                    <td><?php echo $sn;?></td>
                      <td>
                    <?php 
if($r['status']==0){
echo "<a class='btn btn-danger btn-sm' href='?type=status&operation=unavilabel&serviceid=".$r['serviceid']."'>DEACTIVE</a>&nbsp;";
}else{
echo "<a  class='btn btn-success btn-sm' href='?type=status&operation=avilabel&serviceid=".$r['serviceid']."'>ACTIVE</a></span>&nbsp;";
}
?>
</td>
                     <td><?php echo $r['servicename'];?> </td>
                      <td><?php echo $r['servicedetails'];?> </td>
                    <td><img src="images/service/<?php echo $r['serviceimg'];?>" alt="Image" width="40" heigth="40" style="border-radius:100px">&nbsp;</td>
                    <td><button type="button" class="btn btn-sm btn-info  edit-btn" data-toggle="modal" data-target="#exampleBrand1" data-eid="<?php echo $r['serviceid'];?>"><i class="fa fa-edit"></i></button>&nbsp;
                        <input type="hidden" class="delete_id_value" value="<?php echo $r['serviceid'];?>"><a href="javascript:void(0)" class="delete_btn6_ajax btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                  </tr>
<?php  $sn++;}  ?>
</tbody>
<tfoot>
</tfoot>
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
     $servicedetails=mysqli_real_escape_string($db,trim($_POST['servicedetails']));
    $servicename=mysqli_real_escape_string($db,trim($_POST['servicename']));
//     $serviceimg=$_FILES['serviceimg']['name'];
//   $phototmp =$_FILES['serviceimg']['tmp_name'];
//   move_uploaded_file($phototmp,"images/service/".$serviceimg);
   $file = $_FILES['serviceimg']['tmp_name'];
    list($width, $height, $type) = getimagesize($file);
    $nwidth = 300;
    $nheight = 300;
    $newimage = imagecreatetruecolor($nwidth, $nheight);
    if ($type == IMAGETYPE_JPEG) {
        $source = imagecreatefromjpeg($file);
        imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
        $serviceimg = time() . '.jpg';
        imagejpeg($newimage, 'images/service/' . $serviceimg);
    } elseif ($type == IMAGETYPE_PNG) {
        $source = imagecreatefrompng($file);
        imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
        $serviceimg = time() . '.png';
        imagepng($newimage, 'images/service/' . $serviceimg);
    } else {
        echo "<script> alert('Upload only Jpeg,Png Image!');</script>";
        exit();
    }

    // Extract filename from path
    $filename = basename($serviceimg);

  $sql = "INSERT INTO service (servicename,serviceimg,servicedetails) VALUES ('$servicename','$filename','$servicedetails')";
    $res=mysqli_query($db,$sql);
      if($res)
{
$_SESSION['status13']="Service Added Successfully!";
$_SESSION['status_code13']="success";
}
else
{
$_SESSION['status13']="Some Thing Error!";
$_SESSION['status_code13']="Error";
}
}
?>
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Add New Service</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"> 
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">Name<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" name="servicename"placeholder="Name"  required>
                    </div>
                    <div class="col-md-1">
                      <label class="col-form-label">Image<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-5">
<input type="file" class="custom-file-input"  id="file" onchange="return fileValidation()" name="serviceimg" placeholder="Upload Image" required>
<label class="custom-file-label" for="exampleInputFile">Upload Image</label>
 <div id="imagePreview"></div>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">Detail<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-11">
                      <textarea class="form-control" name="servicedetails"placeholder="Detail"  required></textarea>
                    </div></div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" name="add" class="btn btn-info">Add New</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
    </section>
    <!-- /.content -->
  </div>
    <?php
if(isset($_POST["update"]))
{
      $servicedetails=mysqli_real_escape_string($db,trim($_POST['servicedetails']));
    $servicename=mysqli_real_escape_string($db,trim($_POST['servicename']));
   $serviceid=mysqli_real_escape_string($db,trim($_POST['serviceid']));

if(empty($_FILES['serviceimg']['name']))
{
$file_namemark=$_POST['photo_img'];
}
if(!empty($_FILES['serviceimg']['name']))
{
$temp2 = explode(".", $_FILES["serviceimg"]["name"]);
$file_namemark= round(microtime(true)) . '.' . end($temp2);
move_uploaded_file($_FILES["serviceimg"]["tmp_name"], "images/service/". $file_namemark);
}



    $sql="UPDATE `service` SET `servicename`='$servicename', `serviceimg`='$file_namemark', `servicedetails`='$servicedetails' WHERE serviceid='$serviceid'";
    $res=mysqli_query($db,$sql);
    if($res)
    {
$_SESSION['status12']="Service Updated Successfully!";
$_SESSION['status_code12']="success";
}
else
{
$_SESSION['status12']="Some Thing Error!";
$_SESSION['status_code12']="Error";
}
}
?>
  <div class="modal fade" id="exampleBrand1" tabindex="-1" role="dialog" aria-labelledby="exampleBrand" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleBrandLabel">Update Service</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
  <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"> 
                <div class="card-body">
                    <input type="hidden" class="form-control" id="serviceid" name="serviceid" placeholder=""  >
                    <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">Name<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="servicename" name="servicename" placeholder="Name"  required>
                    </div>
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">Image</label>  
                    </div>
                    <div class="col-md-5">
             <input type="file" class="custom-file-input" id="file1" onchange="return fileValidation1()" name="serviceimg" placeholder="">
                       <input type="hidden" name="photo_img" id="photo1">
                      <label class="custom-file-label" for="exampleInputFile">Upload Image</label>
                    </div>
                    <div class="col-md-7"></div>
                      <div class="col-md-5">
     <a id="serviceimg" href="" target="blank"><i class="nav-icon fa fa-file-image" style='font-size:30px;color:red'></i> </a>
      </div>
                  </div><br>
                   <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">Detail<span class="text-danger">*</span></label>  
                    </div>
                    <div class="col-md-11">
                      <textarea class="form-control" id="servicedetails" name="servicedetails" placeholder="Detail" required></textarea>
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
  <!-- /.content-wrapper -->
  <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
<script>
function fileValidation(){
var fileInput = document.getElementById('file');
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
        var image = new Image();
        image.src = e.target.result;
        image.onload = function() {
          var canvas = document.createElement('canvas');
          var context = canvas.getContext('2d');
          canvas.width = 90; // set width
          canvas.height = 90; // set height
          context.drawImage(image, 0, 0, 90, 90); // draw image with fixed dimensions
          document.getElementById('imagePreview').innerHTML = '<img src="' + canvas.toDataURL() + '"/>'; // display image with fixed dimensions
        };
      };
      reader.readAsDataURL(fileInput.files[0]);
    }
}
}
</script>
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
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" width="100px" height="100px" />';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
    fileInput.onchange = function() {
    if(this.file[0].size > 307200){
       alert("File is too big!");
       this.value = "";
    };
};
}
		</script>
<script type="text/javascript">
$(document).ready(function(){
//Fetch Single Record : Show in Edit Modal Box 
$(document).on("click",".edit-btn",function(e){   
e.preventDefault();   
var serviceid = $(this).data("eid");
console.log(serviceid);
$.ajax({
url : 'modal-crud.php',  
type : "POST",
data: {
serviceid:serviceid
},
dataType: "json",
success : function(data){
console.log(data);
$('#serviceid').val(data.serviceid);
$('#servicename').val(data.servicename);
$('#servicedetails').val(data.servicedetails);
$('#photo1').val(data.serviceimg);
$("#serviceimg").attr("href", "https://myworkstatus.in/gis/admin/images/service/" + data.serviceimg);
}
}); 
});
});
</script> 
</body>
</html>