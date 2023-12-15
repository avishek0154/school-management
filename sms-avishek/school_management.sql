-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 07:28 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
(1, 'Reception Year'),
(2, 'Year One'),
(3, 'Year Two'),
(4, 'Year Three'),
(5, 'Year Four'),
(6, 'Year Five'),
(7, 'Year Six');

-- --------------------------------------------------------

--
-- Table structure for table `gurdians`
--

CREATE TABLE `gurdians` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pupil_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurdians`
--

INSERT INTO `gurdians` (`id`, `name`, `phone`, `email`, `address`, `pupil_id`) VALUES
(1, 'Rubel', '12345', 'rubel@gmail.com', 'Hatia, Noakhali', 1),
(3, 'Nita Hood', '+1 (137) 289-43', 'kehugygy@mailinator.com', 'Explicabo Enim esse', 4),
(4, 'Giacomo Middleton', '+1 (807) 961-68', 'diby@mailinator.com', 'Est eius voluptates ', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_info` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gurdian_id` int(11) DEFAULT NULL,
  `admit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`id`, `name`, `address`, `medical_info`, `class_id`, `gurdian_id`, `admit_date`) VALUES
(1, 'Asif', 'Senbug, Nokhali', 'Blood: A+; Height: 5\'6\"', NULL, NULL, '2023-12-13 23:10:30'),
(2, 'Clarke Wagner', 'Cupiditate omnis vol', 'Quam itaque aliquid ', 3, 1, '2023-12-13 23:16:41'),
(4, 'Autumn Carroll', 'Nostrum quia id cor', 'Nulla id aliquid re', 4, NULL, '2023-12-13 23:20:15'),
(5, 'Amos Hayden', 'Ut ut laborum dolori', 'Sit voluptatem in co', 3, 3, '2023-12-14 00:00:09'),
(6, 'Keith Frost', 'Maxime laborum Ea a', 'Exercitation eiusmod', 2, NULL, '2023-12-14 00:01:32'),
(7, 'Jana Sanford', 'Et dignissimos moles', 'Aliqua Sequi id asp', 1, 1, '2023-12-14 00:19:11'),
(8, 'Ulysses Deleon', 'Deserunt dolor praes', 'Sint voluptates non', 7, 3, '2023-12-14 00:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `joining_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `phone`, `address`, `education`, `salary`, `class_id`, `joining_date`) VALUES
(1, 'Ashik', '12345', 'Laksam, Cumilla', 'BSc in CSE', 10000, 0, '2023-12-13 22:13:36'),
(2, 'Tasneem', '12345', 'Chittagong', 'BSc in CSE', 10000, 1, '2023-12-13 22:13:36'),
(5, 'Lester Howard', '+1 (664) 631-72', 'Voluptate ut sint la', 'Minim cumque quia od', 78, 5, '2023-12-13 22:49:32'),
(6, 'Wing Vega', '+1 (427) 874-12', 'Et sit maxime Nam v', 'Laboriosam et sit d', 100, 4, '2023-12-13 23:48:49'),
(7, 'Laurel Malone', '+1 (447) 689-34', 'Commodo ut in quasi ', 'Minus provident ut ', 58, 3, '2023-12-13 23:56:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gurdians`
--
ALTER TABLE `gurdians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gurdians`
--
ALTER TABLE `gurdians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
