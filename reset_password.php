<?php
session_start();
include_once('includes/db_config.php');

if (isset($_POST['reset_password'])) {
    if (isset($_SESSION['forgot_email'])) {
        $email = $_SESSION['forgot_email'];
        $password = $_POST['new_password'];

        // Update the user's password in the users table (assuming the table is named 'users')
        $update_query = "UPDATE user_registration SET password = '$password' WHERE email_address = '$email'";
        if (mysqli_query($con, $update_query)) {
            // Delete the token from the password_token table
            $delete_query = "DELETE FROM password_token WHERE email = '$email'";
            mysqli_query($con, $delete_query);
            unset($_SESSION['forgot_email']);
            $_SESSION['success'] = 'Password has been reset successfully.';
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = 'Error in resetting Password.';
            header("Location: forgot_password.php");
            exit();
        }
    } else {
        $_SESSION['error'] = 'No email found for resetting password.';
        header("Location: forgot_password.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>

<body>
    <?php include 'component/header.php'; ?>

    <section class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h2 class="text-uppercase text-center mb-4">Reset Password</h2>
                <p class="text-muted text-center mb-4">Please enter your new password below.</p>

                <form id="resetPasswordForm" action="reset_password.php" method="post">
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Confirm Password</label>
                        <input type="test" name="confirm_password" class="form-control" id="confirm_password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="reset_password" class="btn btn-success btn-md" style="background-color: #0B032D;">Update Password</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="login.php" class="text-decoration-none">Back to Login</a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'component/footer.php'; ?>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>

    <script>
        $(document).ready(function() {
            $("resetPasswordForm").validate({
                rules: {
                    new_password: {
                        required: true,
                        minlength: 6
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#new_password"
                    }
                },
                messages: {
                    new_password: {
                        required: "Please enter your new password",
                        minlength: "Password must be at least 6 characters long"
                    },
                    confirm_password: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
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