-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 16, 2020 at 04:28 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `crudusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Bruce One', 'usuario1@gmail.com', '$2y$10$MwU3eQIYgJbditY//F.NjOxQRZvktJOg6TNx4Bx9b9v5nFqiGBZYC', '2020-09-15 23:23:42'),
(2, 'Avonlea Livvy', 'iapetus@yahoo.ca', '$2y$10$dWXZq/ZS7g7HXPryfZsmc.J7MH9/XlNbgmZzvSIItmGF58yMG5E3C', '2020-09-15 23:24:51'),
(3, 'Dorean Trey', 'dmiller@icloud.com', '$2y$10$cV8lov.JcsZw62KMPdA27OP6ReR5NGlP3.oI7YYss/uFMwcZzJSFe', '2020-09-15 23:25:08'),
(4, 'Bret Dianna', 'bflong@me.com', '$2y$10$UhQa.ORTbZLKGOyLLRd4WuwuYS.xal/5Hvs6xPlhBzOhBi7BE4gDS', '2020-09-15 23:25:24'),
(5, 'Dorris Michael', 'munge@aol.com', '$2y$10$H6QiJ/0XnW7F8f7jMI7VR.KqT9b8uObOfod7.WRT/tXzGUsCLblt6', '2020-09-15 23:25:47'),
(6, 'Alyce Alva', 'penna@msn.com', '$2y$10$IUhH.2RThhmNBbHYU3tOV.InevFIJwL.62GmQty5axPaJmSQMpwHe', '2020-09-15 23:26:02'),
(7, 'Maurice Taylor', 'nullchar@outlook.com', '$2y$10$Wre8.R9m/Pey3ICW8F.vju0tiwjuqV7uREjXj.EJyJyUXVGG2NYi2', '2020-09-15 23:26:19'),
(8, 'Luvenia Colin', 'pedwards@msn.com', '$2y$10$TYBFEK0P9HQy8whk56PGI.MKAX2scXRwFv/nbGB4suQ3NmQVzftoe', '2020-09-15 23:26:39'),
(9, 'Arin Herbert', 'macro@icloud.com', '$2y$10$m2ZaWo1c.IPkmA4LwxQtzO8sqDueyIeYwKhyeGLec1IynPVcdpdN2', '2020-09-15 23:27:05'),
(10, 'Winston Kym', 'jbailie@aol.com', '$2y$10$Zdc3LUM3BPL7JwCfGF7oh.93QEMDeJSo0I01/g030zOW7W2TrIHfy', '2020-09-15 23:27:21'),
(11, 'Tillie Rosamond', 'martink@icloud.com', '$2y$10$DShBR5Ea.eArKiT/WjO.Nu/xi8X1XngmL3zKuVvB0evZB2oIfWI16', '2020-09-15 23:27:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;