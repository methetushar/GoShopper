-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 03:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eccomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `administrator_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administrator_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administrator_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `administrator_name`, `administrator_email`, `administrator_password`, `created_at`, `updated_at`) VALUES
(12, 'Ariyat sinha', 'tusharahmed@gmail.com', '123456', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`, `publish_status`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 'Albiro', 'Albiro', 1, '8', NULL, NULL),
(3, 'Adidas', 'World Wide', 1, '13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `publish_status`, `created_at`, `updated_at`) VALUES
(1, 'Women', 'Women', '1', NULL, NULL),
(2, 'shoes', 'shoes', '1', NULL, NULL),
(3, 'bags', 'bags', '1', NULL, NULL),
(4, 'Men', 'men', '1', NULL, NULL),
(5, 'Electrics', 'Electrics', '1', NULL, NULL),
(6, 'Shirt', 'Shirt', '1', NULL, NULL),
(7, 'T-Shirt', 'T-Shirt', '1', NULL, NULL),
(8, 'Furniture', 'Furniture', '1', NULL, NULL),
(9, 'Mobile', 'mobile', '1', NULL, NULL),
(10, 'football', 'It\'s for play', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_register`
--

CREATE TABLE `customer_register` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_number` int(11) NOT NULL DEFAULT '13',
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_register`
--

INSERT INTO `customer_register` (`id`, `customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_number`, `token`, `created_at`, `updated_at`) VALUES
(42, 8160, 'Ariyat Sinha', 'rt.tusharahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1734627035, 'GvlC6tYGfiTM8V9p1zAMP3ggt79g3D7nYMrcIF0s', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `details_of_order`
--

CREATE TABLE `details_of_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details_of_order`
--

INSERT INTO `details_of_order` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(118, 177, 1, 'Black blue and light red ladies sharhi', 3444, '1', NULL, NULL),
(119, 179, 5, 'Xiomi', 1220, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_09_23_165637_create_category_table', 1),
(4, '2019_09_24_082645_create_brand_table', 1),
(5, '2019_09_25_055829_create_product_table', 2),
(6, '2019_09_28_104718_create_administrator__table', 3),
(7, '2019_10_06_105811_create_slider_table', 4),
(8, '2019_10_07_200104_create_customer_login_table', 5),
(9, '2019_10_07_200720_create_customer_register_table', 5),
(10, '2019_10_08_111132_create_shopper_info_table', 6),
(11, '2019_10_08_185908_create_order_product_table', 7),
(12, '2019_11_11_121339_create_payment_info_table', 8),
(13, '2019_11_11_121646_create_order_info_table', 8),
(14, '2019_11_11_121937_create_details_of_order', 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `customer_id`, `shipping_id`, `payment_id`, `total_amount`, `order_status`, `created_at`, `updated_at`) VALUES
(177, 8160, 61, 130, '3,444.00', '1', '2019-11-16 18:19:05', NULL),
(178, 8160, 61, 131, '1,220.00', '1', '2019-11-16 18:42:34', NULL),
(179, 8160, 62, 131, '1,220.00', '1', '2019-11-16 18:42:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(130, 'online_payment', '1', '2019-11-16 18:19:04', NULL),
(131, 'bkash', '1', '2019-11-16 18:42:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category_id`, `brand_id`, `product_short_descrip`, `product_long_descrip`, `product_price`, `product_image`, `product_size`, `product_color`, `product_quantity`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Black blue and light red ladies sharhi', '1', '2', 'this is i phone 4', 'this is i phone 4 and this is latest version', 3444.00, 'image/g9KTUTDFwwTf2QjkmffF.jpeg', '4\'', 'red,black.blue', '2', 1, NULL, NULL),
(5, 'Xiomi', '1', '2', 'Nokia 2343', 'this is a nokia audio mobile', 1220.00, 'image/NF3kafxD3eg91gnmLLqo.jpg', '3\'', 'red', '4', 1, NULL, NULL),
(6, 'Mobile', '5', '2', 'opp mobile', 'opp mobile', 32000.00, 'image/cJTzlFNIEwLFrBnZWRbF.jpg', '5\'6', 'blue', '3', 1, NULL, NULL),
(7, 'Shirt', '4', '2', 'this is for boy', 'this is for boy', 1200.00, 'image/YVezzu59nwnkWbkIePVk.jpg', 'm', 'red', '3', 1, NULL, NULL),
(8, 'Baby dress', '5', '2', 'baby dress', 'baby dress', 1233.00, 'image/FH6qVBgOHTqiCGdwz9sn.jpg', 'm', 'sky', '2', 1, NULL, NULL),
(9, 'Glass', '4', '2', 'glass', 'this is for boy', 1220.00, 'image/FWSpynjOYjY4IGTL65tO.jpg', '3\'', 'red', '1', 1, NULL, NULL),
(10, 'Navyblue and red ligght bady scart', '1', '2', 'this dress for baby', 'this dress for baby', 850.00, 'image/IiA9sgRuLL5XUMFvHk4K.jpg', '3\'', 'red blue', '2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '=/',
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '=/',
  `product_total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `customer_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `product_image`, `product_size`, `product_color`, `product_total_price`, `receiver_name`, `receiver_location`, `receiver_number`, `zip_code`, `order_status`, `created_at`, `updated_at`) VALUES
(51, 9429, '1', 'Black blue and light red ladies sharhi', '3444', '1', 'image/g9KTUTDFwwTf2QjkmffF.jpeg', NULL, NULL, '3,444.00', 'Ariyat sinha', 'Hetemkhan,kolabagan Rajshahi', '01743789467', 6200, 0, '2019-11-16 17:04:33', NULL),
(52, 8160, '1', 'Black blue and light red ladies sharhi', '3444', '1', 'image/g9KTUTDFwwTf2QjkmffF.jpeg', NULL, NULL, '3,444.00', 'as', 'fdf', '3555678', 3545, 0, '2019-11-16 18:18:58', NULL),
(53, 8160, '5', 'Xiomi', '1220', '1', 'image/NF3kafxD3eg91gnmLLqo.jpg', '3\'', 'red', '1,220.00', 'setdjn v', 'dg v', '75878089', 46457, 0, '2019-11-16 18:42:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopper_info`
--

CREATE TABLE `shopper_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_receiver_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_received_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopper_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_receiver_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopper_info`
--

INSERT INTO `shopper_info` (`id`, `customer_id`, `name`, `email`, `password`, `address`, `product_receiver_name`, `product_received_location`, `city`, `zip_code`, `shopper_phone`, `product_receiver_phone`, `status`, `created_at`, `updated_at`) VALUES
(60, 9429, 'Ariyat Sinha', 'rt.tusharahmed@gmail.com', '123456', 'Rajshahi', 'Ariyat sinha', 'Hetemkhan,kolabagan Rajshahi', 'Rajshahi', '6200', '01743789467', '01743789467', 'on', NULL, NULL),
(61, 8160, 'Ariyat Sinha', 'rt.tusharahmed@gmail.com', '123456', 'sgrf', 'as', 'fdf', 'Bagerhat', '3545', '32657568', '3555678', 'on', NULL, NULL),
(62, 8160, 'Ariyat Sinha', 'rt.tusharahmed@gmail.com', '347548', 'drjnmvb', 'setdjn v', 'dg v', 'Meherpur', '46457', '437569879', '75878089', 'on', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image_name`, `created_at`, `updated_at`) VALUES
(6, 'slider_img/GSwOU5rCcpDgBWDT1C0N.jpg', NULL, NULL),
(9, 'slider_img/98pPXNgPSxPIE9DkjUes.jpg', NULL, NULL),
(10, 'slider_img/afpetKTu7ItqKdZqvj9R.jpg', NULL, NULL),
(11, 'slider_img/trZqk60sx8DakTgT8FTB.jpg', NULL, NULL),
(12, 'slider_img/Yx1VkSGQ5fg3SSAgIxkQ.jpg', NULL, NULL),
(15, 'slider_img/6PwCgfQcKM1ph35Y0RIG.jpg', NULL, NULL),
(16, 'slider_img/3P66dDbBZakHe2HbUHYS.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_register`
--
ALTER TABLE `customer_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details_of_order`
--
ALTER TABLE `details_of_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopper_info`
--
ALTER TABLE `shopper_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_register`
--
ALTER TABLE `customer_register`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `details_of_order`
--
ALTER TABLE `details_of_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `shopper_info`
--
ALTER TABLE `shopper_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
