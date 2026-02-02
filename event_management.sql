-- phpMyAdmin SQL Dump
-- version 5.2.3-1.el10_2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2026 at 03:10 AM
-- Server version: 10.11.15-MariaDB
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `np02cs4a240023`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `event_id`, `name`, `email`) VALUES
(1, 1, 'Shraddha', 'shraddha@gmail.com'),
(2, 3, 'Martin', 'martin@gmail.com'),
(3, 6, 'Aarti', 'aarti@gmail.com'),
(4, 6, 'Juhoon', 'juhoon@gmail.com'),
(5, 6, 'Keonho', 'keonho@gmail.com'),
(6, 6, 'Jimin', 'jimin@gmail.com'),
(7, 3, 'Namjoon', 'namjoon@gmil.com'),
(8, 3, 'Woojin', 'woojin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `location`, `event_date`, `created_at`) VALUES
(1, 'Carnival', 'Biratnagar', '2026-02-19', '2026-02-02 02:35:06'),
(2, 'Next Gen', 'Biratnagar', '2026-04-30', '2026-02-02 02:54:04'),
(3, 'Holi', 'Rangeli', '2026-02-26', '2026-02-02 02:54:22'),
(4, 'Wedding ', 'Kathmandu', '2026-05-19', '2026-02-02 02:55:59'),
(5, 'Fusion', 'Kathmandu', '2026-05-29', '2026-02-02 02:58:03'),
(6, 'Concert', 'Rangeli', '2026-02-17', '2026-02-02 02:59:06'),
(7, 'Birat Expo', 'Biratnagar', '2026-03-24', '2026-02-02 02:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `created_at`) VALUES
(21, 'A day in my life', 'Shraddha', 'This is the day in Shraddha life blog.', '2026-01-12 04:51:29'),
(22, 'Outfit Of The Day', 'Martin', 'I am a fashion Killer.', '2026-01-12 04:52:09'),
(23, 'Lets Chit Chat', 'Juhoon', 'I am bored today.', '2026-01-12 04:52:44'),
(24, 'Dance with me', 'James', 'As always lets dance.', '2026-01-12 04:53:05'),
(25, 'Song cover', 'Keonho', 'Todays cover is Fashion by cortis.', '2026-01-12 04:53:31'),
(27, 'Coursework', 'Shraddha', 'my coursework is comming', '2026-01-27 06:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(10) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `full_name`, `age`, `gender`, `phone`) VALUES
(1, 'Martin Edward', '17', 'Male', 1234567890),
(2, 'Shraddha Adhikari', '21', 'Female', 1432765841);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `attendees_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
