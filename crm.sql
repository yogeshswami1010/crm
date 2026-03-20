-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2026 at 11:13 AM
-- Server version: 8.0.44
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `business_name` varchar(150) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('lead','prospect','client') DEFAULT 'lead',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `user_id`, `name`, `business_name`, `address`, `phone`, `email`, `status`, `created_at`) VALUES
(1, 3, 'Yogesh Swami', 'IT Sector', NULL, '8875801891', 'yogeshswami1010@gmail.com', 'client', '2026-03-19 10:11:07'),
(2, 3, 'test', 'Test Busniess', NULL, 'test@gmail.com', 'erikjohn7014@gmail.com', 'lead', '2026-03-19 10:24:23'),
(3, 3, 'Yogesh Swami', 'Test Busniess', 'c-104', '919992229874', 'yogeshswami1010@gmail.com', 'client', '2026-03-19 10:29:46'),
(4, 4, 'Test user name', 'Test Busniess Name', 'Jaipur Rajashtan', '0123456789', 'test1@gmail.com', 'prospect', '2026-03-19 10:44:36'),
(5, 3, 'John', 'Big Basket', 'Rajasthan, India', '4561234563', 'john@gmail.coom', 'lead', '2026-03-20 05:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lead_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `lead_id`, `user_id`, `note`, `created_at`) VALUES
(1, 1, 3, 'hii this is testing', '2026-03-19 10:11:07'),
(2, 2, 3, 'tetest no', '2026-03-19 10:24:23'),
(3, 3, 3, 'tettest', '2026-03-19 10:29:46'),
(4, 3, 3, 'updated lead', '2026-03-19 10:31:24'),
(5, 3, 3, 'hi this is procespect', '2026-03-19 10:31:47'),
(6, 4, 4, 'Hi this is message from add new lead', '2026-03-19 10:44:36'),
(7, 4, 4, 'hi lead is try to succefully', '2026-03-19 10:45:02'),
(8, 5, 3, 'Interested in our Services\r\n', '2026-03-20 05:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','sales') DEFAULT 'sales',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `status`) VALUES
(3, 'Admin', 'admin@gmail.com', '$2y$10$DTkRAA9j7P2MdTnar5U4xOsCfagPPDXtWCMsRv7z1tLTfDd6vzhsq', 'admin', '2026-03-19 10:10:17', 'active'),
(4, 'salesuser', 'sale@gmail.com', '$2y$10$yPlbx0pmTQ01PqWpxHt.uO8MG2zKqyX0gdDwWtwHYPUBq7KB24pOm', 'sales', '2026-03-19 10:42:54', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
