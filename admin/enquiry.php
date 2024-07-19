<?php include('session.php'); ?>
<?php include('style.php'); ?>
<title>Enquiry Record- Admin Panel |&nbsp;<?php echo $r18['company'];?></title>
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
<h1>Enquiry Record</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active">Enquiry</li>
</ol>
</div>
</div>
</div>
</section>
<style>
    .address-cell {
  max-width: 150px; /* Adjust the width as per your requirements */
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
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
<th>Date</th>
<th>Name</th>
<th>Phone</th>
<th>Email</th>
<th class="address-cell">Subject</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sn=1;
$sql1="SELECT * FROM contact_us ORDER BY contact_id DESC";
$result=mysqli_query($db,$sql1);
while($r=mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $sn;?></td>
<td><?php echo $r['enq_on'];?></td>
<td><?php echo $r['contact_name'];?></td>
<td><?php echo $r['contact_phone'];?></td>
<td><?php echo $r['contact_email'];?></td>
<td class="address-cell"><?php echo $r['contact_sub'];?></td>
<td><button type="button" class="btn btn-sm btn-info edit-btn" data-toggle="modal"data-target="#exampleBrand1" data-eid="<?php echo $r['contact_id']; ?>"><i class="fa fa-eye"></i></button></td>
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
 <div class="modal fade" id="exampleBrand1" tabindex="-1" role="dialog" aria-labelledby="exampleBrand"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleBrandLabel"> Contact Enquiry Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mb-0">Name</label>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                        <p id="contact_name"></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="mb-0">Phone</label>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                        <p id="contact_phone"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mb-0">Email</label>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                        <p id="contact_email"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mb-0">Subject</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p id="contact_sub"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Message</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p id="contact_msg"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
<script>
    // JavaScript to populate the modal fields when the modal is shown
    $('#exampleBrand1').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var contactId = button.data('eid'); // Get the contact ID from the button data-eid attribute

        // Use AJAX to fetch contact details based on the contactId
        $.ajax({
            url: 'modal-crud.php', // Create a PHP script to retrieve contact details
            type: 'POST',
            data: { contact_id: contactId },
            dataType: 'json',
            success: function (data) {
                $('#contact_name').text(data.contact_name);
                $('#contact_phone').text(data.contact_phone);
                $('#contact_email').text(data.contact_email);
                $('#contact_sub').text(data.contact_sub);
                $('#contact_msg').text(data.contact_msg);
            }
        });
    });
</script>
</body>
</html>