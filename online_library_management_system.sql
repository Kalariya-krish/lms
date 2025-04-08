-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2025 at 05:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `team_name` varchar(100) DEFAULT NULL,
  `team_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `section`, `title`, `content`, `team_name`, `team_image`) VALUES
(1, 'mission', 'Our Mission', 'Our mission is to provide an innovative and user-friendly library experience that meets the needs of our diverse community. We strive to:Offer a wide range of books, digital resources, and multimedia materials.\n\n                    Enhance the accessibility of knowledge through cutting-edge technology and user-focused services.\n\n                    Create a welcoming and inclusive space for learning, research, and cultural enrichment.\n\n                    Support the personal and professional growth of our users by offering programs, workshops, and events that inspire and educate.', NULL, NULL),
(2, 'vision', 'Our Vision', 'At Our Lib Central Library, our vision is to become a leading digital and physical hub of knowledge and learning, accessible to everyone, everywhere. We aim to empower our community by providing a rich and diverse collection of resources, fostering an environment of intellectual curiosity, and promoting lifelong learning.', NULL, NULL),
(3, 'contact', 'Contact Us', 'Location: Rajkot, India|Email: libcentral@onlinelibrary.com|Phone: +91 98765 43210', NULL, NULL),
(4, 'team', NULL, NULL, 'Disha Rudakiya', 'images/disha.jpg'),
(5, 'team', NULL, NULL, 'Mahek Kariyani', 'images/mahek.jpg'),
(6, 'team', NULL, NULL, 'Prarthana', 'images/prarthana.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `last_logout`) VALUES
(1, 'Admin dashboard', 'admin@rkulibrary.com', '$2y$10$WuEJwH0t9eYT0A6qAkBLLOL6jTGFioDgMMfadAzcwe3LYjX2hhJUK', '2025-04-06 17:38:41'),
(2, 'Rudakiya Disha', 'disha@rkulibrary.com', '$2y$10$9ZggoAPlECm2zLL48zDzjeCAFQ3vd8lPyNsZonlHYZ.WP6kG4h5KO', '2025-04-07 11:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `availability` enum('Available','Borrowed') DEFAULT 'Available',
  `total_copies` int DEFAULT '1',
  `available_copies` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `description`, `cover_image`, `category_id`, `availability`, `total_copies`, `available_copies`) VALUES
(16, 'The History of the Ancient World', 'Susan Wise Bauer', '1', 'A comprehensive narrative of ancient civilizations, covering history from the earliest records to the fall of Rome.', 'images.jpg', NULL, 'Available', 6, 1),
(17, 'Sin Eater', 'Megan Campisi', '1', 'A young girl becomes a Sin Eater, uncovering deadly secrets in a world of power and betrayal.', 'book images1.jpg', NULL, 'Borrowed', 10, 0),
(18, 'Three Worlds to Conquer', 'Poul Anderson.', '3', 'A sci-fi tale of war across three planets.', 'images (3).jpg', NULL, 'Borrowed', 10, 0),
(21, 'dwiufwiguwkfnw', 'qjfgnqofho', '2', 'fenwfqhoqhfof', 'bookimage14.jpg', NULL, 'Available', 10, 4),
(22, 'fjfawiubfjbfs', 'aefjqwoifhjqiof', '4', 'wklfjqiofhwsuahnflahl', 'bookimage10.jpg', NULL, 'Borrowed', 10, 0),
(25, '1984', 'George Orwell', 'Dystopian, Political Fiction', 'A dystopian novel set in a totalitarian society under constant surveillance.', '1984.png', NULL, 'Available', 10, 5),
(26, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 'The adventures of Bilbo Baggins in Middle-earth, discovering treasure and fighting dragons.', 'the_hobbit.jpg', NULL, 'Borrowed', 8, 0),
(27, 'To Kill a Mockingbird', 'Harper Lee', 'Classic, Historical Fiction', 'A novel about racial injustice in the deep South during the 1930s, seen through the eyes of a child.', 'to_kill_a_mockingbird.jpg', NULL, 'Available', 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `book_id` int NOT NULL,
  `borrow_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` date NOT NULL,
  `status` enum('Borrowed','Returned') DEFAULT 'Borrowed',
  `returned_date` datetime DEFAULT NULL,
  `fine_amount` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `user_id`, `email_address`, `book_id`, `borrow_date`, `due_date`, `status`, `returned_date`, `fine_amount`) VALUES
(43, 33, 'drudakiya003@rku.ac.in', 18, '2025-04-06 16:32:25', '2025-04-20', 'Borrowed', NULL, 0.00),
(46, 33, 'drudakiya003@rku.ac.in', 16, '2025-04-07 12:44:43', '2025-04-21', 'Borrowed', '2025-04-07 18:52:28', 0.00),
(51, 33, 'drudakiya003@rku.ac.in', 22, '2025-04-07 23:06:07', '2025-04-22', 'Borrowed', NULL, 0.00),
(53, 33, 'drudakiya003@rku.ac.in', 18, '2025-04-08 01:41:08', '2025-04-22', 'Borrowed', NULL, 0.00),
(54, 33, 'drudakiya003@rku.ac.in', 18, '2025-04-08 01:41:29', '2025-04-22', 'Borrowed', NULL, 0.00),
(55, 33, 'drudakiya003@rku.ac.in', 18, '2025-04-08 01:41:43', '2025-04-22', 'Borrowed', NULL, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_requests`
--

CREATE TABLE `borrow_requests` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `request_datetime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `borrow_requests`
--

INSERT INTO `borrow_requests` (`id`, `user_id`, `book_id`, `book_name`, `email_address`, `status`, `request_datetime`) VALUES
(10, 33, 16, 'The History of the Ancient World', 'drudakiya003@rku.ac.in', 'approved', '2025-04-08 07:13:57'),
(12, 33, 18, 'Three Worlds to Conquer', 'drudakiya003@rku.ac.in', 'approved', '2025-04-08 11:21:37'),
(13, 33, 22, 'fjfawiubfjbfs', 'drudakiya003@rku.ac.in', 'pending', '2025-04-08 11:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Fiction'),
(4, 'History'),
(2, 'Non-Fiction'),
(3, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'mahek', 'mahek@gmail.com', 'libcentral', 'i have create a website', '2025-03-29 19:10:38'),
(2, '3,FNI3UFH3I', 'daya@gmail.com', 'IUFUYG', '2F2FBKFBFBKC', '2025-04-02 04:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_token`
--

CREATE TABLE `password_token` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `otp` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `expires_at` timestamp NOT NULL,
  `otp_attempts` int NOT NULL,
  `last_resend` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_token`
--

INSERT INTO `password_token` (`id`, `email`, `otp`, `created_at`, `expires_at`, `otp_attempts`, `last_resend`) VALUES
(2, 'kkalariya174@rku.ac.in', '359823', '2025-04-08 04:21:21', '2025-04-08 04:23:21', 3, '2025-04-08 09:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int NOT NULL,
  `otp_generated_at` datetime NOT NULL,
  `otp_attempts` int DEFAULT '0',
  `otp_blocked_until` datetime DEFAULT NULL,
  `otp_expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `email`, `otp`, `otp_generated_at`, `otp_attempts`, `otp_blocked_until`, `otp_expiry`) VALUES
(5, 'drudakiya003@rku.ac.in', 231703, '2025-04-07 11:46:51', 1, NULL, '2025-04-07 11:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `reset_passwords`
--

CREATE TABLE `reset_passwords` (
  `id` int NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `otp_generated_at` datetime NOT NULL,
  `otp_expiry` datetime NOT NULL,
  `is_verified` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','User') DEFAULT 'User',
  `status` enum('Active','Suspended') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_me` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Inactive',
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `name`, `email_address`, `password`, `remember_me`, `created_at`, `token`, `status`, `last_logout`) VALUES
(30, 'mahek', 'mahekkariyani2005@gmail.com', '$2y$10$JtNwcPpFuP.htWscCelp3unlq7PqrqP72CYeHYTtvgGduiYd7E3jC', 0, '2025-04-01 16:25:04', 'c7ea1f2235d26dd1a6f7bbe8e5d54cf6', 'Active', NULL),
(33, 'disha', 'drudakiya003@rku.ac.in', '$2y$10$8YnXZKPmw81n.3tSBOcsxO4VFraJ7lIIcKGCM9/Rm3Q00xupyIddS', 0, '2025-04-02 04:38:52', NULL, 'Active', '2025-04-08 04:48:44'),
(37, 'mahek', 'mkariyani376@rku.ac.in', '$2y$10$qWqL/6rBb8WfIyfsBvhWiutOS15mHZtMo5d84ZQ3EB8gyFe7YLu/u', 0, '2025-04-08 03:59:22', '83f0b47f80f4c144e3ae2bc258c14e3a', 'Inactive', NULL),
(38, 'disha rudakiya', 'rudakiyadisha@gmail.com', '$2y$10$c6pmRTlWvFHNeUbOq12KVe9KOaTGiN5ZyF3TDOIEx2JloYpV6tyAu', 0, '2025-04-08 04:20:12', '0df15c68d621842fb8768ea711615ee8', 'Inactive', NULL),
(39, 'KKK', 'kkalariya174@rku.ac.in', 'Het@2006', 0, '2025-04-08 09:40:56', NULL, 'Active', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowed_books_ibfk_1` (`user_id`),
  ADD KEY `borrowed_books_ibfk_2` (`book_id`);

--
-- Indexes for table `borrow_requests`
--
ALTER TABLE `borrow_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_token`
--
ALTER TABLE `password_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `borrow_requests`
--
ALTER TABLE `borrow_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password_token`
--
ALTER TABLE `password_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_registration` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowed_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
