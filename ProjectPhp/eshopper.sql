-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2023 lúc 04:45 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eshopper`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `image`, `userid`) VALUES
(1, 'Sting dâu', 15000, 'images/severimg/1cba6ec57f7f4ab6c92a8a5a94ef5092.jpg', 1),
(2, 'Cocacola', 15000, 'images/severimg/6-lon-nuoc-ngot-coca-cola-320ml-202304131108497884.jpg', 1),
(3, 'Sting vàng', 15000, 'images/severimg/losupply-quan-tan-phu-quan-tan-phu-ho-chi-minh-1618467447167540212-nuoc-tang-luc-sting-vang-320ml-0-1631366947 (1).jpg', 1),
(4, 'Fanta', 15000, 'images/severimg/8d7ae03211d0cdc7d43726254b61ab78.jpg', 1),
(5, 'Pepsi', 15000, 'images/severimg/nuoc-ngot-pepsi-cola-lon-320ml-202303151108006292.jpg', 1),
(6, 'Mirinda', 15000, 'images/severimg/nuoc-giai-khat-mirinda-cam-lon-cao-320ml.jpg', 1),
(7, 'Lipovitan', 15000, 'images/severimg/80e5b2ed197c221e7fb3a809c732a13d.jpg', 3),
(8, 'Soda Schweppes', 15000, 'images/severimg/soda-shweppes-330ml-lon-2-org.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `name`, `avatar`) VALUES
(1, 'cong@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đoàn Văn Công', NULL),
(2, 'cong@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đoàn Văn Công', NULL),
(3, 'vancong@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đoàn Văn Công', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
