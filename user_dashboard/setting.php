<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile & Settings - Library Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
        }

        .container {
            margin-top: 50px;
        }

        .profile-section,
        .settings-section {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-section h4 {
            font-size: 24px;
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-group label {
            font-weight: bold;
        }

        label.error {
            color: red;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs" id="profileSettingsTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="profileSettingsTabsContent">
            <!-- Profile Section -->
            <div class="tab-pane fade show active profile-section" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="text-center">
                    <img src="https://via.placeholder.com/150" alt="Profile Image" class="profile-img">
                    <h4>John Doe</h4>
                    <p>Email: <a href="mailto:johndoe@example.com">johndoe@example.com</a></p>
                    <button class="btn btn-primary">Edit Profile</button>
                </div>
            </div>

            <!-- Settings Section -->
            <div class="tab-pane fade settings-section" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <h4>Account Settings</h4>

                <!-- Settings Form -->
                <form id="settingsForm">
                    <!-- Change Email -->
                    <div class="form-group">
                        <label for="newEmail">New Email Address</label>
                        <input type="email" class="form-control" id="newEmail" name="newEmail" placeholder="Enter your new email">
                    </div>

                    <!-- Change Password -->
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>

        <!-- Back Button -->
        <div class="container py-3 text-start">
            <a href="../user_dashboard/userdashboard.php" class="btn btn-secondary">
                <i class="fa-solid fa-backward"></i> <strong>Back</strong>
            </a>
        </div>

    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Validate Settings Form
            $('#settingsForm').validate({
                rules: {
                    newEmail: {
                        required: true,
                        email: true
                    },
                    newPassword: {
                        required: true,
                        minlength: 6
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#newPassword"
                    }
                },
                messages: {
                    newEmail: {
                        required: "Please enter a valid email address.",
                        email: "Please enter a valid email format."
                    },
                    newPassword: {
                        required: "Please enter a new password.",
                        minlength: "Password must be at least 6 characters long."
                    },
                    confirmPassword: {
                        required: "Please confirm your password.",
                        equalTo: "Passwords do not match."
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                highlight: function(element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element) {
                    $(element).removeClass("is-invalid");
                }
            });
        });
    </script>

</body>

</html>