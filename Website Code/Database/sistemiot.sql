-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2024 at 09:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemiot`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int NOT NULL,
  `serial_number` varchar(10) NOT NULL,
  `sensor_actuator` enum('sensor','actuator') NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  `mqtt_topic` text NOT NULL,
  `posted_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `serial_number`, `sensor_actuator`, `name`, `value`, `mqtt_topic`, `posted_time`) VALUES
(563, '123451', 'sensor', 'temperature', ' 37.20', 'sistemiot/123451/sensor/temperature', '2024-07-15 13:59:46'),
(564, '123451', 'sensor', 'humidity', ' 50.90', 'sistemiot/123451/sensor/humidity', '2024-07-15 13:59:47'),
(565, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 13:59:47'),
(566, '123451', 'sensor', 'temperature', ' 37.20', 'sistemiot/123451/sensor/temperature', '2024-07-15 13:59:51'),
(567, '123451', 'sensor', 'humidity', ' 50.90', 'sistemiot/123451/sensor/humidity', '2024-07-15 13:59:52'),
(568, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 13:59:52'),
(569, '123451', 'sensor', 'temperature', ' 37.10', 'sistemiot/123451/sensor/temperature', '2024-07-15 13:59:56'),
(570, '123451', 'sensor', 'humidity', ' 50.80', 'sistemiot/123451/sensor/humidity', '2024-07-15 13:59:57'),
(571, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 13:59:57'),
(572, '123451', 'sensor', 'temperature', ' 39.10', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:00:49'),
(573, '123451', 'sensor', 'humidity', ' 49.60', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:00:50'),
(574, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:00:50'),
(575, '123451', 'sensor', 'temperature', ' 38.40', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:01:04'),
(576, '123451', 'sensor', 'humidity', ' 49.00', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:01:05'),
(577, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:01:05'),
(578, '123451', 'sensor', 'temperature', ' 38.20', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:01:19'),
(579, '123451', 'sensor', 'humidity', ' 49.30', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:01:20'),
(580, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:01:20'),
(581, '123451', 'sensor', 'temperature', ' 38.20', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:01:34'),
(582, '123451', 'sensor', 'humidity', ' 50.60', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:01:35'),
(583, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:01:36'),
(584, '123451', 'sensor', 'temperature', ' 38.10', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:01:49'),
(585, '123451', 'sensor', 'humidity', ' 49.00', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:01:50'),
(586, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:01:51'),
(587, '123451', 'sensor', 'temperature', ' 38.10', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:02:04'),
(588, '123451', 'sensor', 'humidity', ' 49.20', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:02:05'),
(589, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:02:05'),
(590, '123451', 'sensor', 'temperature', ' 38.10', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:02:20'),
(591, '123451', 'sensor', 'humidity', ' 49.20', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:02:20'),
(592, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:02:20'),
(593, '123451', 'sensor', 'temperature', ' 34.90', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:03:06'),
(594, '123451', 'sensor', 'humidity', ' 51.80', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:03:06'),
(595, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:03:06'),
(596, '123451', 'sensor', 'temperature', ' 35.00', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:03:20'),
(597, '123451', 'sensor', 'humidity', ' 51.90', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:03:21'),
(598, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:03:21'),
(599, '123451', 'sensor', 'temperature', ' 35.00', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:03:35'),
(600, '123451', 'sensor', 'humidity', ' 50.00', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:03:36'),
(601, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:03:37'),
(602, '123451', 'sensor', 'temperature', ' 34.20', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:04:11'),
(603, '123451', 'sensor', 'humidity', ' 51.50', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:04:12'),
(604, '123451', 'sensor', 'potentio', ' 99', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:04:12'),
(605, '123451', 'sensor', 'temperature', ' 37.00', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:04:26'),
(606, '123451', 'sensor', 'humidity', ' 49.70', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:04:27'),
(607, '123451', 'sensor', 'potentio', ' 0', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:04:27'),
(608, '123451', 'sensor', 'temperature', ' 35.10', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:04:41'),
(609, '123451', 'sensor', 'humidity', ' 51.90', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:04:42'),
(610, '123451', 'sensor', 'potentio', ' 62', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:04:42'),
(611, 'websiteSN', 'actuator', 'servo', ' 109', 'sistemiot/websiteSN/actuator/servo', '2024-07-15 14:04:43'),
(612, 'websiteSN', 'actuator', 'Lamp', ' on', 'sistemiot/websiteSN/actuator/Lamp', '2024-07-15 14:04:45'),
(613, 'websiteSN', 'actuator', 'Lamp', ' off', 'sistemiot/websiteSN/actuator/Lamp', '2024-07-15 14:04:48'),
(614, 'websiteSN', 'actuator', 'Lamp', ' on', 'sistemiot/websiteSN/actuator/Lamp', '2024-07-15 14:04:49'),
(615, 'websiteSN', 'actuator', 'Lamp', ' off', 'sistemiot/websiteSN/actuator/Lamp', '2024-07-15 14:04:50'),
(616, 'websiteSN', 'actuator', 'Lamp', ' on', 'sistemiot/websiteSN/actuator/Lamp', '2024-07-15 14:04:51'),
(617, '123451', 'sensor', 'temperature', ' 34.90', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:04:56'),
(618, '123451', 'sensor', 'humidity', ' 51.90', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:04:56'),
(619, '123451', 'sensor', 'potentio', ' 65', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:04:57'),
(620, '123451', 'sensor', 'temperature', ' 34.90', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:05:11'),
(621, '123451', 'sensor', 'humidity', ' 51.90', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:05:12'),
(622, '123451', 'sensor', 'potentio', ' 65', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:05:12'),
(623, '123451', 'sensor', 'temperature', ' 34.90', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:05:26'),
(624, '123451', 'sensor', 'humidity', ' 51.60', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:05:27'),
(625, '123451', 'sensor', 'potentio', ' 65', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:05:27'),
(626, '123451', 'sensor', 'temperature', ' 34.90', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:05:41'),
(627, '123451', 'sensor', 'humidity', ' 51.80', 'sistemiot/123451/sensor/humidity', '2024-07-15 14:05:42'),
(628, '123451', 'sensor', 'potentio', ' 65', 'sistemiot/123451/sensor/potentio', '2024-07-15 14:05:42'),
(629, 'websiteSN', 'actuator', 'servo', ' 109', 'sistemiot/websiteSN/actuator/servo', '2024-07-15 14:05:48'),
(630, '123451', 'sensor', 'temperature', ' 34.90', 'sistemiot/123451/sensor/temperature', '2024-07-15 14:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `serial_number` varchar(10) NOT NULL,
  `mcu_type` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`serial_number`, `mcu_type`, `location`, `created_time`, `active`) VALUES
('123451', 'ESP32', 'Jakarta', '2024-07-12 19:02:05', 'Yes'),
('123452', 'ESP8266', 'Bandung', '2024-07-12 19:02:16', 'Yes'),
('123453', 'Arduino Uno', 'Bali', '2024-07-12 19:02:28', 'Yes'),
('123454', 'Arduino Nano', 'Semarang Tawang', '2024-07-12 19:02:41', 'Yes'),
('123455', 'STM32', 'Tangerang', '2024-07-12 19:03:01', 'Yes'),
('websiteSN', 'Website', 'Indonesia', '2024-07-13 16:31:40', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `role` enum('Admin','User') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'User',
  `active` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `role`, `active`) VALUES
('andi21262', '$2y$10$zkAjF1ujbzbCz8k.RC9kRu4NUIIhSeyV7hAw0Hchhqpqq6RrC0HSq', 'Andi Saputra', 'Admin', 'Yes'),
('user1@gmail.com', '$2y$10$EH0o1mDV2f9RqO/HyK.lie7LjOHjBc3QrFSGBeNywBGbVPcD3xV9O', 'user1', 'User', 'Yes'),
('user2@gmail.com', '$2y$10$dCWbXVDFOdk/khpntOMmGeWEW3u5i7tvlhPYeqeX2wJTOgkDEtpEC', 'user2', 'User', 'Yes'),
('user3@gmail.com', '$2y$10$sCwk00aOZTn1L390iQBl..Yqs2VVwSJvOnE/qZw4BDp7.0rmFfPMW', 'user3', 'User', 'Yes'),
('user4@gmail.com', '$2y$10$zbpClZl4jH.K6uZo38X.OeuG6XRtdlVyH5jrgYHP2OeV6W8clerru', 'user4', 'User', 'Yes'),
('user6@gmail.com', '$2y$10$EHdcKrJNVVIPJEEXPKBmEuvdaUIoJ1.YzfcZFznyCmqTJ93lFPXxq', 'user6', 'Admin', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serial_number` (`serial_number`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`serial_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=631;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`serial_number`) REFERENCES `devices` (`serial_number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
