-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 08:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_poll`
--

CREATE TABLE `tb_poll` (
  `p_id` int(11) NOT NULL,
  `p_section` varchar(255) NOT NULL,
  `p_detail` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_result`
--

CREATE TABLE `tb_result` (
  `res_id` int(11) NOT NULL,
  `res_point` int(11) DEFAULT NULL,
  `res_section` int(11) NOT NULL,
  `res_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_semi_poll`
--

CREATE TABLE `tb_semi_poll` (
  `se_id` int(11) NOT NULL,
  `se_header` varchar(255) NOT NULL,
  `se_description` varchar(255) NOT NULL,
  `se_choice` int(11) NOT NULL,
  `se_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `email`, `password`, `fname`, `lname`, `user_role`) VALUES
(1, 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_poll`
--
ALTER TABLE `tb_poll`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tb_result`
--
ALTER TABLE `tb_result`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `tb_semi_poll`
--
ALTER TABLE `tb_semi_poll`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_poll`
--
ALTER TABLE `tb_poll`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_result`
--
ALTER TABLE `tb_result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_semi_poll`
--
ALTER TABLE `tb_semi_poll`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
