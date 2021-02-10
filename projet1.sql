-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2021 at 09:34 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet1`
--

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `height` decimal(3,2) NOT NULL,
  `weight` decimal(4,1) NOT NULL,
  `imc` decimal(3,1) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `waist` decimal(4,1) NOT NULL,
  `hips` decimal(4,1) NOT NULL,
  `whr` decimal(3,2) NOT NULL,
  `activity_level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`id`, `member_id`, `height`, `weight`, `imc`, `gender`, `waist`, `hips`, `whr`, `activity_level`) VALUES
(13, 34, 1.95, 110.0, 28.9, 'man', 0.0, 0.0, 0.00, '0'),
(14, 32, 1.80, 81.0, 25.0, 'M', 87.0, 96.0, 0.91, 'lv3');

-- --------------------------------------------------------

--
-- Table structure for table `health_check`
--

CREATE TABLE `health_check` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `height` decimal(3,2) NOT NULL,
  `weight` decimal(4,1) NOT NULL,
  `imc` decimal(3,1) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `waist` decimal(4,1) NOT NULL,
  `hips` decimal(4,1) NOT NULL,
  `whr` decimal(3,2) NOT NULL,
  `activity_level` varchar(11) NOT NULL,
  `checking_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_check`
--

INSERT INTO `health_check` (`id`, `member_id`, `height`, `weight`, `imc`, `gender`, `waist`, `hips`, `whr`, `activity_level`, `checking_date`) VALUES
(6, 32, 1.80, 81.0, 25.0, 'M', 87.0, 96.0, 0.91, 'lv3', '2020-11-24 11:43:05'),
(7, 32, 1.80, 81.0, 25.0, 'M', 87.0, 96.0, 0.91, 'lv3', '2020-11-24 11:44:36'),
(8, 32, 1.80, 81.0, 25.0, 'M', 87.0, 96.0, 0.91, 'lv3', '2020-11-24 11:45:03'),
(9, 32, 1.80, 81.0, 25.0, 'M', 87.0, 96.0, 0.91, 'lv3', '2020-11-24 11:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscription_date` date NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `password`, `email`, `subscription_date`, `profile_picture`) VALUES
(23, 'Adrien59000', '00000000', 'ad.bogacz@gmail.com', '2020-11-11', ''),
(25, 'Adrien59', '00000000', 'ad.bogacz@gmail.com', '2020-11-11', ''),
(26, 'Adrien590', '00000000', 'ad.bogacz@gmail.com', '2020-11-11', ''),
(27, 'Adrien6200', '00000000', 'ad.bogacz@gmail.com', '2020-11-11', ''),
(28, 'AdrienB', '00000000', 'ad.bogacz@gmail.com', '2020-11-11', ''),
(29, 'Julien', '$2y$10$PBWfKTvOdP9Ya4u2M.VQ9.RT05eGDu.eSLoexcD0eeK415vbEyBFq', 'ad.bogacz@gmail.com', '2020-11-11', ''),
(30, 'Kiki', '$2y$10$JEweg1c33I7HYSuCJMX7qeFGmkgXu1UWMdwUzvhPPlPrZg2u7pngu', 'ad.bogacz@gmail.com', '2020-11-11', ''),
(31, 'Val', '$2y$10$GOapDafjexmpj.TEA8GVqOrnStLGAFLUFgK7e3KOYdy0Y7cK6whNe', 'ad.bogacz@gmail.com', '2020-11-11', ''),
(32, 'Adrien', '$2y$10$fusI1M9k6kVO9ye.O6dNc.8a.xU52.yaqQvO9DDigUt7xPQE5RGFW', 'ad.bogacz@gmail.com', '2020-11-11', 'FR55-160611171120.jpg'),
(33, 'Micabrel', '$2y$10$BOAHn97VZGwDm6qcwrYnfuh.LYtMPbTYxTQDxm8jBtFOTzoK2MgFW', 'ad.bogacz@gmail.com', '2020-11-13', ''),
(34, 'Féli', '$2y$10$jMccRg78Yc96mv3InN.qzOXWxe4qWLjJJr92EPRfcdaD6kQjRQN6S', 'sdczdc@zcezc.fr', '2020-11-19', 'FR84-091707191120.jpg'),
(35, 'JL', '$2y$10$gcnPcLrax.h6KjcyPd.ni.x4ZDxYO87t6pbrpL84rYVV5RvoZ0aXa', 'uygjk@jgkj.fr', '2020-11-19', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_check`
--
ALTER TABLE `health_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `health_check`
--
ALTER TABLE `health_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
