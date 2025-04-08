<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$database = "online_library_management_system";

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("❌ Connection failed: " . $con->connect_error);
}
