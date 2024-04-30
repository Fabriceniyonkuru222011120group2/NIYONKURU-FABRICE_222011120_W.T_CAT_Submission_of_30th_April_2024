-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 06:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_managementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES
(1, 'imena', 'amani', 'man@gmail.com', '73123423'),
(2, 'sam', 'wizzy', 'samwizz@gmail.com', '234567888'),
(3, 'SDFGHJKL', 'DFGHJ', 'XCVBNM', 'DFGHJK'),
(4, 'tom', 'mickason', 'tom|@gmail.com', '656543248'),
(5, 'bukayo', 'buka', 'bukayo@gmail.com', '2345678'),
(6, 'kevin', 'k', 'kevin@gmail.com', '987654');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `FirstName`, `LastName`, `Position`, `Email`, `Phone`) VALUES
(1, 'dann', 'henry', 'Human resource manager', 'dan@gmail.com', '12345678'),
(4, 'ben', 'kevin', 'human resource', 'benkevin@gmail.com', '3456787654'),
(6, 'mellisa', 'channy', 'speakerof the board', 'melissa@gmail.com', '2345678'),
(7, 'ganza', 'betty', 'assistance manager', 'ganza@gmail.com', '07988876'),
(8, 'bwiza', 'emelye', 'accountant', 'bwiza@gmail.com', '0989876');

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `LandlordID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`LandlordID`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES
(1, 'kim', 'nana', 'kimjong@gmail.com', '12345612345'),
(3, 'sdwer', 'asd', 'asdf', '12345'),
(4, 'manzi', 'ben', 'manziben@gmail.com', '23456789'),
(5, 'ham', 'Bob', 'ham@gmail.com', '23456789');

-- --------------------------------------------------------

--
-- Table structure for table `leases`
--

CREATE TABLE `leases` (
  `LeaseID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `LeaseStart` date DEFAULT NULL,
  `LeaseEnd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`LeaseID`, `CustomerID`, `PropertyID`, `LeaseStart`, `LeaseEnd`) VALUES
(3, 1, 1, '2011-11-11', '2011-12-11'),
(8, 3, 2, '2024-09-09', '2024-10-10'),
(11, 2, 2, '2012-09-09', '2022-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `maintenancerequests`
--

CREATE TABLE `maintenancerequests` (
  `RequestID` int(11) NOT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `DateRequested` date DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenancerequests`
--

INSERT INTO `maintenancerequests` (`RequestID`, `PropertyID`, `Description`, `DateRequested`, `Status`) VALUES
(1, 2, 'water issues', '2012-07-02', 'booked'),
(2, 3, 'umuriro', '2023-08-08', 'unbooked'),
(3, 1, 'roof problems', '2000-11-11', 'booked'),
(4, 4, 'wireless', '2012-07-07', 'booked'),
(5, 5, 'electric power', '2021-03-03', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(11) NOT NULL,
  `LeaseID` int(11) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `LeaseID`, `PaymentDate`, `Amount`) VALUES
(1, 3, '2021-03-02', 500000),
(2, 8, '2024-02-02', 800000),
(8, 11, '2012-09-09', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `PropertyID` int(11) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Bedrooms` int(11) DEFAULT NULL,
  `Bathrooms` float DEFAULT NULL,
  `MonthlyRent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`PropertyID`, `Address`, `Type`, `Bedrooms`, `Bathrooms`, `MonthlyRent`) VALUES
(1, 'kmb', 'family', 5, 1, 800000),
(2, 'musanze', 'single', 4, 2, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `telephone`, `activation_code`) VALUES
(1, 'manzi', 'B', 'manzi@gmail.com', 'nzi', '$2y$10$W07zrqFI.oNUgBL3Mg7uoebEuIgcZCvsXirSTcQCRMghJ1S6W60he', '09000000', '12'),
(2, 'fab', 'niyo', 'fab@gmail.com', 'fab', '$2y$10$jz7KX1m.wk7rOb0bxZj2GOzPDkvKJVc2vYLrD6lHyb1ulWOl5YwQ2', '078987867', '1234'),
(3, 'niyo', 'pau;', 'paul@gmail.co', 'jp', '$2y$10$ALiFWf2YK8BYacl5mMdhbOzqtzAsqUk/JycNFKG0aQOCETVHlwTvq', '098888888', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`LandlordID`);

--
-- Indexes for table `leases`
--
ALTER TABLE `leases`
  ADD PRIMARY KEY (`LeaseID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `maintenancerequests`
--
ALTER TABLE `maintenancerequests`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `LeaseID` (`LeaseID`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`PropertyID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2346;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `LandlordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leases`
--
ALTER TABLE `leases`
  MODIFY `LeaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `maintenancerequests`
--
ALTER TABLE `maintenancerequests`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `PropertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leases`
--
ALTER TABLE `leases`
  ADD CONSTRAINT `leases_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`),
  ADD CONSTRAINT `leases_ibfk_2` FOREIGN KEY (`PropertyID`) REFERENCES `properties` (`PropertyID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`LeaseID`) REFERENCES `leases` (`LeaseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
