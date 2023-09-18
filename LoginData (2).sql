-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2022 at 08:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LoginData`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city`) VALUES
('Toronto'),
('Madison'),
('Chinatown'),
('Dubai'),
('Bangalore'),
('Rotterdam'),
('Tokyo'),
('Hyderabad'),
('Middelburg'),
('dholakpur');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` tinyint(4) NOT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'India',
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `status`) VALUES
(2, 'United Arab Emirates', 0),
(3, 'Netherlands', 1),
(4, 'Canada', 0),
(5, 'India', 1),
(6, 'USA', 0),
(8, 'Gangtok', 0),
(9, 'Bangaladesh', 1),
(10, 'Afghanistan', 1),
(11, 'Sri Lanka', 0),
(12, 'Hong Kong', 0);

-- --------------------------------------------------------

--
-- Table structure for table `RegisteredUsers`
--

CREATE TABLE `RegisteredUsers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `hobbies` varchar(50) DEFAULT NULL,
  `image_details` varchar(100) NOT NULL,
  `document_details` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `RegisteredUsers`
--

INSERT INTO `RegisteredUsers` (`id`, `first_name`, `last_name`, `email`, `dob`, `username`, `password`, `country`, `city`, `hobbies`, `image_details`, `document_details`, `status`) VALUES
(42, 'Arjun', 'Patel', 'arnavlohiya121@gmail.com', '2004-04-19', 'arjunpatel', 'arjunpatel', 'India', 'Hyderabad', NULL, '6303977624a90.png', '6303977624a94.pdf', 1),
(43, 'Pranay', 'Nandagiri', 'arnavlohiya121@gmail.com', '2004-04-19', 'pranay', 'paranaya', 'Netherlands', 'Rotterdam', NULL, '6303980d6fa01.png', '6303980d6fa116303980d6fa12.docx', 1),
(45, 'Arham', 'Kothari', 'arnavlohiya121@gmail.com', '2004-04-19', 'arhamkothari', 'arhamkothari', 'India', 'Hyderabad', NULL, '630519e7a8e5f.png', '6303b094a7b386303b094a7b39.pdf', 0),
(46, 'bally', 'wallet', 'arnavlohiya121@gmail.com', '2004-04-19', 'ballywallet', 'ballywallet', 'India', 'Hyderabad', NULL, '6303b0c03666a.png', '6303b0c03666e6303b0c03666f.pdf', 0),
(47, 'Moksha', 'Sakarwal', 'moksha.sakarwal@gmail.com', '2004-04-19', 'mokviea', 'arnavlohiya', 'Netherlands', 'Middelburg', NULL, '6303b10d8eb26.png', '6303b10d8eb296303b10d8eb2a.pdf', 0),
(48, 'divakar', 'kumar', 'divakar@gmail.com', '2004-04-19', 'divakar', 'divakar', 'India', 'Bangalore', NULL, '63051b85e30b4.jpg', '63051cc9c068c.pdf', 1),
(49, 'middie', 'lohiya', 'arnavlohiya121@gmail.com', '2004-04-19', 'middie', 'arjunmhbjh', 'Netherlands', 'Rotterdam', NULL, '6304a289d63b8.png', '6304a289d65096304a289d650b.pdf', 1),
(52, 'Alka', 'Lohiya', 'arnavlohiya121@gmail.com', '2004-04-19', 'divakarad', 'divakar', 'China', 'hyderabad', 'sports,Music,Shop,', '630738ce1dedc.png', '630738ce1dee0630738ce1dee1.docx', 1),
(53, 'qqq', 'qqq', 'qqq@gmail.com', '2004-04-19', 'qqqquu', 'divakar', 'India', 'Toronto', 'movie,Music,Shop,', '63073a91dc011.png', '63073a91dc01463073a91dc015.pdf', 1),
(54, 'www', 'www', 'arnavlohiya121@gmail.com', '2004-04-19', 'qwedrfthu', '12121212', 'Canada', 'Toronto', 'movie,', '63073b2d4c7d0.png', '63073b2d4c7d263073b2d4c7d3.pdf', 0),
(55, 'aasrith', 'reddy', 'aredyy@gmail.com', '2004-10-24', 'mypencil', 'mypencil', 'United Arab Emirates', 'dholakpur', 'sports,Music,', '63073bf7a98ea.png', '63073bf7a98ee63073bf7a98ef.pdf', 0),
(56, 'Pranay', 'lohiya', 'arnavlohiya121@gmail.com', '2004-04-19', 'davadads', 'divakar', 'India', 'Hyderabad', 'movie,Music,Shop,', '63073ffc3729e.png', '63073ffc372a263073ffc372a3.pdf', 0),
(57, 'alovera', 'gel', 'alo@gmail.cpmp', '2004-04-19', 'alovera', 'alovera', 'Netherlands', 'Chinatown', 'movie,Music,', '630c621a2a419.png', '630c621a2a41b630c621a2a41c.pdf', 0),
(58, 'Surja', 'Bai', 'surja@gmail.com', '2004-04-19', 'surjabai', 'surjabai', 'Canada', 'Toronto', 'movie,Music,Shop,', '63144e3a70010.png', '63144e3a7001e63144e3a7001f.pdf', 0),
(59, 'glass', 'good', 'asdb@gmal.com', '2022-09-05', 'glasswall', 'glasswall', 'India', 'Bangalore', 'Music,', '6315cc6681879.png', '6315cc668187c6315cc668187d.docx', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RegisteredUsers`
--
ALTER TABLE `RegisteredUsers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `RegisteredUsers`
--
ALTER TABLE `RegisteredUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
