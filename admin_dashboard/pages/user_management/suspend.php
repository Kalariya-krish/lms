<?php
include '../../../includes/db_config.php';


session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch current status
    $user = $conn->query("SELECT status FROM user_registration WHERE id = $id")->fetch_assoc();
    $new_status = ($user['status'] == 'Active') ? 'Suspended' : 'Active';

    // Update status
    $conn->query("UPDATE user_registration SET status = '$new_status' WHERE id = $id");

    // Set session message
    $_SESSION['message'] = "User has been " . ($new_status == 'Suspended' ? 'Suspended' : 'Activated') . ".";
    $_SESSION['msg_type'] = "warning";
}

header("Location: user_manage.php");
exit();
?>
