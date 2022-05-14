-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2022 at 12:58 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18597324_valorant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin'),
(2, 'user', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user'),
(5, 'tes', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user'),
(7, 'enkripsi', '5f86a7f6e8fe9b0747cdab7d77c9e085dc038a4c', 'user'),
(8, 'asistensi', '8cb2237d0679ca88db6464eac60da96345513964', 'user'),
(10, 'demo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user'),
(11, 'username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user'),
(12, 'raditya', 'b02657d618ab86ef481629966bc56188993ca5bd', 'user'),
(13, 'username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user'),
(14, 'fadel', 'a4f9cbc9e5948ed01249aad995221de0a7256ae9', 'user'),
(15, 'fadel', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'user'),
(16, 'tes', 'd1c056a983786a38ca76a05cda240c7b86d77136', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `subtype`
--

CREATE TABLE `subtype` (
  `id_subtype` int(10) NOT NULL,
  `id_type` int(10) NOT NULL,
  `name_subtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subtype`
--

INSERT INTO `subtype` (`id_subtype`, `id_type`, `name_subtype`) VALUES
(1, 2, 'Sidearm'),
(2, 1, 'SMGs'),
(3, 1, 'Shotguns'),
(4, 1, 'Rifles'),
(5, 1, 'Sniper'),
(6, 1, 'Heavy');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `name_type`) VALUES
(1, 'Primary'),
(2, 'Secondary');

-- --------------------------------------------------------

--
-- Table structure for table `weapon`
--

CREATE TABLE `weapon` (
  `id_weap` int(11) NOT NULL,
  `id_subtype` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weapon`
--

INSERT INTO `weapon` (`id_weap`, `id_subtype`, `name`, `price`, `is_delete`) VALUES
(1, 1, 'Classic', 0, 0),
(2, 1, 'Shorty', 200, 0),
(6, 4, 'Vandal', 2900, 0),
(7, 4, 'Phantom', 2900, 0),
(8, 5, 'Operator', 4750, 0),
(9, 1, 'Sheriff', 800, 0),
(10, 6, 'Odin', 3200, 0),
(11, 6, 'Ares', 1600, 0),
(14, 1, 'Ghost', 550, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtype`
--
ALTER TABLE `subtype`
  ADD PRIMARY KEY (`id_subtype`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `weapon`
--
ALTER TABLE `weapon`
  ADD PRIMARY KEY (`id_weap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `weapon`
--
ALTER TABLE `weapon`
  MODIFY `id_weap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
