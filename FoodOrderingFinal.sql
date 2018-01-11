-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2018 at 06:02 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FoodOrderingFinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `CART`
--

CREATE TABLE `CART` (
  `Type` varchar(255) DEFAULT NULL,
  `TypeOpt` varchar(255) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `ID_No` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `Phone` char(12) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Username` varchar(12) NOT NULL,
  `Password` varchar(12) DEFAULT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`ID_No`, `Name`, `Address`, `Phone`, `Email`, `Username`, `Password`, `Created_Date`) VALUES
(1001, 'W. Smith', '1234 Oak St.', '12314', 'warren.smith@com.org', 'wsmith', 'pass', '2017-11-21 21:48:44'),
(1002, 'F. Wong', '1023 Mahogany Lane.', '232-323-1223', 'Wong@sbcglobal.org', 'fwong', 'wong', '2017-11-25 19:47:13'),
(1003, 'H. Vu', '4213 Maple Ave.', '124-241-1244', 'hai.vu@uta.edu', 'hvu', 'genericpassw', '2017-11-25 20:45:14'),
(1004, 'J. Smith', '1232 Town Ctr.', '874-433-4345', 'smith@gmail.com', 'jsmith', '123456', '2017-11-25 20:46:18'),
(1005, 'T. Jones', '4632 Mountain Dr.', '234-234-5555', 'tom.jones@columbiarecords.com', 'tjones', 'jonez', '2017-11-25 20:49:23'),
(1006, 'M. Gates', '1234 Vista Ave.', '678-453-3453', 'melinda.gates@microsoft.net', 'mgates', 'linux', '2017-11-25 20:51:19'),
(1007, 'J. Jones', '6865 Downtown St.', '336-121-4385', 'jones@lucasfilm.net', 'jjones', 'darthvader', '2017-11-25 20:52:51'),
(1008, 'T. Hanks', '1422 Street Blvd.', '444-523-5923', 'thanks@gmail.com', 'thanks', 'captainphill', '2017-11-25 20:56:02'),
(1009, 'S. Williams', '3235 Hilltop Ave.', '323-342-2342', 'williams@yahoo.org', 'swilliams', '34345234', '2017-11-25 20:57:31'),
(1010, 'E. Watson', '2353 Timberlane Dr.', '342-242-6655', 'ewatson@mit.edu', 'ewatson', 'pass', '2017-11-25 23:33:08'),
(1011, 'C. Basie', '1232 Easy St.', '342-324-2342', 'april@paris.org', 'cbasie', 'jazz', '2017-11-25 23:37:04'),
(1012, 'S. Jobs', '3343 Apple Ln.', '347-543-4142', 'ceo@apple.com', 'jobs', 'crapple', '2017-11-25 23:38:45'),
(1013, 'G. Miller', '65000 Pennsylvania Ave.', '342-234-5477', 'jazz@usaf.mil', 'gmiller', 'airmenofnote', '2017-11-25 23:52:22'),
(1014, 'W. Goldberg', '6643 Trek Tr.', '436-544-2342', 'goldber@tng.trek', 'wgoldberg', 'tos', '2017-11-25 23:54:30'),
(1015, 'J. Jameson', '3422 Daily Dr.', '786-342-123', 'JJ@dailybugle.com', 'jjameson', 'editor', '2017-11-25 23:56:46'),
(1016, 'D. Davito', '3453 Philly Ave.', '234-764-255', 'davito@mit.edu', 'davito', 'alwayssunny', '2017-11-25 23:58:32'),
(1017, 'J. Brahms', '5634 Augusta Blvd.', '658-536-4363', 'brahms@juliard.edu', 'jbrahms', 'composer', '2017-11-25 23:59:55'),
(1018, 'L. Beethoven', '5784 Pleasant Dr.', '345-454-765', 'beethoven@music.com', 'lbeethoven', 'password', '2017-11-26 00:01:51'),
(1019, 'F. Williams', '4576 Las Vegas Cir.', '546-768-5676', 'editor@dailybugle.com', 'fwilliams', 'pass', '2017-11-26 00:04:40'),
(1020, 'B. Mays', '4363 Blizzard Way', '333-533-3245', 'mays@sales.com', 'bmays', 'wait', '2017-11-26 01:01:13'),
(1021, 'hai', '123', '123', '123', 'abc', 'abc', '2017-11-26 02:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `ITEMS`
--

CREATE TABLE `ITEMS` (
  `Order_ID` int(11) NOT NULL,
  `Entry_No` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Quantity` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ITEMS`
--

INSERT INTO `ITEMS` (`Order_ID`, `Entry_No`, `Product_ID`, `Quantity`) VALUES
(11, 15, 1002, 20),
(12, 16, 1001, 5),
(13, 17, 1003, 3),
(13, 18, 1004, 2),
(16, 23, 1001, 1),
(18, 25, 1010, 1),
(18, 26, 1002, 2),
(18, 27, 1018, 2),
(18, 28, 1014, 1),
(18, 29, 1021, 1),
(18, 30, 1004, 2),
(18, 31, 1008, 3),
(18, 32, 1011, 1),
(18, 33, 1003, 1),
(20, 36, 1003, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE `ORDERS` (
  `Order_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Total_price` float(7,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `Pay_status` tinyint(1) DEFAULT '0',
  `Pay_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ORDERS`
--

INSERT INTO `ORDERS` (`Order_ID`, `Customer_ID`, `Date`, `Total_price`, `Pay_status`, `Pay_type`) VALUES
(11, 1001, '2017-11-26 01:19:04', 40.00, 1, 'CHECK'),
(12, 1001, '2017-11-26 01:19:24', 25.00, 1, 'CASH'),
(13, 1001, '2017-11-26 01:19:43', 32.00, 1, 'CASH'),
(16, 1002, '2017-11-25 19:58:37', 5.00, 1, 'CASH'),
(18, 1001, '2017-11-26 01:18:05', 66.00, 0, NULL),
(20, 1021, '2017-11-26 02:06:13', 13.00, 1, 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `PAY_TYPE`
--

CREATE TABLE `PAY_TYPE` (
  `Pay_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PAY_TYPE`
--

INSERT INTO `PAY_TYPE` (`Pay_type`) VALUES
('CASH'),
('CHECK');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `Pro_ID` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Description` varchar(280) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Price` float(7,2) NOT NULL,
  `Quantity` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`Pro_ID`, `Type`, `Description`, `Image`, `Price`, `Quantity`) VALUES
(1001, 'APPETIZER', 'Egg Drop Soup', NULL, 5.00, 44),
(1002, 'BEVERAGE', 'Coke', NULL, 2.00, 3),
(1003, 'DESSERT', 'Apple Pie (Slice)', NULL, 6.50, 43),
(1004, 'MAINDISH', 'Ham and Cheese Sandwich', NULL, 6.00, 46),
(1005, 'SALAD', 'Caesar', NULL, 5.00, 19),
(1007, 'SNACK', 'Pretzels', NULL, 2.00, 70),
(1008, 'SIDE', 'Fries', NULL, 4.00, 47),
(1009, 'BEVERAGE', 'Orange Juice', NULL, 3.00, 30),
(1010, 'APPETIZER', 'Buffalo Wings', NULL, 7.00, 19),
(1011, 'DESSERT', 'Baked Alaska', NULL, 9.00, 14),
(1012, 'MAINDISH', 'Ribeye Steak', NULL, 27.00, 5),
(1013, 'SNACK', 'Lays', NULL, 2.50, 40),
(1014, 'MAINDISH', 'Chicken Sandwich', NULL, 6.00, 14),
(1017, 'SNACK', 'Popcorn', NULL, 3.00, 32),
(1018, 'BEVERAGE', 'Water', NULL, 0.50, 98),
(1019, 'SALAD', 'Iceberg', NULL, 7.00, 34),
(1020, 'SALAD', 'House Salad', NULL, 6.00, 55),
(1021, 'MAINDISH', 'Spaghetti', NULL, 8.00, 19);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT_TYPE`
--

CREATE TABLE `PRODUCT_TYPE` (
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRODUCT_TYPE`
--

INSERT INTO `PRODUCT_TYPE` (`Type`) VALUES
('APPETIZER'),
('BEVERAGE'),
('DESSERT'),
('DRINK2'),
('DRINK3'),
('MAINDISH'),
('SALAD'),
('SIDE'),
('SNACK'),
('WINE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`ID_No`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `ITEMS`
--
ALTER TABLE `ITEMS`
  ADD PRIMARY KEY (`Order_ID`,`Entry_No`),
  ADD UNIQUE KEY `Entry_No` (`Entry_No`),
  ADD KEY `productfk` (`Product_ID`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `orders_ibfk_1` (`Customer_ID`),
  ADD KEY `orders_ibfk_2` (`Pay_type`);

--
-- Indexes for table `PAY_TYPE`
--
ALTER TABLE `PAY_TYPE`
  ADD PRIMARY KEY (`Pay_type`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`Pro_ID`),
  ADD KEY `product_ibfk_1` (`Type`);

--
-- Indexes for table `PRODUCT_TYPE`
--
ALTER TABLE `PRODUCT_TYPE`
  ADD PRIMARY KEY (`Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `ID_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;
--
-- AUTO_INCREMENT for table `ITEMS`
--
ALTER TABLE `ITEMS`
  MODIFY `Entry_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `ORDERS`
--
ALTER TABLE `ORDERS`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `Pro_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ITEMS`
--
ALTER TABLE `ITEMS`
  ADD CONSTRAINT `orderfk` FOREIGN KEY (`Order_ID`) REFERENCES `ORDERS` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productfk` FOREIGN KEY (`Product_ID`) REFERENCES `PRODUCT` (`Pro_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `CUSTOMER` (`ID_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Pay_type`) REFERENCES `PAY_TYPE` (`Pay_type`) ON UPDATE CASCADE;

--
-- Constraints for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `PRODUCT_TYPE` (`Type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
