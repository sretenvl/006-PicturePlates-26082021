-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 08:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpvezba1`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `idAutora` int(11) NOT NULL,
  `fullName` text COLLATE utf8_unicode_ci NOT NULL,
  `universityIndex` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `university` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`idAutora`, `fullName`, `universityIndex`, `university`, `city`, `description`) VALUES
(1, 'Sreten Vladisavljevic', '123/17', 'Visokoa ICT skola', 'Belgrade', 'Sreten Vladisavljevic\r\nDatum rođenja: 26.08.1998.\r\nMesto rođenja: Beograd\r\nBroj indeksa: 123/17\r\nZavrsio sam Gimnaziju \"Sveti Sava\" u Beogradu i sada sam student prve godine na Visokoj ICT skoli na smeru Internet tehnologije.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idCart` int(11) NOT NULL,
  `idUsera` int(11) NOT NULL,
  `idP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idCart`, `idUsera`, `idP`) VALUES
(2, 2, 6),
(5, 2, 7),
(6, 2, 8),
(7, 2, 10),
(8, 2, 15),
(9, 2, 1),
(10, 2, 1),
(11, 2, 10),
(12, 2, 1),
(13, 2, 1),
(14, 2, 1),
(15, 2, 13),
(16, 2, 2),
(17, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `marke`
--

CREATE TABLE `marke` (
  `idMarke` int(11) NOT NULL,
  `marka` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marke`
--

INSERT INTO `marke` (`idMarke`, `marka`) VALUES
(1, 'Kultura'),
(2, 'Turisticko'),
(3, 'NASA'),
(4, 'Motivacija');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(11) NOT NULL,
  `naziv` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posteri`
--

CREATE TABLE `posteri` (
  `idP` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `opis` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `manjaSlika` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `altSlike` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `velicina` int(11) NOT NULL,
  `marka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posteri`
--

INSERT INTO `posteri` (`idP`, `naziv`, `cena`, `opis`, `slika`, `manjaSlika`, `altSlike`, `velicina`, `marka`) VALUES
(1, 'Voyager', 1500, 'Voyager-50X50', 'assets/images/noveSlike/1623251080_poster1.jpg', 'assets/images/manjeSlike/manja_1623251080_poster1.jpg', '1591988175_poster1.jpg', 1, 3),
(2, 'Voyager', 1000, 'Voyager-20X20', 'assets/images/noveSlike/1623251243_poster2.jpg', 'assets/images/manjeSlike/manja_1623251243_poster2.jpg', '1592341585_poster2.jpg', 3, 3),
(3, 'Bioshock', 2000, 'Rapture poster', 'assets/images/noveSlike/1623251251_poster3.jpg', 'assets/images/manjeSlike/manja_1623251251_poster3.jpg', '1592341585_poster2.jpg', 1, 1),
(4, 'Voyager2 Blue', 5000, 'Voyager2 Blue', 'assets/images/noveSlike/1623251268_poster4.jpg', 'assets/images/manjeSlike/manja_1623251268_poster4.jpg', '1592342277_poster4.jpg', 1, 3),
(5, 'Voyager2 Black', 5000, 'Voyager2 Black', 'assets/images/noveSlike/1623251284_poster5.jpg', 'assets/images/manjeSlike/manja_1623251284_poster5.jpg', '1592342314_poster5.jpg', 1, 3),
(6, 'Think Positive', 5000, 'Think Positive', 'assets/images/noveSlike/1623251295_poster6.jpg', 'assets/images/manjeSlike/manja_1623251295_poster6.jpg', '1592342360_poster6.jpg', 3, 4),
(7, 'Black Cat', 1200, 'Black Cat', 'assets/images/noveSlike/1623251308_poster7.jpg', 'assets/images/manjeSlike/manja_1623251308_poster7.jpg', '1592342413_poster7.jpg', 2, 4),
(8, 'Venece', 2500, 'Venece', 'assets/images/noveSlike/1623251316_poster8.jpg', 'assets/images/manjeSlike/manja_1623251316_poster8.jpg', '1592342447_poster8.jpg', 2, 2),
(9, 'Rome', 2000, 'Rome', 'assets/images/noveSlike/1623251328_poster9.jpg', 'assets/images/manjeSlike/manja_1623251328_poster9.jpg', '1592342477_poster9.jpg', 2, 2),
(10, 'BlackCat', 1500, 'BlackCat', 'assets/images/noveSlike/1623251343_poster10.jpg', 'assets/images/manjeSlike/manja_1623251343_poster10.jpg', '1592342509_poster10.jpg', 3, 4),
(11, 'Keep Calm', 2000, 'Calm', 'assets/images/noveSlike/1623251354_poster11.jpg', 'assets/images/manjeSlike/manja_1623251354_poster11.jpg', '1592342568_poster11.jpg', 2, 4),
(13, 'Africa', 2500, 'Africa', 'assets/images/noveSlike/1623251378_poster13.jpg', 'assets/images/manjeSlike/manja_1623251378_poster13.jpg', '1592342663_poster13.jpg', 2, 2),
(16, 'Mountain', 3000, 'Mountain', 'assets/images/noveSlike/1623251414_poster16.jpg', 'assets/images/manjeSlike/manja_1623251414_poster16.jpg', '1592342782_poster16.jpg', 2, 2),
(47, 'Back to the future', 3000, 'Back to the future poster', 'assets/images/noveSlike/1629999030_back2TFuture.jpg', 'assets/images/manjeSlike/manja_1629999030_back2TFuture.jpg', 'Back to the future', 2, 3),
(48, 'Beograd crtez', 1000, 'Beograd crtez', 'assets/images/noveSlike/1629999084_beograd.jpg', 'assets/images/manjeSlike/manja_1629999084_beograd.jpg', 'Beograd poster', 3, 2),
(49, 'Berlin kapija', 2000, 'Berlin kapija poster', 'assets/images/noveSlike/1629999112_berlin-vintage-poster.jpg', 'assets/images/manjeSlike/manja_1629999112_berlin-vintage-poster.jpg', 'Berlin poster', 3, 2),
(50, 'Oregon', 2000, 'Oregon trail poster', 'assets/images/noveSlike/1629999200_bo.jpg', 'assets/images/manjeSlike/manja_1629999200_bo.jpg', 'Oregon', 2, 2),
(51, 'Ferrari SF1000', 4000, 'Ferrari SF1000 poster', 'assets/images/noveSlike/1629999234_f1.jpg', 'assets/images/manjeSlike/manja_1629999234_f1.jpg', 'Ferrari SF1000 poster', 2, 1),
(52, 'F1 Austriski Gran Prix', 5000, 'F1 Austriski Gran Prix poster', 'assets/images/noveSlike/1629999308_formulaFerari.jpg', 'assets/images/manjeSlike/manja_1629999308_formulaFerari.jpg', 'F1 Austriski Gran Prix poster', 1, 1),
(53, 'F1 Brazilski Gran Prix', 5000, 'F1 Brazilski Gran Prix poster', 'assets/images/noveSlike/1629999356_formulaSaoPaolo.jpg', 'assets/images/manjeSlike/manja_1629999356_formulaSaoPaolo.jpg', 'F1 Brazilski Gran Prix', 1, 1),
(54, 'F1 Američki Gran Prix', 5000, 'F1 Američki Gran Prix poster', 'assets/images/noveSlike/1629999401_formulaUS.jpg', 'assets/images/manjeSlike/manja_1629999401_formulaUS.jpg', 'F1 Američki Gran Prix', 1, 1),
(55, 'Heir to the Empire original', 4000, 'Heir to the Empire original poster', 'assets/images/noveSlike/1629999470_sw.jpg', 'assets/images/manjeSlike/manja_1629999470_sw.jpg', 'Heir to the Empire original', 2, 1),
(56, 'Mandalorian 1', 2000, 'Mandalorian 1 poster', 'assets/images/noveSlike/1629999499_sw2.jpg', 'assets/images/manjeSlike/manja_1629999499_sw2.jpg', 'Mandalorian 1', 3, 1),
(57, 'Mandalorian 2', 2000, 'Mandalorian 2 poster', 'assets/images/noveSlike/1629999524_sw3.jpg', 'assets/images/manjeSlike/manja_1629999524_sw3.jpg', 'Mandalorian 2', 3, 1),
(58, 'Heir to the empire novi', 3000, 'Heir to the empire novi poster', 'assets/images/noveSlike/1629999558_sw4.jpg', 'assets/images/manjeSlike/manja_1629999558_sw4.jpg', 'Heir to the empire novi', 2, 1),
(59, 'Tower of God', 2000, 'Tower of God poster', 'assets/images/noveSlike/1629999581_tog.jpg', 'assets/images/manjeSlike/manja_1629999581_tog.jpg', 'Tower of God', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `idS` int(11) NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `altSlike` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipkorisnika`
--

CREATE TABLE `tipkorisnika` (
  `idTip` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipkorisnika`
--

INSERT INTO `tipkorisnika` (`idTip`, `naziv`) VALUES
(1, 'Adiministrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idTip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `idTip`) VALUES
(1, 'sretenvl', 'a77995f3bfa2fefc96f625a095b632e6', 'sretenvl@yahoo.com', 1),
(2, 'velen', '2dc379a5ae71b369446a8f4ac67b9f9b', 'nesto@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `velicina`
--

CREATE TABLE `velicina` (
  `idVelicine` int(11) NOT NULL,
  `velicina` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `velicina`
--

INSERT INTO `velicina` (`idVelicine`, `velicina`) VALUES
(1, '35.4\'\' / 25.2\'\''),
(2, '26.6\'\' / 18.9\'\''),
(3, ' 17.7\'\' / 12.6\'\'');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`idAutora`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCart`);

--
-- Indexes for table `marke`
--
ALTER TABLE `marke`
  ADD PRIMARY KEY (`idMarke`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `posteri`
--
ALTER TABLE `posteri`
  ADD PRIMARY KEY (`idP`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`idS`);

--
-- Indexes for table `tipkorisnika`
--
ALTER TABLE `tipkorisnika`
  ADD PRIMARY KEY (`idTip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `velicina`
--
ALTER TABLE `velicina`
  ADD PRIMARY KEY (`idVelicine`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `idAutora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `marke`
--
ALTER TABLE `marke`
  MODIFY `idMarke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posteri`
--
ALTER TABLE `posteri`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipkorisnika`
--
ALTER TABLE `tipkorisnika`
  MODIFY `idTip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `velicina`
--
ALTER TABLE `velicina`
  MODIFY `idVelicine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
