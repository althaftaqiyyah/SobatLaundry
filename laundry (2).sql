-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 01:40 PM
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
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `nama`, `no_telepon`, `alamat`, `password`) VALUES
('12345', 'asdads', 'adasdsadasdsa', 'adsadasasdadas', '$2y$10$4WZ025vjuYcYcBKj1C1In.ssHRuJqDuTEOMJNRld/esPVObXDS3ju'),
('123456', 'asdads', 'adasdsadasdsa', 'adsadasasdadas', '$2y$10$XZ12D8jyMA1yHI48e/RsZ.vONQXOPd/FtTYvXrrhzD9372IQWQH2y'),
('asd', 'asdasd', 'asd', 'adsa', '$2y$10$Xjs0MQ3SAbYFXfZLiVGtpuDO0az8ffhjkCqow0YHkPNqWgeDzsGSO'),
('asd123', 'asd', 'asdasd', 'asd', '$2y$10$CvSLmq91C3CIuCELTSWHDeGmYHbR7LQQwpYsCBFdhh4kIwTgxZYO.'),
('dzi', 'dazai', '08123564', 'jalan no longer human', '$2y$10$KUxYCkRPlE7RV3dfVzwLNePFk4oEHaR2V8V6lnTF0QOq3cguAMBJa'),
('glitchgoo', 'Althaf Nawadir Taqiyyah', '0876563684', 'jalan sweden', '$2y$10$6IdufrrXEg57wgoBV9JjwurH8N7SnZpmNB.aMqQ3wxiTuWoZ8HEUO'),
('qwe', 'qwe', '123', 'qwe', '$2y$10$Re1tc1.S4qdwHB5COgTpcu0k/4krwXB/GvNz0lwADpRRUF2HRZ7z6');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(255) NOT NULL,
  `nama_kurir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`) VALUES
('00001', 'Angga Yunanda'),
('00002', 'Baskara Mahendra'),
('00003', 'Ari Irham'),
('00004', 'Iqbaal Ramadhan'),
('00005', 'Umay Shahab');

-- --------------------------------------------------------

--
-- Table structure for table `outlet_laundry`
--

CREATE TABLE `outlet_laundry` (
  `id_outlet` varchar(255) NOT NULL,
  `nama_outlet` varchar(255) NOT NULL,
  `alamat_outlet` varchar(255) NOT NULL,
  `no_telepon_outlet` varchar(255) NOT NULL,
  `id_kurir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outlet_laundry`
--

INSERT INTO `outlet_laundry` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `no_telepon_outlet`, `id_kurir`) VALUES
('AL0227', 'Aida Laundry', 'Jl. Babakan Tengah No.112, RT.02/RW.08, Babakan, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680', '0852-8222-0227', '00003'),
('BL0890', 'Botani laundry', 'Jl. Babakan Raya no. 13, Babakan, Dramaga, Kab. Bogor, Jawa Barat, 16680', '0812-3456-7890', '00004'),
('DL0789', 'Dahlia laundry', 'Jl. Babakan Raya no 21, Babakan, Kec Dramaga, Kab Bogor, Jawa Barat, 16680 ', '0801-2345-6789', '00005'),
('ECL166', '567 Express Coin Laundry', 'Jalan Babakan Tengah No.15, Babakan, Bogor, Jawa Barat 16680', '0821-1151-6166', '00001'),
('LA0788', 'Laundry Arraya', 'Jl. Raya Dramaga, Babakan, Babakan, Dramaga, Kabupaten Bogor', '0878-8308-0788', '00002');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_order` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_order` int(11) NOT NULL,
  `jumlah_pakaian` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `tanggal_pengambilan` date NOT NULL,
  `id_outlet` varchar(255) NOT NULL,
  `uname_cust` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `outlet_laundry`
--
ALTER TABLE `outlet_laundry`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `payment_order_fk` (`id_order`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `pesanan_uname_fk` (`uname_cust`),
  ADD KEY `pesanan_outlet_fk` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_order_fk` FOREIGN KEY (`id_order`) REFERENCES `pesanan` (`id_order`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_outlet_fk` FOREIGN KEY (`id_outlet`) REFERENCES `outlet_laundry` (`id_outlet`),
  ADD CONSTRAINT `pesanan_uname_fk` FOREIGN KEY (`uname_cust`) REFERENCES `customer` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
