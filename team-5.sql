-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2017 at 03:16 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team-5`
--

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `loginid` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`loginid`, `password`, `name`, `email`, `phone`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Rajeev', 'rajeev.kumar@gmail.com', 2147483647),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Pratik Nichat', 'p.n@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pcomments`
--

CREATE TABLE `pcomments` (
  `cid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `pid` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `loginid` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`loginid`, `password`, `name`, `email`, `phone`, `mid`) VALUES
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'Pawan Tiwari', 'pawan.tiwari@gmail.com', 1234567890, 1),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'Chirag Makhija', 'chirag.m@gmail.com', 1234567890, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vcomments`
--

CREATE TABLE `vcomments` (
  `cid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `vid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `vid` int(11) NOT NULL,
  `vname` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `pcomments`
--
ALTER TABLE `pcomments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`loginid`),
  ADD KEY `om` (`mid`);

--
-- Indexes for table `vcomments`
--
ALTER TABLE `vcomments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `video_ibfk_1` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pcomments`
--
ALTER TABLE `pcomments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pcomments`
--
ALTER TABLE `pcomments`
  ADD CONSTRAINT `pcomments_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `plans` (`pid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `om` FOREIGN KEY (`mid`) REFERENCES `mentor` (`loginid`);

--
-- Constraints for table `vcomments`
--
ALTER TABLE `vcomments`
  ADD CONSTRAINT `vcomments_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `video` (`vid`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`loginid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
