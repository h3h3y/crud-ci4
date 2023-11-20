-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2023 at 02:19 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_utsci_0080`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbuku_0080`
--

CREATE TABLE `tbbuku_0080` (
  `bukukode` varchar(30) NOT NULL,
  `bukujudul` varchar(100) NOT NULL,
  `bukukategori` varchar(100) NOT NULL,
  `bukuhalaman` int(11) NOT NULL,
  `bukupenerbit` varchar(100) NOT NULL,
  `bukuisbn` varchar(20) NOT NULL,
  `bukuharga` int(11) NOT NULL,
  `bukusampul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbuku_0080`
--

INSERT INTO `tbbuku_0080` (`bukukode`, `bukujudul`, `bukukategori`, `bukuhalaman`, `bukupenerbit`, `bukuisbn`, `bukuharga`, `bukusampul`) VALUES
('A001', 'Negeri 5 Menara', 'Novel', 423, 'PT. Gramedia Pustaka Utama', '978-979-22-4861-6', 65000, 'uploads/sampul/1700313912_62092b95883c6eddca58.jpg'),
('A002', 'Biografi Gus Dur', 'Biografi', 516, 'Yogyakarta : IRCiSOD, 2020', '978-623-7378-21-1', 100000, 'uploads/sampul/1700288362_e0a981fbc07acb9ce5f1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbuku_0080`
--
ALTER TABLE `tbbuku_0080`
  ADD PRIMARY KEY (`bukukode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
