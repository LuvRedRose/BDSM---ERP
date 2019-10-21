-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 02:27 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_control`
--

CREATE TABLE `tbl_control` (
  `id_control` int(11) NOT NULL,
  `material` varchar(65) NOT NULL,
  `stok_in` int(11) DEFAULT NULL,
  `stok_out` int(11) DEFAULT NULL,
  `stok_reject` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_control`
--

INSERT INTO `tbl_control` (`id_control`, `material`, `stok_in`, `stok_out`, `stok_reject`) VALUES
(1, 'Buah Jeruk', 100, 0, 2),
(2, 'Buah Alpukat', 100, 100, 0),
(3, 'Buah Setan', 100, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goods`
--

CREATE TABLE `tbl_goods` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(65) NOT NULL,
  `stok` mediumint(9) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goods`
--

INSERT INTO `tbl_goods` (`id_product`, `product_name`, `stok`, `price`) VALUES
(3, 'Jus Alpukat', 9901, 150000),
(4, 'Jus Jeruk', 10, 12000),
(5, 'Jus Mangga', 25, 10000),
(6, 'Jus Anggur', 67, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `product_name` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tgl_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_invoice` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `material` varchar(65) NOT NULL,
  `stok` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `status` enum('confirm','void','Not Confirm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_invoice`, `id_supplier`, `material`, `stok`, `price`, `tgl_pembelian`, `status`) VALUES
(1, 1, 'Buah Jeruk', 90, 20000, '2019-10-02', ''),
(2, 2, 'Buah Mangga', 90, 25000, '2019-10-02', ''),
(3, 1, 'Buah Anggur', 90, 15000, '2019-10-02', 'Not Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produksi`
--

CREATE TABLE `tbl_produksi` (
  `id_production` int(11) NOT NULL,
  `material_use` int(11) NOT NULL,
  `stok_in` int(11) NOT NULL,
  `finish_good` int(11) NOT NULL,
  `stok_finish` int(11) NOT NULL,
  `tgl_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produksi`
--

INSERT INTO `tbl_produksi` (`id_production`, `material_use`, `stok_in`, `finish_good`, `stok_finish`, `tgl_pembuatan`) VALUES
(9, 1, 900, 4, 1800, '2019-10-20'),
(10, 2, 100, 5, 200, '2019-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_raw`
--

CREATE TABLE `tbl_raw` (
  `id_material` int(11) NOT NULL,
  `material` varchar(65) NOT NULL,
  `stok` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_raw`
--

INSERT INTO `tbl_raw` (`id_material`, `material`, `stok`) VALUES
(1, 'Buah Jeruk', 900),
(2, 'Buah Mangga', 999),
(3, 'Buah Anggur', 50),
(4, 'Buah Alpukat', 900);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `supplier_name` varchar(65) NOT NULL,
  `address_supplier` text NOT NULL,
  `email` varchar(65) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `material` varchar(65) NOT NULL,
  `price` int(11) NOT NULL,
  `no_rek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `supplier_name`, `address_supplier`, `email`, `no_telp`, `material`, `price`, `no_rek`) VALUES
(1, 'Toko Buah Si Udin', '', '', 0, 'Buah Jeruk', 20000, 0),
(2, 'Toko Buah Si Amang', '', '', 0, 'Buah Mangga', 25000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `level` enum('staff','superuser','admin') NOT NULL,
  `password` varchar(65) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nip`, `level`, `password`, `status`) VALUES
(1, 123456, 'superuser', '0192023a7bbd73250516f069df18b500', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_control`
--
ALTER TABLE `tbl_control`
  ADD PRIMARY KEY (`id_control`);

--
-- Indexes for table `tbl_goods`
--
ALTER TABLE `tbl_goods`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  ADD PRIMARY KEY (`id_production`);

--
-- Indexes for table `tbl_raw`
--
ALTER TABLE `tbl_raw`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_control`
--
ALTER TABLE `tbl_control`
  MODIFY `id_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_goods`
--
ALTER TABLE `tbl_goods`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  MODIFY `id_production` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_raw`
--
ALTER TABLE `tbl_raw`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
