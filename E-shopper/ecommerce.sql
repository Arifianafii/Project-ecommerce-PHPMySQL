-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 09:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `nama`) VALUES
(1, 'Pakaian'),
(2, 'Aksesoris'),
(3, 'Sepatu'),
(4, 'Tas');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `tanggal` date NOT NULL,
  `total_harga` double NOT NULL,
  `nama_pemesan` varchar(45) NOT NULL,
  `alamat_pemesan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_produk`, `qty`, `tanggal`, `total_harga`, `nama_pemesan`, `alamat_pemesan`) VALUES
(1, 'Tas Kantor BLUE', 3, '2023-04-27', 369000, 'Hani', 'jakarta indoneisa'),
(2, 'Kacamata Hitam', 3, '2023-04-27', 600000, 'Salma', 'Bogor');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `nama` varchar(45) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis_produk` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `stok`, `jenis_produk`) VALUES
(1, 'PK001', 'Blus Peplum', 'Blus peplum dengan model yang feminin dan elegan.', 250000, 20, 'Pakaian'),
(2, 'PK002', 'Kemeja Putih', 'Kemeja putih dengan bahan katun yang nyaman dipakai.', 200000, 15, 'Pakaian'),
(3, 'PK003', 'Dress Hitam', 'Dress hitam dengan detail renda yang cantik.', 350000, 10, 'Pakaian'),
(4, 'PK004', 'Jaket Kulit', 'Jaket kulit dengan model yang trendy dan modern.', 450000, 5, 'Pakaian'),
(5, 'PK005', 'Celana Jogger', 'Celana jogger dengan bahan yang nyaman dan elastis.', 150000, 30, 'Pakaian'),
(6, 'PK006', 'Rok Mini', 'Rok mini dengan detail lipit yang unik dan cantik.', 180000, 25, 'Pakaian'),
(7, 'PK007', 'Atasan Crop', 'Atasan crop dengan model yang simpel namun chic.', 120000, 20, 'Pakaian'),
(8, 'PK008', 'Jumpsuit', 'Jumpsuit dengan model yang elegan dan simpel.', 300000, 8, 'Pakaian'),
(9, 'PK009', 'Baju Renang', 'Baju renang dengan desain trendy dan nyaman dipakai.', 250000, 12, 'Pakaian'),
(10, 'PK010', 'Setelan Blazer', 'Setelan blazer dengan model yang profesional dan modern.', 500000, 3, 'Pakaian'),
(11, 'AK001', 'Tas Ransel', 'Tas ransel multifungsi dengan banyak kantong dan tali yang kuat.', 350000, 10, 'Aksesoris'),
(12, 'AK002', 'Sepatu Sneakers', 'Sepatu sneakers dengan desain yang trendy dan nyaman dipakai.', 500000, 8, 'Aksesoris'),
(13, 'AK003', 'Topi Trucker', 'Topi trucker dengan model yang simpel namun stylish.', 80000, 15, 'Aksesoris'),
(14, 'AK004', 'Gelang Emas', 'Gelang emas dengan desain yang elegan dan simpel.', 250000, 5, 'Aksesoris'),
(15, 'AK005', 'Kalung Choker', 'Kalung choker dengan desain unik dan cantik.', 150000, 20, 'Aksesoris'),
(16, 'AK006', 'Kacamata Hitam', 'Kacamata hitam dengan model yang trendy dan fashion.', 200000, 12, 'Aksesoris'),
(17, 'AK007', 'Syall', 'Syall dengan warna-warna cerah yang cantik.', 100000, 25, 'Aksesoris'),
(18, 'AK008', 'IPhone Case', 'Phone case dengan desain yang lucu dan unik.', 75000, 30, 'Aksesoris'),
(19, 'AK009', 'Bros Bunga', 'Bros bunga dengan warna-warna yang cerah dan cantik.', 50000, 20, 'Aksesoris'),
(20, 'AK010', 'Dompet Kulit', 'Dompet kulit dengan kualitas yang bagus dan model yang simpel.', 300000, 8, 'Aksesoris'),
(21, 'SP001', 'Sepatu Boot', 'Sepatu boot dengan model yang trendy dan nyaman dipakai.', 600000, 10, 'Sepatu'),
(22, 'SP002', 'Sepatu Loafers', 'Sepatu loafers dengan desain yang elegan dan simpel.', 400000, 15, 'Sepatu'),
(23, 'SP003', 'Sandal Jepit', 'Sandal jepit dengan bahan yang nyaman dan desain yang simpel.', 150000, 20, 'Sepatu'),
(24, 'SP004', 'Sepatu Sneakers', 'Sepatu sneakers dengan desain yang sporty dan trendy.', 500000, 8, 'Sepatu'),
(25, 'SP005', 'Sepatu Formal', 'Sepatu formal dengan model yang profesional dan elegan.', 700000, 5, 'Sepatu'),
(26, 'SP006', 'Sepatu Running', 'Sepatu running dengan bahan yang ringan dan nyaman.', 450000, 12, 'Sepatu'),
(27, 'SP007', 'Sepatu Ankle Boots', 'Sepatu ankle boots dengan model yang chic dan trendy.', 550000, 7, 'Sepatu'),
(28, 'SP008', 'Sepatu High Heels', 'Sepatu high heels dengan desain yang elegan dan cantik.', 800000, 3, 'Sepatu'),
(29, 'SP009', 'Sepatu Wedges', 'Sepatu wedges dengan model yang simpel namun elegan.', 350000, 18, 'Sepatu'),
(30, 'SP010', 'Sepatu Slip-On', 'Sepatu slip-on dengan desain yang simpel dan nyaman dipakai.', 250000, 25, 'Sepatu'),
(31, 'TS001', 'Tas Tote', 'Tas tote dengan model yang simpel namun elegan.', 350000, 10, 'Tas'),
(32, 'TS002', 'Tas Ransel', 'Tas ransel multifungsi dengan banyak kantong dan tali yang kuat.', 400000, 15, 'Tas'),
(33, 'TS003', 'Tas Selempang', 'Tas selempang dengan desain yang chic dan simpel.', 250000, 20, 'Tas'),
(34, 'TS004', 'Tas Clutch', 'Tas clutch dengan desain yang elegan dan cantik.', 150000, 25, 'Tas'),
(35, 'TS005', 'Tas Sling Bag', 'Tas sling bag dengan model yang simpel dan nyaman dipakai.', 200000, 18, 'Tas'),
(36, 'TS006', 'Tas Crossbody', 'Tas crossbody dengan bahan yang berkualitas dan model yang trendy.', 350000, 10, 'Tas'),
(37, 'TS007', 'Tas Hobo', 'Tas hobo dengan desain yang chic dan simpel.', 300000, 12, 'Tas'),
(38, 'TS008', 'Tas Travel', 'Tas travel dengan kapasitas besar dan bahan yang tahan lama.', 500000, 8, 'Tas'),
(39, 'TS009', 'Tas Drawstring', 'Tas drawstring dengan desain yang simpel dan nyaman dipakai.', 200000, 20, 'Tas'),
(40, 'TS010', 'Tas Mini', 'Tas mini dengan model yang chic dan simpel.', 100000, 30, 'Tas'),
(42, 'TS011', 'Tas Kantor BLUE', 'Tas Kantor yang sangat nyaman digunakan', 123000, 12, 'Tas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
