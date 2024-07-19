<?php
// Include your database connection file or create one if not included
include('database/config.php');

// Assuming $db is your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = mysqli_real_escape_string($db, $_POST['currentPassword']);
    $user_admin = mysqli_real_escape_string($db, $_POST['user_admin']); // Assuming you have user_admin in your form or adjust accordingly

    // Fetch the admin record
    $result = mysqli_query($db, "SELECT * FROM admin WHERE username='$user_admin'");
    $row = mysqli_fetch_array($result);

    // Check if the current password matches the one in the database
    if ($row && $currentPassword == $row["password"]) {
        echo 'success'; // Password is correct
    } else {
        echo 'error';   // Password is incorrect
    }
} else {
    // Invalid request method
    echo 'invalid_request';
}
?>
