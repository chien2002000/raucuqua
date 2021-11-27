-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 24, 2021 lúc 11:30 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_food`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categary_posts`
--

CREATE TABLE `categary_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categary_posts`
--

INSERT INTO `categary_posts` (`id`, `name`, `slug`, `status_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `parent_id`) VALUES
(12, 'Blog kiến thức', 'blog-kien-thuc', 1, 14, '2021-03-06 23:31:31', '2021-03-07 20:30:26', NULL, 0),
(13, 'tin mới', 'tin-moi', 1, 14, '2021-03-06 23:32:57', '2021-03-18 05:03:11', NULL, 12),
(14, 'Thực phẩm sạch', 'thuc-pham-sach', 1, 14, '2021-03-06 23:37:41', '2021-03-06 23:37:41', NULL, 12),
(15, 'Trung Nguyễn', 'trung-nguyen', 1, 14, '2021-03-07 02:52:13', '2021-03-07 02:58:23', '2021-03-07 02:58:23', 13),
(16, 'Trung Nguyễn1', 'trung-nguyen', 2, 14, '2021-03-07 02:59:27', '2021-03-07 02:59:55', '2021-03-07 02:59:55', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categary_products`
--

CREATE TABLE `categary_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categary_products`
--

INSERT INTO `categary_products` (`id`, `name`, `slug`, `status_id`, `parent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm', 'san-pham', 1, 0, 14, NULL, '2021-03-09 03:15:06'),
(5, 'Rau sạch', 'rau-sach', 1, 1, 14, '2021-03-09 03:18:07', '2021-03-18 07:02:59'),
(7, 'Hoa quả sạch', 'hoa-qua-sach', 1, 1, 14, '2021-03-17 06:21:28', '2021-03-18 04:50:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `product_id`, `order_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(25, 25, 12, 7, '1260000.0000', '2021-03-23 19:29:23', '2021-03-23 19:29:23'),
(26, 17, 12, 1, '20000.0000', '2021-03-23 19:29:23', '2021-03-23 19:29:23'),
(27, 18, 12, 1, '20000.0000', '2021-03-23 19:29:24', '2021-03-23 19:29:24'),
(28, 16, 12, 1, '4500.0000', '2021-03-23 19:29:24', '2021-03-23 19:29:24'),
(29, 17, 13, 8, '160000.0000', '2021-03-23 20:41:58', '2021-03-23 20:41:58'),
(30, 15, 13, 6, '27000.0000', '2021-03-23 20:41:58', '2021-03-23 20:41:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_product_images`
--

CREATE TABLE `detail_product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_product_images`
--

INSERT INTO `detail_product_images` (`id`, `img_detail`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 'public/uploads/xa-lach-mo-dl_large - Copy (3).jpg', 14, '2021-03-09 19:35:22', '2021-03-09 19:35:22'),
(5, 'public/uploads/xa-lach-mo-dl_large - Copy.jpg', 14, '2021-03-09 19:35:23', '2021-03-09 19:35:23'),
(7, 'public/uploads/kho-qua_large - Copy (5).jpg', 15, '2021-03-09 19:39:16', '2021-03-09 19:39:16'),
(8, 'public/uploads/kho-qua_large - Copy.jpg', 15, '2021-03-09 19:39:17', '2021-03-09 19:39:17'),
(9, 'public/uploads/kho-qua_large.jpg', 15, '2021-03-09 19:39:17', '2021-03-09 19:39:17'),
(10, 'public/uploads/cai-be-xanh-dl_large - Copy (2).jpg', 16, '2021-03-09 19:41:41', '2021-03-09 19:41:41'),
(11, 'public/uploads/cai-be-xanh-dl_large - Copy (3).jpg', 16, '2021-03-09 19:41:41', '2021-03-09 19:41:41'),
(13, 'public/uploads/cu-cai-do-dl_large - Copy (2).jpg', 17, '2021-03-09 19:45:48', '2021-03-09 19:45:48'),
(14, 'public/uploads/cu-cai-do-dl_large - Copy.jpg', 17, '2021-03-09 19:45:48', '2021-03-09 19:45:48'),
(15, 'public/uploads/cu-cai-do-dl_large.jpg', 17, '2021-03-09 19:45:48', '2021-03-09 19:45:48'),
(27, 'public/uploads/kho-qua_large - Copy (5).jpg', 22, '2021-03-13 07:35:32', '2021-03-13 07:35:32'),
(28, 'public/uploads/kho-qua_large - Copy.jpg', 22, '2021-03-13 07:35:32', '2021-03-13 07:35:32'),
(29, 'public/uploads/kho-qua_large.jpg', 22, '2021-03-13 07:35:32', '2021-03-13 07:35:32'),
(30, 'public/uploads/cai-be-xanh-dl_large - Copy (2).jpg', 23, '2021-03-13 07:36:24', '2021-03-13 07:36:24'),
(31, 'public/uploads/cai-be-xanh-dl_large - Copy (3).jpg', 23, '2021-03-13 07:36:24', '2021-03-13 07:36:24'),
(32, 'public/uploads/cai-be-xanh-dl_large - Copy.jpg', 23, '2021-03-13 07:36:24', '2021-03-13 07:36:24'),
(33, 'public/uploads/tải xuống - Copy (2).jpg', 24, '2021-03-17 06:25:37', '2021-03-17 06:25:37'),
(34, 'public/uploads/tải xuống - Copy (3).jpg', 24, '2021-03-17 06:25:38', '2021-03-17 06:25:38'),
(35, 'public/uploads/tải xuống - Copy.jpg', 24, '2021-03-17 06:25:38', '2021-03-17 06:25:38'),
(36, 'public/uploads/0333a1e3ade6285399213c52352d5b6a - Copy (2).jpg', 25, '2021-03-20 20:01:44', '2021-03-20 20:01:44'),
(37, 'public/uploads/0333a1e3ade6285399213c52352d5b6a - Copy.jpg', 25, '2021-03-20 20:01:45', '2021-03-20 20:01:45'),
(38, 'public/uploads/0333a1e3ade6285399213c52352d5b6a.jpg', 25, '2021-03-20 20:01:45', '2021-03-20 20:01:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_03_060313_create_roles_table', 2),
(6, '2021_03_03_060636_add_role_id_to_users', 3),
(7, '2021_03_03_061651_add_role_title_to_roles', 4),
(8, '2021_03_03_065241_add_softdelete_to_users', 5),
(9, '2021_03_05_015240_add_phone_to_users_table', 6),
(10, '2021_03_05_123904_create_statuses_table', 7),
(11, '2021_03_05_124531_create_pages_table', 8),
(12, '2021_03_05_142820_add_softdelete_to_pages_table', 9),
(13, '2021_03_06_104335_create_categary_posts_table', 10),
(14, '2021_03_06_112042_create_posts_table', 11),
(16, '2021_03_07_021719_add_softdelete_to_categary_posts_table', 12),
(17, '2021_03_07_133954_add_slug_to_posts_table', 13),
(18, '2021_03_07_143707_add_hightlight_to_posts_table', 14),
(19, '2021_03_08_022408_add_softdelete_to_posts_table', 15),
(20, '2021_03_09_071915_create_categary_products_table', 16),
(21, '2021_03_09_132832_create_status_products_table', 17),
(22, '2021_03_09_141345_create_status2_products_table', 18),
(23, '2021_03_09_144046_create_products_table', 19),
(24, '2021_03_09_151009_create_detail_product_images_table', 20),
(25, '2021_03_10_010234_add_slug_to_products_table', 21),
(26, '2021_03_11_151012_add_softdelete_to_products_table', 22),
(27, '2021_03_13_150505_create_sliders_table', 23),
(28, '2021_03_14_144238_add_soft_delete_to_sliders_table', 24),
(30, '2021_03_21_023842_add_quantity_to_products', 25),
(40, '2021_03_21_135547_create_status_orders_table', 26),
(41, '2021_03_21_135835_create_pays_table', 27),
(45, '2021_03_21_140000_create_orders_table', 28),
(46, '2021_03_21_143925_create_detail_orders_table', 29),
(47, '2021_03_22_130720_add_code_to_orders_table', 30),
(48, '2021_03_22_133125_add_count_total_to_orders_table', 31),
(49, '2021_03_23_020013_add_softdelete_to_orders', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_order` bigint(20) UNSIGNED NOT NULL,
  `pay_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(15,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_total` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullName`, `phone`, `email`, `address`, `note`, `status_order`, `pay_id`, `total`, `created_at`, `updated_at`, `code`, `count_total`, `deleted_at`) VALUES
(12, 'Nguyễn Chí Trung', '0923499282', 'trung9ckk@gmail.com', 'Song Phương -Hoài Đức -Hà Nội', 'giao nhanh', 2, 1, '1304500.0000', '2021-03-23 19:29:23', '2021-03-23 20:40:03', 'isMHjF', 10, NULL),
(13, 'Nguyễn Hữu Đạt', '0358759031', 'haianh123@gmail.com', '267-Đội Cấn -Ba Đình -Hà Nội', 'giao nhanh', 4, 1, '187000.0000', '2021-03-23 20:41:58', '2021-03-23 20:42:33', 'IJJ7kk', 14, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `slug`, `content`, `status_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', '<div class=\"section-head clearfix\">\r\n<h3 class=\"section-title\">Giới Thiệu</h3>\r\n</div>\r\n<div class=\"section-detail\">\r\n<div class=\"detail\">\r\n<p>Cửa h&agrave;ng c&ocirc;ng nghệ ISMART được th&agrave;nh lập th&aacute;ng 9 năm 2020, l&agrave; cửa h&agrave;ng chuy&ecirc;n bu&ocirc;n b&aacute;n c&aacute;c sản phẩm chất lượng ch&iacute;nh h&atilde;ng v&agrave; c&aacute;c phụ kiện chuy&ecirc;n dụng cho c&aacute;c sản phẩm điện thoại, laptop &hellip;</p>\r\n<p>ISMART lu&ocirc;n tập trung x&acirc;y dựng dịch vụ kh&aacute;ch h&agrave;ng kh&aacute;c biệt với chất lượng vượt trội, ph&ugrave; hợp với văn ho&aacute;, đặt kh&aacute;ch h&agrave;ng l&agrave;m trung t&acirc;m trong mọi suy nghĩ v&agrave; h&agrave;nh động của cửa h&agrave;ng.ISMART sẽ cung cấp tới mọi tầng lớp kh&aacute;ch h&agrave;ng những trải nghiệm mua sắm t&iacute;ch cực, th&ocirc;ng qua c&aacute;c sản phẩm Kỹ thuật số ch&iacute;nh h&atilde;ng chất lượng cao, gi&aacute; cả cạnh tranh đi k&egrave;m dịch vụ chăm s&oacute;c kh&aacute;ch h&agrave;ng th&acirc;n thiện, được đảm bảo bởi uy t&iacute;n của doanh nghiệp.</p>\r\n<p><img class=\"border-0\" src=\"http://thanh.unitopcv.com/unimart/public/storage/photos/20/cac-phien-ban-dien-thoai-iphone-11.jpg\" alt=\"\" /></p>\r\n<p>Thế mạnh l&agrave;m n&ecirc;n thương hiệu ISmart kh&aacute;c biệt ch&iacute;nh l&agrave;: Sự chuy&ecirc;n m&ocirc;n h&oacute;a trong từng bộ phận, t&iacute;nh tr&aacute;ch nhiệm cao c&ugrave;ng những gi&aacute;m s&aacute;t kỹ thuật l&agrave;m việc nghi&ecirc;m t&uacute;c, Lu&ocirc;n đi đầu trong việc g&acirc;y dựng uy t&iacute;n, tr&aacute;ch nhiệm để đảm bảo chất lượng sản phẩm,cam kết đặt KH&Aacute;CH H&Agrave;NG L&Agrave;M TRUNG T&Acirc;M trong mọi suy nghĩ v&agrave; h&agrave;nh động của m&igrave;nh. Ngo&agrave;i ra, c&aacute;c bộ phận thường xuy&ecirc;n trao đổi c&ocirc;ng việc, chia sẻ những kh&oacute; khăn, s&aacute;ng kiến x&acirc;y dựng n&ecirc;n một tập thể ISMART lu&ocirc;n lu&ocirc;n năng động, thấu hiểu kh&aacute;ch h&agrave;ng, chuy&ecirc;n nghiệp hơn trong từng dự &aacute;n ch&uacute;ng t&ocirc;i tham gia.</p>\r\n<p>Với phương ch&acirc;m &ldquo; Hợp t&aacute;c để c&ugrave;ng th&agrave;nh c&ocirc;ng c&ugrave;ng ph&aacute;t triển&rdquo;, v&agrave; định hướng &ldquo;Li&ecirc;n tục cải tiến&rdquo; mang đến cho kh&aacute;ch h&agrave;ng sự th&acirc;n thiện v&agrave; t&iacute;ch cực trong c&aacute;c hoạt động, dịch vụ, tr&aacute;ch nhiệm của từng c&aacute; nh&acirc;n. ISMART đ&atilde; lu&ocirc;n nỗ lực cả về nh&acirc;n lực, vật lực, x&acirc;y dựng uy t&iacute;n thương hiệu, niềm tin với kh&aacute;ch h&agrave;ng trong từng sản phẩm ch&uacute;ng t&ocirc;i cung cấp.</p>\r\n<p>Sự tin tưởng v&agrave; ủng hộ của kh&aacute;ch h&agrave;ng trong suốt thời gian qua l&agrave; nguồn động vi&ecirc;n to lớn tr&ecirc;n bước đường ph&aacute;t triển của ISMART. Ch&uacute;ng t&ocirc;i xin hứa sẽ kh&ocirc;ng ngừng ho&agrave;n thiện, phục vụ kh&aacute;ch h&agrave;ng tốt nhất để lu&ocirc;n xứng đ&aacute;ng với niềm tin ấy.</p>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>', 1, 14, '2021-03-05 07:08:00', '2021-03-16 22:33:30', NULL),
(2, 'Liên hệ', 'lien-he', '<h3><strong>Li&ecirc;n hệ</strong></h3>\r\n<p>Cũng giống như Shopee, Lazada, Sendo... ISMART cũng l&agrave; một trong những doanh nghiệp thương mại điện tử h&agrave;ng đầu tại Việt Nam. C&oacute; lẽ với người ti&ecirc;u d&ugrave;ng, ISMART đ&atilde; trở l&ecirc;n qu&aacute; quen thuộc. Nhưng đến b&acirc;y giờ phần lớn người ti&ecirc;u d&ugrave;ng kể cả người b&aacute;n lẫn người mua vẫn chưa biết c&aacute;ch li&ecirc;n hệ với trung t&acirc;m&nbsp;<strong>chăm s&oacute;c kh&aacute;ch h&agrave;ng của ISMART&nbsp;</strong>để nhận hỗ trợ những vấn đề thắc mắc, kh&oacute; khăn. Vậy li&ecirc;n hệ với tổng đ&agrave;i ISMART như thế n&agrave;o, c&oacute; đơn giản kh&ocirc;ng v&agrave; người ti&ecirc;u d&ugrave;ng được hỗ trợ những vấn đề g&igrave;? C&acirc;u trả lời c&oacute; trong b&agrave;i viết dưới đ&acirc;y, h&atilde;y theo d&otilde;i nh&eacute;.</p>\r\n<h4><strong>C&aacute;c c&aacute;ch li&ecirc;n hệ với tổng đ&agrave;i ISMART để nhận hỗ trợ</strong></h4>\r\n<p>Nếu bạn đang muốn gọi đến số tổng đ&agrave;i của Tiki để được trợ gi&uacute;p v&agrave; hỏi đ&aacute;p h&atilde;y li&ecirc;n hệ với họ theo c&aacute;c th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i cung cấp dưới đ&acirc;y.</p>\r\n<ul>\r\n<li class=\"first\">Số điện thoại của tổng đ&agrave;i ISMART (8h&ndash;21h): 1900 0000. Nếu kh&ocirc;ng gọi được đến số tổng đ&agrave;i của Tiki th&igrave; bạn c&oacute; thể liện hệ với họ qua số điện thoại kh&aacute;c đ&oacute; l&agrave;: 0786.373.447</li>\r\n<li>Li&ecirc;n lạc qua email: Truy cập&nbsp;<a href=\"https://quocduy.unitopcv.com/2/gioi-thieu.html\">duyhuynh.hqd@gmail.com</a>, khi li&ecirc;n lạc qua Email bạn vẫn được ISMART trả lời một c&aacute;ch nhanh ch&oacute;ng v&agrave; thỏa đ&aacute;ng.</li>\r\n<li>Nếu bạn l&agrave; đối t&aacute;c c&oacute; nhu cầu hợp t&aacute;c quảng c&aacute;o hoặc kinh doanh với ISMART h&atilde;y li&ecirc;n hệ v&agrave;o địa chỉ n&agrave;y:&nbsp;<strong>marketing@ISMART.vn</strong></li>\r\n<li>Địa chỉ nhận h&agrave;ng đổi/trả/bảo h&agrave;nh của ISMART : Trung t&acirc;m xử l&yacute; đơn h&agrave;ng ISMART&ndash; 367/F370 Đường Văn Ph&uacute; -Quận H&agrave; Đ&ocirc;ng - H&agrave; Nội (Tham khảo hướng dẫn đổi, trả, bảo h&agrave;nh hoặc li&ecirc;n hệ 1900-6035 để được hướng dẫn trước khi gửi sản phẩm về ISMART )</li>\r\n<li class=\"last\">Văn ph&ograve;ng của ISMART : Đường Văn Ph&uacute; -Quận H&agrave; Đ&ocirc;ng - H&agrave; Nội.</li>\r\n</ul>\r\n<p>Cước ph&iacute; cho mỗi cuộc gọi l&ecirc;n tổng đ&agrave;i l&agrave; 1000đ/ph&uacute;t nh&eacute;.</p>', 1, 14, '2021-03-05 18:20:18', '2021-03-16 22:16:50', NULL),
(3, 'Chính Sách Bảo Hành', 'chinh-sach-bao-hanh', '<p><strong>Ismart</strong>&nbsp;rất lấy l&agrave;m tiếc v&agrave; th&agrave;nh thật xin lỗi qu&yacute; kh&aacute;ch h&agrave;ng trong trường hợp điện thoại, m&aacute;y t&iacute;nh bảng của qu&yacute; kh&aacute;ch bị hỏng v&agrave; phải mang đi bảo h&agrave;nh. Hệ thống Di Động Việt mang đến 02 ch&iacute;nh s&aacute;ch bảo h&agrave;nh: bảo h&agrave;nh ti&ecirc;u chuẩn v&agrave; bảo h&agrave;nh mở rộng.</p>\r\n<p><strong>Bảo h&agrave;nh ti&ecirc;u chuẩn</strong>&nbsp;nổi bật với chế độ&nbsp;<strong>d&ugrave;ng thử 07 ng&agrave;y</strong>,&nbsp;<strong>1 đổi 1 trong 33 ng&agrave;y</strong>.&nbsp;<strong>Bảo h&agrave;nh mở rộng</strong>&nbsp;nổi bật với ch&iacute;nh s&aacute;ch&nbsp;<strong>1 đổi 1 rơi vỡ</strong>,&nbsp;<strong>rớt nước, bảo h&agrave;nh tận nh&agrave;</strong>. Cả 2 ch&iacute;nh s&aacute;ch đều được Di Động Việt hỗ trợ tiếp nhận niềm nở, xử l&yacute; nhanh ch&oacute;ng, đem đến sự h&agrave;i l&ograve;ng cho kh&aacute;ch h&agrave;ng.</p>\r\n<p><strong>Chi tiết ch&iacute;nh s&aacute;ch bảo h&agrave;nh tại hệ thống Di Động Việt:</strong></p>\r\n<p>I. D&Ugrave;NG THỬ 7 NG&Agrave;Y MIỄN PH&Iacute;</p>\r\n<p>II. CH&Iacute;NH S&Aacute;CH BẢO H&Agrave;NH TI&Ecirc;U CHUẨN</p>\r\n<p>III. BẢO H&Agrave;NH MỞ RỘNG</p>\r\n<p>Ngo&agrave;i g&oacute;i bảo h&agrave;nh ti&ecirc;u chuẩn (mặc định), tại Di Động Việt qu&yacute; kh&aacute;ch h&agrave;ng được chọn th&ecirc;m g&oacute;i bảo h&agrave;nh mở rộng: Rơi vỡ, rớt nước với những quyền lợi bảo h&agrave;nh vượt trội. Nổi bật như:&nbsp;Bảo h&agrave;nh tận nh&agrave;, bảo h&agrave;nh ngay cả khi rơi vỡ, rớt bể, được&nbsp;mượn m&aacute;y kh&aacute;c sử dụng trong thời gian bảo h&agrave;nh, 1 đổi 1 trong 1 năm...</p>\r\n<p><img title=\"quyen-loi-bao-hanh-didongviet\" src=\"https://didongviet.vn/pub/media/wysiwyg/bao-hanh/bao_hanh.jpg\" /></p>\r\n<h3 id=\"dung-thu-7-ngay\">I. D&Ugrave;NG THỬ 7 NG&Agrave;Y MIỄN PH&Iacute;</h3>\r\n<div>\r\n<ul>\r\n<li>Tất cả điện thoại, m&aacute;y t&iacute;nh bảng đ&atilde; qua sử dụng.</li>\r\n<li>Qu&yacute; kh&aacute;ch ho&agrave;n to&agrave;n thoải m&aacute;i trải nghiệm sản phẩm trong 7 ng&agrave;y đầu ti&ecirc;n.</li>\r\n<li>Nếu sản phẩm bị lỗi hoặc kh&ocirc;ng ph&ugrave; hợp với nhu cầu sử dụng, Qu&yacute; kh&aacute;ch c&oacute; thể y&ecirc;u cầu đổi 1 sản phẩm kh&aacute;c hoặc nhận lại tiền 100% gi&aacute; trị sản phẩm.</li>\r\n</ul>\r\n<strong>Lưu &yacute;</strong>:&nbsp;M&aacute;y đổi trả phải giữ nguy&ecirc;n hiện trạng ban đầu, kh&ocirc;ng c&oacute; dấu hiệu trầy cấn, m&oacute;p, rơi vỡ, v&agrave;o nước, d&iacute;nh t&agrave;i khoản, mất v&acirc;n tay v&agrave; c&ograve;n đầy đủ phụ kiện đi k&egrave;m.</div>\r\n<h3 id=\"doi-moi-33-ngay\">II. CH&Iacute;NH S&Aacute;CH BẢO H&Agrave;NH TI&Ecirc;U CHUẨN</h3>\r\n<p>C&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, Qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể tới trực tiếp c&aacute;c TTBH ch&iacute;nh h&atilde;ng; Trung t&acirc;m Bảo h&agrave;nh ủy quyền Viện Di Động hoặc c&oacute; thể đến trực tiếp c&aacute;c cửa h&agrave;ng của Di Động Việt để được tiếp nhận gửi m&aacute;y bảo h&agrave;nh ch&iacute;nh h&atilde;ng.</p>\r\n<p>Y&ecirc;u cầu tiếp nhận bảo h&agrave;nh t&ugrave;y theo quy định của từng h&atilde;ng, chi tiết c&oacute; trong bảng sau:</p>\r\n<p><img src=\"https://didongviet.vn/pub/media/wysiwyg/bao-hanh/bao-hanh-tieu-chuan.jpg\" alt=\"\" /></p>\r\n<p><strong>Điều kiện đổi trả</strong></p>\r\n<ul>\r\n<li>M&aacute;y: Giữ nguy&ecirc;n hiện trạng ban đầu, kh&ocirc;ng trầy xướt, kh&ocirc;ng d&aacute;n decal, h&igrave;nh trang tr&iacute;. M&aacute;y cũ c&oacute; t&igrave;nh trạng sản phẩm như l&uacute;c mới mua.&nbsp;</li>\r\n<li>Đối với c&aacute;c sản phẩm Apple Watch: kh&ocirc;ng bảo h&agrave;nh c&aacute;c trường hợp về&nbsp;nguồn, m&agrave;n h&igrave;nh, rơi vỡ, v&agrave;o nước, cấn m&oacute;p, c&oacute; t&aacute;c động ngoại lực...</li>\r\n<li>Hộp: Như mới, kh&ocirc;ng m&oacute;p m&eacute;o, r&aacute;ch, vỡ, bị viết, vẽ, quấn băng d&iacute;nh, keo; c&oacute; Serial/IMEI tr&ecirc;n hộp tr&ugrave;ng với th&acirc;n m&aacute;y (mất hộp trừ ph&iacute; 2%).&nbsp;</li>\r\n<li>Phụ kiện v&agrave; qu&agrave; tặng: C&ograve;n đầy đủ, nguy&ecirc;n vẹn, kh&ocirc;ng m&oacute;p m&eacute;o trầy xước hoặc bị hư hại trong qu&aacute; tr&igrave;nh sử dụng.&nbsp;</li>\r\n<li>T&agrave;i khoản: M&aacute;y đ&atilde; đ&atilde; được đăng xuất khỏi tất cả c&aacute;c t&agrave;i khoản như: iCloud, Google Account, Mi Account&hellip;</li>\r\n</ul>\r\n<div><strong>Lưu &yacute;:&nbsp;</strong></div>\r\n<div>\r\n<ul>\r\n<li>Việc đổi m&aacute;y c&oacute; thể kh&ocirc;ng đ&uacute;ng với m&agrave;u sắc như sản phẩm ban đầu&nbsp;</li>\r\n<li>Di Động Việt từ chối bảo h&agrave;nh c&aacute;c lỗi kh&ocirc;ng thể khắc phục được: Mất dữ liệu, mất Touch ID, mất Face ID, d&iacute;nh t&agrave;i khoản iCloud, MiCloud, SamsungCloud. M&aacute;y bị cong sườn, cong main, dập n&aacute;t, ch&aacute;y nổ.&nbsp;</li>\r\n<li>C&aacute;c vấn đề về thẩm mỹ b&ecirc;n ngo&agrave;i như cấn, m&oacute;p, tr&oacute;c sơn, trầy xước, sẽ kh&ocirc;ng thuộc phạm vi bảo h&agrave;nh.&nbsp;</li>\r\n<li>M&aacute;y bị can thiệp phần cứng m&agrave; kh&ocirc;ng c&oacute; chỉ định từ NSX hoặc Di Động Việt/ Viện Di Động</li>\r\n</ul>\r\n</div>\r\n<h3 id=\"chinh-sach-bao-hanh-tieu-chuan\">III. BẢO H&Agrave;NH MỞ RỘNG</h3>\r\n<p><img title=\"chinh-sach-bao-hanh-mo-rong\" src=\"https://didongviet.vn/pub/media/wysiwyg/bao-hanh/image_2020_08_25T10_09_07_919Z.png\" /></p>\r\n<p>Kh&aacute;ch h&agrave;ng cần th&ecirc;m th&ocirc;ng tin vui l&ograve;ng CALL TRỰC TIẾP số HOTLINE&nbsp;<strong>123 45678(miễn ph&iacute;)</strong>&nbsp;hoặc inbox v&agrave;o fanpage&nbsp;<a href=\"https://www.facebook.com/didongviet/\">https://www.facebook.com/ismart/</a>&nbsp;hoặc website&nbsp;<a href=\"http://www.didongviet.vn/\">http://www.didongviet.vn/</a>.</p>\r\n<p>Ban QL <a href=\"http://www.didongviet.vn/\">cửa h&agrave;ng C&ocirc;ng nghệ Ismart</a>&nbsp;xin ch&acirc;n th&agrave;nh cảm ơn!</p>\r\n<h5><strong>Nguồn:Di động việt</strong></h5>\r\n<p>\"</p>\r\n<p>\"</p>\r\n<p>\"</p>', 1, 14, '2021-03-05 18:21:10', '2021-03-16 22:16:50', NULL),
(5, 'Trung Nguyễn', 'sadas', '<p>đấ</p>', 1, 14, '2021-03-05 23:22:43', '2021-03-06 05:00:21', '2021-03-06 05:00:21'),
(6, 'Xã hội', 'xa-hoi', '<p>&aacute;das</p>', 1, 14, '2021-03-06 22:56:02', '2021-03-06 22:56:10', '2021-03-06 22:56:10'),
(7, 'SADAS', 'sadas', '<p>SADAS</p>', 1, 14, '2021-03-13 08:32:53', '2021-03-13 08:32:57', '2021-03-13 08:32:57'),
(8, 'Chính Sách đổi Trả Tại Ismart', 'chinh-sach-doi-tra-tai-ismart', '<h3><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;1. Ch&iacute;nh s&aacute;ch đổi trả d&agrave;nh cho sản phẩm mới&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">1. Ch&iacute;nh s&aacute;ch đổi trả d&agrave;nh cho sản phẩm mới</span></h3>\r\n<p><img title=\"chinh-sach-doi-tra-ddv-1\" src=\"https://didongviet.vn/pub/media/wysiwyg/Chinh-sach/chinh-sach-doi-tra/chinh-sach-doi-tra-1-didongviet_1.jpg\" /></p>\r\n<p><strong><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ghi ch&uacute;:\\n 1. Di Động Việt c&oacute; quyền từ chối thu lại 01 số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được. \\n 2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">Ghi ch&uacute;:</span></strong></p>\r\n<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ghi ch&uacute;:\\n 1. Di Động Việt c&oacute; quyền từ chối thu lại 01 số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được. \\n 2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">1. Di Động Việt c&oacute; quyền từ chối thu lại một số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được.</span></p>\r\n<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ghi ch&uacute;:\\n 1. Di Động Việt c&oacute; quyền từ chối thu lại 01 số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được. \\n 2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp</span></p>\r\n<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ghi ch&uacute;:\\n 1. Di Động Việt c&oacute; quyền từ chối thu lại 01 số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được. \\n 2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">3. Ch&iacute;nh s&aacute;ch đổi trả n&agrave;y kh&ocirc;ng &aacute;p dụng đối với sản phẩm iPhone ch&iacute;nh h&atilde;ng m&atilde; VN/A. (Sản phẩm iPhone m&aacute;y c&ocirc;ng ty c&oacute; ch&iacute;nh s&aacute;ch ri&ecirc;ng.)</span></p>\r\n<h3><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;2. Ch&iacute;nh s&aacute;ch đổi trả d&agrave;nh cho sản phẩm đ&atilde; qua sử dụng&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">2. Ch&iacute;nh s&aacute;ch đổi trả d&agrave;nh cho sản phẩm đ&atilde; qua sử dụng</span></h3>\r\n<p><img title=\"chinh-sach-doi-tra-2\" src=\"https://didongviet.vn/pub/media/wysiwyg/Chinh-sach/chinh-sach-doi-tra/chinh-sach-doi-tra-2-didongviet_1.jpg\" /></p>\r\n<p><strong><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ghi ch&uacute;:\\n 1. Di Động Việt c&oacute; quyền từ chối thu lại 01 số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được. \\n 2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">Ghi ch&uacute;:</span></strong></p>\r\n<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ghi ch&uacute;:\\n 1. Di Động Việt c&oacute; quyền từ chối thu lại 01 số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được. \\n 2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">1. Di Động Việt c&oacute; quyền từ chối thu lại 01 số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được.</span></p>\r\n<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Ghi ch&uacute;:\\n 1. Di Động Việt c&oacute; quyền từ chối thu lại 01 số sản phẩm Di Động Việt đ&aacute;nh gi&aacute; l&agrave; kh&ocirc;ng thể thu lại được. \\n 2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">2. Trong th&aacute;ng đầu ti&ecirc;n, nếu m&aacute;y kh&ocirc;ng c&ograve;n đủ hộp, phụ kiện sẽ t&iacute;nh ph&iacute; 5% mỗi phụ kiện thiếu (Tai nghe, sạc, c&aacute;p) v&agrave; 2% nếu kh&ocirc;ng c&oacute; hộp</span></p>\r\n<p>3. Ch&iacute;nh s&aacute;ch đổi trả n&agrave;y kh&ocirc;ng &aacute;p dụng đối với sản phẩm iPhone ch&iacute;nh h&atilde;ng m&atilde; VN/A. (Sản phẩm iPhone m&aacute;y c&ocirc;ng ty c&oacute; ch&iacute;nh s&aacute;ch ri&ecirc;ng.)</p>\r\n<h3><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;3. Điều kiện đổi trả sản phẩm:&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:25473,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;16&quot;:12,&quot;17&quot;:1}\">3. Điều kiện đổi trả sản phẩm:</span></h3>\r\n<p>1. Với c&aacute;c sản phẩm mua trả g&oacute;p, trước khi tiến h&agrave;nh trả m&aacute;y, vui l&ograve;ng thanh l&yacute; hợp đồng trả g&oacute;p với c&ocirc;ng ty t&agrave;i ch&iacute;nh.</p>\r\n<p>2. Đối với c&aacute;c sản phẩm lỗi do người sử dụng: Di Động Việt c&oacute; quyền từ chối đổi trả với sản phẩm bị va chạm, cấn m&oacute;p, v&agrave;o nước...kh&ocirc;ng đủ điều kiện bảo h&agrave;nh, Di Động Việt tiếp nhận bảo h&agrave;nh c&oacute; t&iacute;nh ph&iacute;.</p>\r\n<p>3. M&aacute;y c&ograve;n như l&uacute;c mới mua, kh&ocirc;ng trầy xướt, cấn m&oacute;p, đầy đủ phụ kiện đi k&egrave;m, đ&atilde; đăng xuất c&aacute;c t&agrave;i khoản bảo mật như iCloud, Micloud, Samsung Cloud...</p>\r\n<p>4. Trong trường hợp m&aacute;y bị trầy xướt, cấn m&oacute;p, kh&ocirc;ng như t&igrave;nh trạng ban đầu, Di Động Việt hỗ trợ thu lại theo mức gi&aacute; thoả thuận (C&oacute; t&iacute;nh ph&iacute; hao m&ograve;n h&igrave;nh thức)</p>\r\n<h5><strong>Nguồn:Di Dộng Việt.</strong></h5>', 1, 14, '2021-03-16 20:11:22', '2021-03-16 22:16:50', NULL),
(9, 'Chính Sách Sử Dụng', 'chinh-sach-su-dung', '<div class=\"page-title-wrapper\">\r\n<h1 class=\"page-title\"><strong style=\"font-size: 14px;\">1. Chấp nhận c&aacute;c điều khoản sử dụng</strong></h1>\r\n</div>\r\n<p>C&aacute;c điều khoản v&agrave; điều kiện sau đ&acirc;y (gọi chung l&agrave; c&aacute;c &ldquo;Điều khoản sử dụng&rdquo;) quy định việc truy cập v&agrave; sử dụng c&aacute;c dịch vụ, th&ocirc;ng tin từ Didongviet.vn.</p>\r\n<p>Bằng việc sử dụng bất kỳ dịch vụ n&agrave;o của Didongviet.vn, bạn chấp nhận, đồng &yacute; bị r&agrave;ng buộc v&agrave; tu&acirc;n thủ c&aacute;c điều khoản sử dụng của Didongviet.vn dưới đ&acirc;y.</p>\r\n<p>Nếu bạn kh&ocirc;ng đồng &yacute; với bất kỳ điều khoản sử dụng, ch&iacute;nh s&aacute;ch bảo mật của Didongviet.vn hoặc kh&ocirc;ng c&oacute; đầy đủ năng lực h&agrave;nh vi d&acirc;n sự ph&ugrave; hợp, xin vui l&ograve;ng dừng việc truy cập v&agrave; sử dụng Didongviet.vn ngay lập tức.</p>\r\n<p><strong>2. Truy cập didongviet.vn</strong></p>\r\n<p>Didongviet.vn bảo lưu quyền được chấm dứt, thay đổi bất kỳ dịch vụ, th&ocirc;ng tin n&agrave;o m&agrave; Didongviet.vn cung cấp v&agrave;o bất cứ l&uacute;c n&agrave;o, theo quyết định của Didongviet.vn m&agrave; kh&ocirc;ng cần b&aacute;o trước. Để truy cập v&agrave; sử dụng c&aacute;c dịch vụ, th&ocirc;ng tin của Didongviet.vn, bạn c&oacute; thể được y&ecirc;u cầu cung cấp một số th&ocirc;ng tin đăng k&yacute; nhất định khi bạn đăng k&yacute; th&agrave;nh vi&ecirc;n/ đăng k&yacute; nhận bản tin.</p>\r\n<p>Bạn đảm bảo rằng tất cả c&aacute;c th&ocirc;ng tin bạn cung cấp cho Didongviet.vn l&agrave; ch&iacute;nh x&aacute;c, đầy đủ v&agrave; cập nhật. Bạn đồng &yacute; rằng tất cả c&aacute;c th&ocirc;ng tin m&agrave; bạn cung cấp cho Didongviet.vn th&ocirc;ng qua Website Didongviet.vn được điều chỉnh bởi ch&iacute;nh s&aacute;ch bảo mật của Didongviet.vn.</p>\r\n<p>Nếu bạn lựa chọn, hoặc được cung cấp, một t&ecirc;n người d&ugrave;ng, mật khẩu hoặc bất kỳ phần n&agrave;o kh&aacute;c của th&ocirc;ng tin như l&agrave; một phần của thủ tục an ninh của Didongviet.vn, bạn c&oacute; nghĩa vụ bảo mật c&aacute;c th&ocirc;ng tin n&agrave;y, v&agrave; kh&ocirc;ng được tiết lộ cho bất kỳ người n&agrave;o hoặc tổ chức n&agrave;o kh&aacute;c.</p>\r\n<p>Bạn cũng x&aacute;c nhận rằng t&agrave;i khoản của bạn l&agrave; d&agrave;nh ri&ecirc;ng cho bạn v&agrave; đồng &yacute; kh&ocirc;ng cung cấp th&ocirc;ng tin t&agrave;i khoản cho bất kỳ người n&agrave;o kh&aacute;c để truy cập v&agrave;o c&aacute;c dịch vụ, th&ocirc;ng tin của Didongviet.vn. Bạn đồng &yacute; th&ocirc;ng b&aacute;o cho Didongviet.vn ngay lập tức bất kỳ việc truy cập tr&aacute;i ph&eacute;p n&agrave;o c&oacute; sử dụng đến t&ecirc;n sử dụng, mật khẩu của bạn.</p>\r\n<p>Didongviet.vn c&oacute; quyền v&ocirc; hiệu h&oacute;a bất kỳ t&ecirc;n người d&ugrave;ng, mật khẩu hoặc số nhận dạng kh&aacute;c, đ&atilde; được lựa chọn bởi bạn hoặc cung cấp bởi Didongviet.vn, bất cứ l&uacute;c n&agrave;o theo quyết định của Didongviet.vn m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o l&yacute; do của việc v&ocirc; hiệu h&oacute;a đ&oacute;.</p>\r\n<p><strong>3. Quyền sở hữu tr&iacute; tuệ</strong></p>\r\n<p>C&aacute;c Điều khoản sử dụng cho ph&eacute;p bạn sử dụng c&aacute;c dịch vụ của Didongviet.vn cho c&aacute; nh&acirc;n, cho mục đ&iacute;ch phi thương mại.</p>\r\n<p>Bạn kh&ocirc;ng được sao ch&eacute;p, ph&acirc;n phối, sửa đổi, hiển thị c&ocirc;ng khai, thực hiện c&ocirc;ng khai, t&aacute;i xuất bản, tải về, lưu trữ hoặc truyền tải bất kỳ nội dung hoặc t&agrave;i liệu c&oacute; sẵn tr&ecirc;n Website Didongviet.vn ngoại trừ trường hợp việc n&agrave;y được thực hiện tự động bởi m&aacute;y t&iacute;nh/ tr&igrave;nh duyệt web m&agrave; bạn sử dụng, cần thiết cho việc truy cập v&agrave; sử dụng c&aacute;c dịch vụ, th&ocirc;ng tin của Didongviet.vn.</p>\r\n<p><strong>4. Thương hiệu</strong></p>\r\n<p>Bạn kh&ocirc;ng được sử dụng thương hiệu Didongviet.vn, m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p trước bằng văn bản của Didongviet.vn. C&aacute;c thương hiệu của c&aacute;c b&ecirc;n thứ ba, c&aacute;c biểu tượng, sản phẩm hoặc dịch vụ, thiết kế hay khẩu hiệu xuất hiện tr&ecirc;n Didongviet.vn kh&ocirc;ng nhất thiết chỉ ra bất kỳ sự li&ecirc;n kết n&agrave;o của c&aacute;c b&ecirc;n thứ ba đ&oacute; với Didongviet.vn.</p>\r\n<p><strong>5. H&agrave;nh vi nghi&ecirc;m cấm</strong></p>\r\n<p>Bạn chỉ c&oacute; thể sử dụng c&aacute;c dịch vụ của Didongviet.vn cho c&aacute;c mục đ&iacute;ch hợp ph&aacute;p v&agrave; ph&ugrave; hợp với c&aacute;c điều khoản sử dụng. Bạn đồng &yacute; kh&ocirc;ng sử dụng c&aacute;c dịch vụ của Didongviet.vn cho bất kỳ h&agrave;nh vi hoặc mục đ&iacute;ch vi phạm ph&aacute;p luật.</p>\r\n<p><strong>6. Đ&oacute;ng g&oacute;p của th&agrave;nh vi&ecirc;n&nbsp;</strong></p>\r\n<p>C&aacute;c dịch vụ Didongviet.vn c&oacute; thể chứa bảng tin, c&aacute;c trang web c&aacute; nh&acirc;n hoặc cấu h&igrave;nh, chức năng nhắn tin v&agrave; c&aacute;c t&iacute;nh năng tương t&aacute;c kh&aacute;c (gọi chung l&agrave; &ldquo;Dịch vụ tương t&aacute;c&rdquo;) cho ph&eacute;p người d&ugrave;ng gửi, xuất bản, truyền tải cho người kh&aacute;c nội dung hoặc t&agrave;i liệu (gọi chung l&agrave; &ldquo;những đ&oacute;ng g&oacute;p của th&agrave;nh vi&ecirc;n&rdquo;), tr&ecirc;n hoặc th&ocirc;ng qua Dịch vụ của Didongviet.vn.</p>\r\n<p>&nbsp;</p>\r\n<p>Bất kỳ th&ocirc;ng tin n&agrave;o bạn gửi đến c&aacute;c Dịch vụ của Didongviet.vn sẽ kh&ocirc;ng được coi l&agrave; c&aacute;c th&ocirc;ng tin bảo mật. Bằng c&aacute;ch cung cấp bất kỳ đ&oacute;ng g&oacute;p n&agrave;o tr&ecirc;n c&aacute;c Dịch vụ của Didongviet.vn, bạn cấp cho Didongviet.vn quyền kh&ocirc;ng thể thu hồi, đầy đủ, vĩnh viễn, v&agrave; miễn ph&iacute; để t&aacute;i xuất bản, trưng b&agrave;y, ph&acirc;n phối, sửa đổi.</p>\r\n<p>&nbsp;</p>\r\n<p>Bạn bảo đảm rằng bạn sở hữu hoặc kiểm so&aacute;t mọi quyền đối với c&aacute;c th&ocirc;ng tin đ&oacute;ng g&oacute;p cho Didongviet.vn. Bạn đảm bảo t&iacute;nh hợp ph&aacute;p, độ tin cậy, t&iacute;nh ch&iacute;nh x&aacute;c v&agrave; ph&ugrave; hợp của c&aacute;c th&ocirc;ng tin đ&oacute;. Didongviet.vn kh&ocirc;ng chịu tr&aacute;ch nhiệm với bất kỳ b&ecirc;n thứ ba n&agrave;o, về nội dung hoặc t&iacute;nh ch&iacute;nh x&aacute;c của bất kỳ đ&oacute;ng g&oacute;p n&agrave;o của người d&ugrave;ng.</p>\r\n<p><strong>7. Gi&aacute;m s&aacute;t v&agrave; Thi h&agrave;nh&nbsp;</strong></p>\r\n<p>Didongviet.vn c&oacute; quyền: loại bỏ hoặc từ chối đưa l&ecirc;n bất kỳ th&ocirc;ng tin đ&oacute;ng g&oacute;p n&agrave;o của th&agrave;nh vi&ecirc;n theo đ&aacute;nh gi&aacute; của Didongviet.vn; thực hiện c&aacute;c sửa đổi m&agrave; Didongviet.vn cho l&agrave; cần thiết đối với c&aacute;c đ&oacute;ng g&oacute;p của th&agrave;nh vi&ecirc;n; tiết lộ danh t&iacute;nh của bạn hoặc c&aacute;c th&ocirc;ng tin kh&aacute;c về bạn theo c&aacute;c y&ecirc;u cầu của c&aacute;c cơ quan chức năng c&oacute; thẩm quyền; chấm dứt hoặc đ&igrave;nh chỉ truy cập của bạn đến tất cả hay một phần của Dịch vụ Didongviet.vn cho bất kỳ hoặc kh&ocirc;ng v&igrave; l&yacute; do g&igrave;.</p>\r\n<p>Didongviet.vn kh&ocirc;ng thực hiện xem x&eacute;t c&aacute;c t&agrave;i liệu trước khi n&oacute; được đăng tải tr&ecirc;n c&aacute;c Dịch vụ của Didongviet.vn, v&agrave; kh&ocirc;ng thể đảm bảo loại bỏ nhanh ch&oacute;ng c&aacute;c th&ocirc;ng tin n&agrave;y sau khi n&oacute; đ&atilde; được đăng.</p>\r\n<p><strong>8. Ti&ecirc;u chuẩn nội dung&nbsp;</strong></p>\r\n<p>Ti&ecirc;u chuẩn &aacute;p dụng cho bất kỳ v&agrave; tất cả c&aacute;c đ&oacute;ng g&oacute;p của người sử dụng. Nội dung đ&oacute;ng g&oacute;p của người d&ugrave;ng phải tu&acirc;n thủ c&aacute;c qui định ph&aacute;p luật.</p>\r\n<p>Theo đ&oacute;, Didongviet.vn kh&ocirc;ng chịu tr&aacute;ch nhiệm với bất kỳ b&ecirc;n thứ ba n&agrave;o về việc Didongviet.vn kh&ocirc;ng thể loại bỏ kịp thời c&aacute;c th&ocirc;ng tin đ&oacute;ng g&oacute;p bởi th&agrave;nh vi&ecirc;n tr&ecirc;n c&aacute;c dịch vụ của Didongviet.vn.</p>\r\n<p><strong>9. Vi phạm bản quyền</strong></p>\r\n<p>Didongviet.vn coi trọng vấn đề bản quyền v&agrave; sẽ phản hồi lại c&aacute;c th&ocirc;ng b&aacute;o về việc vi phạm bản quyền theo đ&uacute;ng c&aacute;c qui định của ph&aacute;p luật. Nếu bạn tin rằng bất kỳ th&ocirc;ng tin n&agrave;o cung cấp tr&ecirc;n Didongviet.vn vi phạm bản quyền của bạn, bạn c&oacute; thể y&ecirc;u cầu loại bỏ c&aacute;c th&ocirc;ng tin n&agrave;y từ c&aacute;c dịch vụ của Didongviet.vn bằng c&aacute;ch gửi th&ocirc;ng b&aacute;o cho Didongviet.vn qua thư điện tử hoặc c&aacute;c h&igrave;nh thức li&ecirc;n lạc ph&ugrave; hợp kh&aacute;c.</p>\r\n<p><strong>10. Dựa v&agrave;o th&ocirc;ng tin cung cấp&nbsp;</strong></p>\r\n<p>C&aacute;c th&ocirc;ng tin c&oacute; sẵn tr&ecirc;n hoặc th&ocirc;ng qua Dịch vụ của Didongviet.vn được cung cấp duy nhất cho mục đ&iacute;ch th&ocirc;ng tin chung. Didongviet.vn c&oacute; thể cập nhật c&aacute;c th&ocirc;ng tin n&agrave;y theo thời gian, nhưng nội dung của n&oacute; kh&ocirc;ng nhất thiết phải ho&agrave;n chỉnh hoặc được cập nhật một c&aacute;ch đầy đủ. Bất kỳ th&ocirc;ng tin n&agrave;o c&oacute; sẵn tr&ecirc;n Website Didongviet.vn c&oacute; thể được thay đổi tại bất kỳ thời điểm n&agrave;o, v&agrave; Didongviet.vn kh&ocirc;ng c&oacute; nghĩa vụ phải cập nhật th&ocirc;ng tin như vậy.</p>\r\n<p>&nbsp;</p>\r\n<p>Th&ocirc;ng tin được cung cấp tr&ecirc;n Didongviet.vn cho mục đ&iacute;ch th&ocirc;ng tin chung. Ch&uacute;ng t&ocirc;i từ chối bất kỳ v&agrave; tất cả c&aacute;c tr&aacute;ch nhiệm li&ecirc;n quan đến (i) độ ch&iacute;nh x&aacute;c, ho&agrave;n thiện, tin cậy, hiệu quả, sử dụng, hoặc kết quả sử dụng c&aacute;c th&ocirc;ng tin c&ocirc;ng bố tr&ecirc;n Didongviet.vn; v&agrave; bạn chịu tr&aacute;ch nhiệm ho&agrave;n to&agrave;n với bất kỳ h&agrave;nh động n&agrave;o dựa v&agrave;o việc sử dụng bất cứ th&ocirc;ng tin c&ocirc;ng bố tr&ecirc;n Didongviet.vn.</p>\r\n<p><strong>11. Từ chối c&aacute;c bảo đảm&nbsp;</strong></p>\r\n<p>Bạn hiểu rằng Didongviet.vn kh&ocirc;ng thể v&agrave; kh&ocirc;ng đảm bảo những tập tin c&oacute; sẵn để tải về từ Internet hoặc c&aacute;c trang web sẽ kh&ocirc;ng chứa virus hoặc c&aacute;c m&atilde; ph&aacute; hoại kh&aacute;c. Bạn chịu tr&aacute;ch nhiệm thực hiện đầy đủ thủ tục kiểm tra để đ&aacute;p ứng c&aacute;c y&ecirc;u cầu cụ thể để bảo vệ bạn chống virus v&agrave; c&aacute;c chương tr&igrave;nh ph&aacute; hoại.</p>\r\n<p><strong>12. Miễn trừ tr&aacute;ch nhiệm ph&aacute;p l&yacute;&nbsp;</strong></p>\r\n<p>Trong bất cứ trường hợp n&agrave;o, Didongviet.vn sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm với bạn hoặc bất kỳ người n&agrave;o kh&aacute;c/ b&ecirc;n thứ ba n&agrave;o kh&aacute;c cho mọi, hậu quả ph&aacute;t sinh b&ecirc;n ngo&agrave;i hoặc li&ecirc;n quan đến những điều khoản sử dụng v&agrave;/hoặc những dịch vụ của Didongviet.vn</p>\r\n<h5><strong>Nguồn:Di động việt</strong></h5>', 1, 14, '2021-03-16 20:11:52', '2021-03-16 22:16:50', NULL),
(10, 'Chính Sách Bảo Mật', 'chinh-sach-bao-mat', '<p>Xin vui l&ograve;ng đọc ch&iacute;nh s&aacute;ch bảo mật một c&aacute;ch cẩn thận để c&oacute; được một sự hiểu biết r&otilde; r&agrave;ng về c&aacute;ch thức th&ocirc;ng tin th&ocirc;ng tin c&aacute; nh&acirc;n của bạn được thu thập, sử dụng, bảo vệ hoặc xử l&yacute; tại Didongviet.vn</p>\r\n<p><strong>Những th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o được thu thập?</strong></p>\r\n<p>Khi bạn đăng k&yacute; nhận bản tin, bạn c&oacute; thể được y&ecirc;u cầu cung cấp t&ecirc;n, địa chỉ email hoặc c&aacute;c th&ocirc;ng tin kh&aacute;c của bạn để gi&uacute;p Didongviet.vn cải thiện việc cung cấp dịch vụ, th&ocirc;ng tin.</p>\r\n<p><strong>Khi n&agrave;o th&ocirc;ng tin được thu thập?</strong></p>\r\n<p>Didongviet.vn thu thập th&ocirc;ng tin khi bạn đăng k&yacute; th&agrave;nh vi&ecirc;n, hoặc đăng k&yacute; nhận bản tin định kỳ.</p>\r\n<p><strong>Th&ocirc;ng tin được lưu trong bao l&acirc;u?</strong></p>\r\n<p>T&ocirc;ng tin th&agrave;nh vi&ecirc;n được lưu trữ từ khi bạn đăng k&yacute; hoặc cung cấp c&aacute;c th&ocirc;ng tin n&agrave;y cho Didongviet.vn qua c&aacute;c t&iacute;nh năng đăng k&yacute;. Th&ocirc;ng tin th&agrave;nh vi&ecirc;n, đăng k&yacute; sẽ được lưu trữ đến khi người d&ugrave;ng y&ecirc;u cầu Didongviet.vn hủy c&aacute;c th&ocirc;ng tin n&agrave;y.</p>\r\n<p><strong>Th&ocirc;ng tin của bạn được d&ugrave;ng l&agrave;m g&igrave;?</strong></p>\r\n<p>Didongviet.vn c&oacute; thể sử dụng c&aacute;c th&ocirc;ng tin thu thập từ bạn để thực hiện c&aacute;c cuộc khảo s&aacute;t truyền th&ocirc;ng hoặc marketing, hoặc phục vụ cho c&aacute;c mục đ&iacute;ch sau:</p>\r\n<ul>\r\n<li>N&acirc;ng cao chất lượng b&agrave;i viết của Website.</li>\r\n<li>Để gửi email định kỳ về địa chỉ mail của bạn cho c&aacute;c cập nhật khuyến mại, giảm gi&aacute;.</li>\r\n</ul>\r\n<p><strong>Bảo vệ th&ocirc;ng tin kh&aacute;ch truy cập</strong></p>\r\n<p>Didongviet.vn kh&ocirc;ng sử dụng chứng chỉ SSL trong kết nối v&igrave; Website chỉ tập trung v&agrave;o việc cung cấp th&ocirc;ng tin, v&agrave; Didongviet.vn kh&ocirc;ng bao giờ chủ động y&ecirc;u cầu bạn cung cấp c&aacute;c th&ocirc;ng tin mang t&iacute;nh chất ri&ecirc;ng tư.</p>\r\n<p><strong>Việc sử dụng &lsquo;cookie&rsquo;?</strong></p>\r\n<p>Didongviet.vn kh&ocirc;ng sử dụng c&aacute;c cookie cho c&aacute;c mục đ&iacute;ch theo d&otilde;i. Bạn c&oacute; thể chọn để m&aacute;y t&iacute;nh của bạn cảnh b&aacute;o bạn mỗi khi một cookie được gửi đi, hoặc bạn c&oacute; thể chọn để tắt tất cả c&aacute;c cookie. Nếu bạn tắt cookie tắt, một số t&iacute;nh năng sẽ bị v&ocirc; hiệu h&oacute;a v&agrave; việc duyệt web của bạn sẽ k&eacute;m hiệu quả hơn do một số dịch vụ của của Didongviet.vn c&oacute; thể sẽ kh&ocirc;ng ph&aacute;t huy hết c&aacute;c t&iacute;nh năng được thiết kế.</p>\r\n<p><strong>C&aacute;c b&ecirc;n thứ ba</strong></p>\r\n<p>Didongviet.vn kh&ocirc;ng b&aacute;n, trao đổi, hoặc chuyển giao c&aacute;c th&ocirc;ng tin đăng k&yacute; của bạn cho bất kỳ b&ecirc;n thứ ba n&agrave;o.</p>\r\n<h5><strong>Nguồn:Di động việt</strong></h5>', 1, 14, '2021-03-16 20:12:22', '2021-03-16 22:16:50', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pays`
--

INSERT INTO `pays` (`id`, `name_pay`, `created_at`, `updated_at`) VALUES
(1, 'Giao hàng tại nhà', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categary_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hightlight` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `thumbnail`, `content`, `excerpts`, `categary_id`, `user_id`, `status_id`, `created_at`, `updated_at`, `slug`, `hightlight`, `deleted_at`) VALUES
(1, 'Những thực phẩm gây hại khi ăn cùng nhau', 'public/uploads/blog-3.jpg', '<p class=\"description\">Bạn kết hợp t&aacute;o - chuối - quả bơ hoặc lựu - nho - sung v&agrave;o mỗi s&aacute;ng để bổ sung chất xơ, vitamin, kho&aacute;ng chất cho cơ thể.</p>\r\n<article class=\"fck_detail \">\r\n<p class=\"subtitle\"><strong>Anh đ&agrave;o, dứa v&agrave; việt quất&nbsp;</strong></p>\r\n<p class=\"Normal\">Theo&nbsp;<em>Boldsky</em>, quả anh đ&agrave;o c&oacute; t&aacute;c dụng chống vi&ecirc;m gi&uacute;p giảm đau v&agrave; hồi phục cơ bắp. Dứa chứa một loại enzyme gọi l&agrave; bromelain l&agrave;m giảm t&igrave;nh trạng vi&ecirc;m ruột v&agrave; k&iacute;ch th&iacute;ch ti&ecirc;u h&oacute;a protein. Quả việt quất chống oxy h&oacute;a rất tốt.</p>\r\n<p class=\"subtitle\"><strong>Dưa hấu, chanh v&agrave; Goji Berry</strong></p>\r\n<p class=\"Normal\">Dưa hấu chứa chất khử độc cơ thể v&agrave; cũng l&agrave; một nguồn lycopene tốt để chống lại c&aacute;c gốc tự do. Goji berries c&oacute; t&aacute;c dụng chống oxy h&oacute;a v&agrave; giải độc gan. Chanh cũng l&agrave; chất khử độc mạnh v&agrave; c&oacute; đặc t&iacute;nh kh&aacute;ng khuẩn, kh&aacute;ng virus.&nbsp;</p>\r\n<p class=\"subtitle\"><strong>D&acirc;u t&acirc;y, kiwi v&agrave; bưởi</strong></p>\r\n<p class=\"Normal\">Những loại tr&aacute;i c&acirc;y n&agrave;y l&agrave; nguồn vitamin C tuyệt vời gi&uacute;p tăng cường hệ miễn dịch v&agrave; chống lại bệnh tật. Ăn kiwi, bưởi v&agrave; d&acirc;u t&acirc;y cũng ngăn ngừa c&aacute;c tổn thương gốc tự do dẫn đến t&igrave;nh trạng vi&ecirc;m trong cơ thể.&nbsp;</p>\r\n<figure class=\"tplCaption action_thumb_added\" data-size=\"js\">\r\n<div class=\"fig-picture\"><picture><source srcset=\"https://i1-suckhoe.vnecdn.net/2018/10/16/trai-cay-8132-1539681837.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eD0goGCeC8TRprYOZpGdJg\" data-srcset=\"https://i1-suckhoe.vnecdn.net/2018/10/16/trai-cay-8132-1539681837.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eD0goGCeC8TRprYOZpGdJg\" /><img class=\"lazy lazied\" src=\"https://i1-suckhoe.vnecdn.net/2018/10/16/trai-cay-8132-1539681837.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eD0goGCeC8TRprYOZpGdJg\" alt=\"Tr&aacute;i c&acirc;y n&ecirc;n ăn rất tốt cho sức khỏe v&agrave;o buổi s&aacute;ng.&nbsp;\" data-src=\"https://i1-suckhoe.vnecdn.net/2018/10/16/trai-cay-8132-1539681837.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eD0goGCeC8TRprYOZpGdJg\" data-ll-status=\"loaded\" /></picture></div>\r\n<figcaption>\r\n<p class=\"Image\">Tr&aacute;i c&acirc;y n&ecirc;n ăn rất tốt cho sức khỏe v&agrave;o buổi s&aacute;ng.&nbsp;</p>\r\n</figcaption>\r\n</figure>\r\n<p class=\"subtitle\"><strong>Đu đủ, m&acirc;m x&ocirc;i v&agrave; dưa đỏ</strong></p>\r\n<p class=\"Normal\">Đu đủ chống oxy h&oacute;a v&agrave; chứa một loại enzyme gọi l&agrave; papain ngăn ngừa tổn thương da. Dưa đỏ nhiều beta-carotene được chuyển đổi th&agrave;nh vitamin A trong cơ thể cho da v&agrave; t&oacute;c khỏe mạnh. M&acirc;m x&ocirc;i &iacute;t đường, nhiều chất chống oxy h&oacute;a như vitamin A v&agrave; C. Ăn những loại tr&aacute;i c&acirc;y n&agrave;y h&agrave;ng ng&agrave;y da bạn sẽ s&aacute;ng khỏe.&nbsp;</p>\r\n<p class=\"subtitle\"><strong>Lựu, nho đỏ v&agrave; quả sung</strong></p>\r\n<p class=\"Normal\">Trong số c&aacute;c loại tr&aacute;i c&acirc;y, lựu chứa lượng chất chống oxy h&oacute;a cao, ngăn ngừa tổn thương da do c&aacute;c gốc tự do g&acirc;y ra. Nho đỏ mang resveratrol c&oacute; đặc t&iacute;nh chống oxy h&oacute;a v&agrave; chống l&atilde;o h&oacute;a, ngăn ngừa bệnh tật v&agrave; giảm c&aacute;c dấu hiệu l&atilde;o h&oacute;a. Quả sung rất gi&agrave;u kho&aacute;ng chất như kali, magie, sắt, đồng, canxi v&agrave; c&aacute;c vitamin như vitamin A, vitamin E v&agrave; vitamin K.</p>\r\n<p class=\"Normal\"><strong>T&aacute;o, chuối v&agrave; quả bơ</strong></p>\r\n<p class=\"Normal\">Kết hợp 3 loại tr&aacute;i c&acirc;y n&agrave;y l&agrave; ho&agrave;n hảo để gi&uacute;p cơ thể của bạn đầy năng lượng. Bạn cũng c&oacute; thể thử c&aacute;c loại tr&aacute;i c&acirc;y n&agrave;y như bữa ăn nhẹ trước hoặc sau khi tập luyện. Chuối v&agrave; bơ cung cấp năng lượng, c&ograve;n t&aacute;o c&oacute; h&agrave;m lượng chất xơ cao.&nbsp;</p>\r\n</article>', '<p>Bạn ăn khoai t&acirc;y với thịt, uống c&agrave; ph&ecirc; ăn miếng sandwich, d&ugrave;ng dưa leo c&ugrave;ng c&agrave; chua... m&agrave; kh&ocirc;ng biết kết hợp n&agrave;y c&oacute; hại cho hệ ti&ecirc;u h&oacute;a.</p>', 12, 14, 1, '2021-03-07 07:51:12', '2021-03-17 04:35:01', 'nhung-thuc-pham-gay-hai-khi-an-cung-nhau', 1, NULL),
(2, 'Ăn 5 phần rau quả mỗi ngày sống thọ hơn', 'public/uploads/blog-2.jpg', '<p class=\"Normal\">Kết quả nghi&ecirc;n cứu được c&ocirc;ng bố tr&ecirc;n tạp ch&iacute; Circulation đầu th&aacute;ng 3. Tiến sĩ Dong Wang, người đứng đầu nghi&ecirc;n cứu v&agrave; l&agrave; th&agrave;nh vi&ecirc;n của khoa Y dược tại Đại học Harvard v&agrave; Bệnh viện Brigham, cho biết: \"Phần lớn người Mỹ chỉ ăn một khẩu phần hoa quả v&agrave; nửa phần rau mỗi ng&agrave;y. Trong khi đ&oacute;, ăn 2 phần quả v&agrave; 3 phần rau h&agrave;ng ng&agrave;y c&oacute; thể giảm nguy cơ tử vong\".</p>\r\n<p class=\"Normal\">Theo tiến sĩ Wang, ăn nhiều hơn mức đ&oacute; c&oacute; thể c&oacute; lợi cho sức khỏe nhưng kh&ocirc;ng gi&uacute;p tăng tuổi thọ hơn l&agrave; bao. Ngo&agrave;i ra, kh&ocirc;ng phải loại rau v&agrave; tr&aacute;i c&acirc;y n&agrave;o cũng c&oacute; t&aacute;c dụng như nhau. \"Nước &eacute;p hoa quả hay c&aacute;c loại thực vật chứa nhiều tinh bột như đậu v&agrave; ng&ocirc; kh&ocirc;ng tốt bằng c&aacute;c loại kh&aacute;c\", &ocirc;ng cho hay.</p>\r\n<p class=\"Normal\">Khối lượng v&agrave; k&iacute;ch thước của một khẩu phần ăn (serving) sẽ phụ thuộc v&agrave;o từng loại rau v&agrave; quả. V&iacute; dụ, một quả t&aacute;o hay một quả chuối sẽ được t&iacute;nh l&agrave; một suất. Trong khi đ&oacute;, 128 g rau xanh tương đương với một suất.</p>\r\n<p class=\"Normal\">Để t&igrave;m hiểu ảnh hưởng của tr&aacute;i c&acirc;y v&agrave; rau đối với tuổi thọ, Wang v&agrave; c&aacute;c đồng nghiệp đ&atilde; theo d&otilde;i 66.719 nữ giới tham gia dự &aacute;n Nghi&ecirc;n cứu Sức khỏe Y t&aacute; v&agrave; 42.016 nam giới trong Nghi&ecirc;n cứu Theo d&otilde;i Sức khỏe Chuy&ecirc;n gia Y tế. Trong suốt 30 năm, 18.793 phụ nữ đ&atilde; qua đời v&agrave; trong 28 năm, số đ&agrave;n &ocirc;ng tử vong l&agrave; 15.105.</p>\r\n<p class=\"Normal\">Khi ph&acirc;n t&iacute;ch dữ liệu về chế độ ăn, tuổi, chỉ số khối cơ thể, mức cholesterol, huyết &aacute;p, t&igrave;nh trạng h&uacute;t thuốc v&agrave; rượu bia, nh&oacute;m nghi&ecirc;n cứu nhận thấy những người ăn 5 phần tr&aacute;i c&acirc;y v&agrave; rau kết hợp mỗi ng&agrave;y c&oacute; nguy cơ tử vong thấp hơn 13% so với những người chỉ ăn 2 khẩu phần. Cụ thể, chế độ ăn n&agrave;y gi&uacute;p giảm nguy cơ chết do bệnh tim 12%, trong khi ung thư l&agrave; 10% v&agrave; 35% đối với c&aacute;c bệnh h&ocirc; hấp như bệnh phổi tắc nghẽn mạn t&iacute;nh.</p>\r\n<figure class=\"tplCaption action_thumb_added\" data-size=\"true\">\r\n<div class=\"fig-picture\"><picture data-inimage=\"done\"><source srcset=\"https://i1-suckhoe.vnecdn.net/2021/03/03/rau-cu-qua-9679-1614753495.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=vIi7ImRCgIv1Fvw0fbh6zQ 1x, https://i1-suckhoe.vnecdn.net/2021/03/03/rau-cu-qua-9679-1614753495.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=BFz6vw88SvewUeonzNiaPQ 1.5x, https://i1-suckhoe.vnecdn.net/2021/03/03/rau-cu-qua-9679-1614753495.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=min848LRlJubiUACw3b3bQ 2x\" data-srcset=\"https://i1-suckhoe.vnecdn.net/2021/03/03/rau-cu-qua-9679-1614753495.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=vIi7ImRCgIv1Fvw0fbh6zQ 1x, https://i1-suckhoe.vnecdn.net/2021/03/03/rau-cu-qua-9679-1614753495.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=BFz6vw88SvewUeonzNiaPQ 1.5x, https://i1-suckhoe.vnecdn.net/2021/03/03/rau-cu-qua-9679-1614753495.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=min848LRlJubiUACw3b3bQ 2x\" /><img class=\"lazy lazied\" src=\"https://i1-suckhoe.vnecdn.net/2021/03/03/rau-cu-qua-9679-1614753495.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=vIi7ImRCgIv1Fvw0fbh6zQ\" alt=\"Rau củ quả hữu &iacute;ch cho sức khỏe. Ảnh: Today\" data-src=\"https://i1-suckhoe.vnecdn.net/2021/03/03/rau-cu-qua-9679-1614753495.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=vIi7ImRCgIv1Fvw0fbh6zQ\" data-ll-status=\"loaded\" /></picture>\r\n<div class=\"embed-container\">&nbsp;</div>\r\n</div>\r\n<figcaption>\r\n<p class=\"Image\">Rau củ quả hữu &iacute;ch cho sức khỏe. Ảnh:<em>&nbsp;Today</em></p>\r\n</figcaption>\r\n</figure>\r\n<p class=\"Normal\">Trong khi nhiều chuy&ecirc;n gia hoan ngh&ecirc;nh kết quả của nghi&ecirc;n cứu, tiến sĩ Vaani Panse Garg, trợ l&yacute; gi&aacute;o sư y khoa v&agrave; tim mạch tại Trường Y Icahn, b&aacute;c sĩ tim mạch tại Mount Sinai Morningside, cho rằng vẫn c&oacute; một số hạn chế. Do người tham gia đều l&agrave;m trong ng&agrave;nh y, c&oacute; khả năng họ vốn đ&atilde; ăn uống l&agrave;nh mạnh v&agrave; tập thể dục nhiều hơn người Mỹ b&igrave;nh thường.</p>\r\n<p class=\"Normal\">Tuy nhi&ecirc;n, theo b&agrave; Garg, những ph&aacute;t hiện n&agrave;y c&oacute; thể &aacute;p dụng với bất kỳ ai. Theo b&agrave;, hoa quả tươi c&oacute; thể l&agrave; lựa chọn tốt nhất, nhưng kh&ocirc;ng phải ai cũng mua được. Garg đề xuất thay bằng hoa quả v&agrave; rau đ&oacute;ng hộp hoặc đ&ocirc;ng lạnh. Lợi thế của c&aacute;c loại rau n&agrave;y l&agrave; ch&uacute;ng thường kh&ocirc;ng chứa phụ gia như đường hoặc muối. Đối với tr&aacute;i c&acirc;y đ&oacute;ng hộp, bạn c&oacute; thể y&ecirc;n t&acirc;m rằng ch&uacute;ng kh&ocirc;ng bị ng&acirc;m đường.</p>\r\n<p class=\"Normal\">Một c&aacute;ch để chế biến hoa quả l&agrave; l&agrave;m sinh tố. Ngo&agrave;i ra, một số loại rau như rau ch&acirc;n vịt c&oacute; thể cho v&agrave;o m&aacute;y xay m&agrave; kh&ocirc;ng mất hương vị. Tiến sĩ Varg thường khuy&ecirc;n bệnh nh&acirc;n để d&agrave;nh một phần tr&ecirc;n đĩa thức ăn cho rau v&agrave; phần kh&aacute;c cho c&aacute;c loại quả. \"Bằng c&aacute;ch đ&oacute; bạn sẽ kh&ocirc;ng qu&ecirc;n ăn rau\", b&agrave; cho biết.</p>\r\n<p class=\"Normal\">Tiến sĩ Aryan Aiyer, trợ l&yacute; gi&aacute;o sư tại Đại học Y Pittsburgh v&agrave; gi&aacute;m đốc y khoa của viện Tim mạch Đại học Y Pittsburgh, nhấn mạnh tầm quan trọng của th&oacute;i quen ăn uống l&agrave;nh mạnh. &Ocirc;ng nhận định: \"Một khi th&oacute;i quen được h&igrave;nh th&agrave;nh, bạn sẽ thực hiện n&oacute; m&agrave; kh&ocirc;ng cần nghĩ nhiều. Khi đi mua sắm, h&atilde;y tr&aacute;nh mua bất cứ thứ g&igrave; c&oacute; hại cho bạn\".</p>\r\n<p class=\"Normal\">Theo &ocirc;ng, nếu mua dưa, bạn n&ecirc;n cắt ch&uacute;ng ra v&agrave; ăn lu&ocirc;n từ khi mới mang về nh&agrave; thay v&igrave; để trong tủ lạnh chờ đến dịp mới ăn. Với những người bận rộn, Aiyer đề xuất l&agrave;m m&oacute;n rau hấp. \"Chỉ mất 15 ph&uacute;t để hấp một t&uacute;i cải Brussel (bắp cải nhỏ). Sau một thời gian, bạn sẽ ăn rau đều đặn\".</p>', '<p><span class=\"location-stamp\">MỸ </span>Theo d&otilde;i dữ liệu hơn 100.000 người trong suốt 30 năm, một nh&oacute;m nh&agrave; nghi&ecirc;n cứu r&uacute;t ra kết luận l&agrave; ăn 5 kh&acirc;̉u ph&acirc;̀n tr&aacute;i c&acirc;y, rau một ng&agrave;y c&oacute; thể k&eacute;o d&agrave;i tuổi thọ.</p>', 12, 14, 1, '2021-03-07 19:10:59', '2021-03-17 04:35:01', 'an-5-phan-rau-qua-moi-ngay-song-tho-hon', 1, NULL),
(4, 'IPhone 11 64GB1', 'public/uploads/anhdetail1.jpg', '<p>&aacute;dasdasdasdas</p>', '<p>sadasdasdasdasd</p>', 13, 14, 1, '2021-03-09 19:53:48', '2021-03-17 04:35:01', 'iphone-11-64gb1', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `price_new` decimal(15,4) DEFAULT NULL,
  `excerpts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categary_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `status_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status2_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_thumb`, `code`, `price`, `price_new`, `excerpts`, `content`, `categary_id`, `user_id`, `status_id`, `status_product_id`, `status2_product_id`, `created_at`, `updated_at`, `slug`, `deleted_at`, `quantity`) VALUES
(14, 'Slack nhập khẩu', 'public/uploads/xa-lach-mo-dl_large - Copy (2).jpg', 'ISMART-PI8FR', '13000.0000', '10000.0000', '<p>Rau x&agrave; l&aacute;ch chắc chắn kh&ocirc;ng mấy xa lạ với mọi người đ&uacute;ng kh&ocirc;ng? Tuy nhi&ecirc;n, nhiều người d&ugrave;ng nhưng chưa thực sự hiểu hết c&ocirc;ng dụng cũng như ph&acirc;n biệt được sự kh&aacute;c nhau giữa c&aacute;c loại rau. Ch&iacute;nh v&igrave; vậy,</p>', '<p><strong>Rau x&agrave; l&aacute;ch chắc chắn kh&ocirc;ng mấy xa lạ với mọi người đ&uacute;ng kh&ocirc;ng? Tuy nhi&ecirc;n, nhiều người d&ugrave;ng nhưng chưa thực sự hiểu hết c&ocirc;ng dụng cũng như ph&acirc;n biệt được sự kh&aacute;c nhau giữa c&aacute;c loại rau. Ch&iacute;nh v&igrave; vậy, h&ocirc;m nay Khuyến N&ocirc;ng TPHCM sẽ đem đến cho bạn nhiều th&ocirc;ng tin cần thiết về c&ocirc;ng dụng của ch&uacute;ng. Đặc biệt l&agrave; những đặc điểm đặc trưng của mỗi loại rau. Chắc chắn sẽ c&oacute; nhiều điều bạn chưa biết đấy!</strong></p>\r\n<figure id=\"post-617 media-617\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach.jpg\" alt=\"X&agrave; l&aacute;ch l&agrave; loại rau kh&aacute; đa dạng.\" width=\"600\" height=\"493\" data-pagespeed-url-hash=\"1677985669\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>X&agrave; l&aacute;ch l&agrave; loại rau kh&aacute; đa dạng.</figcaption>\r\n</figure>\r\n<h2 id=\"dac-diem-chung-cua-rau-xa-lach\" class=\"ftwp-heading\">Đặc điểm chung của rau x&agrave; l&aacute;ch</h2>\r\n<p>Đ&acirc;y l&agrave; một lo&agrave;i rau ăn l&aacute; thuộc họ c&uacute;c với t&ecirc;n khoa học l&agrave; Lactuca Sativa.. Ch&uacute;ng c&ograve;n c&oacute; những t&ecirc;n gọi kh&aacute;c như cải b&egrave;o hay rau diếp.</p>\r\n<p>X&agrave; l&aacute;ch c&oacute; nguồn gốc từ c&aacute;c nước Ch&acirc;u &Acirc;u v&agrave; được trồng nhiều ở những v&ugrave;ng nhiệt đới.</p>\r\n<p>Th&acirc;n rau x&agrave; l&aacute;ch c&oacute; dạng h&igrave;nh tr&ograve;n, thẳng. T&ugrave;y theo lo&agrave;i m&agrave; ch&uacute;ng c&oacute; chiều cao th&acirc;n d&agrave;i ngắn kh&aacute;c nhau.</p>\r\n<p>C&acirc;y hợp với đất gi&agrave;u dinh dưỡng, tơi xốp, tho&aacute;ng kh&iacute;, tho&aacute;t nước tốt v&agrave; c&oacute; thể sống khỏe mạnh trong m&ocirc;i trường &iacute;t &aacute;nh s&aacute;ng.</p>\r\n<p>Th&ocirc;ng thường, x&agrave; l&aacute;ch được d&ugrave;ng để ăn sống, nấu canh hay ăn k&egrave;m với lẩu,&hellip; Đặc biệt, ch&uacute;ng c&ograve;n l&agrave; loại dược liệu thi&ecirc;n nhi&ecirc;n gi&uacute;p giải nhiệt, l&agrave;m đẹp, chống v&agrave; chữa t&aacute;o b&oacute;n hay c&aacute;c bệnh tim mạch, vi&ecirc;m khớp,&hellip;</p>\r\n<figure id=\"post-618 media-618\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-1.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-1.jpg\" alt=\"T&ugrave;y mỗi loại m&agrave; ch&uacute;ng c&oacute; k&iacute;ch thước chiều cao kh&aacute;c nhau.\" width=\"600\" height=\"600\" data-pagespeed-url-hash=\"3776132953\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>T&ugrave;y mỗi loại m&agrave; ch&uacute;ng c&oacute; k&iacute;ch thước chiều cao kh&aacute;c nhau.</figcaption>\r\n</figure>\r\n<h2 id=\"rau-xa-lach-co-tac-dung-gi\" class=\"ftwp-heading\">Rau x&agrave; l&aacute;ch c&oacute; t&aacute;c dụng g&igrave;?</h2>\r\n<p>Th&agrave;nh phần dinh dưỡng của rau x&agrave; l&aacute;ch gồm c&oacute;: vitamin A, B6, B12, C, D, magie, canxi, sắt, chất xơ,&hellip; Ch&iacute;nh nhờ vậy m&agrave; người ta nghi&ecirc;n cứu ch&uacute;ng c&oacute; rất nhiều c&ocirc;ng dụng tuyệt vời đối với sức khỏe. Điển h&igrave;nh như sau:</p>\r\n<ul>\r\n<li>D&ugrave;ng rau n&agrave;y kh&ocirc;ng trữ nhiều năng lượng n&ecirc;n hợp với những người thừa c&acirc;n hoặc muốn giữ d&aacute;ng;</li>\r\n<li>Cung cấp nhiều vitamin cho cơ thể đặc biệt l&agrave; vitamin A, vitamin K, vitamin C, folate,&hellip; gi&uacute;p hỗ trợ thị lực, tốt cho hệ xương, tăng cường đề kh&aacute;ng, bảo vệ c&aacute;c nơ-ron thần kinh v&agrave; hỗ trợ sức khỏe thai nhi;</li>\r\n<li>Rau x&agrave; l&aacute;ch c&ograve;n l&agrave; loại rau gi&agrave;u chất xơ gi&uacute;p k&iacute;ch th&iacute;ch hệ ti&ecirc;u h&oacute;a, hạn chế t&aacute;o b&oacute;n;</li>\r\n<li>Đồng thời, loại rau n&agrave;y c&ograve;n gi&uacute;p ph&ograve;ng ngừa những bệnh nguy hiểm như: lo&atilde;ng xương, alzheimer, ung thư v&ograve;m họng,&hellip;</li>\r\n</ul>\r\n<p>Ch&iacute;nh v&igrave; những c&ocirc;ng dụng tr&ecirc;n m&agrave; bạn dễ d&agrave;ng bắt gặp x&agrave; l&aacute;ch xuất hiện phổ biến trong những m&oacute;n như hamberger, salad, những đĩa rau sống hay trộn với dầu giấm,&hellip;</p>\r\n<h2 id=\"luu-y-khi-su-dung-rau-xa-lach\" class=\"ftwp-heading\">Lưu &yacute; khi sử dụng rau x&agrave; l&aacute;ch</h2>\r\n<p>Tuy rau hữu &iacute;ch như tr&ecirc;n nhưng nếu kh&ocirc;ng biết c&aacute;ch sử dụng bạn cũng dễ d&agrave;ng bỏ hoặc l&agrave;m giảm đi gi&aacute; trị dinh dưỡng ch&uacute;ng đem lại. Khi d&ugrave;ng rau x&agrave; l&aacute;ch bạn cần lưu &yacute; những điểm sau đ&acirc;y:</p>\r\n<ul>\r\n<li>Rửa rau thật sạch, ng&acirc;m với nước muối lo&atilde;ng &iacute;t nhất 10 ph&uacute;t để loại bỏ t&agrave;n dư của thuốc trừ s&acirc;u hay ph&acirc;n b&oacute;n h&oacute;a học;</li>\r\n<li>D&ugrave;ng rau x&agrave; l&aacute;ch sống tốt hơn so với khi nấu ch&iacute;n;</li>\r\n<li>Những người d&ugrave;ng thuốc chống đ&ocirc;ng m&aacute;u n&ecirc;n hạn chế d&ugrave;ng loại rau n&agrave;y bời vitamin K khi v&agrave;o cơ thể sẽ hạn chế t&aacute;c dụng của thuốc;</li>\r\n<li>N&ecirc;n tự trồng x&agrave; l&aacute;ch tại nh&agrave; để đảm bảo gia đ&igrave;nh d&ugrave;ng nguồn rau sạch, an to&agrave;n cho sức khỏe bản th&acirc;n v&agrave; cả nh&agrave;.</li>\r\n</ul>\r\n<figure id=\"post-619 media-619\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-2.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-2.jpg\" alt=\"D&ugrave;ng rau n&agrave;y khi sống tốt hơn nấu ch&iacute;n.\" width=\"600\" height=\"428\" data-pagespeed-url-hash=\"2639943797\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>D&ugrave;ng rau n&agrave;y khi sống tốt hơn nấu ch&iacute;n.</figcaption>\r\n</figure>\r\n<h2 id=\"cac-loai-rau-xa-lach\" class=\"ftwp-heading\">C&aacute;c loại rau x&agrave; l&aacute;ch</h2>\r\n<h3 id=\"xa-lach-mo\" class=\"ftwp-heading\">X&agrave; l&aacute;ch mỡ</h3>\r\n<p>L&agrave; một trong những loại rau phổ biến ở nước ta. Đặc biệt bạn dễ d&agrave;ng bắt gặp sự hiện diện của ch&uacute;ng trong c&aacute;c m&oacute;n gỏi, lẩu hay m&oacute;n cuộn.</p>\r\n<p>Đặc điểm rau x&agrave; l&aacute;ch mỡ kh&aacute; gi&ograve;n ngọt v&agrave; chứa nhiều nước. Việc bảo quản ch&uacute;ng c&oacute; phần kh&oacute; khăn hơn so với c&aacute;c loại rau c&ugrave;ng giống v&igrave; l&aacute; gi&ograve;n, dễ bị dập hay &uacute;ng nước.</p>\r\n<p>Đ&acirc;y l&agrave; lo&agrave;i rau ưa s&aacute;ng, nếu thiếu s&aacute;ng ch&uacute;ng kh&ocirc;ng sinh trưởng tốt.</p>\r\n<figure id=\"post-620 media-620\">\r\n<figcaption>\r\n<figure id=\"post-620 media-620\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-3.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-3.jpg\" alt=\"X&agrave; l&aacute;ch mỡ với đặc điểm gi&ograve;n ngọt.\" width=\"600\" height=\"314\" data-pagespeed-url-hash=\"915564901\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>X&agrave; l&aacute;ch mỡ với đặc điểm gi&ograve;n ngọt.</figcaption>\r\n</figure>\r\n</figcaption>\r\n</figure>\r\n<h3 id=\"xa-lach-san-ho\" class=\"ftwp-heading\">X&agrave; l&aacute;ch san h&ocirc;</h3>\r\n<p>Đ&acirc;y l&agrave; giống x&agrave; l&aacute;ch th&ocirc;ng dụng nhất được b&agrave;y b&aacute;n kh&aacute; nhiều tại chợ v&agrave; c&aacute;c si&ecirc;u thị. Với sự kh&aacute;c nhau về m&agrave;u sắc, ch&uacute;ng lại ph&acirc;n th&agrave;nh 2 loại l&agrave; san h&ocirc; t&iacute;m v&agrave; san h&ocirc; xanh.</p>\r\n<p>Th&acirc;n rau hơi gi&ograve;n, t&aacute;n l&aacute; rộng v&agrave; độ xoăn cao. L&aacute; mọc t&aacute;ch rời nhau n&ecirc;n dễ nhặt.</p>\r\n<p>Vị rau x&agrave; l&aacute;ch san h&ocirc; ngon ngọt, thanh m&aacute;t. Đ&acirc;y l&agrave; loại rau cực tốt cho phụ nữ mang thai v&igrave; th&agrave;nh phần ch&uacute;ng gi&agrave;u axit folic rất tốt cho sức khỏe thai nhi cũng như trẻ sơ sinh.</p>\r\n<p>Ngo&agrave;i việc d&ugrave;ng để chế biến m&oacute;n ăn, ch&uacute;ng c&ograve;n được d&ugrave;ng l&agrave;m nước &eacute;p cũng rất hấp dẫn.</p>\r\n<p>Với giống san h&ocirc; t&iacute;m chứa h&agrave;m lượng chất chống oxy h&oacute;a cao gấp 100 lần so với những loại rau x&agrave; l&aacute;ch th&ocirc;ng thường. Nhờ đ&oacute; m&agrave; ch&uacute;ng đẩy l&ugrave;i qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a, hỗ trợ chức năng ti&ecirc;u h&oacute;a, tốt cho gan v&agrave; giảm nguy cơ mắc bệnh về tim mạch, huyết &aacute;p&hellip;</p>\r\n<figure id=\"post-620 media-620\">\r\n<figure id=\"post-621 media-621\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-4.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-4.jpg\" alt=\"X&agrave; l&aacute;ch san h&ocirc; tốt cho mẹ bầu.\" width=\"600\" height=\"442\" data-pagespeed-url-hash=\"1541067125\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>X&agrave; l&aacute;ch san h&ocirc; tốt cho mẹ bầu.</figcaption>\r\n</figure>\r\n</figure>\r\n<h3 id=\"rau-xa-lach-carol\" class=\"ftwp-heading\">Rau x&agrave; l&aacute;ch Carol</h3>\r\n<p>Với đặc điểm th&acirc;n c&acirc;y thon d&agrave;i, thoạt nh&igrave;n bạn sẽ thấy ch&uacute;ng kh&aacute; giống với&nbsp;<a href=\"https://khuyennongtphcm.com/bap-cai-596.html\">bắp cải</a>. Loại rau n&agrave;y rất gi&ograve;n, chắc. Phần l&aacute; c&oacute; m&agrave;u xanh nhạt cho đến xanh đậm, đầu l&aacute; xoăn nhẹ.</p>\r\n<p>Rau c&oacute; nguồn gốc từ nước Ph&aacute;p, mới du nhập v&agrave;o Việt Nam kh&ocirc;ng l&acirc;u. Nhưng ch&uacute;ng rất được ưa chuộng bởi vị gi&ograve;n ngọt của rau rất kh&aacute;c so với những loại kh&aacute;c. Ch&uacute;ng được trồng nhiều ở Đ&agrave; Lạt v&igrave; th&iacute;ch hợp với nền nhiệt kh&ocirc;ng cao.</p>\r\n<p>Tuy nhi&ecirc;n, rau x&agrave; l&aacute;ch Carol n&agrave;y c&oacute; vị hơi đắng khiến trẻ nhỏ kh&ocirc;ng h&agrave;o hứng khi ăn. Bạn c&oacute; thể chế biến ch&uacute;ng với m&oacute;n salad trộn dầu giấm để m&ugrave;i vị hấp dẫn hơn.</p>\r\n<figure id=\"post-621 media-621\">\r\n<figure id=\"post-622 media-622\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-5.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/rau-xa-lach-5.jpg\" alt=\"X&agrave; l&aacute;ch Carol xuất xứ từ Ph&aacute;p, c&oacute; vị hơi đắng.\" width=\"600\" height=\"600\" data-pagespeed-url-hash=\"3776132953\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>X&agrave; l&aacute;ch Carol xuất xứ từ Ph&aacute;p, c&oacute; vị hơi đắng.</figcaption>\r\n</figure>\r\n</figure>', 5, 14, 1, 2, 1, '2021-03-09 19:35:22', '2021-03-22 05:24:50', 'slack-nhap-khau', NULL, '0'),
(15, 'Mướp đắng Việt Nam', 'public/uploads/kho-qua_large - Copy (3).jpg', 'Uni#122', '5000.0000', '4500.0000', '<p><em>Organic food</em>&nbsp;is food produced by methods that comply with the standards of organic farming. Standards vary worldwide, but organic farming in general features practices that strive to cycle resources, promote ecological balance, and conserve biodiversity.</p>', '<h3 id=\"qmenu1\">1. Một v&agrave;i n&eacute;t về mướp đắng (khổ qua)</h3>\r\n<h4 id=\"subqmenu1\">Nguồn gốc</h4>\r\n<p>Đến nay, vẫn chưa c&oacute; một th&ocirc;ng tin cụ thể n&agrave;o về nguồn gốc của mướp đắng nhưng người ta tin rằng Ấn Độ l&agrave; nơi xuất hiện đầu ti&ecirc;n của loại quả n&agrave;y v&agrave; được du nhập v&agrave;o Trung Quốc v&agrave;o thế kỉ 14.</p>\r\n<p>Ngo&agrave;i ra, c&aacute;ch gọi từ mướp đắng c&oacute; thể bắt nguồn từ:</p>\r\n<ul>\r\n<li>Tiếng Trung, mặt mướp đắng - l&agrave; cụm từ để diễn tả vẻ mặt nghi&ecirc;m nghị hoặc đang buồn.</li>\r\n<li>Tiếng Việt, c&oacute; th&agrave;nh ngữ \"mạt cưa, mướp đắng\" &aacute;m chỉ những thứ kh&ocirc;ng thể ăn b&igrave;nh thường v&igrave; c&oacute; vị đắng, nhiều người ăn kh&ocirc;ng nổi.</li>\r\n</ul>\r\n<p><img class=\"lazy\" src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-1-800x481.jpg\" alt=\"Đặc điểm của mướp đắng (khổ qua)\" width=\"800\" height=\"481\" data-src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-1-800x481.jpg\" /></p>\r\n<h4 id=\"subqmenu2\">Đặc điểm</h4>\r\n<p>Mướp đắng, c&ograve;n gọi l&agrave; khổ qua, t&aacute;o đắng v&agrave; c&oacute; t&ecirc;n khoa học l&agrave; Momordica charantia. Mướp đắng thuộc thực vật th&acirc;n leo, mọc ở v&ugrave;ng nhiệt đới v&agrave; cận nhiệt đới, c&ugrave;ng họ với bầu b&iacute; v&agrave; dưa chuột. Đ&acirc;y l&agrave; loại quả c&oacute; vị đắng nhất trong c&aacute;c loại rau củ quả.</p>\r\n<p>Chiều d&agrave;i của th&acirc;n d&acirc;y c&oacute; thể ph&aacute;t triển đến 5m. L&aacute; mướp đắng c&oacute; 3 - 7 th&ugrave;y ph&acirc;n c&aacute;ch s&acirc;u, chiều ngang khoảng 4 - 12cm v&agrave; c&oacute; l&ocirc;ng. Hoa đực v&agrave; hoa c&aacute;i của c&acirc;y mướp đắng c&oacute; m&agrave;u v&agrave;ng kh&aacute;c nhau.</p>\r\n<p>H&igrave;nh dạng quả thu&ocirc;n d&agrave;i v&agrave; b&ecirc;n ngo&agrave;i nhăn nheo, r&otilde; rệt tr&ocirc;ng giống như những nốt sần. Lớp thịt bao quanh hốc hạt, ở giữa chứa đầy m&agrave;ng mấu lớn v&agrave; c&aacute;c hạt. Khi ch&iacute;n ho&agrave;n to&agrave;n, mướp đắng chuyển sang m&agrave;u cam v&agrave; mềm. C&ograve;n khi sống th&igrave; c&oacute; m&agrave;u xanh hoặc c&oacute; pha ch&uacute;t v&agrave;ng (t&ugrave;y theo giống mướp đắng).</p>\r\n<p><img class=\"lazy\" src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-2-800x472.jpg\" alt=\"Mướp đắng Ấn Độ\" width=\"800\" height=\"472\" data-src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-2-800x472.jpg\" /></p>\r\n<p>Mướp đắng c&oacute; nhiều loại v&agrave; được trồng tr&ecirc;n khắp c&aacute;c quốc gia thuộc khu vực ch&acirc;u &Aacute;, ch&acirc;u Phi v&agrave; Carib&ecirc;. T&ugrave;y theo giống m&agrave; h&igrave;nh dạng, m&agrave;u sắc v&agrave; vị đắng của mướp đắng sẽ kh&aacute;c nhau.</p>\r\n<p><strong>Chẳng hạn</strong>: Hầu hết c&aacute;c giống mướp đắng ở Trung Quốc c&oacute; h&igrave;nh dạng thu&ocirc;n d&agrave;i khoảng 20 - 30cm, m&agrave;u xanh l&aacute; (thậm ch&iacute; c&oacute; pha th&ecirc;m ch&uacute;t m&agrave;u v&agrave;ng) v&agrave; c&oacute; những nốt sần to nhiều b&ecirc;n cạnh nốt sần nhỏ &iacute;t. Trong khi mướp đắng Ấn Độ th&igrave; tr&aacute;i c&oacute; h&igrave;nh thu&ocirc;n d&agrave;i hẹp hơn với 2 đầu nhọn c&ugrave;ng với bề mặt l&agrave; những nốt sần nhỏ liti, m&agrave;u xanh đậm hơn.</p>\r\n<p><img class=\"lazy\" src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-4-800x497.jpg\" alt=\"Nguồn gốc của mướp đắng (khổ qua)\" width=\"800\" height=\"497\" data-src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-4-800x497.jpg\" /></p>\r\n<h3 id=\"qmenu2\">2. Gi&aacute; trị dinh dưỡng của mướp đắng</h3>\r\n<p>Mướp đắng l&agrave; một trong những loại thực phẩm cung cấp nhiều dưỡng chất quan trọng cho cơ thể.</p>\r\n<p>Trung b&igrave;nh, cứ&nbsp;<a title=\"100g mướp đắng gồm c&oacute;\" href=\"https://fdc.nal.usda.gov/fdc-app.html#/food-details/450617/nutrients\" target=\"_blank\" rel=\"nofollow noopener\">100g mướp đắng gồm c&oacute;</a>:</p>\r\n<ul>\r\n<li>Năng lượng: 21 kcal</li>\r\n<li>Nước: 93.95g</li>\r\n<li><a title=\"Carbohydrate\" href=\"https://www.dienmayxanh.com/vao-bep/carbohydrate-la-gi-vai-tro-cua-carb-va-cach-phan-biet-carb-02078\" target=\"_blank\" rel=\"noopener\">Carbohydrate</a>: 4.26g</li>\r\n<li>Chất xơ: 2.1g</li>\r\n<li><a title=\"Vitamin C\" href=\"https://www.dienmayxanh.com/vao-bep/7-loi-ich-tuyet-voi-cua-vitamin-c-den-suc-khoe-con-nguoi-04300\" target=\"_blank\" rel=\"noopener\">Vitamin C</a>: 89.4mg</li>\r\n<li>Sắt: 0.77mg</li>\r\n<li>Vitamin A: 426 IU</li>\r\n</ul>\r\n<p>Th&agrave;nh phần vitamin A, C,&nbsp;<a title=\"folate\" href=\"https://vi.wikipedia.org/wiki/Axit_folic\" target=\"_blank\" rel=\"nofollow noopener\">folate</a>&nbsp;v&agrave; chất xơ trong mướp đắng chứa rất nhiều. Ngo&agrave;i ra, c&ograve;n c&oacute; c&aacute;c&nbsp;<a title=\"chất chống oxy h&oacute;a\" href=\"https://vi.wikipedia.org/wiki/Ch%E1%BA%A5t_ch%E1%BB%91ng_%C3%B4xy_h%C3%B3a\" target=\"_blank\" rel=\"nofollow noopener\">chất chống oxy h&oacute;a</a>&nbsp;c&oacute; lợi kh&aacute;c như&nbsp;<a title=\"catechin\" href=\"https://vi.wikipedia.org/wiki/Catechin\" target=\"_blank\" rel=\"nofollow noopener\">catechin</a>,&nbsp;<a title=\"axit gallic\" href=\"https://vi.wikipedia.org/wiki/Axit_gallic\" target=\"_blank\" rel=\"nofollow noopener\">axit gallic</a>, epicatechin v&agrave; axit chlorogenic gi&uacute;p bảo vệ tế b&agrave;o khỏi bệnh tật, nhất l&agrave; ung thư.</p>\r\n<p><img class=\"lazy\" src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-5-800x448.jpg\" alt=\"Gi&aacute; trị dinh dưỡng của mướp đắng\" width=\"800\" height=\"448\" data-src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-5-800x448.jpg\" /></p>\r\n<h3 id=\"qmenu3\">3. T&aacute;c dụng của mướp đắng</h3>\r\n<p>Dưới đ&acirc;y l&agrave; những t&aacute;c dụng nổi bật nhất của mướp đắng m&agrave; bạn n&ecirc;n biết để c&oacute; chế độ ăn uống hợp l&yacute; từ loại tr&aacute;i n&agrave;y:</p>\r\n<h4 id=\"subqmenu3\">Hỗ trợ l&agrave;m giảm lượng đường trong m&aacute;u</h4>\r\n<p><a title=\"Nhiều cuộc nghi&ecirc;n cứu\" href=\"https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4027280/\" target=\"_blank\" rel=\"nofollow noopener\">Nhiều cuộc nghi&ecirc;n cứu</a>&nbsp;đ&atilde; được thử nghiệm tr&ecirc;n c&aacute;c quy m&ocirc; kh&aacute;c nhau, đều cho kết quả: mướp đắng c&oacute; thể g&oacute;p phần l&agrave;m cải thiện h&agrave;m lượng đường trong m&aacute;u l&acirc;u d&agrave;i, t&aacute;c động t&iacute;ch cực đến với chỉ số của&nbsp;<a title=\"fructosamine\" href=\"https://en.wikipedia.org/wiki/Fructosamine\" target=\"_blank\" rel=\"nofollow noopener\">fructosamine</a>&nbsp;v&agrave; hemoglobin A1c.</p>\r\n<p>Theo&nbsp;<a title=\"nghi&ecirc;n cứu k&eacute;o d&agrave;i 3 th&aacute;ng\" href=\"https://www.liebertpub.com/doi/10.1089/jmf.2017.0114\" target=\"_blank\" rel=\"nofollow noopener\">nghi&ecirc;n cứu k&eacute;o d&agrave;i 3 th&aacute;ng</a>&nbsp;tr&ecirc;n 24 người lớn mắc bệnh tiểu đường, kết quả cho thấy khi d&ugrave;ng 2.000mg mướp đắng mỗi ng&agrave;y đều c&oacute; khả năng l&agrave;m giảm lượng đường trong m&aacute;u v&agrave; hemoglobin A1c. Ngo&agrave;i ra, mướp đắng c&ograve;n&nbsp;<a title=\"l&agrave;m giảm fructosamine\" href=\"https://www.sciencedirect.com/science/article/abs/pii/S0378874110009219?via%3Dihub\" target=\"_blank\" rel=\"nofollow noopener\">l&agrave;m giảm fructosamine</a>&nbsp;&ndash; l&agrave; yếu tố gi&uacute;p kiểm so&aacute;t lượng đường trong m&aacute;u.</p>\r\n<p>Ngo&agrave;i ra, một&nbsp;<a title=\"bằng chứng kh&aacute;c\" href=\"https://www.eurekaselect.com/118335/article\" target=\"_blank\" rel=\"nofollow noopener\">bằng chứng kh&aacute;c</a>&nbsp;cho thấy mướp đắng c&ograve;n l&agrave;m tăng sự b&agrave;i tiết insulin của tuyến tụy, gi&uacute;p giảm hấp thụ&nbsp;<a title=\"glucose\" href=\"https://vi.wikipedia.org/wiki/Glucose\" target=\"_blank\" rel=\"nofollow noopener\">glucose</a>&nbsp;ở ruột, thay v&agrave;o đ&oacute; l&agrave;m tăng khả năng hấp thụ v&agrave; sử dụng glucose ở c&aacute;c m&ocirc; ngoại vi. Kết quả l&agrave; giảm lượng đường trong m&aacute;u.</p>\r\n<p>Tuy nhi&ecirc;n, ch&uacute;ng ta vẫn cần phải c&oacute; th&ecirc;m nhiều cuộc thử nghiệm kh&aacute;c để chứng minh rằng: mướp đắng thực sự ảnh hưởng ra sao đối với h&agrave;m lượng đường trong m&aacute;u của đại số đ&ocirc;ng, thay v&igrave; thử nghiệm tr&ecirc;n cơ thể của những người bị mắc bệnh tiểu đường.</p>\r\n<p><img class=\"lazy\" src=\"https://cdn.tgdd.vn/2020/09/content/201906201436096178071GDRD.max-800x800-800x497.jpg\" alt=\"ổn định lượng đường trong m&aacute;u\" width=\"800\" height=\"497\" data-src=\"https://cdn.tgdd.vn/2020/09/content/201906201436096178071GDRD.max-800x800-800x497.jpg\" /></p>\r\n<h4 id=\"subqmenu4\">Gi&uacute;p ngăn ngừa c&aacute;c bệnh ung thư</h4>\r\n<p>Theo kết quả của c&aacute;c cuộc nghi&ecirc;n cứu trong ống nghiệm đều cho thấy: mướp đắng c&oacute; khả năng chống ung thư ở dạ d&agrave;y, ruột kết, phổi, v&ograve;m họng v&agrave; ung thư v&uacute;, như:</p>\r\n<ul>\r\n<li>Chiết suất từ mướp đắng c&oacute; hiệu quả trong việc&nbsp;<a title=\"ti&ecirc;u diệt c&aacute;c tế b&agrave;o ung thư\" href=\"https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3471438/\" target=\"_blank\" rel=\"nofollow noopener\">ti&ecirc;u diệt c&aacute;c tế b&agrave;o ung thư</a>&nbsp;ở dạ d&agrave;y, ruột kết, phổi v&agrave; v&ograve;m họng.</li>\r\n<li>Chiết xuất từ mướp đắng c&ograve;n c&oacute; thể&nbsp;<a title=\"ngăn chặn sự ph&aacute;t triển v&agrave; l&acirc;y lan\" href=\"https://cancerres.aacrjournals.org/content/70/5/1925.long\" target=\"_blank\" rel=\"nofollow noopener\">ngăn chặn sự ph&aacute;t triển v&agrave; l&acirc;y lan</a>&nbsp;của tế b&agrave;o ung thư v&uacute;, thậm ch&iacute; ti&ecirc;u diệt lu&ocirc;n cả tế b&agrave;o ung thư.</li>\r\n</ul>\r\n<p>V&agrave; đến nay, vẫn c&ograve;n đang diễn ra nhiều cuộc nghi&ecirc;n cứu kh&aacute;c để chứng minh rằng: khi ti&ecirc;u thụ với lượng mướp đắng trong thực phẩm hằng ng&agrave;y th&igrave; n&oacute; sẽ ảnh hưởng thế n&agrave;o đến sự ph&aacute;t triển v&agrave; tăng trưởng của tế b&agrave;o ung thư.</p>\r\n<p><img class=\"lazy\" src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-10-800x403.jpg\" alt=\"Mướp đắng gi&uacute;p ngăn ngừa c&aacute;c bệnh ung thư\" width=\"800\" height=\"403\" data-src=\"https://cdn.tgdd.vn/2020/09/content/Tac-dung-cua-muop-dang-voi-suc-khoe-va-cac-luu-y-khi-dung-10-800x403.jpg\" /></p>\r\n<h4 id=\"subqmenu5\">Giảm cholesterol</h4>\r\n<p>Khi&nbsp;<a title=\"cholesterol\" href=\"https://www.dienmayxanh.com/vao-bep/cholesterol-la-gi-nhom-thuc-pham-giau-cholesterol-02100\" target=\"_blank\" rel=\"noopener\">cholesterol</a>&nbsp;tăng cao, c&oacute; thể l&agrave;m xuất hiện c&aacute;c mảng b&aacute;m chất b&eacute;o t&iacute;ch tụ trong động mạch, l&agrave;m cho tim phải hoạt động nhiều hơn để bơm m&aacute;u đến c&aacute;c cơ quan, dẫn đến việc cơ thể dễ bị mắc bệnh tim mạch.</p>\r\n<p>Đ&atilde; c&oacute; nhiều kết quả nghi&ecirc;n cứu tr&ecirc;n động vật cho thấy: chiết xuất từ mướp đắng c&oacute; thể l&agrave;m giảm h&agrave;m lượng cholesterol v&agrave; g&oacute;p phần hỗ trợ sức khỏe tim mạch:</p>\r\n<p>Một&nbsp;<a title=\"cuộc thử nghiệm tr&ecirc;n cơ thể chuột\" href=\"https://web.a.ebscohost.com/abstract?direct=true&amp;profile=ehost&amp;scope=site&amp;authtype=crawler&amp;jrnl=1011601X&amp;AN=118301439&amp;h=vGfRxTC374V4zwMwHWwogPrlJibRndBdxAqpMtfH%2fGnsx4cg3nqWFP4v4waxEqs10uz4Han8nMRCQYhhmRcN7w%3d%3d&amp;crl=c&amp;resultNs=AdminWebAuth&amp;resultLocal=ErrCrlNotAuth&amp;crlhashurl=login.aspx%3fdirect%3dtrue%26profile%3dehost%26scope%3dsite%26authtype%3dcrawler%26jrnl%3d1011601X%26AN%3d118301439\" target=\"_blank\" rel=\"nofollow noopener\">cuộc thử nghiệm tr&ecirc;n cơ thể chuột</a>&nbsp;(theo chế độ ăn nhiều cholesterol), người ta quan s&aacute;t thấy rằng: việc sử dụng chiết xuất mướp đắng đ&atilde; l&agrave;m giảm đi h&agrave;m lượng cholesterol to&agrave;n phần đ&aacute;ng kể, nhất l&agrave; cholesterol xấu LDL v&agrave; cholesterol trung t&iacute;nh.</p>\r\n<p>Th&ecirc;m&nbsp;<a title=\"cuộc thử nghiệm kh&aacute;c\" href=\"https://scinapse.io/papers/49515921\" target=\"_blank\" rel=\"nofollow noopener\">cuộc thử nghiệm kh&aacute;c</a>&nbsp;tr&ecirc;n cơ thể chuột cho thấy kết quả tương tự.</p>', 5, 14, 1, 1, 1, '2021-03-09 19:39:16', '2021-03-23 20:41:59', 'muop-dang-viet-nam', NULL, '9'),
(16, 'Rau cải bẹ', 'public/uploads/cai-be-xanh-dl_large - Copy.jpg', 'Uni#123', '5000.0000', '4500.0000', '<p><em>Organic food</em>&nbsp;is food produced by methods that comply with the standards of organic farming. Standards vary worldwide, but organic farming in general features practices that strive to cycle resources, promote ecological balance, and conserve biodiversity.</p>', '<p><strong>Trong c&aacute;c loại rau ăn l&aacute;, c&oacute; lẽ cải bẹ xanh l&agrave; loại rau đ&atilde; qu&aacute; quen thuộc với mọi người. Tuy nhi&ecirc;n, hiện nay vấn nạn rau củ quả dư lượng thuốc trừ s&acirc;u hay h&oacute;a chất độc hại khiến bạn kh&ocirc;ng an t&acirc;m khi mua rau ngo&agrave;i chợ. H&atilde;y để Khuyến N&ocirc;ng TPHCM gi&uacute;p bạn giải quyết vấn đề n&agrave;y bằng những th&ocirc;ng tin hướng dẫn về c&aacute;ch trồng đ&uacute;ng chuẩn để đạt năng suất cao nhất nh&eacute;! Th&ocirc;ng qua đ&acirc;y bạn cũng sẽ hiểu hơn về đặc điểm v&agrave; c&ocirc;ng dụng của loại rau n&agrave;y.</strong></p>\r\n<figure id=\"post-558 media-558\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/cai-be-xanh.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/cai-be-xanh.jpg\" alt=\"Rau cải bẹ xanh rất phổ biến trong những bữa ăn gia đ&igrave;nh.\" width=\"600\" height=\"600\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>Rau cải bẹ xanh rất phổ biến trong những bữa ăn gia đ&igrave;nh.</figcaption>\r\n</figure>\r\n<h2 id=\"gioi-thieu-ve-cai-be-xanh\" class=\"ftwp-heading\">Giới thiệu về cải bẹ xanh</h2>\r\n<h3 id=\"dac-diem\" class=\"ftwp-heading\">Đặc điểm</h3>\r\n<p>Người ta c&ograve;n biết đến loại&nbsp;<a href=\"https://khuyennongtphcm.com/rau-cai-531.html\">rau cải</a>&nbsp;n&agrave;y qua nhiều t&ecirc;n gọi kh&aacute;c nhau như cải cay, cải xanh hay cải canh,&hellip; T&ecirc;n khoa học của ch&uacute;ng l&agrave; Brassica juncea (L.). Vị của ch&uacute;ng hơi đắng v&agrave; cay. To&agrave;n th&acirc;n cải bẹ xanh c&oacute; m&agrave;u xanh non mơn mởn.</p>\r\n<p>L&aacute; cải kh&aacute; to, cuống v&agrave; g&acirc;n ch&iacute;nh của l&aacute; liền nhau. L&aacute; c&oacute; nhiều đường g&acirc;n đan với nhau tr&ecirc;n khắp phiến l&aacute;.</p>\r\n<p>Th&ocirc;ng thường ch&uacute;ng được trồng bằng c&aacute;ch gieo cấy v&agrave;o bất cứ thời điểm n&agrave;o trong năm. Mỗi vụ trồng bạn chỉ mất tầm 40 &ndash; 45 ng&agrave;y l&agrave; c&oacute; thể thu hoạch được.</p>\r\n<h3 id=\"cac-mon-an-tu-cai-be-xanh\" class=\"ftwp-heading\">C&aacute;c m&oacute;n ăn từ cải bẹ xanh</h3>\r\n<p>Bạn c&oacute; thể ăn sống hoặc chế biến ch&uacute;ng th&agrave;nh nhiều m&oacute;n kh&aacute;c nhau như hấp, luộc, nấu canh hay x&agrave;o.</p>\r\n<p>Nếu ăn sống, bạn n&ecirc;n thu h&aacute;i khi ch&uacute;ng c&ograve;n non. C&oacute; thể ăn k&egrave;m với b&uacute;n, m&igrave; Quảng hay trộn lẫn với một số loại rau ăn l&aacute; kh&aacute;c để tạo cảm gi&aacute;c cay cay tự nhi&ecirc;n. Nhiều người c&ograve;n trộn cải bẹ xanh với rau củ quả để l&agrave;m nước &eacute;p hay sinh tố.</p>\r\n<p>Khi hấp luộc hay x&agrave;o nấu, bạn n&ecirc;n chọn rau trưởng th&agrave;nh nhưng đừng đợi l&aacute; qu&aacute; gi&agrave; sẽ cay nhiều v&agrave; c&oacute; vị nồng hơi kh&oacute; ăn. Bạn c&oacute; thể nấu canh lo&agrave;i rau n&agrave;y với t&ocirc;m hay thịt băm để giải nhiệt.</p>\r\n<figure id=\"post-559 media-559\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/cai-be-xanh-1.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/cai-be-xanh-1.jpg\" alt=\"Cải cay nấu canh thịt bằm kh&aacute; hấp dẫn.\" width=\"600\" height=\"425\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>Cải cay nấu canh thịt bằm kh&aacute; hấp dẫn.</figcaption>\r\n</figure>\r\n<h2 id=\"cai-be-xanh-co-tac-dung-gi\" class=\"ftwp-heading\">Cải bẹ xanh c&oacute; t&aacute;c dụng g&igrave;?</h2>\r\n<p>Theo nhiều nghi&ecirc;n cứu, cải cay c&oacute; th&agrave;nh phần chất xơ, c&aacute;c loại vitamin (đặc biệt l&agrave; vitamin A v&agrave; K) v&agrave; kho&aacute;ng chất thiết yếu cho cơ thể kh&aacute; nhiều nhưng đổi lại lượng calorie lại thấp.</p>\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; cải bẹ xanh đem lại những t&aacute;c dụng t&iacute;ch cực sau đ&acirc;y:</p>\r\n<ul>\r\n<li>Hỗ trợ chị em giảm c&acirc;n v&agrave; l&agrave;m đẹp da;</li>\r\n<li>Tốt cho hệ ti&ecirc;u h&oacute;a, giảm nguy cơ t&aacute;o b&oacute;n;</li>\r\n<li>L&agrave; loại rau c&oacute; lợi cho tim mạch;</li>\r\n<li>Hỗ trợ bướu cổ;</li>\r\n<li>Tăng đề kh&aacute;ng, gi&uacute;p thanh nhiệt;</li>\r\n<li>Tốt cho những bệnh nh&acirc;n tiểu đường;</li>\r\n<li>Trị ho khan, ho đờm v&agrave; trị mụn nhọt;</li>\r\n<li>Ph&ograve;ng chồng một số bệnh ung thư trong đ&oacute; c&oacute; ung thư b&agrave;ng quang.</li>\r\n</ul>\r\n<figure id=\"post-560 media-560\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/cai-be-xanh-2.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/cai-be-xanh-2.jpg\" alt=\"Nhờ lượng vitamin dồi d&agrave;o v&agrave; gi&agrave;u chất xơ lại &iacute;t calorie n&ecirc;n ch&uacute;ng c&oacute; kh&aacute; nhiều c&ocirc;ng dụng.\" width=\"600\" height=\"476\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>Nhờ lượng vitamin dồi d&agrave;o v&agrave; gi&agrave;u chất xơ lại &iacute;t calorie n&ecirc;n ch&uacute;ng c&oacute; kh&aacute; nhiều c&ocirc;ng dụng.</figcaption>\r\n</figure>\r\n<h2 id=\"cach-trong-cai-be-xanh\" class=\"ftwp-heading\">C&aacute;ch trồng cải bẹ xanh</h2>\r\n<p>L&agrave; loại rau kh&aacute; dễ trồng nhưng nếu l&agrave; người mới tập t&agrave;nh trồng rau sạch, bạn cần phải nắm một số kỹ thuật cơ bản sau đ&acirc;y. Về cơ bản ch&uacute;ng kh&aacute; giống với&nbsp;<a href=\"https://khuyennongtphcm.com/cai-ngot-550.html\">c&aacute;ch trồng cải ngọt</a>.</p>\r\n<h3 id=\"chon-thoi-diem-thich-hop\" class=\"ftwp-heading\">Chọn thời điểm th&iacute;ch hợp</h3>\r\n<p>Ph&ugrave; hợp nhất l&agrave; bạn chọn gieo hạt v&agrave;o th&aacute;ng 8 &ndash; th&aacute;ng 10 để c&acirc;y sinh trưởng ph&aacute;t triển mạnh mẽ nhất. Đồng thời hạn chế được s&acirc;u bệnh tấn c&ocirc;ng.</p>\r\n<h3 id=\"chuan-bi-dat-va-dung-cu-trong\" class=\"ftwp-heading\">Chuẩn bị đất v&agrave; dụng cụ trồng</h3>\r\n<p>Đất trồng cải bẹ xanh phải đảm bảo sạch sẽ, gi&agrave;u dinh dưỡng, tơi xốp v&agrave; tho&aacute;t nước tốt.</p>\r\n<p>Trước khi trồng bạn n&ecirc;n trộn đất với ph&acirc;n hữu cơ để tăng độ tơi xốp. Bạn c&oacute; thể trộn th&ecirc;m tro trấu, xơ dừa,&hellip; để đất tơi xốp hơn. Độ pH đất nằm trong khoảng 5,5 &ndash; 6,5.</p>\r\n<p>Nếu t&aacute;i sử dụng đất đ&atilde; canh t&aacute;c, bạn n&ecirc;n trộn với v&ocirc;i rồi phơi ải 7 &ndash; 10 ng&agrave;y để diệt mầm bệnh tiềm ẩn trong đất.</p>\r\n<p>Với việc trồng cải bẹ xanh tại nh&agrave;, bạn c&oacute; thể d&ugrave;ng th&ugrave;ng xốp, chậu c&acirc;y cảnh hoặc khay nhựa đều được miễn sao dụng cụ trồng c&oacute; lỗ tho&aacute;t nước cho rau kh&ocirc;ng bị ngập &uacute;ng.</p>\r\n<h3 id=\"chuan-bi-hat-giong\" class=\"ftwp-heading\">Chuẩn bị hạt giống</h3>\r\n<p>Bạn c&oacute; thể trồng rau cải theo phương ph&aacute;p gieo hạt. Hạt giống cải bẹ xanh n&ecirc;n được mua từ những cửa h&agrave;ng uy t&iacute;n để c&oacute; tỷ lệ nảy mầm cao.</p>\r\n<h3 id=\"tien-hanh-gieo-trong\" class=\"ftwp-heading\">Tiến h&agrave;nh gieo trồng</h3>\r\n<p>Bạn h&atilde;y ng&acirc;m hạt giống trong nước ấm tỷ lệ 2 s&ocirc;i : 3 lạnh trong khoảng 4 &ndash; 5 tiếng đồng hồ để diệt nấm bệnh v&agrave; k&iacute;ch th&iacute;ch nảy mầm nhanh ch&oacute;ng hơn. Sau đ&oacute; rửa sạch v&agrave; vớt hạt giống ra để cho r&aacute;o nước.</p>\r\n<p>Cho đất đ&atilde; chuẩn bị v&agrave;o chậu, san bằng mặt đất rồi gieo hạt v&agrave;o. C&oacute; 2 c&aacute;ch gieo hạt:</p>\r\n<ul>\r\n<li>Gieo t&ugrave;y &yacute; theo kiểu rải đều hạt giống cải bẹ xanh l&ecirc;n mặt chậu rồi khi c&acirc;y lớn bạn nhổ tỉa ch&uacute;ng thưa ra cho c&oacute; kh&ocirc;ng gian l&aacute; ph&aacute;t triển.</li>\r\n<li>Hoặc c&oacute; thể gieo hạt theo h&agrave;ng, v&agrave;o những hốc ri&ecirc;ng. Mỗi hốc bạn gieo 2 &ndash; 3 hạt v&agrave; c&aacute;ch nhau 15 &ndash; 20cm.</li>\r\n</ul>\r\n<p>Sau khi gieo hạt bạn phủ l&ecirc;n tr&ecirc;n bằng một lớp tro trấu mỏng rồi tưới nước cấp ẩm cho đất. Đồng thời che chắn hoặc đặt chậu c&acirc;y ở nơi c&oacute; b&oacute;ng r&acirc;m che m&aacute;t.</p>\r\n<figure id=\"post-561 media-561\"><a href=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/cai-be-xanh-3.jpg\" data-fancybox=\"group\" data-caption=\"\"><img class=\"lazyloaded\" src=\"https://khuyennongtphcm.com/wp-content/uploads/2020/08/cai-be-xanh-3.jpg\" alt=\"Gieo hạt thưa để đỡ c&ocirc;ng nhổ tỉa.\" width=\"600\" height=\"450\" data-ll-status=\"loaded\" /></a>\r\n<figcaption>Gieo hạt thưa để đỡ c&ocirc;ng nhổ tỉa.</figcaption>\r\n</figure>\r\n<h2 id=\"ky-thuat-cham-soc\" class=\"ftwp-heading\">Kỹ thuật chăm s&oacute;c</h2>\r\n<p>Để c&acirc;y ph&aacute;t triển khỏe mạnh, hạn chế s&acirc;u bệnh v&agrave; đem lại năng suất cao bạn n&ecirc;n lưu &yacute; những yếu tố sau trong qu&aacute; tr&igrave;nh chăm s&oacute;c:</p>\r\n<h3 id=\"tuoi-nuoc\" class=\"ftwp-heading\">Tưới nước</h3>\r\n<p>Thời gian đầu mới gieo, mỗi ng&agrave;y bạn tưới cho c&acirc;y 2 lần v&agrave;o buổi s&aacute;ng sớm v&agrave; chiều m&aacute;t. Hạn chế tốt đa việc tưới đ&ecirc;m để kh&ocirc;ng tạo m&ocirc;i trường cho s&acirc;u bệnh sinh s&ocirc;i nảy nở.</p>\r\n<p>Khi c&acirc;y đ&atilde; tươi tốt, bạn chỉ cần tưới mỗi ng&agrave;y 1 lần hoặc c&aacute;ch ng&agrave;y t&ugrave;y theo độ ẩm trong đất trồng. Lu&ocirc;n giữ đất hơi ẩm l&agrave; được. Tưới nước nhiều qu&aacute; cũng dễ khiến c&acirc;y sinh bệnh.</p>\r\n<p>V&igrave; th&acirc;n rau cải bẹ xanh kh&aacute; mềm n&ecirc;n bạn tưới nhẹ nh&agrave;ng v&agrave;o gốc để kh&ocirc;ng ảnh hưởng đến th&acirc;n c&acirc;y.</p>\r\n<h3 id=\"dieu-kien-nhiet-do-anh-sang\" class=\"ftwp-heading\">Điều kiện nhiệt độ &aacute;nh s&aacute;ng</h3>\r\n<p>Nhiệt độ th&iacute;ch hợp để c&acirc;y khỏe mạnh l&agrave; từ 18 &ndash; 24 độ C v&agrave; độ ẩm 70 &ndash; 90 độ C.</p>\r\n<p>N&ecirc;n chọn nơi c&oacute; &aacute;nh nắng mặt trời buổi s&aacute;ng để trồng c&acirc;y.</p>', 5, 14, 1, 1, 1, '2021-03-09 19:41:41', '2021-03-23 19:29:24', 'rau-cai-be', NULL, '9'),
(17, 'Củ cải đỏ nhập khẩu', 'public/uploads/cu-cai-do-dl_large - Copy (2).jpg', 'Uni#125', '30000.0000', '20000.0000', '<p><em>Organic food</em>&nbsp;is food produced by methods that comply with the standards of organic farming. Standards vary worldwide, but organic farming in general features practices that strive to cycle resources, promote ecological balance, and conserve biodiversity.</p>', '<p><img class=\"\" src=\"https://nongsandungha.com/img/cu-cai-do-2-min.jpg\" alt=\"H&igrave;nh ảnh củ cải đỏ c&ograve;n nguy&ecirc;n tại vườn\" data-src=\"https://nongsandungha.com/img/cu-cai-do-2-min.jpg\" />&nbsp;</p>\r\n<p><strong><em>H&igrave;nh ảnh củ cải đỏ c&ograve;n nguy&ecirc;n tại vườn</em></strong></p>\r\n<p>&nbsp;<img class=\"\" src=\"https://nongsandungha.com/img/cu-cai-do-3-min.jpg\" alt=\"Củ cải đỏ Dũng H&agrave; c&oacute; size 4 - 5 củ/kg\" data-src=\"https://nongsandungha.com/img/cu-cai-do-3-min.jpg\" /></p>\r\n<h2><strong>T&igrave;m hiểu th&ecirc;m về củ cải đỏ</strong></h2>\r\n<p><a href=\"https://nongsandungha.com/thuc-pham/cu-cai-do\"><strong>Củ cải đỏ</strong></a>&nbsp;l&agrave; một trong những thực phẩm sạch, chứa h&agrave;m lượng dinh dưỡng cao rất c&oacute; lợi cho sức khỏe, gi&agrave;u vitamin A, vitamin C, trong l&aacute; củ cải đỏ c&oacute; chứa th&ecirc;m h&agrave;m lượng vitamin B9, sắt, axit folic,&nbsp; kali v&agrave; h&agrave;m lượng magie phong ph&uacute; rất tốt cho sức khỏe người sử dụng &hellip;Vậy&nbsp;<strong>Củ cải đỏ mua ở đ&acirc;u H&agrave; Nội?&nbsp;</strong></p>\r\n<p>&nbsp;<strong>Gi&aacute; củ cải đỏ bao nhi&ecirc;u tiền 1kg?&nbsp;</strong></p>\r\n<p><img class=\"\" title=\"Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội\" src=\"https://lh3.googleusercontent.com/15UN4GQBc772STbLQtm3xlFB_hDHUYlpMMh289Kfb17yTGtQc-OYisaud-jwpjyXcO3rbu2zHIFhmD64Rg1iq5tfZNFbEgRkkxHW_tNsW66bJqOfwAdxmtsn2Blp7UyY2JWolLGt\" alt=\"Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội\" data-src=\"https://lh3.googleusercontent.com/15UN4GQBc772STbLQtm3xlFB_hDHUYlpMMh289Kfb17yTGtQc-OYisaud-jwpjyXcO3rbu2zHIFhmD64Rg1iq5tfZNFbEgRkkxHW_tNsW66bJqOfwAdxmtsn2Blp7UyY2JWolLGt\" />&nbsp;</p>\r\n<p>Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội</p>\r\n<h2><strong>Củ cải đỏ l&agrave; g&igrave;</strong></h2>\r\n<ul>\r\n<li>C&oacute; thể&nbsp;<strong>nhận biết của cải đỏ</strong>&nbsp;nhờ m&agrave;u sắc đặc trưng của n&oacute;.&nbsp;<strong>H&igrave;nh ảnh củ cải đỏ</strong>&nbsp;kh&aacute; đặc biệt, l&aacute; c&oacute; m&agrave;u xanh tươi tự nhi&ecirc;n, củ cải c&oacute; m&agrave;u tươi kh&aacute; bắt mắt. Nhưng sau lớp vỏ m&agrave;u đỏ tươi đ&oacute; l&agrave; lớp thịt m&agrave;u trắng sữa, bộ phận n&agrave;y chứa nhiều dinh dưỡng nhất v&agrave; sử dụng để chế biến c&aacute;c m&oacute;n ăn.&nbsp;</li>\r\n<li>M&agrave;u sắc của&nbsp;<strong>củ cải đỏ&nbsp;</strong>n&oacute;i l&ecirc;n điều g&igrave;? Theo c&aacute;c chuy&ecirc;n gia dinh dưỡng nghi&ecirc;n cứu, trong&nbsp;<strong>củ cải đỏ</strong>&nbsp;chứa rất nhiều loại vitamin kh&aacute;c nhau như : vitamin A, vitamin C, B9, c&ugrave;ng h&agrave;m lượng cao c&aacute;c loại chất kho&aacute;ng kh&aacute;c như: sắt, magie, betaine v&agrave; axit folic,&hellip; Đ&acirc;y đều l&agrave; những dưỡng chất thiết yếu của cơ thể.&nbsp;</li>\r\n<li><strong>Củ cải đỏ</strong>&nbsp;gi&agrave;u sắt v&agrave; vitamin C. Hai hợp chất n&agrave;y c&oacute; t&aacute;c dụng tăng cường v&agrave; hỗ trợ cho nhau trong cơ thể. Vitamin C trong củ cải c&oacute; t&aacute;c dụng gi&uacute;p cơ thể hấp thụ lượng sắt tối đa. Đ&acirc;y đều l&agrave; những th&agrave;nh phần thiết yếu của cơ thể. Ch&uacute;ng đặc biệt tốt cho những người rất kh&oacute; hấp thụ chất sắt trong cơ thể.&nbsp;&nbsp;</li>\r\n<li>C&oacute; thể bạn chưa biết, h&agrave;m lượng chất sắt trong l&aacute; củ cải non c&ograve;n cao hơn cải b&oacute; x&ocirc;i.&nbsp;</li>\r\n</ul>\r\n<p><strong>Củ cải đỏ c&oacute; t&aacute;c dụng g&igrave;</strong></p>\r\n<p>&nbsp;</p>\r\n<p><img class=\"\" title=\"Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội\" src=\"https://lh6.googleusercontent.com/vCGMydvsz8ur0xgVAqVyJmrShS10rRwdgk9J2asaUJHGiHRETfL8yLxvpc2UY0gmb5XM7NV3UH3N4dD-g5H1laht1xoPOEXfumTXIV24krxZ9XaPXspvnrckgb8lZeiNLXi7-XMm\" alt=\"Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội\" data-src=\"https://lh6.googleusercontent.com/vCGMydvsz8ur0xgVAqVyJmrShS10rRwdgk9J2asaUJHGiHRETfL8yLxvpc2UY0gmb5XM7NV3UH3N4dD-g5H1laht1xoPOEXfumTXIV24krxZ9XaPXspvnrckgb8lZeiNLXi7-XMm\" />&nbsp;</p>\r\n<p>Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội</p>\r\n<h4><strong>1. Ph&ograve;ng chống ung thư</strong></h4>\r\n<p>C&aacute;c nh&agrave; khoa học đ&atilde; chứng minh,<strong>&nbsp;Củ cải đường</strong>&nbsp;chứa rất nhiều chất chống oxy h&oacute;a như chứa nhiều chất chống oxy h&oacute;a, như beta-carotene v&agrave; betacyanins. Gi&uacute;p ngăn chặn sự ph&aacute;t triển của c&aacute;c tế b&agrave;o ung thư. Đặc biệt, n&oacute; gi&uacute;p ph&ograve;ng v&agrave; chống ung thư tuyến tuyền liệt, ung thư thận, ruột kết, phổi v&agrave;&nbsp; ung thư tuyến v&uacute; hiệu quả.</p>\r\n<h4><strong>2. Gi&uacute;p giải độc</strong></h4>\r\n<p>Củ cải đường chứa nhiều c&aacute;c hợp chất c&oacute; lợi cho gan, gi&uacute;p trung h&ograve;a c&aacute;c độc tố v&agrave; thải độc tố ra khỏi cơ thể qua đường nước tiểu.&nbsp;</p>\r\n<p>Ngo&agrave;i ra, củ cải đỏ gi&uacute;p hồi phục sức khỏe con người, giảm vi&ecirc;m nhiễm, rất tốt cho hệ tim mạch, nhất l&agrave; ở c&aacute;c động mạch như chi v&agrave; th&aacute;i dương.</p>\r\n<p><strong>3. T&aacute;c dụng l&agrave;m đẹp</strong></p>\r\n<p>Trong củ cải đỏ chứa hợp chất betaine gi&uacute;p th&uacute;c đẩy sự sản sinh chất serotonin ( một chất tạo sự hưng phấn, sảng kho&aacute;i trong cơ thể) gi&uacute;p cơ thể lu&ocirc;n tr&agrave;n đầy năng lượng, lu&ocirc;n vui vẻ v&agrave; thoải m&aacute;i. Hơn thế, chất betaine rất tốt cho sức khỏe hệ tim mạch.&nbsp;</p>\r\n<h4><strong>4. Tăng cường hệ miễn dịch</strong></h4>\r\n<p>Củ cải đỏ chứa h&agrave;m lượng vitamin v&agrave; dưỡng chất cao. C&aacute;c chất n&agrave;y đ&atilde; được chứng minh c&oacute; khả năng chống nhiễm tr&ugrave;ng v&agrave; tăng cường hệ miễn dịch cho cơ thể.&nbsp;</p>\r\n<p>Những người bị thiếu m&aacute;u th&igrave; n&ecirc;n thường xuy&ecirc;n sử dụng củ cải đỏ v&igrave; c&aacute;c th&agrave;nh phần dinh dưỡng trong củ cải đỏ gi&uacute;p k&iacute;ch th&iacute;ch sự oxy h&oacute;a gi&uacute;p sản sinh c&aacute;c tế b&agrave;o m&aacute;u mới n&ecirc;n rất tốt cho những người bị thiếu m&aacute;u n&atilde;o, huyết &aacute;p...vv</p>\r\n<p>C&aacute;c nh&agrave; khoa học đ&atilde; chứng minh rằng,&nbsp;<strong>nước &eacute;p củ cải đỏ</strong>&nbsp;cũng rất tốt cho sức khỏe. N&oacute; gi&uacute;p l&agrave;m tăng gấp đ&ocirc;i nược nitrat trong m&aacute;u v&agrave; bổ sung năng lượng cho c&aacute;c m&uacute;i cơ gi&uacute;p l&agrave;m giảm sự hấp thu oxy trong cơ thể v&agrave; gi&uacute;p cơ l&agrave;m vệc hiệu quả hơn.&nbsp;<strong>C&aacute;ch l&agrave;m nước &eacute;p củ cải đỏ</strong>&nbsp;rất đơn giản với nguy&ecirc;n liệu củ cải đỏ v&agrave; một c&aacute;i m&aacute;y xay sinh tố l&agrave; bạn c&oacute; thể sử dụng d&agrave;ng v&agrave; thường xuy&ecirc;n.</p>\r\n<p><strong>5. Tăng ham muốn t&igrave;nh dục</strong></p>\r\n<p>Cũng theo c&aacute;c nh&agrave; nghi&ecirc;n cứu khoa học, trong củ cải đỏ c&oacute; chứa một hợp chất gọi l&agrave; chất bo (chất n&agrave;y c&oacute; vai tr&ograve; trực tiếp trong việc sản xuất hormone t&igrave;nh dục) nếu bạn thường xuy&ecirc;n sử dụng củ cải đỏ gi&uacute;p l&agrave;m tăng sức khỏe v&agrave; sự&nbsp; hưng phấn trong chuyện chăn gối vợ chồng. Củ cải đỏ c&oacute; thể ăn sống hoặc l&agrave;m salad củ cải đỏ cũng kh&aacute; ngon v&agrave; độc đ&aacute;o.</p>\r\n<h2><strong>C&aacute;ch chế biến củ cải đỏ hầm với xương g&agrave;</strong></h2>\r\n<h3><strong>Nguy&ecirc;n liệu</strong></h3>\r\n<ul>\r\n<li>1 củ cải đỏ&nbsp;</li>\r\n<li>1 bộ xương g&agrave;</li>\r\n<li>H&agrave;nh t&iacute;m th&aacute;i nhỏ</li>\r\n<li>gia vị: mắm, bột n&ecirc;m</li>\r\n<li>H&agrave;nh l&aacute;, rau m&ugrave;i, rau m&ugrave;i t&agrave;u. Tất cả rửa sạch v&agrave; th&aacute;i nhỏ.</li>\r\n</ul>\r\n<p><strong>Chế biến:</strong></p>\r\n<ul>\r\n<li>Bạn hầm xương g&agrave; trước: Xương&nbsp;<a href=\"https://nongsandungha.com/thuc-pham/ga-mia\"><strong>g&agrave;</strong></a>&nbsp;mua về, l&agrave;m sạch rồi chặt kh&uacute;c to. Sau đ&oacute;, đem ướp 15 ph&uacute;t với hạt n&ecirc;m, h&agrave;nh t&iacute;m v&agrave; mắm</li>\r\n<li>Gia vị đ&atilde; ngấm đều th&igrave; cho l&ecirc;n bếp x&agrave;o đẻo đều cho gia vị ngấm đều v&agrave; thịt g&agrave; ch&iacute;n th&igrave; cho nước v&agrave;o hầm 20- 30 ph&uacute;t rồi th&ecirc;m nước d&ugrave;ng vừa ăn.&nbsp;&nbsp;</li>\r\n<li><strong>Củ cải đỏ tươi</strong>&nbsp;gọt bỏ vỏ, rửa sạch, th&aacute;i miếng vu&ocirc;ng vừa ăn rồi cho v&agrave;o nồi hầm xương g&agrave; v&agrave; hầm c&ugrave;ng. Hầm đến khi n&agrave;o củ cải đỏ ch&iacute;n mềm l&agrave; được, cho ra b&aacute;t v&agrave; cho th&ecirc;m rau gia vị v&agrave; n&ecirc;m nếm cho vừa ăn.&nbsp;</li>\r\n<li>Ch&uacute; &yacute;, củ cải đỏ chỉ hầm cho ch&iacute;n tới, nếu hầm qu&aacute; kỹ qu&aacute; ch&iacute;n c&oacute; thể sẽ bị nồng hoặc n&aacute;t ăn kh&ocirc;ng ngon v&agrave; nh&igrave;n kh&ocirc;ng đẹp mắt đ&acirc;u nh&eacute;.</li>\r\n</ul>\r\n<p><img class=\"\" title=\"Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội\" src=\"https://lh5.googleusercontent.com/q3QrTS0VrNrPXRQnnmey9WjB3TdkzaU4MT5EqLwk62ZpAHsVRXxNnVyZZAwgC_9826mzv-c8eI7FR5NT2gFVEwqEiQM_o21ElASY8cjpjrahYnlhdcOM86tqIMwYDfnF6R0vol5x\" alt=\"Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội\" data-src=\"https://lh5.googleusercontent.com/q3QrTS0VrNrPXRQnnmey9WjB3TdkzaU4MT5EqLwk62ZpAHsVRXxNnVyZZAwgC_9826mzv-c8eI7FR5NT2gFVEwqEiQM_o21ElASY8cjpjrahYnlhdcOM86tqIMwYDfnF6R0vol5x\" />&nbsp;</p>\r\n<p>Cung cấp củ cải đỏ đ&agrave; lạt tươi ngon nhất gi&aacute; rẻ tại H&agrave; Nội</p>\r\n<p>Củ cải đỏ rất gi&agrave;u dinh dưỡng, ngo&agrave;i những c&ocirc;ng dụng tốt cho sức khỏe th&igrave; ch&uacute;ng c&ograve;n c&oacute; t&aacute;c dụng dữ d&aacute;ng v&agrave; l&agrave;m đẹp da cho c&aacute;c chị nữa nh&eacute;. Những ai muốn giữ d&aacute;ng hoặc mong muốn một th&acirc;n h&igrave;nh c&acirc;n đối th&igrave; kh&ocirc;ng n&ecirc;n bỏ qua củ cải đỏ trong thực đơn giảm c&acirc;n của m&igrave;nh nh&eacute;.&nbsp;</p>\r\n<p>Ngo&agrave;i m&oacute;n&nbsp;<strong>củ cải hầm xương g&agrave;</strong>, th&igrave; bạn c&oacute; thể thử th&ecirc;m một số m&oacute;n kh&aacute;c cũng rất ngon từ củ cải đỏ như:&nbsp;&nbsp;<strong>nộm củ cải đỏ, củ cải x&agrave;o</strong>,&nbsp;<strong>salad củ cải đỏ,</strong>&hellip;vv&nbsp;</p>\r\n<p><strong>Mua củ cải đỏ&nbsp;</strong><strong>tại H&agrave; Nội v&agrave; Hồ Ch&iacute; Minh?</strong></p>\r\n<p>Bạn cũng c&oacute; thể dễ d&agrave;ng&nbsp;<strong>mua củ cải đỏ</strong>&nbsp;tại chợ hay c&aacute;c cửa h&agrave;ng, tuy nhi&ecirc;n chưa thể đảm bảo chất lượng thực phẩm sạch kh&ocirc;ng.&nbsp;</p>\r\n<p>C&ocirc;ng ty&nbsp;<a href=\"https://nongsandungha.com/\"><strong>N&ocirc;ng Sản Dũng H&agrave;</strong></a>&nbsp;chuy&ecirc;n cung cấp thực phẩm sạch cho c&aacute;c nh&agrave; h&agrave;ng, kh&aacute;ch sạn nổi tiếng tr&ecirc;n phạm vi cả nước.&nbsp; N&ocirc;ng sản Dũng H&agrave;&nbsp;<strong>b&aacute;n củ cải đỏ tươi</strong>&nbsp;chất lượng cao, củ to, gi&agrave;u gi&aacute; trị dinh dưỡng, gi&aacute; rẻ.&nbsp;</p>\r\n<p>Ngo&agrave;i&nbsp;<strong>củ cải đỏ đ&agrave; lạt</strong>, bạn cũng c&oacute; thể tham khảo th&ecirc;m c&aacute;c loại&nbsp;<a href=\"https://nongsandungha.com/danh-muc/dac-san-vung-mien\"><strong>đặc sản v&ugrave;ng miền</strong></a><strong>:&nbsp;</strong><a href=\"https://nongsandungha.com/thuc-pham/ngong-toi\"><strong>Ngồng tỏi</strong></a><strong>,&nbsp;</strong><a href=\"https://nongsandungha.com/thuc-pham/cu-mai\"><strong>củ m&agrave;i</strong></a><strong>,&nbsp;</strong><a href=\"https://nongsandungha.com/thuc-pham/rau-bo-khai\"><strong>b&ograve; khai</strong></a><strong>,&nbsp;</strong><a href=\"https://nongsandungha.com/thuc-pham/cu-hu-dua\"><strong>củ hũ dừa</strong></a><strong>,&nbsp;</strong><a href=\"https://nongsandungha.com/thuc-pham/ngo-xuan\"><strong>ng&oacute; xu&acirc;n</strong></a><strong>,</strong>...&nbsp;</p>', 5, 14, 1, 1, 2, '2021-03-09 19:45:48', '2021-03-23 20:41:58', 'cu-cai-do-nhap-khau', NULL, '0'),
(18, 'IPhone 11 64GB1', 'public/uploads/xa-lach-mo-dl_large.jpg', 'ISMART-PI8FR', '24990.0000', '20000.0000', '<p>sadasdsdas</p>', '<p>&aacute;dasdas</p>', 5, 14, 1, 1, 1, '2021-03-12 01:33:05', '2021-03-23 19:29:24', 'iphone-11-64gb1', NULL, '3'),
(22, 'Trung Nguyễn', 'public/uploads/kho-qua_large - Copy (5).jpg', 'Uni#122', '130000.0000', '2499000.0000', '<p>sadasdasdsa</p>', '<p>sadasdasd</p>', 5, 14, 1, 2, 1, '2021-03-13 07:35:31', '2021-03-13 07:36:58', 'Tôi không có ý định mời vợ cũ đến đám cưới', '2021-03-13 07:36:58', '25'),
(23, 'IPhone 11 64GB1', 'public/uploads/cai-be-xanh-dl_large - Copy (3).jpg', 'Uni#122', '8990000.0000', NULL, '<p>sadasdas</p>', '<p>sadasdas</p>', 5, 14, 1, 1, 1, '2021-03-13 07:36:24', '2021-03-13 07:36:54', 'asdas', '2021-03-13 07:36:54', '8');
INSERT INTO `products` (`id`, `product_title`, `product_thumb`, `code`, `price`, `price_new`, `excerpts`, `content`, `categary_id`, `user_id`, `status_id`, `status_product_id`, `status2_product_id`, `created_at`, `updated_at`, `slug`, `deleted_at`, `quantity`) VALUES
(24, 'Táo Gala 1 kg (6 trái)', 'public/uploads/tải xuống.jpg', 'Uni#15', '130000.0000', '100000.0000', '<p>Hiện nay t&aacute;o RosaLynn hữu cơ được trồng độc quyền ở khu vực Yakima, Washington, Mỹ. T&aacute;o RosaLynn hữu cơ Mỹ được thu hoạch v&agrave;o th&aacute;ng 10 v&agrave; c&oacute; thể được lưu trữ trong v&ograve;ng 06 th&aacute;ng&nbsp;</p>', '<p>T&aacute;o Gala c&oacute; vỏ sọc đỏ tr&ecirc;n nền v&agrave;ng kem, t&aacute;o n&agrave;y kh&aacute; gi&ograve;n v&agrave; ngọt.<br />C&oacute; 2 loại ch&iacute;nh l&agrave; Royal Gala v&agrave; Pale Gala.</p>\r\n<p class=\"p1\"><strong>Gi&aacute; trị dinh dưỡng:</strong></p>\r\n<ul class=\"ul1\">\r\n<li class=\"li2\">T&aacute;o chứa nhiều vitamin A,C.</li>\r\n<li class=\"li2\">Vỏ t&aacute;o gi&agrave;u chất xơ v&agrave; c&oacute; lợi cho hệ ti&ecirc;u h&oacute;a, hơn 1 nửa lượng vitamin C của quả t&aacute;o đều nằm ở vỏ.</li>\r\n</ul>\r\n<p class=\"p1\"><strong>Hướng dẫn sử dụng:</strong></p>\r\n<ul class=\"ul1\">\r\n<li class=\"li2\">T&aacute;o Gala đặc biệt d&ugrave;ng để &eacute;p nước rất ngon: ngọt, thơm, nhiều nước v&agrave; nước kh&ocirc;ng bị th&acirc;m như c&aacute;c loại t&aacute;o kh&aacute;c, c&ocirc;ng thức &eacute;p rất đơn giản: cắt quả t&aacute;o ra l&agrave;m 4 sau đ&oacute; cho v&agrave;o m&aacute;y &eacute;p. 3 quả sẽ &eacute;p được 01 cốc.</li>\r\n<li class=\"li2\">Ngo&agrave;i ra T&aacute;o Gala c&ograve;n thường d&ugrave;ng để l&agrave;m salad v&agrave; c&aacute;c m&oacute;n trộn</li>\r\n</ul>\r\n<p>Gi&aacute; sản phẩm tr&ecirc;n Tiki đ&atilde; bao gồm thuế theo luật hiện h&agrave;nh. Tuy nhi&ecirc;n tuỳ v&agrave;o từng loại sản phẩm hoặc phương thức, địa chỉ giao h&agrave;ng m&agrave; c&oacute; thể ph&aacute;t sinh th&ecirc;m chi ph&iacute; kh&aacute;c như ph&iacute; vận chuyển, phụ ph&iacute; h&agrave;ng cồng kềnh, ...</p>', 7, 14, 1, 1, 1, '2021-03-17 06:25:37', '2021-03-23 19:10:18', 'tao-gala-1-kg-6-trai', NULL, '9'),
(25, '1 KÍ XOÀI SẤY LOẠI 1 SIÊU NGON_ĂN LÀ MÊ', 'public/uploads/0333a1e3ade6285399213c52352d5b6a.jpg', 'ISMART-BS5CB', '190000.0000', '180000.0000', '<p>[FREESHIP+GIAO H&Agrave;NG SI&Ecirc;U TỐC] 1KG XO&Agrave;I SẤY DẺO TỰ NHI&Ecirc;N_ THƠM NGON_KH&Ocirc;NG ĐƯỜNG_NGỌT TỰ NHI&Ecirc;N</p>', '<p>🍋🍋 LẠ MIỆNG VỚI XO&Agrave;I SẤY DẺO 🍋🍋 🌸 Xo&agrave;i được sấy theo phương ph&aacute;p SẤY LẠNH n&ecirc;n miếng xo&agrave;i vẫn giữ đc vị ngọt thanh, chua nhẹ cũng như hương vị đặc trưng của tr&aacute;i xo&agrave;i tươi. 🌱V&agrave; tr&ecirc;n hết xo&agrave;i l&agrave; một loại tr&aacute;i c&acirc;y chứa nhiều canxi rất tốt cho cơ thể đặc biệt l&agrave; c&aacute;c mẹ bầu. 🌱D&ugrave; đ&atilde; đc sấy nhưng vẫn giữ được to&agrave;n bộ vitamin trong quả xo&agrave;i n&ecirc;n rất tiện cho cả nh&agrave; mua để d&ugrave;ng ăn dần. Đặc biệt l&agrave; c&aacute;c mẹ bầu đang trong thời k&igrave; ngh&eacute;n hoặc muốn bổ sung canxi cho con theo đường ăn uống 👍🏻 💕Xo&agrave;i sấy dẻo kh&ocirc;ng qu&aacute; kh&ocirc;, dẻo dẻo, dai dai, vẫn giữ đc m&agrave;u v&agrave;ng tự nhi&ecirc;n của tr&aacute;i xo&agrave;i, kh&ocirc;ng c&oacute; bất kỳ phẩm m&agrave;u ho&aacute; chất hay chất bảo quản n&agrave;o kh&aacute;c. 🌍 Quy c&aacute;ch đ&oacute;ng g&oacute;i: Đóng gói túi zip bạc 500 gram, c&oacute; tem nh&atilde;n. 🌍 Xoài s&acirc;́y dẻo b&ecirc;n mình được sản xuất theo d&acirc;y chuyền c&ocirc;ng nghệ hiện đại, đảm bảo chất lượng v&agrave; hương vị thơm ngon, an to&agrave;n cho mọi người sử dụng. 🌍 Hạn sử dụng : 6 th&aacute;ng kể từ ng&agrave;y đ&oacute;ng g&oacute;i 🌍 Ng&agrave;y sx: in tr&ecirc;n bao b&igrave; 🌍 HDSD: Sử dụng ngay kh&ocirc;ng cần chế biến 🌍Xuất xứ: H&ocirc;̀ Chí Minh - Vi&ecirc;̣t Nam. Bảo quản: nơi kh&ocirc; tho&aacute;ng H&Agrave;I L&Ograve;NG CỦA KH&Aacute;CH - NIỀM VUI CỦA CHUỘT Hotline hỗ trợ : 0364566395 (Em Hằng) Địa chỉ : số 4, đường số 10, Hiệp B&igrave;nh Ch&aacute;nh, Thủ Đức San phẩm bảo h&agrave;nh c&oacute; đổi trả nếu kh&ocirc;ng ngon nh&eacute;</p>', 7, 14, 1, 4, 1, '2021-03-20 20:01:44', '2021-03-23 19:29:23', '1-ki-xoai-say-loai-1-sieu-ngon-an-la-me', NULL, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `roles_title`) VALUES
(1, 'Admintrator', NULL, NULL, 'Quản lý toàn bộ sản phẩm, bài viết và thành viên.'),
(2, 'Editor', NULL, NULL, 'Thêm, sửa, xóa, cập nhật bài viết, sản phẩm.'),
(3, 'Author', NULL, NULL, 'Thêm bài viết, sản phẩm.'),
(4, 'Subcriber', NULL, NULL, 'Xem danh sách bài viết, sản phẩm.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `img_slider`, `user_id`, `status_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Slider 1', 'public/uploads/1.png', 14, 1, '2021-03-13 08:34:08', '2021-03-18 03:17:20', NULL),
(3, 'Slider 2', 'public/uploads/2.png', 14, 1, '2021-03-14 07:39:07', '2021-03-18 03:17:20', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status2_products`
--

CREATE TABLE `status2_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status2_products`
--

INSERT INTO `status2_products` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Còn hàng', NULL, NULL),
(2, 'Hết hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Công khai', NULL, NULL),
(2, 'Chờ duyệt', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_orders`
--

CREATE TABLE `status_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status_orders`
--

INSERT INTO `status_orders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chờ Duyệt', NULL, NULL),
(2, 'Đang xử lý', NULL, NULL),
(3, 'Đang vận chuyển', NULL, NULL),
(4, 'Thành công', NULL, NULL),
(5, 'Huỷ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_products`
--

CREATE TABLE `status_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status_products`
--

INSERT INTO `status_products` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nổi bật', NULL, NULL),
(2, 'Bán chạy', NULL, NULL),
(3, 'Mới', NULL, NULL),
(4, 'Bình thường', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `deleted_at`, `phone`) VALUES
(12, 'Cấn Quang Chiến', 'duyhuynh.hqd@gmail.com', NULL, '$2y$10$tiu6RAEY70YTbwo6zwRPeOYBczGCncN8xBtC/1.lDiZfFaM2bV2n.', NULL, '2021-03-04 22:25:49', '2021-03-07 19:17:45', 4, NULL, '0923499282'),
(13, 'Đăng Nguyễn', 'admin123@gmail.com', NULL, '$2y$10$ctvn1lXJ1e6eRrBt.KNXJurhL3k/OtZOVT4KpJcesJ/TIeDI1GBEG', NULL, '2021-03-04 22:31:01', '2021-03-06 04:47:16', 4, '2021-03-06 04:47:16', '0923499280'),
(14, 'Nguyễn Chí Trung', 'trung9ckk@gmail.com', NULL, '$2y$10$5DB13mitmOkY0BoOYtWSb.upTsBj.Eo.MnNZQu8dcQqKk7iCD71dK', NULL, '2021-03-05 05:42:39', '2021-03-05 18:28:51', 1, NULL, '0923499280'),
(15, 'Bùi Tiến Đạt', 'dat9119c@gmail.com', NULL, '$2y$10$gBCSEvBloMFE0beVI6Mhq.ObNxnUfqfAcMhK/BUdZMGSlqet.zcOy', NULL, '2021-03-07 19:20:53', '2021-03-07 19:20:53', 4, NULL, '0923499283'),
(16, 'Nguyễn Mạnh Cường', 'cuong123@gmail.com', NULL, '$2y$10$7FhkRJQ5DGuxKXU1aX9OdeDpmwDXnxD8ESSkb7ctSc09Agt5l8NM6', NULL, '2021-03-16 19:03:29', '2021-03-16 19:03:29', 4, NULL, '0923499280');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categary_posts`
--
ALTER TABLE `categary_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categary_posts_status_id_foreign` (`status_id`),
  ADD KEY `categary_posts_user_id_foreign` (`user_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Chỉ mục cho bảng `categary_products`
--
ALTER TABLE `categary_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categary_products_status_id_foreign` (`status_id`),
  ADD KEY `categary_products_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_product_id_foreign` (`product_id`),
  ADD KEY `detail_orders_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `detail_product_images`
--
ALTER TABLE `detail_product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_status_order_foreign` (`status_order`),
  ADD KEY `orders_pay_id_foreign` (`pay_id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_status_id_foreign` (`status_id`),
  ADD KEY `pages_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_categary_id_foreign` (`categary_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_status_id_foreign` (`status_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categary_id_foreign` (`categary_id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_status_id_foreign` (`status_id`),
  ADD KEY `products_status_product_id_foreign` (`status_product_id`),
  ADD KEY `products_status2_product_id_foreign` (`status2_product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_user_id_foreign` (`user_id`),
  ADD KEY `sliders_status_id_foreign` (`status_id`);

--
-- Chỉ mục cho bảng `status2_products`
--
ALTER TABLE `status2_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_orders`
--
ALTER TABLE `status_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_products`
--
ALTER TABLE `status_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categary_posts`
--
ALTER TABLE `categary_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `categary_products`
--
ALTER TABLE `categary_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `detail_product_images`
--
ALTER TABLE `detail_product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `status2_products`
--
ALTER TABLE `status2_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `status_products`
--
ALTER TABLE `status_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categary_posts`
--
ALTER TABLE `categary_posts`
  ADD CONSTRAINT `categary_posts_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categary_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `categary_products`
--
ALTER TABLE `categary_products`
  ADD CONSTRAINT `categary_products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categary_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `detail_product_images`
--
ALTER TABLE `detail_product_images`
  ADD CONSTRAINT `detail_product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_pay_id_foreign` FOREIGN KEY (`pay_id`) REFERENCES `pays` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_status_order_foreign` FOREIGN KEY (`status_order`) REFERENCES `status_orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_categary_id_foreign` FOREIGN KEY (`categary_id`) REFERENCES `categary_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categary_id_foreign` FOREIGN KEY (`categary_id`) REFERENCES `categary_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_status2_product_id_foreign` FOREIGN KEY (`status2_product_id`) REFERENCES `status2_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_status_product_id_foreign` FOREIGN KEY (`status_product_id`) REFERENCES `status_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sliders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
