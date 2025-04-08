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
        <div class="row">
            <!-- Book 1 -->
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                <div class="card">
                    <img src="assets/images/bookimage2.jpg" alt="1984 Book Cover" class="card-img-top">
                    <div class="card-body">
                        <h5 class="book-title">1984</h5>
                        <p class="book-author">by George Orwell</p>
                        <p class="book-genre">Genre: Dystopian, Political Fiction</p>
                        <!-- <p class="book-rating">Rating: ★★★★☆ (4.5)</p> -->
                        <p class="book-description">
                            A dystopian novel set in a totalitarian society under constant surveillance.
                        </p>
                        <p class="availability-status available">Available</p>
                        <button class="btn btn-primary btn-custom" onclick="borrowBook()">Borrow Book</button>
                       
                    </div>
                </div>
            </div>

            <!-- Book 2 -->
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                <div class="card">
                    <img src="assets/images/bookimage12.jpg" alt="The Hobbit Book Cover" class="card-img-top">
                    <div class="card-body">
                        <h5 class="book-title">The Hobbit</h5>
                        <p class="book-author">by J.R.R. Tolkien</p>
                        <p class="book-genre">Genre: Fantasy</p>
                        <!-- <p class="book-rating">Rating: ★★★★★ (5.0)</p> -->
                        <p class="book-description">
                            The adventures of Bilbo Baggins in Middle-earth, discovering treasure and fighting dragons.
                        </p>
                        <p class="availability-status unavailable">Borrowed</p>
                        <button class="btn btn-primary btn-custom" onclick="borrowBook()">Borrow Book</button>
                       
                    </div>
                </div>
            </div>

            <!-- Book 3 -->
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                <div class="card">
                    <img src="assets/images/bookimage10.jpg" alt="To Kill a Mockingbird Book Cover" class="card-img-top">
                    <div class="card-body">
                        <h5 class="book-title">To Kill a Mockingbird</h5>
                        <p class="book-author">by Harper Lee</p>
                        <p class="book-genre">Genre: Classic, Historical Fiction</p>
                        <!-- <p class="book-rating">Rating: ★★★★☆ (4.3)</p> -->
                        <p class="book-description">
                            A novel about racial injustice in the deep South during the 1930s, seen through the eyes of a child.
                        </p>
                        <p class="availability-status available">Available</p>
                        <button class="btn btn-primary btn-custom" onclick="borrowBook()">Borrow Book</button>
                        
                    </div>
                </div>
            </div>

            <!-- Book 4 -->
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                <div class="card">
                    <img src="assets/images/bookimage14.jpg" alt="Pride and Prejudice Book Cover" class="card-img-top">
                    <div class="card-body">
                        <h5 class="book-title">Pride and Prejudice</h5>
                        <p class="book-author">by Jane Austen</p>
                        <p class="book-genre">Genre: Romance, Classic</p>
                        <!-- <p class="book-rating">Rating: ★★★★☆ (4.2)</p> -->
                        <p class="book-description">
                            A story of love, class, and the pursuit of happiness in 19th-century England.
                        </p>
                        <p class="availability-status available">Available</p>
                        <button class="btn btn-primary btn-custom" onclick="borrowBook()">Borrow Book</button>
                        
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                <div class="card">
                    <img src="assets/images/bookimage10.jpg" alt="To Kill a Mockingbird Book Cover" class="card-img-top">
                    <div class="card-body">
                        <h5 class="book-title">To Kill a Mockingbird</h5>
                        <p class="book-author">by Harper Lee</p>
                        <p class="book-genre">Genre: Classic, Historical Fiction</p>
                        <!-- <p class="book-rating">Rating: ★★★★☆ (4.3)</p> -->
                        <p class="book-description">
                            A novel about racial injustice in the deep South during the 1930s, seen through the eyes of a child.
                        </p>
                        <p class="availability-status available">Available</p>
                        <button class="btn btn-primary btn-custom" onclick="borrowBook()">Borrow Book</button>
                       
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                <div class="card">
                    <img src="assets/images/bookimage11.jpg" alt="To Kill a Mockingbird Book Cover" class="card-img-top">
                    <div class="card-body">
                        <h5 class="book-title">To Kill a Mockingbird</h5>
                        <p class="book-author">by Harper Lee</p>
                        <p class="book-genre">Genre: Classic, Historical Fiction</p>
                        <!-- <p class="book-rating">Rating: ★★★★☆ (4.3)</p> -->
                        <p class="book-description">
                            A novel about racial injustice in the deep South during the 1930s, seen through the eyes of a child.
                        </p>
                        <p class="availability-status available">Available</p>
                        <button class="btn btn-primary btn-custom" onclick="borrowBook()">Borrow Book</button>
                        
                    </div>
                </div>
            </div>

            
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
