-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 11:58 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_push`
--

-- --------------------------------------------------------

--
-- Table structure for table `webpush_tokens`
--

CREATE TABLE `webpush_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webpush_tokens`
--

INSERT INTO `webpush_tokens` (`id`, `token`, `updated_at`) VALUES
(1, 'd9ecnFfD6Iw:APA91bEa_tpMd8rv3_4IHq6dAlpxVprUxU0Q_kDGlZM2v6mt8HXti9uBg7-UYg3WtLIM0V_w_rrepeiqIAhU41oNFtkFU5C5NBFLI3uxZ3GnMnZFD0b2vh1DLN589JOCW6-4YmmAl_n6', '2018-09-27 11:12:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `webpush_tokens`
--
ALTER TABLE `webpush_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `webpush_tokens`
--
ALTER TABLE `webpush_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
