-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 04:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeefile`
--

CREATE TABLE `employeefile` (
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstat` varchar(255) NOT NULL,
  `contactnum` varchar(255) NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `isactive` int(11) NOT NULL,
  `recid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeefile`
--

INSERT INTO `employeefile` (`fullname`, `address`, `birthdate`, `age`, `gender`, `civilstat`, `contactnum`, `salary`, `isactive`, `recid`) VALUES
('Summer Sumang', 'Sta. Maria Pampanga', '2022-03-03', 15, 'Female', ' Single', '09318665936', '30000', 1, 1),
('Sumang Mandie', 'Pampanga', '1996-08-05', 26, 'Female', 'Married', '09318665935', '18000', 1, 2),
('Alessia Sumang', 'Minalin, Pampanga', '2022-01-18', 2, 'Female', ' Single', '1231', '123123', 0, 3),
('Loki Sumang', 'Sta. Maria Pampanga', '2021-08-17', 2, 'Male', ' Single', '0932145698', '20156', 0, 4),
('Max Sumang', 'Lourdes Pampanga', '2021-09-09', 1, 'Male', 'Seperated', '12345678910', '30000', 1, 5),
('Jenny Sumang', '12asdasd123', '2022-03-01', 24, 'Female', 'Married', '123a', '123123', 0, 19),
('Kiara Sumang', 'Sta. Maria Pampanga', '2022-03-04', 2, 'Female', 'Seperated', '4165154145', '18000', 1, 140222);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeefile`
--
ALTER TABLE `employeefile`
  ADD PRIMARY KEY (`recid`),
  ADD UNIQUE KEY `rec` (`recid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeefile`
--
ALTER TABLE `employeefile`
  MODIFY `recid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33333333333336;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
