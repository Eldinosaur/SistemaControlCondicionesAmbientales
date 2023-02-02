-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 12:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `invernaderos`
--

CREATE TABLE `invernaderos` (
  `numero` int(11) NOT NULL,
  `cultivo` varchar(50) NOT NULL,
  `min_temp` double NOT NULL,
  `max_temp` double NOT NULL,
  `min_hum` double NOT NULL,
  `max_hum` double NOT NULL,
  `creador` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invernaderos`
--

INSERT INTO `invernaderos` (`numero`, `cultivo`, `min_temp`, `max_temp`, `min_hum`, `max_hum`, `creador`) VALUES
(1, 'Rosas', 25, 30, 35, 50, 'dino'),
(2, 'Claveles', 30, 35, 50, 65, 'dino');

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `temperatura` float NOT NULL,
  `humedad` float NOT NULL,
  `invernadero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registros`
--

INSERT INTO `registros` (`id`, `fecha`, `temperatura`, `humedad`, `invernadero`) VALUES
(1, '2023-01-31 18:48:02', 25.2, 66, 1),
(2, '2023-01-31 19:09:54', 28.9, 46.2, 1),
(3, '2023-01-31 19:10:11', 29.2, 47.8, 1),
(4, '2023-01-31 19:10:26', 30.1, 55.7, 1),
(5, '2023-01-31 19:10:43', 30.5, 60.9, 1),
(6, '2023-01-31 19:11:00', 29, 75.3, 1),
(7, '2023-01-31 19:11:15', 27.5, 64.6, 1),
(8, '2023-01-31 19:11:33', 29.1, 62.6, 1),
(9, '2023-01-31 19:11:50', 28.5, 53.5, 1),
(10, '2023-01-31 19:12:05', 28.1, 48.1, 1),
(11, '2023-01-31 19:12:20', 27.8, 45.7, 1),
(12, '2023-01-31 19:12:39', 27.4, 44.7, 1),
(13, '2023-02-02 17:25:44', 28.3, 41.7, 1),
(14, '2023-02-02 17:26:00', 28.6, 42.5, 1),
(15, '2023-02-02 17:26:16', 28.9, 42.1, 1),
(16, '2023-02-02 17:26:31', 29.1, 41.7, 1),
(17, '2023-02-02 17:26:47', 29.2, 41.4, 1),
(18, '2023-02-02 17:27:04', 29.3, 41.2, 1),
(19, '2023-02-02 17:27:19', 29.3, 41.1, 1),
(20, '2023-02-02 17:27:35', 29.4, 40.9, 1),
(21, '2023-02-02 17:27:52', 29.5, 40.9, 1),
(22, '2023-02-02 17:28:08', 29.6, 40.9, 1),
(23, '2023-02-02 17:28:23', 29.5, 40.8, 1),
(24, '2023-02-02 17:28:39', 29.5, 40.7, 1),
(25, '2023-02-02 17:28:54', 29.4, 40.6, 1),
(26, '2023-02-02 17:29:09', 29.4, 40.6, 1),
(27, '2023-02-02 17:29:26', 29.3, 40.6, 1),
(28, '2023-02-02 17:29:43', 29.4, 40.8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`, `apellido`, `correo`) VALUES
('dino', '1234', 'Anahi', 'Naranjo', 'eldinosaur7u7@outlook.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invernaderos`
--
ALTER TABLE `invernaderos`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invernaderos`
--
ALTER TABLE `invernaderos`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
