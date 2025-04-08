<?php
include '../../../includes/db_config.php';

if (!isset($_GET['id'])) {
    die("Invalid Request!");
}

$book_id = $_GET['id'];

// Fetch existing book details
$stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if (!$book) {
    die("Book not found!");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $availability = $_POST['availability'];

    // File Upload Handling
    if ($_FILES['cover_image']['name']) {
        $target_dir = "uploads/";
        $new_cover = basename($_FILES['cover_image']['name']);
        $target_file = $target_dir . $new_cover;

        // Move new file to server
        if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file)) {
            // Delete old cover image if exists
            $old_cover_path = "uploads/" . $book['cover_image'];
            if (file_exists($old_cover_path) && !empty($book['cover_image'])) {
                unlink($old_cover_path);
            }
        } else {
            echo "<script>alert('Error uploading file!');</script>";
        }
    } else {
        $new_cover = $book['cover_image']; // Keep existing image if no new upload
    }

    // Update book details
    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, category=?, description=?, availability=?, cover_image=? WHERE id=?");
    $stmt->bind_param("ssssssi", $title, $author, $category, $description, $availability, $new_cover, $book_id);

    if ($stmt->execute()) {
        echo "<script>alert('Book updated successfully!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error updating book!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Edit Book</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="<?= $book['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" class="form-control" name="author" value="<?= $book['author'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" class="form-control" name="category" value="<?= $book['category'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" required><?= $book['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Availability</label>
            <select class="form-control" name="availability">
                <option value="Available" <?= $book['availability'] == 'Available' ? 'selected' : '' ?>>Available</option>
                <option value="Unavailable" <?= $book['availability'] == 'Unavailable' ? 'selected' : '' ?>>Unavailable</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <input type="file" class="form-control" name="cover_image">
            <img src="uploads/<?= $book['cover_image'] ?>" class="mt-2" width="100" alt="Current Cover">
        </div>
        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
