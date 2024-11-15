-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 01:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_published` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `name`, `date_published`, `author`, `description`, `cover`, `category`) VALUES
(1, 'College Algebra 12th Edition', 'Dec 21, 2021', 'R. David Gustafson & Jeff Hughes', 'The College Algebra 12th Edition revision focused on improving relevance and representation as well as mathematical clarity and accuracy. Introductory narratives, examples, and problems were reviewed and revised using a diversity, equity, and inclusion framework. Many contexts, scenarios, and images have been changed to become even more relevant to students’ lives and interests. To maintain our commitment to accuracy and precision, examples, exercises, and solutions were reviewed by multiple faculty experts. All improvement suggestions and errata updates from the first edition were considered and unified across the different formats of the text.', 'CollegeAlgebra.jpeg', 'math');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `abbrev` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `abbrev`, `name`) VALUES
(9, 'educ', 'Education'),
(8, 'eng', 'Engineering'),
(4, 'fili', 'Filipiniana'),
(5, 'filo', 'Filipino'),
(7, 'food', 'Food'),
(1, 'general', 'General Knowledge'),
(11, 'it', 'Information Technology'),
(2, 'math', 'Mathematics'),
(6, 'pocket', 'Pocket Books'),
(10, 'research', 'Research'),
(3, 'sci', 'General Knowledge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`abbrev`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`abbrev`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
