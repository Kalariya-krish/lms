<?php
include '../../../includes/db_config.php';

// Fetch books from database
$result = $conn->query("SELECT * FROM books");

if(!$result){
    die("invalid query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Book Management</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <style>
        body { background-color: #f8f9fa; }
        .book-management-heading { background-color: #6a1b9a; color: white; padding: 15px; text-align: center; border-radius: 8px; margin-bottom: 20px; }
        .book-cover { width: 50px; height: 70px; object-fit: cover; }
        .error { color: red; font-size: 0.875rem; }

        .action-buttons a {
    margin-right: 5px; /* Adds spacing between buttons */
    margin-bottom: 10px;
    margin-left: 10px;
}

    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="book-management-heading">Book Management</h2>
    <input type="text" id="searchBook" class="form-control mb-3" placeholder="Search for a book...">
    
    <!-- <a class="btn btn-primary" href="create.php" id="addNewBook" data-bs-toggle="modal" data-bs-target="#addBookModal">Add New Book</></a> -->
    <button class="btn btn-primary" id="addNewBook">Add New Book</button>

<script>
    $(document).ready(function () {
        $("#addNewBook").click(function () {
            window.location.href = "addbook.php";
        });
    });
</script>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><img src="uploads/<?= $row['cover_image'] ?>" class="book-cover" alt="Book Cover"></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['category'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><span class="badge <?= $row['availability'] == 'Available' ? 'bg-success' : 'bg-danger' ?>"><?= $row['availability'] ?></span></td>
                    <td class="action-buttons">
                    
                    <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                    </td>

                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container py-3 -center">
        <a href="./../../pages/admin_dashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div> 



<script>
$(document).ready(function () {
    $("#bookForm").validate();
    $(".editBook").click(function () {
        let bookId = $(this).data("id");
        $.get("get_book.php?id=" + bookId, function (data) {
            let book = JSON.parse(data);
            $("#bookId").val(book.id);
            $("input[name=title]").val(book.title);
            $("input[name=author]").val(book.author);
            $("input[name=category]").val(book.category);
            $("textarea[name=description]").val(book.description);
            $("#addBookModal").modal("show");
        });
    });
});
</script>

</body>
</html>
