-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2022 lúc 06:10 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dirtycoins`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` double(10,3) NOT NULL,
  `item_tag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`item_id`, `item_name`, `item_price`, `item_tag`, `item_image`, `item_register`) VALUES
(1, 'DirtyCoins Wavy Logo T-Shirt - White', 350.000, 'Best Seller', './assets/images/products/1.jpg', NULL),
(2, 'DirtyCoins Alphabet T-Shirt - Multicolor', 450.000, 'Best Seller', './assets/images/products/2.jpg', '2022-04-02 14:16:03'),
(3, 'DirtyCoins On The Wall Hoodie – Olive/ White', 600.000, 'Best Seller', './assets/images/products/3.jpg', '2022-04-02 14:17:27'),
(4, 'DirtyCoins Spray Logo T-Shirt -White', 390.000, 'Best Seller', './assets/images/products/4.jpg', '2022-04-02 14:17:27'),
(5, 'DICO CHECKERBOARD KNIT CARDIGAN - GREY', 990.000, 'Best Seller', './assets/images/products/5.jpg', '2022-04-02 14:20:27'),
(6, 'DIRTYCOINS ON THE WALL HOODIE – WHITE/ BLACK ', 600.000, 'Best Seller', './assets/images/products/6.jpg', '2022-04-02 14:22:23'),
(7, 'DIRTYCOINS SPRAY LOGO T-SHIRT - BLACK', 390.000, 'New arrival', './assets/images/newarrivals/new1.jpg', '2022-04-02 16:35:52'),
(8, 'DIRTYCOINS SPRAY LOGO T-SHIRT - WHITE', 390.000, 'New arrival', './assets/images/newarrivals/new2.jpg', '2022-04-02 16:39:30'),
(9, 'DIRTYCOINS CORDUROY 5 PANELS CAP - BLUE', 350.000, 'New arrival', './assets/images/newarrivals/new3.jpg', '2022-04-02 16:39:30'),
(10, 'DIRTYCOINS 5 PANELS CAP - BLACK', 320.000, 'New arrival', './assets/images/newarrivals/new4.jpg', '2022-04-02 16:41:50'),
(11, 'DIRTYCOINS 5 PANELS CAP - PINE GREEN', 320.000, 'New arrival', './assets/images/newarrivals/new5.jpg', '2022-04-02 16:41:50'),
(12, 'DIRTYCOINS BIG LOGO JACKET - PURPLE', 650.000, 'New arrival', './assets/images/newarrivals/new6.jpg', '2022-04-02 16:41:50'),
(13, 'DirtyCoins Striped Polo Shirt - Brown', 400.000, 'Best Seller', './assets/images/recommend/rec1.jpg', '2022-04-02 17:02:53'),
(14, 'DirtyCoins Long Sleeve Striped Polo Shirt - Purple / Black', 490.000, 'Best Seller', './assets/images/recommend/rec2.jpg', '2022-04-02 17:05:05'),
(15, 'Dico Love Flannel Jacket - Green', 750.000, 'New arrival', './assets/images/recommend/rec3.jpg', '2022-04-02 17:06:05'),
(16, 'DirtyCoins Linen Graffiti Shirt - Olive', 490.000, 'Best Seller', './assets/images/recommend/rec4.jpg', '2022-04-02 17:06:05'),
(17, 'DirtyCoins Striped Polo Shirt - Sky Blue', 400.000, 'New arrival', './assets/images/recommend/rec5.jpg', '2022-04-02 17:06:05'),
(18, 'DirtyCoins Monogram Jersey', 490.000, 'New arrival', './assets/images/recommend/rec6.jpg', '2022-04-02 17:06:05'),
(19, 'DirtyCoins Striped Polo Shirt - Black', 400.000, 'Pre Order', './assets/images/recommend/rec7.jpg', '2022-04-02 17:10:50'),
(20, 'Skeleton Bowling Shirt', 400.000, 'New arrival', './assets/images/recommend/rec8.jpg', '2022-04-02 17:12:07'),
(21, 'DirtyCoins Patchwork Bandana Shirt - Mars Red', 400.000, 'New arrival', './assets/images/recommend/rec9.jpg', '2022-04-02 17:12:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
