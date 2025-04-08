<?php
session_start();
include 'includes/db_config.php'; // Database conection file

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email_address'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    // Validate empty fields
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.history.back();</script>";
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // Check password complexity (Min: 8 chars, 1 uppercase, 1 lowercase, 1 number, 1 special character)
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        echo "<script>alert('Password must be at least 8 characters long, with an uppercase letter, a lowercase letter, a number, and a special character.'); window.history.back();</script>";
        exit();
    }

    // Check if user already exists
    $checkQuery = $con->prepare("SELECT id FROM user_registration WHERE email_address = ?");
    $checkQuery->bind_param("s", $email);
    $checkQuery->execute();
    $checkQuery->store_result();

    if ($checkQuery->num_rows > 0) {
        echo "<script>alert('Email already registered! Please login.'); window.location.href='login.php';</script>";
        exit();
    }
    $checkQuery->close();

    // Hash password before storing
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database
    $stmt = $con->prepare("INSERT INTO user_registration (name, email_address, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Please log in.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error: Unable to register. Try again!'); window.history.back();</script>";
    }

    $stmt->close();
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RKU Library Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <style>
        body { background-color: #f3e5f5; }
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .card {
            max-width: 450px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #6a1b9a;
            border-color: #6a1b9a;
        }
        .btn-primary:hover {
            background-color: #4a148c;
        }
        h3 { color: #6a1b9a; }
        .text-decoration-none { color: purple; }
        .text-decoration-none:hover { color: #4a148c; }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Registration</h3>
            
            <form id="registrationForm" action="register.php" method="post">
                <div class="form-group">
                    <label for="name"><strong>Your Name</strong></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label for="email_address"><strong>Email address</strong></label>
                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter your college email">
                </div> 

                <div class="form-group">
                    <label for="password"><strong>Password</strong></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create a Password">
                </div>
                
                <div class="form-group">
                    <label for="confirm-password"><strong>Confirm Password</strong></label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm Password">
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember_me">
                    <label class="form-check-label" for="rememberMe"><strong>Remember me</strong></label>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </form>

            <div class="text-center mt-2">
                <p>Already have an account? <a href="login.php" class="text-decoration-none">Login</a></p>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#registrationForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email_address: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 20,
                pattern: "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*?&])[A-Za-z\\d@$!%*?&]{8,}$"
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 3 characters long"
            },
            email_address: {
                required: "Please enter your email",
                email: "Enter a valid email address"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 8 characters long",
                maxlength: "Password cannot exceed 20 characters",
                pattern: "Must include at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&)"
            },
            confirm_password: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("text-danger");
            error.insertAfter(element);
        }
    });
});
</script>

</body>
</html>
