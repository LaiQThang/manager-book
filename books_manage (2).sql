-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2023 lúc 07:05 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `books_manage`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Áo áo', NULL, '2023-06-01 02:32:39'),
(3, 'Balo', '2023-05-31 08:32:13', '2023-05-31 08:32:13'),
(4, 'Áo dài chân', '2023-06-01 02:39:54', '2023-06-01 02:39:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classifies`
--

CREATE TABLE `classifies` (
  `classify_id` bigint(20) UNSIGNED NOT NULL,
  `classify_name` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `classifies`
--

INSERT INTO `classifies` (`classify_id`, `classify_name`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Áo hoodie', '2', '2023-05-31 08:18:10', '2023-05-31 08:18:10'),
(4, 'Áo dài chân tay', '4', '2023-06-01 01:44:36', '2023-06-01 02:40:52'),
(5, 'Áo áo', '3', '2023-06-01 02:33:12', '2023-06-01 02:33:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `demoooo`
--

CREATE TABLE `demoooo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_18_104915_create_permissions_table', 2),
(4, '2023_05_31_105958_create_categories_table', 3),
(5, '2023_05_31_145115_create_classifies_table', 4),
(6, '2023_06_01_094956_create_products_table', 5),
(7, '2023_06_01_095409_create_product_infors_table', 5),
(8, '2023_06_01_095418_create_product_images_table', 5),
(9, '2023_06_07_132049_create_permission_lists_table', 6),
(10, '2023_06_07_135144_create_permission_items_table', 7),
(11, '2023_06_08_134743_demo', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` varchar(255) NOT NULL,
  `permission_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `permission_id`, `permission_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'Người dùng', '2023-05-18 03:51:24', '2023-06-08 02:15:58'),
(2, '2', 'Quản trị viên', '2023-05-18 03:51:24', '2023-06-08 01:54:45'),
(4, '4', 'Người kiểm tra', '2023-05-31 02:49:05', '2023-06-07 09:33:44'),
(5, '5', 'Quản lí đơn hàng', '2023-06-08 02:19:30', '2023-06-08 09:56:54'),
(14, '111', 'Quản trị viên 2', '2023-06-27 09:01:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_items`
--

CREATE TABLE `permission_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` varchar(255) NOT NULL,
  `permission_list_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_items`
--

INSERT INTO `permission_items` (`id`, `permission_id`, `permission_list_id`, `created_at`, `updated_at`) VALUES
(20, '4', '7', '2023-06-07 09:33:44', '2023-06-07 09:33:44'),
(26, '2', '2', '2023-06-08 01:54:45', '2023-06-08 01:54:45'),
(27, '2', '3', '2023-06-08 01:54:45', '2023-06-08 01:54:45'),
(28, '2', '4', '2023-06-08 01:54:45', '2023-06-08 01:54:45'),
(29, '2', '5', '2023-06-08 01:54:45', '2023-06-08 01:54:45'),
(30, '2', '6', '2023-06-08 01:54:45', '2023-06-08 01:54:45'),
(31, '2', '7', '2023-06-08 01:54:45', '2023-06-08 01:54:45'),
(32, '2', '8', '2023-06-08 01:54:45', '2023-06-08 01:54:45'),
(40, '1', '5', '2023-06-08 02:15:58', '2023-06-08 02:15:58'),
(41, '1', '7', '2023-06-08 02:15:58', '2023-06-08 02:15:58'),
(43, '5', '6', '2023-06-08 09:56:54', '2023-06-08 09:56:54'),
(44, '5', '7', '2023-06-08 09:56:54', '2023-06-08 09:56:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_lists`
--

CREATE TABLE `permission_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(255) NOT NULL,
  `permission_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_lists`
--

INSERT INTO `permission_lists` (`id`, `permission_name`, `permission_url`, `created_at`, `updated_at`) VALUES
(2, 'Quản trị hệ thống', 'admin', NULL, NULL),
(3, 'Quản lí người dùng', 'admin/users', NULL, NULL),
(4, 'Quản lí phân quyền', 'admin/permission', NULL, NULL),
(5, 'Quản lí danh mục sản phẩm', 'admin/category', NULL, NULL),
(6, 'Quản lí sản phẩm', 'admin/product', NULL, NULL),
(7, 'Quản lí đơn hàng', 'admin/cart', NULL, NULL),
(8, 'Quản lí giao diện', 'admin/display', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_des` varchar(255) NOT NULL,
  `classify_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_price`, `product_des`, `classify_id`, `created_at`, `updated_at`) VALUES
(1, 'Áo hoodie thêu chữ', 'MB00101', 450000, 'Thông tin về áo', '2', '2023-06-01 02:57:22', NULL),
(3, 'Áo dài', 'AC1111', 11111, 'aaaaaaaaaaaa', '4', '2023-06-07 04:15:43', '2023-06-07 04:15:43'),
(4, 'Áo dài tayy', 'AC111D', 11111, 'aaaaaaaaaaaaaaa', '4', '2023-06-07 04:27:15', '2023-06-08 07:35:07'),
(5, 'Áo dài', 'AC111Dav', 11111, 'aaaaaaa', '2', '2023-06-07 04:34:19', '2023-06-07 04:34:19'),
(6, 'Quần short', 'QS1001', 100000, 'Đây là quần short dài chân tay', '4', '2023-06-08 09:39:26', '2023-06-08 09:39:26'),
(7, 'Áo nỉ', 'QACCCC', 100000, 'Đây là áo nỉ', '5', '2023-06-08 09:43:11', '2023-06-08 09:43:11'),
(8, 'Hoodie High School', 'HD0001', 100000, '<p>&Aacute;o hoodie high school</p>', '2', '2023-06-08 09:45:45', '2023-06-15 09:19:27'),
(9, 'Ao phao mua dong2', 'A12345', 100000, '<p>thong tin sanr pham</p>', '4', '2023-10-31 01:29:59', '2023-10-31 01:30:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_img`, `product_id`, `created_at`, `updated_at`) VALUES
(2, '1686112459.jpg', '5', '2023-06-07 04:34:19', '2023-06-07 04:34:19'),
(6, '1686215819.png', '4', '2023-06-08 09:17:00', '2023-06-08 09:17:00'),
(7, '1686215820.png', '4', '2023-06-08 09:17:00', '2023-06-08 09:17:00'),
(8, '1686215820.png', '4', '2023-06-08 09:17:00', '2023-06-08 09:17:00'),
(9, '1686215820.jpg', '4', '2023-06-08 09:17:00', '2023-06-08 09:17:00'),
(10, '1686217166.jpg', '6', '2023-06-08 09:39:26', '2023-06-08 09:39:26'),
(11, '1686217166.jpg', '6', '2023-06-08 09:39:26', '2023-06-08 09:39:26'),
(12, '16862173910.jpg', '7', '2023-06-08 09:43:11', '2023-06-08 09:43:11'),
(13, '16862173911.jpg', '7', '2023-06-08 09:43:11', '2023-06-08 09:43:11'),
(14, NULL, '7', '2023-06-08 09:43:11', '2023-06-08 09:43:11'),
(15, NULL, '7', '2023-06-08 09:43:11', '2023-06-08 09:43:11'),
(31, '16872457610.jpg', '8', '2023-06-20 07:22:41', '2023-06-20 07:22:41'),
(32, '16872457611.jpg', '8', '2023-06-20 07:22:41', '2023-06-20 07:22:41'),
(33, '16872457612.jpg', '8', '2023-06-20 07:22:41', '2023-06-20 07:22:41'),
(34, NULL, '8', '2023-06-20 07:22:41', '2023-06-20 07:22:41'),
(35, '16987157990.png', '9', '2023-10-31 01:30:00', '2023-10-31 01:30:00'),
(36, '16987158001.png', '9', '2023-10-31 01:30:00', '2023-10-31 01:30:00'),
(37, '16987158002.png', '9', '2023-10-31 01:30:00', '2023-10-31 01:30:00'),
(38, NULL, '9', '2023-10-31 01:30:00', '2023-10-31 01:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_infors`
--

CREATE TABLE `product_infors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_infors`
--

INSERT INTO `product_infors` (`id`, `product_quantity`, `product_size`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 12, 'M', '5', '2023-06-07 04:34:19', '2023-06-07 04:34:19', NULL),
(18, 222, 'M', '4', '2023-06-08 09:16:59', '2023-06-08 09:16:59', NULL),
(19, 222, 'L', '4', '2023-06-08 09:16:59', '2023-06-08 09:16:59', NULL),
(20, 222, 'S', '4', '2023-06-08 09:16:59', '2023-06-08 09:16:59', NULL),
(21, 222, 'XL', '4', '2023-06-08 09:16:59', '2023-06-08 09:16:59', NULL),
(22, 22, 'S', '6', '2023-06-08 09:39:26', '2023-06-08 09:39:26', NULL),
(23, 11, 'M', '6', '2023-06-08 09:39:26', '2023-06-08 09:39:26', NULL),
(24, 22, 'L', '6', '2023-06-08 09:39:26', '2023-06-08 09:39:26', NULL),
(25, 0, 'XL', '6', '2023-06-08 09:39:26', '2023-06-08 09:39:26', NULL),
(26, 1, 'S', '7', '2023-06-08 09:43:11', '2023-06-08 09:43:11', NULL),
(27, 1, 'M', '7', '2023-06-08 09:43:11', '2023-06-08 09:43:11', NULL),
(28, 0, 'L', '7', '2023-06-08 09:43:11', '2023-06-08 09:43:11', NULL),
(29, 0, 'XL', '7', '2023-06-08 09:43:11', '2023-06-08 09:43:11', NULL),
(66, 11, 'S', '8', '2023-06-20 07:22:41', '2023-06-20 07:22:41', NULL),
(67, 11, 'M', '8', '2023-06-20 07:22:41', '2023-06-20 07:22:41', NULL),
(68, 11, 'L', '8', '2023-06-20 07:22:41', '2023-06-20 07:22:41', NULL),
(69, 11, 'XL', '8', '2023-06-20 07:22:41', '2023-06-20 07:22:41', NULL),
(74, 11, 'S', '9', '2023-10-31 01:30:43', '2023-10-31 01:30:43', NULL),
(75, 11, 'M', '9', '2023-10-31 01:30:43', '2023-10-31 01:30:43', NULL),
(76, 11, 'L', '9', '2023-10-31 01:30:43', '2023-10-31 01:30:43', NULL),
(77, 11, 'XL', '9', '2023-10-31 01:30:43', '2023-10-31 01:30:43', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `address`, `phone`, `permission`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Lại Quang Thắng', 'thanglai038@gmail.com', '123456', NULL, NULL, '5', '1686218319.jpg', 't0iHyH68nzOP2k5UBRj1mf3JY39SR4mtfsl9t22V', '2023-05-24 03:53:29', '2023-06-08 09:58:39'),
(12, 'Ha Sao Mai', 'mai@gmail.com', '$2y$10$iTKsv1wjnlOprGFj6hUXWeGm/MsGcpKsVMfoUaI8aqahFLxnU3vxq', NULL, NULL, '2', '1698716257.jpg', 'W3BIMqS84S129ZtPQUK2O82SexeRvCGWZlnMW7rM', '2023-05-24 06:28:36', '2023-10-31 01:37:37'),
(13, 'Admin', 'admin1324@gmail.com', '$2y$10$H7leas19GI2xsvoaucC5puuDdRqXvV24Hdm.4lmIsl/VE8Rw92f6m', NULL, NULL, '1', NULL, 'JYq302GCNMvKEblQFCEULqZKGAu5etcayebGPIjX', '2023-05-24 08:08:27', NULL),
(27, 'Nguyen van d', 'helloword@gmail.com', '$2y$10$SZghgbUBhCCji2ryFdUoaeybBG.R11HsLN0hFygtJKoYtpPZ/hrN2', NULL, NULL, '1', '1684995504.jpg', '7QFpNaB9plXefi5CLDHkk3WAGB0aoItnmtVtLm7d', '2023-05-25 06:18:24', NULL),
(28, 'Lại Quang Thắng', 'admin132@gmail.com', '$2y$10$2Ul7Ov7EvqimUUkJ9FP5qOel7marFGiIMQMs5o7tIhhzhwnPUqnge', NULL, NULL, '2', '1684997714.jpg', '7QFpNaB9plXefi5CLDHkk3WAGB0aoItnmtVtLm7d', '2023-05-25 06:19:05', '2023-05-25 06:55:14'),
(29, 'Lại Quang Thắng', 'thang1@gmail.com', '$2y$10$nUwQJuYYV/lUSuN/gEHbFemVncvkf3HoGYMcrTl4z4WRpG5WsDsPW', NULL, NULL, '1', '1684998841.jpg', '7QFpNaB9plXefi5CLDHkk3WAGB0aoItnmtVtLm7d', '2023-05-25 07:14:01', NULL),
(30, 'Lại Quang Thắng', 'thanglai22k2@gmail.com', '$2y$10$YbxeZIAQkCh7EQxVvbUEnui12u.CTAOdMESwbhL4slkg73YyCOr4S', NULL, NULL, '1', NULL, 'e4a4bb29e1b4124bed9240f634a95e0812b8bac32fb359891e36ffa15bb9d704', '2023-05-25 07:41:51', NULL),
(31, 'Lại Quang Thắng', 'thanglai0382@gmail.com', '$2y$10$z/64f7QCHGqt0tsQ9v8Ute0rPE2WU2HuSjNFpt4hvm48uWRna58YW', NULL, NULL, '5', '1686218319.jpg', NULL, '2023-06-14 07:13:47', '2023-06-14 07:13:47'),
(33, 'Thang', 'thanglai03822@gmail.com', '$2y$10$LQg2rWyn3XAcSBeC7XH1E.yVTUc8/B5qguFo3GILLIVYDSY4E/5/e', 'null', 'null', '0', NULL, NULL, '2023-06-27 04:14:25', '2023-06-27 04:14:25'),
(37, 'Thang', 'thanglai2k2@gmail.com', '$2y$10$EZH0XkLYUxqJM1pFTV3iqe5xcAG7sqPKlPkno5LNAa4pH8wBbw.oO', 'null', 'null', '1', NULL, '3bcb39265b38ff0c48bdee7adfb400baff3660245a5d521b2a88dac29c808961', '2023-06-27 06:18:22', '2023-06-27 06:18:22'),
(38, 'Nguyet', 'luongthinguyet.25.5@gmail.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Nguyet', 'Nguyet@gmail.com', '$2y$10$8.XFzSrM0//ndVs5yXA3K.tAvHB0BZSFKtsdOWYssO7UbNEt.R95G', NULL, NULL, NULL, NULL, '2d5ed6f0165f461f328928e7dd6eada6146f5532539161a3b316403952248905', '2023-10-31 01:23:26', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `classifies`
--
ALTER TABLE `classifies`
  ADD PRIMARY KEY (`classify_id`);

--
-- Chỉ mục cho bảng `demoooo`
--
ALTER TABLE `demoooo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`,`permission_id`) USING BTREE;

--
-- Chỉ mục cho bảng `permission_items`
--
ALTER TABLE `permission_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_lists`
--
ALTER TABLE `permission_lists`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_infors`
--
ALTER TABLE `product_infors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `classifies`
--
ALTER TABLE `classifies`
  MODIFY `classify_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `demoooo`
--
ALTER TABLE `demoooo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `permission_items`
--
ALTER TABLE `permission_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `permission_lists`
--
ALTER TABLE `permission_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `product_infors`
--
ALTER TABLE `product_infors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
