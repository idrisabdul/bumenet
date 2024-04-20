-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 06:19 AM
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
-- Table structure for table `module_course`
--

CREATE TABLE `module_course` (
  `module_course_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `module_name` varchar(256) NOT NULL,
  `duration` int(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module_course`
--

INSERT INTO `module_course` (`module_course_id`, `course_id`, `module_name`, `duration`, `status`) VALUES
(1, 17, 'module_course_id', 5, 0),
(2, 18, 'add_next_module', 5, 0),
(3, 19, 'Apa itu QA', 5, 0),
(4, 20, '<?= $service->service_name ?>', 5, 0),
(5, 21, 'test', 5, 0),
(6, 21, 'test 2', 5, 0),
(7, 21, '', 5, 0),
(8, 21, '', 5, 0),
(9, 21, '', 5, 0),
(10, 21, '', 5, 0),
(11, 21, 'ferda', 5, 0),
(12, 21, '', 5, 0),
(13, 21, '', 5, 0),
(14, 21, '', 5, 0),
(15, 21, 'im', 5, 0),
(16, 21, '', 5, 0),
(17, 21, 'test 3', 5, 0),
(18, 21, 'test 4', 5, 0),
(19, 22, 'test 5', 5, 1),
(20, 22, 'test module 1 - 5', 5, 1),
(21, 22, 'test module 2 - 5', 5, 1),
(22, 22, '', 5, 1),
(23, 23, 'Module 1 - Course 6', 8, 1),
(24, 23, 'Module 2 - Course 6', 12, 1),
(25, 23, 'Module 3 - Course 6', 18, 1),
(26, 23, 'Module 4 - Course 6', 6, 1);

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
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`) VALUES
(1, 'DevOps'),
(2, 'Backend'),
(3, 'Fullstack Web Developer'),
(4, 'Mobile Developer'),
(5, 'QA Tester');

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
  `discount` int(11) NOT NULL,
  `img_service` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `product_categories_id`, `service_created_by`, `service_description`, `service_price`, `discount`, `img_service`) VALUES
(6, 'Software Architecture', 1, 2, 'Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.', 20000, 0, 'gitlab1.jpeg'),
(7, 'Pengenalan CI/CD', 1, 1, 'Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.', 400000, 0, 'Haproxy-logo.png'),
(8, 'Pengenalan DevOps', 1, 1, 'Kelas belajar online \"Pengenalan DevOps\" dirancang sebagai\n                                    panduan komprehensif yang memperkenalkan peserta pada konsep dan praktik terkini\n                                    dalam melakukan proses deployment yang efisien. Dalam kelas ini, peserta akan\n                                    menjelajahi dunia\n                                    DevOps, memahami cara kerja dan peran penting dalam pengembangan sebuah\n                                    software.', 0, 0, 'devops-process-espincorp-2358732233.png'),
(17, 'TEST', 2, 1, 'module_course_id', 0, 0, 'pp.jpg'),
(18, 'asda', 3, 1, 'add_next_module', 0, 0, '1705169893462.jpg'),
(19, 'Pengenalan QA Tester', 5, 1, 'Setiap perusahaan pasti menginginkan pelanggan puas dengan produk atau layanan yang mereka tawarkan. Untuk menjamin kepuasan tersebut, biasanya terdapat porses pengujian atau pengecekan yang dilakukan untuk memastikan bahwa produk yang akan dipasarkan memiliki kualitas yang baik dan layak digunakan oleh konsumen.\n\n\nBiasanya, seuatu produk baik barang atau jasa tidak bisa sempurna saat pertama kali diciptakan. Akan ada error, bug, freeze, atau kesalahan lainnya yang perlu diperbaiki. Itulah mengapa perlu adanya pengujian atau pengecakan agar produk tersebut dapat diperbaiki, dibuat ulang, atua diubah sampai mencapai kualitas terbaiknya. Nah, orang yang bertugas melakukan hal tersebut adalah seorang Quality Assurance (QA).\n\n\nPoisisi QA ini dibutuhkan hampir diselubuh perusahaan jenis apapun, lho! Tentunya, posisinya sangat strategis karena berhubungan langsung dengan kualitas produk yang dihasilkan perusahaan. Kamu tertarik untuk berkarier di bidang ini? Ikut kelas ini jadi jalan cepatnya!\n\n\nDikelas ini kamu akan belajar mulai dari konsep QA, skill yang dibutuhkan, QA dan API testing, hingga website testing, hingga mobile testing. Kamu akan belajar bersama seorang QA Engineer berpengalaman, yaitu Iman Ishafahani.', 100000, 0, 'berita-383-memahami-peran-qa-tester-20201230-105658.jpg'),
(20, 'test', 1, 1, '<?= $service->service_name ?>', 0, 0, 'Diskusi_2_-_Page_1.jpeg'),
(21, 'test', 2, 2, 'test', 0, 0, 'Diskusi_2_-_Page_2.jpeg'),
(22, 'test 5', 2, 1, 'test 5', 0, 0, '17051698934621.jpg'),
(23, 'Course 6', 5, 1, 'Setiap perusahaan pasti menginginkan pelanggan puas dengan produk atau layanan yang mereka tawarkan. Untuk menjamin kepuasan tersebut, biasanya terdapat porses pengujian atau pengecekan yang dilakukan untuk memastikan bahwa produk yang akan dipasarkan memiliki kualitas yang baik dan layak digunakan oleh konsumen.\n\n\nBiasanya, seuatu produk baik barang atau jasa tidak bisa sempurna saat pertama kali diciptakan. Akan ada error, bug, freeze, atau kesalahan lainnya yang perlu diperbaiki. Itulah mengapa perlu adanya pengujian atau pengecakan agar produk tersebut dapat diperbaiki, dibuat ulang, atua diubah sampai mencapai kualitas terbaiknya. Nah, orang yang bertugas melakukan hal tersebut adalah seorang Quality Assurance (QA).\n\n\nPoisisi QA ini dibutuhkan hampir diselubuh perusahaan jenis apapun, lho! Tentunya, posisinya sangat strategis karena berhubungan langsung dengan kualitas produk yang dihasilkan perusahaan. Kamu tertarik untuk berkarier di bidang ini? Ikut kelas ini jadi jalan cepatnya!\n\n\nDikelas ini kamu akan belajar mulai dari konsep QA, skill yang dibutuhkan, QA dan API testing, hingga website testing, hingga mobile testing. Kamu akan belajar bersama seorang QA Engineer berpengalaman, yaitu Iman Ishafahani.', 0, 0, 'unknown.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `submodule_course`
--

CREATE TABLE `submodule_course` (
  `submodule_course_id` int(11) NOT NULL,
  `module_course_id` int(11) NOT NULL,
  `submodule_name` varchar(256) NOT NULL,
  `submodule_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submodule_course`
--

INSERT INTO `submodule_course` (`submodule_course_id`, `module_course_id`, `submodule_name`, `submodule_content`) VALUES
(1, 1, 'module_course_id', 'module_course_id'),
(2, 1, 'module_course_id', 'module_course_id'),
(3, 1, 'module_course_id', 'module_course_id'),
(4, 1, 'module_course_id', 'module_course_id'),
(5, 2, 'add_next_module', 'add_next_module'),
(6, 2, 'add_next_module', 'add_next_module'),
(7, 3, 'QA Adalah', 'QA Adalah'),
(8, 4, '<?= $service->service_name ?>', '<?= $service->service_name ?>'),
(9, 5, 'test', 'test'),
(10, 6, 'test 2', 'test 2'),
(11, 6, 'test 2', 'test 2'),
(12, 7, '', ''),
(13, 8, '', ''),
(14, 9, '', ''),
(15, 10, '', ''),
(16, 11, '', ''),
(17, 12, '', ''),
(18, 13, 's', ''),
(19, 14, '', ''),
(20, 14, 'ss', ''),
(21, 15, '', ''),
(22, 16, 'im2', ''),
(23, 16, '', ''),
(24, 17, 'test 3', 'test 3'),
(25, 18, 'test 4', 'test 4'),
(26, 18, 'test 4', 'test 4'),
(27, 19, 'test 5', 'test 5'),
(28, 19, 'test 5', 'test 5'),
(29, 19, 'test 5', 'test 5'),
(30, 20, 'test module 1 - 5', 'test module 1 - 5'),
(31, 20, 'test module 1 - 5', 'test module 1 - 5'),
(32, 20, 'test module 1 - 5', 'test module 1 - 5'),
(33, 21, 'test module 2 - 5', 'test module 2 - 5'),
(34, 21, 'test module 2 - 5', 'test module 2 - 5'),
(35, 21, 'test module 2 - 5', 'test module 2 - 5'),
(36, 22, '', ''),
(37, 23, 'SubModule 1 - Course 6', 'SubModule 1 - Course 6'),
(38, 23, 'SubModule 2 - Course 6', 'SubModule 2 - Course 6'),
(39, 23, 'SubModule 3 - Course 6', 'SubModule 3 - Course 6'),
(40, 24, 'Submodule 1 - Module 2 - Course 6', 'Submodule 1 - Module 2 - Course 6'),
(41, 24, 'Submodule 2 - Module 2 - Course 6', 'Submodule 2 - Module 2 - Course 6'),
(42, 25, 'Submodule 1 - Module 2 - Course 6', 'Submodule 1 - Module 2 - Course 6'),
(43, 25, 'Submodule 2 - Module 2 - Course 6', 'Submodule 2 - Module 2 - Course 6'),
(44, 25, 'Submodule 3 - Module 2 - Course 6', 'Submodule 3 - Module 2 - Course 6'),
(45, 25, 'Submodule 4 - Module 2 - Course 6', 'Submodule 4 - Module 2 - Course 6'),
(46, 26, 'Submodule 1 - Module 4 - Course 6', 'Submodule 1 - Module 4 - Course 6'),
(47, 26, 'Submodule 2 - Module 4 - Course 6', 'Submodule 2 - Module 4 - Course 6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(512) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `about_person` varchar(256) NOT NULL,
  `current_job` varchar(512) NOT NULL,
  `current_company` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nickname`, `username`, `password`, `address`, `role`, `email`, `phone_number`, `about_person`, `current_job`, `current_company`) VALUES
(1, 'Idris Abdul Azis', 'idrisaziz52', '', 'jogja', 1, 'idrisaziz52@gmail.com', 62896432, 'Berpengalaman lebih dari 2 hari dibidang IT. Berbagai perusahaan dan client belum dikerjakan hingga kini saatnya untuk membagikan ilmu dan pengalaman saya kepada orang lain.', 'DevOps Engineer', 'PT Telkomsigma'),
(2, 'Ahmad Containarizing', 'ahmad_conter', 'ahmadconter', 'jogja', 2, 'ahmadconter@gmail.com', 6288, 'Berpengalaman lebih dari 7 tahun dibidang Pemrograman. Berbagai perusahaan dan client sudah dikerjakan hingga kini saatnya untuk membagikan ilmu dan pengalaman saya kepada orang lain.', 'Fullstack PHP Developer', 'PT Mencari Cinta Sejati');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module_course`
--
ALTER TABLE `module_course`
  ADD PRIMARY KEY (`module_course_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `submodule_course`
--
ALTER TABLE `submodule_course`
  ADD PRIMARY KEY (`submodule_course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `module_course`
--
ALTER TABLE `module_course`
  MODIFY `module_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `submodule_course`
--
ALTER TABLE `submodule_course`
  MODIFY `submodule_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
