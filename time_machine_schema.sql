-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 03:24 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `time_machine_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Baby-G'),
(1, 'Casio'),
(4, 'Edifice'),
(2, 'G-Shock');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `product_name`, `description`, `price`, `category_id`, `image_path`) VALUES
(23, 'MTP-1335D-1A', 'Elegant', 1895, 1, 'assets/img/uploads/5b020cc2359371.90844582.jpg'),
(25, 'AW-80-1A2', 'Resin Glass / Spherical Glass', 1495, 1, 'assets/img/casio4.jpg'),
(27, 'GA-110-1B', 'Shock resistant (G-SHOCK)', 4995, 2, 'assets/img/gshock1.jpg'),
(28, 'G-7900A-7D', 'Auto light switch, selectable illumination duration, afterglow', 3995, 2, 'assets/img/gshock2.jpg'),
(29, 'GA-110HC-1A', 'Auto light switch, selectable illumination duration, afterglow', 4995, 2, 'assets/img/gshock3.jpg'),
(30, 'GA-120A-7A', '200-meter water resistance', 3895, 2, 'assets/img/gshock4.jpg'),
(31, 'GA-200RG-1A', 'Case / bezel material: Resin / Stainless steel', 8995, 2, 'assets/img/gshock5.jpg'),
(32, 'BA-110-1A', '29 time zones (48 cities + coordinated universal time), city code display, daylight saving on/off', 6995, 3, 'assets/img/babyg1.jpg'),
(33, 'BA-110-7A1', 'Measuring modes: Elapsed time, split time, 1st-2nd place times', 7895, 3, 'assets/img/babyg2.jpg'),
(34, 'BA-110DC-2A1', '100-meter water resistance', 5995, 3, 'assets/img/babyg3.jpg'),
(35, 'BA-110DC-2A2', '29 time zones (48 cities + coordinated universal time), city code display, daylight saving on/off', 7895, 3, 'assets/img/babyg4.jpg'),
(36, 'BA-110GA-7A1', 'Countdown start time setting range: 1 minute to 24 hours (1-minute increments and 1-hour increments)', 6995, 3, 'assets/img/babyg5.jpg'),
(37, 'EF-550D-1A', '\"Double-lock, 1-press, 3-fold Buckle\"', 12995, 4, 'assets/img/edifice1.jpg'),
(38, 'EF-130D-1A5', 'Case / bezel material: Stainless steel', 3995, 4, 'assets/img/edifice2.jpg'),
(39, 'EF-326D-1A', 'Analog: 3 hands (hour, minute, second), 3 dials (date, day, 24-hour)', 4895, 4, 'assets/img/edifice3.jpg'),
(40, 'EF-539D-1A', '\"Double-lock, 1-press, 3-fold Buckle\"', 4995, 4, 'assets/img/edifice4.jpg'),
(41, 'EF-545D-1A', 'Alarm Analog (hour hand type, twice per day)', 6995, 4, 'assets/img/edifice5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '2',
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reference_number`, `status_id`, `user_id`, `total`, `order_date`) VALUES
(175, '0YOMFYFW13ZADWGD3-1528169893', 2, 23, 3790, '2018-06-05 03:38:13'),
(176, 'SGQDWZ1E2YTWKFYHD-1528179021', 2, 11, 4995, '2018-06-05 06:10:21'),
(177, 'ZF4NZ14W0IJVBVG9S-1528179406', 2, 11, 1895, '2018-06-05 06:16:46'),
(178, 'AECSHOKYY2ZG7WG87-1528179799', 2, 11, 4995, '2018-06-05 06:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `item_id`, `order_id`, `quantity`, `price`) VALUES
(30, 23, 175, 2, 1895),
(31, 27, 176, 1, 4995),
(32, 23, 177, 1, 1895),
(33, 27, 178, 1, 4995);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `description`) VALUES
(1, 'Shipped'),
(2, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_title`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `address`, `email`, `date_of_birth`, `first_name`, `last_name`, `contact_number`, `gender`, `role_id`, `status_id`) VALUES
(11, 'testuser', '45c571a156ddcef41351a713bcddee5ba7e95460', 'Valenzuela', 'johnlouie252007@yahoo.com', '01/01/2018', 'Test', 'User', '09999999999', 'Male', 2, 1),
(12, 'johnlouie', '3320210533aa72c3a1c92d56cdb32b28f8efa268', 'Toronto', 'louieadmin@gmail.com', '09/26/1988', 'John', 'Ymas', '09951932437', 'Male', 1, 1),
(14, 'ymasjohnlouie', 'ab0a0770ca47c27c9bbb21a8d4d0976a97430443', '6742 Taylo St., Brgy. Pio Del Pilar, Makati City', 'johnlouieymas@gmail.com', '09/13/1988', 'Louie John', 'Maquilan', '09216359849', 'Male', 2, 1),
(20, 'testagain', '796b9375baa0afc8e34f1f2475c4666ca6dee21e', 'Baguio City', 'testagain@mail.com', '09/11/2001', 'Test', 'Again', '09991234567', 'Female', 2, 1),
(23, 'againtest', '7f2275a2b385c6b2698266347d6e8a570ee58b5e', 'Cebu', 'againtest@gmail.com', '09/12/2017', 'Again', 'Test', '09154567890', 'Male', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `items_fk0` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_number` (`reference_number`),
  ADD KEY `orders_fk0` (`status_id`),
  ADD KEY `orders_fk1` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_items_fk0` (`item_id`),
  ADD KEY `orders_items_fk1` (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_fk0` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_status`
--
ALTER TABLE `account_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `orders_items_fk0` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `orders_items_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
