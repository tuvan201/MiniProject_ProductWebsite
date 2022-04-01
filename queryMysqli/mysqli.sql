-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 03:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysqli`
--

-- --------------------------------------------------------

--
-- Table structure for table `cutomer feedback`
--

CREATE TABLE `cutomer feedback` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cutomer feedback`
--

INSERT INTO `cutomer feedback` (`id`, `name`, `email`, `feedback`) VALUES
(1, 'tú', 'tnn209201@gmail.com', 'giỏi lắmm'),
(2, 'đệ việt', 'chiennv.ifc@gmail.com', 'anh tú giỏi quá'),
(13, 'tùng', 'chiennv.ifc@gmail.com', 'abc'),
(37, 'a', 'chiennv.ifc@gmail.com', 'a'),
(38, 'a', 'chiennv.ifc@gmail.com', 'a'),
(39, 'a', 'chiennv.ifc@gmail.com', 'a'),
(40, 'a', 'chiennv.ifc@gmail.com', 'a'),
(41, 'a', 'chiennv.ifc@gmail.com', 'a'),
(42, 'a', 'chiennv.ifc@gmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngaydat` date NOT NULL,
  `Tongtien` int(11) NOT NULL,
  `Makhach` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Dienthoai` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Diachi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donhangct`
--

CREATE TABLE `donhangct` (
  `MaDH` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Mahang` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Dongia` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `Mahang` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tenhang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Dongia` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `DVT` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Maloai` varchar(20) NOT NULL,
  `Anh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`Mahang`, `Tenhang`, `Dongia`, `Soluong`, `DVT`, `Maloai`, `Anh`) VALUES
('1', 'Sofa1', 15, 15, 'hộp', 'Luxury', 'img02.jpg'),
('2', 'Sofa2', 15, 15, 'túi', 'Classic', 'img03.jpg'),
('3', 'Sofa3', 8, 15, 'Cái', 'Family', 'img05.jpg'),
('4', 'Sofa4', 30, 15, 'Cái', 'Highclass', 'img06.jpg'),
('5', 'Sofa5', 25, 50, 'Cái', 'Cushion', 'img07.jpg'),
('6', 'Sofa6', 11, 15, 'Cái', 'Modern', 'img03.jpg'),
('7', 'Sofa7', 52, 10, 'Cái', 'Luxury', 'img09.jpg'),
('8', 'Sofa8', 23, 9, 'Chiếc', 'Classic', 'img10.png'),
('9', 'Sofa9', 3, 50, 'Chiếc', 'Family', 'img04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`) VALUES
(1, 'Title 1'),
(2, 'Title 2'),
(3, 'Title 3'),
(4, 'Title 4'),
(5, 'Title 5'),
(6, 'Title 6'),
(7, 'Title 7'),
(8, 'Title 8'),
(9, 'Title 9'),
(10, 'Title 10'),
(11, 'Title 11'),
(12, 'Title 12'),
(13, 'Title 13'),
(14, 'Title 14'),
(15, 'Title 15'),
(16, 'Title 16'),
(17, 'Title 17'),
(18, 'Title 18'),
(19, 'Title 19'),
(20, 'Title 20'),
(21, 'Title 21'),
(22, 'Title 22'),
(23, 'Title 23'),
(24, 'Title 24'),
(25, 'Title 25'),
(26, 'Title 26'),
(27, 'Title 27'),
(28, 'Title 28'),
(29, 'Title 29'),
(30, 'Title 30'),
(31, 'Title 31'),
(32, 'Title 32'),
(33, 'Title 33'),
(34, 'Title 34'),
(35, 'Title 35'),
(36, 'Title 36'),
(37, 'Title 37'),
(38, 'Title 38'),
(39, 'Title 39'),
(40, 'Title 40'),
(41, 'Title 41'),
(42, 'Title 42'),
(43, 'Title 43'),
(44, 'Title 44'),
(45, 'Title 45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `pass`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cutomer feedback`
--
ALTER TABLE `cutomer feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Indexes for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`MaDH`,`Mahang`),
  ADD KEY `Mahang` (`Mahang`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`Mahang`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cutomer feedback`
--
ALTER TABLE `cutomer feedback`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`Mahang`) REFERENCES `hanghoa` (`Mahang`),
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
