-- phpMyAdmin SQL Dump
-- version 5.0.0-alpha1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 10:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID`, `username`, `password`) VALUES
(0, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menuID` int(11) NOT NULL,
  `menuName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menuID`, `menuName`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Camilan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menuitem`
--

CREATE TABLE `tbl_menuitem` (
  `itemID` int(11) NOT NULL,
  `menuID` int(11) NOT NULL,
  `menuItemName` text NOT NULL,
  `price` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menuitem`
--

INSERT INTO `tbl_menuitem` (`itemID`, `menuID`, `menuItemName`, `price`) VALUES
(1, 1, 'Ayam Penyet', '15000'),
(2, 1, 'Bebek Goreng', '15000'),
(3, 2, 'Es Teh', '10000'),
(4, 2, 'Kopi', '7000'),
(5, 3, 'Kerupuk', '500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int(11) NOT NULL,
  `status` text NOT NULL,
  `total` decimal(15,0) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `status`, `total`, `order_date`) VALUES
(1, 'ready', '30000', '2019-10-17'),
(2, 'preparing', '20000', '2019-10-17'),
(3, 'ready', '35000', '2019-10-17'),
(4, 'preparing', '20000', '2019-10-24'),
(5, 'preparing', '40500', '2019-10-24'),
(6, 'waiting', '15000', '2019-11-13'),
(7, 'waiting', '22500', '2020-06-09'),
(8, 'waiting', '19000', '2021-03-08'),
(9, 'waiting', '37000', '2021-05-22'),
(10, 'waiting', '45000', '2021-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetail`
--

CREATE TABLE `tbl_orderdetail` (
  `orderID` int(11) NOT NULL,
  `orderDetailID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orderdetail`
--

INSERT INTO `tbl_orderdetail` (`orderID`, `orderDetailID`, `itemID`, `quantity`) VALUES
(1, 1, 2, 1),
(1, 2, 1, 1),
(2, 3, 3, 1),
(2, 4, 1, 1),
(3, 5, 2, 1),
(3, 6, 1, 1),
(3, 7, 3, 1),
(4, 8, 1, 1),
(4, 9, 3, 1),
(5, 10, 2, 2),
(5, 11, 3, 2),
(5, 12, 5, 1),
(6, 13, 1, 1),
(7, 14, 4, 1),
(7, 15, 1, 1),
(7, 16, 5, 1),
(8, 17, 3, 1),
(8, 18, 4, 2),
(9, 19, 1, 1),
(9, 20, 2, 1),
(9, 21, 4, 1),
(10, 22, 1, 1),
(10, 23, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role`) VALUES
('waiters'),
('kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staffID` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staffID`, `username`, `password`, `status`, `role`) VALUES
(1, 'waiters', 'waiters', 'Online', 'waiters'),
(2, 'kitchen', 'kitchen', 'Online', 'kitchen'),
(3, 'wt', 'abc123', 'Offline', 'waiters');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `tbl_menuitem`
--
ALTER TABLE `tbl_menuitem`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `menuID` (`menuID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  ADD PRIMARY KEY (`orderDetailID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_menuitem`
--
ALTER TABLE `tbl_menuitem`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  MODIFY `orderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staffID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

