-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 12:52 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE `admini` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`id`, `fullname`, `password`) VALUES
(2, 'group10', '$2y$10$UPNyxYu6dMHYjwvdM0sPEefSx3tPWc/qrjnBkX4tA1tu5Bna6U2.a');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `vote` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `fullname`, `picture`, `gender`, `vote`) VALUES
(1, 'Mr.Bean', 'bean.jpg', 'Male', 0),
(2, 'Mrs.Minion', 'minion.jpg', 'Female', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `admission` int(11) NOT NULL,
  `gender` text NOT NULL,
  `statuss` int(1) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `admission`, `gender`, `statuss`, `password`) VALUES
(3, '3', 3, 'Male', 0, '$2y$10$1rqWG0Yt0U0A5nnFtrnsJubMpU7d2d.m8lvyrGXsY8SFxEoYexBgK'),
(4, '4', 4, 'Male', 0, '$2y$10$QyftjiGXXOf.kcscyw8NP.O.Qg08vUdYGX5YL5Z6XSkQRfXMeM/h2'),
(5, '5', 5, 'Male', 0, '$2y$10$ltOUTKBiRiak58TLwvDkzeRXK5DryfgzgALum2c/HidMsmnS8Y4vK'),
(6, '6', 6, 'Female', 0, '$2y$10$hctc5NYm/B.uWm/kvstTRuw.QlnPyxd3zGY52FCBbm3ELl.Xg7elK'),
(7, '2', 2, 'Female', 0, '$2y$10$THbZGXrURvFgiVX7wsoL3eSwLc/2Hn5rLdnWT9JN5Si0myOtyc/gy'),
(8, '1', 1, 'Female', 0, '$2y$10$wDQpsFOY7iMuGxua6HIzJeP2dEyeimkrepJPJuJzfz/SJiarp/Yte');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admini`
--
ALTER TABLE `admini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
