<?php include('database/config.php');?>
<?php
if (isset($_POST["t_id"])) {
   $query = "SELECT * FROM user WHERE t_id = '" . $_POST["t_id"] . "'";
    $result = mysqli_query($db, $query);
    $row   = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>
<?php
// get_contact_details.php
// Include your database connection code here

if (isset($_POST['contact_id'])) {
    $contactId = $_POST['contact_id'];

    // Fetch contact details from the database using $contactId
    // Replace the following with your database query code
    $sql = "SELECT * FROM contact_us WHERE contact_id = " . $contactId;
    $result = mysqli_query($db, $sql);
    $row   = mysqli_fetch_array($result);
    echo json_encode($row);
}

if (isset($_POST["serviceid"])) {
   $query = "SELECT * FROM service WHERE serviceid = '" . $_POST["serviceid"] . "'";
    $result = mysqli_query($db, $query);
    $row   = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>