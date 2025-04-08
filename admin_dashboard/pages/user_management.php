<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Management</title>

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
        body {
            background-color: #f8f9fa;
        }
        
        .user-management-heading {
            background-color: #6a1b9a;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
            width: 100%;
        }
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        .text-danger {
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- User Management Heading -->
    <div class="container mt-4">
        <h2 class="user-management-heading"> User Management</h2>
    </div>

    <!-- Search & Add User Buttons -->
    <div class="container d-flex flex-column align-items-start mt-4">
        <input type="text" id="searchUser" class="form-control w-100" placeholder=" Search for a user...">
        <div class="mt-4">
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addUserModal" id="addNewUser"> Add User</button>
        </div>
    </div>

    <!-- User Table -->
    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <tr>
                        <td>1</td>
                        <td class="user-name">Raj Patel</td>
                        <td class="user-email">raj@example.com</td>
                        <td class="user-role">Admin</td>
                        <td class="user-status"><span class="badge bg-success">Active</span></td>
                        <td class="action-buttons">
                            <button class="btn btn-warning btn-sm editUser"> Edit</button>
                            <button class="btn btn-danger btn-sm"> Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="user-name">Priya Das</td>
                        <td class="user-email">priya@example.com</td>
                        <td class="user-role">User</td>
                        <td class="user-status"><span class="badge bg-danger">Suspended</span></td>
                        <td class="action-buttons">
                            <button class="btn btn-warning btn-sm editUser"> Edit</button>
                            <button class="btn btn-danger btn-sm"> Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <input type="hidden" name="userId" id="userId"> <!-- Hidden ID field -->

                        <div class="mb-3">
                            <label class="form-label"> Name</label>
                            <input type="text" class="form-control" name="userName" id="userName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Email</label>
                            <input type="email" class="form-control" name="userEmail" id="userEmail">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Role</label>
                            <select class="form-control" name="userRole" id="userRole">
                                <!-- <option value="">Select Role</option> -->
                                <option>Admin</option>
                                <option>User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Status</label>
                            <select class="form-control" name="userStatus" id="userStatus">
                                <option value="">Select Status</option>
                                <option>Active</option>
                                <option>Suspended</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-4"> Save User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-3 -center">
        <a href="../../admin_dashboard/pages/admin_dashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div>

    <!-- jQuery Validation & Edit Button Handling -->
    <script>
    $(document).ready(function () {
        // Open modal for adding new user
        $("#addNewUser").click(function () {
            $("#userId").val(""); // Clear ID field
            $("#userForm")[0].reset(); // Reset form fields
            $("#addUserModalLabel").text("Add User"); // Change modal title
        });

        // Populate form when clicking "Edit"
        $(".editUser").click(function () {
            let row = $(this).closest("tr");
            $("#userId").val(row.find("td:first").text()); // Set hidden user ID
            $("#userName").val(row.find(".user-name").text());
            $("#userEmail").val(row.find(".user-email").text());
            $("#userRole").val(row.find(".user-role").text());
            $("#userStatus").val(row.find(".user-status span").text());
            $("#addUserModalLabel").text("Edit User"); // Change modal title
            $("#addUserModal").modal("show"); // Open modal
        });

        // jQuery Validation Setup for User Form
        $("#userForm").validate({
            rules: {
                userName: {
                    required: true,
                    minlength: 3,
                    lettersonly: true  // Name must contain only letters
                },
                userEmail: {
                    required: true,
                    email: true
                },
                userRole: {
                    required: true
                },
                userStatus: {
                    required: true
                }
            },
            messages: {
                userName: {
                    required: "Please enter your name",
                    minlength: "Name must be at least 3 characters",
                    lettersonly: "Name can only contain letters (A-Z, a-z)"
                },
                userEmail: "Please enter a valid email",
                userRole: "Please select a role",
                userStatus: "Please select a status"
            },
            errorElement: "div",
            errorPlacement: function (error, element) {
                error.addClass("text-danger");
                error.insertAfter(element);
            },
            submitHandler: function (form) {
                alert("User details saved successfully!");
                $("#addUserModal").modal("hide"); // Close modal
            }
        });

        // Custom rule: Name can only contain letters (A-Z, a-z)
        $.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
        }, "Name can only contain letters (A-Z, a-z)");
    });
</script>

</body>
</html>
