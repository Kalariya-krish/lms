<?php
include 'includes/db_config.php';

$sql = "SELECT * FROM books";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            border-radius: 10px;
            height: 400px;
            object-fit: cover;
        }

        .book-title {
            font-weight: bold;
            font-size: 1.3rem;
            color: #333;
        }

        .book-author,
        .book-genre,
        .book-rating {
            font-size: 1rem;
            color: #6c757d;
        }

        .book-description {
            font-size: 0.9rem;
            color: #555;
            margin-top: 10px;
        }

        .availability-status {
            font-weight: bold;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        .availability-status.available {
            color: green;
        }

        .availability-status.unavailable {
            color: red;
        }

        .btn-custom {
            width: 100%;
        }

        @media (max-width: 576px) {
            .book-title {
                font-size: 1.1rem;
            }

            .book-author,
            .book-genre,
            .book-rating,
            .book-description {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <?php include 'component/header.php'; ?>
    <div class="container my-5">
        <div class="row align-items-stretch">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 p-2 d-flex">
                    <div class="card flex-fill">
                        <img src="assets/images/<?php echo $row['cover_image']; ?>" alt="<?php echo $row['title']; ?> Cover" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                            <h5 class="book-title"><?php echo $row['title']; ?></h5>
                            <p class="book-author">by <?php echo $row['author']; ?></p>
                            <p class="book-genre">Genre: <?php echo $row['category']; ?></p>
                            <p class="book-description flex-grow-1"><?php echo $row['description']; ?></p>
                            <p class="availability-status <?php echo ($row['availability'] == 'Available') ? 'available' : 'unavailable'; ?>">
                                <?php echo $row['availability']; ?>
                            </p>
                            <button class="btn btn-primary btn-custom" onclick="borrowBook()">Borrow Book</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <div class="container py-3 -center">
        <a href="./user_dashboard/userdashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div>
    <div>
        <?php include 'component/footer.php'; ?>
    </div>

    <script>
        function borrowBook() {
            alert("The book has been borrowed!");
        }

        function viewDetails() {
            alert("Redirecting to book details page...");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>