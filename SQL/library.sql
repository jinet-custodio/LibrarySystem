-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 05:19 PM
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
(1, 'College Algebra 12th Edition', '2021', 'R. David Gustafson & Jeff Hughes', 'The College Algebra 12th Edition revision focused on improving relevance and representation as well as mathematical clarity and accuracy. Introductory narratives, examples, and problems were reviewed and revised using a diversity, equity, and inclusion framework. Many contexts, scenarios, and images have been changed to become even more relevant to students’ lives and interests. To maintain our commitment to accuracy and precision, examples, exercises, and solutions were reviewed by multiple faculty experts. All improvement suggestions and errata updates from the first edition were considered and unified across the different formats of the text.', 'CollegeAlgebra.jpg', 'math'),
(3, 'Merriam Websters Collegiate Dictionary (Eleventh Edition)', '2004', 'Merriam Webster, Incorporated', 'The Eleventh Edition of America’s Best-Selling Dictionary defines the current, active vocabulary of American English and is updated on an ongoing basis.', 'MerriamWebster11th.png', 'general'),
(4, 'The World Book Encyclopedia', '1985 ', 'Typhoon International Corp', 'An encyclopedia designed especially to meet the needs of elementary, junior high, and high school students.', 'WorldBookEncyclopedia.jpg', 'general'),
(5, 'The 21st Century Websters International Encyclopedia (First Edition)', '2003', 'Typhoon International Corp', 'An illustrated encyclopedia includes over seventeen thousand entries with seven thousand cross-references and a forty-eight page Rand McNally atlas.', '21stCENTURY WEBSTER.jpg', 'general'),
(6, 'The New Book of Knowledge', '2000', 'Harcourt, Brace & World INC.', 'An illustrated encyclopedia with articles on history, literature, art and music, geography, mathematics, science, sports, and other topics. Some articles include activities, games, or experiments.', 'NewBookofKnowledge.jpg', 'general'),
(7, 'Business Mathematics (Fourth Edition)', '2003', 'Highland, Esther H. & Rosenbaum, Roberta S.', 'The new edition of Business Mathematics inches on its earlier editions and continues to provide a comprehensive coverage of important topics and concepts in business mathematics. The text integrates the standard curriculum and the manifold requirements of undergraduate business maths students.', 'BusinessMathematics.jpg', 'math'),
(8, 'Calculus: Graphical, Numerical, Algebraic', '2003', 'Finney, Ross L. et al.', 'Calculus: Graphical, Numerical, Algebraic guides students to a deep understanding of advanced mathematical concepts with a structure that prepares them for the AP® examination at the end of the year.', 'Calculus.jpg', 'math'),
(9, 'Basic Calculus (Senior High School)', '2018', 'Francisco,Flordeliza  F. & Graciano, Agnes S.', 'Basic Calculus for Senior High School is specifically designed according to the standards established by the Department of Education (DepEd) for the Grade 11 Science, Technology, Engineering, and Mathematics (STEM) specialized subject in Basic Calculus. The preparation of this book is guided by the subject description, content and performance standards, and learning competencies set by the DepEd for Basic Calculus. This book is composed of three chapters, namely, Limits and Continuity, Basic Concepts of Derivatives and Their Applications, and Integrals. Each chapter has an introduction about the topic.', 'BasicCalculus.jpg', 'math'),
(10, 'Thermodynamics', '1977', 'Kenneth Wark', 'This edition of \"Thermodynamics\" continues the tradition of providing a fundamentally sound, well-written, technically accurate text. This new edition addresses the needs of today\'s marketplace through the following a greater emphasis on thermoeconomics and current real world applications, more design problems, more real world and visual problems, a re-vamped design and a stronger pedagogical program. The book will also be available with or without EES (Engineering Equation Solver) Problems Disk. Professor Donald E. Richards of Rose-Hulman Institute of Technology has been added as a co-author for this edition.', 'Thermodynamics.jpg', 'sci'),
(11, 'Chemistry', '2006', 'Person Education', 'No description Found', 'Chemistry.jpg', 'sci'),
(12, 'Biology', '2001', 'Meil A. Campbell', 'Neil Campbell and Jane Reece\'s BIOLOGY remains unsurpassed as the most successful majors biology textbook in the world. This text has invited more than 4 million students into the study of this dynamic and essential discipline.The authors have restructured each chapter around a conceptual framework of five or six big ideas. An Overview draws students in and sets the stage for the rest of the chapter, each numbered Concept Head announces the beginning of a new concept, and Concept Check questions at the end of each chapter encourage students to assess their mastery of a given concept. New Inquiry Figures focus students on the experimental process, and new Research Method Figures illustrate important techniques in biology. Each chapter ends with a Scientific Inquiry Question that asks students to apply scientific investigation skills to the content of the chapter.', 'Biology.jpg', 'sci'),
(13, 'Geology Today', '1944', 'John Wiley et al.', 'No description Found', 'GeologyToday.jpg', 'sci'),
(14, 'Conceptual Physics', '1942', 'Addison-Wesley', 'Conceptual Physics defined the liberal arts physics course over 30 years ago and continues as the benchmark. Guided by the principle of concepts before calculations, the text engages you with real-world analogies and imagery. Together they build a strong conceptual understanding of physical principles, ranging from classical mechanics to modern physics.', 'ConceptualPhysics.jpg', 'sci'),
(15, 'Textbook on the Philippine Constitution', '2002', 'Hector S. De Leon', '', 'PhilippineConst.jpg', 'fili'),
(16, 'The Cooperative Laws in the Philippines', '1996', 'Jose N. Nolledo', '', 'CooperativeLaws.jpg', 'fili'),
(17, 'The National Building Code', '2006', 'Vicente B. Foz', '', 'NationalBuildingCode.jpg', 'fili'),
(18, 'The New Philippine Constitution Explained', '1981', 'Aruego, Aruego Torres', '', 'PhilippineConstitutionExplained.jpg', 'fili'),
(19, 'History of the Filipino People', '1990', 'Teodoro A. Agoncillo', '', 'HistoryFilipinoPeople.jpg', 'fili'),
(20, 'Civil Engineering Licensure Examination', '1998', 'Venancio I. Besavilla', 'Licensure Examinations for Civil Engineers Reviewer by V. Besavilla', 'CivilEngineeringLicensure.jpg', 'eng'),
(21, '1001 Solved Problems in Electrical Engineering', '2001', 'Jaime R. Tiong', 'No description found', 'SolvedProblems.jpg', 'eng'),
(22, 'Engineering Economy', '1993', 'Matias Arreola', 'The primary purpose in writing this book is to augment and supplement the theories and problems encountered by the engineering student with a comprehensive set of selected solved problems to serves as patterns for problem solution, and to guide him or her in the review for Licensure Examinations required for the practice of the engineering professions.', 'EngineeringEconomy.jpg', 'eng'),
(23, 'Project Construction Management', '2000', 'Max B. Fajardo Jr.', 'This book introduces the basic concept of project management. It presents some of the behavioral aspects of construction management along with some difficulties a project manager may encounter.', 'ProjectConstruction.jpg', 'eng'),
(24, 'Engineering Mechanics', '1986', 'Venancio I. Besavilla', 'Original BESAVILLA review book on Engineering Mechanics. Contains problems and solutions to problems related to Engineering Mechanics\r\nfor the Engineering licensure exams.', 'EngineeringMechanics.jpg', 'eng');

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
(13, 'ebook', 'Electronic (e-books)'),
(9, 'educ', 'Education'),
(8, 'eng', 'Engineering'),
(4, 'fili', 'Filipiniana'),
(5, 'filo', 'Filipino'),
(7, 'food', 'Food'),
(1, 'general', 'General Knowledge'),
(11, 'it', 'Information Technology'),
(12, 'mag', 'Magazine'),
(2, 'math', 'Mathematics'),
(6, 'pocket', 'Pocket Books'),
(10, 'research', 'Research'),
(3, 'sci', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userID` int(11) NOT NULL,
  `idNumber` int(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','staff','faculty') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userID`, `idNumber`, `password`, `role`) VALUES
(1, 2022000422, 'hehejinet23', 'student');

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
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
