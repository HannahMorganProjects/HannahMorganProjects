-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2023 at 10:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moodjournaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `moods`
--

CREATE TABLE `moods` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `mood_values` varchar(55) NOT NULL,
  `trigger` varchar(255) DEFAULT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moods`
--

INSERT INTO `moods` (`id`, `username`, `mood_values`, `trigger`, `tstamp`) VALUES
(32, 'admin', 'Happy', 'happy with how my project is going', '2023-03-23 19:47:30'),
(33, 'admin', 'Content', 'pleased with how my uni work is going', '2023-03-23 19:47:47'),
(34, 'admin', 'Relaxed', 'off work tomorrow', '2023-03-23 19:47:56'),
(35, 'admin', 'Lethargic', 'didn\'t get much sleep last night', '2023-03-23 19:48:08'),
(36, 'admin', 'Upset', 'balancing a full time job with uni is hard', '2023-03-23 19:48:30'),
(37, 'admin', 'Stressed', 'lots of work to do for my project', '2023-03-23 19:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`name`, `surname`, `username`, `email`, `pass`) VALUES
('Hannah', 'Morgan', 'admin', 'admin@gmail.com', '$2y$10$dExNBgnoTbyNdOGREfzg7O6KIpP5fVbd3alnPmpXmFXAIbzPkq7Ve');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moods`
--
ALTER TABLE `moods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_username` (`username`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `moods`
--
ALTER TABLE `moods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moods`
--
ALTER TABLE `moods`
  ADD CONSTRAINT `FK_user_username` FOREIGN KEY (`username`) REFERENCES `User` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
