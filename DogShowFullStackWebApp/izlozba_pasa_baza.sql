-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 01:38 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `izlozba_pasa_baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici_baza`
--

CREATE TABLE `korisnici_baza` (
  `id` bigint(255) NOT NULL,
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  `email` text NOT NULL,
  `sifra` text NOT NULL,
  `vrsta_korisnika` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici_baza`
--

INSERT INTO `korisnici_baza` (`id`, `ime`, `prezime`, `email`, `sifra`, `vrsta_korisnika`) VALUES
(1, 'Đorđe', 'Popović', 'popovicdizajn@gmail.com', 'Djordje97', 'ADMINISTRATOR'),
(2, 'Petar', 'Milošević', 'petarmilosevic@gmail.com', 'Petar123', 'SUDIJA'),
(3, 'Jovan', 'Petrović', 'jovanpetrovic@gmail.com', 'Jovan123', 'KOORDINATOR');

-- --------------------------------------------------------

--
-- Table structure for table `psi_baza`
--

CREATE TABLE `psi_baza` (
  `id` bigint(255) NOT NULL,
  `ime_psa` text NOT NULL,
  `rasa_psa` text NOT NULL,
  `ocena_psa` text NOT NULL,
  `korisnik_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici_baza`
--
ALTER TABLE `korisnici_baza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psi_baza`
--
ALTER TABLE `psi_baza`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici_baza`
--
ALTER TABLE `korisnici_baza`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `psi_baza`
--
ALTER TABLE `psi_baza`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
