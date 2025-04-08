<?php
session_start();
include_once('includes/db_config.php');
include_once('mailer.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $query = "SELECT * FROM password_token WHERE email = '$email'";
    $result = mysqli_fetch_assoc($con->query($query));
    $otp = rand(100000, 999999);

    // Email body with styling
    $body = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 500px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center; }
        .header { background: #0B032D; color: #fff; padding: 15px; font-size: 20px; }
        .body { padding: 20px; font-size: 14px; color: #333; }
        .otp { display: inline-block; padding: 10px 20px; background: #0B032D; color: #fff; font-size: 18px; font-weight: bold; border-radius: 5px; letter-spacing: 3px; margin: 10px 0; }
        .footer { font-size: 12px; color: #666; padding: 10px; background: #f8f9fa; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>Library Password Reset</div>
        <div class='body'>
            <p>Hello,</p>
            <p>We received a request to reset your password for your library account. Please use the OTP below to proceed:</p>
            <div class='otp'>$otp</div>
            <p>This OTP will expire in 10 minutes. If you did not request a password reset, please disregard this email.</p>
        </div>
        <div class='footer'>&copy; " . date('Y') . " Online Library Management System. All rights reserved.</div>
    </div>
</body>
</html>
";

    $subject = "Password Reset - OTP";
    $email_time = date("Y-m-d H:i:s");
    $expiry_time = date("Y-m-d H:i:s", strtotime('+2 minutes'));
    if ($result) {
        $attempts = $result['otp_attempts'];
        if ($attempts >= 3) {
            $_SESSION['error'] = 'The maximum limit for generating OTP is reached you can generate a new OTP after 24 hours from the last OTP generated time.';
            header("Location: forgot_password.php");
            exit();
        } else {
            $q = "UPDATE password_token SET otp=$otp, otp_attempts=$attempts+1, last_resend=now(), created_at = '$email_time', expires_at='$expiry_time' WHERE email='$email'";
        }
    } else {
        $attempts = 0;
        $q = "INSERT INTO  password_token  (email, otp, created_at,expires_at,otp_attempts,last_resend) VALUES ('$email', '$otp', '$email_time','$expiry_time',$attempts,now())";
    }
    if (sendEmail($email, $subject, $body, "")) {
        if ($con->query($q)) {
            $_SESSION['forgot_email'] = $email;
            $_SESSION['success'] = 'OTP sent to registered email address. the OTP will expire in 2 Minutes.';
            header("Location: verify_otp.php");
            exit();
        } else {
            $_SESSION['error'] = 'Failed to generate OTP and store it in the database';
        }
    } else {
        $_SESSION['error'] = 'Failed to send the OTP in mail. Please try after sometime.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <style>
        /* Custom Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #7d01a3;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #5e0081;
        }

        .form-message {
            text-align: center;
            color: green;
            margin-top: 10px;
        }

        .back-to-login {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-to-login a {
            color: #7d01a3;
            text-decoration: none;
        }

        .back-to-login a:hover {
            text-decoration: underline;
        }
    </style> -->
</head>

<body>
    <?php include 'component/header.php'; ?>
    <section class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h2 class="text-uppercase text-center mb-5">Forgot Password</h2>
                <p class="text-muted text-center mb-4">Enter your email address and we'll send you instructions to reset your password.</p>

                <!-- Display session messages -->
                <?php
                if (isset($_SESSION['success'])) {
                    echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
                    unset($_SESSION['success']); // Clear session message
                }
                if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
                    unset($_SESSION['error']); // Clear session message
                }
                ?>

                <form id="forgotPasswordForm" name="forgotPasswordForm" method="post">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email"><i class="fa fa-envelope"></i> Enter your registered email : </label>
                        <input type="email" id="email" name="email" class="form-control" />
                        <div class="email_error text-danger"></div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-md" style="background-color: #0B032D;">Reset Password</button>
                    </div>

                    <p class="text-center text-muted mt-4">
                        Remember your password?
                        <a href="login.php" class="fw-bold text-body"><u>Login here</u></a>
                    </p>
                </form>
            </div>
        </div>
    </section>

    <?php include 'component/footer.php'; ?>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>

    <script>
        $(document).ready(function() {
            $.validator.addMethod("checkEmailPresent", function(value, element) {
                var valid = false;
                $.ajax({
                    type: 'GET',
                    url: 'check_email_registered.php',
                    data: {
                        email: value
                    },
                    async: false,
                    success: function(response) {
                        valid = (response.trim() === 'true'); // .trim() to avoid whitespace
                    }
                });
                return valid;
            }, "Email is valid");

            $('#forgotPasswordForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        checkEmailPresent: true
                    }
                },
                messages: {
                    email: {
                        required: "Email is required",
                        email: "Enter a valid email",
                        checkEmailPresent: "Email is not registered. Please enter a registered email address."
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element) {
                    $(element).addClass('is-valid').removeClass('is-invalid');
                }
            });
        });
    </script>


</body>

</html>