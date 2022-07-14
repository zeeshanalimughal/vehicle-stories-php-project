-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 05:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tocken` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `tocken`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '41f3288503f1f316f76bdbbedbbbef87e188a81d34351eb04665e3f8927e526d34d23156204a3d9b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `status`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `tocken` text DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `date_of_reg` varchar(255) NOT NULL,
  `total_vehicles` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `ip_of_registration` varchar(255) NOT NULL,
  `ip_last_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `tocken`, `avatar`, `date_of_reg`, `total_vehicles`, `last_login`, `ip_of_registration`, `ip_last_login`) VALUES
(14, 'test', 'test@gmail.com', 'a8ce81a1be30d5adb86c85c71d1497f5', 1, '0', '16428597085323-WhatsApp Image 2022-01-22 at 5.53.00 PM.jpeg', '15-01-22 07:48:37', 0, '24-01-22 08:01:02', '192.168.0.101', '192.168.100.6');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `v_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year_of_prod` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `drive` varchar(255) NOT NULL,
  `v_max_speed` varchar(255) NOT NULL,
  `doors` varchar(255) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `origin_country` varchar(255) NOT NULL,
  `est_value` varchar(255) NOT NULL,
  `current_owner_purch_date` varchar(255) NOT NULL,
  `v_date_added` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `vehicle_desc` text NOT NULL,
  `vehicle_history` text NOT NULL,
  `vehicle_shows_events` text NOT NULL,
  `vehicle_repairs_exploitation` text NOT NULL,
  `vehicle_pleasant_events` text NOT NULL,
  `vehicle_advantages` text NOT NULL,
  `vehicle_problems` text NOT NULL,
  `v_announcement_buy_cell` text NOT NULL,
  `vehicle_main_picture` text NOT NULL,
  `v_image_caption` varchar(255) NOT NULL,
  `vehicle_preview_picture` text NOT NULL,
  `preview_caption_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `user_id`, `type`, `brand`, `model`, `year_of_prod`, `capacity`, `power`, `fuel_type`, `transmission`, `drive`, `v_max_speed`, `doors`, `seats`, `mileage`, `origin_country`, `est_value`, `current_owner_purch_date`, `v_date_added`, `location`, `district`, `vehicle_desc`, `vehicle_history`, `vehicle_shows_events`, `vehicle_repairs_exploitation`, `vehicle_pleasant_events`, `vehicle_advantages`, `vehicle_problems`, `v_announcement_buy_cell`, `vehicle_main_picture`, `v_image_caption`, `vehicle_preview_picture`, `preview_caption_status`) VALUES
(30, 14, 'cars', 'Mercedes', 'Klasa A', '2018', '25', '3434', 'Petrol', 'transmission', 'drive', '223', '4', '4', '2323', 'Afganistan', '12000', '2019', '18-01-22 07:47:09', 'voivodship', 'RYK', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '16425316292538-Oldsmobile_Delta_88_Stationwagon_02.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '16425316291499-Oldsmobile_Delta_88_Stationwagon_01.jpg,16425316294653-Oldsmobile_Delta_88_Stationwagon_02.jpg,16425316292674-Oldsmobile_Delta_88_Stationwagon_03.jpg,16425316299556-Oldsmobile_Delta_88_Stationwagon_04.jpg,16425316297140-Oldsmobile_Delta_88_Stationwagon_05.jpg,16425316295522-Oldsmobile_Delta_88_Stationwagon_06.jpg,16425316295320-Oldsmobile_Delta_88_Stationwagon_07.jpg,16425316295417-Oldsmobile_Delta_88_Stationwagon_08.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
