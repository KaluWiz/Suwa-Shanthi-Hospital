-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 09:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(11) NOT NULL,
  `company_created_by` int(11) NOT NULL,
  `company_last_update_by` int(11) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_website` varchar(100) NOT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_address` varchar(500) NOT NULL,
  `company_city` varchar(100) NOT NULL,
  `company_country` varchar(100) NOT NULL,
  `company_zip_code` varchar(100) NOT NULL,
  `company_phone` varchar(100) DEFAULT NULL,
  `company_number` varchar(100) DEFAULT NULL,
  `company_created_at` datetime NOT NULL,
  `company_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_created_by`, `company_last_update_by`, `company_name`, `company_website`, `company_email`, `company_address`, `company_city`, `company_country`, `company_zip_code`, `company_phone`, `company_number`, `company_created_at`, `company_updated_at`) VALUES
(1, 2, 1, 'EGavilan Media', 'https://egavilanmedia.com/', 'egavilanmedia@gmail.com', 'Very close.', 'Colombo', 'Sri Lanka', '31000', '0112542111', 'Nomal', '2020-08-22 04:11:10', '2023-01-07 21:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_label`
--

CREATE TABLE `tbl_label` (
  `ID` int(10) NOT NULL,
  `Label` varchar(200) DEFAULT NULL,
  `Pic` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_label`
--

INSERT INTO `tbl_label` (`ID`, `Label`, `Pic`, `CreationDate`) VALUES
(15, 'Nike', 'd41d8cd98f00b204e9800998ecf8427e1673414255.jpg', '2023-01-11 05:17:35'),
(16, 'Adidas', 'd41d8cd98f00b204e9800998ecf8427e1673415630.jpg', '2023-01-11 05:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_created_by` int(11) NOT NULL,
  `user_last_update_by` int(11) DEFAULT NULL,
  `user_full_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` enum('Male','Female') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `user_role` enum('Admin','Manager','Worker') NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_created_at` datetime NOT NULL,
  `user_updated_at` datetime DEFAULT NULL,
  `pp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_created_by`, `user_last_update_by`, `user_full_name`, `user_email`, `user_gender`, `user_status`, `user_role`, `user_password`, `user_created_at`, `user_updated_at`, `pp`) VALUES
(1, 1, 1, 'Nomal', 'IT20304050', 'Male', 'Active', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-13 02:08:08', '2023-01-11 13:51:26', ''),
(5, 1, 1, 'Adam Godley', 'a', 'Male', 'Active', 'Worker', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-17 00:00:00', '2023-01-11 13:00:20', ''),
(6, 1, 1, 'Martha Nielsen', 'b', 'Female', 'Active', 'Manager', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-13 05:14:14', '2023-01-11 14:01:27', ''),
(7, 1, 1, 'Hannah Kahnwald', 'hkahnwald@gmail.com', 'Female', 'Inactive', 'Admin', '573c9cae725a71684667ff70a83bef0ca1d3ee00', '2020-06-17 00:00:00', '2020-07-28 13:14:37', ''),
(8, 1, 1, 'Peter Doppler', 'pdoppler@gmail.com', 'Male', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-13 05:14:14', '2020-11-15 20:15:47', ''),
(9, 1, 1, 'Katharina Nielsen', 'knielsen@gmail.com', 'Female', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:43:02', '2020-07-28 13:41:10', ''),
(10, 1, 1, 'Bartosz Tiedemann', 'btiedemann@gmail.com', 'Male', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:45:01', '2020-09-19 20:14:25', ''),
(11, 1, 1, 'Magnus Nielsen', 'manielsen@gmail.com', 'Male', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:52:06', '2020-07-28 09:44:16', ''),
(12, 1, 1, 'Ulrich Nielsen', 'unielsen@gmail.com', 'Male', 'Active', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:52:32', '2020-07-18 13:10:12', ''),
(13, 1, 40, 'Aleksander Tiedemann', 'atiedemann@gmail.com', 'Male', 'Inactive', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:54:55', '2020-07-31 19:54:17', ''),
(14, 1, 1, 'Franziska Doppler', 'fdoppler@gmail.com', 'Female', 'Inactive', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:55:45', '2020-07-28 11:54:32', ''),
(15, 1, 1, 'Regina Tiedemann', 'rtiedemann@gmail.com', 'Female', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:56:17', '2020-07-18 13:13:08', ''),
(16, 1, 1, 'Mikkel Nielsen', 'minielsen@gmail.com', 'Male', 'Active', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:57:02', '2020-07-18 13:14:02', ''),
(17, 1, 1, 'Claudia Tiedemann', 'ctiedemann@gmail.com', 'Female', 'Inactive', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 09:57:28', '2020-07-18 13:14:50', ''),
(18, 1, 1, 'Elisabeth Doppler', 'edoppler@gmail.com', 'Female', 'Active', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 10:15:02', '2020-07-19 08:54:24', ''),
(19, 1, 1, 'Torben Woller', 'Woller@gmail.com', 'Male', 'Inactive', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 10:15:28', '2020-08-25 22:23:35', ''),
(20, 1, 1, 'Egon Tiedemann', 'etiedemann@gmail.com', 'Male', 'Inactive', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 10:15:48', '2020-07-18 13:23:13', ''),
(21, 1, 1, 'Helge Doppler', 'hdoppler@gmail.com', 'Female', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 10:16:18', '2020-07-18 13:24:09', ''),
(22, 1, 1, 'Agnes Nielsen', 'anielsen@gmai.com', 'Female', 'Inactive', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 10:16:44', '2020-07-18 13:25:36', ''),
(23, 1, 1, 'Greta Doppler', 'gdoppler@gmail.com', 'Female', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 10:19:49', '2020-07-18 13:26:43', ''),
(24, 1, 1, 'Ines Kahnwald', 'ikahnwald@gmail.com', 'Female', 'Inactive', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 10:20:33', '2020-07-18 13:27:52', ''),
(25, 1, 1, 'Jurgen Obendorf', 'uobendorf@gmail.com', 'Male', 'Inactive', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 10:24:08', '2020-08-25 22:24:00', ''),
(26, 1, 1, 'Bernd Doppler', 'bdoppler@gmail.com', 'Female', 'Inactive', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-21 15:30:46', '2020-07-18 13:37:22', ''),
(27, 1, 1, 'Erik Obendorf', 'ebendorf@gmail.com', 'Male', 'Active', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-26 06:04:44', '2020-07-18 13:38:12', ''),
(28, 1, 1, 'Martin Dohring', 'mdohring@gmail.com', 'Male', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-26 06:43:27', '2020-08-25 22:22:43', ''),
(29, 1, 1, 'Marek Tannhaus', 'mtannhaus@gmail.com', 'Male', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-27 08:21:30', '2020-07-18 13:39:53', ''),
(30, 1, 1, 'H.G. Tannhaus', 'hgtannhaus@gmail.com', 'Male', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-27 20:10:31', '2020-07-18 13:41:58', ''),
(31, 1, 1, 'Robert Sheehan', 'rsheehan@gmail.com', 'Male', 'Inactive', '', '7874cedb4461334c55182b6543dd733ca63cf466', '2020-07-28 12:30:53', '2020-08-25 22:26:06', ''),
(32, 1, 1, 'Tom Hopper', 'tomhopper@gmail.com', 'Male', 'Active', 'Admin', '573c9cae725a71684667ff70a83bef0ca1d3ee00', '2020-07-28 12:39:12', '2020-08-25 22:26:29', ''),
(33, 1, 1, 'Emmy Raver', 'emmy@gmail.com', 'Male', 'Active', 'Admin', '573c9cae725a71684667ff70a83bef0ca1d3ee00', '2020-07-28 12:39:41', '2020-08-25 22:26:51', ''),
(34, 1, 1, 'Ritu Aryan', 'rituaryan@gmail.com', 'Male', 'Active', 'Admin', '554dbf0b41b3cd068ee1fcfd6235466a263647b4', '2020-07-28 12:40:10', '2020-08-25 22:27:18', ''),
(35, 1, 1, 'Kate Walsh', 'katew@gmail.com', 'Male', 'Active', 'Admin', '573c9cae725a71684667ff70a83bef0ca1d3ee00', '2020-07-28 12:44:40', '2020-08-25 22:27:40', ''),
(36, 1, 1, 'David Castañeda', 'david@gmail.com', 'Male', 'Active', 'Admin', '92429d82a41e930486c6de5ebda9602d55c39986', '2020-07-28 12:48:40', '2020-08-25 22:28:12', ''),
(37, 1, 1, 'Jordan Claire', 'jordanclaire@gmail.com', 'Female', 'Active', '', '573c9cae725a71684667ff70a83bef0ca1d3ee00', '2020-07-28 12:58:24', '2020-08-25 22:28:47', ''),
(38, 1, 1, 'Mary J. Blige', 'maryjb@gmail.com', 'Male', 'Inactive', 'Admin', '95fe4e26cf97924c0370b66195a98e903ec42253', '2020-07-28 13:30:08', '2020-08-30 20:08:01', ''),
(39, 1, 1, 'Colm Feore', 'colmfeore@gmail.com', 'Male', 'Active', 'Admin', '573c9cae725a71684667ff70a83bef0ca1d3ee00', '2020-07-28 13:39:03', '2020-08-25 22:30:09', ''),
(40, 1, 1, 'Walter White', 'egavilanmedia2@gmail.com', 'Male', 'Inactive', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-07-29 08:41:43', '2020-09-10 22:35:18', ''),
(41, 40, 1, 'Ellen Page', 'epage@gmail.com', 'Female', 'Active', 'Admin', '92429d82a41e930486c6de5ebda9602d55c39986', '2020-07-29 11:40:59', '2020-08-25 22:25:33', ''),
(42, 40, 1, 'Germany', 'germany@gmail.com', 'Female', 'Inactive', 'Admin', 'b1b5e0b201bb0a6e6f5ba1672a1bb8acd0fb01af', '2020-07-29 12:05:20', '2020-09-10 22:35:09', ''),
(43, 42, 1, 'Donal Trump', 'dtrump@gmail.com', 'Male', 'Active', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-08-01 20:57:06', '2020-08-02 09:13:43', ''),
(44, 1, 1, 'Aidan Gallagher', 'agallagher@gmail.com', 'Male', 'Active', '', '573c9cae725a71684667ff70a83bef0ca1d3ee00', '2020-08-09 03:09:23', '2020-08-25 22:25:14', ''),
(45, 1, 0, 'Ken Hall', 'kenhall@gmamil.com', 'Male', 'Inactive', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-08-25 22:32:30', '2020-08-29 20:52:59', ''),
(46, 1, NULL, 'Matt Biedel', 'matt@gmail.com', 'Male', 'Inactive', 'Admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-08-25 22:33:07', NULL, ''),
(47, 0, NULL, '', '', 'Male', 'Active', 'Admin', '', '0000-00-00 00:00:00', NULL, ''),
(48, 1, NULL, 'asd', 'it30402102', 'Male', 'Active', 'Admin', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', '2023-01-08 12:27:30', NULL, ''),
(49, 1, NULL, 'test', 'IT10203040', 'Female', 'Active', 'Manager', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', '2023-01-08 12:31:28', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_label`
--
ALTER TABLE `tbl_label`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_label`
--
ALTER TABLE `tbl_label`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
