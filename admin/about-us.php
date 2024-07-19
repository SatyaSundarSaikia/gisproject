<?php include('session.php');
include('style.php'); ?>
<title>About - Admin Panel | <?php echo $r18['company'];?></title>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('header.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('sidebar.php'); ?>

<?php
if(isset($_POST["update"]))
{
   $content=mysqli_real_escape_string($db,trim($_POST['content']));
   if(empty($_FILES['image']['name']))
{
$file_namemark=$_POST['logo_img'];
}
if(!empty($_FILES['image']['name']))
{
$temp2 = explode(".", $_FILES["image"]["name"]);
$file_namemark= round(microtime(true)) . '.' . end($temp2);
move_uploaded_file($_FILES["image"]["tmp_name"], "images/about/". $file_namemark);
}


    $sql="UPDATE about SET content='$content',image='$file_namemark' WHERE id ='1'";
    $res=mysqli_query($db,$sql);
if($res)
{
$_SESSION['status7']="About Us Updated Successfully!";
$_SESSION['status_code7']="success";
}
else
{
$_SESSION['status7']="Some Thing Error!";
$_SESSION['status_code7']="Error";
}
}
?>
<?php
$sql1="SELECT * FROM about WHERE id='1'";
$test1 = mysqli_query($db, $sql1);
$r1 = mysqli_fetch_array($test1);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>About Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">About Us</li>
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
                <h3 class="card-title">About Us</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-1">
<label class="col-form-label required">Image</label>
</div>
<div class="col-md-3">
<div class="custom-file">
<input type="file" class="custom-file-input" id="exampleInputFile" name="image">
<label class="custom-file-label" for="exampleInputFile">Upload Image</label></div></div>
<div class="col-md-1">
<input type="hidden" value="<?php echo $r1['image'];?>" name="logo_img">
<a href="images/about/<?php echo $r1['image'];?>" data-toggle="lightbox" data-title="Logo" data-gallery="gallery"><img src="images/about/<?php echo $r1['image'];?>" alt="Logo" target="_blank" width="100%" height="50"></a>
</div>
                </div><br>
                  <div class="row">
                    <div class="col-md-1">
                      <label for="inputEmail3" class="col-form-label">About Us</label>  
                    </div>
                    <div class="col-md-11">
                      <textarea class="form-control" id="about" name="content" placeholder="About Us" required><?php echo $r1['content'];?></textarea>
                    </div>
                  </div>
                  <br>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="index.php"><button type="button" class="btn btn-danger">Back To Home</button></a>
                  <button type="submit" name="update" class="btn btn-info">Save & Update</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
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
 <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script>
  // Initialize CKEditor
  ClassicEditor
    .create(document.querySelector('#about'))
    .catch(error => {
      console.error(error);
    });
</script>
</body>
