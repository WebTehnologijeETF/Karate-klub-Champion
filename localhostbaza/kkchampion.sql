-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2015 at 10:20 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kkchampion`
--
CREATE DATABASE IF NOT EXISTS `kkchampion` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `kkchampion`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(12) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(12) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`) VALUES
('admin', 'admin', 'mirza.ohranovic@gmail.com'),
('root', 'root', 'tasdfdsaf@baba.ba'),
('vex', 'sifricaxxx', 'imenko@prezimenko.ba');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `novost` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `novost` (`novost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `datum`, `email`, `autor`, `tekst`, `novost`) VALUES
(1, '2015-05-26 13:04:16', 'aldin.kiselica.94@gmail.com', 'Aldin Kiselica', 'Moj komentar na prvi clanak.\r\nClanak je dakako prvi iz baze, a ujedno i jedini sa komentarom za sad, he he he.', 1),
(11, '2015-05-27 23:27:57', 'test@test.test', 'Tester', 'radi radi radi radi radi radi radi radi radi radi radi radi radi radi radi radi radi radi radi radi radi', 1),
(15, '2015-05-27 23:30:14', 'test@test.test', 'Tester', 'popravio sam popravio sam popravio sam popravio sam popravio sam popravio sam popravio sam popravio sam popravio sam popravio sam popravio sam', 1),
(41, '2015-05-27 23:46:57', 'sadf@afasdfsa.ba', 'Aldin', 'stokoo stokoo stokoo stokoo stokoo stokoo stokoo stokoo stokoo stokoo stokoo', 1),
(44, '2015-05-28 08:31:16', '', 'Big bang', 'Jutarnji testić :D', 1),
(45, '2015-05-28 08:51:14', '', 'Refa', 'Ja, Refko Odobašić, materem nisam dobar s pameću', 1);

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE IF NOT EXISTS `novost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `naslov` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` text COLLATE utf8_slovenian_ci NOT NULL,
  `detaljnije` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `novost`
--

INSERT INTO `novost` (`id`, `datum`, `autor`, `naslov`, `slika`, `opis`, `detaljnije`) VALUES
(1, '2015-05-21 11:33:49', 'Ja', 'Novost iz baze', 'slike/ilidza.png', 'Ovdje ja sad kao pišem neki tekst...\r\nLudnica he he he', 'Neki detalji'),
(3, '2015-05-28 21:35:18', 'j jhsf k lkdsf jgčfs', 'Admin', 'slike/facebook.png', 'asf dasf dsafa sfas fas f sddfdsa fadsf dsa fdsaf dsa  fds f fgh htjjzkkllfdgfdg', 'j jhsf k lkdsf jgčfsdlgk fsčdlg fgsf ćčgks glfdskčgs gčldfs gfsd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
