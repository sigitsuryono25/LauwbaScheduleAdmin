-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2019 at 04:32 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lauwba_schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `start_date` bigint(20) UNSIGNED NOT NULL,
  `end_date` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `kind` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `username`, `start_date`, `end_date`, `event_name`, `kind`, `added_on`) VALUES
('3123434465645342312', 'sitizulaiha15', 1562410704100, 1562410704100, 'test event', '', '2019-07-06 12:30:46'),
('5d2081ab0dc53', 'sigitsuryono25', 1562410704100, 1562410704100, 'test event 2', 'LIBUR', '2019-07-06 12:30:46'),
('5d2145fa4dd45', 'sigitsuryono25', 1509665212, 1568498451, 'name', 'libur', '2019-07-07 01:08:10'),
('5d214af51e68e', 'sigitsuryono25', 1509665212, 1568498451, 'name', 'libur', '2019-07-07 01:29:25'),
('5d214c04491a2', 'sigitsuryono25', 1533906000000, 1533906000000, 'Jadwal ngajar', 'Jadwal Ngajar', '2019-07-07 01:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `last_loggedin` datetime NOT NULL,
  `password` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `libur1` varchar(50) NOT NULL,
  `libur2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `last_loggedin`, `password`, `color`, `libur1`, `libur2`) VALUES
('sigitsuryono25', 'Sigit Suryono', '2019-07-06 00:00:00', '7aed7057b04e79ed1dcecb4679d17406', '#FF2B00', '', ''),
('sitizulaiha15', 'Siti Zulaiha', '2019-07-06 00:00:00', '5e66b8a958440525fae28f13700c97c3', '#0097F2', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
