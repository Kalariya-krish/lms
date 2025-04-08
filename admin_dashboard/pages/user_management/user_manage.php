<?php
include '../../../includes/db_config.php';




// Fetch all users
$result = $conn->query("SELECT * FROM user_registration");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .user-management-heading {
            background-color: #6a1b9a;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
<!-- User Management Heading -->
<div class="container mt-4">
        <h2 class="user-management-heading"> User Management</h2>
    </div>

    <!-- Alert Messages -->
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php } ?>

    <table class="table table-bordered container mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email_address'] ?></td>
                <td>
                    <span class="badge <?= $user['status'] == 'Active' ? 'bg-success' : 'bg-danger' ?>">
                        <?= $user['status'] ?>
                    </span>
                </td>
                <td>
                    <a href="suspend.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">
                        <?= ($user['status'] == 'Active') ? 'Suspend' : 'Activate' ?>
                    </a>
                    <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm delete-btn">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $(".delete-btn").click(function(e) {
            if (!confirm("Are you sure you want to delete this user?")) {
                e.preventDefault();
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
