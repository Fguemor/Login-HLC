-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 10, 2022 at 12:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logging`
--

-- --------------------------------------------------------

--
-- Table structure for table `sesion`
--

CREATE TABLE `sesion` (
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `id_sesion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sesion`
--

INSERT INTO `sesion` (`usuario`, `contraseña`, `id_sesion`) VALUES
('fguemor', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'm8gtp4hn0un3fv0ib7im2nevd5'),
('RocioGala', 'b665e217b51994789b02b1838e730d6b93baa30f', 'd4vsi3tq2o1mb4c68djg6kclci'),
('RocioGala', 'b665e217b51994789b02b1838e730d6b93baa30f', 'qq88pr7f2os6cq6mga5g2gvop9');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuario`, `contraseña`, `nombre`, `apellidos`, `correo_electronico`, `administrador`) VALUES
('fguemor', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Fátima', 'Guerrero Morejón', 'fatima@gmail.com', 0),
('RocioGala', 'b665e217b51994789b02b1838e730d6b93baa30f', 'Rocio', 'Gala García', 'rociogg@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
