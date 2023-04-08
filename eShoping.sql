-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 08, 2023 at 07:19 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eShoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_produk` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_produk`, `name`, `price`, `description`, `image`) VALUES
(5, 'Tas 1', 1000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.', 'assets/images/64304bd3be75c.jpg'),
(6, 'Tas 2', 2100000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.', 'assets/images/6431a0d478f80.png'),
(7, 'Tas 3', 3000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.', 'assets/images/64304c830bb8f.jpg'),
(8, 'Tas 4', 2500000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.', 'assets/images/64304c9c3e313.jpg'),
(9, 'Tas 5', 1400000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.', 'assets/images/64304cbcbe1e9.jpg'),
(10, 'Tas 6', 2300000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.', 'assets/images/64304cf44208d.jpg'),
(11, 'Tas 7', 4000000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.', 'assets/images/64304d187401b.jpg'),
(12, 'Tas 8', 2300000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.', 'assets/images/64304d472bd9f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `buyer` json NOT NULL COMMENT 'terdiri dari email,nama,nomorhp,alalamat',
  `produk` json NOT NULL COMMENT 'terdiri dari nama produk, harga, deskirpsi,gambarnya',
  `grand_total` int(100) NOT NULL,
  `metode_pembayaran` enum('bank','shopeepay','gopay','dana') NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `buyer`, `produk`, `grand_total`, `metode_pembayaran`, `bukti_pembayaran`, `status`, `created_at`) VALUES
(3, '{\"name\": \"coba 1\", \"email\": \"coba@gmail.com\", \"address\": \"Karangjati Ungaran Barat Kabupaten Semarang\", \"phone_number\": \"123456\"}', '{\"name\": \"Tas 2\", \"image\": \"assets/images/6431a0d478f80.png\", \"price\": \"2100000\", \"description\": \"Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.\"}', 2331000, 'shopeepay', 'assets/images/bukti/6431af7ae92fd.png', 1, '2023-04-08 11:16:26'),
(4, '{\"name\": \"Irwan Irwan\", \"email\": \"irwansyah@gmail.com\", \"address\": \"Bandung Indonesia\", \"phone_number\": \"082783819273\"}', '{\"name\": \"Tas 3\", \"image\": \"assets/images/64304c830bb8f.jpg\", \"price\": \"3000000\", \"description\": \"Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe amet molestias nesciunt iste voluptates soluta sapiente cum! Tempora recusandae, suscipit corporis fugit qui corrupti nam odit velit.\"}', 3330000, 'gopay', 'assets/images/bukti/6431bd67bbee5.jpeg', 0, '2023-04-08 12:15:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
