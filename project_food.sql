-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 06, 2021 lúc 11:47 AM
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
(12, '2021_03_05_142820_add_softdelete_to_pages_table', 9);

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
(1, 'Giới thiệu', 'gioi-thieu', '<div class=\"section-head clearfix\">\r\n<h3 class=\"section-title\">Giới Thiệu</h3>\r\n</div>\r\n<div class=\"section-detail\">\r\n<div class=\"detail\">\r\n<p>Cửa h&agrave;ng c&ocirc;ng nghệ ISMART được th&agrave;nh lập th&aacute;ng 9 năm 2020, l&agrave; cửa h&agrave;ng chuy&ecirc;n bu&ocirc;n b&aacute;n c&aacute;c sản phẩm chất lượng ch&iacute;nh h&atilde;ng v&agrave; c&aacute;c phụ kiện chuy&ecirc;n dụng cho c&aacute;c sản phẩm điện thoại, laptop &hellip;</p>\r\n<p>ISMART lu&ocirc;n tập trung x&acirc;y dựng dịch vụ kh&aacute;ch h&agrave;ng kh&aacute;c biệt với chất lượng vượt trội, ph&ugrave; hợp với văn ho&aacute;, đặt kh&aacute;ch h&agrave;ng l&agrave;m trung t&acirc;m trong mọi suy nghĩ v&agrave; h&agrave;nh động của cửa h&agrave;ng.ISMART sẽ cung cấp tới mọi tầng lớp kh&aacute;ch h&agrave;ng những trải nghiệm mua sắm t&iacute;ch cực, th&ocirc;ng qua c&aacute;c sản phẩm Kỹ thuật số ch&iacute;nh h&atilde;ng chất lượng cao, gi&aacute; cả cạnh tranh đi k&egrave;m dịch vụ chăm s&oacute;c kh&aacute;ch h&agrave;ng th&acirc;n thiện, được đảm bảo bởi uy t&iacute;n của doanh nghiệp.</p>\r\n<p><img class=\"border-0\" src=\"http://thanh.unitopcv.com/unimart/public/storage/photos/20/cac-phien-ban-dien-thoai-iphone-11.jpg\" alt=\"\" /></p>\r\n<p>Thế mạnh l&agrave;m n&ecirc;n thương hiệu ISmart kh&aacute;c biệt ch&iacute;nh l&agrave;: Sự chuy&ecirc;n m&ocirc;n h&oacute;a trong từng bộ phận, t&iacute;nh tr&aacute;ch nhiệm cao c&ugrave;ng những gi&aacute;m s&aacute;t kỹ thuật l&agrave;m việc nghi&ecirc;m t&uacute;c, Lu&ocirc;n đi đầu trong việc g&acirc;y dựng uy t&iacute;n, tr&aacute;ch nhiệm để đảm bảo chất lượng sản phẩm,cam kết đặt KH&Aacute;CH H&Agrave;NG L&Agrave;M TRUNG T&Acirc;M trong mọi suy nghĩ v&agrave; h&agrave;nh động của m&igrave;nh. Ngo&agrave;i ra, c&aacute;c bộ phận thường xuy&ecirc;n trao đổi c&ocirc;ng việc, chia sẻ những kh&oacute; khăn, s&aacute;ng kiến x&acirc;y dựng n&ecirc;n một tập thể ISMART lu&ocirc;n lu&ocirc;n năng động, thấu hiểu kh&aacute;ch h&agrave;ng, chuy&ecirc;n nghiệp hơn trong từng dự &aacute;n ch&uacute;ng t&ocirc;i tham gia.</p>\r\n<p>Với phương ch&acirc;m &ldquo; Hợp t&aacute;c để c&ugrave;ng th&agrave;nh c&ocirc;ng c&ugrave;ng ph&aacute;t triển&rdquo;, v&agrave; định hướng &ldquo;Li&ecirc;n tục cải tiến&rdquo; mang đến cho kh&aacute;ch h&agrave;ng sự th&acirc;n thiện v&agrave; t&iacute;ch cực trong c&aacute;c hoạt động, dịch vụ, tr&aacute;ch nhiệm của từng c&aacute; nh&acirc;n. ISMART đ&atilde; lu&ocirc;n nỗ lực cả về nh&acirc;n lực, vật lực, x&acirc;y dựng uy t&iacute;n thương hiệu, niềm tin với kh&aacute;ch h&agrave;ng trong từng sản phẩm ch&uacute;ng t&ocirc;i cung cấp.</p>\r\n<p>Sự tin tưởng v&agrave; ủng hộ của kh&aacute;ch h&agrave;ng trong suốt thời gian qua l&agrave; nguồn động vi&ecirc;n to lớn tr&ecirc;n bước đường ph&aacute;t triển của ISMART. Ch&uacute;ng t&ocirc;i xin hứa sẽ kh&ocirc;ng ngừng ho&agrave;n thiện, phục vụ kh&aacute;ch h&agrave;ng tốt nhất để lu&ocirc;n xứng đ&aacute;ng với niềm tin ấy.</p>\r\n</div>\r\n</div>\r\n<p>\"</p>\r\n<p>\"</p>', 1, 14, '2021-03-05 07:08:00', '2021-03-05 23:21:18', NULL),
(2, 'Liên hệ', 'lien-he', '<h3><strong>Li&ecirc;n hệ</strong></h3>\r\n<p>Cũng giống như Shopee, Lazada, Sendo... ISMART cũng l&agrave; một trong những doanh nghiệp thương mại điện tử h&agrave;ng đầu tại Việt Nam. C&oacute; lẽ với người ti&ecirc;u d&ugrave;ng, ISMART đ&atilde; trở l&ecirc;n qu&aacute; quen thuộc. Nhưng đến b&acirc;y giờ phần lớn người ti&ecirc;u d&ugrave;ng kể cả người b&aacute;n lẫn người mua vẫn chưa biết c&aacute;ch li&ecirc;n hệ với trung t&acirc;m&nbsp;<strong>chăm s&oacute;c kh&aacute;ch h&agrave;ng của ISMART&nbsp;</strong>để nhận hỗ trợ những vấn đề thắc mắc, kh&oacute; khăn. Vậy li&ecirc;n hệ với tổng đ&agrave;i ISMART như thế n&agrave;o, c&oacute; đơn giản kh&ocirc;ng v&agrave; người ti&ecirc;u d&ugrave;ng được hỗ trợ những vấn đề g&igrave;? C&acirc;u trả lời c&oacute; trong b&agrave;i viết dưới đ&acirc;y, h&atilde;y theo d&otilde;i nh&eacute;.</p>\r\n<h4><strong>C&aacute;c c&aacute;ch li&ecirc;n hệ với tổng đ&agrave;i ISMART để nhận hỗ trợ</strong></h4>\r\n<p>Nếu bạn đang muốn gọi đến số tổng đ&agrave;i của Tiki để được trợ gi&uacute;p v&agrave; hỏi đ&aacute;p h&atilde;y li&ecirc;n hệ với họ theo c&aacute;c th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i cung cấp dưới đ&acirc;y.</p>\r\n<ul>\r\n<li class=\"first\">Số điện thoại của tổng đ&agrave;i ISMART (8h&ndash;21h): 1900 0000. Nếu kh&ocirc;ng gọi được đến số tổng đ&agrave;i của Tiki th&igrave; bạn c&oacute; thể liện hệ với họ qua số điện thoại kh&aacute;c đ&oacute; l&agrave;: 0786.373.447</li>\r\n<li>Li&ecirc;n lạc qua email: Truy cập&nbsp;<a href=\"https://quocduy.unitopcv.com/2/gioi-thieu.html\">duyhuynh.hqd@gmail.com</a>, khi li&ecirc;n lạc qua Email bạn vẫn được ISMART trả lời một c&aacute;ch nhanh ch&oacute;ng v&agrave; thỏa đ&aacute;ng.</li>\r\n<li>Nếu bạn l&agrave; đối t&aacute;c c&oacute; nhu cầu hợp t&aacute;c quảng c&aacute;o hoặc kinh doanh với ISMART h&atilde;y li&ecirc;n hệ v&agrave;o địa chỉ n&agrave;y:&nbsp;<strong>marketing@ISMART.vn</strong></li>\r\n<li>Địa chỉ nhận h&agrave;ng đổi/trả/bảo h&agrave;nh của ISMART : Trung t&acirc;m xử l&yacute; đơn h&agrave;ng ISMART&ndash; 367/F370 Đường Văn Ph&uacute; -Quận H&agrave; Đ&ocirc;ng - H&agrave; Nội (Tham khảo hướng dẫn đổi, trả, bảo h&agrave;nh hoặc li&ecirc;n hệ 1900-6035 để được hướng dẫn trước khi gửi sản phẩm về ISMART )</li>\r\n<li class=\"last\">Văn ph&ograve;ng của ISMART : Đường Văn Ph&uacute; -Quận H&agrave; Đ&ocirc;ng - H&agrave; Nội.</li>\r\n</ul>\r\n<p>Cước ph&iacute; cho mỗi cuộc gọi l&ecirc;n tổng đ&agrave;i l&agrave; 1000đ/ph&uacute;t nh&eacute;.</p>', 1, 14, '2021-03-05 18:20:18', '2021-03-05 23:21:18', NULL),
(3, 'Chính Sách Bảo Hành', 'chinh-sach-bao-hanh', '<p><strong>Ismart</strong>&nbsp;rất lấy l&agrave;m tiếc v&agrave; th&agrave;nh thật xin lỗi qu&yacute; kh&aacute;ch h&agrave;ng trong trường hợp điện thoại, m&aacute;y t&iacute;nh bảng của qu&yacute; kh&aacute;ch bị hỏng v&agrave; phải mang đi bảo h&agrave;nh. Hệ thống Di Động Việt mang đến 02 ch&iacute;nh s&aacute;ch bảo h&agrave;nh: bảo h&agrave;nh ti&ecirc;u chuẩn v&agrave; bảo h&agrave;nh mở rộng.</p>\r\n<p><strong>Bảo h&agrave;nh ti&ecirc;u chuẩn</strong>&nbsp;nổi bật với chế độ&nbsp;<strong>d&ugrave;ng thử 07 ng&agrave;y</strong>,&nbsp;<strong>1 đổi 1 trong 33 ng&agrave;y</strong>.&nbsp;<strong>Bảo h&agrave;nh mở rộng</strong>&nbsp;nổi bật với ch&iacute;nh s&aacute;ch&nbsp;<strong>1 đổi 1 rơi vỡ</strong>,&nbsp;<strong>rớt nước, bảo h&agrave;nh tận nh&agrave;</strong>. Cả 2 ch&iacute;nh s&aacute;ch đều được Di Động Việt hỗ trợ tiếp nhận niềm nở, xử l&yacute; nhanh ch&oacute;ng, đem đến sự h&agrave;i l&ograve;ng cho kh&aacute;ch h&agrave;ng.</p>\r\n<p><strong>Chi tiết ch&iacute;nh s&aacute;ch bảo h&agrave;nh tại hệ thống Di Động Việt:</strong></p>\r\n<p>I. D&Ugrave;NG THỬ 7 NG&Agrave;Y MIỄN PH&Iacute;</p>\r\n<p>II. CH&Iacute;NH S&Aacute;CH BẢO H&Agrave;NH TI&Ecirc;U CHUẨN</p>\r\n<p>III. BẢO H&Agrave;NH MỞ RỘNG</p>\r\n<p>Ngo&agrave;i g&oacute;i bảo h&agrave;nh ti&ecirc;u chuẩn (mặc định), tại Di Động Việt qu&yacute; kh&aacute;ch h&agrave;ng được chọn th&ecirc;m g&oacute;i bảo h&agrave;nh mở rộng: Rơi vỡ, rớt nước với những quyền lợi bảo h&agrave;nh vượt trội. Nổi bật như:&nbsp;Bảo h&agrave;nh tận nh&agrave;, bảo h&agrave;nh ngay cả khi rơi vỡ, rớt bể, được&nbsp;mượn m&aacute;y kh&aacute;c sử dụng trong thời gian bảo h&agrave;nh, 1 đổi 1 trong 1 năm...</p>\r\n<p><img title=\"quyen-loi-bao-hanh-didongviet\" src=\"https://didongviet.vn/pub/media/wysiwyg/bao-hanh/bao_hanh.jpg\" /></p>\r\n<h3 id=\"dung-thu-7-ngay\">I. D&Ugrave;NG THỬ 7 NG&Agrave;Y MIỄN PH&Iacute;</h3>\r\n<div>\r\n<ul>\r\n<li>Tất cả điện thoại, m&aacute;y t&iacute;nh bảng đ&atilde; qua sử dụng.</li>\r\n<li>Qu&yacute; kh&aacute;ch ho&agrave;n to&agrave;n thoải m&aacute;i trải nghiệm sản phẩm trong 7 ng&agrave;y đầu ti&ecirc;n.</li>\r\n<li>Nếu sản phẩm bị lỗi hoặc kh&ocirc;ng ph&ugrave; hợp với nhu cầu sử dụng, Qu&yacute; kh&aacute;ch c&oacute; thể y&ecirc;u cầu đổi 1 sản phẩm kh&aacute;c hoặc nhận lại tiền 100% gi&aacute; trị sản phẩm.</li>\r\n</ul>\r\n<strong>Lưu &yacute;</strong>:&nbsp;M&aacute;y đổi trả phải giữ nguy&ecirc;n hiện trạng ban đầu, kh&ocirc;ng c&oacute; dấu hiệu trầy cấn, m&oacute;p, rơi vỡ, v&agrave;o nước, d&iacute;nh t&agrave;i khoản, mất v&acirc;n tay v&agrave; c&ograve;n đầy đủ phụ kiện đi k&egrave;m.</div>\r\n<h3 id=\"doi-moi-33-ngay\">II. CH&Iacute;NH S&Aacute;CH BẢO H&Agrave;NH TI&Ecirc;U CHUẨN</h3>\r\n<p>C&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, Qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể tới trực tiếp c&aacute;c TTBH ch&iacute;nh h&atilde;ng; Trung t&acirc;m Bảo h&agrave;nh ủy quyền Viện Di Động hoặc c&oacute; thể đến trực tiếp c&aacute;c cửa h&agrave;ng của Di Động Việt để được tiếp nhận gửi m&aacute;y bảo h&agrave;nh ch&iacute;nh h&atilde;ng.</p>\r\n<p>Y&ecirc;u cầu tiếp nhận bảo h&agrave;nh t&ugrave;y theo quy định của từng h&atilde;ng, chi tiết c&oacute; trong bảng sau:</p>\r\n<p><img src=\"https://didongviet.vn/pub/media/wysiwyg/bao-hanh/bao-hanh-tieu-chuan.jpg\" alt=\"\" /></p>\r\n<p><strong>Điều kiện đổi trả</strong></p>\r\n<ul>\r\n<li>M&aacute;y: Giữ nguy&ecirc;n hiện trạng ban đầu, kh&ocirc;ng trầy xướt, kh&ocirc;ng d&aacute;n decal, h&igrave;nh trang tr&iacute;. M&aacute;y cũ c&oacute; t&igrave;nh trạng sản phẩm như l&uacute;c mới mua.&nbsp;</li>\r\n<li>Đối với c&aacute;c sản phẩm Apple Watch: kh&ocirc;ng bảo h&agrave;nh c&aacute;c trường hợp về&nbsp;nguồn, m&agrave;n h&igrave;nh, rơi vỡ, v&agrave;o nước, cấn m&oacute;p, c&oacute; t&aacute;c động ngoại lực...</li>\r\n<li>Hộp: Như mới, kh&ocirc;ng m&oacute;p m&eacute;o, r&aacute;ch, vỡ, bị viết, vẽ, quấn băng d&iacute;nh, keo; c&oacute; Serial/IMEI tr&ecirc;n hộp tr&ugrave;ng với th&acirc;n m&aacute;y (mất hộp trừ ph&iacute; 2%).&nbsp;</li>\r\n<li>Phụ kiện v&agrave; qu&agrave; tặng: C&ograve;n đầy đủ, nguy&ecirc;n vẹn, kh&ocirc;ng m&oacute;p m&eacute;o trầy xước hoặc bị hư hại trong qu&aacute; tr&igrave;nh sử dụng.&nbsp;</li>\r\n<li>T&agrave;i khoản: M&aacute;y đ&atilde; đ&atilde; được đăng xuất khỏi tất cả c&aacute;c t&agrave;i khoản như: iCloud, Google Account, Mi Account&hellip;</li>\r\n</ul>\r\n<div><strong>Lưu &yacute;:&nbsp;</strong></div>\r\n<div>\r\n<ul>\r\n<li>Việc đổi m&aacute;y c&oacute; thể kh&ocirc;ng đ&uacute;ng với m&agrave;u sắc như sản phẩm ban đầu&nbsp;</li>\r\n<li>Di Động Việt từ chối bảo h&agrave;nh c&aacute;c lỗi kh&ocirc;ng thể khắc phục được: Mất dữ liệu, mất Touch ID, mất Face ID, d&iacute;nh t&agrave;i khoản iCloud, MiCloud, SamsungCloud. M&aacute;y bị cong sườn, cong main, dập n&aacute;t, ch&aacute;y nổ.&nbsp;</li>\r\n<li>C&aacute;c vấn đề về thẩm mỹ b&ecirc;n ngo&agrave;i như cấn, m&oacute;p, tr&oacute;c sơn, trầy xước, sẽ kh&ocirc;ng thuộc phạm vi bảo h&agrave;nh.&nbsp;</li>\r\n<li>M&aacute;y bị can thiệp phần cứng m&agrave; kh&ocirc;ng c&oacute; chỉ định từ NSX hoặc Di Động Việt/ Viện Di Động</li>\r\n</ul>\r\n</div>\r\n<h3 id=\"chinh-sach-bao-hanh-tieu-chuan\">III. BẢO H&Agrave;NH MỞ RỘNG</h3>\r\n<p><img title=\"chinh-sach-bao-hanh-mo-rong\" src=\"https://didongviet.vn/pub/media/wysiwyg/bao-hanh/image_2020_08_25T10_09_07_919Z.png\" /></p>\r\n<p>Kh&aacute;ch h&agrave;ng cần th&ecirc;m th&ocirc;ng tin vui l&ograve;ng CALL TRỰC TIẾP số HOTLINE&nbsp;<strong>123 45678(miễn ph&iacute;)</strong>&nbsp;hoặc inbox v&agrave;o fanpage&nbsp;<a href=\"https://www.facebook.com/didongviet/\">https://www.facebook.com/ismart/</a>&nbsp;hoặc website&nbsp;<a href=\"http://www.didongviet.vn/\">http://www.didongviet.vn/</a>.</p>\r\n<p>Ban QL <a href=\"http://www.didongviet.vn/\">cửa h&agrave;ng C&ocirc;ng nghệ Ismart</a>&nbsp;xin ch&acirc;n th&agrave;nh cảm ơn!</p>\r\n<h5><strong>Nguồn:Di động việt</strong></h5>\r\n<p>\"</p>\r\n<p>\"</p>\r\n<p>\"</p>', 1, 14, '2021-03-05 18:21:10', '2021-03-05 23:21:18', NULL),
(5, 'Trung Nguyễn', 'sadas', '<p>đấ</p>', 1, 14, '2021-03-05 23:22:43', '2021-03-05 23:29:12', '2021-03-05 23:29:12');

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
(12, 'Nguyễn Hữu Đạt', 'duyhuynh.hqd@gmail.com', NULL, '$2y$10$tiu6RAEY70YTbwo6zwRPeOYBczGCncN8xBtC/1.lDiZfFaM2bV2n.', NULL, '2021-03-04 22:25:49', '2021-03-04 22:27:21', 4, NULL, '0923499282'),
(13, 'Đăng Nguyễn', 'admin123@gmail.com', NULL, '$2y$10$ctvn1lXJ1e6eRrBt.KNXJurhL3k/OtZOVT4KpJcesJ/TIeDI1GBEG', NULL, '2021-03-04 22:31:01', '2021-03-04 22:31:01', 4, NULL, '0923499280'),
(14, 'Nguyễn Chí Trung', 'trung9ckk@gmail.com', NULL, '$2y$10$5DB13mitmOkY0BoOYtWSb.upTsBj.Eo.MnNZQu8dcQqKk7iCD71dK', NULL, '2021-03-05 05:42:39', '2021-03-05 18:28:51', 1, NULL, '0923499280');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
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
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
