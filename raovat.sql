-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2014 at 11:31 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_raovat`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_type` tinyint(3) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `root`, `name`, `slug`, `description`, `page_title`, `content_tag`, `category_type`, `order`) VALUES
(1, 0, 'Điện thoại', 'dien-thoai', 'Test', 'Test Category', 'Test Category', 0, 0),
(2, 0, 'Máy tính', 'may-tinh', 'Test', 'Test Category', 'Test Category', 0, 1),
(3, 0, 'Máy ảnh, Máy quay', 'may-anh-may-quay', 'Test', 'Test Category', 'Test Category', 0, 2),
(4, 0, 'Ô tô và xe chuyên dụng', 'oto-xe-chuyen-dung', 'Test', 'Test Category', 'Test Category', 0, 3),
(5, 0, 'Xe máy', 'xe-may', 'Test', 'Test Category', 'Test Category', 0, 4),
(6, 0, 'Điện tử và gia dụng', 'dien-tu-gia-dung', 'Test', 'Test Category', 'Test Category', 0, 5),
(7, 0, 'Thời trang', 'thoi-trang', 'Test', 'Test Category', 'Test Category', 0, 6),
(8, 0, 'Du lịch, dịch vụ', 'du-lich-dich-vu', 'Test', 'Test Category', 'Test Category', 0, 7),
(9, 0, 'Nội, ngoại thất', 'noi-ngoai-that', 'Test', 'Test Category', 'Test Category', 0, 8),
(10, 0, 'Thiết bị văn phòng', 'thiet-bi-van-phong', 'Test', 'Test Category', 'Test Category', 0, 9),
(11, 0, 'Thủ công, mỹ nghệ', 'thu-cong-my-nghe', 'Test', 'Test Category', 'Test Category', 0, 10),
(12, 0, 'Máy móc, thiết bị', 'may-moc-thiet-bi', 'Test', 'Test Category', 'Test Category', 0, 11),
(13, 0, 'Xây dựng, Bất động sản', 'xay-dung-bat-dong-san', 'Test', 'Test Category', 'Test Category', 0, 12),
(14, 0, 'Thể thao & Giải trí', 'the-thao-giai-tri', 'Test', 'Test Category', 'Test Category', 0, 13),
(15, 0, 'Sức khỏe, y tế', 'suc-khoe-y-te', 'Test', 'Test Category', 'Test Category', 0, 14),
(16, 0, 'Nhà hàng, khách sạn', 'nha-hang-khach-san', 'Test', 'Test Category', 'Test Category', 0, 15),
(17, 0, 'Sản phẩm Nông nghiệp', 'san-pham-nong-nghiep', 'Test', 'Test Category', 'Test Category', 0, 16),
(18, 0, 'Lao động, việc làm', 'lao-dong-viec-lam', 'Test', 'Test Category', 'Test Category', 0, 17),
(19, 0, 'Hóa chất', 'hoa-chat', 'Test', 'Test Category', 'Test Category', 0, 18),
(20, 0, 'Sản phẩm khác', 'khac', 'Test', 'Test Category', 'Test Category', 0, 19),
(21, 1, 'Điện thoại-1', 'dien-thoai-1', 'Test', 'Test Category', 'Test Category', 0, 0),
(22, 1, 'Điện thoại-2', 'dien-thoai-2', 'Test', 'Test Category', 'Test Category', 0, 0),
(23, 1, 'Điện thoại-3', 'dien-thoai-3', 'Test', 'Test Category', 'Test Category', 0, 0),
(24, 21, 'Điện thoại-1-1', 'dien-thoai-1-1', 'Test', 'Test Category', 'Test Category', 0, 0),
(25, 21, 'Điện thoại-1-2', 'dien-thoai-1-2', 'Test', 'Test Category', 'Test Category', 0, 0),
(26, 21, 'Điện thoại-1-3', 'dien-thoai-1-3', 'Test', 'Test Category', 'Test Category', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_approver`
--

DROP TABLE IF EXISTS `category_approver`;
CREATE TABLE IF NOT EXISTS `category_approver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'An Giang'),
(2, 'Bà Rịa-Vũng Tàu'),
(3, 'Bạc Liêu'),
(4, 'Bắc Kạn'),
(5, 'Bắc Giang'),
(6, 'Bắc Ninh'),
(7, 'Bến Tre'),
(8, 'Bình Dương'),
(9, 'Bình Định'),
(10, 'Bình Phước'),
(11, 'Bình Thuận'),
(12, 'Cà Mau'),
(13, 'Cao Bằng'),
(14, 'Cần Thơ'),
(15, 'Đà Nẵng'),
(16, 'Đắk Lắk'),
(17, 'Đắk Nông'),
(18, 'Điện Biên'),
(19, 'Đồng Nai'),
(20, 'Đồng Tháp'),
(21, 'Gia Lai'),
(22, 'Hà Giang'),
(23, 'Hà Nam'),
(24, 'Hà Nội'),
(25, 'Hà Tây'),
(26, 'Hà Tĩnh'),
(27, 'Hải Dương'),
(28, 'Hải Phòng'),
(29, 'Hòa Bình'),
(30, 'Hồ Chí Minh'),
(31, 'Hậu Giang'),
(32, 'Hưng Yên'),
(33, 'Khánh Hòa'),
(34, 'Kiên Giang'),
(35, 'Kon Tum'),
(36, 'Lai Châu'),
(37, 'Lào Cai'),
(38, 'Lạng Sơn'),
(39, 'Lâm Đồng'),
(40, 'Long An'),
(41, 'Nam Định'),
(42, 'Nghệ An'),
(43, 'Ninh Bình'),
(44, 'Ninh Thuận'),
(45, 'Phú Thọ'),
(46, 'Phú Yên'),
(47, 'Quảng Bình'),
(48, 'Quảng Nam'),
(49, 'Quảng Ngãi'),
(50, 'Quảng Ninh'),
(51, 'Quảng Trị'),
(52, 'Sóc Trăng'),
(53, 'Sơn La'),
(54, 'Tây Ninh'),
(55, 'Thái Bình'),
(56, 'Thái Nguyên'),
(57, 'Thanh Hóa'),
(58, 'Thừa Thiên - Huế'),
(59, 'Tiền Giang'),
(60, 'Trà Vinh'),
(61, 'Tuyên Quang'),
(62, 'Vĩnh Long'),
(63, 'Vĩnh Phúc'),
(64, 'Yên Bái');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'test3', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE IF NOT EXISTS `friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  UNIQUE KEY `city_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_meta`
--

DROP TABLE IF EXISTS `post_meta`;
CREATE TABLE IF NOT EXISTS `post_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `city_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `manufacturer`, `image`, `description`, `page_title`, `content_tag`, `date`, `city_id`, `author_id`, `status`) VALUES
(2, 'test', 'test', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(3, 'test', 'test-3', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(4, 'test', 'test-4', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(5, 'test', 'test-5', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(6, 'test', 'test-6', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(7, 'test', 'test-7', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(8, 'test', 'test-8', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(9, 'test', 'test-9', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(10, 'test', 'test-10', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(11, 'test', 'test-11', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(12, 'test', 'test-12', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(13, 'test', 'test-13', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(14, 'test', 'test-14', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(15, 'test', 'test-15', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(16, 'test', 'test-16', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(17, 'test', 'test-17', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(18, 'test', 'test-18', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(19, 'test', 'test-19', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(20, 'test', 'test-20', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(21, 'test', 'test-21', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(22, 'test', 'test-22', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(23, 'test', 'test-23', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(24, 'test', 'test-24', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(25, 'test', 'test-25', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(26, 'test', 'test-26', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(27, 'test', 'test-27', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1),
(28, 'test', 'test-28', 39.999, 'test', 'a952a-harley1c-large.jpg', '<p>\r\n	test</p>\r\n', 'test', 'test', '2014-06-10 16:23:38', 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_meta`
--

DROP TABLE IF EXISTS `product_meta`;
CREATE TABLE IF NOT EXISTS `product_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `is_activate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `gender`, `first_name`, `middle_name`, `last_name`, `dob`, `email`, `phone`, `address`, `avatar`, `role`, `is_activate`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 'Admin', '', 'User', '2014-06-12', 'admin@admin.com', '0978104924', 'Ha Noi', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

DROP TABLE IF EXISTS `user_meta`;
CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
