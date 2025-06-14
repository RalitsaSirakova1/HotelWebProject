-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Време на генериране: 14 юни 2025 в 19:50
-- Версия на сървъра: 9.1.0
-- Версия на PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `hotel_db`
--

-- --------------------------------------------------------

--
-- Структура на таблица `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `notes` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Схема на данните от таблица `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `room`, `checkin`, `checkout`, `notes`, `created_at`) VALUES
(3, 'Ралица Сиракова', 'ralitsasirakova22@gmail.com', '0889004959', 'single', '2025-06-09', '2025-06-15', '', '2025-06-05 21:42:20'),
(6, 'Марияна Илиева', 'mimi.ilieva@gmail.com', '0889005555', 'deluxe', '2025-06-18', '2025-06-22', '', '2025-06-05 22:25:09');

-- --------------------------------------------------------

--
-- Структура на таблица `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rating` int NOT NULL,
  `review_text` text NOT NULL,
  `image_path` varchar(512) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Схема на данните от таблица `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `rating`, `review_text`, `image_path`, `created_at`) VALUES
(1, 'Милена Илиева', 5, 'Преживяването беше незабравимо. От години не съм си почивала толкова добре.', 'uploads/reviews/1749156380_hotel3.jpg', '2025-06-05 23:46:20'),
(8, 'Георги Иванов', 4, 'Прекрасно!', 'uploads/reviews/1749209042_hotel19.jpg', '2025-06-06 14:24:02'),
(7, 'Александър Колев', 5, 'Прекрасно местенце! Удивителен хотел! Любимата ми част беше СПА центърът.', 'uploads/reviews/1749158802_spa1.jpg', '2025-06-06 00:26:42');

-- --------------------------------------------------------

--
-- Структура на таблица `room_availability`
--

DROP TABLE IF EXISTS `room_availability`;
CREATE TABLE IF NOT EXISTS `room_availability` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) NOT NULL,
  `total_rooms` int NOT NULL,
  `booked_rooms` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Схема на данните от таблица `room_availability`
--

INSERT INTO `room_availability` (`id`, `room_type`, `total_rooms`, `booked_rooms`) VALUES
(1, 'single', 5, 1),
(2, 'double', 5, 0),
(3, 'deluxe', 2, 1),
(4, 'apartment', 3, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
