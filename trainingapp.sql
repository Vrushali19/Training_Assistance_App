-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 05:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainingapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `BDate` date NOT NULL,
  `EName` varchar(50) DEFAULT NULL,
  `ERelation` varchar(50) DEFAULT NULL,
  `EContact` varchar(50) DEFAULT NULL,
  `RType` int(11) NOT NULL,
  `AEmailId` varchar(50) DEFAULT NULL,
  `RollNo` text NOT NULL,
  `Image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FirstName`, `LastName`, `EmailId`, `ContactNumber`, `BDate`, `EName`, `ERelation`, `EContact`, `RType`, `AEmailId`, `RollNo`, `Image`) VALUES
(1, 'Ram', 'Jadhav', 'Ram@gmail.com', '7777777777', '2021-03-07', 'Raj Jadhav', 'Father', '666666666', 0, 'ram23@gmail.com', 'RaJa210307-001', 'images.jpg'),
(2, 'Siya', 'Patil', 'siya@gmail.com', '7777777777', '2021-03-14', 'Shyam Patil', 'Father', '666666666', 1, 'siya12@gmail.com', 'SaPl-001', 'download.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
