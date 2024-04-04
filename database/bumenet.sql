-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 04:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumenet`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `picture` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `product_desc` text NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_status` int(11) NOT NULL COMMENT '1 : ada\r\n2 : terjual\r\n3 : segera',
  `stock` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `picture`, `product_desc`, `product_category`, `product_status`, `stock`, `discount_price`, `price`, `date_time`) VALUES
(5, 'Rack Server 8U', 'h9qDy-wir5508s-pic01.jpg', 'Product Category 	: 19 inch Cabinet Rack\r\nProduct Series 	: Wallmount Rack Single Glass Door\r\nProduct Name 	: WIR4508S\r\nDimension (DxWxH) 	: 450 x 600 x 455 mm\r\nWeight 	: ± 20kg', 0, 1, 12, 20, '1000000', '2022-07-02'),
(6, 'Switch Intel Express 220T', '1656161738724.jpg', '\r\nEE220TX24\r\nSpesifikasi:\r\n24 Port 10/100\r\n\r\nKelengkapan:\r\nUnit Switch Intel Express 220T\r\nAdaptor\r\nGarasnsi 1 Bulan\r\nFree Delivery Jakarta', 0, 1, 1, 20, '850000', '2022-07-02'),
(7, 'Cisco AS5300 series AS5350', '1656161458483.jpg', 'Spesifikasi:\r\n4 Port Console 4PRI\r\n2 Port Serial\r\n1 Port Fe 0\r\n1 Port Fe 1\r\n1 Port Con\r\n1 Port Aux\r\n\r\nKelengkapan:\r\nUnit Cisco AS5300 series\r\nAdaptor\r\nGaransi 1 Bulan\r\nFree Delivery Jakarta\r\n\r\nHarga Rp.5.500.000', 0, 1, 1, 5, '5500000', '2022-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_categories_id` int(11) NOT NULL,
  `category_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(128) NOT NULL,
  `product_categories_id` int(11) NOT NULL,
  `service_created_by` int(11) NOT NULL,
  `service_description` varchar(4096) NOT NULL,
  `service_price` float NOT NULL,
  `img_service` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `product_categories_id`, `service_created_by`, `service_description`, `service_price`, `img_service`) VALUES
(1, 'test', 1, 1, 'test', 200000, 'Screenshot_2024-02-26_1022442.png'),
(2, 'Implementasi CI/CD', 2, 1, '- Jenkins\r\n- Docker\r\n- Golang', 3000000, 'Screenshot_2024-02-29_145057.png'),
(3, 'Install Monitoring Server', 4, 2, 'Menggunakan Grafana Prometheus, dan Node Exporter', 400000, 'grafana-kubernetes.jpg'),
(4, 'Jasa Instalasi Gitlab', 1, 2, 'Gitlab Repository code di server anda', 450000, 'gitlab.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_categories_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_categories_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
