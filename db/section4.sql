-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 03:11 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `section4`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_type_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) NOT NULL,
  `contact_details` text DEFAULT NULL,
  `insert_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `insert_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `company_name`, `address`, `mobile`, `email`, `detail`, `insert_ts`) VALUES
(0, 'aldi', 'daim', 'ulbi', 'cihanjuang', '08358888', 'aldidaim@gmail.com', 'service aki aki\r\n', '2023-12-16 04:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `forfk`
--

CREATE TABLE `forfk` (
  `contact_type_id` int(11) NOT NULL,
  `schedule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forfk`
--

INSERT INTO `forfk` (`contact_type_id`, `schedule`) VALUES
(11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `forfk2`
--

CREATE TABLE `forfk2` (
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forfk2`
--

INSERT INTO `forfk2` (`schedule_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `offer_services`
--

CREATE TABLE `offer_services` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `offer_description` text DEFAULT NULL,
  `service_catalog_id` int(11) DEFAULT NULL,
  `service_discount` decimal(5,2) DEFAULT NULL,
  `offer_price` decimal(8,2) NOT NULL,
  `insert_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer_task`
--

CREATE TABLE `offer_task` (
  `id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `task_catalog_id` int(11) NOT NULL,
  `task_price` decimal(8,2) NOT NULL,
  `insert_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_catalog`
--

CREATE TABLE `service_catalog` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `service_discount` decimal(5,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task_catalog`
--

CREATE TABLE `task_catalog` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `service_catalog_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `ref_interval` tinyint(1) NOT NULL,
  `ref_interval_min` decimal(10,4) NOT NULL,
  `ref_interval_max` decimal(10,4) NOT NULL,
  `describe` tinyint(1) NOT NULL,
  `task_price` decimal(8,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_type_id` (`contact_type_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `schedule_id_2` (`schedule_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forfk`
--
ALTER TABLE `forfk`
  ADD PRIMARY KEY (`contact_type_id`,`schedule`);

--
-- Indexes for table `forfk2`
--
ALTER TABLE `forfk2`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `offer_services`
--
ALTER TABLE `offer_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `service_catalog_id` (`service_catalog_id`);

--
-- Indexes for table `offer_task`
--
ALTER TABLE `offer_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_id` (`offer_id`),
  ADD KEY `task_catalog_id` (`task_catalog_id`);

--
-- Indexes for table `service_catalog`
--
ALTER TABLE `service_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_catalog`
--
ALTER TABLE `task_catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_catalog_id` (`service_catalog_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`contact_type_id`) REFERENCES `forfk` (`contact_type_id`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `contact_ibfk_3` FOREIGN KEY (`schedule_id`) REFERENCES `forfk2` (`schedule_id`);

--
-- Constraints for table `offer_services`
--
ALTER TABLE `offer_services`
  ADD CONSTRAINT `offer_services_ibfk_1` FOREIGN KEY (`service_catalog_id`) REFERENCES `service_catalog` (`id`),
  ADD CONSTRAINT `offer_services_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `offer_services_ibfk_3` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`);

--
-- Constraints for table `offer_task`
--
ALTER TABLE `offer_task`
  ADD CONSTRAINT `offer_task_ibfk_1` FOREIGN KEY (`task_catalog_id`) REFERENCES `task_catalog` (`id`),
  ADD CONSTRAINT `offer_task_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offer_services` (`id`);

--
-- Constraints for table `task_catalog`
--
ALTER TABLE `task_catalog`
  ADD CONSTRAINT `task_catalog_ibfk_1` FOREIGN KEY (`service_catalog_id`) REFERENCES `offer_services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
