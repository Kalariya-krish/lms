<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Security & Access Control</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .section-container {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
            background-color: black;
            height: 40px;
        }
        .btn-custom {
            width: 100%;
        }
        .container-spacing {
            margin-bottom: 30px;
        }
        .profile-img-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .activity-logs {
            white-space: pre-wrap;
            word-wrap: break-word;
            font-family: monospace;
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 10px;
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <h2 class="text-center text-white py-3" style="background-color: #7d01a3;">Security</h2>

    <!-- Admin User Management Section -->
    <div class="section-container container-spacing">
        <h5 class="section-title text-center">Admin User Management</h5>
        <form>
            <div class="mb-3">
                <label class="form-label">Admin Name</label>
                <input type="text" class="form-control" placeholder="Enter admin's name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Admin Email</label>
                <input type="email" class="form-control" placeholder="Enter admin's email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Assign Role</label>
                <select class="form-select">
                    <option value="Super Admin">Super Admin</option>
                    <option value="Librarian">Librarian</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary btn-custom">Add Admin</button>
        </form>
    </div>

    <!-- Change Admin Password Section -->
    <div class="section-container container-spacing">
        <h5 class="section-title text-center">Change Admin Password</h5>
        <form>
            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" placeholder="Enter current password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control" placeholder="Enter new password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" placeholder="Confirm new password" required>
            </div>
            <button type="submit" class="btn btn-secondary btn-custom">Change Password</button>
        </form>
    </div>

    <!-- Activity Logs Section -->
    <div class="section-container container-spacing">
        <h5 class="section-title text-center">Activity Logs</h5>
        <div class="activity-logs">
            [2025-02-06] Admin John updated user roles.<br>
            [2025-02-06] Admin Jane changed the library hours.<br>
            [2025-02-06] Admin David reset the password for user xyz.<br>
        </div>
    </div>

    <div class="container py-3 text-left">
        <a href="../../admin_dashboard/pages/admin_dashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Preview Profile Image before upload
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profilePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</body>
</html>
