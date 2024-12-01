-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 07:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachermsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `date_of_attendance` varchar(20) NOT NULL,
  `staff` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date_of_attendance`, `staff`, `time`, `designation`, `status`, `created_by`, `created_at`) VALUES
(3, '2022-10-29', '2', '9:10', 'Assit. Professor', 'active', 'HOD', '2022-10-29 11:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Id` int(10) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Id`, `department_name`, `status`, `created_at`) VALUES
(6, 'IT', 'active', '2022-10-27 11:10:32'),
(7, 'CSE', 'active', '2022-10-27 11:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(20) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `status`, `created_at`) VALUES
(2, 'Professor', 'active', '2022-10-27 03:04:05'),
(3, 'Assit. Professor', 'active', '2022-10-27 11:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `staff` varchar(20) NOT NULL,
  `designatioin` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `sanction` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `checked_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `category`, `staff`, `designatioin`, `date`, `sanction`, `message`, `remarks`, `checked_by`, `created_at`, `status`) VALUES
(1, '3', '2', 'Assit. Professor', '2022-12-31', 'on', 'on', 'demo', 'HOD', '2022-10-31 12:05:52', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `leave_category`
--

CREATE TABLE `leave_category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_category`
--

INSERT INTO `leave_category` (`id`, `category_name`, `status`, `created_at`) VALUES
(3, 'Casual', 'active', '2022-10-29 11:57:29'),
(4, 'Medical', 'active', '2022-10-29 11:57:51'),
(5, 'Earned', 'active', '2022-10-29 11:58:14'),
(6, 'OnDuty', 'active', '2022-10-29 11:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `photo` longtext NOT NULL,
  `staff_unique_id` int(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `photo`, `staff_unique_id`, `designation`, `department`, `contact`, `address`, `email`, `password`, `gender`, `status`, `created_by`, `created_at`, `name`) VALUES
(2, '10728819484k-cat-wallpaper-1.jpg', 0, 'Assit. Professor', 'IT', 987653241, 'xyzvbn', 'chetan@gmail.com', '98765', 'male', 'active', 'admin', '2022-10-27 11:44:11', 'Chetan'),
(3, '', 0, 'admin', '', 0, '', 'admin@gmail.com', '123456', '', 'active', '', '2022-11-02 04:57:27', 'Admin'),
(4, '10728819484k-cat-wallpaper-1.jpg', 0, 'HOD', 'IT', 987653241, 'xyzvbn', 'chetan@hod.com', '123', 'male', 'active', 'admin', '2022-11-02 05:49:34', 'Chetan'),
(5, '10728819484k-cat-wallpaper-1.jpg', 0, 'Clerk', 'IT', 987653241, 'xyzvbn', 'clerk@gmail.com', '123', 'male', 'active', 'admin', '2022-11-02 05:49:34', 'clerk1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_category`
--
ALTER TABLE `leave_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_category`
--
ALTER TABLE `leave_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
