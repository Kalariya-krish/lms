<?php
$password = "Admin@9913"; // Your actual password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
echo "Hashed Password: " . $hashed_password;
?>
