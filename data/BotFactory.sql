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
-- Table structure for table `robots`
--

DROP TABLE IF EXISTS `robots`;
CREATE TABLE `robots` (
  `id` int(8) NOT NULL,
  `top` varchar(10) DEFAULT NULL,
  `torso` varchar(10) DEFAULT NULL,
  `bottom` varchar(10) DEFAULT NULL,
  --`pic` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `price` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `robot`
--

INSERT INTO `robots` ( `id`,`top`,`torso`,`bottom`,`date`,`price`）
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
(1, '12234A1', 'a1', 'Apple', 2010-01-01, 10, 'top'),
(2, '00002A1', 'a1', 'Durian', 2016-01-12, 10, 'top'),
(3, '06BFB1', 'b1', 'Apple', 2017-01-01, 10, 'top'),
(4, '7890B2', 'b2', 'Apple', 2016-01-12, 10, 'torso'),
(5, 'AABB0C2', 'c2', 'Banana', 2016-03-12, 10, 'torso'),
(6, '3276C3', 'c3', 'Durian', 2016-01-12, 10, 'bottom'),
(7, 'ABCDC3', 'c3', 'Red Umbrella', 2016-01-12, 10, 'bottom'),
(8, '0011R1', 'r1', 'Banana', 2016-04-05, 10, 'top'),
(9, '90062R2', 'r2', 'Running man', 2016-01-12, 10, 'torso'),
(10, 'ADC23R3', 'r3', 'Red Umbrella', 2016-01-12, 10, 'bottom'),
(11, '90786W2', 'w2', 'Durian', 2017-01-12, 10, 'torso'),
(12, 'AD454W3', 'w3', 'Banana', 2017-01-12, 10, 'bottom');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS 'histories';
CREATE TABLE 'histories' (
  'id' int NOT NULL AUTO_INCREMENT,
  'type' varchar(20) DEFAULT NULL,
  'partstype' varchar(40) DEFAULT NULL,
  'date' varchar(40) DEFAULT NULL,
  'price' int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histories`
--

INSERT INTO 'histories' ('type', 'partstype', 'date', 'price')
  VALUES
  ('Purchased Box', 'a1 b2 c3 d1 e2 f3 g1 h2 i3 j1', '10:30pm April 15 2014', 100),
  ('Purchased Box', 'c1 b2 q3 d1 e2 l3 g2 p2 x3 m1', '08:30pm April 17 2014', 100),
  ('Purchased Box', 'x1 b2 c3 d1 e2 f3 g1 h2 i3 j1', '07:30pm April 12 2014', 100),
  ('Purchased Box', 'z1 b1 c3 y1 x2 f3 g2 k2 i3 n1', '06:30pm April 11 2014', 100),
  ('Purchased Box', 'w1 q1 e3 r1 x3 f3 g2 k1 i1 n2', '07:30pm April 11 2014', 100),
  ('Purchased Box', 'z1 w1 p3 n1 e2 r3 g2 c2 e3 n1', '08:30pm April 11 2014', 100),
  ('Robot Assembly', 'a2 b1 c3', '05:30pm April 15 2014', 0),
  ('Robot Assembly', 'c1 c2 c3', '04:30pm April 19 2014', 0),
  ('Robot Assembly', 'p1 b2 z3', '03:30pm April 21 2014', 0),
  ('Robot Assembly', 'z1 j2 m3', '01:30am April 24 2014', 0),
  ('Robot Assembly', 'e1 j2 w3', '03:30am April 21 2014', 0),
  ('Robot Assembly', 'p1 x2 q3', '06:30am April 22 2014', 0),
  ('Robot Assembly', 'b1 t2 y3', '07:30am April 23 2014', 0),
  ('Return Part(s)', 'a2 b1', '07:30am April 28 2014', 10),
  ('Return Part(s)', 'p2 b3 c3', '03:50am April 29 20144', 15),
  ('Return Part(s)', 'r2 q3 e3', '05:50am April 20 2014', 15),
  ('Return Part(s)', 'm2 n3 y3', '08:50am April 18 2014', 15),
  ('Return Part(s)', 'p3', '06:50am April 15 2014', 5),
  ('Return Part(s)', 'p1 b2 c2 d2', '01:50am April 14 2014', 20),
  ('Sold Robot', 'p1 b2 c3', '03:30am April 28 2014', 25),
  ('Sold Robot', 'a1 b2 c3', '04:30am April 26 2014', 25),
  ('Sold Robot', 'a1 a2 a3', '05:30am April 29 2014', 50),
  ('Sold Robot', 'b1 b2 b3', '06:30pm April 21 2014', 50),
  ('Sold Robot', 'm1 m2 m3', '11:30am April 20 2014', 100),
  ('Sold Robot', 'm1 n2 o3', '12:30am April 23 2014', 50),
  ('Sold Robot', 'w1 w2 w3', '04:30am April 24 2014', 200),
  ('Sold Robot', 'w1 y2 z3', '01:30am April 25 2014', 100);

--
-- Indexes for dumped tables
--
ALTER TABLE `parts`
  ADD PRIMARY KEY ('id');

--
-- Indexes for table `robot`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

