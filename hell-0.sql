-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2017 at 04:40 PM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.8-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hell-0`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(3) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `sn` int(3) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign_records`
--

CREATE TABLE `assign_records` (
  `sn` int(3) NOT NULL,
  `uid` int(3) NOT NULL,
  `assign_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `labreports`
--

CREATE TABLE `labreports` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `acronym` varchar(30) NOT NULL,
  `sn` int(11) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_records`
--

CREATE TABLE `lab_records` (
  `sn` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `lab_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(3) NOT NULL,
  `title` varchar(30) NOT NULL,
  `acronym` varchar(10) NOT NULL,
  `sn` int(3) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tut_records`
--

CREATE TABLE `tut_records` (
  `sn` int(3) NOT NULL,
  `uid` int(3) NOT NULL,
  `tut_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_records`
--
ALTER TABLE `assign_records`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `labreports`
--
ALTER TABLE `labreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_records`
--
ALTER TABLE `lab_records`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tut_records`
--
ALTER TABLE `tut_records`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assign_records`
--
ALTER TABLE `assign_records`
  MODIFY `sn` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `labreports`
--
ALTER TABLE `labreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_records`
--
ALTER TABLE `lab_records`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tut_records`
--
ALTER TABLE `tut_records`
  MODIFY `sn` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
