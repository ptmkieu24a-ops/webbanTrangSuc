-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 10:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ban_trang_suc`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `noi_dung_ngan` text DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `tieu_de`, `slug`, `noi_dung_ngan`, `noi_dung`, `hinh_anh`, `created_at`) VALUES
(1, 'eee', 'rrr', 'ddd', 'fff', 'Screenshot 2025-01-07 220432.png', '2025-01-08 10:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten`, `slug`, `mo_ta`, `hinh_anh`, `created_at`) VALUES
(1, 'Trang Sức Nữ', 'trang-suc-nu', 'Danh mục trang sức dành cho nữ.', 'assets/images/trang_suc_nu.jpg', '2025-01-07 08:30:24'),
(2, 'Trang Sức Nam', 'trang-suc-nam', 'Danh mục trang sức dành cho nam.', 'assets/images/trang_suc_nam.jpg', '2025-01-07 08:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `trang_thai` varchar(50) DEFAULT 'Đang xử lý',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(255) NOT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_dang_nhap`, `mat_khau`, `email`, `created_at`) VALUES
(1, 'asd', '0', '12345@gmail.com', '2025-01-07 10:35:05'),
(2, 'fff', '0', 'fff@gamil.com', '2025-01-07 12:20:00'),
(6, 'toila', '0', 'chautriben2592005@gmail.com', '2025-01-09 03:32:29'),
(10, 'toi la ai vay', '0', 'fffffff@gmail.com', '2025-01-09 06:25:32'),
(11, 'chau tri ben la', '0', 'tri2710@gmail.com', '2025-01-09 06:29:33'),
(12, 'chau tri ben', '0', 'tribenchau2710@gmail.com', '2025-01-09 06:57:40'),
(14, 'chau tri ben la ai', '0', 'chautriben2222592005@gmail.com', '2025-01-09 06:59:12'),
(15, 'chau tri ben rr', '0', 'chautriben2777592005@gmail.com', '2025-01-09 07:02:18'),
(16, 'chau tri ben ttt', '$2y$10$lGtrxFeUMaEz.gxQfaJnG.CeZe7tLVNqqSytrs5DiEfUP35ubAsA2', 'chautriben2592005333@gmail.com', '2025-01-09 07:07:37'),
(18, 'toilaaivat', '$2y$10$eZn4y8iIGl0d83aU9j3wLO59VaZgFe5kp7M8IeZ6oYFhPHIowJKhK', 'chautriben5@gmail.com', '2025-01-09 07:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `mo_ta_ngan` text DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `gia_goc` decimal(10,2) NOT NULL,
  `gia_ban` decimal(10,2) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `danh_muc_id` int(11) DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `slug`, `mo_ta_ngan`, `mo_ta`, `gia_goc`, `gia_ban`, `so_luong`, `trang_thai`, `danh_muc_id`, `hinh_anh`, `created_at`) VALUES
(22, 'Nhẫn Vàng 24K', 'nhan-vang-24k', 'Nhẫn vàng 24K sang trọng.', 'Nhẫn vàng 24K được chế tác tinh xảo, mang lại vẻ đẹp quý phái cho người đeo.', 5000000.00, 4500000.00, 10, 1, 1, 'nhan_vang_24k.jpg', '2025-01-07 08:30:47'),
(23, 'Dây Chuyền Bạc', 'day-chuyen-bac', 'Dây chuyền bạc thanh lịch.', 'Dây chuyền bạc với thiết kế đơn giản nhưng tinh tế, phù hợp với nhiều phong cách.', 2000000.00, 1800000.00, 15, 1, 1, 'day_chuyen_bac.jpg', '2025-01-07 08:30:47'),
(24, 'Bông Tai Ngọc Trai', 'bong-tai-ngoc-trai', 'Bông tai ngọc trai tự nhiên.', 'Bông tai ngọc trai tự nhiên mang lại vẻ đẹp dịu dàng và thanh lịch.', 3000000.00, 2700000.00, 20, 1, 1, 'bong_tai_ngoc_trai.jpg', '2025-01-07 08:30:47'),
(25, 'Vòng Tay Đá Quý', 'vong-tay-da-quy', 'Vòng tay đá quý phong thủy.', 'Vòng tay đá quý được chế tác từ đá tự nhiên, mang lại may mắn và tài lộc.', 4000000.00, 3600000.00, 5, 1, 1, 'vong_tay_da_quy.jpg', '2025-01-07 08:30:47'),
(26, 'Mặt Dây Chuyền Kim Cương', 'mat-day-chuyen-kim-cuong', 'Mặt dây chuyền kim cương lấp lánh.', 'Mặt dây chuyền kim cương với thiết kế độc đáo, tôn lên vẻ đẹp của người phụ nữ.', 10000000.00, 9500000.00, 8, 1, 1, 'mat_day_chuyen_kim_cuong.jpg', '2025-01-07 08:30:47'),
(27, 'Vòng Cổ Ngọc Bích', 'vong-co-ngoc-bich', 'Vòng cổ ngọc bích sang trọng.', 'Vòng cổ ngọc bích được chế tác tinh xảo, mang lại ...\r\n', 6500000.00, 7000000.00, 1, 1, 1, 'vong-co-ngoc-bich.jpg', '2025-01-08 09:15:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_muc_id` (`danh_muc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `nguoi_dung` (`id`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
