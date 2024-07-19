<?php include('style.php'); ?>
<title> Gallery - Admin Panel | <?php echo $r18['company'];?></title>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Navbar -->
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
if(isset($_POST['submit'])){ 

$targetDir = "images/gallery/"; 
$allowTypes = array('jpg','png','jpeg','jfif'); 

$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
$fileNames = array_filter($_FILES['image']['name']); 
if(!empty($fileNames)){ 
foreach($_FILES['image']['name'] as $key=>$val){ 
$fileName = basename($_FILES['image']['name'][$key]); 
$targetFilePath = $targetDir . $fileName; 

$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
if(in_array($fileType, $allowTypes)){ 

if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){ 
$insertValuesSQL .= "('".$fileName."'),"; 
}else{ 
$errorUpload .= $_FILES['image']['name'][$key].' | '; 
} 
}else{ 
$errorUploadType .= $_FILES['image']['name'][$key].' | '; 
} 
} 
if(!empty($insertValuesSQL)){ 
$insertValuesSQL = trim($insertValuesSQL, ','); 
$insert = $db->query("INSERT INTO photos (image) VALUES $insertValuesSQL"); 
if($insert){ 
$errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
$errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
$_SESSION['status10']="Gallery Added Successfully!";
$_SESSION['status_code10']="success";
}else{ 
$_SESSION['status10']="Something Error!";
$_SESSION['status_code10']="success"; 
} 
} 
}else{ 
$statusMsg = 'Please select a file to upload.'; 
} 
 if (!empty($errorUploadType)) {
        echo '<script>';
        echo 'alert("Only JPG,JPEG,JFIF and PNG files are allowed. You tried to upload: ' . trim($errorUploadType, ' | ') . '");';
        echo '</script>';
    }

    echo $statusMsg;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Our Gallery</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active"> Gallery</li>
</ol>
</div>
</div>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">Upload Photo
</section>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card card-info">
<div class="card-header">
<h4 class="card-title">Our Gallery </h4>
</div>
<div class="card-body">
<div class="row">
<?php
$sn=1;
$sql11="SELECT * FROM photos";
$result=mysqli_query($db,$sql11);
while($row=mysqli_fetch_array($result))
{
?>
<div class="col-sm-2">
<a href="images/gallery/<?php echo $row['image'];?>" data-toggle="lightbox" data-title="Gallery" data-gallery="gallery">
<img src="images/gallery/<?php echo $row['image'];?>" class="" alt="Gallery" width="100%" height="200px" />
</a><br>
 <input type="hidden" class="delete_id_value" value="<?php echo $row['id'];?>"><a href="javascript:void(0)" class="delete_btn7_ajax btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
</div>
<?php  $sn++;}  ?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<div class="modal fade" id="modal-lg">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" align="center">Upload Gallery  <font color="red"><?php echo $r0['id'];?></font></h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<div class="card-body">
<div class="row">
<div class="col-md-2">
<label for="inputEmail3" class="col-form-label">Images</label>  
</div>
<div class="col-md-6">
<div class="custom-file">
<input type="file" class="custom-file-input" id="exampleInputFile" name="image[]" multiple  required>
<label class="custom-file-label" for="exampleInputFile">Upload Photo</label>
</div>
</div>
<div class="col-md-2">
<button type="submit" name="submit" class="btn btn-info">Upload</button>    
</div>
<div class="col-md-1">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
</div>
</div><br>
<div class="row">
<div class="col-md-9"></div>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
<?php include('footer.php'); ?>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<?php include('script.php'); ?>
</body>
</html>