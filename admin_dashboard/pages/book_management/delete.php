<?php
include '../../../includes/db_config.php';

if (!isset($_GET['id'])) {
    die("Invalid Request!");
}

$book_id = $_GET['id'];

// Fetch book details to get cover image path
$stmt = $conn->prepare("SELECT cover_image FROM books WHERE id = ?");
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if (!$book) {
    die("Book not found!");
}

// Delete book from database
$stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
$stmt->bind_param("i", $book_id);

if ($stmt->execute()) {
    // Remove cover image if it exists
    $cover_image_path = "uploads/" . $book['cover_image'];
    if (file_exists($cover_image_path) && !empty($book['cover_image'])) {
        unlink($cover_image_path);
    }

    echo "<script>alert('Book deleted successfully!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Error deleting book!');</script>";
}
?>
