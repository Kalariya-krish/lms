<?php
include '../../../includes/db_config.php'; // Include database connection

$title = "";
$author = "";
$category = "";
$description = "";
$cover_image = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
        $cover_image = basename($_FILES['cover_image']['name']);
        $target_dir = "uploads/";

        // Ensure the uploads directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . $cover_image;
        $file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        // Validate file type
        if (!in_array($file_ext, $allowed_types)) {
            $errorMessage = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } else {
            move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file);
        }
    } else {
        $cover_image = "";
    }

    // Check for empty fields
    if (empty($title) || empty($author) || empty($category) || empty($description) || empty($cover_image)) {
        $errorMessage = "All fields are required, including cover image.";
    } else {
        // Insert into database
        $sql = "INSERT INTO books (title, author, category, description, cover_image, availability) 
                VALUES (?, ?, ?, ?, ?, 'Available')";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $title, $author, $category, $description, $cover_image);

        if ($stmt->execute()) {
            $successMessage = "Book added successfully!";
            $title = $author = $category = $description = "";
        } else {
            $errorMessage = "Error adding book: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Add Book</h2>

        <?php if (!empty($errorMessage)) : ?>
            <div class="alert alert-danger"><?= $errorMessage ?></div>
        <?php endif; ?>

        <?php if (!empty($successMessage)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $successMessage ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <form id="bookForm" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?= $title ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" class="form-control" name="author" value="<?= $author ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-control" name="category" required>
                    <option value="">Select Category</option>
                    <?php
                    $categoryQuery = "SELECT * FROM categories";
                    $categoryResult = $conn->query($categoryQuery);
                    while ($row = $categoryResult->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" required><?= $description ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Cover Image</label>
                <input type="file" class="form-control" name="cover_image" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-outline-secondary" href="index.php">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#bookForm").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 2
                    },
                    author: {
                        required: true,
                        minlength: 2
                    },
                    category: {
                        required: true
                    },
                    description: {
                        required: true,
                        minlength: 10
                    },
                    cover_image: {
                        required: true,
                        extension: "jpg|jpeg|png|gif"
                    }
                },
                messages: {
                    title: {
                        required: "Please enter the book title.",
                        minlength: "Title must be at least 2 characters."
                    },
                    author: {
                        required: "Please enter the author's name.",
                        minlength: "Author name must be at least 2 characters."
                    },
                    category: {
                        required: "Please select a category."
                    },
                    description: {
                        required: "Please enter the description.",
                        minlength: "Description must be at least 10 characters."
                    },
                    cover_image: {
                        required: "Please upload a cover image.",
                        extension: "Only JPG, JPEG, PNG, and GIF files are allowed."
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                }
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
