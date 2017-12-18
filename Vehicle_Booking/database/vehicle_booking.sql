-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 08:39 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(40) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `FullName`, `Email`, `Password`, `Address`) VALUES
(1, 'Sabuj Ahmed', 'ahmedsabuj1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dhaka,Bangladesh'),
(2, 'Binayak Ray', 'csebinayak.ku@gmail.com', 'a01610228fe998f515a72dd730294d87', 'Khulna,Bangladesh'),
(3, 'Nayan', 'nayan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'khulna'),
(4, 'biswajit', 'biswa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'khulna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehilce`
--

CREATE TABLE `tbl_vehilce` (
  `ID` int(40) NOT NULL,
  `UserID` int(40) NOT NULL,
  `CurrentCity` varchar(255) NOT NULL,
  `ReachedCity` varchar(255) NOT NULL,
  `Vehicle` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehilce`
--

INSERT INTO `tbl_vehilce` (`ID`, `UserID`, `CurrentCity`, `ReachedCity`, `Vehicle`, `Date`) VALUES
(4, 2, 'Khulna', 'Dhaka', 'Hanif Travels', '2017-12-17'),
(2, 1, 'khulna', 'dhaka', 'AK Travels', '2017-12-17'),
(5, 2, 'Dhaka', 'Khulna', 'Hanif Travels', '2017-12-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_vehilce`
--
ALTER TABLE `tbl_vehilce`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_vehilce`
--
ALTER TABLE `tbl_vehilce`
  MODIFY `ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
