-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 02:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_id` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `deposit_amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`deposit_id`, `username`, `deposit_amount`, `date`) VALUES
('14746262', 'Aya', 5000, '2021-07-14'),
('16563358', 'Samman', 5000, '2021-07-07'),
('80604807', 'Samman', 5000, '2021-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID` int(11) NOT NULL,
  `sender_username` varchar(255) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`ID`, `sender_username`, `trans_id`, `username`, `email`, `amount`, `date`) VALUES
(42, 'Samman', 46467136, 'Dodo', 'Dodo@outlook.com', 400, '2021-07-06'),
(43, 'Samman', 89494887, 'Dodo', 'Dodo@outlook.com', 500, '2021-07-06'),
(44, 'Samman', 41639593, 'Samman', 'Samman111@gmail.com', 500, '2021-07-06'),
(45, 'Samman', 21249350, 'Samman', 'Samman111@gmail.com', 500, '2021-07-06'),
(46, 'Dodo', 65710227, 'Samman', 'Samman111@gmail.com', 4000, '2021-07-07'),
(47, 'Sephirea', 79929544, 'Dodo', 'Dodo@outlook.com', 100, '2021-07-10'),
(48, 'Dodo', 32917148, 'Samman', 'Samman111@gmail.com', 750, '2021-07-10'),
(49, 'Aya', 76188310, 'Dodo', 'Dodo@outlook.com', 580, '2021-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `birthdate` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ID` bigint(20) NOT NULL,
  `userid1` varchar(20) NOT NULL,
  `userid2` varchar(20) NOT NULL,
  `userid3` varchar(20) NOT NULL,
  `userid4` varchar(20) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `balance` bigint(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `userid1`, `userid2`, `userid3`, `userid4`, `firstname`, `lastname`, `phone`, `email`, `username`, `password`, `balance`) VALUES
(5, '4299', '8402', '2054', '2399', 'Abdallah', 'Samman', '01020055272', 'Dodo@outlook.com', 'Dodo', 'a906449d5769fa7361d7ecc6aa3f6d28', 580),
(6, '0984', '5963', '5265', '0095', 'Abdallah', 'Samman', '01020055272', 'Abdallah.Samman1999@gmail.com', 'beharder', 'a906449d5769fa7361d7ecc6aa3f6d28', 0),
(7, '5880', '7368', '4140', '9066', 'Aya', 'Hesham', '01434323472', 'Aya@gmail.com', 'Aya', 'a906449d5769fa7361d7ecc6aa3f6d28', 4420);

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `wallet_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `sent_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`wallet_id`, `user_name`, `sent_by`) VALUES
('9821956728936885', 'Dodo', 'Bogy'),
('9689156659248032', 'Samman', 'Bogy'),
('9821956728936885', 'Dodo', 'Samman'),
('9689156659248032', 'Samman', 'Samman'),
('9689156659248032', 'Samman', 'Dodo'),
('9821956728936885', 'Dodo', 'Sephirea'),
('4299840220542399', 'Dodo', 'Aya');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `withdraw_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `withdraw_amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`withdraw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
