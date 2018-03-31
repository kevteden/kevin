-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 08:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cars`
--

CREATE TABLE `tbl_cars` (
  `car_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `transmission` varchar(20) NOT NULL,
  `description` varchar(600) NOT NULL,
  `mileage` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` enum('user','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `firstname`, `lastname`, `username`, `email`, `address`, `phone`, `password`, `type`) VALUES
(1, '', '', '', '', '', 0, '', 'user'),
(2, 'Kevin', 'Alfonso', 'me', 'me@yahoo.com', 'p.o.box157,Dansoman', 244123456, 'kevin123', 'user'),
(3, 'Naa', 'Armah', 'naa', 'naa@gmail.com', 'p.o.box157,Dansoman', 244969899, 'kevin123', 'user'),
(4, 'Kevin', 'Dennis', 'kevteden', 'kevteden@yahoo.com', 'p.o.box157,Dansom,Accra', 273301314, 'kevin123', 'admin'),
(6, 'Kevin', 'Wanchester', 'want', 'ash@yahoo.com', 'p.o.box157,Dansoman', 234567891, '', 'user'),
(8, 'Kevin', 'Ashley', 'ashley', 'ashley', 'p.o.box157,Dansoman', 244234567, 'kevin123', 'user'),
(11, 'Kevin', 'Randford', 'rand', 'rand@yahoo.com', 'p.o.box157,Dansoman', 24567891, 'kevin123', 'user'),
(12, 'Naa Esther', 'Armarh', 'esther', 'esther@gmail.com', 'p.o.box157,Dansoman', 24444444, 'kevin123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  ADD CONSTRAINT `tbl_cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
