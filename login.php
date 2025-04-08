<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RKU Library Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f3e5f5;
        }

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

        h3 {
            color: #6a1b9a;
        }

        .text-decoration-none {
            color: purple;
        }

        .text-decoration-none:hover {
            color: #4a148c;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login</h3>

                <!-- Login Form -->
                <form id="loginForm" action="login.php" method="post">
                    <div class="form-group">
                        <label for="email"><strong>Email address</strong></label>
                        <input type="email" class="form-control" id="email" name="email_address" placeholder="Enter your email"
                            value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="password"><strong>Password</strong></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" >
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember_me"
                            <?php echo isset($_COOKIE['user_email']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="rememberMe"><strong>Remember me</strong></label>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="forgot_password.php" class="text-decoration-none">Forgot your password?</a>
                </div>
                <div class="text-center mt-2">
                    <p>Don't have an account? <a href="register.php" class="text-decoration-none">Register</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    session_start();
    include 'includes/db_config.php'; // Ensure this file sets up $con

    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email_address = trim($_POST['email_address']);
        $password = $_POST['password'];
        $remember_me = isset($_POST['remember_me']) ? 1 : 0;

        // Check Admin Table First
        $stmt = $con->prepare("SELECT id, name, password FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email_address);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($admin_id, $admin_name, $admin_password);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($password, $admin_password)) {
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['admin_name'] = $admin_name;

                if ($remember_me) {
                    setcookie("user_email", $email_address, time() + (86400 * 30), "/");
                }
                header("Location: ./admin_dashboard/pages/admin_dashboard.php");
                exit();
            } else {
                echo "<div class='alert alert-danger text-center'>Incorrect admin password. Please try again.</div>";
                exit();
            }
        }

        $stmt->close();

        // Check User Table
        $stmt = $con->prepare("SELECT id, name, password FROM user_registration WHERE email_address = ?");
        $stmt->bind_param("s", $email_address);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $user_name, $user_password);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($password, $user_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;

                if ($remember_me) {
                    setcookie("user_email", $email_address, time() + (86400 * 30), "/");
                }
                header("Location: ./user_dashboard/userdashboard.php");
                exit();
            } else {
                echo "<div class='alert alert-danger text-center'>Incorrect user password. Please try again.</div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger text-center'>No user found with this email.</div>";
            exit();
        }

        $stmt->close();
    }
    $con->close();
    ?>

    <?php
    // $plain_password = "Admin@8181";
    // $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

    // echo "Hashed Password: " . $hashed_password;
    // 
    ?>


    <!-- jQuery Validation Script -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#loginForm").validate({
                rules: {
                    email_address: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email_address: {
                        required: "Please enter your email",
                        email: "Please enter a valid email"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 6 characters"
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.appendTo(element.closest(".form-group"));
                }
            });
        });
    </script>



</body>

</html>