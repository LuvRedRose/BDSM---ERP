-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 08:11 AM
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
(4, 'Buah Jeruk', 100, 0, 0),
(5, 'Buah Mangga', 1, 0, 0),
(7, 'Buah Anggur', 100, 0, 0),
(8, 'Buah Anggur', 50, 0, 0),
(9, 'Buah Jeruk', 50, 0, 0),
(10, 'Buah Jeruk', 10, 0, 0),
(11, 'Buah Mangga', 200, 0, 0);

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
(4, 'Jus Jeruk', 2308, 12000),
(5, 'Jus Mangga', 45, 10000),
(6, 'Jus Anggur', 67, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_machine`
--

CREATE TABLE `tbl_machine` (
  `mach_id` int(11) NOT NULL,
  `mach_number` varchar(15) NOT NULL,
  `mach_sd_date` date DEFAULT NULL,
  `mach_m_duration` int(11) DEFAULT NULL,
  `mach_su_date` date DEFAULT NULL,
  `mach_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_machine`
--

INSERT INTO `tbl_machine` (`mach_id`, `mach_number`, `mach_sd_date`, `mach_m_duration`, `mach_su_date`, `mach_capacity`) VALUES
(1, 'MACH 1', '2019-12-10', 3, '2019-12-13', 500),
(2, 'MACH 2', '2019-12-06', 2, '2019-12-08', 700),
(3, 'MACH 3', '2019-12-20', 3, '2019-12-23', 450),
(4, 'MACH 3', '2019-12-11', 3, '2019-12-13', 450),
(5, 'MACH 4', '2019-12-11', 3, '2019-12-13', 450),
(6, 'MACH 3', '2019-12-11', 5, '2019-12-16', 950),
(7, 'MACH 1', '2019-12-17', 2, '2019-12-19', 590),
(8, 'MACH 1', '2019-12-08', 4, '2019-12-12', 500),
(9, 'MACH 2', '2019-12-14', 1, '2019-12-15', 350),
(10, 'MACH 2', '2019-12-02', 4, '2019-12-06', 250),
(11, 'MACH 3', '2019-12-16', 1, '2019-12-17', 800),
(12, 'MACH 4', '2019-12-13', 2, '2019-12-15', 550),
(13, 'MACH 4', '2019-12-18', 6, '2019-12-24', 800),
(14, 'MACH 2', '2019-12-18', 1, '2019-12-19', 910),
(15, 'MACH 2', '2019-12-03', 6, '2019-12-09', 700),
(16, 'MACH 3', '2019-12-15', 6, '2019-12-21', 400),
(17, 'MACH 1', '2019-12-13', 8, '2019-12-21', 800),
(18, 'MACH 4', '2019-12-03', 3, '2019-12-06', 840),
(19, 'MACH 3', '2019-12-26', 4, '2019-12-30', 790),
(20, 'MACH 1', '2019-12-23', 2, '2019-12-24', 750),
(21, 'MACH 2', '2019-12-10', NULL, NULL, NULL);

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

--
-- Triggers `tbl_order`
--
DELIMITER $$
CREATE TRIGGER `kurang_goods` AFTER INSERT ON `tbl_order` FOR EACH ROW BEGIN
	update tbl_goods SET stok = stok - new.quantity
    where product_name = new.product_name;
END
$$
DELIMITER ;

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
  `status` enum('outstanding','posted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_invoice`, `id_supplier`, `material`, `stok`, `price`, `tgl_pembelian`, `status`) VALUES
(1, 1, 'Buah Jeruk', 90, 20000, '2019-10-02', ''),
(2, 2, 'Buah Mangga', 90, 25000, '2019-10-02', ''),
(3, 1, 'Buah Anggur', 90, 15000, '2019-10-02', 'posted'),
(7, 1, 'Buah Jeruk', 9009, 20000, '2019-10-22', 'posted'),
(8, 1, 'Buah Jeruk', 10, 30000, '2019-10-22', 'outstanding'),
(9, 1, 'Buah Jeruk', 200, 200000, '2019-10-22', 'posted');

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
(10, 2, 100, 5, 200, '2019-10-21'),
(11, 1, 50, 4, 100, '2019-10-21'),
(12, 1, 999, 4, 1998, '2019-10-22'),
(13, 1, 100, 4, 200, '2019-10-22'),
(14, 2, 10, 5, 20, '2019-10-22');

--
-- Triggers `tbl_produksi`
--
DELIMITER $$
CREATE TRIGGER `stok_assembly` AFTER INSERT ON `tbl_produksi` FOR EACH ROW BEGIN
	UPDATE tbl_raw set stok = stok-new.stok_in
    where id_material=new.material_use;
    update tbl_goods set stok = stok+new.stok_finish
    where id_product = new.finish_good;
END
$$
DELIMITER ;

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
(1, 'Buah Jeruk', -99),
(2, 'Buah Mangga', 990),
(3, 'Buah Anggur', 200),
(4, 'Buah Alpukat', 900);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipment`
--

CREATE TABLE `tbl_shipment` (
  `ship_id` int(11) NOT NULL,
  `ship_name` varchar(65) NOT NULL,
  `ship_date` date NOT NULL,
  `ship_depart` varchar(65) NOT NULL,
  `ship_destination` varchar(65) NOT NULL,
  `ship_duration` int(11) NOT NULL,
  `ship_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipment`
--

INSERT INTO `tbl_shipment` (`ship_id`, `ship_name`, `ship_date`, `ship_depart`, `ship_destination`, `ship_duration`, `ship_qty`) VALUES
(1, 'Adudu lah', '2019-12-18', 'Jakarta', 'Batam', 4, 9000),
(2, 'Kapal Terbang', '2019-12-04', 'Jakarta', 'Singapore', 5, 1000),
(3, 'Kuda Terbang', '2019-12-05', 'Jakarta', 'Kalimantan', 2, 800),
(4, 'Market ya', '2019-12-06', 'Jakarta', 'Bali', 4, 90),
(5, 'Budi Setiawan', '2019-12-06', 'Jakarta', 'Lombok', 7, 990),
(6, 'Mamat', '2019-12-07', 'Jakarta', 'Papua', 10, 1000),
(7, 'Epson', '2019-12-08', 'Jakarta', 'Lampung', 2, 567),
(8, 'Acer', '2019-12-04', 'Jakarta', 'Bekasi', 1, 879),
(9, 'Billie', '2019-12-04', 'Jakarta', 'Nepal', 15, 1000),
(10, 'Stabilo', '2019-12-09', 'Jakarta', 'Sulawesi', 6, 980),
(11, 'MCS (Mencari Cinta Sejati)', '2019-12-26', 'Jakarta', 'Pekanbaru', 5, 9000),
(12, 'Sukamundur', '2019-12-15', 'Jakarta', 'Sukabumi', 2, 3600),
(13, 'Flying Fish', '2019-12-19', 'Jakarta', 'Jayapura', 13, 1600),
(14, 'Minangka', '2019-12-05', 'Jakarta', 'Padang', 8, 7100),
(15, 'Asus', '2019-12-21', 'Jakarta', 'Yogyakarta', 3, 9100),
(16, 'Dobleh', '2019-12-02', 'Jakarta', 'Cilacap', 7, 2500),
(17, 'Jamal', '2019-12-14', 'Jakarta', 'Purworejo', 2, 3400),
(18, 'Tubagus', '2019-12-12', 'Jakarta', 'Banjarmasin', 1, 3200),
(19, 'Denpasar', '2019-12-21', 'Jakarta', 'Bandung', 4, 9200),
(20, 'Kulo', '2019-12-22', 'Jakarta', 'Surabaya', 4, 4500),
(21, 'line today', '2019-12-08', 'jakarta', 'bali', 5, 900),
(22, 'line today', '2019-12-08', 'jakarta', 'bali', 5, 900),
(23, 'line today', '2019-12-08', 'jakarta', 'bali', 5, 900),
(24, 'line today1', '2019-12-09', 'jakarta', 'bali', 4, 90),
(25, 'line today12', '2019-12-10', 'jakarta', 'bali', 4, 90),
(26, 'Adudu lah', '2019-12-18', 'Jakarta', 'Batam', 4, 9000),
(27, 'Adudu lah', '2019-12-18', 'Jakarta', 'Batam', 4, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `supplier_name` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `no_telp` varchar(11) NOT NULL,
  `material` varchar(65) NOT NULL,
  `price` int(11) NOT NULL,
  `no_rek` varchar(11) NOT NULL,
  `supp_city` varchar(100) NOT NULL,
  `supp_prov` varchar(100) NOT NULL,
  `supp_post_code` int(11) NOT NULL,
  `supp_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `supplier_name`, `email`, `no_telp`, `material`, `price`, `no_rek`, `supp_city`, `supp_prov`, `supp_post_code`, `supp_pic`) VALUES
(1, 'Toko Buah Si Udin', 'udin99@buah.com', '08129456732', 'Buah Jeruk', 20000, '546783291', 'Pekanbaru', 'Sumatera Barat', 34627, 'Udin Simatupang'),
(2, 'Toko Buah Si Amang', 'amangganteng77@dobleh.com', '08556237823', 'Buah Mangga', 25000, '564738280', 'Denpasar', 'Bali', 44672, 'Tubagus Hendra'),
(4, 'Toko Buah Si Bertortu', 'vertotu888@gmail.com', '08553241674', 'Buah Alpukat', 25000, '673845639', 'Yogyakarta', 'Jawa Tengah', 23461, 'Fernando Jaya'),
(5, 'Toko Buah Si Ani', 'anikaliu99@buah.com', '02134568273', 'Buah Anggur', 30000, '957483746', 'Meikarta', 'Jawa Barat', 14045, 'Ani Wahyudi Kaliu'),
(6, 'Toko Buah Mang Jaja', 'jajaraharja8989@yahoo.co.id', '02116778344', 'Buah Pisang', 13000, '678234536', 'Padang', 'Sumatera Barat', 85746, 'Jaja Raharja'),
(7, 'Toko Buah Bu Ida', 'ida23@yahoo.co.id', '02185692345', 'Buah Melon', 22000, '694534536', 'Bandung', 'Jawa Barat', 99746, 'Ida Kahida');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `ware_id` int(11) NOT NULL,
  `ware_name` varchar(65) NOT NULL,
  `ware_capacity` int(11) NOT NULL,
  `ware_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warehouse`
--

INSERT INTO `tbl_warehouse` (`ware_id`, `ware_name`, `ware_capacity`, `ware_number`) VALUES
(1, 'Gudang ya', 10000, 1),
(2, 'Gudang ya 2', 10000, 2),
(3, 'Gudang ya 3', 10000, 3),
(4, 'Gudang ya 4', 10000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse_detail`
--

CREATE TABLE `tbl_warehouse_detail` (
  `ware_id` int(11) NOT NULL,
  `ware_date` date NOT NULL,
  `ware_cluster` varchar(10) NOT NULL,
  `ware_rack` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ware_qty` int(11) NOT NULL,
  `ware_activity` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warehouse_detail`
--

INSERT INTO `tbl_warehouse_detail` (`ware_id`, `ware_date`, `ware_cluster`, `ware_rack`, `product_id`, `ware_qty`, `ware_activity`) VALUES
(1, '2019-12-13', 'A001', '01', 3, 500, 'In'),
(2, '2019-12-11', 'A001', '02', 4, 900, 'In'),
(3, '2019-12-18', 'A001', '03', 5, 123, 'Out'),
(4, '2019-12-04', 'A001', '04', 6, 98, 'In'),
(5, '2019-12-25', 'A001', '05', 3, 90, 'Out'),
(6, '2019-12-04', 'A001', '02', 4, 90, 'In'),
(7, '2019-12-11', 'A001', '06', 5, 345, 'In'),
(8, '2019-12-04', 'A001', '02', 4, 90, 'In'),
(9, '2019-12-11', 'A001', '06', 5, 345, 'In'),
(10, '2019-12-11', 'A001', '08', 6, 90, 'In'),
(11, '2019-12-21', 'A001', '07', 3, 145, 'In'),
(12, '2019-12-12', 'A001', '09', 4, 90, 'In'),
(13, '2019-12-23', 'A001', '07', 5, 14, 'Out'),
(14, '2019-12-22', 'A001', '06', 3, 45, 'In'),
(15, '2019-12-24', 'A001', '06', 6, 5, 'In'),
(16, '2019-12-12', 'A001', '09', 4, 90, 'Out'),
(17, '2019-12-23', 'A001', '07', 5, 14, 'Out'),
(18, '2019-12-22', 'A001', '06', 3, 45, 'Out'),
(19, '2019-12-24', 'A001', '06', 6, 5, 'Out'),
(20, '2019-12-25', 'A001', '06', 6, 5, 'Out');

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
-- Indexes for table `tbl_machine`
--
ALTER TABLE `tbl_machine`
  ADD PRIMARY KEY (`mach_id`);

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
-- Indexes for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  ADD PRIMARY KEY (`ship_id`);

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
-- Indexes for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`ware_id`);

--
-- Indexes for table `tbl_warehouse_detail`
--
ALTER TABLE `tbl_warehouse_detail`
  ADD PRIMARY KEY (`ware_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_control`
--
ALTER TABLE `tbl_control`
  MODIFY `id_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_goods`
--
ALTER TABLE `tbl_goods`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_machine`
--
ALTER TABLE `tbl_machine`
  MODIFY `mach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  MODIFY `id_production` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_raw`
--
ALTER TABLE `tbl_raw`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  MODIFY `ware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_warehouse_detail`
--
ALTER TABLE `tbl_warehouse_detail`
  MODIFY `ware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
