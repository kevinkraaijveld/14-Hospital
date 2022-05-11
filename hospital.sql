-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2022 at 03:19 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL,
  `client_firstname` varchar(50) DEFAULT NULL,
  `client_lastname` varchar(50) DEFAULT NULL,
  `client_phone` varchar(20) DEFAULT NULL,
  `client_email` varchar(50) DEFAULT NULL,
  `client_street` varchar(50) DEFAULT NULL,
  `client_city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_firstname`, `client_lastname`, `client_phone`, `client_email`, `client_street`, `client_city`) VALUES
(1, 'Janne', 'Doe', '0182-245137', 'jannedoe@gmail.com', 'Kerkstraat 12', 'Gorinchem'),
(2, 'John', 'Doe', '0183-548751', 'johndoe@gmail.com', 'Muziekstraat 4', 'Gorinchem');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `patient_gender` varchar(5) DEFAULT NULL,
  `species_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `patient_status` text
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_gender`, `species_id`, `client_id`, `patient_status`) VALUES
(1, 'Bobbie', 'Man', 1, 1, 'Koorts, eet slecht, blaft veel te veel'),
(2, 'Minoes', 'Vrouw', 2, 1, 'Drinkt niet, haaruitval, mager'),
(3, 'Kees', 'Vrouw', 1, 1, 'Eet te veel, vetzucht, jankt en kotst'),
(11, 'Piet', 'Man', 9, 1, 'Hij mist een pootje'),
(12, 'Peter', 'Vrouw', 2, 1, 'Haaruitval'),
(13, 'Els', NULL, 2, 1, 'Verkouden');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE IF NOT EXISTS `species` (
  `species_id` int(11) NOT NULL,
  `species_description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_id`, `species_description`) VALUES
(1, 'Hond'),
(2, 'Kat'),
(9, 'Vogel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `species_id` (`species_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `species` (`species_id`),
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
