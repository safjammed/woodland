-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2017 at 09:05 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aryandreamholidays_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `security_tokens`
--

CREATE TABLE `security_tokens` (
  `token_id` int(20) UNSIGNED NOT NULL,
  `content` varchar(50) NOT NULL,
  `user_id` int(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `used` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_code` int(20) NOT NULL,
  `address` mediumtext NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `fname`, `lname`, `email`, `role`, `verified`, `join_date`, `address_code`, `address`, `phone_number`) VALUES
(1, '$2y$10$X/DGKnmENyBWXDskkyEDcOFOODL7XsUbSOisu.rkH/rdkP3hf1u6i', 'Safayat', 'Jamil', 'safayatjamil27@gmail.com', 0, 1, '2017-08-28 17:56:29', 1230, 'Dhaka', '1969741278'),
(3, '$2y$10$x7fozQ3hwKC/9WvUx53R3.h7O120zYKtvIZL29ST24GnD849zuWs2', 'mahadi', 'hasan', 'mhasant2@gmail.com', 1, 0, '2017-09-02 07:06:38', 93400, '', '0768164946'),
(4, '$2y$10$6loxBYhGZDPmnXbP239awOh5ayOQIuOxFVFn5phFMJ43n24GNHlry', 'sahariar', 'siyam', 'talukdershiyam@gmail.con', 1, 0, '2017-09-02 14:51:38', 75017, 'vsjshu,vdudgs', '509758351'),
(5, '$2y$10$k.B3/4SKnIAf.yHM8hL2AO4bl8YVCc2dGolg1mM.tBJ6aFuOMt1gu', 'sahariar', 'siyam', 'talukdershiyam@gmail.com', 1, 0, '2017-09-02 18:01:50', 75017, '', '1989003592'),
(6, '$2y$10$i6rVLk45RJ3Xdb2PcNn9h.7giEnMsXAfoi/otQRcO9q..cb4bjZFa', 'Maksedul ', 'Haq ', 'mdbiplop00@gmail.com', 1, 0, '2017-09-02 18:50:51', 93400, '', '0769989867'),
(7, '$2y$10$XilrA6ZqRMGJR8MPHXWJeezqkXJajsEDiKV1g.miQ4920MIQ.35Ti', 'Dummy Kabir', 'Hossain', 'Kafbva@gmail.com', 1, 0, '2017-09-04 19:04:23', 92270, '', '012801204091284'),
(8, '$2y$10$/.UFD69GbDGc3OcquB2bQOtCFr3oDtOJHbPj74mKmzc4ZgJvk29xS', 'S.a.', 'Sadik', 'sadik5397@gmail.com', 0, 1, '2017-09-11 20:38:48', 92400, '(Flat#A1) House#09, Road#10, Sector#06, Uttara, Dhaka', '1515644470'),
(9, '$2y$10$60C6gRYrtTwGVPCsznm/u.UunfZMyxLmekVHR8J1sIu/TSpbd84YK', 'saf', 'jammed', 'some@sama.con', 1, 0, '2017-09-11 23:01:14', 92270, '', '69875345'),
(10, '$2y$10$BYVzixWcw//46XeTpScknOpWflP4QErbIpL5gXL2lDd/iX3RRTCDu', 'Mr', 'Sohan', 'mahiulsohan@gmail.com', 1, 0, '2017-09-15 19:41:12', 75017, 'muri kha, Paris, Dhaka', '01521111871'),
(11, '$2y$10$34TlKvb2iwDfMANWGSpKxONnRRVYy3R/xwZmVo2BCpJ7YFxcJBE3q', 'golam ', 'Rayhan', 'rayhan@gmail.com', 1, 0, '2017-09-17 16:34:09', 92300, 'Jejjdnntnfnjjjdjjjdjjx', '019499595686'),
(12, '$2y$10$umPQ2/5X7Yh/usp06SJAI.BxMzBbOzC/bMjjErqxP6iQG1kyQdzdq', 'Rafat', 'Hossain', 'rafat@gmail.com', 1, 0, '2017-09-18 21:37:18', 92110, '(Flat#A1) House#09, Road#10, Sector#06, Uttara, Dhaka', '1515644470'),
(18, '$2y$10$cxaXMhDtL3RMLAFBrRTU3.kMimDSwXWyTOfGrbagnahZPiPW3N1h.', 'fname', 'lname', 'email@email.com', 1, 0, '2017-09-29 15:47:27', 0, '', NULL),
(20, '$2y$10$9Zmg.v.f1QBnz268njfAgeZZqdmw6ijmnCA.IqQG4TfWstOE6ua7i', 'john ', 'doe', '1000963@daffodil.ac', 1, 1, '2017-09-29 18:50:23', 0, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `security_tokens`
--
ALTER TABLE `security_tokens`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `security_tokens`
--
ALTER TABLE `security_tokens`
  MODIFY `token_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
