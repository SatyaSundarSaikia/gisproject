<!doctype html>
<html class="no-js" lang="zxx">
<head>
<?php include('style.php'); ?>
   <title>Registration-<?php echo $r18['company'];?></title>
</head>
<body>
<?php include('preloader.php'); ?>
   <!-- Back to top start -->
   <div class="backtotop-wrap cursor-pointer">
      <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!-- Back to top end -->
   <?php include('header.php'); ?>
<main>
   <?php
if(isset($_POST["add"])) {
    $name = mysqli_real_escape_string($db, trim($_POST['name']));
    $phone = mysqli_real_escape_string($db, trim($_POST['phone']));
    $email = mysqli_real_escape_string($db, trim($_POST['email']));
    $address = mysqli_real_escape_string($db, trim($_POST['address']));
    $city = mysqli_real_escape_string($db, trim($_POST['city']));
    $state = mysqli_real_escape_string($db, trim($_POST['state']));
    $pin = mysqli_real_escape_string($db, trim($_POST['pin']));
    $password = mysqli_real_escape_string($db, trim($_POST['password']));
    $cnf_password = mysqli_real_escape_string($db, trim($_POST['cnf_password']));
    $id_proof = mysqli_real_escape_string($db, trim($_POST['id_proof']));
     $photo=$_FILES['document']['name'];
   $phototmp =$_FILES['document']['tmp_name'];
   move_uploaded_file($phototmp,"assets/media/document/".$photo);
   
    // Check if the phone number already exists
    $checkPhoneSql = "SELECT * FROM `user` WHERE `phone` = '$phone'";
    $checkPhoneRes = mysqli_query($db, $checkPhoneSql);

    if(mysqli_num_rows($checkPhoneRes) > 0) {
        echo "<script>alert('Phone number already exists!'); window.location.href='registration.php';</script>";
    } else {
        // Proceed with insertion
        $sql = "INSERT INTO `user`(`name`, `phone`, `email`, `address`, `city`, `state`, `pin`, `password`,`cnf_password`,`document`,`id_proof`) 
        VALUES ('$name','$phone','$email','$address','$city','$state','$pin','$password','$cnf_password','$photo','$id_proof')";
        $res = mysqli_query($db, $sql);

        if($res) {
            echo "<script>alert('Register Successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('User Not Register ..!'); window.location.href='contact-us.php';</script>";
        }
    }

   
}
?>

<!-- Breadcrumb area start --> 
<div class="breadcrumb__area theme-bg-1 p-relative pt-40 pb-40">
   <div class="breadcrumb__thumb" data-background="assets/media/hbg.png"></div>
   <div class="breadcrumb__thumb_2" data-background="assets/imgs/resources/page-title-bg-2.png"></div>
   <div class="small-container">
      <div class="row justify-content-center">
         <div class="col-xxl-12">
            <div class="breadcrumb__wrapper p-relative">
               <h2 class="breadcrumb__title">Registration</h2>
               <div class="breadcrumb__menu">
                  <nav>
                     <ul>
                        <li><span><a href="index.php">Home</a></span></li>
                        <li><span>Registration</span></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 <!-- Breadcrumb area end --> 

 <section class="contact-page-section section-space">
   <div class="small-container">
      <div class="row">
          <div class="col-md-1"></div>
         <div class="col-md-10">
            <div class="contact-page-form-area">
               <div class="contact-page-form">
                  <form action="#" method="post"  onsubmit="return validateForm()" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-lg-4">
                           <label>Name<span class="text-danger">*</span></label>
                           <input type="text" placeholder="Your Name*"  name="name" maxlength="50"  required>
                        </div>
                        <div class="col-lg-4">
                           <label>Email<span class="text-danger">*</span></label>
                           <input type="email" placeholder="Your Email*" name="email" maxlength="50"  required>
                        </div>
                        <div class="col-lg-4">
                           <label>Phone Number<span class="text-danger">*</span></label>
                           <input type="tel" class="Number" placeholder="Your Phone*"  name="phone" maxlength="10"  required>
                        </div>
                         <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-4">
                           &nbsp;
                        </div>
                         <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-8">
                           <label>Address<span class="text-danger">*</span></label>
                           <input type="text" placeholder="Address*" name="address" required>
                        </div>
                        <div class="col-lg-4">
                           <label>City<span class="text-danger">*</span></label>
                            <input type="text" placeholder="City*" name="city" maxlength="20"  required>
                        </div>
                        <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-4">
                           &nbsp;
                        </div>
                         <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-4">
                           <label>State<span class="text-danger">*</span></label>
                           <input type="text" placeholder="State*" name="state" maxlength="20"  required>
                        </div>
                        <div class="col-lg-4">
                           <label>PIN<span class="text-danger">*</span></label>
                            <input type="text" placeholder="PIN*" class="Number" name="pin" maxlength="6"  required>
                        </div>
                        <div class="col-lg-4">
                        <label>ID Proof<span class="text-danger">*</span></label>
                        <select class="form-control" id="id_proof" name="id_proof" required>
                            <option value="">Select Option</option>
                    <option value="Aadhar">Aadhar</option>
                    <option value="Driving Licence">Driving Licence</option>
                    <option value="Passport">Passport</option>
                    <option value="Voter ID">Voter ID</option>
                </select>
                        </div>
                        <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-4">
                        <label>Upload Document<span class="text-danger">*</span></label>
                        <input type="file" id="file1" onchange="return fileValidation1()"  name="document" required> 
                        </div>
                        <div class="col-lg-4">
                        <label>Password<span class="text-danger">*</span></label>
                        <input type="password" placeholder="Password*" name="password" id="password" required>
                        </div>
                        <div class="col-lg-4">
                        <label>Confirm Password<span class="text-danger">*</span></label>
                        <input type="password" placeholder="Confirm Password*" name="cnf_password" id="cnf_password" required oninput="checkPasswordMatch()">
                        <small id="passwordMatchMessage" style="color: red;"></small>
                         </div>
                         <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-4">
                           &nbsp;
                        </div>
                        <div class="col-lg-12">
                           <button  type="submit" name="add" class="primary-btn-1 btn-hover">
                              Register Now &nbsp; | <i class="icon-right-arrow"></i>
                              <span style="top: 47.172px; left: 108.5px;"></span>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
 </section>
 </main>     
   <!-- Footer area start -->
   <?php include('footer.php'); ?>
   <!-- Footer area end -->
   <?php include('script.php'); ?>
  <script>
function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cnf_password").value;

    if (password !== confirmPassword) {
        alert("Password And Confirm Password do not match.");
        return false;
    }
    return true;
}

function checkPasswordMatch() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cnf_password").value;
    var message = document.getElementById("passwordMatchMessage");

    if (password !== confirmPassword) {
        message.textContent = "Password And Confirm Password do not match.";
    } else {
        message.textContent = "";
    }
}
</script>
<script>
function fileValidation1(){
var fileInput = document.getElementById('file1');
var filePath = fileInput.value;
var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
if(!allowedExtensions.exec(filePath)){
alert('Please upload file having extensions .jpeg/.jpg/.png/.pdf only.');
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
document.getElementById('imagePreview2').innerHTML = '<img src="' + canvas.toDataURL() + '"/>'; // display image with fixed dimensions
};
};
reader.readAsDataURL(fileInput.files[0]);
}
}
}
</script>
</body>
</html>