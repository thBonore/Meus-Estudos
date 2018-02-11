-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jun-2016 às 03:24
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_aeroporto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admim`
--

CREATE TABLE `admim` (
  `id` int(11) NOT NULL,
  `login` varchar(15) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admim`
--

INSERT INTO `admim` (`id`, `login`, `senha`) VALUES
(1, 'Xamito', 'e240f783de5c9ea54f362c8f65d6eb69');

-- --------------------------------------------------------

--
-- Estrutura da tabela `voos`
--

CREATE TABLE `voos` (
  `id` int(11) NOT NULL,
  `partida` varchar(15) DEFAULT NULL,
  `destino` varchar(15) DEFAULT NULL,
  `milhas` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `voos`
--

INSERT INTO `voos` (`id`, `partida`, `destino`, `milhas`) VALUES
(1, 'New York', 'Chicago', '1000'),
(2, 'Chicago', 'Denver', '1000'),
(3, 'New York', 'Toronto', '800'),
(4, 'New York', 'Denver', '1900'),
(5, 'Toronto', 'Calgary', '1500'),
(6, 'Toronto', 'Los Angeles', '1800'),
(7, 'Toronto', 'Chicago', '500'),
(8, 'Denver', 'Urbana', '1000'),
(9, 'Houston', 'Los Angeles', '1500'),
(10, 'Denver', 'Los Angeles', '1000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admim`
--
ALTER TABLE `admim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voos`
--
ALTER TABLE `voos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admim`
--
ALTER TABLE `admim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `voos`
--
ALTER TABLE `voos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
