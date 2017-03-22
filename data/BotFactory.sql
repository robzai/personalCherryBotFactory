-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2017 at 08:40 AM
-- Server version: 5.7.13
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `robot`
--

DROP TABLE IF EXISTS `robot`;
CREATE TABLE `robot` (
  `id` int(8) NOT NULL,
  `top` varchar(10) DEFAULT NULL,
  `torso` varchar(10) DEFAULT NULL,
  `bottom` varchar(10) DEFAULT NULL,
  --`pic` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `unitprice` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `robot`
--

INSERT INTO `robot` ( `id`,`top`,`torso`,`bottom`,`date`,`unitprice`）
  VALUES
  (1, '12234A1', '90062R2', '3276C3', '2012-1-1', 1),
  (2, '00002A1', '7890B2', 'ABCDC3', '2012-1-1', 1),
  (3, '06BFB1', 'AABB0C2', 'ADC23R3', '2012-1-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS 'parts';
CREATE TABLE 'parts' (
  'id' int(8) NOT NULL,
  'ca' varchar(10) NOT NULL,
  'pic' varchar(10) DEFAULT NULL,
  'plant' varchar(20) DEFAULT NULL,
  'date' date DEFAULT NULL,
  'unitprice' int(10) DEFAULT NULL,
  'type' varchar(20) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts`
--

INSERT INTO 'parts' ('id', 'ca', 'pic', 'plant', 'date', 'unitprice', 'type') VALUES
(1, '12234A1', 'a1', 'Apple', 2010-01-01, 9, 'top'),
(2, '00002A1', 'a1', 'Durian', 2016-01-12, 10, 'top'),
(3, '06BFB1', 'b1', 'Apple', 2017-01-01, 10, 'top'),
(4, '7890B2', 'b2', 'Apple', 2016-01-12, 7, 'torso'),
(5, 'AABB0C2', 'c2', 'Banana', 2016-03-12, 5, 'torso'),
(6, '3276C3', 'c3', 'Durian', 2016-01-12, 8, 'bottom'),
(7, 'ABCDC3', 'c3', 'Red Umbrella', 2016-01-12, 8, 'bottom'),
(8, '0011R1', 'r1', 'Banana', 2016-04-05, 9, 'top'),
(9, '90062R2', 'r2', 'Running man', 2016-01-12, 10, 'torso'),
(10, 'ADC23R3', 'r3', 'Red Umbrella', 2016-01-12, 20, 'bottom'),
(11, '90786W2', 'w2', 'Durian', 2017-01-12, 7, 'torso'),
(12, 'AD454W3', 'w3', 'Banana', 2017-01-12, 12, 'bottom');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `priorities`;
CREATE TABLE `priorities` (
  `id` int(1) NOT NULL,
  `name` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histories`
--

INSERT INTO `priorities` (`id`, `name`) VALUES
(1, 'low'),
(2, 'medium'),
(3, 'high');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE `sizes` (
  `id` int(1) NOT NULL,
  `name` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, 'small'),
(2, 'medium'),
(3, 'large');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
  `id` int(1) NOT NULL,
  `name` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'in progress'),
(2, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(2) NOT NULL,
  `task` varchar(22) DEFAULT NULL,
  `priority` int(1) DEFAULT NULL,
  `size` int(1) DEFAULT NULL,
  `group` int(1) DEFAULT NULL,
  `deadline` varchar(8) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `priority`, `size`, `group`, `deadline`, `status`, `flag`) VALUES
(1, 'COMP1234 assignment', 3, 2, 2, '20170219', '1', ''),
(2, 'Mow the lawn', 2, 2, 1, '', '2', ''),
(3, 'Wash the car', 2, 2, 1, '', '', ''),
(4, 'Paint the fence', 1, 2, 1, '', '', ''),
(5, 'Study for midterms', 3, 3, 2, '', '', ''),
(6, 'Intramural hockey game', 1, 2, 4, '', '', ''),
(7, 'Canucks hockey game', 3, 3, 4, '20170305', '', ''),
(8, 'Buy steel-toed boots', 2, 1, 3, '', '', ''),
(9, 'Learn French', 1, 3, 3, '20161231', '1', ''),
(10, 'Hit the gym', 2, 1, 4, '', '', ''),
(11, 'Pay bills', 3, 1, 1, '', '', ''),
(12, 'Meet George', 2, 1, 1, '', '', ''),
(13, 'Buy milk & bread', 2, 1, 1, '', '', '1'),
(14, 'Read War & Peace', 1, 3, 1, '', '', ''),
(15, 'Organize the study', 1, 4, 1, '', '', '');

--
-- Indexes for dumped tables
--
ALTER TABLE `parts`
  ADD PRIMARY KEY ('id');

--
-- Indexes for table `robot`
--
ALTER TABLE `robot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
