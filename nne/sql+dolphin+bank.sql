-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 06:52 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dolphin_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` char(25) DEFAULT NULL,
  `pwd` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary1`
--

CREATE TABLE `beneficiary1` (
  `benef_cust_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL DEFAULT 'n/a',
  `account_no` int(12) NOT NULL DEFAULT 0,
  `routing_number` int(11) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `beneficiary_balance` int(10) NOT NULL DEFAULT 0,
  `trans_description` varchar(100) NOT NULL DEFAULT 'n/a',
  `bank_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary1`
--

INSERT INTO `beneficiary1` (`benef_cust_id`, `fullname`, `account_no`, `routing_number`, `customer_id`, `beneficiary_balance`, `trans_description`, `bank_name`) VALUES
(1, 'John Jon', 2117252089, 121000358, 1, 7024, '', 'Bank of America'),
(2, 'David Allen', 2107483647, 121000248, 1, 486, '', 'Wells Fargo'),
(3, 'Christen Bush', 2123123122, 323277720, 2, 388, '', 'Dolphin Bank'),
(4, 'Victor Carter', 2106543211, 213993000, 3, 300, '', 'Dolphin Bank'),
(7, 'Grey Anthony', 2107262009, 21000089, 4, 1000, 'Payment', 'Optum Bank, Inc.'),
(8, 'Jeremy Hod', 2114539282, 267084131, 4, 200, 'Payment', 'Chase Bank');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `routing_number` int(9) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `account_no` int(12) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `card number` varchar(19) NOT NULL DEFAULT '12** **** **** 94**'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `gender`, `dob`, `routing_number`, `email`, `phone_no`, `address`, `account_no`, `pin`, `uname`, `pwd`, `card number`) VALUES
(1, 'Andre ', 'Robert', 'Male', '1994-11-28', 123456789, 'andrerobert21@gmail.com', '+1 8918722499', '1 ABBEY STREET,AKPAJO-ELEME, RIVERS-STATE', 2117253213, 1234, 'Andre1', 'Andre123', '12** **** **** 94**'),
(2, 'Md Salman', 'Ali', 'male', '1994-10-11', 987654321, 'ali.salman@gmail.com', '+966 895432167', 'Al Ahsa Street Malaz, King Abdulaziz Rd, Alamal Dist. RIYADH 12643-2121.', 1133557788, 1234, 'salman', 'salman123', '12** **** **** 94**'),
(3, 'Tushar', 'Kr. Pandey', 'male', '1995-02-03', 125656765, 'tusharpkt@gmail.com', '+334 123456987', 'Champ de Mars, \r\n5 Avenue Anatole France, \r\n75007 Paris, France', 1122338457, 1357, 'tushar', 'tushar123', '12** **** **** 94**'),
(4, 'John', 'Udomah', 'Male', '1985-02-03', 21000079, 'udomajohn21@gmail.com', '+234 8143607775', 'Avatar Kingdom.', 2117252088, 2088, 'Johnnie Emmanuel', 'joecliff2088', '12** **** **** 94**');

-- --------------------------------------------------------

--
-- Table structure for table `passbook1`
--

CREATE TABLE `passbook1` (
  `trans_id` int(50) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `balance` int(30) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `trans_beneficiary` varchar(255) NOT NULL DEFAULT 'n/a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook1`
--

INSERT INTO `passbook1` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`, `customer_id`, `trans_beneficiary`) VALUES
(1, '2021-04-21 00:00:00', 'Account Top-Up', 0, 3600000, 3600000, 1, 'card'),
(2, '2021-04-15 00:00:00', 'Account Top-Up', 0, 620000, 620000, 2, 'card'),
(3, '2021-04-19 00:00:00', 'Account Top-Up', 0, 3200002, 3200002, 3, 'card'),
(4, '2021-04-16 00:00:00', 'Account Top-Up', 0, 5000000, 5000000, 4, 'card'),
(5, '2021-08-27 07:15:45', 'Cash Transfer', 1000, 0, 4999000, 4, 'Grey Anthony'),
(6, '2021-08-27 07:30:38', 'Cash Transfer', 200, 0, 4998800, 4, 'Jeremy Hod');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary1`
--
ALTER TABLE `beneficiary1`
  ADD PRIMARY KEY (`benef_cust_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `aadhar_no` (`routing_number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `passbook1`
--
ALTER TABLE `passbook1`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiary1`
--
ALTER TABLE `beneficiary1`
  MODIFY `benef_cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passbook1`
--
ALTER TABLE `passbook1`
  MODIFY `trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
