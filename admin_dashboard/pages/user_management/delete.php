<?php
include '../../../includes/db_config.php';



session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM user_registration WHERE id = $id");

    // Set session message
    $_SESSION['message'] = "User has been deleted successfully!";
    $_SESSION['msg_type'] = "danger";
}

header("Location: user_manage.php");
exit();
?>
