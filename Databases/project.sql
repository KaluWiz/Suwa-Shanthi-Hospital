-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2023 at 01:04 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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

DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE IF NOT EXISTS `tbl_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `company_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_created_by`, `company_last_update_by`, `company_name`, `company_website`, `company_email`, `company_address`, `company_city`, `company_country`, `company_zip_code`, `company_phone`, `company_number`, `company_created_at`, `company_updated_at`) VALUES
(1, 2, 1, 'EGavilan Media', 'https://egavilanmedia.com/', 'egavilanmedia@gmail.com', 'Very close.', 'Colombo', 'Sri Lanka', '31000', '0112542111', 'Nomal', '2020-08-22 04:11:10', '2023-01-07 21:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_label`
--

DROP TABLE IF EXISTS `tbl_label`;
CREATE TABLE IF NOT EXISTS `tbl_label` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Label` varchar(200) DEFAULT NULL,
  `Pic` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_label`
--

INSERT INTO `tbl_label` (`ID`, `Label`, `Pic`, `CreationDate`) VALUES
(15, 'Nike', 'd41d8cd98f00b204e9800998ecf8427e1673414255.jpg', '2023-01-11 05:17:35'),
(16, 'Adidas', 'd41d8cd98f00b204e9800998ecf8427e1673415630.jpg', '2023-01-11 05:40:30'),
(17, 'Puma', '4b796e7efe0d75c007f0db60e5da96861677995939jpeg', '2023-03-05 05:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pp` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_created_by`, `user_last_update_by`, `user_full_name`, `user_email`, `user_gender`, `user_status`, `user_role`, `user_password`, `user_created_at`, `user_updated_at`, `pp`) VALUES
(1, 1, 6, 'Kavishka Alwis', 'kaluwiz123', 'Male', 'Active', 'Admin', '7d9110925db45134feac80bacb96c740ae4ce28c', '2020-06-13 02:08:08', '2023-03-24 23:35:01', ''),
(5, 1, 6, 'kaavinda chamil', 'a', 'Male', 'Active', 'Worker', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-17 00:00:00', '2023-01-27 14:12:27', ''),
(6, 1, 6, 'Nomal Ariyarathna', 'b', 'Male', 'Active', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-13 05:14:14', '2023-03-24 00:28:47', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
