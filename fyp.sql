-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 08:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_No` int(5) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_Contact` int(20) NOT NULL,
  `Pax` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(10) NOT NULL,
  `Order_ID` int(10) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Table_No` int(5) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_Contact` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dine-in`
--

CREATE TABLE `dine-in` (
  `Dine-in_ID` int(10) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_Contact` int(20) NOT NULL,
  `Payment_Type` varchar(20) NOT NULL,
  `Order_Type` varchar(50) NOT NULL,
  `Table_No` int(5) NOT NULL,
  `Order_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Manager_ID` int(10) NOT NULL,
  `Manager_Name` varchar(50) NOT NULL,
  `Manager_Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(10) NOT NULL,
  `Table_No` int(5) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_Contact` int(20) NOT NULL,
  `Order_Type` varchar(50) NOT NULL,
  `Order_Amount` int(10) NOT NULL,
  `Order_Date` date NOT NULL,
  `Payment_Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(10) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Staff_Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `takeaway`
--

CREATE TABLE `takeaway` (
  `Takeaway_ID` int(10) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_Contact` int(20) NOT NULL,
  `Payment_Type` varchar(20) NOT NULL,
  `Order_Type` varchar(50) NOT NULL,
  `Order_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Transaction_ID` int(10) NOT NULL,
  `Order_ID` int(10) NOT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Amount` int(10) DEFAULT NULL,
  `Order_Type` varchar(50) NOT NULL,
  `Payment_Type` varchar(20) DEFAULT NULL,
  `Amount_Paid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_No`),
  ADD UNIQUE KEY `Cust_Name` (`Cust_Name`),
  ADD UNIQUE KEY `Cust_Contact` (`Cust_Contact`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`),
  ADD UNIQUE KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Table_No`),
  ADD UNIQUE KEY `Cust_Name` (`Cust_Name`),
  ADD UNIQUE KEY `Cust_Contact` (`Cust_Contact`);

--
-- Indexes for table `dine-in`
--
ALTER TABLE `dine-in`
  ADD PRIMARY KEY (`Dine-in_ID`),
  ADD UNIQUE KEY `Cust_Name` (`Cust_Name`,`Cust_Contact`,`Payment_Type`,`Order_Type`,`Table_No`,`Order_Date`),
  ADD UNIQUE KEY `Order_Date` (`Order_Date`),
  ADD KEY `Cust_Contact` (`Cust_Contact`),
  ADD KEY `Payment_Type` (`Payment_Type`),
  ADD KEY `Order_Type` (`Order_Type`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Manager_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD UNIQUE KEY `Cust_Name` (`Cust_Name`),
  ADD UNIQUE KEY `Cust_Contact` (`Cust_Contact`),
  ADD UNIQUE KEY `Order_Type` (`Order_Type`,`Order_Amount`,`Order_Date`,`Payment_Type`),
  ADD UNIQUE KEY `Order_Date` (`Order_Date`),
  ADD UNIQUE KEY `Order_Amount` (`Order_Amount`),
  ADD UNIQUE KEY `Payment_Type` (`Payment_Type`),
  ADD KEY `Table_No` (`Table_No`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `takeaway`
--
ALTER TABLE `takeaway`
  ADD PRIMARY KEY (`Takeaway_ID`),
  ADD UNIQUE KEY `Cust_Name` (`Cust_Name`,`Cust_Contact`,`Payment_Type`,`Order_Type`,`Order_Date`),
  ADD KEY `Cust_Contact` (`Cust_Contact`),
  ADD KEY `Payment_Type` (`Payment_Type`),
  ADD KEY `Order_Type` (`Order_Type`),
  ADD KEY `Order_Date` (`Order_Date`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD UNIQUE KEY `Payment_Type` (`Payment_Type`),
  ADD UNIQUE KEY `Order_ID` (`Order_ID`,`Order_Date`,`Order_Amount`,`Order_Type`),
  ADD KEY `Order_Type` (`Order_Type`),
  ADD KEY `Trans_Date` (`Order_Date`),
  ADD KEY `Order_Amount` (`Order_Amount`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_No` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dine-in`
--
ALTER TABLE `dine-in`
  MODIFY `Dine-in_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `Manager_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `takeaway`
--
ALTER TABLE `takeaway`
  MODIFY `Takeaway_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Transaction_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`Cust_Name`) REFERENCES `customer` (`Cust_Name`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`Cust_Contact`) REFERENCES `customer` (`Cust_Contact`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Cust_Contact`) REFERENCES `order` (`Cust_Contact`);

--
-- Constraints for table `dine-in`
--
ALTER TABLE `dine-in`
  ADD CONSTRAINT `dine-in_ibfk_1` FOREIGN KEY (`Cust_Name`) REFERENCES `order` (`Cust_Name`),
  ADD CONSTRAINT `dine-in_ibfk_2` FOREIGN KEY (`Cust_Contact`) REFERENCES `order` (`Cust_Contact`),
  ADD CONSTRAINT `dine-in_ibfk_3` FOREIGN KEY (`Payment_Type`) REFERENCES `order` (`Payment_Type`),
  ADD CONSTRAINT `dine-in_ibfk_4` FOREIGN KEY (`Order_Type`) REFERENCES `order` (`Order_Type`),
  ADD CONSTRAINT `dine-in_ibfk_5` FOREIGN KEY (`Order_Date`) REFERENCES `order` (`Order_Date`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`Table_No`) REFERENCES `customer` (`Table_No`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`Cust_Name`) REFERENCES `customer` (`Cust_Name`);

--
-- Constraints for table `takeaway`
--
ALTER TABLE `takeaway`
  ADD CONSTRAINT `takeaway_ibfk_1` FOREIGN KEY (`Cust_Name`) REFERENCES `order` (`Cust_Name`),
  ADD CONSTRAINT `takeaway_ibfk_2` FOREIGN KEY (`Cust_Contact`) REFERENCES `order` (`Cust_Contact`),
  ADD CONSTRAINT `takeaway_ibfk_3` FOREIGN KEY (`Payment_Type`) REFERENCES `order` (`Payment_Type`),
  ADD CONSTRAINT `takeaway_ibfk_4` FOREIGN KEY (`Order_Type`) REFERENCES `order` (`Order_Type`),
  ADD CONSTRAINT `takeaway_ibfk_5` FOREIGN KEY (`Order_Date`) REFERENCES `order` (`Order_Date`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`Order_Type`) REFERENCES `order` (`Order_Type`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`Order_Date`) REFERENCES `order` (`Order_Date`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`Order_Amount`) REFERENCES `order` (`Order_Amount`),
  ADD CONSTRAINT `transaction_ibfk_5` FOREIGN KEY (`Payment_Type`) REFERENCES `order` (`Payment_Type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
