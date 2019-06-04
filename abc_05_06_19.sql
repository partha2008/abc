-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 09:18 PM
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
  `date_added` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc_users`
--

INSERT INTO `abc_users` (`user_id`, `sponsor_id`, `first_name`, `last_name`, `email`, `password`, `original_password`, `mobile_no`, `address`, `city`, `district`, `post_code`, `state_id`, `nominee_info`, `nominee_relation`, `about_me`, `pnr1`, `pnr2`, `pnr3`, `parent_id`, `status`, `last_login`, `date_added`, `date_modified`) VALUES
(1, 'ABC999999', 'ABC Care Solution', '', '', '', '', '', '', '', '0', '', 0, '', '', '', '', '', '', 0, 'Y', 0, 0, 0),
(2, 'ABC891345', 'Partha2', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 1, 'Y', 1559646521, 1558521750, 0),
(3, 'ABC127571', 'Partha3', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 2, 'Y', 1559646521, 1558521750, 0),
(4, 'ABC124991', 'Partha4', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 3, 'Y', 1559646521, 1558521750, 0),
(5, 'ABC663229', 'Partha5', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 4, 'Y', 1559646521, 1558521750, 0),
(6, 'ABC526730', 'Partha6', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 5, 'Y', 1559646521, 1558521750, 0),
(7, 'ABC848526', 'Partha7', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 6, 'Y', 1559646521, 1558521750, 0),
(8, 'ABC245881', 'Partha8', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 7, 'Y', 1559646521, 1558521750, 0),
(9, 'ABC758458', 'Partha9', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 8, 'Y', 1559646521, 1558521750, 0),
(10, 'ABC178845', 'Partha10', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', '', '', '', '', 9, 'Y', 1559646521, 1558521750, 0),
(11, 'ABC791417', 'Partha11', 'Chowdhury', '', 'HguK9ZnSyhsvrFWHIVJoKm7UEistMtkNbpOEUy2bOJ0=', 'tester@123', '8981329979', '81(40/3/10) Shibtala Road, Khelaghar Garden', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', 'test', '', '', '', 10, 'Y', 0, 1558521750, 1559659417),
(12, 'ABC310641', 'Partha', 'Chowdhury', '', '/7ceUxHV5EgOTv+Rw5+onR1t6YkDKl4S6V3PcE0ALCk=', 'tester@1231', '8981329979', 'test', 'Barrackpore', 'North 24 PGS', '700122', 35, 'test', 'test', 'test', 'sdre', 'wwww', 'qqq', 11, 'Y', 1559672812, 1558521750, 1559675576);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
