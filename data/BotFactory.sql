-- Cherry RobotFactory Database
-- Host: localhost


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- --------------------------------------------------------
DROP DATABASE IF EXISTS RobotFactory;
CREATE DATABASE RobotFactory;
USE RobotFactory;

DROP TABLE IF EXISTS token;
CREATE TABLE token (
	id int(8) NOT NULL PRIMARY KEY,
	tokenCode VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO token VALUES(1,"25d875");


--
-- Table structure for table `robots`
--

DROP TABLE IF EXISTS Robots;
CREATE TABLE Robots (
  id int(8) NOT NULL PRIMARY KEY auto_increment,
  top varchar(10) DEFAULT NULL,
  torso varchar(10) DEFAULT NULL,
  bottom varchar(10) DEFAULT NULL,
  toppic varchar(10) DEFAULT NULL,
  torsopic varchar(10) DEFAULT NULL,
  bottompic varchar(10) DEFAULT NULL,
  date date DEFAULT NULL,
  price int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `robots`
--


INSERT INTO Robots (id,top,torso,bottom,toppic,torsopic,bottompic,date,price) VALUES
  (1,'12234A1', '90062R2', '3276C3', 'a1', 'r2', 'c3', '2012-1-1', 1),
  (2,'00002A1', '7890B2', 'ABCDC3', 'a1', 'b2', 'c3', '2012-1-1', 1),
  (3,'06BFB1', 'AABB0C2', 'ADC23R3', 'b1', 'c2', 'r3', '2012-1-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS Parts;
CREATE TABLE Parts (
  id int(8) NOT NULL PRIMARY KEY auto_increment,
  ca varchar(10) NOT NULL,
  pic varchar(10) DEFAULT NULL,
  plant varchar(20) DEFAULT NULL,
  date date DEFAULT NULL,
  unitprice int(10) DEFAULT NULL,
  type varchar(20) DEFAULT NULL,
  line varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts`
--

INSERT INTO Parts (id, ca, pic, plant, date, unitprice, type, line) VALUES
(1,'12234A1', 'a1', 'Apple', '2010-01-01', 10, 'top','household'),
(2,'00002A1', 'a1', 'Durian', '2016-01-12', 10, 'top','household'),
(3,'06BFB1', 'b1', 'Apple', '2017-01-01', 10, 'top','household'),
(4,'7890B2', 'b2', 'Apple', '2016-01-12', 10, 'torso','household'),
(5,'AABB0C2', 'c2', 'Banana', '2016-03-12', 10, 'torso','household'),
(6,'AABB043', 'm1', 'Banana', '2016-03-12', 10, 'top','butler'),
(7,'AABB078', 'm2', 'Banana', '2016-03-12', 10, 'torso','butler'),
(8,'3276C3', 'c3', 'Durian', '2016-01-12', 10, 'bottom','household'),
(9,'ABCDC3', 'c3', 'Red Umbrella', '2016-01-12', 10, 'bottom','household'),
(10,'0011A1', 'r1', 'Banana', '2016-04-05', 10, 'top','butler'),
(11,'900622', 'r2', 'Running man', '2016-01-12', 10, 'torso','butler'),
(12,'ADC233', 'r3', 'Red Umbrella', '2016-01-12', 10, 'bottom','butler'),
(13,'907862', 'w2', 'Durian', '2017-01-12', 10, 'torso','companion'),
(14,'AD454e', 'w3', 'Banana', '2017-01-12', 10, 'bottom','companion');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS Histories;
CREATE TABLE Histories (
  id int NOT NULL PRIMARY KEY auto_increment,
  type varchar(20) DEFAULT NULL,
  partstype varchar(1024) DEFAULT NULL,
  date varchar(40) DEFAULT NULL,
  price int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histories`
--

INSERT INTO Histories (id, type, partstype, date, price)
  VALUES
  (1,'Purchased Box', '12234A1 00002A1 06BFB1 7890B2 AABB0C2 3276C3 ABCDC3 0011R1 90062R2 ADC23R3', '10:30pm April 15 2014', 100),
  (2,'Purchased Box', '90786W2 AD454W3', '08:30pm April 17 2014', 20),
  (3,'Robot Assembly', '12234A1 90062R2 276C3', '05:30pm April 15 2014', 0),
  (4,'Robot Assembly', '00002A1 7890B2 ABCDC3', '04:30pm April 19 2014', 0),
  (5,'Robot Assembly', '06BFB1 AABB0C2 ADC23R3', '03:30pm April 21 2014', 0),
  (6,'Return Part(s)', '90786W2 AD454W3', '07:30am April 28 2014', 10),
  (7,'Sold Robot', '12234A1 90062R2 276C3', '03:30am April 28 2014', 25),
  (8,'Sold Robot', '00002A1 7890B2 ABCDC3', '01:30am April 25 2014', 100);