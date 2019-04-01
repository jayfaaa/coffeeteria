-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 02:28 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeteria_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_t`
--

CREATE TABLE `admin_t` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_t`
--

INSERT INTO `admin_t` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Arch Jay', 'Jabla', 'admin@coffeeteria.com', '$2y$10$p3E8ma7Rf3XJBKRYInfFk.Xfx7syDvB9aZ6sMbHwcbBSsmXpdXu1K');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_t`
--

CREATE TABLE `blogs_t` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs_t`
--

INSERT INTO `blogs_t` (`id`, `title`, `image`, `body`, `date`) VALUES
(2, 'Coffeeteria Launches', 'coffeeteria.png', '	Coffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria LaunchesCoffeeteria Launches', '2019-04-01 06:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `comments_t`
--

CREATE TABLE `comments_t` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_t`
--

INSERT INTO `comments_t` (`id`, `blog_id`, `email`, `comment`, `date`) VALUES
(1, 1, 'admin@coffeeteria.com', 'Nice blog!', '2019-04-01 05:30:53'),
(2, 1, 'jabla@gmail.com', 'I Agree! This is a nice blog!', '2019-04-01 05:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `users_t`
--

CREATE TABLE `users_t` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_t`
--

INSERT INTO `users_t` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Arch Jay', 'Jabla', 'jabla@gmail.com', '$2y$10$fEj8/6pJRv.D8rGFS9mnveGUM9nMcqOuqct04O3cQ9bsoPb.0KR26'),
(2, 'Arch Jay', 'Jabla', 'jabla2@gmail.com', '$2y$10$Ogr42a2GffMIb2E3ktgpkOhwSHMpuz57YlcfskXLnXwF3nHWqk3ea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_t`
--
ALTER TABLE `admin_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_t`
--
ALTER TABLE `blogs_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_t`
--
ALTER TABLE `comments_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_t`
--
ALTER TABLE `users_t`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_t`
--
ALTER TABLE `admin_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs_t`
--
ALTER TABLE `blogs_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments_t`
--
ALTER TABLE `comments_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_t`
--
ALTER TABLE `users_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
