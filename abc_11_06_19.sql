-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 05:31 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `abc_admin`
--

CREATE TABLE `abc_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `original_password` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc_admin`
--

INSERT INTO `abc_admin` (`admin_id`, `username`, `email`, `password`, `original_password`, `contact_no`, `address`, `is_active`) VALUES
(1, 'admin', 'contact@abccaresolution.com', 'JAvlGPq9JyTdtvBO6x2llnRI1+gxwIyPqCKAn3THIKk=', 'admin123', '6289024109', '<p>Kolkata</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `abc_cms`
--

CREATE TABLE `abc_cms` (
  `cms_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mode` varchar(255) NOT NULL,
  `date_added` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc_cms`
--

INSERT INTO `abc_cms` (`cms_id`, `title`, `description`, `mode`, `date_added`) VALUES
(1, 'About Us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'about', 1531941056);

-- --------------------------------------------------------

--
-- Table structure for table `abc_settings`
--

CREATE TABLE `abc_settings` (
  `settings_id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `siteaddress` varchar(255) NOT NULL,
  `logoname` varchar(255) NOT NULL,
  `logopathname` varchar(255) NOT NULL,
  `notification` text NOT NULL,
  `title` text NOT NULL,
  `date_added` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc_settings`
--

INSERT INTO `abc_settings` (`settings_id`, `sitename`, `siteaddress`, `logoname`, `logopathname`, `notification`, `title`, `date_added`) VALUES
(1, 'ABC Care Solution', 'https://www.abccaresolution.com/', 'logo.png', 'uploads/logo/logo.png', 'Welcome to ABC', 'We Grow By Helping Others Grow !', 1558342423);

-- --------------------------------------------------------

--
-- Table structure for table `abc_state`
--

CREATE TABLE `abc_state` (
  `state_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc_state`
--

INSERT INTO `abc_state` (`state_id`, `name`) VALUES
(1, 'Andaman and Nicobar (AN)'),
(2, 'Andhra Pradesh (AP)'),
(3, 'Arunachal Pradesh (AR)'),
(4, 'Assam (AS)'),
(5, 'Bihar (BR)'),
(6, 'Chandigarh (CH)'),
(7, 'Chhattisgarh (CG)'),
(8, 'Dadra and Nagar Haveli (DN)'),
(9, 'Daman and Diu (DD)'),
(10, 'Delhi (DL)'),
(11, 'Goa (GA)'),
(12, 'Gujarat (GJ)'),
(13, 'Haryana (HR)'),
(14, 'Himachal Pradesh (HP)'),
(15, 'Jammu and Kashmir (JK)'),
(16, 'Jharkhand (JH)'),
(17, 'Karnataka (KA)'),
(18, 'Kerala (KL)'),
(19, 'Lakshdweep (LD)'),
(20, 'Madhya Pradesh (MP)'),
(21, 'Maharashtra (MH)'),
(22, 'Manipur (MN)'),
(23, 'Meghalaya (ML)'),
(24, 'Mizoram (MZ)'),
(25, 'Nagaland (NL)'),
(26, 'Odisha (OD)'),
(27, 'Puducherry (PY)'),
(28, 'Punjab (PB)'),
(29, 'Rajasthan (RJ)'),
(30, 'Sikkim (SK)'),
(31, 'Tamil Nadu (TN)'),
(32, 'Tripura (TR)'),
(33, 'Uttar Pradesh (UP)'),
(34, 'Uttarakhand (UK)'),
(35, 'West Bengal (WB)');

-- --------------------------------------------------------

--
-- Table structure for table `abc_users`
--

CREATE TABLE `abc_users` (
  `user_id` int(11) NOT NULL,
  `sponsor_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `original_password` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `nominee_info` text NOT NULL,
  `nominee_relation` tinytext NOT NULL,
  `about_me` text NOT NULL,
  `pnr1` varchar(255) NOT NULL,
  `pnr2` varchar(255) NOT NULL,
  `pnr3` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `last_login` int(11) NOT NULL,
  `approved_on` int(11) NOT NULL,
  `date_added` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc_users`
--

INSERT INTO `abc_users` (`user_id`, `sponsor_id`, `first_name`, `last_name`, `email`, `password`, `original_password`, `mobile_no`, `address`, `city`, `district`, `post_code`, `state_id`, `nominee_info`, `nominee_relation`, `about_me`, `pnr1`, `pnr2`, `pnr3`, `parent_id`, `status`, `last_login`, `approved_on`, `date_added`, `date_modified`) VALUES
(1, 'ABC999999', 'ABC Care Solution', '', '', '', '', '', '', '', '0', '', 0, '', '', '', '', '', '', 0, 'Y', 0, 0, 0, 0),
(2, 'ABC891345', 'Partha2', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 1, 'Y', 1560020520, 0, 1558521750, 0),
(3, 'ABC127571', 'Partha3', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 2, 'Y', 1559847234, 0, 1558521750, 0),
(4, 'ABC124991', 'Partha4', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 3, 'Y', 1559646521, 0, 1558521750, 0),
(5, 'ABC663229', 'Partha5', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 4, 'Y', 1559646521, 0, 1558521750, 0),
(6, 'ABC526730', 'Partha6', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 5, 'Y', 1559646521, 0, 1558521750, 0),
(7, 'ABC848526', 'Partha7', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 6, 'Y', 1559646521, 0, 1558521750, 0),
(8, 'ABC245881', 'Partha8', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 7, 'Y', 1559762699, 0, 1558521750, 0),
(9, 'ABC758458', 'Partha9', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 8, 'Y', 1559646521, 0, 1558521750, 0),
(10, 'ABC178845', 'Partha10', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 9, 'Y', 1559646521, 0, 1558521750, 0),
(11, 'ABC791417', 'Partha11', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', 'test', '', '', '', 10, 'Y', 1560164548, 0, 1558521750, 1559659417),
(12, 'ABC310641', 'Partha', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', 'test', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 11, 'Y', 1560090174, 0, 1558521750, 0),
(13, 'ABC310642', 'Partha', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', 'test', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 11, 'Y', 1559968291, 0, 1558521750, 0),
(14, 'ABC154701', 'Subhajit', 'Samanta', 'subhajit.s1995@gmail.com', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '9564464911', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 35, 'Saraswati Samanta', 'Mother', 'done', '1234567890', '1234567890', '1234567890', 12, 'Y', 1560185543, 0, 1559843420, 1559875318),
(15, 'ABC158105', 'Subha1', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '9564464910', 'Hdhdbd hshd jshdbsn snsnxhsbe kshshsbsh sbshd', 'Kolkata', '24PGS(N)', 'Agsjsjd', 35, 'Subhajit Samanta', 'Subhajit Samanta', 'PNR DONE', '123456666666666', '12345666554443', '12345678909987', 14, 'Y', 0, 0, 1559876089, 1559876275),
(16, 'ABC750962', 'Subha2', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '1234567890', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 35, 'XYZ', 'Mother', 'DONE', '123456789098765', '12345666554443', '12345678909987', 14, 'Y', 0, 0, 1559876651, 1559877991),
(17, 'ABC502648', 'Subha3', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '1234567899', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 35, 'XYZ', 'Mother', 'DONE', '123456789098765', '12345666554443', '12345678909987', 14, 'Y', 0, 0, 1559876750, 1559877680),
(18, 'ABC430096', 'Subha4', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '1234567898', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', 'KOLKATA', '700101', 35, 'XYZ', 'Mother', 'DONE', '123456789098765', '12345666554443', '12345678909987', 14, 'Y', 0, 0, 1559876891, 1559878161),
(19, 'ABC415851', 'Subha5', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '0987654321', 'Kolkata', 'Kolkata', '24PGS(N)', 'Agsjsjd', 35, 'Subhajit Samanta', 'Subhajit Samanta', 'DONE', '123456789098765', '123456789776544', '5363536373636353', 14, 'N', 0, 0, 1559877030, 1559877424),
(20, 'ABC903364', 'RAM1', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '9876543212', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 35, 'XYZ', 'Mother', 'DONE', '123456789098765', '12345666554443', '12345678909987', 15, 'Y', 1559984318, 0, 1559878684, 1559879051),
(21, 'ABC722632', 'Ram2', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '5678904321', 'Kolkata', 'Kolkata', '24PGS(N)', 'Agsjsjd', 35, 'Subhajit Samanta', 'Subhajit Samanta', 'DONE', '1238', '1234', '1236', 15, 'Y', 0, 0, 1559878796, 1559906107),
(22, 'ABC687580', 'Ram3', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '1234598765', 'Kolkata', 'Kolkata', '24PGS(N)', 'Agsjsjd', 35, 'Subhajit Samanta', 'Subhajit Samanta', 'DONE', '123456789098765', '12345666554443', '12345678909987', 15, 'N', 1559904406, 0, 1559878894, 1559905186),
(23, 'ABC450735', 'SHYAM1', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '1234123412', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', 'KOLKATA', '700101', 35, 'Saraswati Samanta', 'Mother', 'DONE', '123456789098765', '12345666554443', '12345678909987', 22, 'Y', 1559881047, 0, 1559879558, 1559879783),
(24, 'ABC636289', 'SHYAM2', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '9876543256', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 35, 'XYZ', 'Mother', 'DONE', '12345', '12345', '12345', 22, 'Y', 0, 0, 1559879691, 1559879954),
(25, 'ABC310742', 'mama', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', 'test', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 14, 'N', 1559880579, 0, 1558521750, 0),
(26, 'ABC755442', 'JODU1', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '8765432345', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 35, 'XYZ', 'Mother', '', '', '', '', 23, 'N', 1559905530, 0, 1559905409, 0),
(27, 'ABC210378', 'MODHU1', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '5436789321', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 35, 'XYZ', 'Mother', 'DONE', '33', '89B', '56G', 20, 'Y', 1559925540, 0, 1559906460, 1559906928),
(28, 'ABC428289', 'MADHU2', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '5555555555', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 35, 'XYZ', 'Mother', 'DONE', 'DGH6', 'DJDH7', 'NCMFJ7', 20, 'Y', 0, 0, 1559906548, 1559906971),
(29, 'ABC651969', 'MADHU3', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '9999999999', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 15, 'XYZ', 'Mother', 'done', '765', '890', 'h765', 20, 'Y', 1559907014, 0, 1559906649, 1559930305),
(30, 'ABC307531', 'JODU1', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '4567890678', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 10, 'XYZ', 'XYZ', 'N', 'KLL', 'KKKK', 'K', 27, 'Y', 0, 0, 1559930521, 1559931135),
(31, 'ABC366840', 'JODU2', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '3454334534', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 10, 'XYZ', 'XYZ', 'D', 'GJHKJ', 'HJHKJ', 'AASA', 27, 'Y', 1559930755, 0, 1559930603, 1559931109),
(32, 'ABC489588', 'RAHUL1', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '6666666660', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 10, 'XYZ', 'XYZ', 'DONE', '678', 'JU87LK87', 'KI87', 30, 'Y', 0, 0, 1559968925, 1559969057),
(33, 'ABC362562', 'SOUBHIK1', 'NSCHC', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '2345670972', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 10, 'XYZ', 'XYZ', 'DONE', 'BV54', 'MN87', 'MN98', 32, 'Y', 0, 0, 1559969182, 1559969861),
(34, 'ABC696654', 'ADI', 'Samanta', '', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '9877897890', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', '24 PGS(N)', '700101', 10, 'XYZ', 'XYZ', 'D', 'N8', 'M9', 'M0', 33, 'Y', 0, 0, 1559970102, 1559970897),
(35, 'ABC281479', 'XYZ', 'Samanta', 'sankhabaran.svms@gmail.com', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '3333333331', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, HDG, Prafulla Kanan West, Krishnapur', 'KOLKATASC', 'HSG', '700108', 3, 'XYZHH', 'XYZFF', 'JHDGD', '456TG', '890KJ', '098J', 34, 'Y', 1560013119, 0, 1559971230, 1559971907),
(36, 'ABC113881', 'TANDRA', 'PANDIT', 'sankhabaran.svms@gmail.com', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', '123456', '9732552067', 'SD Tower, Shrijeeta Apartment, Block E, Flat no 5V, 4th floor, Prafulla Kanan West, Krishnapur', 'KOLKATA', 'KOLKATA', '700101', 35, 'XYZ', 'XYZ', 'NAME CHANGEw', 'sdre', 'wwww', 'qqq', 35, 'Y', 1559983945, 1560193922, 1559983630, 1560193922);

-- --------------------------------------------------------

--
-- Table structure for table `abc_user_pnr`
--

CREATE TABLE `abc_user_pnr` (
  `user_pnr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pnr` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc_user_pnr`
--

INSERT INTO `abc_user_pnr` (`user_pnr_id`, `user_id`, `pnr`, `date`) VALUES
(1, 34, 'sdre', 1560193922),
(2, 20, 'wwww', 1560193922),
(3, 14, 'qqq', 1560193922);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abc_admin`
--
ALTER TABLE `abc_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `abc_cms`
--
ALTER TABLE `abc_cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `abc_settings`
--
ALTER TABLE `abc_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `abc_state`
--
ALTER TABLE `abc_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `abc_users`
--
ALTER TABLE `abc_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `abc_user_pnr`
--
ALTER TABLE `abc_user_pnr`
  ADD PRIMARY KEY (`user_pnr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abc_admin`
--
ALTER TABLE `abc_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `abc_cms`
--
ALTER TABLE `abc_cms`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `abc_settings`
--
ALTER TABLE `abc_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `abc_state`
--
ALTER TABLE `abc_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `abc_users`
--
ALTER TABLE `abc_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `abc_user_pnr`
--
ALTER TABLE `abc_user_pnr`
  MODIFY `user_pnr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
