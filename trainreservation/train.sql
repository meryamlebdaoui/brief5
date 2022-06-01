-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 01:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `cin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `email`, `phone`, `cin`) VALUES
(9, 'test@test.com', '098765432', 'h567389'),
(10, 'lebdaouimeryam1@gmail.com', '087643223456', 'hh789900');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `email`) VALUES
(9, '', ''),
(10, 'hello', 'lebdaouimeryam1@gmail.com'),
(11, 'hi', 'salma.kalkhi@gmail.com'),
(12, 'dcfghbjnkm', 'test@test.com'),
(13, 'xdcfvgbhnmkl,n bnvb', 'test@test');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT 1,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `cin` varchar(10) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idVoyage` int(11) NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `etat`, `first_name`, `last_name`, `email`, `phone`, `cin`, `idUser`, `idVoyage`, `prix`) VALUES
(13, 1, 'salma', 'salma', 'salma.kalkhi@gmail.com', '3456789', 'h6789', NULL, 2, 160),
(15, 1, 'fghj', 'hnj', 'test@test', '0668764378', 'hh56789', NULL, 5, 300),
(16, 1, NULL, NULL, NULL, NULL, NULL, 9, 5, 300),
(17, 1, NULL, NULL, NULL, NULL, NULL, 9, 5, 500),
(18, 1, 'ghjk', 'ghjnk', 'vygbh@hfd.com', '34567890', 'hh456789', NULL, 2, 1760),
(20, 1, NULL, NULL, NULL, NULL, NULL, 10, 2, 320),
(22, 0, NULL, NULL, NULL, NULL, NULL, 9, 8, 100),
(23, 1, NULL, NULL, NULL, NULL, NULL, 9, 9, 100),
(24, 1, NULL, NULL, NULL, NULL, NULL, 9, 9, 100),
(25, 1, NULL, NULL, NULL, NULL, NULL, 9, 10, 80),
(26, 1, 'test', 'test', 'test@testtt', '3456789', 'hh538492', NULL, 10, 80);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `nb_place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `nom`, `nb_place`) VALUES
(1, 'Train1', 500),
(2, 'Train 2', 200),
(3, 'train 3', 200),
(4, 'train4', 500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `type`) VALUES
(1, 'Meryam', 'Lebdaoui', 'meryam1', '12345678', 'admin'),
(9, 'test', 'test', 'test', 'test12', 'user'),
(10, 'testt', 'testt', 'testtt', '123456', 'user'),
(11, '[value-2]', '[value-3]', '[value-4]', '[value-5]', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `voyage`
--

CREATE TABLE `voyage` (
  `id` int(11) NOT NULL,
  `ville_depart` varchar(20) NOT NULL,
  `ville_arrive` varchar(20) NOT NULL,
  `date_depart` timestamp NULL DEFAULT NULL,
  `date_arrive` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nb_place` int(5) NOT NULL,
  `prix` double NOT NULL,
  `idTrain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voyage`
--

INSERT INTO `voyage` (`id`, `ville_depart`, `ville_arrive`, `date_depart`, `date_arrive`, `nb_place`, `prix`, `idTrain`) VALUES
(2, 'Safi', 'Casablanca', '2022-04-27 17:47:08', '2022-04-27 17:00:00', 389, 160, 2),
(5, 'Casablanca', 'Safi', '2022-04-26 15:11:00', '2022-04-26 18:11:00', 89, 100, 1),
(8, 'Casablanca', 'Safi', '2022-05-11 22:38:00', '2022-05-11 13:38:00', 99, 100, 3),
(9, 'Casablanca', 'Marrakech', '2022-05-10 11:55:00', '2022-05-10 14:54:00', 98, 100, 2),
(10, 'Safi', 'Casablanca', '2022-05-15 09:16:00', '2022-05-15 12:16:00', 98, 80, 2),
(11, 'Marrakech', 'Rabat', '2022-05-13 15:19:00', '2022-05-13 19:19:00', 500, 200, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `idAdmin` (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD KEY `idUser` (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idVoyage` (`idVoyage`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTrain_2` (`idTrain`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `Admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `Client_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`idVoyage`) REFERENCES `voyage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voyage`
--
ALTER TABLE `voyage`
  ADD CONSTRAINT `Voyage_ibfk_1` FOREIGN KEY (`idTrain`) REFERENCES `train` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
