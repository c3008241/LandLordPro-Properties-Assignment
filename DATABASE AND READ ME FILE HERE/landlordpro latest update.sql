-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 01:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landlordpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_ID` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_ID`, `user_id`, `balance`) VALUES
(2, 14, 1200),
(3, 15, 1000),
(4, 16, 1310),
(5, 17, 1000),
(6, 18, 1000),
(7, 19, 490),
(8, 20, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `addproperties`
--

CREATE TABLE `addproperties` (
  `addProperty_ID` int(15) NOT NULL,
  `propertyName` text NOT NULL,
  `propertyAddress` text NOT NULL,
  `propertyType` text NOT NULL,
  `bedrooms` text NOT NULL,
  `rentAmount` text NOT NULL,
  `propertyDescription` text NOT NULL,
  `propertyImg` varbinary(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addproperties`
--

INSERT INTO `addproperties` (`addProperty_ID`, `propertyName`, `propertyAddress`, `propertyType`, `bedrooms`, `rentAmount`, `propertyDescription`, `propertyImg`) VALUES
(1, 'testingggggggg', '125 Scjidoae', 'Apartment', '1', '500', 'gvy', ''),
(2, 'Testing2', 'gdyeisaGOD', 'Condo', '1', '500', 'dabejk', 0x627564676574547261636b65724c6f676f2e6a7067),
(3, 'amandas house', '123 street', 'House', '2', '500', 'nice', 0x686f75736520746573742e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `property_id` int(15) NOT NULL,
  `tenant_id` int(15) NOT NULL,
  `landlord_id` int(15) NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `application_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `property_id`, `tenant_id`, `landlord_id`, `message`, `status`, `application_date`) VALUES
(31, 8, 11, 8, 'hi, im interested in this property by lia.', 'approved', '2025-04-25 01:58:30'),
(32, 9, 11, 8, 'i want a nice home from lia', 'rejected', '2025-04-25 02:11:39'),
(33, 10, 11, 7, 'im interested by lia', 'rejected', '2025-04-25 02:12:00'),
(34, 12, 11, 5, 'bla bla blanhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'approved', '2025-04-28 19:26:38'),
(35, 9, 11, 8, 'ffffffffffffffffffffffffffffffffffffffffffffff', 'pending', '2025-04-28 19:27:59'),
(36, 9, 17, 8, 'hi hi hi hi hihi love houses yayayayayayay', 'pending', '2025-04-29 14:58:04'),
(37, 8, 17, 16, 'Hi i would like to apply for this nice place thank you', 'approved', '2025-04-29 15:03:46'),
(38, 8, 19, 16, 'hi i rlly like this house i want to get it please thank you !!!', 'rejected', '2025-04-30 14:28:15'),
(39, 9, 17, 15, 'hjvjhvnjkib jhvbjhvjjjjjjjjjjjjjjjj', 'pending', '2025-04-30 15:50:34'),
(40, 9, 17, 15, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'pending', '2025-04-30 15:50:55'),
(41, 9, 17, 15, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'pending', '2025-04-30 16:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(15) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `addProperty_ID` int(15) NOT NULL,
  `location` text NOT NULL,
  `propertyImg` varbinary(30) NOT NULL,
  `price` text NOT NULL,
  `bedroomQuantity` text NOT NULL,
  `status` varchar(20) DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `landlord_id`, `addProperty_ID`, `location`, `propertyImg`, `price`, `bedroomQuantity`, `status`) VALUES
(8, 16, 0, '91 street', 0x363830616465653635646232642e6a7067, '400', '1', 'Available'),
(9, 15, 0, '44 bloom street', 0x363830616563303938303136392e6a7067, '700', '21', 'Available'),
(10, 16, 0, '64 thorpe road', 0x363830616563656334306362662e6a7067, '300', '1', 'Available'),
(11, 15, 0, '11 moon street', 0x363830616564346539646363332e6a7067, '800', '3', 'Available'),
(12, 14, 0, '82 mills street', 0x363830616564393965323232332e6a7067, '650', '4', 'Available'),
(13, 14, 0, '24 graves road', 0x363830616564663335663531382e6a7067, '550', '3', 'Available'),
(14, 16, 0, '48 abby road', 0x363830616565393039346264652e6a7067, '320', '1', 'Available'),
(15, 15, 0, '72 herrinton road', 0x363830616565636531366236312e6a7067, '410', '2', 'Available'),
(16, 14, 0, '8 vestry road', 0x363830616566333063323637302e77656270, '740', '4', 'Available'),
(19, 14, 0, 'bdjalkbc', 0x363831323837326435623066612e6a7067, '7', '7', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(15) NOT NULL,
  `fullName` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_type` enum('tenant','landlord') NOT NULL DEFAULT 'tenant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `fullName`, `email`, `password`, `user_type`) VALUES
(1, 'Jalalah Al-jalal', 'jalalah@gmail.com', 'la4cltj', 'tenant'),
(2, 'sam', 'samy@gmail.com', 'ua529', 'landlord'),
(3, 'lily', 'lily1@gmail.com', 'ni401', 'landlord'),
(4, 'Rahaf Saleh', 'rahaf@gmail.com', 'ta0cf', 'landlord'),
(5, 'Arzoo Smith', 'arzoo@gmail.com', 'criqo', 'landlord'),
(6, 'Milly Khan', 'milly@gmail.com', 'oi4ny', 'landlord'),
(7, 'jack', 'jack@gmail.com', 'lavm', 'landlord'),
(8, 'amanda', 'amanda@gmail.com', 'cmtpdt', 'landlord'),
(9, 'pam', 'pam@gmail.com', 'ra5', ''),
(10, 'Blabla', 'don@gmail.com', 'fo6', 'tenant'),
(11, 'lia', 'lia@gmail.com', 'nit', 'tenant'),
(12, 'laraa gates', 'laraa@gmail.com', 'naaca', 'landlord'),
(14, 'Ray Saleh ', 'ray@gmail.com', 'ray', 'landlord'),
(15, 'Syafiq Khan', 'syafiq@gmail.com', 'syafiq', 'landlord'),
(16, 'Jalalah Saleh', 'jalalahsaleh@gmail.com', 'jalalah', 'landlord'),
(17, 'Tenant', 'tenant@gmail.com', 'tenant', 'tenant'),
(18, 'Lily Wann', 'lilywann@gmail.com', 'lily', 'tenant'),
(19, 'Samuel Witaker ', 'samuel@gmail.com', 'sam', 'tenant'),
(20, 'maysoon', 'maysoon@gmail.com', 'maysoon', 'tenant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `addproperties`
--
ALTER TABLE `addproperties`
  ADD PRIMARY KEY (`addProperty_ID`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `landlord_id` (`landlord_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `addproperties`
--
ALTER TABLE `addproperties`
  MODIFY `addProperty_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `userinfo` (`user_id`),
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`landlord_id`) REFERENCES `userinfo` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
