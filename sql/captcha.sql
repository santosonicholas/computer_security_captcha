-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 01:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `captcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `roles` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `username`, `password`, `gender`, `email`, `roles`) VALUES
(1, 'Nicholas', 'Santoso', 'nicholas_su_1', '427a681ca3946a8fba7eba9445df3c41', 'male', 'nicholas@su.id', 'su'),
(2, 'Deborah', 'Juanah', 'deborah_adm_1', '75d6ef90fb62d64855e2eb78a5df4ac0', 'female', 'deborah@adm.id', 'adm'),
(3, 'Graciella', 'Hesti', 'graciella_adm_2', 'cd070d6526589fb37cfb632806d6b1c4', 'female', 'graciella@adm.id', 'adm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `roles` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `gender`, `email`, `roles`) VALUES
(1001, 'Sutedja', 'The Ho Ping', 'sutedja', '02c7b3945ff9c24d2ddb8f8281e0bddb', 'male', 'sutedja@gmail.com', 'ro'),
(1002, 'Dave', 'Joshua', 'dave', 'a24fd571181a5e791170943ea029e008', 'male', 'dave@gmail.com', 'ro'),
(1003, 'Farrell', 'Nathaniel', 'farrel', '899214df80584758296ebee78e1a569d', 'male', 'farrel@gmail.com', 'ro'),
(1004, 'Klemens', 'Wiyanto', 'klemens', 'd55abc42f16391f34be527154a3fd7c0', 'male', 'klemens@gmail.com', 'ro'),
(1005, 'Grands', 'Marcell', 'grand', 'fbf2dc2c04f582989f6d96bae7799954', 'male', 'grand@gmail.com', 'ro'),
(1006, 'Stefani', 'Gunawan', 'stefani', 'c628ba971845e0242ed68af8cbecadc5', 'female', 'stefani@gmail.com', 'ro'),
(1007, 'Daniel', 'Tjahyadi', 'danieltjahyadi', '5e420c4a47da5f8ef958255e16498ffc', 'male', 'daniel@gmail.com', 'ro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
