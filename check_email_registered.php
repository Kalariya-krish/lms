<?php
include_once('includes/db_config.php');
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $q = "SELECT * FROM user_registration WHERE email_address='$email'";
    $result = $con->query($q);
    if ($result->num_rows > 0) {
        echo 'true'; // email exists
    } else {
        echo 'false'; // email does not exist
    }
    exit; // Ensure no other content is sent
}
