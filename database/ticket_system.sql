-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2020 at 08:22 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket_user` int(11) NOT NULL,
  `ticket_problem` text NOT NULL,
  `ticket_priority` int(1) NOT NULL,
  `ticket_status` varchar(50) NOT NULL,
  `ticket_reply` varchar(500) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detele_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  `is_delete` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_user`, `ticket_problem`, `ticket_priority`, `ticket_status`, `ticket_reply`, `created_by`, `created_date`, `update_by`, `update_date`, `detele_by`, `delete_date`, `is_delete`) VALUES
(1, 6, 'Ada komlplain', 1, 'NEW', NULL, 0, '2020-10-30 19:00:35', 0, '2020-10-30 19:52:16', 0, '0000-00-00 00:00:00', '1'),
(2, 7, 'Mas, tolong server saya dibackup ya', 1, 'NEW', NULL, 7, '2020-10-30 19:02:05', 7, '2020-10-30 19:52:39', 0, '0000-00-00 00:00:00', '1'),
(3, 7, 'Mas, Minta tolong server di hapus', 1, 'NEW', NULL, 7, '2020-10-30 19:02:30', 7, '2020-10-30 19:02:30', 0, '0000-00-00 00:00:00', ''),
(4, 8, 'Mas, Minta tolong Akun Shared di hapus', 1, 'NEW', NULL, 8, '2020-10-30 19:02:40', 8, '2020-10-30 19:02:40', 0, '0000-00-00 00:00:00', ''),
(5, 9, 'Mas, bisa minta tolong?', 1, 'NEW', NULL, 9, '2020-10-30 19:02:49', 9, '2020-10-30 19:02:49', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detele_by` int(11) NOT NULL,
  `delete_date` datetime DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `created_by`, `created_date`, `update_by`, `update_date`, `detele_by`, `delete_date`, `is_delete`) VALUES
(6, 'masmul', 'b72b9918b23a8f53331a2c829b5a30a6', 0, '2020-10-30 17:44:19', 0, '2020-10-30 20:00:06', 0, NULL, 0),
(7, 'masjo', 'e00cf25ad42683b3df678c61f42c6bda', 0, '2020-10-30 17:46:22', 0, '2020-10-30 20:00:20', 0, NULL, 0),
(8, 'masmin', '202cb962ac59075b964b07152d234b70', 0, '2020-10-30 17:48:00', 0, '2020-10-30 20:06:59', 0, NULL, 1),
(9, 'masko', '202cb962ac59075b964b07152d234b70', 0, '2020-10-30 17:48:12', 0, '2020-10-30 20:00:20', 0, NULL, 0),
(10, 'masyem', '202cb962ac59075b964b07152d234b70', 0, '2020-10-30 17:48:16', 0, '2020-10-30 20:00:20', 0, NULL, 0),
(11, 'masmad', '202cb962ac59075b964b07152d234b70', 0, '2020-10-30 17:48:21', 0, '2020-10-30 20:00:20', 0, NULL, 0),
(12, 'arfian', '202cb962ac59075b964b07152d234b70', 0, '2020-10-30 17:58:19', 0, '2020-10-30 20:00:20', 0, NULL, 0),
(13, 'arfian1', '202cb962ac59075b964b07152d234b70', 0, '2020-10-30 17:58:36', 0, '2020-10-30 20:00:20', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_gender` tinytext,
  `user_address` text,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) DEFAULT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detele_by` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `user_name`, `user_birthdate`, `user_gender`, `user_address`, `created_by`, `created_date`, `update_by`, `update_date`, `detele_by`, `delete_date`, `is_delete`) VALUES
(1, 6, 'Mas Med', NULL, NULL, NULL, NULL, '2020-10-30 17:44:19', NULL, '2020-10-30 19:08:47', NULL, NULL, 0),
(2, 7, 'SIADMIN', '1993-02-11', 'L', 'Griya Candi Asri 2, Sragen', NULL, '2020-10-30 17:46:22', NULL, '2020-10-30 17:46:22', NULL, NULL, 0),
(3, 8, 'Mas Jo', '1993-02-11', 'L', 'Griya Candi Asri 2, Sragen', NULL, '2020-10-30 17:48:00', NULL, '2020-10-30 17:48:00', NULL, NULL, 0),
(4, 9, 'Mas Min', '1993-02-11', 'L', 'Griya Candi Asri 2, Sragen', NULL, '2020-10-30 17:48:12', NULL, '2020-10-30 17:48:12', NULL, NULL, 0),
(5, 10, 'Mas Karyo', '1993-02-11', 'L', 'Griya Candi Asri 2, Sragen', NULL, '2020-10-30 17:48:16', NULL, '2020-10-30 17:48:16', NULL, NULL, 0),
(6, 11, 'Mas Luki', '1993-02-11', 'L', 'Griya Candi Asri 2, Sragen', NULL, '2020-10-30 17:48:21', NULL, '2020-10-30 17:48:21', NULL, NULL, 0),
(7, 12, 'Mas MEAN', '1993-02-11', 'L', 'Griya Candi Asri 2, Sragen', NULL, '2020-10-30 17:58:19', NULL, '2020-10-30 19:08:41', NULL, NULL, 0),
(8, 13, 'Mas Luki', '1993-02-11', 'L', 'Griya Candi Asri 2, Sragen', NULL, '2020-10-30 17:58:36', NULL, '2020-10-30 17:58:36', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
