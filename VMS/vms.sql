-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 12:16 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` varchar(10) NOT NULL,
  `model` varchar(15) NOT NULL,
  `mfg` date NOT NULL,
  `price` int(6) NOT NULL,
  `chasis_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `model`, `mfg`, `price`, `chasis_no`) VALUES
('A001', 'AUDI', '2007-03-25', 1200000, '54162'),
('a215', 'Duster', '2004-05-12', 800000, '541221'),
('AL99', 'ALTO', '2014-05-31', 100000, '56356'),
('c010', 'Duster', '2004-05-12', 800000, '541221'),
('c030', 'Fortuner', '2006-08-27', 150000, '2151245'),
('c123', 'Astonmartin', '2008-02-02', 2200000, '78535424');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(10) NOT NULL,
  `name` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `carname` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `username`, `password`, `mobile`, `carname`, `address`, `gender`, `email`) VALUES
(2, 'Patel Tejash', 'tejash', 'tejash', '8866069496', 'BMW', 'Dabhan', 'M', 'tejasp361@gmail.com'),
(3, 'Jill Patel', 'jill', 'jill', '9586787670', 'BMW', 'Vaso', 'M', 'jillpatel92@live.co.uk'),
(26, 'ram', 'ram', 'ram', '9874547895', 'Maruti', 'Anand', 'M', 'ram@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` varchar(10) NOT NULL,
  `car_id` varchar(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `qty` int(4) NOT NULL,
  `reorder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `car_id`, `item_name`, `price`, `qty`, `reorder`) VALUES
('O19', '', 'Oil Cans', 250, 74, 100),
('SC91', 'Seat Cover', 'Seat Cover', 1500, 16, 0),
('SG78', 'Side Glass', 'Side Glass', 10, 11, 0),
('W43', 'Wiper', 'Wiper', 500, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(5) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `total` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service` int(4) NOT NULL,
  `cust_id` varchar(10) NOT NULL,
  `cost` int(6) NOT NULL,
  `meter_read` int(6) NOT NULL,
  `start_date` date NOT NULL,
  `work` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service`, `cust_id`, `cost`, `meter_read`, `start_date`, `work`) VALUES
(7, '1', 6450, 35121, '2018-02-03', 'Oil Change,Wheel-Allignment,Car-Wash,Engine-Service,'),
(27, '2', 0, 51212, '2017-12-27', ''),
(29, '1', 750, 45645, '2018-03-02', 'Oil Change,Wheel-Allignment,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
