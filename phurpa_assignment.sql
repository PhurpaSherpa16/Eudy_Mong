-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 04:59 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phurpa_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(25) NOT NULL,
  `party_id` int(25) NOT NULL,
  `number_childern` int(25) NOT NULL,
  `date` date NOT NULL,
  `cost` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `party_id`, `number_childern`, `date`, `cost`) VALUES
(38, 2, 8, 20, '2017-04-28', 240),
(39, 2, 8, 30, '2017-04-22', 360),
(40, 2, 8, 30, '2017-05-18', 360),
(41, 2, 2, 23, '2017-05-10', 345),
(42, 2, 6, 25, '2017-05-30', 250),
(43, 2, 2, 30, '2017-05-17', 450);

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `childrenname` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `childrenname`, `dateofbirth`, `customer_id`) VALUES
(1, 'rita', '2017-04-28', 2),
(2, 'Krk', '2017-04-24', 2),
(3, 'Hello', '2017-04-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `partyadd`
--

CREATE TABLE `partyadd` (
  `id` int(11) NOT NULL,
  `partyname` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` varchar(25) NOT NULL,
  `length` varchar(15) NOT NULL,
  `number` varchar(15) NOT NULL,
  `service` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partyadd`
--

INSERT INTO `partyadd` (`id`, `partyname`, `description`, `cost`, `length`, `number`, `service`, `photo`) VALUES
(2, 'Pirate Theme', 'Pirate Them will be available heloo im new here who are uo...Pirate Them will be available heloo im new here who are uo...Pirate Them will be available heloo im new here who are uo...Pirate Them will be available heloo im new here who are uo...', '15', '60', '30', 'face panting and pirate clothes', 'Pirate Theme.jpg'),
(4, 'Birthday Bear', 'Party having bear which will entertain you', '12', '60', '30', 'fun', 'Birthday Bear.jpg'),
(5, 'Star Wars', 'Children will wear the costume and take sword', '15', '120', '45', 'Adventure ', 'Star Wars.jpg'),
(6, 'Fairy Tales', 'Especially girls focus party', '10', '60', '25', 'tales come true when u wear the costume', 'Fairy Tales.jpg'),
(8, 'Bread Party', 'All bread are distribute', '12', '60', '60', 'bread Gift', 'Bread Party.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `utype` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `email`, `uname`, `address`, `gender`, `phone`, `password`, `utype`) VALUES
(1, 'Mad', 'Sapkota', 'madhu@gmail.com', 'madhu', 'ktm', 'Male', '01111111111', 'madhu', 'admin'),
(2, 'Sita', 'Sharma', 'Sita@gmail.com', 'Sita123', 'Pokhara', 'Female', '01235645', 'sita', 'normal'),
(3, 'shyam', 'lama', 'shyam123@gmail.com', 'shyam', 'ktm ', 'Male', '6555555555', 'shyam', 'normal'),
(4, 'Sita', 'Bhandari', 'sita@gmail.com', 'sita56', 'pkr', 'Female', '01245666666', 'sita', 'normal'),
(5, 'Mad', 'sharma', 'madhu@gmail.com', 'Madhu123', 'madhu', 'Male', '985642220', 'madhu', 'normal'),
(6, 'a', 'a', 'madhu@gmail.com', 'a', 'madhu', 'Male', '5', 'f', 'normal'),
(7, 'f', 'f', 'ramthapa100@gmail.com', 'f', 'f', 'Male', 'f', 'f', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `party_id` (`party_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `partyadd`
--
ALTER TABLE `partyadd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `partyadd`
--
ALTER TABLE `partyadd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`party_id`) REFERENCES `partyadd` (`id`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
