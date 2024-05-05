-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 11:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `numolo_web_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees_master`
--

CREATE TABLE `fees_master` (
  `id` int(11) NOT NULL,
  `pkg_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `answer_key` varchar(255) DEFAULT NULL,
  `no_of_winners` int(11) DEFAULT NULL,
  `no_of_tickets` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `endDate` varchar(255) DEFAULT NULL,
  `endTime` varchar(255) DEFAULT NULL,
  `tbl_packages_status` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fees_master`
--

INSERT INTO `fees_master` (`id`, `pkg_id`, `price`, `question`, `answer_key`, `no_of_winners`, `no_of_tickets`, `created_date`, `modify_date`, `status`, `endDate`, `endTime`, `tbl_packages_status`, `parent_id`) VALUES
(107, 1, 1000, 'who will won', '120', 10, 1000, '2024-04-25 18:32:22', '2024-04-30 13:52:53', 2, '2024-04-26', '18:41:00', 1, 0),
(108, 1, 1000, 'who will won2', '90', 10, 1000, '2024-04-25 20:50:50', '2024-04-30 13:52:53', 2, NULL, NULL, 1, 0),
(109, 1, 100, 'test mi 2', '90', 10, 1000, '2024-04-26 00:42:43', '2024-04-30 13:52:53', 2, '2024-04-26', '00:49:00', 1, 0),
(110, 10, 1200, 'who will won', '97', 10, 1200, '2024-04-27 21:57:54', '2024-04-30 13:52:57', 2, '2024-04-27', '22:15:00', 1, 0),
(111, 10, 1000, 'who will won', '95', 20, 1000, '2024-04-28 01:13:00', '2024-04-30 13:52:57', 2, '2024-04-28', '01:16:00', 1, 0),
(112, 10, 2002, 'who will won', '20', 10, 2002, '2024-04-28 15:03:02', '2024-05-01 21:29:23', 2, '2024-04-30', '02:19:00', 1, 0),
(113, 12, 2000, 'test mi 2', NULL, 2000, 2000, '2024-04-30 01:15:10', '2024-04-30 13:53:06', 2, '2024-04-30', '02:19:00', 1, 0),
(114, 11, 100, 'rohit will score?', NULL, 20, 100, '2024-04-30 02:51:18', '2024-04-30 13:53:01', 2, '2024-04-30', '02:32:00', 1, 0),
(115, 12, 20, 'test mi 2', NULL, 250, 20, '2024-04-30 02:51:47', '2024-04-30 13:53:06', 2, '2024-04-30', '03:33:00', 1, 0),
(116, 11, 2000, '2000', NULL, 10, 2000, '2024-04-30 03:48:02', '2024-04-30 13:53:01', 2, '2024-04-30', '03:50:00', 1, 0),
(117, 10, 2500, 'test mi 2', '120', 20, 2500, '2024-04-30 03:48:13', '2024-05-03 03:25:13', 2, '2024-04-30', '03:50:00', 1, 0),
(118, 1, 1000, 'who will won', NULL, 10, 1000, '2024-04-30 13:53:20', '2024-04-30 13:53:20', 1, NULL, NULL, NULL, 0),
(119, 3, 1000, 'test mi 2', NULL, 20, 1000, '2024-04-30 13:53:39', '2024-04-30 13:53:39', 1, NULL, NULL, NULL, 0),
(120, 3, 1000, ' test mi 2', ' ', 20, 1000, '2024-05-01 01:50:42', '2024-05-01 01:50:42', 1, NULL, NULL, 0, 119),
(121, 3, 1000, '  test mi 2', '  ', 20, 1000, '2024-05-01 02:06:47', '2024-05-01 02:06:47', 1, NULL, NULL, 0, 120),
(122, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-01 02:08:22', '2024-05-01 02:08:22', 1, NULL, NULL, 0, 121),
(123, 3, 1000, '    test mi 2', '    ', 20, 1000, '2024-05-01 02:08:23', '2024-05-01 02:08:23', 1, NULL, NULL, 0, 122),
(124, 3, 1000, '     test mi 2', '     ', 20, 1000, '2024-05-01 02:08:23', '2024-05-01 02:08:23', 1, NULL, NULL, 0, 123),
(125, 3, 1000, '      test mi 2', '      ', 20, 1000, '2024-05-01 02:08:23', '2024-05-01 02:08:23', 1, NULL, NULL, 0, 124),
(126, 3, 1000, '       test mi 2', '       ', 20, 1000, '2024-05-01 02:08:54', '2024-05-01 02:08:54', 1, NULL, NULL, 0, 125),
(127, 3, 1000, '        test mi 2', '        ', 20, 1000, '2024-05-01 02:09:20', '2024-05-01 02:09:20', 1, NULL, NULL, 0, 126),
(128, 3, 1000, '         test mi 2', '         ', 20, 1000, '2024-05-01 07:16:52', '2024-05-01 07:16:52', 1, NULL, NULL, 0, 127),
(129, 3, 1000, '          test mi 2', '          ', 20, 1000, '2024-05-01 07:18:32', '2024-05-01 07:18:32', 1, NULL, NULL, 0, 128),
(130, 3, 1000, ' test mi 2', ' ', 20, 1000, '2024-05-01 07:18:32', '2024-05-01 07:18:32', 1, NULL, NULL, 0, 128),
(131, 3, 1000, '  test mi 2', '  ', 20, 1000, '2024-05-02 01:33:53', '2024-05-02 01:33:53', 1, NULL, NULL, 0, 130),
(132, 1, 200, 'who will won', NULL, 10, 10, '2024-05-02 20:11:14', '2024-05-02 20:11:14', 1, NULL, NULL, NULL, NULL),
(133, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 02:32:09', '2024-05-03 02:32:09', 1, NULL, NULL, 0, 132),
(134, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 02:32:09', '2024-05-03 02:32:09', 1, NULL, NULL, 0, 131),
(135, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:22:17', '2024-05-03 03:22:17', 1, NULL, NULL, 0, 132),
(136, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:22:17', '2024-05-03 03:22:17', 1, NULL, NULL, 0, 131),
(137, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:23:27', '2024-05-03 03:23:27', 1, NULL, NULL, 0, 132),
(138, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:23:27', '2024-05-03 03:23:27', 1, NULL, NULL, 0, 131),
(139, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:23:28', '2024-05-03 03:23:28', 1, NULL, NULL, 0, 132),
(140, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:23:28', '2024-05-03 03:23:28', 1, NULL, NULL, 0, 131),
(141, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:23:28', '2024-05-03 03:23:28', 1, NULL, NULL, 0, 132),
(142, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:23:28', '2024-05-03 03:23:28', 1, NULL, NULL, 0, 131),
(143, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:23:28', '2024-05-03 03:23:28', 1, NULL, NULL, 0, 132),
(144, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:23:28', '2024-05-03 03:23:28', 1, NULL, NULL, 0, 131),
(145, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:23:29', '2024-05-03 03:23:29', 1, NULL, NULL, 0, 132),
(146, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:23:29', '2024-05-03 03:23:29', 1, NULL, NULL, 0, 131),
(147, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:23:29', '2024-05-03 03:23:29', 1, NULL, NULL, 0, 132),
(148, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:23:29', '2024-05-03 03:23:29', 1, NULL, NULL, 0, 131),
(149, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:23:35', '2024-05-03 03:23:35', 1, NULL, NULL, 0, 132),
(150, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:23:35', '2024-05-03 03:23:35', 1, NULL, NULL, 0, 131),
(151, 1, 200, ' who will won', ' ', 10, 10, '2024-05-03 03:23:36', '2024-05-03 03:23:36', 1, NULL, NULL, 0, 132),
(152, 3, 1000, '   test mi 2', '   ', 20, 1000, '2024-05-03 03:23:36', '2024-05-03 03:23:36', 1, NULL, NULL, 0, 131);

-- --------------------------------------------------------

--
-- Table structure for table `payout_master`
--

CREATE TABLE `payout_master` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `coins` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=active,1=inactive	',
  `type` tinyint(1) DEFAULT 0 COMMENT '0=debit, 1=credit	',
  `currency` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payout_master`
--

INSERT INTO `payout_master` (`id`, `title`, `subtitle`, `message`, `amount`, `coins`, `image`, `status`, `type`, `currency`) VALUES
(2, 'PayPal', '50 Points = $5 USD', 'Enter your Paypal Email :', '5', 50, 'http://pocket.droidoxy.com/images/paypal_icon.png', 0, 1, 'USD'),
(3, 'PayTm', '1000 Points = 100 INR', 'Enter your Paytm Mobile Number :', '100', 1000, 'http://pocket.droidoxy.com/images/paytm_icon.png', 0, 0, 'INR'),
(6, 'PayTm', '25 points = 25 INR', 'Enter your Email Address :wesoft1001@gmail.com', '25', 25, 'http://cashyrewards.kyalogames.com/images/paytm_icon.png', 0, 1, 'INR'),
(7, 'GooglePay', '10 Coins = 10 INR', 'Enter your upi id', '10', 10, 'upload/5e53b0156f8e89.60646333.google-pay-logo-5aeb6a99a18d9e0037f978bf.jpg', 0, 1, 'INR');

-- --------------------------------------------------------

--
-- Table structure for table `prizepool_master`
--

CREATE TABLE `prizepool_master` (
  `id` int(11) NOT NULL,
  `fees_id` int(11) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `prize` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prizepool_master`
--

INSERT INTO `prizepool_master` (`id`, `fees_id`, `rank`, `prize`, `parent_id`) VALUES
(5, 108, 1, 1000, 0),
(6, 108, 2, 600, 0),
(7, 108, 3, 400, 0),
(9, 109, 1, 1000, 0),
(10, 109, 2, 700, 0),
(11, 109, 3, 500, 0),
(12, 109, 4, 300, 0),
(13, 109, 5, 150, 0),
(14, 110, 1, 1200, 0),
(15, 110, 2, 800, 0),
(16, 110, 3, 600, 0),
(17, 110, 4, 400, 0),
(18, 110, 5, 300, 0),
(19, 110, 6, 200, 0),
(20, 110, 7, 150, 0),
(21, 110, 8, 100, 0),
(22, 110, 9, 80, 0),
(23, 110, 10, 50, 0),
(24, 111, 1, 1000, 0),
(25, 111, 2, 800, 0),
(26, 111, 3, 600, 0),
(27, 111, 4, 400, 0),
(28, 111, 5, 200, 0),
(29, 112, 1, 100, 0),
(30, 117, 1, 1000, 111),
(31, 117, 2, 800, 111),
(32, 117, 3, 600, 111),
(33, 117, 4, 400, 111),
(34, 117, 5, 200, 111),
(35, 128, 1, 1000, 111),
(36, 128, 2, 800, 111),
(37, 128, 3, 600, 111),
(38, 128, 4, 400, 111),
(39, 128, 5, 200, 111),
(40, 129, 1, 1000, 111),
(41, 129, 2, 800, 111),
(42, 129, 3, 600, 111),
(43, 129, 4, 400, 111),
(44, 129, 5, 200, 111),
(45, 131, 1, 1000, 111),
(46, 131, 2, 800, 111),
(47, 131, 3, 600, 111),
(48, 131, 4, 400, 111),
(49, 131, 5, 200, 111),
(50, 134, 1, 1000, 131),
(51, 134, 2, 800, 131),
(52, 134, 3, 600, 131),
(53, 134, 4, 400, 131),
(54, 134, 5, 200, 131),
(55, 136, 1, 1000, 131),
(56, 136, 2, 800, 131),
(57, 136, 3, 600, 131),
(58, 136, 4, 400, 131),
(59, 136, 5, 200, 131),
(60, 138, 1, 1000, 131),
(61, 138, 2, 800, 131),
(62, 138, 3, 600, 131),
(63, 138, 4, 400, 131),
(64, 138, 5, 200, 131),
(65, 140, 1, 1000, 131),
(66, 140, 2, 800, 131),
(67, 140, 3, 600, 131),
(68, 140, 4, 400, 131),
(69, 140, 5, 200, 131),
(70, 142, 1, 1000, 131),
(71, 142, 2, 800, 131),
(72, 142, 3, 600, 131),
(73, 142, 4, 400, 131),
(74, 142, 5, 200, 131),
(75, 144, 1, 1000, 131),
(76, 144, 2, 800, 131),
(77, 144, 3, 600, 131),
(78, 144, 4, 400, 131),
(79, 144, 5, 200, 131),
(80, 146, 1, 1000, 131),
(81, 146, 2, 800, 131),
(82, 146, 3, 600, 131),
(83, 146, 4, 400, 131),
(84, 146, 5, 200, 131),
(85, 148, 1, 1000, 131),
(86, 148, 2, 800, 131),
(87, 148, 3, 600, 131),
(88, 148, 4, 400, 131),
(89, 148, 5, 200, 131),
(90, 150, 1, 1000, 131),
(91, 150, 2, 800, 131),
(92, 150, 3, 600, 131),
(93, 150, 4, 400, 131),
(94, 150, 5, 200, 131),
(95, 152, 1, 1000, 131),
(96, 152, 2, 800, 131),
(97, 152, 3, 600, 131),
(98, 152, 4, 400, 131),
(99, 152, 5, 200, 131);

-- --------------------------------------------------------

--
-- Table structure for table `rewarded_details`
--

CREATE TABLE `rewarded_details` (
  `id` int(11) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `reward_points` int(11) NOT NULL DEFAULT 0,
  `reward_date` varchar(255) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `add_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `date_modify` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `content`, `add_by`, `date_created`, `modify_by`, `date_modify`) VALUES
(1, '<h2>as5d16a5s5d1</h2>\r\n', 9, '2019-01-08 19:01:25', 6, '2022-01-07 17:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext DEFAULT NULL,
  `url` longtext DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_details`
--

CREATE TABLE `tbl_app_details` (
  `id` int(11) NOT NULL,
  `app_name` varchar(50) DEFAULT 'NULL',
  `logo` varchar(250) DEFAULT NULL,
  `favicon` varchar(250) DEFAULT NULL,
  `app_url` varchar(250) DEFAULT NULL,
  `tawkto_chat_link` varchar(500) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `fcm_key` longtext DEFAULT NULL,
  `time_zone` varchar(200) DEFAULT NULL,
  `country_code` varchar(50) DEFAULT '+91',
  `currency_code` varchar(50) DEFAULT NULL,
  `currency_sign` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mop` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0= both, 1= paytm, 2 = payu, 3 = upi',
  `wallet_mode` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hide',
  `maintenance_mode` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=maintenance mode',
  `upi` varchar(50) DEFAULT NULL,
  `upi_mc` varchar(100) DEFAULT NULL,
  `upi_tn` varchar(200) DEFAULT NULL,
  `upi_pn` varchar(100) DEFAULT NULL,
  `upi_token` varchar(500) DEFAULT NULL,
  `razorpay_api_key` varchar(100) NOT NULL,
  `paytm_mer_id` varchar(50) DEFAULT NULL,
  `paytm_mer_key` varchar(50) DEFAULT NULL,
  `share_prize` int(11) NOT NULL DEFAULT 50,
  `download_prize` int(11) NOT NULL DEFAULT 50,
  `bonus_used` int(11) NOT NULL DEFAULT 5,
  `min_withdraw` int(11) NOT NULL DEFAULT 10,
  `max_withdraw` int(11) NOT NULL DEFAULT 10,
  `min_deposit` int(11) NOT NULL DEFAULT 10,
  `max_deposit` int(11) NOT NULL DEFAULT 10,
  `force_update` tinyint(1) NOT NULL DEFAULT 0,
  `whats_new` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `latest_version_name` text DEFAULT NULL,
  `latest_version_code` int(11) DEFAULT NULL,
  `update_url` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_app_details`
--

INSERT INTO `tbl_app_details` (`id`, `app_name`, `logo`, `favicon`, `app_url`, `tawkto_chat_link`, `token`, `fcm_key`, `time_zone`, `country_code`, `currency_code`, `currency_sign`, `mop`, `wallet_mode`, `maintenance_mode`, `upi`, `upi_mc`, `upi_tn`, `upi_pn`, `upi_token`, `razorpay_api_key`, `paytm_mer_id`, `paytm_mer_key`, `share_prize`, `download_prize`, `bonus_used`, `min_withdraw`, `max_withdraw`, `min_deposit`, `max_deposit`, `force_update`, `whats_new`, `update_date`, `latest_version_name`, `latest_version_code`, `update_url`) VALUES
(1, 'Numolo', 'media/6617d89e6a6566.09519290.png', 'media/62346ed04a6d62.65738501.megalotto-icon-removebg-preview (1).png', 'https://drive.google.com/open?id=1ENw21AlcESQQ6QP8Wj2vj1eyGD-kTmQT', 'https://tawk.to/chat', '11', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'Asia/Kolkata', '+91', 'INR', 'â‚¹', '0', 0, 0, 'numolo@upi', '5111', 'Pay To BHIM Merchant', 'BHIM Merchant', '', 'xxxxxxxxxxx@live', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx', 50, 50, 5, 10, 15000, 10, 15000, 0, '<ol>\r\n	<li>Bug Fixed</li>\r\n</ol>\r\n', '2022-04-05', '1', 2, 'https://drive.google.com/open?id=1ENw21AlcESQQ6QP8Wj2vj1eyGD-kTmQT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_configuration`
--

CREATE TABLE `tbl_configuration` (
  `id` int(11) NOT NULL,
  `about` longtext NOT NULL,
  `contact` longtext NOT NULL,
  `faq` longtext NOT NULL,
  `privacy` longtext NOT NULL,
  `terms` longtext NOT NULL,
  `add_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `date_modify` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_configuration`
--

INSERT INTO `tbl_configuration` (`id`, `about`, `contact`, `faq`, `privacy`, `terms`, `add_by`, `date_created`, `modify_by`, `date_modify`) VALUES
(1, '<h2>About Us</h2>\r\n\r\n<p>We Provide a lottery application where users can play and win a big amount.</p>\r\n\r\n<p>If you have any queries regarding the app and any other issue, please feel free to contact at <strong>info@numolo.in</strong></p>\r\n', '<h2>Contact Us</h2>\r\n\r\n<p>If you have any queries regarding App, Transaction, and any other issue, please feel free to contact at <strong>info@numolo.in</strong></p>\r\n', 'faq', '<h2><strong>PRIVACY POLICY</strong></h2>\r\n\r\n<p>Effective date: 2022-03-18</p>\r\n\r\n<p>1. <strong>Introduction</strong></p>\r\n\r\n<p>Welcome to <strong> Numolo</strong>.</p>\r\n\r\n<p><strong>Numolo</strong> (&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;) operates <strong>info@numolo.in</strong> (hereinafter referred to as <strong>&ldquo;Service&rdquo;</strong>).</p>\r\n\r\n<p>Our Privacy Policy governs your visit to <strong>info@numolo.in</strong>, and explains how we collect, safeguard and disclose information that results from your use of our Service.</p>\r\n\r\n<p>We use your data to provide and improve Service. By using Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, the terms used in this Privacy Policy have the same meanings as in our Terms and Conditions.</p>\r\n\r\n<p>Our Terms and Conditions (<strong>&ldquo;Terms&rdquo;</strong>) govern all use of our Service and together with the Privacy Policy constitutes your agreement with us (<strong>&ldquo;agreement&rdquo;</strong>).</p>\r\n\r\n<p>2. <strong>Definitions</strong></p>\r\n\r\n<p><strong>SERVICE</strong> means the megalotto.ratechnoworld@gmail.com website operated by Mega Lotto.</p>\r\n\r\n<p><strong>PERSONAL DATA</strong> means data about a living individual who can be identified from those data (or from those and other information either in our possession or likely to come into our possession).</p>\r\n\r\n<p><strong>USAGE DATA</strong> is data collected automatically either generated by the use of Service or from Service infrastructure itself (for example, the duration of a page visit).</p>\r\n\r\n<p><strong>COOKIES</strong> are small files stored on your device (computer or mobile device).</p>\r\n\r\n<p><strong>DATA CONTROLLER</strong> means a natural or legal person who (either alone or jointly or in common with other persons) determines the purposes for which and the manner in which any personal data are, or are to be, processed. For the purpose of this Privacy Policy, we are a Data Controller of your data.</p>\r\n\r\n<p><strong>DATA PROCESSORS (OR SERVICE PROVIDERS)</strong> means any natural or legal person who processes the data on behalf of the Data Controller. We may use the services of various Service Providers in order to process your data more effectively.</p>\r\n\r\n<p><strong>DATA SUBJECT</strong> is any living individual who is the subject of Personal Data.</p>\r\n\r\n<p><strong>THE USER</strong> is the individual using our Service. The User corresponds to the Data Subject, who is the subject of Personal Data.</p>\r\n\r\n<p>3. <strong>Information Collection and Use</strong></p>\r\n\r\n<p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>\r\n\r\n<p>4. <strong>Types of Data Collected</strong></p>\r\n\r\n<p><strong>Personal Data</strong></p>\r\n\r\n<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (<strong>&ldquo;Personal Data&rdquo;</strong>). Personally identifiable information may include, but is not limited to:</p>\r\n\r\n<p>0.1. Email address</p>\r\n\r\n<p>0.2. First name and last name</p>\r\n\r\n<p>0.3. Phone number</p>\r\n\r\n<p>0.4. Address, Country, State, Province, ZIP/Postal code, City</p>\r\n\r\n<p>0.5. Cookies and Usage Data</p>\r\n\r\n<p>We may use your Personal Data to contact you with newsletters, marketing or promotional materials and other information that may be of interest to you. You may opt out of receiving any, or all, of these communications from us by following the unsubscribe link.</p>\r\n\r\n<p><strong>Usage Data</strong></p>\r\n\r\n<p>We may also collect information that your browser sends whenever you visit our Service or when you access Service by or through any device (<strong>&ldquo;Usage Data&rdquo;</strong>).</p>\r\n\r\n<p>This Usage Data may include information such as your computer&rsquo;s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>\r\n\r\n<p>When you access Service with a device, this Usage Data may include information such as the type of device you use, your device unique ID, the IP address of your device, your device operating system, the type of Internet browser you use, unique device identifiers and other diagnostic data.</p>\r\n\r\n<p><strong>Tracking Cookies Data</strong></p>\r\n\r\n<p>We use cookies and similar tracking technologies to track the activity on our Service and we hold certain information.</p>\r\n\r\n<p>Cookies are files with a small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Other tracking technologies are also used such as beacons, tags and scripts to collect and track information and to improve and analyze our Service.</p>\r\n\r\n<p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>\r\n\r\n<p>Examples of Cookies we use:</p>\r\n\r\n<p>0.1. <strong>Session Cookies:</strong> We use Session Cookies to operate our Service.</p>\r\n\r\n<p>0.2. <strong>Preference Cookies:</strong> We use Preference Cookies to remember your preferences and various settings.</p>\r\n\r\n<p>0.3. <strong>Security Cookies:</strong> We use Security Cookies for security purposes.</p>\r\n\r\n<p>0.4. <strong>Advertising Cookies:</strong> Advertising Cookies are used to serve you with advertisements that may be relevant to you and your interests.</p>\r\n\r\n<p><strong>Other Data</strong></p>\r\n\r\n<p>While using our Service, we may also collect the following information: sex, age, date of birth, place of birth, passport details, citizenship, registration at place of residence and actual address, telephone number (work, mobile), details of documents on education, qualification, professional training, employment agreements, <a href=\"https://policymaker.io/non-disclosure-agreement/\">NDA agreements</a>, information on bonuses and compensation, information on marital status, family members, social security (or other taxpayer identification) number, office location and other data.</p>\r\n\r\n<p>5. <strong>Use of Data</strong></p>\r\n\r\n<p>Mega Lotto uses the collected data for various purposes:</p>\r\n\r\n<p>0.1. to provide and maintain our Service;</p>\r\n\r\n<p>0.2. to notify you about changes to our Service;</p>\r\n\r\n<p>0.3. to allow you to participate in interactive features of our Service when you choose to do so;</p>\r\n\r\n<p>0.4. to provide customer support;</p>\r\n\r\n<p>0.5. to gather analysis or valuable information so that we can improve our Service;</p>\r\n\r\n<p>0.6. to monitor the usage of our Service;</p>\r\n\r\n<p>0.7. to detect, prevent and address technical issues;</p>\r\n\r\n<p>0.8. to fulfil any other purpose for which you provide it;</p>\r\n\r\n<p>0.9. to carry out our obligations and enforce our rights arising from any contracts entered into between you and us, including for billing and collection;</p>\r\n\r\n<p>0.10. to provide you with notices about your account and/or subscription, including expiration and renewal notices, email-instructions, etc.;</p>\r\n\r\n<p>0.11. to provide you with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless you have opted not to receive such information;</p>\r\n\r\n<p>0.12. in any other way we may describe when you provide the information;</p>\r\n\r\n<p>0.13. for any other purpose with your consent.</p>\r\n\r\n<p>6. <strong>Retention of Data</strong></p>\r\n\r\n<p>We will retain your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.</p>\r\n\r\n<p>We will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period, except when this data is used to strengthen the security or to improve the functionality of our Service, or we are legally obligated to retain this data for longer time periods.</p>\r\n\r\n<p>7. <strong>Transfer of Data</strong></p>\r\n\r\n<p>Your information, including Personal Data, may be transferred to &ndash; and maintained on &ndash; computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ from those of your jurisdiction.</p>\r\n\r\n<p>If you are located outside India and choose to provide information to us, please note that we transfer the data, including Personal Data, to India and process it there.</p>\r\n\r\n<p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>\r\n\r\n<p>Mega Lotto will take all the steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organisation or a country unless there are adequate controls in place including the security of your data and other personal information.</p>\r\n\r\n<p>8. <strong>Disclosure of Data</strong></p>\r\n\r\n<p>We may disclose personal information that we collect, or you provide:</p>\r\n\r\n<p>0.1. <strong>Disclosure for Law Enforcement.</strong></p>\r\n\r\n<p>Under certain circumstances, we may be required to disclose your Personal Data if required to do so by law or in response to valid requests by public authorities.</p>\r\n\r\n<p>0.2. <strong>Business Transaction.</strong></p>\r\n\r\n<p>If we or our subsidiaries are involved in a merger, acquisition or asset sale, your Personal Data may be transferred.</p>\r\n\r\n<p>0.3. <strong>Other cases. We may disclose your information also:</strong></p>\r\n\r\n<p>0.3.1. to our subsidiaries and affiliates;</p>\r\n\r\n<p>0.3.2. to contractors, service providers, and other third parties we use to support our business;</p>\r\n\r\n<p>0.3.3. to fulfill the purpose for which you provide it;</p>\r\n\r\n<p>0.3.4. for the purpose of including your company&rsquo;s logo on our website;</p>\r\n\r\n<p>0.3.5. for any other purpose disclosed by us when you provide the information;</p>\r\n\r\n<p>0.3.6. with your consent in any other cases;</p>\r\n\r\n<p>0.3.7. if we believe disclosure is necessary or appropriate to protect the rights, property, or safety of the Company, our customers, or others.</p>\r\n\r\n<p>9. <strong>Security of Data</strong></p>\r\n\r\n<p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>\r\n\r\n<p>10. <strong>Your Data Protection Rights Under General Data Protection Regulation (GDPR) </strong></p>\r\n\r\n<p>If you are a resident of the European Union (EU) and European Economic Area (EEA), you have certain data protection rights, covered by GDPR.</p>\r\n\r\n<p>We aim to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal Data.</p>\r\n\r\n<p>If you wish to be informed what Personal Data we hold about you and if you want it to be removed from our systems, please email us at <strong>ratechnoworld@gmail.com</strong>.</p>\r\n\r\n<p>In certain circumstances, you have the following data protection rights:</p>\r\n\r\n<p>0.1. the right to access, update or to delete the information we have on you;</p>\r\n\r\n<p>0.2. the right of rectification. You have the right to have your information rectified if that information is inaccurate or incomplete;</p>\r\n\r\n<p>0.3. the right to object. You have the right to object to our processing of your Personal Data;</p>\r\n\r\n<p>0.4. the right of restriction. You have the right to request that we restrict the processing of your personal information;</p>\r\n\r\n<p>0.5. the right to data portability. You have the right to be provided with a copy of your Personal Data in a structured, machine-readable and commonly used format;</p>\r\n\r\n<p>0.6. the right to withdraw consent. You also have the right to withdraw your consent at any time where we rely on your consent to process your personal information;</p>\r\n\r\n<p>Please note that we may ask you to verify your identity before responding to such requests. Please note, we may not able to provide Service without some necessary data.</p>\r\n\r\n<p>You have the right to complain to a Data Protection Authority about our collection and use of your Personal Data. For more information, please contact your local data protection authority in the European Economic Area (EEA).</p>\r\n\r\n<p>11. <strong>Your Data Protection Rights under the California Privacy Protection Act (CalOPPA)</strong></p>\r\n\r\n<p>CalOPPA is the first state law in the nation to require commercial websites and online services to post a privacy policy. The law&rsquo;s reach stretches well beyond California to require a person or company in the United States (and conceivable the world) that operates websites collecting personally identifiable information from California consumers to post a conspicuous privacy policy on its website stating exactly the information being collected and those individuals with whom it is being shared, and to comply with this policy.</p>\r\n\r\n<p>According to CalOPPA we agree to the following:</p>\r\n\r\n<p>0.1. users can visit our site anonymously;</p>\r\n\r\n<p>0.2. our Privacy Policy link includes the word &ldquo;Privacy&rdquo;, and can easily be found on the home page of our website;</p>\r\n\r\n<p>0.3. users will be notified of any privacy policy changes on our Privacy Policy Page;</p>\r\n\r\n<p>0.4. users are able to change their personal information by emailing us at&nbsp;<strong>info@numolo.in</strong></p>\r\n\r\n<p>Our Policy on &ldquo;Do Not Track&rdquo; Signals:</p>\r\n\r\n<p>We honor Do Not Track signals and do not track, plant cookies, or use advertising when a Do Not Track browser mechanism is in place. Do Not Track is a preference you can set in your web browser to inform websites that you do not want to be tracked.</p>\r\n\r\n<p>You can enable or disable Do Not Track by visiting the Preferences or Settings page of your web browser.</p>\r\n\r\n<p>12. <strong>Your Data Protection Rights under the California Consumer Privacy Act (CCPA)</strong></p>\r\n\r\n<p>If you are a California resident, you are entitled to learn what data we collect about you, ask to delete your data and not to sell (share) it. To exercise your data protection rights, you can make certain requests and ask us:</p>\r\n\r\n<p><strong>0.1. What personal information we have about you. If you make this request, we will return to you:</strong></p>\r\n\r\n<p>0.0.1. The categories of personal information we have collected about you.</p>\r\n\r\n<p>0.0.2. The categories of sources from which we collect your personal information.</p>\r\n\r\n<p>0.0.3. The business or commercial purpose for collecting or selling your personal information.</p>\r\n\r\n<p>0.0.4. The categories of third parties with whom we share personal information.</p>\r\n\r\n<p>0.0.5. The specific pieces of personal information we have collected about you.</p>\r\n\r\n<p>0.0.6. A list of categories of personal information that we have sold, along with the category of any other company we sold it to. If we have not sold your personal information, we will inform you of that fact.</p>\r\n\r\n<p>0.0.7. A list of categories of personal information that we have disclosed for a business purpose, along with the category of any other company we shared it with.</p>\r\n\r\n<p>Please note, you are entitled to ask us to provide you with this information up to two times in a rolling twelve-month period. When you make this request, the information provided may be limited to the personal information we collected about you in the previous 12 months.</p>\r\n\r\n<p><strong>0.2. To delete your personal information. If you make this request, we will delete the personal information we hold about you as of the date of your request from our records and direct any service providers to do the same. In some cases, deletion may be accomplished through de-identification of the information. If you choose to delete your personal information, you may not be able to use certain functions that require your personal information to operate.</strong></p>\r\n\r\n<p><strong>0.3. To stop selling your personal information. We don&rsquo;t sell or rent your personal information to any third parties for any purpose. We do not sell your personal information for monetary consideration. However, under some circumstances, a transfer of personal information to a third party, or within our family of companies, without monetary consideration may be considered a &ldquo;sale&rdquo; under California law. You are the only owner of your Personal Data and can request disclosure or deletion at any time.</strong></p>\r\n\r\n<p>If you submit a request to stop selling your personal information, we will stop making such transfers.</p>\r\n\r\n<p>Please note, if you ask us to delete or stop selling your data, it may impact your experience with us, and you may not be able to participate in certain programs or membership services which require the usage of your personal information to function. But in no circumstances, we will discriminate against you for exercising your rights.</p>\r\n\r\n<p>To exercise your California data protection rights described above, please send your request(s) by email: <strong>info@numolo.in</strong></p>\r\n\r\n<p>Your data protection rights, described above, are covered by the CCPA, short for the California Consumer Privacy Act. To find out more, visit the official California Legislative Information website. The CCPA took effect on 01/01/2020.</p>\r\n\r\n<p>13. <strong>Service Providers</strong></p>\r\n\r\n<p>We may employ third party companies and individuals to facilitate our Service (<strong>&ldquo;Service Providers&rdquo;</strong>), provide Service on our behalf, perform Service-related services or assist us in analysing how our Service is used.</p>\r\n\r\n<p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>\r\n\r\n<p>14. <strong>Analytics</strong></p>\r\n\r\n<p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p>\r\n\r\n<p>15. <strong>CI/CD tools</strong></p>\r\n\r\n<p>We may use third-party Service Providers to automate the development process of our Service.</p>\r\n\r\n<p>16. <strong>Advertising</strong></p>\r\n\r\n<p>We may use third-party Service Providers to show advertisements to you to help support and maintain our Service.</p>\r\n\r\n<p>17. <strong>Behavioral Remarketing</strong></p>\r\n\r\n<p>We may use remarketing services to advertise on third party websites to you after you visited our Service. We and our third-party vendors use cookies to inform, optimise and serve ads based on your past visits to our Service.</p>\r\n\r\n<p>18. <strong>Payments</strong></p>\r\n\r\n<p>We may provide paid products and/or services within Service. In that case, we use third-party services for payment processing (e.g. payment processors).</p>\r\n\r\n<p>We will not store or collect your payment card details. That information is provided directly to our third-party payment processors whose use of your personal information is governed by their Privacy Policy. These payment processors adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, Mastercard, American Express and Discover. PCI-DSS requirements help ensure the secure handling of payment information.</p>\r\n\r\n<p>19. <strong>Links to Other Sites</strong></p>\r\n\r\n<p>Our Service may contain links to other sites that are not operated by us. If you click a third party link, you will be directed to that third party&rsquo;s site. We strongly advise you to review the Privacy Policy of every site you visit.</p>\r\n\r\n<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>\r\n\r\n<p>For example, the outlined <a href=\"https://policymaker.io/privacy-policy/\">privacy policy</a> has been made using <a href=\"https://policymaker.io/\">PolicyMaker.io</a>, a free tool that helps create high-quality legal documents. PolicyMaker&rsquo;s <a href=\"https://policymaker.io/privacy-policy/\">privacy policy generator</a> is an easy-to-use tool for creating a <a href=\"https://policymaker.io/blog-privacy-policy/\">privacy policy for blog</a>, website, e-commerce store or mobile app.</p>\r\n\r\n<p>20. <strong><strong>Children&rsquo;s Privacy</strong></strong></p>\r\n\r\n<p>Our Services are not intended for use by children under the age of 18 (<strong>&ldquo;Child&rdquo;</strong> or <strong>&ldquo;Children&rdquo;</strong>).</p>\r\n\r\n<p>We do not knowingly collect personally identifiable information from Children under 18. If you become aware that a Child has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from Children without verification of parental consent, we take steps to remove that information from our servers.</p>\r\n\r\n<p>21. <strong>Changes to This Privacy Policy</strong></p>\r\n\r\n<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n\r\n<p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update &ldquo;effective date&rdquo; at the top of this Privacy Policy.</p>\r\n\r\n<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>\r\n\r\n<p>22. <strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions about this Privacy Policy, please contact us by email: <strong>info@numolo.in</strong>.</p>\r\n', '<h1><strong>TERMS &amp; CONDITIONS</strong></h1>\r\n\r\n<p>Megalotto&nbsp;(&ldquo;Megalotto&rdquo;, &ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;) provides a digital gaming platform of the game of chances to users in India. Please read our Terms of Service so that you understand what happens with the use of Megalotto. You agree to our Terms of Service (&quot;Terms&quot;) by installing, accessing, or using our app. If you do not wish to agree to these terms of use (&quot;Terms&quot;), you must not use the Service. If you are under 18 and choose to use the Service, we may seek the consent of the holder of your parental responsibility.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Privacy Policy and User Data:-</h2>\r\n\r\n<p>We take your privacy seriously. Megalotto&#39;s Privacy Policy explains how we process information, including the types of information we receive and collect from you, and how we use and share that information. Regardless of where you use our Services, you are responsible for collecting, using, processing, and sharing your information as described in our Privacy Policy and transferring and processing your information to our third-party providers. You agree to our data processing practices are including.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>About Services:-</h2>\r\n\r\n<p><strong>Registration:-</strong> You must register for our Service using accurate data, provide your current mobile phone number, full name, and your active email address. You agree to receive text messages and emails (from us or our third-party providers) with codes to register for our Service. Residents of Sikkim, Assam, Odisha, Telangana, and Nagaland are restricted from using this service. If a user is found to be a resident of Sikkim, Assam, Odisha, Telangana, Nagaland, or Tamilnadu and using our service then Megalotto at its sole and absolute discretion holds the rights to take action against such user including (not limited to) blocking of a user account, deletion or deactivation of a user account, and resetting the user account to initial level by deleting all the refers and reducing the amount present in the User Wallet to &quot;zero.&quot;&nbsp;&nbsp;</p>\r\n\r\n<p><strong>Devices and Software:-</strong> You must provide certain devices, software, and data connections in order to use our Services, which we do not provide otherwise. By using our Services, you agree to download and install updates to our Services.&nbsp;</p>\r\n\r\n<p><strong>Fees and Taxes:-</strong> You are responsible for all carrier rates and other fees and taxes related to your use of our services. We charge a fee for our services, including applicable taxes. Except as required by law, we do not refund money for services.</p>\r\n\r\n<p><strong>Age:-</strong>&nbsp;You must be at least 18 years old to use our Service. In addition to being of the minimum required age to use our Service under applicable law, if you are not old enough to have the authority to agree to our Terms, your parent or guardian must agree to our Terms on your behalf.</p>\r\n\r\n<p><strong>Refunds:- </strong>Any amount once added to our account cannot be refunded unless the contest details are updated after successful payment. In this case, the amount will be refunded to your account within 6-7 days.</p>\r\n\r\n<p><strong>Referrals:-</strong> The referral reward can be claimed only after the user has signed up using the referral code, both the Referrer and the Referral earn a bonus amount reward of â‚¹10, from which can be used during buy tickets. Bonus amounts cannot be withdrawn or transferred to a bank account and can only be used to participate in live competitions.</p>\r\n\r\n<p><strong>Wins:-</strong> Winners are randomly selected through an automated process running on our distributed computing system, with few ticket numbers provided, no manual work required, and counting completes in seconds.</p>\r\n\r\n<p><strong>Payments:-</strong> As part of any transaction with our Service, including payment to participate in the paid versions of the Contest (s), you must agree to be bound by the following payment terms Payment of the pre-established amount made to participate in the or contests include the pre-established fees for access to our service that we charge. We reserve the right to charge a registration fee, which will be specified and communicated by us on the contest page before you register or make any payment for a contest. It is possible to participate in a Contest where the amount of the predetermined contribution will be transferred to the Contest Winner (s) after the announcement of the results according to the terms and conditions of this Contest.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Third-Party Services:-</h2>\r\n\r\n<p>Our Service may enable the user to access, use or interact with third-party websites, applications, content, and other products and services. For example, you may choose to share information on social media platforms (such as Facebook or Instagram) that are integrated with our Service or to interact with the payment or cashout button supported with our gateway provider. The payment allows you to transfer money. Please note that when you use third-party services, their terms and privacy policies will govern your use of those services. &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Licenses:-</h2>\r\n\r\n<p><strong>Your Rights:-</strong> Megalotto does not claim ownership of any information you submit on your behalf or through our service. You must have the necessary rights to the information you submit on your behalf or through our Service and the right to grant the rights and licenses in our Terms.</p>\r\n\r\n<p>Megalotto<strong>&#39;s Rights:-</strong> We own all copyrights, trademarks, domains, logos, and other intellectual property rights associated with our Services. You may not use our copyrights, trademarks, domains, logos, and other intellectual property rights unless you have our express permission.</p>\r\n\r\n<p>Megalotto<strong> license for you:-</strong> We grant you a limited, revocable, non-exclusive, non-sublicensable, and non-transferable license to use our Service, subject to and by our Terms. The sole purpose of this license is to enable you to use our Service, as permitted by our Terms. No license or right is granted to you by implication or otherwise, except the licenses and rights expressly granted to you.&nbsp;</p>\r\n\r\n<p><strong>Your license to </strong>Megalotto<strong>:-</strong> To operate and provide our Service, you grant to Megalotto a non-exclusive, royalty-free, sub-licensable, and transferable license to use, reproduce, distribute, create derivative works, display, and perform the information (including content) that you download, send, store through our service. The rights you grant in this license are for the limited purpose of operating and providing our service (such as allowing us to view your profile picture and basic information, store your bank accounts on our servers as described in our privacy policy).<br />\r\n&nbsp;&nbsp;</p>\r\n\r\n<h2><strong>Disclaimer</strong></h2>\r\n\r\n<p>YOUR USE OF OUR SERVICE IS AT YOUR OWN RISK AND YOU ARE SUBJECT TO THE FOLLOWING DISCLAIMERS. WE PROVIDE OUR SERVICE &quot;AS IS&quot; WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, TRADE WARRANTIES, FITNESS FOR A PARTICULAR PURPOSE, TITLE, NO INFRINGEMENT, AND ABSENCE OF COMPUTER VIRUSES OR OTHER HARMFUL CODES. WE DO NOT GUARANTEE THAT ANY INFORMATION PROVIDED BY US IS ACCURATE, COMPLETE, OR USEFUL, THAT OUR SERVICES WILL BE OPERATIONAL, ERROR-FREE, SECURE, OR SECURE, OR THAT OUR SERVICES WILL OPERATE WITHOUT INTERRUPTION, DELAY, OR IMPERFECTION. WE DO NOT CONTROL AND ARE NOT RESPONSIBLE FOR CONTROLLING HOW OR WHEN OUR USERS USE OUR SERVICE OR THE FUNCTIONS AND INTERFACES PROVIDED BY OUR SERVICE. WE ARE NOT RESPONSIBLE AND ARE NOT OBLIGED TO CONTROL THE ACTIONS OR INFORMATION (INCLUDING THE CONTENT) OF OUR USERS OR OTHER THIRD PARTIES. YOU RELEASE THE UNITED STATES, OUR SUBSIDIARIES, OUR SUBSIDIARIES, OUR AND THEIR DIRECTORS, OFFICERS, EMPLOYEES, PARTNERS AND AGENTS FROM ALL CLAIMS, CLAIMS, CAUSE OF ACTION, DISPUTE OR LITIGATION (TOGETHER, &quot;CLAIMS&quot;, AND CLAIMS, WITH REGARD TO, ARISING FROM, OR IN ANY WAY RELATED TO ANY CLAIMS OF THIS CLAIM AGAINST THIRD PARTIES, YOU DISCLAIM ANY RIGHTS YOU MAY HAVE UNDER THE STATUTES OR SIMILAR APPLICABLE LAWS OF ANY OTHER JURISDICTION, WHICH REPRESENT HIM: WHERE SHE KNOWS, MUST HAVE AFFECTED MATERIAL ON ITS PAYMENT WITH DEBTOR.<br />\r\n&nbsp;</p>\r\n\r\n<h2>Limitation of <strong>Liability</strong></h2>\r\n\r\n<p>WE WILL NOT BE LIABLE TO YOU FOR ANY LOSS OF PROFITS OR DAMAGES CONSEQUENTIAL, SPECIAL, PUNITIVE, INDIRECT TO, INCIDENTAL OR CONSEQUENTIAL ARISING OUT OF OR IN ANY MANNER IN CONNECTION WITH OUR TERMS, OUR TERMS OF SERVICE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. ABOVE LIABILITY FOR CERTAIN DAMAGES AND THE LIMITATION OF LIABILITY APPLY TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW. THE LAWS OF SOME STATES OR JURISDICTIONS MAY NOT ALLOW THE LIMITATION OF EXCLUSION OF CERTAIN DAMAGES, SOME OR ALL OF THE ABOVE EXCLUSIONS AND LIMITATIONS MAY NOT APPLY TO YOU. DESPITE ANY OTHER PROVISION IN OUR TERMS, IN SUCH CASES, US&#39;S LIABILITY WILL BE LIMITED TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2019-01-21 00:00:00', 6, '2019-08-05 10:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `address` longtext NOT NULL,
  `other` longtext NOT NULL,
  `date_created` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_modify` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `modify_by` int(11) DEFAULT NULL,
  `whatsapp_no` varchar(20) NOT NULL,
  `messenger_id` varchar(200) NOT NULL,
  `fb_follow` varchar(200) NOT NULL,
  `ig_follow` varchar(200) NOT NULL,
  `twitter_follow` varchar(200) NOT NULL,
  `youtube_follow` varchar(200) NOT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `title`, `phone`, `email`, `address`, `other`, `date_created`, `added_by`, `date_modify`, `modify_by`, `whatsapp_no`, `messenger_id`, `fb_follow`, `ig_follow`, `twitter_follow`, `youtube_follow`, `content`) VALUES
(1, 'Google Play Gift Card (US)', '+919313917859', 'ratechnoworld@gmail.com', 'Vadodara', 'www.youtube.com', '2019-01-08 20:01:09', 9, '2023-09-24 20:21:59', 6, '+919313917859', '+919313917859', 'ratechnoworld@gmail.com', 'ratechnoworld@gmail.com', 'ratechnoworld@gmail.com', 'ratechnoworld@gmail.com', '<p>ihfeifisdf</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest`
--

CREATE TABLE `tbl_contest` (
  `id` int(11) NOT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=upcomming, 2=live, 3=finished, 4=result annouced',
  `added_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_by` int(11) DEFAULT NULL,
  `date_modify` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `man_result_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=result dec',
  `auto_result_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=result dec',
  `pkg_id` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contest`
--

INSERT INTO `tbl_contest` (`id`, `start_time`, `end_time`, `status`, `added_by`, `date_created`, `modify_by`, `date_modify`, `man_result_flag`, `auto_result_flag`, `pkg_id`, `fee_id`) VALUES
(1, '1714423380', '1714423440', 4, 6, '2024-04-30 02:13:22', 6, '2024-04-30 02:20:00', 0, 0, 11, 112),
(2, '1714423500', '1714423620', 4, 6, '2024-04-30 02:13:39', 6, '2024-04-30 02:20:00', 0, 0, 11, 112),
(3, '1714425720', '1714425840', 4, 6, '2024-04-30 02:52:13', 6, '2024-04-30 03:34:00', 0, 0, 11, 115),
(4, '1714425780', '1714425840', 4, 6, '2024-04-30 02:52:28', 6, '2024-04-30 03:34:00', 0, 0, 11, 115),
(5, '1714429080', '1714429140', 4, 6, '2024-04-30 03:48:30', 6, '2024-04-30 03:51:01', 0, 0, 10, 116),
(6, '1714429080', '1714429140', 4, 6, '2024-04-30 03:48:36', 6, '2024-04-30 03:51:01', 0, 0, 10, 116),
(7, '1714465620', '1714465680', 2, 6, '2024-04-30 13:54:18', 6, '2024-04-30 13:54:48', 0, 0, 1, 118),
(8, '1714465620', '1714465680', 4, 6, '2024-04-30 13:54:37', 6, '2024-05-02 01:34:32', 0, 0, 3, 119),
(9, '1714465740', '1714469340', 4, 6, '2024-04-30 13:57:38', NULL, '2024-05-01 21:27:58', 0, 0, 1, 119),
(10, '1714680480', '1714594260', 2, 6, '2024-05-02 01:35:44', 6, '2024-05-02 01:35:48', 0, 0, 3, 126),
(11, '1714656000', '1714828800', 1, 6, '2024-05-02 18:50:14', NULL, NULL, 0, 0, 1, 119),
(12, '1714742400', '1714828800', 2, 6, '2024-05-02 18:50:36', 6, '2024-05-03 02:22:54', 0, 0, 10, 121),
(13, '1714769520', '1714683120', 2, 6, '2024-05-03 02:20:57', 6, '2024-05-03 02:21:21', 0, 0, 3, 120);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offline_plyments`
--

CREATE TABLE `tbl_offline_plyments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT 0.00,
  `wallet` varchar(20) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `slip` longtext DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved,2=reject',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `modify_by` int(11) DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `mobile` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE `tbl_packages` (
  `id` int(11) NOT NULL,
  `pkg_name` varchar(30) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `modify_by` int(11) DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `dummy_user` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=dummy user participate',
  `pkg_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`id`, `pkg_name`, `created_by`, `created_date`, `modify_by`, `modify_date`, `dummy_user`, `pkg_status`) VALUES
(1, 'BRONZE', 6, '2021-12-06 16:21:54', NULL, '2024-04-30 13:52:53', 0, 1),
(3, 'SILVER', NULL, '2021-12-06 17:19:10', NULL, '2024-04-30 13:52:48', 0, 1),
(10, 'GOLD', NULL, '2022-01-24 19:46:35', NULL, '2024-04-22 04:25:06', 0, 1),
(11, 'CSK VS MI', 6, '2024-04-11 11:29:59', NULL, '2024-04-23 18:34:04', 0, 1),
(12, 'mivskkr', NULL, '2024-04-18 21:16:35', NULL, '2024-04-27 01:37:19', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participants`
--

CREATE TABLE `tbl_participants` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) DEFAULT NULL,
  `fees_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `entry_fee` int(11) DEFAULT NULL,
  `win_prize` int(11) DEFAULT 0,
  `rank` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=win, 2=lose',
  `date_created` varchar(50) DEFAULT NULL,
  `result_time` varchar(50) DEFAULT NULL,
  `ticket_no` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `res_type` tinyint(1) DEFAULT NULL COMMENT '0=manual, 1=auto',
  `is_dummy` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=dummy',
  `pkg_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_participants`
--

INSERT INTO `tbl_participants` (`id`, `contest_id`, `fees_id`, `user_id`, `entry_fee`, `win_prize`, `rank`, `status`, `date_created`, `result_time`, `ticket_no`, `username`, `res_type`, `is_dummy`, `pkg_id`) VALUES
(1, 4, 111, 709, 1000, 600, 3, 0, '1714247115', NULL, '84', 'Harshladumor', NULL, 1, 10),
(2, 4, 111, 798, 1000, 0, 0, 0, '1714247115', NULL, '69', 'Savejitadas', NULL, 1, 10),
(3, 4, 111, 809, 1000, 0, 0, 0, '1714247115', NULL, '36', 'Raviroy047', NULL, 1, 10),
(4, 4, 111, 753, 1000, 0, 0, 0, '1714247115', NULL, '55', 'jiganeshkumar', NULL, 1, 10),
(5, 4, 111, 685, 1000, 0, 0, 0, '1714247115', NULL, '49', 'Amarsingh03', NULL, 1, 10),
(6, 4, 111, 805, 1000, 0, 0, 0, '1714247115', NULL, '47', 'Rahimali039', NULL, 1, 10),
(7, 4, 111, 808, 1000, 200, 4, 0, '1714247115', NULL, '78', 'Ahamadmistri049', NULL, 1, 10),
(8, 4, 111, 832, 1000, 800, 2, 0, '1714247115', NULL, '94', 'Yogeshkaurav0332', NULL, 1, 10),
(9, 4, 111, 808, 1000, 0, 0, 0, '1714247115', NULL, '20', 'Ahamadmistri049', NULL, 1, 10),
(10, 4, 111, 777, 1000, 0, 0, 0, '1714247115', NULL, '23', 'smitmakavana', NULL, 1, 10),
(11, 4, 111, 710, 1000, 0, 0, 0, '1714247115', NULL, '62', 'Harshilpaneliya', NULL, 1, 10),
(12, 4, 111, 711, 1000, 0, 0, 0, '1714247115', NULL, '77', 'Aryahitesh', NULL, 1, 10),
(13, 4, 111, 681, 1000, 0, 0, 0, '1714247115', NULL, '57', 'agarwalnidhi003', NULL, 1, 10),
(14, 4, 111, 778, 1000, 0, 0, 0, '1714247115', NULL, '14', 'tejash', NULL, 1, 10),
(15, 4, 111, 687, 1000, 0, 0, 0, '1714247115', NULL, '61', 'Sananaidhu', NULL, 1, 10),
(16, 4, 111, 701, 1000, 0, 0, 0, '1714247115', NULL, '73', 'Purnitjha', NULL, 1, 10),
(17, 4, 111, 723, 1000, 0, 0, 0, '1714247115', NULL, '26', 'Zehaankhan', NULL, 1, 10),
(18, 4, 111, 707, 1000, 0, 0, 0, '1714247115', NULL, '60', 'Gupatpratham', NULL, 1, 10),
(19, 4, 111, 736, 1000, 0, 0, 0, '1714247115', NULL, '27', ' Amulya', NULL, 1, 10),
(20, 4, 111, 709, 1000, 1000, 1, 0, '1714247115', NULL, '95', 'Harshladumor', NULL, 1, 10),
(21, 4, 111, 733, 1000, 0, 0, 0, '1714247115', NULL, '11', 'Rushil', NULL, 1, 10),
(22, 4, 111, 822, 1000, 0, 0, 0, '1714247115', NULL, '65', 'Aakeshmandapara109', NULL, 1, 10),
(23, 4, 111, 690, 1000, 0, 0, 0, '1714247115', NULL, '30', 'Mihirthakur207', NULL, 1, 10),
(24, 4, 111, 732, 1000, 400, 4, 0, '1714247115', NULL, '80', 'savan100', NULL, 1, 10),
(25, 4, 111, 828, 1000, 0, 0, 0, '1714247115', NULL, '35', 'Sameerkhan306', NULL, 1, 10),
(26, 4, 111, 765, 1000, 0, 0, 0, '1714247115', NULL, '12', 'mahesh', NULL, 1, 10),
(27, 4, 111, 790, 1000, 0, 0, 0, '1714247115', NULL, '75', 'Princedharuka11', NULL, 1, 10),
(28, 4, 111, 778, 1000, 0, 0, 0, '1714247115', NULL, '10', 'tejash', NULL, 1, 10),
(29, 4, 111, 802, 1000, 0, 0, 0, '1714247115', NULL, '55', 'Ajausahani031', NULL, 1, 10),
(30, 4, 111, 770, 1000, 0, 0, 0, '1714247115', NULL, '75', 'ashishmhata', NULL, 1, 10),
(31, 5, 111, 825, 1000, 0, 0, 0, '1714408606', NULL, '10', 'Rahulvishwas028', NULL, 1, 10),
(32, 5, 111, 823, 1000, 0, 0, 0, '1714408606', NULL, '20', 'Ekanshmojidara122', NULL, 1, 10),
(33, 5, 111, 833, 1000, 0, 0, 0, '1714408606', NULL, '22', 'Amitarora336', NULL, 1, 10),
(34, 5, 111, 813, 1000, 0, 0, 0, '1714408606', NULL, '11', 'Zeelvarma', NULL, 1, 10),
(35, 5, 111, 751, 1000, 0, 0, 0, '1714408606', NULL, '61', 'Pranjalgupta', NULL, 1, 10),
(36, 5, 111, 769, 1000, 0, 0, 0, '1714408606', NULL, '37', 'nikunjshah', NULL, 1, 10),
(37, 5, 111, 698, 1000, 0, 0, 0, '1714408606', NULL, '37', 'Ishaanghosh', NULL, 1, 10),
(38, 5, 111, 716, 1000, 0, 0, 0, '1714408606', NULL, '70', 'Milankohli888', NULL, 1, 10),
(39, 5, 111, 719, 1000, 0, 0, 0, '1714408606', NULL, '64', 'hirparapanth', NULL, 1, 10),
(40, 5, 111, 808, 1000, 100, 4, 0, '1714408606', NULL, '85', 'Ahamadmistri049', NULL, 1, 10),
(41, 5, 111, 684, 1000, 0, 0, 0, '1714408606', NULL, '75', 'Pandya1507', NULL, 1, 10),
(42, 5, 111, 744, 1000, 0, 0, 0, '1714408606', NULL, '27', 'rohitajoshi', NULL, 1, 10),
(43, 5, 111, 748, 1000, 0, 0, 0, '1714408606', NULL, '55', 'deepak', NULL, 1, 10),
(44, 5, 111, 816, 1000, 100, 4, 0, '1714408606', NULL, '85', 'Rajbhuiya075', NULL, 1, 10),
(45, 5, 111, 686, 1000, 400, 4, 0, '1714408606', NULL, '88', 'Diyaseth 25', NULL, 1, 10),
(46, 5, 111, 793, 1000, 600, 3, 0, '1714408606', NULL, '92', 'Baburam9696', NULL, 1, 10),
(47, 5, 111, 761, 1000, 0, 0, 0, '1714408606', NULL, '38', 'Dharma', NULL, 1, 10),
(48, 5, 111, 799, 1000, 0, 0, 0, '1714408606', NULL, '63', 'Roopeshmahta014', NULL, 1, 10),
(49, 5, 111, 825, 1000, 0, 0, 0, '1714408606', NULL, '26', 'Rahulvishwas028', NULL, 1, 10),
(50, 5, 111, 781, 1000, 0, 0, 0, '1714408606', NULL, '98', 'vrushantkakalotar', NULL, 1, 10),
(51, 8, 112, 817, 2002, 0, 0, 0, '1714419676', NULL, '76', 'Urvanbharati079', NULL, 1, 10),
(52, 8, 112, 717, 2002, 0, 0, 0, '1714419676', NULL, '12', 'kuntnakul', NULL, 1, 10),
(53, 8, 112, 760, 2002, 0, 0, 0, '1714419676', NULL, '66', 'Keyuranjirval', NULL, 1, 10),
(54, 8, 112, 711, 2002, 0, 0, 0, '1714419676', NULL, '95', 'Aryahitesh', NULL, 1, 10),
(55, 8, 112, 736, 2002, 0, 0, 0, '1714419676', NULL, '15', ' Amulya', NULL, 1, 10),
(56, 8, 112, 720, 2002, 0, 0, 0, '1714419676', NULL, '94', 'Ronithjoshi', NULL, 1, 10),
(57, 8, 112, 802, 2002, 0, 0, 0, '1714419676', NULL, '54', 'Ajausahani031', NULL, 1, 10),
(58, 8, 112, 826, 2002, 0, 0, 0, '1714419676', NULL, '69', 'RitvikKevat034', NULL, 1, 10),
(59, 8, 112, 754, 2002, 0, 0, 0, '1714419676', NULL, '37', 'jitukanpara', NULL, 1, 10),
(60, 8, 112, 812, 2002, 0, 0, 0, '1714419676', NULL, '96', 'Rushigiri056', NULL, 1, 10),
(61, 8, 112, 696, 2002, 0, 0, 0, '1714419676', NULL, '88', 'Virajdas', NULL, 1, 10),
(62, 8, 112, 691, 2002, 0, 0, 0, '1714419676', NULL, '64', 'Kabirshah007', NULL, 1, 10),
(63, 8, 112, 701, 2002, 0, 0, 0, '1714419676', NULL, '86', 'Purnitjha', NULL, 1, 10),
(64, 8, 112, 734, 2002, 0, 0, 0, '1714419676', NULL, '18', 'Omkaarsingh', NULL, 1, 10),
(65, 8, 112, 759, 2002, 0, 0, 0, '1714419676', NULL, '99', 'dashanpanvala', NULL, 1, 10),
(66, 8, 112, 789, 2002, 0, 0, 0, '1714419676', NULL, '20', 'Mahaveershing88', NULL, 1, 10),
(67, 8, 112, 794, 2002, 0, 0, 0, '1714419676', NULL, '68', 'Haripaswan055', NULL, 1, 10),
(68, 8, 112, 766, 2002, 0, 0, 0, '1714419676', NULL, '74', 'mahulkoli', NULL, 1, 10),
(69, 8, 112, 735, 2002, 0, 0, 0, '1714419676', NULL, '29', 'Nimitpatel', NULL, 1, 10),
(70, 8, 112, 732, 2002, 0, 0, 0, '1714419676', NULL, '41', 'savan100', NULL, 1, 10),
(71, 8, 112, 794, 2002, 0, 0, 0, '1714419676', NULL, '40', 'Haripaswan055', NULL, 1, 10),
(72, 8, 112, 724, 2002, 0, 0, 0, '1714419676', NULL, '99', 'prity4041', NULL, 1, 10),
(73, 8, 112, 788, 2002, 0, 0, 0, '1714419676', NULL, '49', 'Mahirakhatun7171', NULL, 1, 10),
(74, 8, 112, 805, 2002, 0, 0, 0, '1714419676', NULL, '20', 'Rahimali039', NULL, 1, 10),
(75, 8, 112, 804, 2002, 0, 0, 0, '1714419676', NULL, '89', 'Fenilbhagat037', NULL, 1, 10),
(76, 8, 112, 682, 2002, 0, 0, 0, '1714419676', NULL, '97', 'Dhruvkhatri ', NULL, 1, 10),
(77, 8, 112, 704, 2002, 0, 0, 0, '1714419676', NULL, '72', 'Dakshchawla66', NULL, 1, 10),
(78, 8, 112, 768, 2002, 0, 0, 0, '1714419676', NULL, '26', 'narshirathaliya', NULL, 1, 10),
(79, 8, 112, 706, 2002, 0, 0, 0, '1714419676', NULL, '79', 'sagargandhi', NULL, 1, 10),
(80, 8, 112, 821, 2002, 0, 0, 0, '1714419676', NULL, '13', 'Aaravsingh107', NULL, 1, 10),
(81, 8, 112, 794, 2002, 0, 0, 0, '1714419676', NULL, '45', 'Haripaswan055', NULL, 1, 10),
(82, 8, 112, 837, 2002, 0, 0, 0, '1714419676', NULL, '18', 'Dilipshukla347', NULL, 1, 10),
(83, 8, 112, 697, 2002, 0, 0, 0, '1714419676', NULL, '71', 'Aakeshgupta', NULL, 1, 10),
(84, 8, 112, 786, 2002, 0, 0, 0, '1714419676', NULL, '90', 'smitlathiya5959', NULL, 1, 10),
(85, 8, 112, 791, 2002, 0, 0, 0, '1714419676', NULL, '46', 'kavashulkumari560', NULL, 1, 10),
(86, 8, 112, 695, 2002, 0, 0, 0, '1714419676', NULL, '21', 'Yashchandra', NULL, 1, 10),
(87, 8, 112, 806, 2002, 0, 0, 0, '1714419676', NULL, '56', 'Kibarsada043', NULL, 1, 10),
(88, 8, 112, 792, 2002, 0, 0, 0, '1714419676', NULL, '29', 'Maheshsah4466', NULL, 1, 10),
(89, 8, 112, 712, 2002, 0, 0, 0, '1714419676', NULL, '88', 'Ikbalkhan', NULL, 1, 10),
(90, 8, 112, 760, 2002, 0, 0, 0, '1714419676', NULL, '88', 'Keyuranjirval', NULL, 1, 10),
(91, 8, 112, 789, 2002, 0, 0, 0, '1714419676', NULL, '96', 'Mahaveershing88', NULL, 1, 10),
(92, 8, 112, 768, 2002, 0, 0, 0, '1714419676', NULL, '25', 'narshirathaliya', NULL, 1, 10),
(93, 8, 112, 716, 2002, 0, 0, 0, '1714419676', NULL, '58', 'Milankohli888', NULL, 1, 10),
(94, 8, 112, 817, 2002, 0, 0, 0, '1714419676', NULL, '40', 'Urvanbharati079', NULL, 1, 10),
(95, 8, 112, 734, 2002, 0, 0, 0, '1714419676', NULL, '58', 'Omkaarsingh', NULL, 1, 10),
(96, 8, 112, 823, 2002, 0, 0, 0, '1714419676', NULL, '65', 'Ekanshmojidara122', NULL, 1, 10),
(97, 8, 112, 776, 2002, 0, 0, 0, '1714419676', NULL, '52', 'sankatpanditr', NULL, 1, 10),
(98, 8, 112, 717, 2002, 0, 0, 0, '1714419676', NULL, '97', 'kuntnakul', NULL, 1, 10),
(99, 8, 112, 759, 2002, 0, 0, 0, '1714419676', NULL, '21', 'dashanpanvala', NULL, 1, 10),
(100, 8, 112, 811, 2002, 0, 0, 0, '1714419676', NULL, '58', 'Mananranjan058', NULL, 1, 10),
(101, 8, 112, 813, 2002, 0, 0, 0, '1714419676', NULL, '18', 'Zeelvarma', NULL, 1, 10),
(102, 8, 112, 756, 2002, 0, 0, 0, '1714419676', NULL, '85', 'Aryanbhai', NULL, 1, 10),
(103, 8, 112, 707, 2002, 0, 0, 0, '1714419676', NULL, '17', 'Gupatpratham', NULL, 1, 10),
(104, 8, 112, 755, 2002, 0, 0, 0, '1714419676', NULL, '99', 'Amansharma6767', NULL, 1, 10),
(105, 8, 112, 745, 2002, 0, 0, 0, '1714419676', NULL, '11', 'nilesh', NULL, 1, 10),
(106, 8, 112, 786, 2002, 0, 0, 0, '1714419676', NULL, '92', 'smitlathiya5959', NULL, 1, 10),
(107, 8, 112, 821, 2002, 0, 0, 0, '1714419676', NULL, '22', 'Aaravsingh107', NULL, 1, 10),
(108, 8, 112, 820, 2002, 0, 0, 0, '1714419676', NULL, '86', 'Rajanmehata098', NULL, 1, 10),
(109, 8, 112, 747, 2002, 0, 0, 0, '1714419676', NULL, '54', 'hiran455', NULL, 1, 10),
(110, 8, 112, 688, 2002, 0, 0, 0, '1714419676', NULL, '38', 'Sethaditi753', NULL, 1, 10),
(111, 8, 112, 745, 2002, 0, 0, 0, '1714419676', NULL, '12', 'nilesh', NULL, 1, 10),
(112, 8, 112, 714, 2002, 0, 0, 0, '1714419676', NULL, '22', 'Basujatin', NULL, 1, 10),
(113, 8, 112, 683, 2002, 0, 0, 0, '1714419676', NULL, '42', 'Ishaanahuja', NULL, 1, 10),
(114, 8, 112, 757, 2002, 0, 0, 0, '1714419676', NULL, '44', 'Bhargava', NULL, 1, 10),
(115, 8, 112, 770, 2002, 0, 0, 0, '1714419676', NULL, '68', 'ashishmhata', NULL, 1, 10),
(116, 8, 112, 699, 2002, 0, 0, 0, '1714419676', NULL, '51', 'Vedantjain', NULL, 1, 10),
(117, 8, 112, 830, 2002, 0, 0, 0, '1714419676', NULL, '89', 'Lakshjadhav318', NULL, 1, 10),
(118, 8, 112, 726, 2002, 0, 0, 0, '1714419676', NULL, '77', 'Yagnesh99', NULL, 1, 10),
(119, 8, 112, 741, 2002, 0, 0, 0, '1714419676', NULL, '99', 'vipul', NULL, 1, 10),
(120, 8, 112, 761, 2002, 0, 0, 0, '1714419676', NULL, '33', 'Dharma', NULL, 1, 10),
(121, 8, 112, 769, 2002, 0, 0, 0, '1714419676', NULL, '26', 'nikunjshah', NULL, 1, 10),
(122, 8, 112, 811, 2002, 0, 0, 0, '1714419676', NULL, '64', 'Mananranjan058', NULL, 1, 10),
(123, 8, 112, 696, 2002, 0, 0, 0, '1714419676', NULL, '39', 'Virajdas', NULL, 1, 10),
(124, 8, 112, 766, 2002, 0, 0, 0, '1714419676', NULL, '69', 'mahulkoli', NULL, 1, 10),
(125, 8, 112, 816, 2002, 0, 0, 0, '1714419676', NULL, '48', 'Rajbhuiya075', NULL, 1, 10),
(126, 8, 112, 837, 2002, 0, 0, 0, '1714419676', NULL, '19', 'Dilipshukla347', NULL, 1, 10),
(127, 8, 112, 761, 2002, 0, 0, 0, '1714419676', NULL, '88', 'Dharma', NULL, 1, 10),
(128, 8, 112, 746, 2002, 0, 0, 0, '1714419676', NULL, '66', 'dharmik', NULL, 1, 10),
(129, 8, 112, 832, 2002, 0, 0, 0, '1714419676', NULL, '37', 'Yogeshkaurav0332', NULL, 1, 10),
(130, 8, 112, 793, 2002, 0, 0, 0, '1714419676', NULL, '79', 'Baburam9696', NULL, 1, 10),
(131, 8, 112, 766, 2002, 0, 0, 0, '1714419676', NULL, '18', 'mahulkoli', NULL, 1, 10),
(132, 8, 112, 778, 2002, 0, 0, 0, '1714419676', NULL, '61', 'tejash', NULL, 1, 10),
(133, 8, 112, 826, 2002, 0, 0, 0, '1714419676', NULL, '41', 'RitvikKevat034', NULL, 1, 10),
(134, 8, 112, 830, 2002, 0, 0, 0, '1714419676', NULL, '85', 'Lakshjadhav318', NULL, 1, 10),
(135, 8, 112, 795, 2002, 0, 0, 0, '1714419676', NULL, '67', 'Shreeramprasad009', NULL, 1, 10),
(136, 8, 112, 681, 2002, 0, 0, 0, '1714419676', NULL, '70', 'agarwalnidhi003', NULL, 1, 10),
(137, 8, 112, 818, 2002, 0, 0, 0, '1714419676', NULL, '84', 'Kubardas083', NULL, 1, 10),
(138, 8, 112, 828, 2002, 0, 0, 0, '1714419676', NULL, '66', 'Sameerkhan306', NULL, 1, 10),
(139, 8, 112, 720, 2002, 0, 0, 0, '1714419676', NULL, '56', 'Ronithjoshi', NULL, 1, 10),
(140, 8, 112, 769, 2002, 0, 0, 0, '1714419676', NULL, '22', 'nikunjshah', NULL, 1, 10),
(141, 8, 112, 686, 2002, 0, 0, 0, '1714419676', NULL, '58', 'Diyaseth 25', NULL, 1, 10),
(142, 8, 112, 712, 2002, 0, 0, 0, '1714419676', NULL, '22', 'Ikbalkhan', NULL, 1, 10),
(143, 8, 112, 747, 2002, 0, 0, 0, '1714419676', NULL, '18', 'hiran455', NULL, 1, 10),
(144, 8, 112, 730, 2002, 0, 0, 0, '1714419676', NULL, '79', 'Samarth', NULL, 1, 10),
(145, 8, 112, 833, 2002, 0, 0, 0, '1714419676', NULL, '82', 'Amitarora336', NULL, 1, 10),
(146, 8, 112, 785, 2002, 0, 0, 0, '1714419676', NULL, '79', 'Khaljitasingh786', NULL, 1, 10),
(147, 8, 112, 684, 2002, 0, 0, 0, '1714419676', NULL, '22', 'Pandya1507', NULL, 1, 10),
(148, 8, 112, 784, 2002, 0, 0, 0, '1714419676', NULL, '17', 'Rajankumar577', NULL, 1, 10),
(149, 8, 112, 721, 2002, 0, 0, 0, '1714419676', NULL, '68', 'karankhan', NULL, 1, 10),
(150, 8, 112, 767, 2002, 0, 0, 0, '1714419676', NULL, '62', 'miteshbhai', NULL, 1, 10),
(151, 1, 112, 733, 2002, 0, 0, 0, '1714423441', NULL, '82', 'Rushil', NULL, 1, 10),
(152, 1, 112, 825, 2002, 0, 0, 0, '1714423441', NULL, '14', 'Rahulvishwas028', NULL, 1, 10),
(153, 1, 112, 835, 2002, 0, 0, 0, '1714423441', NULL, '93', 'Ronitsharma341', NULL, 1, 10),
(154, 1, 112, 772, 2002, 0, 0, 0, '1714423441', NULL, '68', 'rakesh', NULL, 1, 10),
(155, 1, 112, 746, 2002, 0, 0, 0, '1714423441', NULL, '33', 'dharmik', NULL, 1, 10),
(156, 1, 112, 820, 2002, 0, 0, 0, '1714423441', NULL, '28', 'Rajanmehata098', NULL, 1, 10),
(157, 1, 112, 702, 2002, 0, 0, 0, '1714423441', NULL, '30', 'Ayushlal', NULL, 1, 10),
(158, 1, 112, 717, 2002, 0, 0, 0, '1714423441', NULL, '45', 'kuntnakul', NULL, 1, 10),
(159, 1, 112, 822, 2002, 0, 0, 0, '1714423441', NULL, '96', 'Aakeshmandapara109', NULL, 1, 10),
(160, 1, 112, 691, 2002, 0, 0, 0, '1714423441', NULL, '77', 'Kabirshah007', NULL, 1, 10),
(161, 1, 112, 815, 2002, 0, 0, 0, '1714423441', NULL, '61', 'Davemochi068', NULL, 1, 10),
(162, 1, 112, 803, 2002, 0, 0, 0, '1714423441', NULL, '40', 'Deepsinha034', NULL, 1, 10),
(163, 1, 112, 791, 2002, 0, 0, 0, '1714423441', NULL, '57', 'kavashulkumari560', NULL, 1, 10),
(164, 1, 112, 823, 2002, 0, 0, 0, '1714423441', NULL, '21', 'Ekanshmojidara122', NULL, 1, 10),
(165, 1, 112, 727, 2002, 0, 0, 0, '1714423441', NULL, '61', 'Veerkumar', NULL, 1, 10),
(166, 1, 112, 803, 2002, 0, 0, 0, '1714423441', NULL, '99', 'Deepsinha034', NULL, 1, 10),
(167, 1, 112, 725, 2002, 0, 0, 0, '1714423441', NULL, '34', 'Yugsharmna1010', NULL, 1, 10),
(168, 1, 112, 807, 2002, 0, 0, 0, '1714423441', NULL, '46', 'Pravintiwari046', NULL, 1, 10),
(169, 1, 112, 816, 2002, 0, 0, 0, '1714423441', NULL, '84', 'Rajbhuiya075', NULL, 1, 10),
(170, 1, 112, 799, 2002, 0, 0, 0, '1714423441', NULL, '16', 'Roopeshmahta014', NULL, 1, 10),
(171, 1, 112, 713, 2002, 0, 0, 0, '1714423441', NULL, '63', 'Jaibalan333', NULL, 1, 10),
(172, 1, 112, 828, 2002, 0, 0, 0, '1714423441', NULL, '85', 'Sameerkhan306', NULL, 1, 10),
(173, 1, 112, 836, 2002, 0, 0, 0, '1714423441', NULL, '48', 'Asimkham346', NULL, 1, 10),
(174, 1, 112, 750, 2002, 0, 0, 0, '1714423441', NULL, '46', 'bhavesh', NULL, 1, 10),
(175, 1, 112, 727, 2002, 0, 0, 0, '1714423441', NULL, '51', 'Veerkumar', NULL, 1, 10),
(176, 1, 112, 808, 2002, 0, 0, 0, '1714423441', NULL, '29', 'Ahamadmistri049', NULL, 1, 10),
(177, 1, 112, 717, 2002, 0, 0, 0, '1714423441', NULL, '11', 'kuntnakul', NULL, 1, 10),
(178, 1, 112, 782, 2002, 0, 0, 0, '1714423441', NULL, '80', 'roshnikumari', NULL, 1, 10),
(179, 1, 112, 728, 2002, 0, 0, 0, '1714423441', NULL, '43', 'Tejaskapor', NULL, 1, 10),
(180, 1, 112, 781, 2002, 0, 0, 0, '1714423441', NULL, '46', 'vrushantkakalotar', NULL, 1, 10),
(181, 1, 112, 764, 2002, 0, 0, 0, '1714423441', NULL, '92', 'katn', NULL, 1, 10),
(182, 1, 112, 755, 2002, 0, 0, 0, '1714423441', NULL, '63', 'Amansharma6767', NULL, 1, 10),
(183, 1, 112, 723, 2002, 0, 0, 0, '1714423441', NULL, '66', 'Zehaankhan', NULL, 1, 10),
(184, 1, 112, 711, 2002, 0, 0, 0, '1714423441', NULL, '25', 'Aryahitesh', NULL, 1, 10),
(185, 1, 112, 792, 2002, 0, 0, 0, '1714423441', NULL, '66', 'Maheshsah4466', NULL, 1, 10),
(186, 1, 112, 682, 2002, 0, 0, 0, '1714423441', NULL, '17', 'Dhruvkhatri ', NULL, 1, 10),
(187, 1, 112, 779, 2002, 0, 0, 0, '1714423441', NULL, '85', 'udairathod', NULL, 1, 10),
(188, 1, 112, 727, 2002, 0, 0, 0, '1714423441', NULL, '69', 'Veerkumar', NULL, 1, 10),
(189, 1, 112, 762, 2002, 0, 0, 0, '1714423441', NULL, '66', 'hitash', NULL, 1, 10),
(190, 1, 112, 803, 2002, 0, 0, 0, '1714423441', NULL, '89', 'Deepsinha034', NULL, 1, 10),
(191, 1, 112, 682, 2002, 0, 0, 0, '1714423441', NULL, '89', 'Dhruvkhatri ', NULL, 1, 10),
(192, 1, 112, 784, 2002, 0, 0, 0, '1714423441', NULL, '24', 'Rajankumar577', NULL, 1, 10),
(193, 1, 112, 795, 2002, 0, 0, 0, '1714423441', NULL, '11', 'Shreeramprasad009', NULL, 1, 10),
(194, 1, 112, 682, 2002, 0, 0, 0, '1714423441', NULL, '79', 'Dhruvkhatri ', NULL, 1, 10),
(195, 1, 112, 699, 2002, 0, 0, 0, '1714423441', NULL, '74', 'Vedantjain', NULL, 1, 10),
(196, 1, 112, 782, 2002, 0, 0, 0, '1714423441', NULL, '38', 'roshnikumari', NULL, 1, 10),
(197, 1, 112, 771, 2002, 0, 0, 0, '1714423441', NULL, '68', 'miherasolanki', NULL, 1, 10),
(198, 1, 112, 776, 2002, 0, 0, 0, '1714423441', NULL, '24', 'sankatpanditr', NULL, 1, 10),
(199, 1, 112, 780, 2002, 0, 0, 0, '1714423441', NULL, '50', 'uttampaneliya', NULL, 1, 10),
(200, 1, 112, 788, 2002, 0, 0, 0, '1714423441', NULL, '41', 'Mahirakhatun7171', NULL, 1, 10),
(201, 1, 112, 686, 2002, 0, 0, 0, '1714423441', NULL, '62', 'Diyaseth 25', NULL, 1, 10),
(202, 1, 112, 737, 2002, 0, 0, 0, '1714423441', NULL, '44', 'rajchopada', NULL, 1, 10),
(203, 1, 112, 720, 2002, 0, 0, 0, '1714423441', NULL, '60', 'Ronithjoshi', NULL, 1, 10),
(204, 1, 112, 733, 2002, 0, 0, 0, '1714423441', NULL, '77', 'Rushil', NULL, 1, 10),
(205, 1, 112, 682, 2002, 0, 0, 0, '1714423441', NULL, '22', 'Dhruvkhatri ', NULL, 1, 10),
(206, 1, 112, 694, 2002, 0, 0, 0, '1714423441', NULL, '88', 'Davedayal', NULL, 1, 10),
(207, 1, 112, 763, 2002, 0, 0, 0, '1714423441', NULL, '84', 'kalpeshsorathiya', NULL, 1, 10),
(208, 1, 112, 806, 2002, 0, 0, 0, '1714423441', NULL, '72', 'Kibarsada043', NULL, 1, 10),
(209, 1, 112, 777, 2002, 0, 0, 0, '1714423441', NULL, '42', 'smitmakavana', NULL, 1, 10),
(210, 1, 112, 827, 2002, 0, 0, 0, '1714423441', NULL, '66', 'Puravsingh036', NULL, 1, 10),
(211, 1, 112, 775, 2002, 0, 0, 0, '1714423441', NULL, '81', 'rajukumar', NULL, 1, 10),
(212, 1, 112, 837, 2002, 0, 0, 0, '1714423441', NULL, '90', 'Dilipshukla347', NULL, 1, 10),
(213, 1, 112, 738, 2002, 0, 0, 0, '1714423441', NULL, '67', 'Umarkhan', NULL, 1, 10),
(214, 1, 112, 685, 2002, 0, 0, 0, '1714423441', NULL, '44', 'Amarsingh03', NULL, 1, 10),
(215, 1, 112, 788, 2002, 0, 0, 0, '1714423441', NULL, '43', 'Mahirakhatun7171', NULL, 1, 10),
(216, 1, 112, 810, 2002, 0, 0, 0, '1714423441', NULL, '18', 'Parthkishi052', NULL, 1, 10),
(217, 1, 112, 768, 2002, 0, 0, 0, '1714423441', NULL, '65', 'narshirathaliya', NULL, 1, 10),
(218, 1, 112, 692, 2002, 0, 0, 0, '1714423441', NULL, '80', 'Tejmehta505', NULL, 1, 10),
(219, 1, 112, 774, 2002, 0, 0, 0, '1714423441', NULL, '13', 'Ravisolanki', NULL, 1, 10),
(220, 1, 112, 763, 2002, 0, 0, 0, '1714423441', NULL, '72', 'kalpeshsorathiya', NULL, 1, 10),
(221, 1, 112, 792, 2002, 0, 0, 0, '1714423441', NULL, '49', 'Maheshsah4466', NULL, 1, 10),
(222, 1, 112, 684, 2002, 0, 0, 0, '1714423441', NULL, '57', 'Pandya1507', NULL, 1, 10),
(223, 1, 112, 782, 2002, 0, 0, 0, '1714423441', NULL, '40', 'roshnikumari', NULL, 1, 10),
(224, 1, 112, 828, 2002, 0, 0, 0, '1714423441', NULL, '87', 'Sameerkhan306', NULL, 1, 10),
(225, 1, 112, 775, 2002, 0, 0, 0, '1714423441', NULL, '45', 'rajukumar', NULL, 1, 10),
(226, 1, 112, 752, 2002, 0, 0, 0, '1714423441', NULL, '51', 'hirandolakiya', NULL, 1, 10),
(227, 1, 112, 795, 2002, 0, 0, 0, '1714423441', NULL, '60', 'Shreeramprasad009', NULL, 1, 10),
(228, 1, 112, 764, 2002, 0, 0, 0, '1714423441', NULL, '17', 'katn', NULL, 1, 10),
(229, 1, 112, 788, 2002, 0, 0, 0, '1714423441', NULL, '35', 'Mahirakhatun7171', NULL, 1, 10),
(230, 1, 112, 698, 2002, 0, 0, 0, '1714423441', NULL, '57', 'Ishaanghosh', NULL, 1, 10),
(231, 1, 112, 767, 2002, 0, 0, 0, '1714423441', NULL, '20', 'miteshbhai', NULL, 1, 10),
(232, 1, 112, 790, 2002, 0, 0, 0, '1714423441', NULL, '99', 'Princedharuka11', NULL, 1, 10),
(233, 1, 112, 756, 2002, 0, 0, 0, '1714423441', NULL, '52', 'Aryanbhai', NULL, 1, 10),
(234, 1, 112, 689, 2002, 0, 0, 0, '1714423441', NULL, '65', 'Ajaypatel4674', NULL, 1, 10),
(235, 1, 112, 756, 2002, 0, 0, 0, '1714423441', NULL, '56', 'Aryanbhai', NULL, 1, 10),
(236, 1, 112, 729, 2002, 0, 0, 0, '1714423441', NULL, '33', 'Tanish', NULL, 1, 10),
(237, 1, 112, 784, 2002, 0, 0, 0, '1714423441', NULL, '64', 'Rajankumar577', NULL, 1, 10),
(238, 1, 112, 698, 2002, 0, 0, 0, '1714423441', NULL, '64', 'Ishaanghosh', NULL, 1, 10),
(239, 1, 112, 703, 2002, 0, 0, 0, '1714423441', NULL, '87', 'Chandresh', NULL, 1, 10),
(240, 1, 112, 721, 2002, 0, 0, 0, '1714423441', NULL, '46', 'karankhan', NULL, 1, 10),
(241, 1, 112, 726, 2002, 0, 0, 0, '1714423441', NULL, '69', 'Yagnesh99', NULL, 1, 10),
(242, 1, 112, 718, 2002, 0, 0, 0, '1714423441', NULL, '79', 'Ommangal', NULL, 1, 10),
(243, 1, 112, 796, 2002, 0, 0, 0, '1714423441', NULL, '22', 'Prashadmandal016', NULL, 1, 10),
(244, 1, 112, 700, 2002, 0, 0, 0, '1714423441', NULL, '48', 'Harsithjoshi', NULL, 1, 10),
(245, 1, 112, 699, 2002, 0, 0, 0, '1714423441', NULL, '23', 'Vedantjain', NULL, 1, 10),
(246, 1, 117, 759, 2002, 400, 4, 0, '1714423441', NULL, '26', 'dashanpanvala', NULL, 1, 10),
(247, 1, 117, 810, 2002, 600, 3, 0, '1714423441', NULL, '38', 'Parthkishi052', NULL, 1, 10),
(248, 1, 117, 812, 2002, 1000, 1, 0, '1714423441', NULL, '79', 'Rushigiri056', NULL, 1, 10),
(249, 1, 117, 808, 2002, 200, 5, 0, '1714423441', NULL, '15', 'Ahamadmistri049', NULL, 1, 10),
(250, 1, 117, 695, 2002, 800, 2, 0, '1714423441', NULL, '64', 'Yashchandra', NULL, 1, 10),
(251, 1, 112, 765, 2002, 0, 0, 0, '1714423441', NULL, '53', 'mahesh', NULL, 1, 10),
(252, 1, 112, 718, 2002, 0, 0, 0, '1714423441', NULL, '52', 'Ommangal', NULL, 1, 10),
(253, 1, 112, 827, 2002, 0, 0, 0, '1714423441', NULL, '86', 'Puravsingh036', NULL, 1, 10),
(254, 1, 112, 753, 2002, 0, 0, 0, '1714423441', NULL, '43', 'jiganeshkumar', NULL, 1, 10),
(255, 1, 112, 818, 2002, 0, 0, 0, '1714423441', NULL, '85', 'Kubardas083', NULL, 1, 10),
(256, 1, 112, 780, 2002, 0, 0, 0, '1714423441', NULL, '90', 'uttampaneliya', NULL, 1, 10),
(257, 1, 112, 765, 2002, 0, 0, 0, '1714423441', NULL, '92', 'mahesh', NULL, 1, 10),
(258, 1, 112, 792, 2002, 0, 0, 0, '1714423441', NULL, '70', 'Maheshsah4466', NULL, 1, 10),
(259, 1, 112, 801, 2002, 0, 0, 0, '1714423441', NULL, '33', 'Jegarpandit028', NULL, 1, 10),
(260, 1, 112, 745, 2002, 0, 0, 0, '1714423441', NULL, '73', 'nilesh', NULL, 1, 10),
(261, 1, 112, 838, 2002, 0, 0, 0, '1714423441', NULL, '24', 'Nikhilsaru349', NULL, 1, 10),
(262, 1, 112, 771, 2002, 0, 0, 0, '1714423441', NULL, '76', 'miherasolanki', NULL, 1, 10),
(263, 1, 112, 755, 2002, 0, 0, 0, '1714423441', NULL, '70', 'Amansharma6767', NULL, 1, 10),
(264, 1, 112, 818, 2002, 0, 0, 0, '1714423441', NULL, '52', 'Kubardas083', NULL, 1, 10),
(265, 1, 112, 828, 2002, 0, 0, 0, '1714423441', NULL, '23', 'Sameerkhan306', NULL, 1, 10),
(266, 1, 112, 724, 2002, 0, 0, 0, '1714423441', NULL, '24', 'prity4041', NULL, 1, 10),
(267, 1, 112, 777, 2002, 0, 0, 0, '1714423441', NULL, '99', 'smitmakavana', NULL, 1, 10),
(268, 1, 112, 772, 2002, 0, 0, 0, '1714423441', NULL, '63', 'rakesh', NULL, 1, 10),
(269, 1, 112, 763, 2002, 0, 0, 0, '1714423441', NULL, '69', 'kalpeshsorathiya', NULL, 1, 10),
(270, 1, 112, 756, 2002, 0, 0, 0, '1714423441', NULL, '58', 'Aryanbhai', NULL, 1, 10),
(271, 2, 113, 763, 2000, 0, 0, 0, '1714423504', NULL, '11', 'kalpeshsorathiya', NULL, 1, 12),
(272, 2, 113, 791, 2000, 0, 0, 0, '1714423504', NULL, '75', 'kavashulkumari560', NULL, 1, 12),
(273, 2, 113, 815, 2000, 0, 0, 0, '1714423504', NULL, '30', 'Davemochi068', NULL, 1, 12),
(274, 2, 113, 715, 2000, 0, 0, 0, '1714423504', NULL, '19', 'Krishbatta', NULL, 1, 12),
(275, 2, 113, 815, 2000, 0, 0, 0, '1714423504', NULL, '63', 'Davemochi068', NULL, 1, 12),
(276, 2, 113, 764, 2000, 0, 0, 0, '1714423504', NULL, '57', 'katn', NULL, 1, 12),
(277, 2, 113, 691, 2000, 0, 0, 0, '1714423504', NULL, '94', 'Kabirshah007', NULL, 1, 12),
(278, 2, 113, 821, 2000, 0, 0, 0, '1714423504', NULL, '21', 'Aaravsingh107', NULL, 1, 12),
(279, 2, 113, 829, 2000, 0, 0, 0, '1714423504', NULL, '84', 'Vishalgupta0326', NULL, 1, 12),
(280, 2, 113, 712, 2000, 0, 0, 0, '1714423504', NULL, '64', 'Ikbalkhan', NULL, 1, 12),
(281, 2, 113, 727, 2000, 0, 0, 0, '1714423504', NULL, '35', 'Veerkumar', NULL, 1, 12),
(282, 2, 113, 701, 2000, 0, 0, 0, '1714423504', NULL, '34', 'Purnitjha', NULL, 1, 12),
(283, 2, 113, 688, 2000, 0, 0, 0, '1714423504', NULL, '55', 'Sethaditi753', NULL, 1, 12),
(284, 2, 113, 757, 2000, 0, 0, 0, '1714423504', NULL, '32', 'Bhargava', NULL, 1, 12),
(285, 2, 113, 742, 2000, 0, 0, 0, '1714423504', NULL, '64', 'nitin', NULL, 1, 12),
(286, 2, 113, 719, 2000, 0, 0, 0, '1714423504', NULL, '61', 'hirparapanth', NULL, 1, 12),
(287, 2, 113, 752, 2000, 0, 0, 0, '1714423504', NULL, '27', 'hirandolakiya', NULL, 1, 12),
(288, 2, 113, 732, 2000, 0, 0, 0, '1714423504', NULL, '40', 'savan100', NULL, 1, 12),
(289, 2, 113, 798, 2000, 0, 0, 0, '1714423504', NULL, '55', 'Savejitadas', NULL, 1, 12),
(290, 2, 113, 716, 2000, 0, 0, 0, '1714423504', NULL, '59', 'Milankohli888', NULL, 1, 12),
(291, 2, 113, 739, 2000, 0, 0, 0, '1714423504', NULL, '39', 'aksharmahata111', NULL, 1, 12),
(292, 2, 113, 798, 2000, 0, 0, 0, '1714423504', NULL, '91', 'Savejitadas', NULL, 1, 12),
(293, 2, 113, 799, 2000, 0, 0, 0, '1714423504', NULL, '80', 'Roopeshmahta014', NULL, 1, 12),
(294, 2, 113, 793, 2000, 0, 0, 0, '1714423504', NULL, '36', 'Baburam9696', NULL, 1, 12),
(295, 2, 113, 734, 2000, 0, 0, 0, '1714423504', NULL, '65', 'Omkaarsingh', NULL, 1, 12),
(296, 2, 113, 808, 2000, 0, 0, 0, '1714423504', NULL, '64', 'Ahamadmistri049', NULL, 1, 12),
(297, 2, 113, 746, 2000, 0, 0, 0, '1714423504', NULL, '11', 'dharmik', NULL, 1, 12),
(298, 2, 113, 838, 2000, 0, 0, 0, '1714423504', NULL, '92', 'Nikhilsaru349', NULL, 1, 12),
(299, 2, 113, 778, 2000, 0, 0, 0, '1714423504', NULL, '33', 'tejash', NULL, 1, 12),
(300, 2, 113, 752, 2000, 0, 0, 0, '1714423504', NULL, '43', 'hirandolakiya', NULL, 1, 12),
(301, 2, 113, 694, 2000, 0, 0, 0, '1714423504', NULL, '16', 'Davedayal', NULL, 1, 12),
(302, 2, 113, 735, 2000, 0, 0, 0, '1714423504', NULL, '84', 'Nimitpatel', NULL, 1, 12),
(303, 2, 113, 692, 2000, 0, 0, 0, '1714423504', NULL, '71', 'Tejmehta505', NULL, 1, 12),
(304, 2, 113, 817, 2000, 0, 0, 0, '1714423504', NULL, '66', 'Urvanbharati079', NULL, 1, 12),
(305, 2, 113, 736, 2000, 0, 0, 0, '1714423504', NULL, '35', ' Amulya', NULL, 1, 12),
(306, 2, 113, 710, 2000, 0, 0, 0, '1714423504', NULL, '26', 'Harshilpaneliya', NULL, 1, 12),
(307, 2, 113, 813, 2000, 0, 0, 0, '1714423504', NULL, '97', 'Zeelvarma', NULL, 1, 12),
(308, 2, 113, 742, 2000, 0, 0, 0, '1714423504', NULL, '30', 'nitin', NULL, 1, 12),
(309, 2, 113, 732, 2000, 0, 0, 0, '1714423504', NULL, '79', 'savan100', NULL, 1, 12),
(310, 2, 113, 767, 2000, 0, 0, 0, '1714423504', NULL, '17', 'miteshbhai', NULL, 1, 12),
(311, 2, 113, 697, 2000, 0, 0, 0, '1714423504', NULL, '44', 'Aakeshgupta', NULL, 1, 12),
(312, 2, 113, 711, 2000, 0, 0, 0, '1714423504', NULL, '96', 'Aryahitesh', NULL, 1, 12),
(313, 2, 113, 750, 2000, 0, 0, 0, '1714423504', NULL, '75', 'bhavesh', NULL, 1, 12),
(314, 2, 113, 787, 2000, 0, 0, 0, '1714423504', NULL, '10', 'Hardeepyadav444', NULL, 1, 12),
(315, 2, 113, 756, 2000, 0, 0, 0, '1714423504', NULL, '14', 'Aryanbhai', NULL, 1, 12),
(316, 2, 113, 713, 2000, 0, 0, 0, '1714423504', NULL, '22', 'Jaibalan333', NULL, 1, 12),
(317, 2, 113, 804, 2000, 0, 0, 0, '1714423504', NULL, '71', 'Fenilbhagat037', NULL, 1, 12),
(318, 2, 113, 803, 2000, 0, 0, 0, '1714423504', NULL, '51', 'Deepsinha034', NULL, 1, 12),
(319, 2, 113, 797, 2000, 0, 0, 0, '1714423504', NULL, '96', 'Mangalkhatoon014', NULL, 1, 12),
(320, 2, 113, 824, 2000, 0, 0, 0, '1714423504', NULL, '68', 'Pranjalkamati126', NULL, 1, 12),
(321, 2, 113, 778, 2000, 0, 0, 0, '1714423504', NULL, '51', 'tejash', NULL, 1, 12),
(322, 2, 113, 719, 2000, 0, 0, 0, '1714423504', NULL, '47', 'hirparapanth', NULL, 1, 12),
(323, 2, 113, 795, 2000, 0, 0, 0, '1714423504', NULL, '24', 'Shreeramprasad009', NULL, 1, 12),
(324, 2, 113, 792, 2000, 0, 0, 0, '1714423504', NULL, '39', 'Maheshsah4466', NULL, 1, 12),
(325, 2, 113, 820, 2000, 0, 0, 0, '1714423504', NULL, '56', 'Rajanmehata098', NULL, 1, 12),
(326, 2, 113, 711, 2000, 0, 0, 0, '1714423504', NULL, '13', 'Aryahitesh', NULL, 1, 12),
(327, 2, 113, 806, 2000, 0, 0, 0, '1714423504', NULL, '17', 'Kibarsada043', NULL, 1, 12),
(328, 2, 113, 691, 2000, 0, 0, 0, '1714423504', NULL, '55', 'Kabirshah007', NULL, 1, 12),
(329, 2, 113, 696, 2000, 0, 0, 0, '1714423504', NULL, '56', 'Virajdas', NULL, 1, 12),
(330, 2, 113, 785, 2000, 0, 0, 0, '1714423504', NULL, '62', 'Khaljitasingh786', NULL, 1, 12),
(331, 2, 113, 705, 2000, 0, 0, 0, '1714423504', NULL, '18', 'baburaval', NULL, 1, 12),
(332, 2, 113, 756, 2000, 0, 0, 0, '1714423504', NULL, '62', 'Aryanbhai', NULL, 1, 12),
(333, 2, 113, 767, 2000, 0, 0, 0, '1714423504', NULL, '67', 'miteshbhai', NULL, 1, 12),
(334, 2, 113, 805, 2000, 0, 0, 0, '1714423504', NULL, '45', 'Rahimali039', NULL, 1, 12),
(335, 2, 113, 715, 2000, 0, 0, 0, '1714423504', NULL, '17', 'Krishbatta', NULL, 1, 12),
(336, 2, 113, 727, 2000, 0, 0, 0, '1714423504', NULL, '56', 'Veerkumar', NULL, 1, 12),
(337, 2, 113, 725, 2000, 0, 0, 0, '1714423504', NULL, '58', 'Yugsharmna1010', NULL, 1, 12),
(338, 2, 113, 822, 2000, 0, 0, 0, '1714423504', NULL, '11', 'Aakeshmandapara109', NULL, 1, 12),
(339, 2, 113, 690, 2000, 0, 0, 0, '1714423504', NULL, '59', 'Mihirthakur207', NULL, 1, 12),
(340, 2, 113, 770, 2000, 0, 0, 0, '1714423504', NULL, '74', 'ashishmhata', NULL, 1, 12),
(341, 2, 113, 700, 2000, 0, 0, 0, '1714423504', NULL, '19', 'Harsithjoshi', NULL, 1, 12),
(342, 2, 113, 821, 2000, 0, 0, 0, '1714423504', NULL, '88', 'Aaravsingh107', NULL, 1, 12),
(343, 2, 113, 737, 2000, 0, 0, 0, '1714423504', NULL, '55', 'rajchopada', NULL, 1, 12),
(344, 2, 113, 776, 2000, 0, 0, 0, '1714423504', NULL, '46', 'sankatpanditr', NULL, 1, 12),
(345, 2, 113, 745, 2000, 0, 0, 0, '1714423504', NULL, '80', 'nilesh', NULL, 1, 12),
(346, 2, 113, 769, 2000, 0, 0, 0, '1714423504', NULL, '64', 'nikunjshah', NULL, 1, 12),
(347, 2, 113, 824, 2000, 0, 0, 0, '1714423504', NULL, '51', 'Pranjalkamati126', NULL, 1, 12),
(348, 2, 113, 808, 2000, 0, 0, 0, '1714423504', NULL, '54', 'Ahamadmistri049', NULL, 1, 12),
(349, 2, 113, 699, 2000, 0, 0, 0, '1714423504', NULL, '77', 'Vedantjain', NULL, 1, 12),
(350, 2, 113, 791, 2000, 0, 0, 0, '1714423504', NULL, '62', 'kavashulkumari560', NULL, 1, 12),
(351, 2, 113, 801, 2000, 0, 0, 0, '1714423504', NULL, '95', 'Jegarpandit028', NULL, 1, 12),
(352, 2, 113, 798, 2000, 0, 0, 0, '1714423504', NULL, '15', 'Savejitadas', NULL, 1, 12),
(353, 2, 113, 838, 2000, 0, 0, 0, '1714423504', NULL, '37', 'Nikhilsaru349', NULL, 1, 12),
(354, 2, 113, 784, 2000, 0, 0, 0, '1714423504', NULL, '17', 'Rajankumar577', NULL, 1, 12),
(355, 2, 113, 775, 2000, 0, 0, 0, '1714423504', NULL, '83', 'rajukumar', NULL, 1, 12),
(356, 2, 113, 758, 2000, 0, 0, 0, '1714423504', NULL, '31', 'Brinkal0009', NULL, 1, 12),
(357, 2, 113, 816, 2000, 0, 0, 0, '1714423504', NULL, '20', 'Rajbhuiya075', NULL, 1, 12),
(358, 2, 113, 749, 2000, 0, 0, 0, '1714423504', NULL, '29', 'Ankit', NULL, 1, 12),
(359, 2, 113, 780, 2000, 0, 0, 0, '1714423504', NULL, '31', 'uttampaneliya', NULL, 1, 12),
(360, 2, 113, 681, 2000, 0, 0, 0, '1714423504', NULL, '40', 'agarwalnidhi003', NULL, 1, 12),
(361, 2, 113, 732, 2000, 0, 0, 0, '1714423504', NULL, '68', 'savan100', NULL, 1, 12),
(362, 2, 113, 832, 2000, 0, 0, 0, '1714423504', NULL, '91', 'Yogeshkaurav0332', NULL, 1, 12),
(363, 2, 113, 813, 2000, 0, 0, 0, '1714423504', NULL, '91', 'Zeelvarma', NULL, 1, 12),
(364, 2, 113, 718, 2000, 0, 0, 0, '1714423504', NULL, '73', 'Ommangal', NULL, 1, 12),
(365, 2, 113, 779, 2000, 0, 0, 0, '1714423504', NULL, '52', 'udairathod', NULL, 1, 12),
(366, 2, 113, 707, 2000, 0, 0, 0, '1714423504', NULL, '15', 'Gupatpratham', NULL, 1, 12),
(367, 2, 113, 786, 2000, 0, 0, 0, '1714423504', NULL, '75', 'smitlathiya5959', NULL, 1, 12),
(368, 2, 113, 705, 2000, 0, 0, 0, '1714423504', NULL, '42', 'baburaval', NULL, 1, 12),
(369, 2, 113, 810, 2000, 0, 0, 0, '1714423504', NULL, '93', 'Parthkishi052', NULL, 1, 12),
(370, 2, 113, 728, 2000, 0, 0, 0, '1714423504', NULL, '18', 'Tejaskapor', NULL, 1, 12),
(371, 2, 113, 800, 2000, 0, 0, 0, '1714423504', NULL, '45', 'Chandualam02', NULL, 1, 12),
(372, 2, 113, 765, 2000, 0, 0, 0, '1714423504', NULL, '52', 'mahesh', NULL, 1, 12),
(373, 2, 113, 711, 2000, 0, 0, 0, '1714423504', NULL, '82', 'Aryahitesh', NULL, 1, 12),
(374, 2, 113, 831, 2000, 0, 0, 0, '1714423504', NULL, '78', 'Varunmishra0329', NULL, 1, 12),
(375, 2, 113, 729, 2000, 0, 0, 0, '1714423504', NULL, '24', 'Tanish', NULL, 1, 12),
(376, 2, 113, 825, 2000, 0, 0, 0, '1714423504', NULL, '51', 'Rahulvishwas028', NULL, 1, 12),
(377, 2, 113, 805, 2000, 0, 0, 0, '1714423504', NULL, '36', 'Rahimali039', NULL, 1, 12),
(378, 2, 113, 780, 2000, 0, 0, 0, '1714423504', NULL, '22', 'uttampaneliya', NULL, 1, 12),
(379, 2, 113, 783, 2000, 0, 0, 0, '1714423504', NULL, '10', 'Nihardevi303', NULL, 1, 12),
(380, 2, 113, 831, 2000, 0, 0, 0, '1714423504', NULL, '38', 'Varunmishra0329', NULL, 1, 12),
(381, 2, 113, 751, 2000, 0, 0, 0, '1714423504', NULL, '75', 'Pranjalgupta', NULL, 1, 12),
(382, 2, 113, 836, 2000, 0, 0, 0, '1714423504', NULL, '63', 'Asimkham346', NULL, 1, 12),
(383, 2, 113, 780, 2000, 0, 0, 0, '1714423504', NULL, '60', 'uttampaneliya', NULL, 1, 12),
(384, 2, 113, 702, 2000, 0, 0, 0, '1714423504', NULL, '82', 'Ayushlal', NULL, 1, 12),
(385, 2, 113, 759, 2000, 0, 0, 0, '1714423504', NULL, '64', 'dashanpanvala', NULL, 1, 12),
(386, 2, 113, 755, 2000, 0, 0, 0, '1714423504', NULL, '77', 'Amansharma6767', NULL, 1, 12),
(387, 2, 113, 720, 2000, 0, 0, 0, '1714423504', NULL, '76', 'Ronithjoshi', NULL, 1, 12),
(388, 2, 113, 793, 2000, 0, 0, 0, '1714423504', NULL, '82', 'Baburam9696', NULL, 1, 12),
(389, 2, 113, 717, 2000, 0, 0, 0, '1714423504', NULL, '31', 'kuntnakul', NULL, 1, 12),
(390, 2, 113, 754, 2000, 0, 0, 0, '1714423504', NULL, '60', 'jitukanpara', NULL, 1, 12),
(391, 2, 113, 687, 2000, 0, 0, 0, '1714423532', NULL, '31', 'Sananaidhu', NULL, 1, 12),
(392, 2, 113, 757, 2000, 0, 0, 0, '1714423532', NULL, '13', 'Bhargava', NULL, 1, 12),
(393, 2, 113, 735, 2000, 0, 0, 0, '1714423532', NULL, '15', 'Nimitpatel', NULL, 1, 12),
(394, 2, 113, 777, 2000, 0, 0, 0, '1714423532', NULL, '21', 'smitmakavana', NULL, 1, 12),
(395, 2, 113, 782, 2000, 0, 0, 0, '1714423532', NULL, '73', 'roshnikumari', NULL, 1, 12),
(396, 2, 113, 824, 2000, 0, 0, 0, '1714423532', NULL, '58', 'Pranjalkamati126', NULL, 1, 12),
(397, 2, 113, 769, 2000, 0, 0, 0, '1714423532', NULL, '56', 'nikunjshah', NULL, 1, 12),
(398, 2, 113, 793, 2000, 0, 0, 0, '1714423532', NULL, '18', 'Baburam9696', NULL, 1, 12),
(399, 2, 113, 806, 2000, 0, 0, 0, '1714423532', NULL, '49', 'Kibarsada043', NULL, 1, 12),
(400, 2, 113, 712, 2000, 0, 0, 0, '1714423532', NULL, '11', 'Ikbalkhan', NULL, 1, 12),
(401, 2, 113, 726, 2000, 0, 0, 0, '1714423532', NULL, '40', 'Yagnesh99', NULL, 1, 12),
(402, 2, 113, 705, 2000, 0, 0, 0, '1714423532', NULL, '89', 'baburaval', NULL, 1, 12),
(403, 2, 113, 685, 2000, 0, 0, 0, '1714423532', NULL, '92', 'Amarsingh03', NULL, 1, 12),
(404, 2, 113, 745, 2000, 0, 0, 0, '1714423532', NULL, '96', 'nilesh', NULL, 1, 12),
(405, 2, 113, 791, 2000, 0, 0, 0, '1714423532', NULL, '27', 'kavashulkumari560', NULL, 1, 12),
(406, 2, 113, 799, 2000, 0, 0, 0, '1714423532', NULL, '29', 'Roopeshmahta014', NULL, 1, 12),
(407, 2, 113, 770, 2000, 0, 0, 0, '1714423532', NULL, '95', 'ashishmhata', NULL, 1, 12),
(408, 2, 113, 697, 2000, 0, 0, 0, '1714423532', NULL, '40', 'Aakeshgupta', NULL, 1, 12),
(409, 2, 113, 753, 2000, 0, 0, 0, '1714423532', NULL, '83', 'jiganeshkumar', NULL, 1, 12),
(410, 2, 113, 719, 2000, 0, 0, 0, '1714423532', NULL, '79', 'hirparapanth', NULL, 1, 12),
(411, 2, 113, 819, 2000, 0, 0, 0, '1714423532', NULL, '76', 'Lakshbandari087', NULL, 1, 12),
(412, 2, 113, 695, 2000, 0, 0, 0, '1714423532', NULL, '72', 'Yashchandra', NULL, 1, 12),
(413, 2, 113, 683, 2000, 0, 0, 0, '1714423532', NULL, '50', 'Ishaanahuja', NULL, 1, 12),
(414, 2, 113, 687, 2000, 0, 0, 0, '1714423532', NULL, '18', 'Sananaidhu', NULL, 1, 12),
(415, 2, 113, 719, 2000, 0, 0, 0, '1714423532', NULL, '35', 'hirparapanth', NULL, 1, 12),
(416, 2, 113, 734, 2000, 0, 0, 0, '1714423532', NULL, '83', 'Omkaarsingh', NULL, 1, 12),
(417, 2, 113, 716, 2000, 0, 0, 0, '1714423532', NULL, '79', 'Milankohli888', NULL, 1, 12),
(418, 2, 113, 744, 2000, 0, 0, 0, '1714423532', NULL, '16', 'rohitajoshi', NULL, 1, 12),
(419, 2, 113, 742, 2000, 0, 0, 0, '1714423532', NULL, '67', 'nitin', NULL, 1, 12),
(420, 2, 113, 806, 2000, 0, 0, 0, '1714423532', NULL, '88', 'Kibarsada043', NULL, 1, 12),
(421, 2, 113, 813, 2000, 0, 0, 0, '1714423532', NULL, '77', 'Zeelvarma', NULL, 1, 12),
(422, 2, 113, 799, 2000, 0, 0, 0, '1714423532', NULL, '10', 'Roopeshmahta014', NULL, 1, 12),
(423, 2, 113, 791, 2000, 0, 0, 0, '1714423532', NULL, '75', 'kavashulkumari560', NULL, 1, 12),
(424, 2, 113, 741, 2000, 0, 0, 0, '1714423532', NULL, '41', 'vipul', NULL, 1, 12),
(425, 2, 113, 682, 2000, 0, 0, 0, '1714423532', NULL, '97', 'Dhruvkhatri ', NULL, 1, 12),
(426, 2, 113, 721, 2000, 0, 0, 0, '1714423532', NULL, '16', 'karankhan', NULL, 1, 12),
(427, 2, 113, 774, 2000, 0, 0, 0, '1714423532', NULL, '49', 'Ravisolanki', NULL, 1, 12),
(428, 2, 113, 812, 2000, 0, 0, 0, '1714423532', NULL, '84', 'Rushigiri056', NULL, 1, 12),
(429, 2, 113, 781, 2000, 0, 0, 0, '1714423532', NULL, '79', 'vrushantkakalotar', NULL, 1, 12),
(430, 2, 113, 758, 2000, 0, 0, 0, '1714423532', NULL, '70', 'Brinkal0009', NULL, 1, 12),
(431, 2, 113, 708, 2000, 0, 0, 0, '1714423532', NULL, '42', 'Farajkhan', NULL, 1, 12),
(432, 2, 113, 724, 2000, 0, 0, 0, '1714423532', NULL, '28', 'prity4041', NULL, 1, 12),
(433, 2, 113, 682, 2000, 0, 0, 0, '1714423532', NULL, '21', 'Dhruvkhatri ', NULL, 1, 12),
(434, 2, 113, 726, 2000, 0, 0, 0, '1714423532', NULL, '16', 'Yagnesh99', NULL, 1, 12),
(435, 2, 113, 796, 2000, 0, 0, 0, '1714423532', NULL, '36', 'Prashadmandal016', NULL, 1, 12),
(436, 2, 113, 809, 2000, 0, 0, 0, '1714423532', NULL, '97', 'Raviroy047', NULL, 1, 12),
(437, 2, 113, 789, 2000, 0, 0, 0, '1714423532', NULL, '37', 'Mahaveershing88', NULL, 1, 12),
(438, 2, 113, 779, 2000, 0, 0, 0, '1714423532', NULL, '96', 'udairathod', NULL, 1, 12),
(439, 2, 113, 820, 2000, 0, 0, 0, '1714423532', NULL, '82', 'Rajanmehata098', NULL, 1, 12),
(440, 2, 113, 791, 2000, 0, 0, 0, '1714423532', NULL, '90', 'kavashulkumari560', NULL, 1, 12),
(441, 7, 126, 821, 1000, 0, 0, 0, '1714603037', NULL, '19', 'Aaravsingh107', NULL, 1, 3),
(442, 7, 126, 721, 1000, 0, 0, 0, '1714603037', NULL, '39', 'karankhan', NULL, 1, 3),
(443, 7, 126, 806, 1000, 0, 0, 0, '1714603037', NULL, '31', 'Kibarsada043', NULL, 1, 3),
(444, 7, 126, 768, 1000, 0, 0, 0, '1714603037', NULL, '27', 'narshirathaliya', NULL, 1, 3),
(445, 7, 126, 681, 1000, 0, 0, 0, '1714603037', NULL, '79', 'agarwalnidhi003', NULL, 1, 3),
(446, 7, 126, 691, 1000, 0, 0, 0, '1714603037', NULL, '83', 'Kabirshah007', NULL, 1, 3),
(447, 7, 126, 761, 1000, 0, 0, 0, '1714603037', NULL, '21', 'Dharma', NULL, 1, 3),
(448, 7, 126, 808, 1000, 0, 0, 0, '1714603037', NULL, '28', 'Ahamadmistri049', NULL, 1, 3),
(449, 7, 126, 736, 1000, 0, 0, 0, '1714603037', NULL, '13', ' Amulya', NULL, 1, 3),
(450, 7, 126, 820, 1000, 0, 0, 0, '1714603037', NULL, '14', 'Rajanmehata098', NULL, 1, 3),
(451, 10, 131, 796, 1000, 0, 0, 0, '1714656082', NULL, '72', 'Prashadmandal016', NULL, 1, 3),
(452, 10, 131, 802, 1000, 0, 0, 0, '1714656082', NULL, '97', 'Ajausahani031', NULL, 1, 3),
(453, 10, 131, 785, 1000, 0, 0, 0, '1714656082', NULL, '66', 'Khaljitasingh786', NULL, 1, 3),
(454, 10, 131, 751, 1000, 0, 0, 0, '1714656082', NULL, '83', 'Pranjalgupta', NULL, 1, 3),
(455, 10, 131, 702, 1000, 0, 0, 0, '1714656082', NULL, '39', 'Ayushlal', NULL, 1, 3),
(456, 10, 131, 766, 1000, 0, 0, 0, '1714656082', NULL, '46', 'mahulkoli', NULL, 1, 3),
(457, 10, 131, 793, 1000, 0, 0, 0, '1714656082', NULL, '14', 'Baburam9696', NULL, 1, 3),
(458, 10, 131, 837, 1000, 0, 0, 0, '1714656082', NULL, '46', 'Dilipshukla347', NULL, 1, 3),
(459, 10, 131, 736, 1000, 0, 0, 0, '1714656082', NULL, '94', ' Amulya', NULL, 1, 3),
(460, 10, 131, 726, 1000, 0, 0, 0, '1714656082', NULL, '81', 'Yagnesh99', NULL, 1, 3),
(461, 10, 131, 694, 1000, 0, 0, 0, '1714656082', NULL, '75', 'Davedayal', NULL, 1, 3),
(462, 10, 131, 751, 1000, 0, 0, 0, '1714656082', NULL, '46', 'Pranjalgupta', NULL, 1, 3),
(463, 10, 131, 824, 1000, 0, 0, 0, '1714656082', NULL, '96', 'Pranjalkamati126', NULL, 1, 3),
(464, 10, 131, 811, 1000, 0, 0, 0, '1714656082', NULL, '57', 'Mananranjan058', NULL, 1, 3),
(465, 10, 131, 727, 1000, 0, 0, 0, '1714656082', NULL, '20', 'Veerkumar', NULL, 1, 3),
(466, 10, 131, 810, 1000, 0, 0, 0, '1714656082', NULL, '83', 'Parthkishi052', NULL, 1, 3),
(467, 10, 131, 739, 1000, 0, 0, 0, '1714656082', NULL, '10', 'aksharmahata111', NULL, 1, 3),
(468, 10, 131, 784, 1000, 0, 0, 0, '1714656082', NULL, '18', 'Rajankumar577', NULL, 1, 3),
(469, 10, 131, 796, 1000, 0, 0, 0, '1714656082', NULL, '89', 'Prashadmandal016', NULL, 1, 3),
(470, 10, 131, 682, 1000, 0, 0, 0, '1714656082', NULL, '48', 'Dhruvkhatri ', NULL, 1, 3),
(471, 10, 131, 829, 1000, 0, 0, 0, '1714656082', NULL, '49', 'Vishalgupta0326', NULL, 1, 3),
(472, 10, 131, 818, 1000, 0, 0, 0, '1714656082', NULL, '28', 'Kubardas083', NULL, 1, 3),
(473, 10, 131, 686, 1000, 0, 0, 0, '1714656082', NULL, '22', 'Diyaseth 25', NULL, 1, 3),
(474, 10, 131, 742, 1000, 0, 0, 0, '1714656082', NULL, '27', 'nitin', NULL, 1, 3),
(475, 10, 131, 758, 1000, 0, 0, 0, '1714656082', NULL, '89', 'Brinkal0009', NULL, 1, 3),
(476, 10, 131, 725, 1000, 0, 0, 0, '1714656082', NULL, '27', 'Yugsharmna1010', NULL, 1, 3),
(477, 10, 131, 769, 1000, 0, 0, 0, '1714656082', NULL, '70', 'nikunjshah', NULL, 1, 3),
(478, 10, 131, 784, 1000, 0, 0, 0, '1714656082', NULL, '92', 'Rajankumar577', NULL, 1, 3),
(479, 10, 131, 769, 1000, 0, 0, 0, '1714656082', NULL, '56', 'nikunjshah', NULL, 1, 3),
(480, 10, 131, 716, 1000, 0, 0, 0, '1714656082', NULL, '34', 'Milankohli888', NULL, 1, 3),
(481, 10, 131, 724, 1000, 0, 0, 0, '1714656082', NULL, '70', 'prity4041', NULL, 1, 3),
(482, 10, 131, 685, 1000, 0, 0, 0, '1714656082', NULL, '34', 'Amarsingh03', NULL, 1, 3),
(483, 10, 131, 829, 1000, 0, 0, 0, '1714656082', NULL, '64', 'Vishalgupta0326', NULL, 1, 3),
(484, 10, 131, 772, 1000, 0, 0, 0, '1714656082', NULL, '71', 'rakesh', NULL, 1, 3),
(485, 10, 131, 798, 1000, 0, 0, 0, '1714656082', NULL, '77', 'Savejitadas', NULL, 1, 3),
(486, 10, 131, 711, 1000, 0, 0, 0, '1714656082', NULL, '14', 'Aryahitesh', NULL, 1, 3),
(487, 10, 131, 739, 1000, 0, 0, 0, '1714656082', NULL, '73', 'aksharmahata111', NULL, 1, 3),
(488, 10, 131, 686, 1000, 0, 0, 0, '1714656082', NULL, '26', 'Diyaseth 25', NULL, 1, 3),
(489, 10, 131, 833, 1000, 0, 0, 0, '1714656082', NULL, '34', 'Amitarora336', NULL, 1, 3),
(490, 10, 131, 714, 1000, 0, 0, 0, '1714656082', NULL, '20', 'Basujatin', NULL, 1, 3),
(491, 10, 131, 703, 1000, 0, 0, 0, '1714656082', NULL, '58', 'Chandresh', NULL, 1, 3),
(492, 10, 131, 716, 1000, 0, 0, 0, '1714656082', NULL, '34', 'Milankohli888', NULL, 1, 3),
(493, 10, 131, 712, 1000, 0, 0, 0, '1714656082', NULL, '26', 'Ikbalkhan', NULL, 1, 3),
(494, 10, 131, 836, 1000, 0, 0, 0, '1714656082', NULL, '75', 'Asimkham346', NULL, 1, 3),
(495, 10, 131, 687, 1000, 0, 0, 0, '1714656082', NULL, '72', 'Sananaidhu', NULL, 1, 3),
(496, 10, 131, 782, 1000, 0, 0, 0, '1714656082', NULL, '34', 'roshnikumari', NULL, 1, 3),
(497, 10, 131, 687, 1000, 0, 0, 0, '1714656082', NULL, '75', 'Sananaidhu', NULL, 1, 3),
(498, 10, 131, 735, 1000, 0, 0, 0, '1714656082', NULL, '78', 'Nimitpatel', NULL, 1, 3),
(499, 10, 131, 830, 1000, 0, 0, 0, '1714656082', NULL, '37', 'Lakshjadhav318', NULL, 1, 3),
(500, 10, 131, 708, 1000, 0, 0, 0, '1714656082', NULL, '17', 'Farajkhan', NULL, 1, 3),
(501, 10, 131, 782, 1000, 0, 0, 0, '1714656082', NULL, '61', 'roshnikumari', NULL, 1, 3),
(502, 10, 131, 748, 1000, 0, 0, 0, '1714656082', NULL, '55', 'deepak', NULL, 1, 3),
(503, 10, 131, 806, 1000, 0, 0, 0, '1714656082', NULL, '68', 'Kibarsada043', NULL, 1, 3),
(504, 10, 131, 736, 1000, 0, 0, 0, '1714656082', NULL, '84', ' Amulya', NULL, 1, 3),
(505, 10, 131, 688, 1000, 0, 0, 0, '1714656082', NULL, '81', 'Sethaditi753', NULL, 1, 3),
(506, 10, 131, 789, 1000, 0, 0, 0, '1714656082', NULL, '88', 'Mahaveershing88', NULL, 1, 3),
(507, 10, 131, 699, 1000, 0, 0, 0, '1714656082', NULL, '62', 'Vedantjain', NULL, 1, 3),
(508, 10, 131, 831, 1000, 0, 0, 0, '1714656082', NULL, '70', 'Varunmishra0329', NULL, 1, 3),
(509, 10, 131, 837, 1000, 0, 0, 0, '1714656082', NULL, '97', 'Dilipshukla347', NULL, 1, 3),
(510, 10, 131, 717, 1000, 0, 0, 0, '1714656082', NULL, '23', 'kuntnakul', NULL, 1, 3),
(511, 10, 131, 792, 1000, 0, 0, 0, '1714656082', NULL, '98', 'Maheshsah4466', NULL, 1, 3),
(512, 10, 131, 802, 1000, 0, 0, 0, '1714656082', NULL, '36', 'Ajausahani031', NULL, 1, 3),
(513, 10, 131, 770, 1000, 0, 0, 0, '1714656082', NULL, '57', 'ashishmhata', NULL, 1, 3),
(514, 10, 131, 760, 1000, 0, 0, 0, '1714656082', NULL, '52', 'Keyuranjirval', NULL, 1, 3),
(515, 10, 131, 713, 1000, 0, 0, 0, '1714656082', NULL, '62', 'Jaibalan333', NULL, 1, 3),
(516, 10, 131, 798, 1000, 0, 0, 0, '1714656082', NULL, '72', 'Savejitadas', NULL, 1, 3),
(517, 10, 131, 691, 1000, 0, 0, 0, '1714656082', NULL, '12', 'Kabirshah007', NULL, 1, 3),
(518, 10, 131, 796, 1000, 0, 0, 0, '1714656082', NULL, '55', 'Prashadmandal016', NULL, 1, 3),
(519, 10, 131, 765, 1000, 0, 0, 0, '1714656082', NULL, '32', 'mahesh', NULL, 1, 3),
(520, 10, 131, 779, 1000, 0, 0, 0, '1714656082', NULL, '28', 'udairathod', NULL, 1, 3),
(521, 10, 131, 796, 1000, 0, 0, 0, '1714656082', NULL, '17', 'Prashadmandal016', NULL, 1, 3),
(522, 10, 131, 684, 1000, 0, 0, 0, '1714656082', NULL, '94', 'Pandya1507', NULL, 1, 3),
(523, 10, 131, 689, 1000, 0, 0, 0, '1714656082', NULL, '76', 'Ajaypatel4674', NULL, 1, 3),
(524, 10, 131, 795, 1000, 0, 0, 0, '1714656082', NULL, '73', 'Shreeramprasad009', NULL, 1, 3),
(525, 10, 131, 764, 1000, 0, 0, 0, '1714656082', NULL, '91', 'katn', NULL, 1, 3),
(526, 10, 131, 814, 1000, 0, 0, 0, '1714656082', NULL, '24', 'Pratikakamat064', NULL, 1, 3),
(527, 10, 131, 763, 1000, 0, 0, 0, '1714656082', NULL, '59', 'kalpeshsorathiya', NULL, 1, 3),
(528, 10, 131, 794, 1000, 0, 0, 0, '1714656082', NULL, '27', 'Haripaswan055', NULL, 1, 3),
(529, 10, 131, 745, 1000, 0, 0, 0, '1714656082', NULL, '27', 'nilesh', NULL, 1, 3),
(530, 10, 131, 745, 1000, 0, 0, 0, '1714656082', NULL, '87', 'nilesh', NULL, 1, 3),
(531, 10, 131, 788, 1000, 0, 0, 0, '1714656082', NULL, '21', 'Mahirakhatun7171', NULL, 1, 3),
(532, 10, 131, 687, 1000, 0, 0, 0, '1714656082', NULL, '36', 'Sananaidhu', NULL, 1, 3),
(533, 10, 131, 734, 1000, 0, 0, 0, '1714656082', NULL, '29', 'Omkaarsingh', NULL, 1, 3),
(534, 10, 131, 695, 1000, 0, 0, 0, '1714656082', NULL, '21', 'Yashchandra', NULL, 1, 3),
(535, 10, 131, 701, 1000, 0, 0, 0, '1714656082', NULL, '33', 'Purnitjha', NULL, 1, 3),
(536, 10, 131, 780, 1000, 0, 0, 0, '1714656082', NULL, '38', 'uttampaneliya', NULL, 1, 3),
(537, 10, 131, 756, 1000, 0, 0, 0, '1714656082', NULL, '93', 'Aryanbhai', NULL, 1, 3),
(538, 10, 131, 703, 1000, 0, 0, 0, '1714656082', NULL, '67', 'Chandresh', NULL, 1, 3),
(539, 10, 131, 818, 1000, 0, 0, 0, '1714656082', NULL, '62', 'Kubardas083', NULL, 1, 3),
(540, 10, 131, 705, 1000, 0, 0, 0, '1714656082', NULL, '82', 'baburaval', NULL, 1, 3),
(541, 10, 131, 739, 1000, 0, 0, 0, '1714656082', NULL, '48', 'aksharmahata111', NULL, 1, 3),
(542, 10, 131, 788, 1000, 0, 0, 0, '1714656082', NULL, '49', 'Mahirakhatun7171', NULL, 1, 3),
(543, 10, 131, 773, 1000, 0, 0, 0, '1714656082', NULL, '24', 'ramesh8558', NULL, 1, 3),
(544, 10, 131, 819, 1000, 0, 0, 0, '1714656082', NULL, '15', 'Lakshbandari087', NULL, 1, 3),
(545, 10, 131, 830, 1000, 0, 0, 0, '1714656082', NULL, '66', 'Lakshjadhav318', NULL, 1, 3),
(546, 10, 131, 720, 1000, 0, 0, 0, '1714656082', NULL, '18', 'Ronithjoshi', NULL, 1, 3),
(547, 10, 131, 739, 1000, 0, 0, 0, '1714656082', NULL, '90', 'aksharmahata111', NULL, 1, 3),
(548, 10, 131, 837, 1000, 0, 0, 0, '1714656082', NULL, '23', 'Dilipshukla347', NULL, 1, 3),
(549, 10, 131, 760, 1000, 0, 0, 0, '1714656082', NULL, '67', 'Keyuranjirval', NULL, 1, 3),
(550, 10, 131, 822, 1000, 0, 0, 0, '1714656082', NULL, '87', 'Aakeshmandapara109', NULL, 1, 3),
(551, 10, 132, 742, 200, 0, 0, 0, '1714660888', NULL, '84', 'nitin', NULL, 1, 1),
(552, 10, 132, 735, 200, 0, 0, 0, '1714660888', NULL, '28', 'Nimitpatel', NULL, 1, 1),
(553, 10, 132, 810, 200, 0, 0, 0, '1714660888', NULL, '23', 'Parthkishi052', NULL, 1, 1),
(554, 10, 132, 692, 200, 0, 0, 0, '1714660888', NULL, '40', 'Tejmehta505', NULL, 1, 1),
(555, 10, 132, 723, 200, 0, 0, 0, '1714660888', NULL, '47', 'Zehaankhan', NULL, 1, 1),
(556, 10, 132, 697, 200, 0, 0, 0, '1714660888', NULL, '13', 'Aakeshgupta', NULL, 1, 1),
(557, 10, 132, 836, 200, 0, 0, 0, '1714660888', NULL, '86', 'Asimkham346', NULL, 1, 1),
(558, 10, 132, 750, 200, 0, 0, 0, '1714660888', NULL, '67', 'bhavesh', NULL, 1, 1),
(559, 10, 132, 756, 200, 0, 0, 0, '1714660888', NULL, '94', 'Aryanbhai', NULL, 1, 1),
(560, 10, 132, 831, 200, 0, 0, 0, '1714660888', NULL, '66', 'Varunmishra0329', NULL, 1, 1),
(561, 13, 132, 814, 200, 0, 0, 0, '1714683099', NULL, '49', 'Pratikakamat064', NULL, 1, 1),
(562, 13, 132, 686, 200, 0, 0, 0, '1714683099', NULL, '68', 'Diyaseth 25', NULL, 1, 1),
(563, 13, 132, 769, 200, 0, 0, 0, '1714683099', NULL, '75', 'nikunjshah', NULL, 1, 1),
(564, 13, 132, 715, 200, 0, 0, 0, '1714683099', NULL, '82', 'Krishbatta', NULL, 1, 1),
(565, 13, 132, 766, 200, 0, 0, 0, '1714683099', NULL, '57', 'mahulkoli', NULL, 1, 1),
(566, 13, 132, 835, 200, 0, 0, 0, '1714683099', NULL, '58', 'Ronitsharma341', NULL, 1, 1),
(567, 13, 132, 794, 200, 0, 0, 0, '1714683099', NULL, '54', 'Haripaswan055', NULL, 1, 1),
(568, 13, 132, 717, 200, 0, 0, 0, '1714683099', NULL, '79', 'kuntnakul', NULL, 1, 1),
(569, 13, 132, 810, 200, 0, 0, 0, '1714683099', NULL, '78', 'Parthkishi052', NULL, 1, 1),
(570, 13, 132, 694, 200, 0, 0, 0, '1714683099', NULL, '63', 'Davedayal', NULL, 1, 1);
INSERT INTO `tbl_participants` (`id`, `contest_id`, `fees_id`, `user_id`, `entry_fee`, `win_prize`, `rank`, `status`, `date_created`, `result_time`, `ticket_no`, `username`, `res_type`, `is_dummy`, `pkg_id`) VALUES
(571, 12, 131, 708, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Farajkhan', NULL, 1, 3),
(572, 12, 131, 721, 1000, 0, 0, 0, '1714683216', NULL, '27', 'karankhan', NULL, 1, 3),
(573, 12, 131, 821, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Aaravsingh107', NULL, 1, 3),
(574, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '98', 'sagargandhi', NULL, 1, 3),
(575, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '86', 'narshirathaliya', NULL, 1, 3),
(576, 12, 131, 757, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Bhargava', NULL, 1, 3),
(577, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '55', 'Mananranjan058', NULL, 1, 3),
(578, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '35', 'ramesh8558', NULL, 1, 3),
(579, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '32', 'Ikbalkhan', NULL, 1, 3),
(580, 12, 131, 788, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Mahirakhatun7171', NULL, 1, 3),
(581, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '69', 'Brinkal0009', NULL, 1, 3),
(582, 12, 131, 799, 1000, 0, 0, 0, '1714683216', NULL, '98', 'Roopeshmahta014', NULL, 1, 3),
(583, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '27', 'rizavan', NULL, 1, 3),
(584, 12, 131, 714, 1000, 0, 0, 0, '1714683216', NULL, '49', 'Basujatin', NULL, 1, 3),
(585, 12, 131, 731, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Sahiljinjala', NULL, 1, 3),
(586, 12, 131, 812, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Rushigiri056', NULL, 1, 3),
(587, 12, 131, 816, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Rajbhuiya075', NULL, 1, 3),
(588, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Prashadmandal016', NULL, 1, 3),
(589, 12, 131, 779, 1000, 0, 0, 0, '1714683216', NULL, '45', 'udairathod', NULL, 1, 3),
(590, 12, 131, 730, 1000, 0, 0, 0, '1714683216', NULL, '43', 'Samarth', NULL, 1, 3),
(591, 12, 131, 735, 1000, 0, 0, 0, '1714683216', NULL, '74', 'Nimitpatel', NULL, 1, 3),
(592, 12, 131, 782, 1000, 0, 0, 0, '1714683216', NULL, '28', 'roshnikumari', NULL, 1, 3),
(593, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '13', 'Dilipshukla347', NULL, 1, 3),
(594, 12, 131, 694, 1000, 0, 0, 0, '1714683216', NULL, '70', 'Davedayal', NULL, 1, 3),
(595, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Yagnesh99', NULL, 1, 3),
(596, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '13', 'kuntnakul', NULL, 1, 3),
(597, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '94', 'nilesh', NULL, 1, 3),
(598, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '80', 'Raviroy047', NULL, 1, 3),
(599, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '95', 'nilesh', NULL, 1, 3),
(600, 12, 131, 833, 1000, 0, 0, 0, '1714683216', NULL, '22', 'Amitarora336', NULL, 1, 3),
(601, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Kabirshah007', NULL, 1, 3),
(602, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Dilipshukla347', NULL, 1, 3),
(603, 12, 131, 741, 1000, 0, 0, 0, '1714683216', NULL, '56', 'vipul', NULL, 1, 3),
(604, 12, 131, 815, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Davemochi068', NULL, 1, 3),
(605, 12, 131, 757, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Bhargava', NULL, 1, 3),
(606, 12, 131, 818, 1000, 0, 0, 0, '1714683216', NULL, '80', 'Kubardas083', NULL, 1, 3),
(607, 12, 131, 738, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Umarkhan', NULL, 1, 3),
(608, 12, 131, 685, 1000, 0, 0, 0, '1714683216', NULL, '27', 'Amarsingh03', NULL, 1, 3),
(609, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Dilipshukla347', NULL, 1, 3),
(610, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Yogeshkaurav0332', NULL, 1, 3),
(611, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '85', 'Dilipshukla347', NULL, 1, 3),
(612, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '18', 'rizavan', NULL, 1, 3),
(613, 12, 131, 715, 1000, 0, 0, 0, '1714683216', NULL, '52', 'Krishbatta', NULL, 1, 3),
(614, 12, 131, 813, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Zeelvarma', NULL, 1, 3),
(615, 12, 131, 778, 1000, 0, 0, 0, '1714683216', NULL, '55', 'tejash', NULL, 1, 3),
(616, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Mananranjan058', NULL, 1, 3),
(617, 12, 131, 788, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Mahirakhatun7171', NULL, 1, 3),
(618, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '82', 'rizavan', NULL, 1, 3),
(619, 12, 131, 747, 1000, 0, 0, 0, '1714683216', NULL, '71', 'hiran455', NULL, 1, 3),
(620, 12, 131, 755, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Amansharma6767', NULL, 1, 3),
(621, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Mananranjan058', NULL, 1, 3),
(622, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Khaljitasingh786', NULL, 1, 3),
(623, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '77', 'kavashulkumari560', NULL, 1, 3),
(624, 12, 131, 738, 1000, 0, 0, 0, '1714683216', NULL, '91', 'Umarkhan', NULL, 1, 3),
(625, 12, 131, 794, 1000, 0, 0, 0, '1714683216', NULL, '88', 'Haripaswan055', NULL, 1, 3),
(626, 12, 131, 764, 1000, 0, 0, 0, '1714683216', NULL, '71', 'katn', NULL, 1, 3),
(627, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Harsithjoshi', NULL, 1, 3),
(628, 12, 131, 730, 1000, 0, 0, 0, '1714683216', NULL, '41', 'Samarth', NULL, 1, 3),
(629, 12, 131, 696, 1000, 0, 0, 0, '1714683216', NULL, '75', 'Virajdas', NULL, 1, 3),
(630, 12, 131, 721, 1000, 0, 0, 0, '1714683216', NULL, '93', 'karankhan', NULL, 1, 3),
(631, 12, 131, 780, 1000, 0, 0, 0, '1714683216', NULL, '45', 'uttampaneliya', NULL, 1, 3),
(632, 12, 131, 781, 1000, 0, 0, 0, '1714683216', NULL, '52', 'vrushantkakalotar', NULL, 1, 3),
(633, 12, 131, 746, 1000, 0, 0, 0, '1714683216', NULL, '12', 'dharmik', NULL, 1, 3),
(634, 12, 131, 750, 1000, 0, 0, 0, '1714683216', NULL, '37', 'bhavesh', NULL, 1, 3),
(635, 12, 131, 823, 1000, 0, 0, 0, '1714683216', NULL, '38', 'Ekanshmojidara122', NULL, 1, 3),
(636, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Mananranjan058', NULL, 1, 3),
(637, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Khaljitasingh786', NULL, 1, 3),
(638, 12, 131, 713, 1000, 0, 0, 0, '1714683216', NULL, '96', 'Jaibalan333', NULL, 1, 3),
(639, 12, 131, 766, 1000, 0, 0, 0, '1714683216', NULL, '55', 'mahulkoli', NULL, 1, 3),
(640, 12, 131, 734, 1000, 0, 0, 0, '1714683216', NULL, '14', 'Omkaarsingh', NULL, 1, 3),
(641, 12, 131, 730, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Samarth', NULL, 1, 3),
(642, 12, 131, 766, 1000, 0, 0, 0, '1714683216', NULL, '38', 'mahulkoli', NULL, 1, 3),
(643, 12, 131, 835, 1000, 0, 0, 0, '1714683216', NULL, '77', 'Ronitsharma341', NULL, 1, 3),
(644, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Dakshchawla66', NULL, 1, 3),
(645, 12, 131, 772, 1000, 0, 0, 0, '1714683216', NULL, '13', 'rakesh', NULL, 1, 3),
(646, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Ishaanghosh', NULL, 1, 3),
(647, 12, 131, 776, 1000, 0, 0, 0, '1714683216', NULL, '16', 'sankatpanditr', NULL, 1, 3),
(648, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '85', 'agarwalnidhi003', NULL, 1, 3),
(649, 12, 131, 699, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Vedantjain', NULL, 1, 3),
(650, 12, 131, 763, 1000, 0, 0, 0, '1714683216', NULL, '72', 'kalpeshsorathiya', NULL, 1, 3),
(651, 12, 131, 708, 1000, 0, 0, 0, '1714683216', NULL, '40', 'Farajkhan', NULL, 1, 3),
(652, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '77', 'Khaljitasingh786', NULL, 1, 3),
(653, 12, 131, 783, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Nihardevi303', NULL, 1, 3),
(654, 12, 131, 798, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Savejitadas', NULL, 1, 3),
(655, 12, 131, 724, 1000, 0, 0, 0, '1714683216', NULL, '20', 'prity4041', NULL, 1, 3),
(656, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '50', 'Pandya1507', NULL, 1, 3),
(657, 12, 131, 831, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Varunmishra0329', NULL, 1, 3),
(658, 12, 131, 723, 1000, 0, 0, 0, '1714683216', NULL, '77', 'Zehaankhan', NULL, 1, 3),
(659, 12, 131, 787, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Hardeepyadav444', NULL, 1, 3),
(660, 12, 131, 716, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Milankohli888', NULL, 1, 3),
(661, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '54', 'Purnitjha', NULL, 1, 3),
(662, 12, 131, 690, 1000, 0, 0, 0, '1714683216', NULL, '73', 'Mihirthakur207', NULL, 1, 3),
(663, 12, 131, 711, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Aryahitesh', NULL, 1, 3),
(664, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '22', 'Khaljitasingh786', NULL, 1, 3),
(665, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '81', 'Harsithjoshi', NULL, 1, 3),
(666, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '28', 'kavashulkumari560', NULL, 1, 3),
(667, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Ishaanghosh', NULL, 1, 3),
(668, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '80', 'Mahaveershing88', NULL, 1, 3),
(669, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '27', 'Chandresh', NULL, 1, 3),
(670, 12, 131, 814, 1000, 0, 0, 0, '1714683216', NULL, '68', 'Pratikakamat064', NULL, 1, 3),
(671, 12, 131, 788, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Mahirakhatun7171', NULL, 1, 3),
(672, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Pranjalgupta', NULL, 1, 3),
(673, 12, 131, 721, 1000, 0, 0, 0, '1714683216', NULL, '39', 'karankhan', NULL, 1, 3),
(674, 12, 131, 725, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Yugsharmna1010', NULL, 1, 3),
(675, 12, 131, 734, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Omkaarsingh', NULL, 1, 3),
(676, 12, 131, 836, 1000, 0, 0, 0, '1714683216', NULL, '27', 'Asimkham346', NULL, 1, 3),
(677, 12, 131, 739, 1000, 0, 0, 0, '1714683216', NULL, '93', 'aksharmahata111', NULL, 1, 3),
(678, 12, 131, 821, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Aaravsingh107', NULL, 1, 3),
(679, 12, 131, 747, 1000, 0, 0, 0, '1714683216', NULL, '58', 'hiran455', NULL, 1, 3),
(680, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '53', 'Vishalgupta0326', NULL, 1, 3),
(681, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '69', 'rizavan', NULL, 1, 3),
(682, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '67', 'sagargandhi', NULL, 1, 3),
(683, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '82', 'nilesh', NULL, 1, 3),
(684, 12, 131, 709, 1000, 0, 0, 0, '1714683216', NULL, '91', 'Harshladumor', NULL, 1, 3),
(685, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '14', 'Brinkal0009', NULL, 1, 3),
(686, 12, 131, 769, 1000, 0, 0, 0, '1714683216', NULL, '84', 'nikunjshah', NULL, 1, 3),
(687, 12, 131, 804, 1000, 0, 0, 0, '1714683216', NULL, '49', 'Fenilbhagat037', NULL, 1, 3),
(688, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '75', 'Lakshbandari087', NULL, 1, 3),
(689, 12, 131, 782, 1000, 0, 0, 0, '1714683216', NULL, '41', 'roshnikumari', NULL, 1, 3),
(690, 12, 131, 713, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Jaibalan333', NULL, 1, 3),
(691, 12, 131, 736, 1000, 0, 0, 0, '1714683216', NULL, '79', ' Amulya', NULL, 1, 3),
(692, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Chandresh', NULL, 1, 3),
(693, 12, 131, 833, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Amitarora336', NULL, 1, 3),
(694, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '67', 'rizavan', NULL, 1, 3),
(695, 12, 131, 739, 1000, 0, 0, 0, '1714683216', NULL, '16', 'aksharmahata111', NULL, 1, 3),
(696, 12, 131, 752, 1000, 0, 0, 0, '1714683216', NULL, '86', 'hirandolakiya', NULL, 1, 3),
(697, 12, 131, 769, 1000, 0, 0, 0, '1714683216', NULL, '56', 'nikunjshah', NULL, 1, 3),
(698, 12, 131, 749, 1000, 0, 0, 0, '1714683216', NULL, '47', 'Ankit', NULL, 1, 3),
(699, 12, 131, 838, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Nikhilsaru349', NULL, 1, 3),
(700, 12, 131, 743, 1000, 0, 0, 0, '1714683216', NULL, '26', 'kanil', NULL, 1, 3),
(701, 12, 131, 747, 1000, 0, 0, 0, '1714683216', NULL, '42', 'hiran455', NULL, 1, 3),
(702, 12, 131, 812, 1000, 0, 0, 0, '1714683216', NULL, '17', 'Rushigiri056', NULL, 1, 3),
(703, 12, 131, 763, 1000, 0, 0, 0, '1714683216', NULL, '34', 'kalpeshsorathiya', NULL, 1, 3),
(704, 12, 131, 834, 1000, 0, 0, 0, '1714683216', NULL, '93', 'Yashshah337', NULL, 1, 3),
(705, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Tejmehta505', NULL, 1, 3),
(706, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Harsithjoshi', NULL, 1, 3),
(707, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '64', 'Raviroy047', NULL, 1, 3),
(708, 12, 131, 777, 1000, 0, 0, 0, '1714683216', NULL, '46', 'smitmakavana', NULL, 1, 3),
(709, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '17', 'Dilipshukla347', NULL, 1, 3),
(710, 12, 131, 749, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Ankit', NULL, 1, 3),
(711, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '97', 'Ishaanghosh', NULL, 1, 3),
(712, 12, 131, 824, 1000, 0, 0, 0, '1714683216', NULL, '22', 'Pranjalkamati126', NULL, 1, 3),
(713, 12, 131, 836, 1000, 0, 0, 0, '1714683216', NULL, '40', 'Asimkham346', NULL, 1, 3),
(714, 12, 131, 781, 1000, 0, 0, 0, '1714683216', NULL, '40', 'vrushantkakalotar', NULL, 1, 3),
(715, 12, 131, 787, 1000, 0, 0, 0, '1714683216', NULL, '72', 'Hardeepyadav444', NULL, 1, 3),
(716, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '51', 'narshirathaliya', NULL, 1, 3),
(717, 12, 131, 787, 1000, 0, 0, 0, '1714683216', NULL, '53', 'Hardeepyadav444', NULL, 1, 3),
(718, 12, 131, 757, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Bhargava', NULL, 1, 3),
(719, 12, 131, 742, 1000, 0, 0, 0, '1714683216', NULL, '69', 'nitin', NULL, 1, 3),
(720, 12, 131, 759, 1000, 0, 0, 0, '1714683216', NULL, '67', 'dashanpanvala', NULL, 1, 3),
(721, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '81', 'Prashadmandal016', NULL, 1, 3),
(722, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Dilipshukla347', NULL, 1, 3),
(723, 12, 131, 730, 1000, 0, 0, 0, '1714683216', NULL, '55', 'Samarth', NULL, 1, 3),
(724, 12, 131, 727, 1000, 0, 0, 0, '1714683216', NULL, '43', 'Veerkumar', NULL, 1, 3),
(725, 12, 131, 731, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Sahiljinjala', NULL, 1, 3),
(726, 12, 131, 790, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Princedharuka11', NULL, 1, 3),
(727, 12, 131, 794, 1000, 0, 0, 0, '1714683216', NULL, '27', 'Haripaswan055', NULL, 1, 3),
(728, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '33', 'nilesh', NULL, 1, 3),
(729, 12, 131, 787, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Hardeepyadav444', NULL, 1, 3),
(730, 12, 131, 735, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Nimitpatel', NULL, 1, 3),
(731, 12, 131, 696, 1000, 0, 0, 0, '1714683216', NULL, '55', 'Virajdas', NULL, 1, 3),
(732, 12, 131, 815, 1000, 0, 0, 0, '1714683216', NULL, '41', 'Davemochi068', NULL, 1, 3),
(733, 12, 131, 782, 1000, 0, 0, 0, '1714683216', NULL, '73', 'roshnikumari', NULL, 1, 3),
(734, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '88', 'Brinkal0009', NULL, 1, 3),
(735, 12, 131, 812, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Rushigiri056', NULL, 1, 3),
(736, 12, 131, 823, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Ekanshmojidara122', NULL, 1, 3),
(737, 12, 131, 709, 1000, 0, 0, 0, '1714683216', NULL, '70', 'Harshladumor', NULL, 1, 3),
(738, 12, 131, 728, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Tejaskapor', NULL, 1, 3),
(739, 12, 131, 753, 1000, 0, 0, 0, '1714683216', NULL, '94', 'jiganeshkumar', NULL, 1, 3),
(740, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Pranjalgupta', NULL, 1, 3),
(741, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Purnitjha', NULL, 1, 3),
(742, 12, 131, 735, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Nimitpatel', NULL, 1, 3),
(743, 12, 131, 713, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Jaibalan333', NULL, 1, 3),
(744, 12, 131, 779, 1000, 0, 0, 0, '1714683216', NULL, '13', 'udairathod', NULL, 1, 3),
(745, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '56', 'Yogeshkaurav0332', NULL, 1, 3),
(746, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Yogeshkaurav0332', NULL, 1, 3),
(747, 12, 131, 702, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Ayushlal', NULL, 1, 3),
(748, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Sethaditi753', NULL, 1, 3),
(749, 12, 131, 746, 1000, 0, 0, 0, '1714683216', NULL, '68', 'dharmik', NULL, 1, 3),
(750, 12, 131, 818, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Kubardas083', NULL, 1, 3),
(751, 12, 131, 828, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Sameerkhan306', NULL, 1, 3),
(752, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '64', 'kuntnakul', NULL, 1, 3),
(753, 12, 131, 767, 1000, 0, 0, 0, '1714683216', NULL, '16', 'miteshbhai', NULL, 1, 3),
(754, 12, 131, 761, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Dharma', NULL, 1, 3),
(755, 12, 131, 787, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Hardeepyadav444', NULL, 1, 3),
(756, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '97', 'ramesh8558', NULL, 1, 3),
(757, 12, 131, 826, 1000, 0, 0, 0, '1714683216', NULL, '70', 'RitvikKevat034', NULL, 1, 3),
(758, 12, 131, 825, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Rahulvishwas028', NULL, 1, 3),
(759, 12, 131, 719, 1000, 0, 0, 0, '1714683216', NULL, '42', 'hirparapanth', NULL, 1, 3),
(760, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '39', 'narshirathaliya', NULL, 1, 3),
(761, 12, 131, 828, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Sameerkhan306', NULL, 1, 3),
(762, 12, 131, 759, 1000, 0, 0, 0, '1714683216', NULL, '95', 'dashanpanvala', NULL, 1, 3),
(763, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '70', 'Purnitjha', NULL, 1, 3),
(764, 12, 131, 741, 1000, 0, 0, 0, '1714683216', NULL, '61', 'vipul', NULL, 1, 3),
(765, 12, 131, 739, 1000, 0, 0, 0, '1714683216', NULL, '35', 'aksharmahata111', NULL, 1, 3),
(766, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Purnitjha', NULL, 1, 3),
(767, 12, 131, 834, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Yashshah337', NULL, 1, 3),
(768, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Harsithjoshi', NULL, 1, 3),
(769, 12, 131, 798, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Savejitadas', NULL, 1, 3),
(770, 12, 131, 716, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Milankohli888', NULL, 1, 3),
(771, 12, 131, 683, 1000, 0, 0, 0, '1714683216', NULL, '75', 'Ishaanahuja', NULL, 1, 3),
(772, 12, 131, 806, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Kibarsada043', NULL, 1, 3),
(773, 12, 131, 800, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Chandualam02', NULL, 1, 3),
(774, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Prashadmandal016', NULL, 1, 3),
(775, 12, 131, 779, 1000, 0, 0, 0, '1714683216', NULL, '27', 'udairathod', NULL, 1, 3),
(776, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '19', 'kavashulkumari560', NULL, 1, 3),
(777, 12, 131, 744, 1000, 0, 0, 0, '1714683216', NULL, '49', 'rohitajoshi', NULL, 1, 3),
(778, 12, 131, 786, 1000, 0, 0, 0, '1714683216', NULL, '33', 'smitlathiya5959', NULL, 1, 3),
(779, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '83', 'Yagnesh99', NULL, 1, 3),
(780, 12, 131, 792, 1000, 0, 0, 0, '1714683216', NULL, '26', 'Maheshsah4466', NULL, 1, 3),
(781, 12, 131, 734, 1000, 0, 0, 0, '1714683216', NULL, '83', 'Omkaarsingh', NULL, 1, 3),
(782, 12, 131, 816, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Rajbhuiya075', NULL, 1, 3),
(783, 12, 131, 780, 1000, 0, 0, 0, '1714683216', NULL, '85', 'uttampaneliya', NULL, 1, 3),
(784, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Shreeramprasad009', NULL, 1, 3),
(785, 12, 131, 824, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Pranjalkamati126', NULL, 1, 3),
(786, 12, 131, 747, 1000, 0, 0, 0, '1714683216', NULL, '83', 'hiran455', NULL, 1, 3),
(787, 12, 131, 708, 1000, 0, 0, 0, '1714683216', NULL, '73', 'Farajkhan', NULL, 1, 3),
(788, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Khaljitasingh786', NULL, 1, 3),
(789, 12, 131, 744, 1000, 0, 0, 0, '1714683216', NULL, '32', 'rohitajoshi', NULL, 1, 3),
(790, 12, 131, 834, 1000, 0, 0, 0, '1714683216', NULL, '50', 'Yashshah337', NULL, 1, 3),
(791, 12, 131, 826, 1000, 0, 0, 0, '1714683216', NULL, '78', 'RitvikKevat034', NULL, 1, 3),
(792, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '47', 'Tejmehta505', NULL, 1, 3),
(793, 12, 131, 685, 1000, 0, 0, 0, '1714683216', NULL, '98', 'Amarsingh03', NULL, 1, 3),
(794, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '99', 'agarwalnidhi003', NULL, 1, 3),
(795, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '37', 'nilesh', NULL, 1, 3),
(796, 12, 131, 766, 1000, 0, 0, 0, '1714683216', NULL, '17', 'mahulkoli', NULL, 1, 3),
(797, 12, 131, 714, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Basujatin', NULL, 1, 3),
(798, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Dakshchawla66', NULL, 1, 3),
(799, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Rajankumar577', NULL, 1, 3),
(800, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '80', 'Brinkal0009', NULL, 1, 3),
(801, 12, 131, 794, 1000, 0, 0, 0, '1714683216', NULL, '34', 'Haripaswan055', NULL, 1, 3),
(802, 12, 131, 754, 1000, 0, 0, 0, '1714683216', NULL, '82', 'jitukanpara', NULL, 1, 3),
(803, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '98', 'Lakshbandari087', NULL, 1, 3),
(804, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '54', 'Shreeramprasad009', NULL, 1, 3),
(805, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '88', 'Prashadmandal016', NULL, 1, 3),
(806, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '64', 'Pandya1507', NULL, 1, 3),
(807, 12, 131, 720, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Ronithjoshi', NULL, 1, 3),
(808, 12, 131, 754, 1000, 0, 0, 0, '1714683216', NULL, '13', 'jitukanpara', NULL, 1, 3),
(809, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '17', 'kuntnakul', NULL, 1, 3),
(810, 12, 131, 813, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Zeelvarma', NULL, 1, 3),
(811, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '93', 'Dakshchawla66', NULL, 1, 3),
(812, 12, 131, 756, 1000, 0, 0, 0, '1714683216', NULL, '67', 'Aryanbhai', NULL, 1, 3),
(813, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '33', 'sagargandhi', NULL, 1, 3),
(814, 12, 131, 767, 1000, 0, 0, 0, '1714683216', NULL, '26', 'miteshbhai', NULL, 1, 3),
(815, 12, 131, 735, 1000, 0, 0, 0, '1714683216', NULL, '73', 'Nimitpatel', NULL, 1, 3),
(816, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '58', 'narshirathaliya', NULL, 1, 3),
(817, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '54', 'Lakshbandari087', NULL, 1, 3),
(818, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '96', 'ramesh8558', NULL, 1, 3),
(819, 12, 131, 689, 1000, 0, 0, 0, '1714683216', NULL, '49', 'Ajaypatel4674', NULL, 1, 3),
(820, 12, 131, 747, 1000, 0, 0, 0, '1714683216', NULL, '95', 'hiran455', NULL, 1, 3),
(821, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '68', 'Ishaanghosh', NULL, 1, 3),
(822, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '36', 'Tejmehta505', NULL, 1, 3),
(823, 12, 131, 685, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Amarsingh03', NULL, 1, 3),
(824, 12, 131, 800, 1000, 0, 0, 0, '1714683216', NULL, '23', 'Chandualam02', NULL, 1, 3),
(825, 12, 131, 801, 1000, 0, 0, 0, '1714683216', NULL, '40', 'Jegarpandit028', NULL, 1, 3),
(826, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '48', 'sagargandhi', NULL, 1, 3),
(827, 12, 131, 711, 1000, 0, 0, 0, '1714683216', NULL, '43', 'Aryahitesh', NULL, 1, 3),
(828, 12, 131, 781, 1000, 0, 0, 0, '1714683216', NULL, '31', 'vrushantkakalotar', NULL, 1, 3),
(829, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Pandya1507', NULL, 1, 3),
(830, 12, 131, 719, 1000, 0, 0, 0, '1714683216', NULL, '44', 'hirparapanth', NULL, 1, 3),
(831, 12, 131, 792, 1000, 0, 0, 0, '1714683216', NULL, '43', 'Maheshsah4466', NULL, 1, 3),
(832, 12, 131, 732, 1000, 0, 0, 0, '1714683216', NULL, '53', 'savan100', NULL, 1, 3),
(833, 12, 131, 833, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Amitarora336', NULL, 1, 3),
(834, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '78', 'Rushil', NULL, 1, 3),
(835, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Dakshchawla66', NULL, 1, 3),
(836, 12, 131, 749, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Ankit', NULL, 1, 3),
(837, 12, 131, 744, 1000, 0, 0, 0, '1714683216', NULL, '23', 'rohitajoshi', NULL, 1, 3),
(838, 12, 131, 779, 1000, 0, 0, 0, '1714683216', NULL, '18', 'udairathod', NULL, 1, 3),
(839, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Chandresh', NULL, 1, 3),
(840, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '27', 'Sethaditi753', NULL, 1, 3),
(841, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '83', 'agarwalnidhi003', NULL, 1, 3),
(842, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '55', 'Tejmehta505', NULL, 1, 3),
(843, 12, 131, 821, 1000, 0, 0, 0, '1714683216', NULL, '64', 'Aaravsingh107', NULL, 1, 3),
(844, 12, 131, 714, 1000, 0, 0, 0, '1714683216', NULL, '28', 'Basujatin', NULL, 1, 3),
(845, 12, 131, 770, 1000, 0, 0, 0, '1714683216', NULL, '32', 'ashishmhata', NULL, 1, 3),
(846, 12, 131, 774, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Ravisolanki', NULL, 1, 3),
(847, 12, 131, 747, 1000, 0, 0, 0, '1714683216', NULL, '94', 'hiran455', NULL, 1, 3),
(848, 12, 131, 716, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Milankohli888', NULL, 1, 3),
(849, 12, 131, 699, 1000, 0, 0, 0, '1714683216', NULL, '38', 'Vedantjain', NULL, 1, 3),
(850, 12, 131, 761, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Dharma', NULL, 1, 3),
(851, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Lakshbandari087', NULL, 1, 3),
(852, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Shreeramprasad009', NULL, 1, 3),
(853, 12, 131, 687, 1000, 0, 0, 0, '1714683216', NULL, '55', 'Sananaidhu', NULL, 1, 3),
(854, 12, 131, 779, 1000, 0, 0, 0, '1714683216', NULL, '27', 'udairathod', NULL, 1, 3),
(855, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '47', 'agarwalnidhi003', NULL, 1, 3),
(856, 12, 131, 699, 1000, 0, 0, 0, '1714683216', NULL, '45', 'Vedantjain', NULL, 1, 3),
(857, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '84', 'sagargandhi', NULL, 1, 3),
(858, 12, 131, 719, 1000, 0, 0, 0, '1714683216', NULL, '30', 'hirparapanth', NULL, 1, 3),
(859, 12, 131, 685, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Amarsingh03', NULL, 1, 3),
(860, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Mahaveershing88', NULL, 1, 3),
(861, 12, 131, 774, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Ravisolanki', NULL, 1, 3),
(862, 12, 131, 730, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Samarth', NULL, 1, 3),
(863, 12, 131, 743, 1000, 0, 0, 0, '1714683216', NULL, '59', 'kanil', NULL, 1, 3),
(864, 12, 131, 820, 1000, 0, 0, 0, '1714683216', NULL, '93', 'Rajanmehata098', NULL, 1, 3),
(865, 12, 131, 764, 1000, 0, 0, 0, '1714683216', NULL, '78', 'katn', NULL, 1, 3),
(866, 12, 131, 805, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Rahimali039', NULL, 1, 3),
(867, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Ishaanghosh', NULL, 1, 3),
(868, 12, 131, 770, 1000, 0, 0, 0, '1714683216', NULL, '55', 'ashishmhata', NULL, 1, 3),
(869, 12, 131, 823, 1000, 0, 0, 0, '1714683216', NULL, '48', 'Ekanshmojidara122', NULL, 1, 3),
(870, 12, 131, 824, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Pranjalkamati126', NULL, 1, 3),
(871, 12, 131, 694, 1000, 0, 0, 0, '1714683216', NULL, '87', 'Davedayal', NULL, 1, 3),
(872, 12, 131, 783, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Nihardevi303', NULL, 1, 3),
(873, 12, 131, 797, 1000, 0, 0, 0, '1714683216', NULL, '23', 'Mangalkhatoon014', NULL, 1, 3),
(874, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Chandresh', NULL, 1, 3),
(875, 12, 131, 788, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Mahirakhatun7171', NULL, 1, 3),
(876, 12, 131, 699, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Vedantjain', NULL, 1, 3),
(877, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Purnitjha', NULL, 1, 3),
(878, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '55', 'Pranjalgupta', NULL, 1, 3),
(879, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Yogeshkaurav0332', NULL, 1, 3),
(880, 12, 131, 702, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Ayushlal', NULL, 1, 3),
(881, 12, 131, 750, 1000, 0, 0, 0, '1714683216', NULL, '77', 'bhavesh', NULL, 1, 3),
(882, 12, 131, 730, 1000, 0, 0, 0, '1714683216', NULL, '91', 'Samarth', NULL, 1, 3),
(883, 12, 131, 792, 1000, 0, 0, 0, '1714683216', NULL, '81', 'Maheshsah4466', NULL, 1, 3),
(884, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '15', 'agarwalnidhi003', NULL, 1, 3),
(885, 12, 131, 696, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Virajdas', NULL, 1, 3),
(886, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Lakshbandari087', NULL, 1, 3),
(887, 12, 131, 828, 1000, 0, 0, 0, '1714683216', NULL, '12', 'Sameerkhan306', NULL, 1, 3),
(888, 12, 131, 730, 1000, 0, 0, 0, '1714683216', NULL, '17', 'Samarth', NULL, 1, 3),
(889, 12, 131, 710, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Harshilpaneliya', NULL, 1, 3),
(890, 12, 131, 723, 1000, 0, 0, 0, '1714683216', NULL, '13', 'Zehaankhan', NULL, 1, 3),
(891, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '95', 'nilesh', NULL, 1, 3),
(892, 12, 131, 815, 1000, 0, 0, 0, '1714683216', NULL, '72', 'Davemochi068', NULL, 1, 3),
(893, 12, 131, 792, 1000, 0, 0, 0, '1714683216', NULL, '88', 'Maheshsah4466', NULL, 1, 3),
(894, 12, 131, 743, 1000, 0, 0, 0, '1714683216', NULL, '98', 'kanil', NULL, 1, 3),
(895, 12, 131, 728, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Tejaskapor', NULL, 1, 3),
(896, 12, 131, 719, 1000, 0, 0, 0, '1714683216', NULL, '75', 'hirparapanth', NULL, 1, 3),
(897, 12, 131, 723, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Zehaankhan', NULL, 1, 3),
(898, 12, 131, 746, 1000, 0, 0, 0, '1714683216', NULL, '38', 'dharmik', NULL, 1, 3),
(899, 12, 131, 775, 1000, 0, 0, 0, '1714683216', NULL, '87', 'rajukumar', NULL, 1, 3),
(900, 12, 131, 734, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Omkaarsingh', NULL, 1, 3),
(901, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '89', 'Sethaditi753', NULL, 1, 3),
(902, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '82', 'narshirathaliya', NULL, 1, 3),
(903, 12, 131, 816, 1000, 0, 0, 0, '1714683216', NULL, '28', 'Rajbhuiya075', NULL, 1, 3),
(904, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Ikbalkhan', NULL, 1, 3),
(905, 12, 131, 709, 1000, 0, 0, 0, '1714683216', NULL, '52', 'Harshladumor', NULL, 1, 3),
(906, 12, 131, 719, 1000, 0, 0, 0, '1714683216', NULL, '45', 'hirparapanth', NULL, 1, 3),
(907, 12, 131, 780, 1000, 0, 0, 0, '1714683216', NULL, '34', 'uttampaneliya', NULL, 1, 3),
(908, 12, 131, 734, 1000, 0, 0, 0, '1714683216', NULL, '96', 'Omkaarsingh', NULL, 1, 3),
(909, 12, 131, 725, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Yugsharmna1010', NULL, 1, 3),
(910, 12, 131, 794, 1000, 0, 0, 0, '1714683216', NULL, '45', 'Haripaswan055', NULL, 1, 3),
(911, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Shreeramprasad009', NULL, 1, 3),
(912, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Rajankumar577', NULL, 1, 3),
(913, 12, 131, 696, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Virajdas', NULL, 1, 3),
(914, 12, 131, 707, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Gupatpratham', NULL, 1, 3),
(915, 12, 131, 790, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Princedharuka11', NULL, 1, 3),
(916, 12, 131, 748, 1000, 0, 0, 0, '1714683216', NULL, '13', 'deepak', NULL, 1, 3),
(917, 12, 131, 799, 1000, 0, 0, 0, '1714683216', NULL, '74', 'Roopeshmahta014', NULL, 1, 3),
(918, 12, 131, 709, 1000, 0, 0, 0, '1714683216', NULL, '78', 'Harshladumor', NULL, 1, 3),
(919, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Pandya1507', NULL, 1, 3),
(920, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Kabirshah007', NULL, 1, 3),
(921, 12, 131, 702, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Ayushlal', NULL, 1, 3),
(922, 12, 131, 812, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Rushigiri056', NULL, 1, 3),
(923, 12, 131, 721, 1000, 0, 0, 0, '1714683216', NULL, '69', 'karankhan', NULL, 1, 3),
(924, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Pranjalgupta', NULL, 1, 3),
(925, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '49', 'Pandya1507', NULL, 1, 3),
(926, 12, 131, 777, 1000, 0, 0, 0, '1714683216', NULL, '51', 'smitmakavana', NULL, 1, 3),
(927, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '52', 'Rajankumar577', NULL, 1, 3),
(928, 12, 131, 788, 1000, 0, 0, 0, '1714683216', NULL, '47', 'Mahirakhatun7171', NULL, 1, 3),
(929, 12, 131, 752, 1000, 0, 0, 0, '1714683216', NULL, '87', 'hirandolakiya', NULL, 1, 3),
(930, 12, 131, 736, 1000, 0, 0, 0, '1714683216', NULL, '37', ' Amulya', NULL, 1, 3),
(931, 12, 131, 759, 1000, 0, 0, 0, '1714683216', NULL, '92', 'dashanpanvala', NULL, 1, 3),
(932, 12, 131, 708, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Farajkhan', NULL, 1, 3),
(933, 12, 131, 718, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Ommangal', NULL, 1, 3),
(934, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Sethaditi753', NULL, 1, 3),
(935, 12, 131, 800, 1000, 0, 0, 0, '1714683216', NULL, '46', 'Chandualam02', NULL, 1, 3),
(936, 12, 131, 810, 1000, 0, 0, 0, '1714683216', NULL, '96', 'Parthkishi052', NULL, 1, 3),
(937, 12, 131, 807, 1000, 0, 0, 0, '1714683216', NULL, '69', 'Pravintiwari046', NULL, 1, 3),
(938, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '11', 'rizavan', NULL, 1, 3),
(939, 12, 131, 823, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Ekanshmojidara122', NULL, 1, 3),
(940, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Khaljitasingh786', NULL, 1, 3),
(941, 12, 131, 783, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Nihardevi303', NULL, 1, 3),
(942, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '43', 'Kabirshah007', NULL, 1, 3),
(943, 12, 131, 727, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Veerkumar', NULL, 1, 3),
(944, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Kabirshah007', NULL, 1, 3),
(945, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '55', 'ramesh8558', NULL, 1, 3),
(946, 12, 131, 778, 1000, 0, 0, 0, '1714683216', NULL, '24', 'tejash', NULL, 1, 3),
(947, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '34', 'Yogeshkaurav0332', NULL, 1, 3),
(948, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Dakshchawla66', NULL, 1, 3),
(949, 12, 131, 824, 1000, 0, 0, 0, '1714683216', NULL, '68', 'Pranjalkamati126', NULL, 1, 3),
(950, 12, 131, 815, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Davemochi068', NULL, 1, 3),
(951, 12, 131, 728, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Tejaskapor', NULL, 1, 3),
(952, 12, 131, 769, 1000, 0, 0, 0, '1714683216', NULL, '32', 'nikunjshah', NULL, 1, 3),
(953, 12, 131, 777, 1000, 0, 0, 0, '1714683216', NULL, '52', 'smitmakavana', NULL, 1, 3),
(954, 12, 131, 830, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Lakshjadhav318', NULL, 1, 3),
(955, 12, 131, 702, 1000, 0, 0, 0, '1714683216', NULL, '68', 'Ayushlal', NULL, 1, 3),
(956, 12, 131, 831, 1000, 0, 0, 0, '1714683216', NULL, '40', 'Varunmishra0329', NULL, 1, 3),
(957, 12, 131, 827, 1000, 0, 0, 0, '1714683216', NULL, '43', 'Puravsingh036', NULL, 1, 3),
(958, 12, 131, 797, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Mangalkhatoon014', NULL, 1, 3),
(959, 12, 131, 763, 1000, 0, 0, 0, '1714683216', NULL, '39', 'kalpeshsorathiya', NULL, 1, 3),
(960, 12, 131, 834, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Yashshah337', NULL, 1, 3),
(961, 12, 131, 732, 1000, 0, 0, 0, '1714683216', NULL, '52', 'savan100', NULL, 1, 3),
(962, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Purnitjha', NULL, 1, 3),
(963, 12, 131, 746, 1000, 0, 0, 0, '1714683216', NULL, '26', 'dharmik', NULL, 1, 3),
(964, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Rajankumar577', NULL, 1, 3),
(965, 12, 131, 757, 1000, 0, 0, 0, '1714683216', NULL, '48', 'Bhargava', NULL, 1, 3),
(966, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '58', 'agarwalnidhi003', NULL, 1, 3),
(967, 12, 131, 724, 1000, 0, 0, 0, '1714683216', NULL, '70', 'prity4041', NULL, 1, 3),
(968, 12, 131, 765, 1000, 0, 0, 0, '1714683216', NULL, '21', 'mahesh', NULL, 1, 3),
(969, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '78', 'nilesh', NULL, 1, 3),
(970, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '82', 'Dakshchawla66', NULL, 1, 3),
(971, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '83', 'Khaljitasingh786', NULL, 1, 3),
(972, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '49', 'kavashulkumari560', NULL, 1, 3),
(973, 12, 131, 710, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Harshilpaneliya', NULL, 1, 3),
(974, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Pranjalgupta', NULL, 1, 3),
(975, 12, 131, 714, 1000, 0, 0, 0, '1714683216', NULL, '80', 'Basujatin', NULL, 1, 3),
(976, 12, 131, 772, 1000, 0, 0, 0, '1714683216', NULL, '48', 'rakesh', NULL, 1, 3),
(977, 12, 131, 752, 1000, 0, 0, 0, '1714683216', NULL, '74', 'hirandolakiya', NULL, 1, 3),
(978, 12, 131, 826, 1000, 0, 0, 0, '1714683216', NULL, '35', 'RitvikKevat034', NULL, 1, 3),
(979, 12, 131, 737, 1000, 0, 0, 0, '1714683216', NULL, '82', 'rajchopada', NULL, 1, 3),
(980, 12, 131, 754, 1000, 0, 0, 0, '1714683216', NULL, '67', 'jitukanpara', NULL, 1, 3),
(981, 12, 131, 716, 1000, 0, 0, 0, '1714683216', NULL, '56', 'Milankohli888', NULL, 1, 3),
(982, 12, 131, 683, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Ishaanahuja', NULL, 1, 3),
(983, 12, 131, 732, 1000, 0, 0, 0, '1714683216', NULL, '16', 'savan100', NULL, 1, 3),
(984, 12, 131, 775, 1000, 0, 0, 0, '1714683216', NULL, '73', 'rajukumar', NULL, 1, 3),
(985, 12, 131, 727, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Veerkumar', NULL, 1, 3),
(986, 12, 131, 824, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Pranjalkamati126', NULL, 1, 3),
(987, 12, 131, 830, 1000, 0, 0, 0, '1714683216', NULL, '82', 'Lakshjadhav318', NULL, 1, 3),
(988, 12, 131, 775, 1000, 0, 0, 0, '1714683216', NULL, '19', 'rajukumar', NULL, 1, 3),
(989, 12, 131, 826, 1000, 0, 0, 0, '1714683216', NULL, '48', 'RitvikKevat034', NULL, 1, 3),
(990, 12, 131, 731, 1000, 0, 0, 0, '1714683216', NULL, '48', 'Sahiljinjala', NULL, 1, 3),
(991, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '29', 'Brinkal0009', NULL, 1, 3),
(992, 12, 131, 682, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Dhruvkhatri ', NULL, 1, 3),
(993, 12, 131, 807, 1000, 0, 0, 0, '1714683216', NULL, '72', 'Pravintiwari046', NULL, 1, 3),
(994, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Yogeshkaurav0332', NULL, 1, 3),
(995, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '56', 'kavashulkumari560', NULL, 1, 3),
(996, 12, 131, 794, 1000, 0, 0, 0, '1714683216', NULL, '72', 'Haripaswan055', NULL, 1, 3),
(997, 12, 131, 730, 1000, 0, 0, 0, '1714683216', NULL, '12', 'Samarth', NULL, 1, 3),
(998, 12, 131, 817, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Urvanbharati079', NULL, 1, 3),
(999, 12, 131, 755, 1000, 0, 0, 0, '1714683216', NULL, '78', 'Amansharma6767', NULL, 1, 3),
(1000, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '28', 'Harsithjoshi', NULL, 1, 3),
(1001, 12, 131, 743, 1000, 0, 0, 0, '1714683216', NULL, '82', 'kanil', NULL, 1, 3),
(1002, 12, 131, 764, 1000, 0, 0, 0, '1714683216', NULL, '65', 'katn', NULL, 1, 3),
(1003, 12, 131, 743, 1000, 0, 0, 0, '1714683216', NULL, '83', 'kanil', NULL, 1, 3),
(1004, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Raviroy047', NULL, 1, 3),
(1005, 12, 131, 683, 1000, 0, 0, 0, '1714683216', NULL, '53', 'Ishaanahuja', NULL, 1, 3),
(1006, 12, 131, 802, 1000, 0, 0, 0, '1714683216', NULL, '87', 'Ajausahani031', NULL, 1, 3),
(1007, 12, 131, 807, 1000, 0, 0, 0, '1714683216', NULL, '45', 'Pravintiwari046', NULL, 1, 3),
(1008, 12, 131, 799, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Roopeshmahta014', NULL, 1, 3),
(1009, 12, 131, 754, 1000, 0, 0, 0, '1714683216', NULL, '32', 'jitukanpara', NULL, 1, 3),
(1010, 12, 131, 686, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Diyaseth 25', NULL, 1, 3),
(1011, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '31', 'Mahaveershing88', NULL, 1, 3),
(1012, 12, 131, 683, 1000, 0, 0, 0, '1714683216', NULL, '83', 'Ishaanahuja', NULL, 1, 3),
(1013, 12, 131, 736, 1000, 0, 0, 0, '1714683216', NULL, '14', ' Amulya', NULL, 1, 3),
(1014, 12, 131, 753, 1000, 0, 0, 0, '1714683216', NULL, '87', 'jiganeshkumar', NULL, 1, 3),
(1015, 12, 131, 786, 1000, 0, 0, 0, '1714683216', NULL, '91', 'smitlathiya5959', NULL, 1, 3),
(1016, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '82', 'ramesh8558', NULL, 1, 3),
(1017, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '75', 'Pranjalgupta', NULL, 1, 3),
(1018, 12, 131, 697, 1000, 0, 0, 0, '1714683216', NULL, '72', 'Aakeshgupta', NULL, 1, 3),
(1019, 12, 131, 794, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Haripaswan055', NULL, 1, 3),
(1020, 12, 131, 708, 1000, 0, 0, 0, '1714683216', NULL, '70', 'Farajkhan', NULL, 1, 3),
(1021, 12, 131, 689, 1000, 0, 0, 0, '1714683216', NULL, '22', 'Ajaypatel4674', NULL, 1, 3),
(1022, 12, 131, 800, 1000, 0, 0, 0, '1714683216', NULL, '38', 'Chandualam02', NULL, 1, 3),
(1023, 12, 131, 780, 1000, 0, 0, 0, '1714683216', NULL, '19', 'uttampaneliya', NULL, 1, 3),
(1024, 12, 131, 753, 1000, 0, 0, 0, '1714683216', NULL, '83', 'jiganeshkumar', NULL, 1, 3),
(1025, 12, 131, 826, 1000, 0, 0, 0, '1714683216', NULL, '78', 'RitvikKevat034', NULL, 1, 3),
(1026, 12, 131, 766, 1000, 0, 0, 0, '1714683216', NULL, '65', 'mahulkoli', NULL, 1, 3),
(1027, 12, 131, 833, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Amitarora336', NULL, 1, 3),
(1028, 12, 131, 783, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Nihardevi303', NULL, 1, 3),
(1029, 12, 131, 764, 1000, 0, 0, 0, '1714683216', NULL, '11', 'katn', NULL, 1, 3),
(1030, 12, 131, 777, 1000, 0, 0, 0, '1714683216', NULL, '61', 'smitmakavana', NULL, 1, 3),
(1031, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '92', 'kuntnakul', NULL, 1, 3),
(1032, 12, 131, 710, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Harshilpaneliya', NULL, 1, 3),
(1033, 12, 131, 716, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Milankohli888', NULL, 1, 3),
(1034, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '33', 'Shreeramprasad009', NULL, 1, 3),
(1035, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '99', 'narshirathaliya', NULL, 1, 3),
(1036, 12, 131, 713, 1000, 0, 0, 0, '1714683216', NULL, '23', 'Jaibalan333', NULL, 1, 3),
(1037, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '32', 'Ikbalkhan', NULL, 1, 3),
(1038, 12, 131, 729, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Tanish', NULL, 1, 3),
(1039, 12, 131, 786, 1000, 0, 0, 0, '1714683216', NULL, '80', 'smitlathiya5959', NULL, 1, 3),
(1040, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '73', 'Rushil', NULL, 1, 3),
(1041, 12, 131, 767, 1000, 0, 0, 0, '1714683216', NULL, '24', 'miteshbhai', NULL, 1, 3),
(1042, 12, 131, 788, 1000, 0, 0, 0, '1714683216', NULL, '45', 'Mahirakhatun7171', NULL, 1, 3),
(1043, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Ikbalkhan', NULL, 1, 3),
(1044, 12, 131, 720, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Ronithjoshi', NULL, 1, 3),
(1045, 12, 131, 799, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Roopeshmahta014', NULL, 1, 3),
(1046, 12, 131, 696, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Virajdas', NULL, 1, 3),
(1047, 12, 131, 749, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Ankit', NULL, 1, 3),
(1048, 12, 131, 729, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Tanish', NULL, 1, 3),
(1049, 12, 131, 759, 1000, 0, 0, 0, '1714683216', NULL, '92', 'dashanpanvala', NULL, 1, 3),
(1050, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '84', 'kuntnakul', NULL, 1, 3),
(1051, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Prashadmandal016', NULL, 1, 3),
(1052, 12, 131, 775, 1000, 0, 0, 0, '1714683216', NULL, '81', 'rajukumar', NULL, 1, 3),
(1053, 12, 131, 719, 1000, 0, 0, 0, '1714683216', NULL, '89', 'hirparapanth', NULL, 1, 3),
(1054, 12, 131, 737, 1000, 0, 0, 0, '1714683216', NULL, '55', 'rajchopada', NULL, 1, 3),
(1055, 12, 131, 746, 1000, 0, 0, 0, '1714683216', NULL, '97', 'dharmik', NULL, 1, 3),
(1056, 12, 131, 714, 1000, 0, 0, 0, '1714683216', NULL, '47', 'Basujatin', NULL, 1, 3),
(1057, 12, 131, 826, 1000, 0, 0, 0, '1714683216', NULL, '83', 'RitvikKevat034', NULL, 1, 3),
(1058, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Yagnesh99', NULL, 1, 3),
(1059, 12, 131, 741, 1000, 0, 0, 0, '1714683216', NULL, '11', 'vipul', NULL, 1, 3),
(1060, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '79', 'rizavan', NULL, 1, 3),
(1061, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '17', 'Yagnesh99', NULL, 1, 3),
(1062, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '28', 'Kabirshah007', NULL, 1, 3),
(1063, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '29', 'Lakshbandari087', NULL, 1, 3),
(1064, 12, 131, 683, 1000, 0, 0, 0, '1714683216', NULL, '83', 'Ishaanahuja', NULL, 1, 3),
(1065, 12, 131, 790, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Princedharuka11', NULL, 1, 3),
(1066, 12, 131, 734, 1000, 0, 0, 0, '1714683216', NULL, '78', 'Omkaarsingh', NULL, 1, 3),
(1067, 12, 131, 793, 1000, 0, 0, 0, '1714683216', NULL, '85', 'Baburam9696', NULL, 1, 3),
(1068, 12, 131, 695, 1000, 0, 0, 0, '1714683216', NULL, '38', 'Yashchandra', NULL, 1, 3),
(1069, 12, 131, 794, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Haripaswan055', NULL, 1, 3),
(1070, 12, 131, 727, 1000, 0, 0, 0, '1714683216', NULL, '80', 'Veerkumar', NULL, 1, 3),
(1071, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '92', 'narshirathaliya', NULL, 1, 3),
(1072, 12, 131, 764, 1000, 0, 0, 0, '1714683216', NULL, '33', 'katn', NULL, 1, 3),
(1073, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Chandresh', NULL, 1, 3),
(1074, 12, 131, 834, 1000, 0, 0, 0, '1714683216', NULL, '12', 'Yashshah337', NULL, 1, 3),
(1075, 12, 131, 743, 1000, 0, 0, 0, '1714683216', NULL, '49', 'kanil', NULL, 1, 3),
(1076, 12, 131, 762, 1000, 0, 0, 0, '1714683216', NULL, '58', 'hitash', NULL, 1, 3),
(1077, 12, 131, 802, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Ajausahani031', NULL, 1, 3),
(1078, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '71', 'rizavan', NULL, 1, 3),
(1079, 12, 131, 754, 1000, 0, 0, 0, '1714683216', NULL, '94', 'jitukanpara', NULL, 1, 3),
(1080, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '54', 'kavashulkumari560', NULL, 1, 3),
(1081, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Ishaanghosh', NULL, 1, 3),
(1082, 12, 131, 755, 1000, 0, 0, 0, '1714683216', NULL, '97', 'Amansharma6767', NULL, 1, 3),
(1083, 12, 131, 750, 1000, 0, 0, 0, '1714683216', NULL, '38', 'bhavesh', NULL, 1, 3),
(1084, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Sethaditi753', NULL, 1, 3),
(1085, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '98', 'Kabirshah007', NULL, 1, 3),
(1086, 12, 131, 759, 1000, 0, 0, 0, '1714683216', NULL, '62', 'dashanpanvala', NULL, 1, 3),
(1087, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '53', 'Pranjalgupta', NULL, 1, 3),
(1088, 12, 131, 803, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Deepsinha034', NULL, 1, 3),
(1089, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '93', 'Sethaditi753', NULL, 1, 3),
(1090, 12, 131, 803, 1000, 0, 0, 0, '1714683216', NULL, '76', 'Deepsinha034', NULL, 1, 3),
(1091, 12, 131, 777, 1000, 0, 0, 0, '1714683216', NULL, '90', 'smitmakavana', NULL, 1, 3),
(1092, 12, 131, 820, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Rajanmehata098', NULL, 1, 3),
(1093, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Vishalgupta0326', NULL, 1, 3),
(1094, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '36', 'Sethaditi753', NULL, 1, 3),
(1095, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '76', 'kavashulkumari560', NULL, 1, 3),
(1096, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '52', 'agarwalnidhi003', NULL, 1, 3),
(1097, 12, 131, 686, 1000, 0, 0, 0, '1714683216', NULL, '69', 'Diyaseth 25', NULL, 1, 3),
(1098, 12, 131, 738, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Umarkhan', NULL, 1, 3),
(1099, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '23', 'Prashadmandal016', NULL, 1, 3),
(1100, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '40', 'narshirathaliya', NULL, 1, 3),
(1101, 12, 131, 800, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Chandualam02', NULL, 1, 3),
(1102, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Brinkal0009', NULL, 1, 3),
(1103, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '64', 'Rajankumar577', NULL, 1, 3),
(1104, 12, 131, 741, 1000, 0, 0, 0, '1714683216', NULL, '47', 'vipul', NULL, 1, 3),
(1105, 12, 131, 805, 1000, 0, 0, 0, '1714683216', NULL, '76', 'Rahimali039', NULL, 1, 3),
(1106, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '87', 'Yogeshkaurav0332', NULL, 1, 3),
(1107, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '70', 'sagargandhi', NULL, 1, 3),
(1108, 12, 131, 725, 1000, 0, 0, 0, '1714683216', NULL, '62', 'Yugsharmna1010', NULL, 1, 3),
(1109, 12, 131, 830, 1000, 0, 0, 0, '1714683216', NULL, '69', 'Lakshjadhav318', NULL, 1, 3),
(1110, 12, 131, 724, 1000, 0, 0, 0, '1714683216', NULL, '21', 'prity4041', NULL, 1, 3),
(1111, 12, 131, 770, 1000, 0, 0, 0, '1714683216', NULL, '62', 'ashishmhata', NULL, 1, 3),
(1112, 12, 131, 830, 1000, 0, 0, 0, '1714683216', NULL, '48', 'Lakshjadhav318', NULL, 1, 3),
(1113, 12, 131, 757, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Bhargava', NULL, 1, 3),
(1114, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '82', 'Lakshbandari087', NULL, 1, 3),
(1115, 12, 131, 735, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Nimitpatel', NULL, 1, 3),
(1116, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '75', 'ramesh8558', NULL, 1, 3),
(1117, 12, 131, 769, 1000, 0, 0, 0, '1714683216', NULL, '30', 'nikunjshah', NULL, 1, 3),
(1118, 12, 131, 761, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Dharma', NULL, 1, 3),
(1119, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '81', 'Khaljitasingh786', NULL, 1, 3),
(1120, 12, 131, 711, 1000, 0, 0, 0, '1714683216', NULL, '72', 'Aryahitesh', NULL, 1, 3),
(1121, 12, 131, 776, 1000, 0, 0, 0, '1714683216', NULL, '49', 'sankatpanditr', NULL, 1, 3),
(1122, 12, 131, 710, 1000, 0, 0, 0, '1714683216', NULL, '56', 'Harshilpaneliya', NULL, 1, 3),
(1123, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '16', 'kuntnakul', NULL, 1, 3),
(1124, 12, 131, 786, 1000, 0, 0, 0, '1714683216', NULL, '37', 'smitlathiya5959', NULL, 1, 3),
(1125, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '96', 'Chandresh', NULL, 1, 3),
(1126, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Lakshbandari087', NULL, 1, 3),
(1127, 12, 131, 728, 1000, 0, 0, 0, '1714683216', NULL, '23', 'Tejaskapor', NULL, 1, 3),
(1128, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Brinkal0009', NULL, 1, 3),
(1129, 12, 131, 685, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Amarsingh03', NULL, 1, 3),
(1130, 12, 131, 761, 1000, 0, 0, 0, '1714683216', NULL, '22', 'Dharma', NULL, 1, 3),
(1131, 12, 131, 788, 1000, 0, 0, 0, '1714683216', NULL, '76', 'Mahirakhatun7171', NULL, 1, 3),
(1132, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '73', 'Vishalgupta0326', NULL, 1, 3),
(1133, 12, 131, 763, 1000, 0, 0, 0, '1714683216', NULL, '69', 'kalpeshsorathiya', NULL, 1, 3),
(1134, 12, 131, 752, 1000, 0, 0, 0, '1714683216', NULL, '84', 'hirandolakiya', NULL, 1, 3),
(1135, 12, 131, 690, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Mihirthakur207', NULL, 1, 3),
(1136, 12, 131, 814, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Pratikakamat064', NULL, 1, 3),
(1137, 12, 131, 725, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Yugsharmna1010', NULL, 1, 3);
INSERT INTO `tbl_participants` (`id`, `contest_id`, `fees_id`, `user_id`, `entry_fee`, `win_prize`, `rank`, `status`, `date_created`, `result_time`, `ticket_no`, `username`, `res_type`, `is_dummy`, `pkg_id`) VALUES
(1138, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '32', 'Yagnesh99', NULL, 1, 3),
(1139, 12, 131, 774, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Ravisolanki', NULL, 1, 3),
(1140, 12, 131, 754, 1000, 0, 0, 0, '1714683216', NULL, '24', 'jitukanpara', NULL, 1, 3),
(1141, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '62', 'Vishalgupta0326', NULL, 1, 3),
(1142, 12, 131, 759, 1000, 0, 0, 0, '1714683216', NULL, '21', 'dashanpanvala', NULL, 1, 3),
(1143, 12, 131, 732, 1000, 0, 0, 0, '1714683216', NULL, '86', 'savan100', NULL, 1, 3),
(1144, 12, 131, 800, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Chandualam02', NULL, 1, 3),
(1145, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Harsithjoshi', NULL, 1, 3),
(1146, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '22', 'Pandya1507', NULL, 1, 3),
(1147, 12, 131, 690, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Mihirthakur207', NULL, 1, 3),
(1148, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Kabirshah007', NULL, 1, 3),
(1149, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '40', 'Dakshchawla66', NULL, 1, 3),
(1150, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Purnitjha', NULL, 1, 3),
(1151, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Lakshbandari087', NULL, 1, 3),
(1152, 12, 131, 769, 1000, 0, 0, 0, '1714683216', NULL, '76', 'nikunjshah', NULL, 1, 3),
(1153, 12, 131, 787, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Hardeepyadav444', NULL, 1, 3),
(1154, 12, 131, 762, 1000, 0, 0, 0, '1714683216', NULL, '84', 'hitash', NULL, 1, 3),
(1155, 12, 131, 731, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Sahiljinjala', NULL, 1, 3),
(1156, 12, 131, 830, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Lakshjadhav318', NULL, 1, 3),
(1157, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Raviroy047', NULL, 1, 3),
(1158, 12, 131, 757, 1000, 0, 0, 0, '1714683216', NULL, '87', 'Bhargava', NULL, 1, 3),
(1159, 12, 131, 721, 1000, 0, 0, 0, '1714683216', NULL, '28', 'karankhan', NULL, 1, 3),
(1160, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '91', 'narshirathaliya', NULL, 1, 3),
(1161, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '67', 'Rushil', NULL, 1, 3),
(1162, 12, 131, 833, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Amitarora336', NULL, 1, 3),
(1163, 12, 131, 775, 1000, 0, 0, 0, '1714683216', NULL, '20', 'rajukumar', NULL, 1, 3),
(1164, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '12', 'Lakshbandari087', NULL, 1, 3),
(1165, 12, 131, 760, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Keyuranjirval', NULL, 1, 3),
(1166, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Ishaanghosh', NULL, 1, 3),
(1167, 12, 131, 716, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Milankohli888', NULL, 1, 3),
(1168, 12, 131, 800, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Chandualam02', NULL, 1, 3),
(1169, 12, 131, 808, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Ahamadmistri049', NULL, 1, 3),
(1170, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '34', 'agarwalnidhi003', NULL, 1, 3),
(1171, 12, 131, 705, 1000, 0, 0, 0, '1714683216', NULL, '64', 'baburaval', NULL, 1, 3),
(1172, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '55', 'nilesh', NULL, 1, 3),
(1173, 12, 131, 814, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Pratikakamat064', NULL, 1, 3),
(1174, 12, 131, 715, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Krishbatta', NULL, 1, 3),
(1175, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Kabirshah007', NULL, 1, 3),
(1176, 12, 131, 822, 1000, 0, 0, 0, '1714683216', NULL, '27', 'Aakeshmandapara109', NULL, 1, 3),
(1177, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '26', 'Yogeshkaurav0332', NULL, 1, 3),
(1178, 12, 131, 824, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Pranjalkamati126', NULL, 1, 3),
(1179, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '98', 'sagargandhi', NULL, 1, 3),
(1180, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '29', 'Chandresh', NULL, 1, 3),
(1181, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '47', 'kuntnakul', NULL, 1, 3),
(1182, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Pranjalgupta', NULL, 1, 3),
(1183, 12, 131, 772, 1000, 0, 0, 0, '1714683216', NULL, '61', 'rakesh', NULL, 1, 3),
(1184, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Ishaanghosh', NULL, 1, 3),
(1185, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '23', 'Mahaveershing88', NULL, 1, 3),
(1186, 12, 131, 798, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Savejitadas', NULL, 1, 3),
(1187, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '14', 'Rajankumar577', NULL, 1, 3),
(1188, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '13', 'Rajankumar577', NULL, 1, 3),
(1189, 12, 131, 689, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Ajaypatel4674', NULL, 1, 3),
(1190, 12, 131, 752, 1000, 0, 0, 0, '1714683216', NULL, '93', 'hirandolakiya', NULL, 1, 3),
(1191, 12, 131, 748, 1000, 0, 0, 0, '1714683216', NULL, '29', 'deepak', NULL, 1, 3),
(1192, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '70', 'Khaljitasingh786', NULL, 1, 3),
(1193, 12, 131, 754, 1000, 0, 0, 0, '1714683216', NULL, '44', 'jitukanpara', NULL, 1, 3),
(1194, 12, 131, 780, 1000, 0, 0, 0, '1714683216', NULL, '27', 'uttampaneliya', NULL, 1, 3),
(1195, 12, 131, 725, 1000, 0, 0, 0, '1714683216', NULL, '98', 'Yugsharmna1010', NULL, 1, 3),
(1196, 12, 131, 699, 1000, 0, 0, 0, '1714683216', NULL, '45', 'Vedantjain', NULL, 1, 3),
(1197, 12, 131, 742, 1000, 0, 0, 0, '1714683216', NULL, '11', 'nitin', NULL, 1, 3),
(1198, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '97', 'ramesh8558', NULL, 1, 3),
(1199, 12, 131, 782, 1000, 0, 0, 0, '1714683216', NULL, '98', 'roshnikumari', NULL, 1, 3),
(1200, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Mananranjan058', NULL, 1, 3),
(1201, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '47', 'Yagnesh99', NULL, 1, 3),
(1202, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '36', 'Rushil', NULL, 1, 3),
(1203, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '33', 'Brinkal0009', NULL, 1, 3),
(1204, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '37', 'kuntnakul', NULL, 1, 3),
(1205, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Raviroy047', NULL, 1, 3),
(1206, 12, 131, 812, 1000, 0, 0, 0, '1714683216', NULL, '17', 'Rushigiri056', NULL, 1, 3),
(1207, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Purnitjha', NULL, 1, 3),
(1208, 12, 131, 705, 1000, 0, 0, 0, '1714683216', NULL, '45', 'baburaval', NULL, 1, 3),
(1209, 12, 131, 758, 1000, 0, 0, 0, '1714683216', NULL, '22', 'Brinkal0009', NULL, 1, 3),
(1210, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '74', 'sagargandhi', NULL, 1, 3),
(1211, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '95', 'ramesh8558', NULL, 1, 3),
(1212, 12, 131, 711, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Aryahitesh', NULL, 1, 3),
(1213, 12, 131, 715, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Krishbatta', NULL, 1, 3),
(1214, 12, 131, 760, 1000, 0, 0, 0, '1714683216', NULL, '13', 'Keyuranjirval', NULL, 1, 3),
(1215, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Shreeramprasad009', NULL, 1, 3),
(1216, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '56', 'Yagnesh99', NULL, 1, 3),
(1217, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '69', 'Dilipshukla347', NULL, 1, 3),
(1218, 12, 131, 720, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Ronithjoshi', NULL, 1, 3),
(1219, 12, 131, 762, 1000, 0, 0, 0, '1714683216', NULL, '13', 'hitash', NULL, 1, 3),
(1220, 12, 131, 732, 1000, 0, 0, 0, '1714683216', NULL, '62', 'savan100', NULL, 1, 3),
(1221, 12, 131, 803, 1000, 0, 0, 0, '1714683216', NULL, '96', 'Deepsinha034', NULL, 1, 3),
(1222, 12, 131, 739, 1000, 0, 0, 0, '1714683216', NULL, '89', 'aksharmahata111', NULL, 1, 3),
(1223, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '61', 'kavashulkumari560', NULL, 1, 3),
(1224, 12, 131, 808, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Ahamadmistri049', NULL, 1, 3),
(1225, 12, 131, 716, 1000, 0, 0, 0, '1714683216', NULL, '93', 'Milankohli888', NULL, 1, 3),
(1226, 12, 131, 778, 1000, 0, 0, 0, '1714683216', NULL, '24', 'tejash', NULL, 1, 3),
(1227, 12, 131, 713, 1000, 0, 0, 0, '1714683216', NULL, '88', 'Jaibalan333', NULL, 1, 3),
(1228, 12, 131, 831, 1000, 0, 0, 0, '1714683216', NULL, '52', 'Varunmishra0329', NULL, 1, 3),
(1229, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Raviroy047', NULL, 1, 3),
(1230, 12, 131, 721, 1000, 0, 0, 0, '1714683216', NULL, '14', 'karankhan', NULL, 1, 3),
(1231, 12, 131, 799, 1000, 0, 0, 0, '1714683216', NULL, '73', 'Roopeshmahta014', NULL, 1, 3),
(1232, 12, 131, 834, 1000, 0, 0, 0, '1714683216', NULL, '14', 'Yashshah337', NULL, 1, 3),
(1233, 12, 131, 731, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Sahiljinjala', NULL, 1, 3),
(1234, 12, 131, 812, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Rushigiri056', NULL, 1, 3),
(1235, 12, 131, 831, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Varunmishra0329', NULL, 1, 3),
(1236, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Dilipshukla347', NULL, 1, 3),
(1237, 12, 131, 821, 1000, 0, 0, 0, '1714683216', NULL, '33', 'Aaravsingh107', NULL, 1, 3),
(1238, 12, 131, 823, 1000, 0, 0, 0, '1714683216', NULL, '64', 'Ekanshmojidara122', NULL, 1, 3),
(1239, 12, 131, 782, 1000, 0, 0, 0, '1714683216', NULL, '16', 'roshnikumari', NULL, 1, 3),
(1240, 12, 131, 770, 1000, 0, 0, 0, '1714683216', NULL, '80', 'ashishmhata', NULL, 1, 3),
(1241, 12, 131, 709, 1000, 0, 0, 0, '1714683216', NULL, '33', 'Harshladumor', NULL, 1, 3),
(1242, 12, 131, 744, 1000, 0, 0, 0, '1714683216', NULL, '64', 'rohitajoshi', NULL, 1, 3),
(1243, 12, 131, 718, 1000, 0, 0, 0, '1714683216', NULL, '54', 'Ommangal', NULL, 1, 3),
(1244, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '20', 'nilesh', NULL, 1, 3),
(1245, 12, 131, 780, 1000, 0, 0, 0, '1714683216', NULL, '64', 'uttampaneliya', NULL, 1, 3),
(1246, 12, 131, 746, 1000, 0, 0, 0, '1714683216', NULL, '63', 'dharmik', NULL, 1, 3),
(1247, 12, 131, 812, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Rushigiri056', NULL, 1, 3),
(1248, 12, 131, 721, 1000, 0, 0, 0, '1714683216', NULL, '93', 'karankhan', NULL, 1, 3),
(1249, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Tejmehta505', NULL, 1, 3),
(1250, 12, 131, 689, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Ajaypatel4674', NULL, 1, 3),
(1251, 12, 131, 804, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Fenilbhagat037', NULL, 1, 3),
(1252, 12, 131, 735, 1000, 0, 0, 0, '1714683216', NULL, '45', 'Nimitpatel', NULL, 1, 3),
(1253, 12, 131, 696, 1000, 0, 0, 0, '1714683216', NULL, '75', 'Virajdas', NULL, 1, 3),
(1254, 12, 131, 838, 1000, 0, 0, 0, '1714683216', NULL, '56', 'Nikhilsaru349', NULL, 1, 3),
(1255, 12, 131, 774, 1000, 0, 0, 0, '1714683216', NULL, '49', 'Ravisolanki', NULL, 1, 3),
(1256, 12, 131, 813, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Zeelvarma', NULL, 1, 3),
(1257, 12, 131, 753, 1000, 0, 0, 0, '1714683216', NULL, '45', 'jiganeshkumar', NULL, 1, 3),
(1258, 12, 131, 825, 1000, 0, 0, 0, '1714683216', NULL, '49', 'Rahulvishwas028', NULL, 1, 3),
(1259, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '50', 'Pandya1507', NULL, 1, 3),
(1260, 12, 131, 833, 1000, 0, 0, 0, '1714683216', NULL, '97', 'Amitarora336', NULL, 1, 3),
(1261, 12, 131, 834, 1000, 0, 0, 0, '1714683216', NULL, '17', 'Yashshah337', NULL, 1, 3),
(1262, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '35', 'ramesh8558', NULL, 1, 3),
(1263, 12, 131, 707, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Gupatpratham', NULL, 1, 3),
(1264, 12, 131, 699, 1000, 0, 0, 0, '1714683216', NULL, '17', 'Vedantjain', NULL, 1, 3),
(1265, 12, 131, 687, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Sananaidhu', NULL, 1, 3),
(1266, 12, 131, 834, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Yashshah337', NULL, 1, 3),
(1267, 12, 131, 802, 1000, 0, 0, 0, '1714683216', NULL, '75', 'Ajausahani031', NULL, 1, 3),
(1268, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '63', 'ramesh8558', NULL, 1, 3),
(1269, 12, 131, 731, 1000, 0, 0, 0, '1714683216', NULL, '98', 'Sahiljinjala', NULL, 1, 3),
(1270, 12, 131, 781, 1000, 0, 0, 0, '1714683216', NULL, '53', 'vrushantkakalotar', NULL, 1, 3),
(1271, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '63', 'sagargandhi', NULL, 1, 3),
(1272, 12, 131, 786, 1000, 0, 0, 0, '1714683216', NULL, '98', 'smitlathiya5959', NULL, 1, 3),
(1273, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '22', 'nilesh', NULL, 1, 3),
(1274, 12, 131, 698, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Ishaanghosh', NULL, 1, 3),
(1275, 12, 131, 765, 1000, 0, 0, 0, '1714683216', NULL, '57', 'mahesh', NULL, 1, 3),
(1276, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Vishalgupta0326', NULL, 1, 3),
(1277, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '34', 'Mananranjan058', NULL, 1, 3),
(1278, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '43', 'ramesh8558', NULL, 1, 3),
(1279, 12, 131, 687, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Sananaidhu', NULL, 1, 3),
(1280, 12, 131, 831, 1000, 0, 0, 0, '1714683216', NULL, '93', 'Varunmishra0329', NULL, 1, 3),
(1281, 12, 131, 728, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Tejaskapor', NULL, 1, 3),
(1282, 12, 131, 779, 1000, 0, 0, 0, '1714683216', NULL, '22', 'udairathod', NULL, 1, 3),
(1283, 12, 131, 828, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Sameerkhan306', NULL, 1, 3),
(1284, 12, 131, 709, 1000, 0, 0, 0, '1714683216', NULL, '88', 'Harshladumor', NULL, 1, 3),
(1285, 12, 131, 685, 1000, 0, 0, 0, '1714683216', NULL, '62', 'Amarsingh03', NULL, 1, 3),
(1286, 12, 131, 719, 1000, 0, 0, 0, '1714683216', NULL, '85', 'hirparapanth', NULL, 1, 3),
(1287, 12, 131, 741, 1000, 0, 0, 0, '1714683216', NULL, '96', 'vipul', NULL, 1, 3),
(1288, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Pandya1507', NULL, 1, 3),
(1289, 12, 131, 826, 1000, 0, 0, 0, '1714683216', NULL, '41', 'RitvikKevat034', NULL, 1, 3),
(1290, 12, 131, 724, 1000, 0, 0, 0, '1714683216', NULL, '28', 'prity4041', NULL, 1, 3),
(1291, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Mahaveershing88', NULL, 1, 3),
(1292, 12, 131, 685, 1000, 0, 0, 0, '1714683216', NULL, '32', 'Amarsingh03', NULL, 1, 3),
(1293, 12, 131, 790, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Princedharuka11', NULL, 1, 3),
(1294, 12, 131, 775, 1000, 0, 0, 0, '1714683216', NULL, '68', 'rajukumar', NULL, 1, 3),
(1295, 12, 131, 699, 1000, 0, 0, 0, '1714683216', NULL, '85', 'Vedantjain', NULL, 1, 3),
(1296, 12, 131, 694, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Davedayal', NULL, 1, 3),
(1297, 12, 131, 790, 1000, 0, 0, 0, '1714683216', NULL, '74', 'Princedharuka11', NULL, 1, 3),
(1298, 12, 131, 719, 1000, 0, 0, 0, '1714683216', NULL, '78', 'hirparapanth', NULL, 1, 3),
(1299, 12, 131, 801, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Jegarpandit028', NULL, 1, 3),
(1300, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Rajankumar577', NULL, 1, 3),
(1301, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Vishalgupta0326', NULL, 1, 3),
(1302, 12, 131, 763, 1000, 0, 0, 0, '1714683216', NULL, '93', 'kalpeshsorathiya', NULL, 1, 3),
(1303, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Shreeramprasad009', NULL, 1, 3),
(1304, 12, 131, 764, 1000, 0, 0, 0, '1714683216', NULL, '33', 'katn', NULL, 1, 3),
(1305, 12, 131, 686, 1000, 0, 0, 0, '1714683216', NULL, '67', 'Diyaseth 25', NULL, 1, 3),
(1306, 12, 131, 756, 1000, 0, 0, 0, '1714683216', NULL, '47', 'Aryanbhai', NULL, 1, 3),
(1307, 12, 131, 793, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Baburam9696', NULL, 1, 3),
(1308, 12, 131, 771, 1000, 0, 0, 0, '1714683216', NULL, '17', 'miherasolanki', NULL, 1, 3),
(1309, 12, 131, 731, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Sahiljinjala', NULL, 1, 3),
(1310, 12, 131, 744, 1000, 0, 0, 0, '1714683216', NULL, '21', 'rohitajoshi', NULL, 1, 3),
(1311, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Chandresh', NULL, 1, 3),
(1312, 12, 131, 766, 1000, 0, 0, 0, '1714683216', NULL, '26', 'mahulkoli', NULL, 1, 3),
(1313, 12, 131, 813, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Zeelvarma', NULL, 1, 3),
(1314, 12, 131, 739, 1000, 0, 0, 0, '1714683216', NULL, '53', 'aksharmahata111', NULL, 1, 3),
(1315, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '75', 'agarwalnidhi003', NULL, 1, 3),
(1316, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Pandya1507', NULL, 1, 3),
(1317, 12, 131, 689, 1000, 0, 0, 0, '1714683216', NULL, '29', 'Ajaypatel4674', NULL, 1, 3),
(1318, 12, 131, 820, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Rajanmehata098', NULL, 1, 3),
(1319, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '86', 'Prashadmandal016', NULL, 1, 3),
(1320, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '34', 'agarwalnidhi003', NULL, 1, 3),
(1321, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '77', 'Tejmehta505', NULL, 1, 3),
(1322, 12, 131, 690, 1000, 0, 0, 0, '1714683216', NULL, '48', 'Mihirthakur207', NULL, 1, 3),
(1323, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '56', 'Ikbalkhan', NULL, 1, 3),
(1324, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '69', 'Yagnesh99', NULL, 1, 3),
(1325, 12, 131, 724, 1000, 0, 0, 0, '1714683216', NULL, '40', 'prity4041', NULL, 1, 3),
(1326, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Dilipshukla347', NULL, 1, 3),
(1327, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '80', 'kuntnakul', NULL, 1, 3),
(1328, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Vishalgupta0326', NULL, 1, 3),
(1329, 12, 131, 760, 1000, 0, 0, 0, '1714683216', NULL, '14', 'Keyuranjirval', NULL, 1, 3),
(1330, 12, 131, 757, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Bhargava', NULL, 1, 3),
(1331, 12, 131, 803, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Deepsinha034', NULL, 1, 3),
(1332, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '48', 'nilesh', NULL, 1, 3),
(1333, 12, 131, 779, 1000, 0, 0, 0, '1714683216', NULL, '28', 'udairathod', NULL, 1, 3),
(1334, 12, 131, 718, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Ommangal', NULL, 1, 3),
(1335, 12, 131, 833, 1000, 0, 0, 0, '1714683216', NULL, '82', 'Amitarora336', NULL, 1, 3),
(1336, 12, 131, 743, 1000, 0, 0, 0, '1714683216', NULL, '84', 'kanil', NULL, 1, 3),
(1337, 12, 131, 804, 1000, 0, 0, 0, '1714683216', NULL, '13', 'Fenilbhagat037', NULL, 1, 3),
(1338, 12, 131, 822, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Aakeshmandapara109', NULL, 1, 3),
(1339, 12, 131, 810, 1000, 0, 0, 0, '1714683216', NULL, '69', 'Parthkishi052', NULL, 1, 3),
(1340, 12, 131, 818, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Kubardas083', NULL, 1, 3),
(1341, 12, 131, 780, 1000, 0, 0, 0, '1714683216', NULL, '85', 'uttampaneliya', NULL, 1, 3),
(1342, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '18', 'sagargandhi', NULL, 1, 3),
(1343, 12, 131, 695, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Yashchandra', NULL, 1, 3),
(1344, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Dilipshukla347', NULL, 1, 3),
(1345, 12, 131, 736, 1000, 0, 0, 0, '1714683216', NULL, '45', ' Amulya', NULL, 1, 3),
(1346, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Tejmehta505', NULL, 1, 3),
(1347, 12, 131, 814, 1000, 0, 0, 0, '1714683216', NULL, '93', 'Pratikakamat064', NULL, 1, 3),
(1348, 12, 131, 835, 1000, 0, 0, 0, '1714683216', NULL, '75', 'Ronitsharma341', NULL, 1, 3),
(1349, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '85', 'Raviroy047', NULL, 1, 3),
(1350, 12, 131, 826, 1000, 0, 0, 0, '1714683216', NULL, '30', 'RitvikKevat034', NULL, 1, 3),
(1351, 12, 131, 738, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Umarkhan', NULL, 1, 3),
(1352, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '36', 'Harsithjoshi', NULL, 1, 3),
(1353, 12, 131, 818, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Kubardas083', NULL, 1, 3),
(1354, 12, 131, 783, 1000, 0, 0, 0, '1714683216', NULL, '77', 'Nihardevi303', NULL, 1, 3),
(1355, 12, 131, 817, 1000, 0, 0, 0, '1714683216', NULL, '38', 'Urvanbharati079', NULL, 1, 3),
(1356, 12, 131, 750, 1000, 0, 0, 0, '1714683216', NULL, '13', 'bhavesh', NULL, 1, 3),
(1357, 12, 131, 799, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Roopeshmahta014', NULL, 1, 3),
(1358, 12, 131, 819, 1000, 0, 0, 0, '1714683216', NULL, '31', 'Lakshbandari087', NULL, 1, 3),
(1359, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '53', 'ramesh8558', NULL, 1, 3),
(1360, 12, 131, 770, 1000, 0, 0, 0, '1714683216', NULL, '70', 'ashishmhata', NULL, 1, 3),
(1361, 12, 131, 823, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Ekanshmojidara122', NULL, 1, 3),
(1362, 12, 131, 759, 1000, 0, 0, 0, '1714683216', NULL, '50', 'dashanpanvala', NULL, 1, 3),
(1363, 12, 131, 695, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Yashchandra', NULL, 1, 3),
(1364, 12, 131, 702, 1000, 0, 0, 0, '1714683216', NULL, '75', 'Ayushlal', NULL, 1, 3),
(1365, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '32', 'Tejmehta505', NULL, 1, 3),
(1366, 12, 131, 747, 1000, 0, 0, 0, '1714683216', NULL, '78', 'hiran455', NULL, 1, 3),
(1367, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Harsithjoshi', NULL, 1, 3),
(1368, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '36', 'Yogeshkaurav0332', NULL, 1, 3),
(1369, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '73', 'Vishalgupta0326', NULL, 1, 3),
(1370, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Shreeramprasad009', NULL, 1, 3),
(1371, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Yagnesh99', NULL, 1, 3),
(1372, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '76', 'Chandresh', NULL, 1, 3),
(1373, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '50', 'Dakshchawla66', NULL, 1, 3),
(1374, 12, 131, 739, 1000, 0, 0, 0, '1714683216', NULL, '38', 'aksharmahata111', NULL, 1, 3),
(1375, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '53', 'Mahaveershing88', NULL, 1, 3),
(1376, 12, 131, 770, 1000, 0, 0, 0, '1714683216', NULL, '22', 'ashishmhata', NULL, 1, 3),
(1377, 12, 131, 791, 1000, 0, 0, 0, '1714683216', NULL, '79', 'kavashulkumari560', NULL, 1, 3),
(1378, 12, 131, 761, 1000, 0, 0, 0, '1714683216', NULL, '68', 'Dharma', NULL, 1, 3),
(1379, 12, 131, 707, 1000, 0, 0, 0, '1714683216', NULL, '91', 'Gupatpratham', NULL, 1, 3),
(1380, 12, 131, 723, 1000, 0, 0, 0, '1714683216', NULL, '31', 'Zehaankhan', NULL, 1, 3),
(1381, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Shreeramprasad009', NULL, 1, 3),
(1382, 12, 131, 800, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Chandualam02', NULL, 1, 3),
(1383, 12, 131, 748, 1000, 0, 0, 0, '1714683216', NULL, '69', 'deepak', NULL, 1, 3),
(1384, 12, 131, 747, 1000, 0, 0, 0, '1714683216', NULL, '89', 'hiran455', NULL, 1, 3),
(1385, 12, 131, 786, 1000, 0, 0, 0, '1714683216', NULL, '19', 'smitlathiya5959', NULL, 1, 3),
(1386, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '84', 'Purnitjha', NULL, 1, 3),
(1387, 12, 131, 767, 1000, 0, 0, 0, '1714683216', NULL, '33', 'miteshbhai', NULL, 1, 3),
(1388, 12, 131, 741, 1000, 0, 0, 0, '1714683216', NULL, '90', 'vipul', NULL, 1, 3),
(1389, 12, 131, 729, 1000, 0, 0, 0, '1714683216', NULL, '52', 'Tanish', NULL, 1, 3),
(1390, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '90', 'rizavan', NULL, 1, 3),
(1391, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '32', 'Prashadmandal016', NULL, 1, 3),
(1392, 12, 131, 736, 1000, 0, 0, 0, '1714683216', NULL, '66', ' Amulya', NULL, 1, 3),
(1393, 12, 131, 777, 1000, 0, 0, 0, '1714683216', NULL, '19', 'smitmakavana', NULL, 1, 3),
(1394, 12, 131, 799, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Roopeshmahta014', NULL, 1, 3),
(1395, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '48', 'Mahaveershing88', NULL, 1, 3),
(1396, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '89', 'Yagnesh99', NULL, 1, 3),
(1397, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Rushil', NULL, 1, 3),
(1398, 12, 131, 787, 1000, 0, 0, 0, '1714683216', NULL, '19', 'Hardeepyadav444', NULL, 1, 3),
(1399, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '68', 'nilesh', NULL, 1, 3),
(1400, 12, 131, 705, 1000, 0, 0, 0, '1714683216', NULL, '63', 'baburaval', NULL, 1, 3),
(1401, 12, 131, 767, 1000, 0, 0, 0, '1714683216', NULL, '64', 'miteshbhai', NULL, 1, 3),
(1402, 12, 131, 694, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Davedayal', NULL, 1, 3),
(1403, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Rushil', NULL, 1, 3),
(1404, 12, 131, 690, 1000, 0, 0, 0, '1714683216', NULL, '70', 'Mihirthakur207', NULL, 1, 3),
(1405, 12, 131, 835, 1000, 0, 0, 0, '1714683216', NULL, '57', 'Ronitsharma341', NULL, 1, 3),
(1406, 12, 131, 812, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Rushigiri056', NULL, 1, 3),
(1407, 12, 131, 837, 1000, 0, 0, 0, '1714683216', NULL, '78', 'Dilipshukla347', NULL, 1, 3),
(1408, 12, 131, 714, 1000, 0, 0, 0, '1714683216', NULL, '68', 'Basujatin', NULL, 1, 3),
(1409, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '71', 'kuntnakul', NULL, 1, 3),
(1410, 12, 131, 682, 1000, 0, 0, 0, '1714683216', NULL, '74', 'Dhruvkhatri ', NULL, 1, 3),
(1411, 12, 131, 822, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Aakeshmandapara109', NULL, 1, 3),
(1412, 12, 131, 724, 1000, 0, 0, 0, '1714683216', NULL, '96', 'prity4041', NULL, 1, 3),
(1413, 12, 131, 830, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Lakshjadhav318', NULL, 1, 3),
(1414, 12, 131, 694, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Davedayal', NULL, 1, 3),
(1415, 12, 131, 749, 1000, 0, 0, 0, '1714683216', NULL, '53', 'Ankit', NULL, 1, 3),
(1416, 12, 131, 725, 1000, 0, 0, 0, '1714683216', NULL, '42', 'Yugsharmna1010', NULL, 1, 3),
(1417, 12, 131, 718, 1000, 0, 0, 0, '1714683216', NULL, '43', 'Ommangal', NULL, 1, 3),
(1418, 12, 131, 699, 1000, 0, 0, 0, '1714683216', NULL, '47', 'Vedantjain', NULL, 1, 3),
(1419, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Prashadmandal016', NULL, 1, 3),
(1420, 12, 131, 784, 1000, 0, 0, 0, '1714683216', NULL, '17', 'Rajankumar577', NULL, 1, 3),
(1421, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Tejmehta505', NULL, 1, 3),
(1422, 12, 131, 690, 1000, 0, 0, 0, '1714683216', NULL, '23', 'Mihirthakur207', NULL, 1, 3),
(1423, 12, 131, 770, 1000, 0, 0, 0, '1714683216', NULL, '31', 'ashishmhata', NULL, 1, 3),
(1424, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '33', 'Rushil', NULL, 1, 3),
(1425, 12, 131, 759, 1000, 0, 0, 0, '1714683216', NULL, '95', 'dashanpanvala', NULL, 1, 3),
(1426, 12, 131, 795, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Shreeramprasad009', NULL, 1, 3),
(1427, 12, 131, 689, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Ajaypatel4674', NULL, 1, 3),
(1428, 12, 131, 790, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Princedharuka11', NULL, 1, 3),
(1429, 12, 131, 749, 1000, 0, 0, 0, '1714683216', NULL, '55', 'Ankit', NULL, 1, 3),
(1430, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '35', 'kuntnakul', NULL, 1, 3),
(1431, 12, 131, 746, 1000, 0, 0, 0, '1714683216', NULL, '36', 'dharmik', NULL, 1, 3),
(1432, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '29', 'Tejmehta505', NULL, 1, 3),
(1433, 12, 131, 836, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Asimkham346', NULL, 1, 3),
(1434, 12, 131, 755, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Amansharma6767', NULL, 1, 3),
(1435, 12, 131, 824, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Pranjalkamati126', NULL, 1, 3),
(1436, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '39', 'Vishalgupta0326', NULL, 1, 3),
(1437, 12, 131, 690, 1000, 0, 0, 0, '1714683216', NULL, '26', 'Mihirthakur207', NULL, 1, 3),
(1438, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Khaljitasingh786', NULL, 1, 3),
(1439, 12, 131, 737, 1000, 0, 0, 0, '1714683216', NULL, '74', 'rajchopada', NULL, 1, 3),
(1440, 12, 131, 775, 1000, 0, 0, 0, '1714683216', NULL, '44', 'rajukumar', NULL, 1, 3),
(1441, 12, 131, 818, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Kubardas083', NULL, 1, 3),
(1442, 12, 131, 741, 1000, 0, 0, 0, '1714683216', NULL, '18', 'vipul', NULL, 1, 3),
(1443, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Mahaveershing88', NULL, 1, 3),
(1444, 12, 131, 720, 1000, 0, 0, 0, '1714683216', NULL, '34', 'Ronithjoshi', NULL, 1, 3),
(1445, 12, 131, 706, 1000, 0, 0, 0, '1714683216', NULL, '60', 'sagargandhi', NULL, 1, 3),
(1446, 12, 131, 727, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Veerkumar', NULL, 1, 3),
(1447, 12, 131, 708, 1000, 0, 0, 0, '1714683216', NULL, '14', 'Farajkhan', NULL, 1, 3),
(1448, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '73', 'Mananranjan058', NULL, 1, 3),
(1449, 12, 131, 771, 1000, 0, 0, 0, '1714683216', NULL, '71', 'miherasolanki', NULL, 1, 3),
(1450, 12, 131, 815, 1000, 0, 0, 0, '1714683216', NULL, '61', 'Davemochi068', NULL, 1, 3),
(1451, 12, 131, 806, 1000, 0, 0, 0, '1714683216', NULL, '40', 'Kibarsada043', NULL, 1, 3),
(1452, 12, 131, 726, 1000, 0, 0, 0, '1714683216', NULL, '31', 'Yagnesh99', NULL, 1, 3),
(1453, 12, 131, 742, 1000, 0, 0, 0, '1714683216', NULL, '16', 'nitin', NULL, 1, 3),
(1454, 12, 131, 745, 1000, 0, 0, 0, '1714683216', NULL, '17', 'nilesh', NULL, 1, 3),
(1455, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Rushil', NULL, 1, 3),
(1456, 12, 131, 729, 1000, 0, 0, 0, '1714683216', NULL, '44', 'Tanish', NULL, 1, 3),
(1457, 12, 131, 830, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Lakshjadhav318', NULL, 1, 3),
(1458, 12, 131, 714, 1000, 0, 0, 0, '1714683216', NULL, '32', 'Basujatin', NULL, 1, 3),
(1459, 12, 131, 710, 1000, 0, 0, 0, '1714683216', NULL, '99', 'Harshilpaneliya', NULL, 1, 3),
(1460, 12, 131, 760, 1000, 0, 0, 0, '1714683216', NULL, '50', 'Keyuranjirval', NULL, 1, 3),
(1461, 12, 131, 816, 1000, 0, 0, 0, '1714683216', NULL, '85', 'Rajbhuiya075', NULL, 1, 3),
(1462, 12, 131, 718, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Ommangal', NULL, 1, 3),
(1463, 12, 131, 751, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Pranjalgupta', NULL, 1, 3),
(1464, 12, 131, 717, 1000, 0, 0, 0, '1714683216', NULL, '79', 'kuntnakul', NULL, 1, 3),
(1465, 12, 131, 700, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Harsithjoshi', NULL, 1, 3),
(1466, 12, 131, 771, 1000, 0, 0, 0, '1714683216', NULL, '10', 'miherasolanki', NULL, 1, 3),
(1467, 12, 131, 683, 1000, 0, 0, 0, '1714683216', NULL, '40', 'Ishaanahuja', NULL, 1, 3),
(1468, 12, 131, 739, 1000, 0, 0, 0, '1714683216', NULL, '54', 'aksharmahata111', NULL, 1, 3),
(1469, 12, 131, 684, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Pandya1507', NULL, 1, 3),
(1470, 12, 131, 770, 1000, 0, 0, 0, '1714683216', NULL, '94', 'ashishmhata', NULL, 1, 3),
(1471, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '28', 'Ikbalkhan', NULL, 1, 3),
(1472, 12, 131, 754, 1000, 0, 0, 0, '1714683216', NULL, '29', 'jitukanpara', NULL, 1, 3),
(1473, 12, 131, 723, 1000, 0, 0, 0, '1714683216', NULL, '27', 'Zehaankhan', NULL, 1, 3),
(1474, 12, 131, 702, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Ayushlal', NULL, 1, 3),
(1475, 12, 131, 820, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Rajanmehata098', NULL, 1, 3),
(1476, 12, 131, 771, 1000, 0, 0, 0, '1714683216', NULL, '62', 'miherasolanki', NULL, 1, 3),
(1477, 12, 131, 816, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Rajbhuiya075', NULL, 1, 3),
(1478, 12, 131, 723, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Zehaankhan', NULL, 1, 3),
(1479, 12, 131, 831, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Varunmishra0329', NULL, 1, 3),
(1480, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Tejmehta505', NULL, 1, 3),
(1481, 12, 131, 728, 1000, 0, 0, 0, '1714683216', NULL, '30', 'Tejaskapor', NULL, 1, 3),
(1482, 12, 131, 827, 1000, 0, 0, 0, '1714683216', NULL, '27', 'Puravsingh036', NULL, 1, 3),
(1483, 12, 131, 692, 1000, 0, 0, 0, '1714683216', NULL, '38', 'Tejmehta505', NULL, 1, 3),
(1484, 12, 131, 753, 1000, 0, 0, 0, '1714683216', NULL, '86', 'jiganeshkumar', NULL, 1, 3),
(1485, 12, 131, 755, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Amansharma6767', NULL, 1, 3),
(1486, 12, 131, 818, 1000, 0, 0, 0, '1714683216', NULL, '65', 'Kubardas083', NULL, 1, 3),
(1487, 12, 131, 757, 1000, 0, 0, 0, '1714683216', NULL, '62', 'Bhargava', NULL, 1, 3),
(1488, 12, 131, 760, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Keyuranjirval', NULL, 1, 3),
(1489, 12, 131, 810, 1000, 0, 0, 0, '1714683216', NULL, '21', 'Parthkishi052', NULL, 1, 3),
(1490, 12, 131, 733, 1000, 0, 0, 0, '1714683216', NULL, '12', 'Rushil', NULL, 1, 3),
(1491, 12, 131, 766, 1000, 0, 0, 0, '1714683216', NULL, '73', 'mahulkoli', NULL, 1, 3),
(1492, 12, 131, 756, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Aryanbhai', NULL, 1, 3),
(1493, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '20', 'Prashadmandal016', NULL, 1, 3),
(1494, 12, 131, 798, 1000, 0, 0, 0, '1714683216', NULL, '28', 'Savejitadas', NULL, 1, 3),
(1495, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '37', 'Khaljitasingh786', NULL, 1, 3),
(1496, 12, 131, 682, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Dhruvkhatri ', NULL, 1, 3),
(1497, 12, 131, 776, 1000, 0, 0, 0, '1714683216', NULL, '29', 'sankatpanditr', NULL, 1, 3),
(1498, 12, 131, 796, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Prashadmandal016', NULL, 1, 3),
(1499, 12, 131, 738, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Umarkhan', NULL, 1, 3),
(1500, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '69', 'Ikbalkhan', NULL, 1, 3),
(1501, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '72', 'rizavan', NULL, 1, 3),
(1502, 12, 131, 749, 1000, 0, 0, 0, '1714683216', NULL, '29', 'Ankit', NULL, 1, 3),
(1503, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Vishalgupta0326', NULL, 1, 3),
(1504, 12, 131, 682, 1000, 0, 0, 0, '1714683216', NULL, '95', 'Dhruvkhatri ', NULL, 1, 3),
(1505, 12, 131, 687, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Sananaidhu', NULL, 1, 3),
(1506, 12, 131, 816, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Rajbhuiya075', NULL, 1, 3),
(1507, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '38', 'Mananranjan058', NULL, 1, 3),
(1508, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '56', 'Ikbalkhan', NULL, 1, 3),
(1509, 12, 131, 788, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Mahirakhatun7171', NULL, 1, 3),
(1510, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '96', 'Sethaditi753', NULL, 1, 3),
(1511, 12, 131, 814, 1000, 0, 0, 0, '1714683216', NULL, '54', 'Pratikakamat064', NULL, 1, 3),
(1512, 12, 131, 728, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Tejaskapor', NULL, 1, 3),
(1513, 12, 131, 769, 1000, 0, 0, 0, '1714683216', NULL, '60', 'nikunjshah', NULL, 1, 3),
(1514, 12, 131, 697, 1000, 0, 0, 0, '1714683216', NULL, '87', 'Aakeshgupta', NULL, 1, 3),
(1515, 12, 131, 794, 1000, 0, 0, 0, '1714683216', NULL, '68', 'Haripaswan055', NULL, 1, 3),
(1516, 12, 131, 710, 1000, 0, 0, 0, '1714683216', NULL, '36', 'Harshilpaneliya', NULL, 1, 3),
(1517, 12, 131, 735, 1000, 0, 0, 0, '1714683216', NULL, '16', 'Nimitpatel', NULL, 1, 3),
(1518, 12, 131, 737, 1000, 0, 0, 0, '1714683216', NULL, '71', 'rajchopada', NULL, 1, 3),
(1519, 12, 131, 760, 1000, 0, 0, 0, '1714683216', NULL, '12', 'Keyuranjirval', NULL, 1, 3),
(1520, 12, 131, 818, 1000, 0, 0, 0, '1714683216', NULL, '79', 'Kubardas083', NULL, 1, 3),
(1521, 12, 131, 764, 1000, 0, 0, 0, '1714683216', NULL, '89', 'katn', NULL, 1, 3),
(1522, 12, 131, 704, 1000, 0, 0, 0, '1714683216', NULL, '97', 'Dakshchawla66', NULL, 1, 3),
(1523, 12, 131, 782, 1000, 0, 0, 0, '1714683216', NULL, '99', 'roshnikumari', NULL, 1, 3),
(1524, 12, 131, 768, 1000, 0, 0, 0, '1714683216', NULL, '13', 'narshirathaliya', NULL, 1, 3),
(1525, 12, 131, 734, 1000, 0, 0, 0, '1714683216', NULL, '25', 'Omkaarsingh', NULL, 1, 3),
(1526, 12, 131, 773, 1000, 0, 0, 0, '1714683216', NULL, '93', 'ramesh8558', NULL, 1, 3),
(1527, 12, 131, 827, 1000, 0, 0, 0, '1714683216', NULL, '51', 'Puravsingh036', NULL, 1, 3),
(1528, 12, 131, 740, 1000, 0, 0, 0, '1714683216', NULL, '44', 'rizavan', NULL, 1, 3),
(1529, 12, 131, 686, 1000, 0, 0, 0, '1714683216', NULL, '18', 'Diyaseth 25', NULL, 1, 3),
(1530, 12, 131, 707, 1000, 0, 0, 0, '1714683216', NULL, '63', 'Gupatpratham', NULL, 1, 3),
(1531, 12, 131, 825, 1000, 0, 0, 0, '1714683216', NULL, '55', 'Rahulvishwas028', NULL, 1, 3),
(1532, 12, 131, 762, 1000, 0, 0, 0, '1714683216', NULL, '30', 'hitash', NULL, 1, 3),
(1533, 12, 131, 811, 1000, 0, 0, 0, '1714683216', NULL, '83', 'Mananranjan058', NULL, 1, 3),
(1534, 12, 131, 701, 1000, 0, 0, 0, '1714683216', NULL, '13', 'Purnitjha', NULL, 1, 3),
(1535, 12, 131, 798, 1000, 0, 0, 0, '1714683216', NULL, '58', 'Savejitadas', NULL, 1, 3),
(1536, 12, 131, 785, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Khaljitasingh786', NULL, 1, 3),
(1537, 12, 131, 691, 1000, 0, 0, 0, '1714683216', NULL, '47', 'Kabirshah007', NULL, 1, 3),
(1538, 12, 131, 789, 1000, 0, 0, 0, '1714683216', NULL, '10', 'Mahaveershing88', NULL, 1, 3),
(1539, 12, 131, 762, 1000, 0, 0, 0, '1714683216', NULL, '83', 'hitash', NULL, 1, 3),
(1540, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '97', 'Raviroy047', NULL, 1, 3),
(1541, 12, 131, 799, 1000, 0, 0, 0, '1714683216', NULL, '87', 'Roopeshmahta014', NULL, 1, 3),
(1542, 12, 131, 786, 1000, 0, 0, 0, '1714683216', NULL, '48', 'smitlathiya5959', NULL, 1, 3),
(1543, 12, 131, 681, 1000, 0, 0, 0, '1714683216', NULL, '81', 'agarwalnidhi003', NULL, 1, 3),
(1544, 12, 131, 815, 1000, 0, 0, 0, '1714683216', NULL, '89', 'Davemochi068', NULL, 1, 3),
(1545, 12, 131, 715, 1000, 0, 0, 0, '1714683216', NULL, '67', 'Krishbatta', NULL, 1, 3),
(1546, 12, 131, 767, 1000, 0, 0, 0, '1714683216', NULL, '29', 'miteshbhai', NULL, 1, 3),
(1547, 12, 131, 743, 1000, 0, 0, 0, '1714683216', NULL, '40', 'kanil', NULL, 1, 3),
(1548, 12, 131, 756, 1000, 0, 0, 0, '1714683216', NULL, '88', 'Aryanbhai', NULL, 1, 3),
(1549, 12, 131, 708, 1000, 0, 0, 0, '1714683216', NULL, '15', 'Farajkhan', NULL, 1, 3),
(1550, 12, 131, 710, 1000, 0, 0, 0, '1714683216', NULL, '67', 'Harshilpaneliya', NULL, 1, 3),
(1551, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '76', 'Sethaditi753', NULL, 1, 3),
(1552, 12, 131, 829, 1000, 0, 0, 0, '1714683216', NULL, '35', 'Vishalgupta0326', NULL, 1, 3),
(1553, 12, 131, 760, 1000, 0, 0, 0, '1714683216', NULL, '67', 'Keyuranjirval', NULL, 1, 3),
(1554, 12, 131, 820, 1000, 0, 0, 0, '1714683216', NULL, '45', 'Rajanmehata098', NULL, 1, 3),
(1555, 12, 131, 716, 1000, 0, 0, 0, '1714683216', NULL, '23', 'Milankohli888', NULL, 1, 3),
(1556, 12, 131, 688, 1000, 0, 0, 0, '1714683216', NULL, '24', 'Sethaditi753', NULL, 1, 3),
(1557, 12, 131, 828, 1000, 0, 0, 0, '1714683216', NULL, '80', 'Sameerkhan306', NULL, 1, 3),
(1558, 12, 131, 718, 1000, 0, 0, 0, '1714683216', NULL, '94', 'Ommangal', NULL, 1, 3),
(1559, 12, 131, 683, 1000, 0, 0, 0, '1714683216', NULL, '59', 'Ishaanahuja', NULL, 1, 3),
(1560, 12, 131, 779, 1000, 0, 0, 0, '1714683216', NULL, '90', 'udairathod', NULL, 1, 3),
(1561, 12, 131, 809, 1000, 0, 0, 0, '1714683216', NULL, '71', 'Raviroy047', NULL, 1, 3),
(1562, 12, 131, 703, 1000, 0, 0, 0, '1714683216', NULL, '60', 'Chandresh', NULL, 1, 3),
(1563, 12, 131, 832, 1000, 0, 0, 0, '1714683216', NULL, '72', 'Yogeshkaurav0332', NULL, 1, 3),
(1564, 12, 131, 749, 1000, 0, 0, 0, '1714683216', NULL, '11', 'Ankit', NULL, 1, 3),
(1565, 12, 131, 801, 1000, 0, 0, 0, '1714683216', NULL, '90', 'Jegarpandit028', NULL, 1, 3),
(1566, 12, 131, 696, 1000, 0, 0, 0, '1714683216', NULL, '13', 'Virajdas', NULL, 1, 3),
(1567, 12, 131, 712, 1000, 0, 0, 0, '1714683216', NULL, '13', 'Ikbalkhan', NULL, 1, 3),
(1568, 12, 131, 683, 1000, 0, 0, 0, '1714683216', NULL, '92', 'Ishaanahuja', NULL, 1, 3),
(1569, 12, 131, 734, 1000, 0, 0, 0, '1714683216', NULL, '56', 'Omkaarsingh', NULL, 1, 3),
(1570, 12, 131, 689, 1000, 0, 0, 0, '1714683216', NULL, '66', 'Ajaypatel4674', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privacy_policy`
--

CREATE TABLE `tbl_privacy_policy` (
  `id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `add_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modify_by` int(11) NOT NULL,
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_privacy_policy`
--

INSERT INTO `tbl_privacy_policy` (`id`, `content`, `add_by`, `date_created`, `modify_by`, `date_modify`) VALUES
(1, '<h2>Privacy Policy</h2>\r\n\r\n<p>Our Privacy Policy helps explain how we process information. For example, we talk about the information we collect and how it affects you. It also describes the steps you take to protect your privacy, such as storing the information in a hashed format. When we say we are talking about megalotto. This Privacy Policy (&ldquo;Privacy Policy&rdquo;) applies to all of our applications, services, and features&nbsp;unless otherwise stated.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Information We Collect:-</h2>\r\n\r\n<p>Lotto People receives or collects information when we operate and provide our Services, including when you install, access, or use our Services.</p>\r\n\r\n<p><strong>Account Information:-</strong> You create a Megalotto account by providing your mobile phone number and email address. You can also add other information to your accounts, such as your profile name, profile picture, and date of birth.</p>\r\n\r\n<p><strong>Bank Information:-</strong> Provide your bank account information to create a Lotto People wallet. With the help of which payments are made. After the information is collected, the entered information is checked and converted into an unreadable hash format. We respect your privacy.</p>\r\n\r\n<p><strong>Transaction Information:-</strong> When you pay for our services, we may receive information and confirmation, such as payment receipts, from third parties processing your payment.</p>\r\n\r\n<p><strong>Device Information:-</strong> We collect device-specific information when you install, access, or use our Services. This includes information such as hardware model, operating system information, browser information, IP address, mobile network information including phone number and device IDs.&nbsp;</p>\r\n\r\n<p><strong>Usage and Log Information:-</strong> We collect information about services, diagnostics, and performance. This includes information about your business (such as how you use our service, how you interact with others using our service, and the like), log files and logs, and reports of diagnostics, crashes, website, and performance.&nbsp;</p>\r\n\r\n<p><strong>Third-Party Information:-</strong> We work with third-party vendors to help us operate, provide, improve, understand, customize, support, and market our Services. For example, we partner with companies to distribute our applications, provide our infrastructure, delivery systems, and more, process payments, help us understand how people use our services, and market our services. These providers may provide us with information about you in certain circumstances; for example, outage analysis can provide us with reports to help us diagnose and resolve service issues. We allow you to use our Service in connection with third-party services. If you use our Service with such third-party services, we may receive information about you from them. Please note that when using third-party services, its terms and privacy policies govern your use of these services. For example, if you use the payment service integrated with our Service, they will receive information about what you share with them. If you interact with a third party service-connected through our Service, you may provide information directly to that third party. Please note that when you use third-party services, their terms and privacy policies will govern your use of those services.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>How to</strong> use <strong>information:-</strong></h2>\r\n\r\n<p>We use any information that helps us operate, provide, improve, understand, customize, maintain and promote our Services. &nbsp;</p>\r\n\r\n<p><strong>Our Service:-</strong> We operate and provide our service, including providing customer support and improving, correcting, and customizing our service. We understand how people use our service, and we analyze and use the information we have to evaluate and improve our service, research, develop and test new features, and conduct troubleshooting activities. We also use your information to respond to you when you contact us.&nbsp;</p>\r\n\r\n<p><strong>Security and Protection:-</strong> We review and secure accounts and activity on and off our Services, including investigating suspicious activity or violations of our Terms.</p>\r\n\r\n<p><strong>No Third-Party Banner Ads:-</strong> Third-party banner ads are not permitted on Megalotto. We do not intend to present them.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Information You <strong>And</strong> We Share:-</h2>\r\n\r\n<p>We share your information when you use our Service and we share your information to help us operate, provide, improve, understand, personalize, support, and market our Service.&nbsp;</p>\r\n\r\n<p><strong>Account information:- </strong>your phone number, email, and photo. Your photo is accessible to anyone using our Service.&nbsp;</p>\r\n\r\n<p><strong>Bank Information:-</strong> Bank account information, PAN information, Internet banking, UPI, and other payment wallet information if desired.&nbsp;</p>\r\n\r\n<p><strong>Third-Party Services:-</strong> When you use third-party services that are integrated with our services, those services may receive information about the information you share. For example, if you use a payment service that is integrated with our service, we will receive information about the information you share. When you interact with third-party services that are linked through our Services, you may provide information directly to those third parties. When you use a third-party service, your use of that service is governed by the terms and conditions and privacy policy of that service.</p>\r\n', 0, '2019-07-16 00:00:00', 6, '2022-01-04 20:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_push_notification`
--

CREATE TABLE `tbl_push_notification` (
  `id` int(11) NOT NULL,
  `appid` longtext NOT NULL,
  `auth_key` longtext NOT NULL,
  `add_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modify_by` int(11) NOT NULL,
  `date_modify` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_push_notification`
--

INSERT INTO `tbl_push_notification` (`id`, `appid`, `auth_key`, `add_by`, `date_created`, `modify_by`, `date_modify`) VALUES
(1, 'xxxxxxxxx-xxxxxxxxxxx-xxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 6, '2023-09-10 00:00:00', 0, '2023-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referred`
--

CREATE TABLE `tbl_referred` (
  `id` int(255) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `referer` varchar(20) DEFAULT NULL,
  `coins` int(11) UNSIGNED DEFAULT 0,
  `status` enum('0','1') DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_issue`
--

CREATE TABLE `tbl_report_issue` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `report` varchar(1000) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 for unresolve, 1 for resolve',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `request_name` varchar(255) DEFAULT NULL,
  `req_from` varchar(255) DEFAULT NULL,
  `req_amount` varchar(255) DEFAULT NULL,
  `getway_name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `is_withdraw` enum('0','1') NOT NULL DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `ifsc_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `user_id`, `order_id`, `payment_id`, `request_name`, `req_from`, `req_amount`, `getway_name`, `remark`, `type`, `status`, `date`, `is_withdraw`, `mobile`, `ifsc_code`) VALUES
(1, '646', '1714338441646', NULL, 'fdsfd', 'dsfdf', '120', 'upi', 'Withdraw Requested', 0, 0, '1714338441', '1', NULL, 'testIfsc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `user_profile` varchar(1000) DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `country_code` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `dob` varchar(40) DEFAULT NULL,
  `user_type` text DEFAULT NULL,
  `cur_balance` int(10) DEFAULT 0,
  `won_balance` int(10) DEFAULT 0,
  `bonus_balance` int(11) NOT NULL DEFAULT 0,
  `refer` text DEFAULT NULL,
  `referer` text DEFAULT NULL,
  `refered` int(11) DEFAULT 0,
  `device_id` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `is_block` varchar(255) NOT NULL DEFAULT '0',
  `forgot_pass_identity` longtext DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `created_date` text DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `acc_name` varchar(100) DEFAULT NULL,
  `acc_no` varchar(20) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `proof_copy` varchar(500) DEFAULT NULL,
  `acc_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 for inactive, 1 for active',
  `is_dummy` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=dummy',
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fname`, `lname`, `user_profile`, `username`, `password`, `email`, `country_code`, `mobile`, `gender`, `dob`, `user_type`, `cur_balance`, `won_balance`, `bonus_balance`, `refer`, `referer`, `refered`, `device_id`, `status`, `is_block`, `forgot_pass_identity`, `modified_date`, `created_date`, `fcm_token`, `acc_name`, `acc_no`, `ifsc_code`, `pan_no`, `proof_copy`, `acc_status`, `is_dummy`, `name`) VALUES
(646, NULL, NULL, 'upload/avatar/646.jpg', 'meghalotto', '25d55ad283aa400af464c76d713c07ad', 'meghalotto@gmail.com', '+91', '9876543210', 'Male', '01/01/2001', NULL, 1000000, 99880, 500, 'meghalotto', NULL, 2, 'f99dvsgdfgdfvdrt54', '1', '0', NULL, NULL, '2021-12-19 03:13:22', NULL, 'Test Account Name', '1234567890987654321', 'ASFH000123', 'BXEPP1234A', 'upload/proof/646.jpg', '1', 0, 'meghalotto'),
(653, NULL, NULL, 'upload/avatar/653.jpg', 'demouser', '25d55ad283aa400af464c76d713c07ad', 'demouser@gmail.com', '+91', '0123456789', 'Male', '01/01/1992', NULL, 0, 0, 0, 'demouser', 'testuser1', 0, 'f990500asdgre53464', '1', '0', NULL, NULL, '2021-12-22 04:43:05', NULL, 'xx', '888', 'ddf', 'fgv', 'upload/proof/653.jpg', '1', 0, 'demouser1'),
(681, 'Nidhi', 'Agarwal', NULL, 'agarwalnidhi003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(682, 'Dhruv', 'Khatri', NULL, 'Dhruvkhatri ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(683, 'Ahuja', 'Ishaan', NULL, 'Ishaanahuja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(684, 'Pandey', 'sharma', NULL, 'Pandya1507', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(685, 'Amar', 'Singh', NULL, 'Amarsingh03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(686, 'Diya', 'Seth', NULL, 'Diyaseth 25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(687, 'Sana', 'Naidu', NULL, 'Sananaidhu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(688, 'Aditi', 'Seth', NULL, 'Sethaditi753', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(689, 'Ajay', 'patel', NULL, 'Ajaypatel4674', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(690, 'Mihir', 'Thakur', NULL, 'Mihirthakur207', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(691, 'Kabir', 'Shah', NULL, 'Kabirshah007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(692, 'Tej', ' Mehta', NULL, 'Tejmehta505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(694, 'Deva', 'Dayal', NULL, 'Davedayal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(695, 'Yash', 'Chandra', NULL, 'Yashchandra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(696, 'Viraj', 'Das', NULL, 'Virajdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(697, 'Aakesh', 'Gupta', NULL, 'Aakeshgupta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(698, 'Ishaan', 'Ghosh', NULL, 'Ishaanghosh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(699, 'Vedant', 'Jain', NULL, 'Vedantjain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(700, 'Harsith', 'Joshi', NULL, 'Harsithjoshi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(701, 'Purnit', 'Jha', NULL, 'Purnitjha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(702, 'Ayush', 'Lal', NULL, 'Ayushlal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(703, 'Chandresh', 'Datta', NULL, 'Chandresh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(704, 'Daksh', 'Chawla', NULL, 'Dakshchawla66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(705, 'Babu', 'raval', NULL, 'baburaval', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(706, 'sagar', 'gandhi', NULL, 'sagargandhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(707, 'pratham', 'gupta', NULL, 'Gupatpratham', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(708, 'Faraj', 'khan', NULL, 'Farajkhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(709, 'Harsh', 'ladumor', NULL, 'Harshladumor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1600, 1600, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(710, 'Harshil', 'paneliya', NULL, 'Harshilpaneliya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(711, 'Hitesh', 'Arya', NULL, 'Aryahitesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(712, 'Ikbal', 'khan', NULL, 'Ikbalkhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(713, 'Jai', 'Balan', NULL, 'Jaibalan333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(714, 'Jatin', 'Basu', NULL, 'Basujatin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(715, 'Krish', 'Batta', NULL, 'Krishbatta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(716, 'Milan', 'Kohli', NULL, 'Milankohli888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(717, 'Nakul', 'kunt', NULL, 'kuntnakul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(718, 'Om', 'Mangal', NULL, 'Ommangal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(719, 'Panth', 'hirpara', NULL, 'hirparapanth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(720, 'Ronith', 'joshi', NULL, 'Ronithjoshi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(721, 'karan', 'khan', NULL, 'karankhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(723, '', '', NULL, 'Zehaankhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(724, 'prity', '', NULL, 'prity4041', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(725, '', '', NULL, 'Yugsharmna1010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(726, '', '', NULL, 'Yagnesh99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(727, '', '', NULL, 'Veerkumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(728, '', '', NULL, 'Tejaskapor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(729, '', '', NULL, 'Tanish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(730, '', '', NULL, 'Samarth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(731, '', '', NULL, 'Sahiljinjala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(732, '', '', NULL, 'savan100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 400, 400, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(733, '', '', NULL, 'Rushil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(734, '', '', NULL, 'Omkaarsingh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(735, '', '', NULL, 'Nimitpatel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(736, '', '', NULL, ' Amulya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(737, '', '', NULL, 'rajchopada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(738, '', '', NULL, 'Umarkhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(739, '', '', NULL, 'aksharmahata111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(740, '', '', NULL, 'rizavan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(741, '', '', NULL, 'vipul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(742, '', '', NULL, 'nitin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(743, '', '', NULL, 'kanil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(744, '', '', NULL, 'rohitajoshi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(745, '', '', NULL, 'nilesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(746, '', '', NULL, 'dharmik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(747, '', '', NULL, 'hiran455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(748, '', '', NULL, 'deepak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(749, '', '', NULL, 'Ankit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(750, '', '', NULL, 'bhavesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(751, '', '', NULL, 'Pranjalgupta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(752, '', '', NULL, 'hirandolakiya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(753, '', '', NULL, 'jiganeshkumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(754, '', '', NULL, 'jitukanpara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(755, '', '', NULL, 'Amansharma6767', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(756, '', '', NULL, 'Aryanbhai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(757, '', '', NULL, 'Bhargava', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(758, '', '', NULL, 'Brinkal0009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(759, '', '', NULL, 'dashanpanvala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(760, '', '', NULL, 'Keyuranjirval', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(761, '', '', NULL, 'Dharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(762, '', '', NULL, 'hitash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(763, '', '', NULL, 'kalpeshsorathiya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(764, '', '', NULL, 'katn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(765, '', '', NULL, 'mahesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(766, '', '', NULL, 'mahulkoli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(767, '', '', NULL, 'miteshbhai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(768, '', '', NULL, 'narshirathaliya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(769, '', '', NULL, 'nikunjshah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(770, '', '', NULL, 'ashishmhata', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(771, '', '', NULL, 'miherasolanki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(772, '', '', NULL, 'rakesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(773, '', '', NULL, 'ramesh8558', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(774, '', '', NULL, 'Ravisolanki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(775, '', '', NULL, 'rajukumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(776, '', '', NULL, 'sankatpanditr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(777, '', '', NULL, 'smitmakavana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(778, '', '', NULL, 'tejash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(779, '', '', NULL, 'udairathod', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(780, '', '', NULL, 'uttampaneliya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(781, '', '', NULL, 'vrushantkakalotar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(782, '', '', NULL, 'roshnikumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(783, 'Nihar', 'Devi', NULL, 'Nihardevi303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(784, 'Rajan', 'Kumar', NULL, 'Rajankumar577', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(785, '', 'Singh', NULL, 'Khaljitasingh786', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(786, 'smit', 'lathiya', NULL, 'smitlathiya5959', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(787, 'Hardeep', 'Yadav', NULL, 'Hardeepyadav444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(788, 'Mahira', 'Khatun', NULL, 'Mahirakhatun7171', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(789, 'Mahaveer', 'Singh', NULL, 'Mahaveershing88', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(790, 'Prince', 'Dharuka', NULL, 'Princedharuka11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(791, 'kavashul', 'Kumari', NULL, 'kavashulkumari560', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(792, 'Mahesh', 'Sah', NULL, 'Maheshsah4466', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(793, 'Babu', 'Ram', NULL, 'Baburam9696', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(794, 'Hari', 'Paswan', NULL, 'Haripaswan055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(795, 'Shreeram', 'Prasad', NULL, 'Shreeramprasad009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(796, 'Prashad', 'Mandal', NULL, 'Prashadmandal016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(797, 'Mamgal', 'Khatoon', NULL, 'Mangalkhatoon014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(798, 'Savejita', 'Das', NULL, 'Savejitadas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(799, 'Roopesh', 'Mahto', NULL, 'Roopeshmahta014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(800, 'Chandu', 'Alam', NULL, 'Chandualam02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(801, 'Jegar', 'Pandit', NULL, 'Jegarpandit028', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(802, 'Ajau', 'Sahani', NULL, 'Ajausahani031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(803, 'Deep', 'Sinha', NULL, 'Deepsinha034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(804, 'Fenil', 'Bhagat', NULL, 'Fenilbhagat037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(805, 'Rahim', 'Ali', NULL, 'Rahimali039', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(806, 'Kabir', 'Sada', NULL, 'Kibarsada043', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(807, 'Pravin', 'Tiwari', NULL, 'Pravintiwari046', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(808, 'Ahamad', 'Mistri', NULL, 'Ahamadmistri049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(809, 'Ravi', 'Roy', NULL, 'Raviroy047', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(810, 'Parth', 'Rishi', NULL, 'Parthkishi052', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(811, 'Manan', 'Ranjan', NULL, 'Mananranjan058', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(812, 'Rushi', 'Giri', NULL, 'Rushigiri056', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(813, 'Zeel', 'Varma', NULL, 'Zeelvarma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(814, 'Pratika', 'Kamat', NULL, 'Pratikakamat064', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(815, 'Dave', 'Mochi', NULL, 'Davemochi068', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(816, 'Raj', 'Bhuiya', NULL, 'Rajbhuiya075', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(817, 'Urvan', 'Bharati', NULL, 'Urvanbharati079', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(818, 'Kubar', 'Das', NULL, 'Kubardas083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(819, 'Laksh', 'Bandari', NULL, 'Lakshbandari087', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(820, 'Rajan', 'Mehta', NULL, 'Rajanmehata098', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(821, 'Aarav', 'singh', NULL, 'Aaravsingh107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(822, 'Aakesh', 'mandapara', NULL, 'Aakeshmandapara109', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(823, 'Ekansh', 'mojidara', NULL, 'Ekanshmojidara122', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(824, 'Pranjal', 'Kamati', NULL, 'Pranjalkamati126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(825, 'Rahul', 'Vishwas', NULL, 'Rahulvishwas028', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(826, 'Ritvik', 'Kevat', NULL, 'RitvikKevat034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(827, 'Purav', 'singh', NULL, 'Puravsingh036', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(828, 'sameer', 'Khan', NULL, 'Sameerkhan306', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(829, 'vishal', 'gupta', NULL, 'Vishalgupta0326', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(830, 'Laksh', 'jadhav', NULL, 'Lakshjadhav318', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(831, 'varun', 'mishra', NULL, 'Varunmishra0329', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(832, 'yogesh', 'kaurav', NULL, 'Yogeshkaurav0332', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 800, 800, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(833, 'Amit', 'arora', NULL, 'Amitarora336', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(834, 'yash', 'shah', NULL, 'Yashshah337', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(835, 'Ronit', 'sharma', NULL, 'Ronitsharma341', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(836, 'asim', 'khan', NULL, 'Asimkham346', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(837, 'Dilip', 'Shukla', NULL, 'Dilipshukla347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(838, 'Nikhil', 'saru', NULL, 'Nikhilsaru349', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL),
(839, NULL, NULL, NULL, 'himanshuviyogi1', '25d55ad283aa400af464c76d713c07ad', 'himanshuviyogi1@gmail.com', '+91', '9304720546', NULL, NULL, NULL, 0, 0, 0, 'himanshuviyogi1', NULL, 0, '8d7ca1e276b81bd1', '1', '0', NULL, NULL, '2024-04-12 09:48:29', 'egrom0w0R3Sxu8j7P3CfJW:APA91bEwTPzF3LPEuRp__MiLdKN4gs-4Y1JiD5OvoYU3hiUE5_uCZOA0ehXwBrwe99nKZbIyYLZUmXFZdLXJz61gQ-IoELPrx56CELHzurgcROQYMODUnM9XU94CSYe2wjU5WugPFzHS', NULL, NULL, NULL, NULL, NULL, '1', 0, 'himanshuviyogi1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_master`
--

CREATE TABLE `tbl_user_master` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `forgot_pass_identity` longtext DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `user_designation` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `alt_phone` varchar(30) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `profile_pic` longtext DEFAULT NULL,
  `verification_code` longtext NOT NULL,
  `account_status` enum('0','1') DEFAULT NULL COMMENT '1=active',
  `is_verify` enum('0','1') DEFAULT NULL COMMENT '1=verify',
  `del` enum('0','1') NOT NULL COMMENT '1=delete',
  `added_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `date_modify` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `del_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user_master`
--

INSERT INTO `tbl_user_master` (`user_id`, `fname`, `lname`, `uname`, `password`, `forgot_pass_identity`, `email`, `user_designation`, `user_role`, `dob`, `phone`, `alt_phone`, `address`, `city`, `state`, `country`, `profile_pic`, `verification_code`, `account_status`, `is_verify`, `del`, `added_by`, `date_created`, `modify_by`, `date_modify`, `last_login`, `del_by`) VALUES
(6, 'Numolo', 'Raja', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '9b57c92e538d4313e4f6508e7bae3e61', 'info@numolo.in', 'Manager', 'admin', NULL, '9051711093', '', 'Noida', 'Noida', 'UP', 'India', 'media/623471c278e188.63352678.megalotto-icon-removebg-preview.png', 'zJfpCX9lHIqsnFPI', '1', '1', '0', 0, '2021-04-01 06:01:42', 6, '2024-04-11 15:39:59', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees_master`
--
ALTER TABLE `fees_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price` (`price`),
  ADD KEY `pkg_frgn_key` (`pkg_id`);

--
-- Indexes for table `payout_master`
--
ALTER TABLE `payout_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prizepool_master`
--
ALTER TABLE `prizepool_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_frgn_key` (`fees_id`);

--
-- Indexes for table `rewarded_details`
--
ALTER TABLE `rewarded_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_app_details`
--
ALTER TABLE `tbl_app_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_configuration`
--
ALTER TABLE `tbl_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_contest`
--
ALTER TABLE `tbl_contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offline_plyments`
--
ALTER TABLE `tbl_offline_plyments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_privacy_policy`
--
ALTER TABLE `tbl_privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_push_notification`
--
ALTER TABLE `tbl_push_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_referred`
--
ALTER TABLE `tbl_referred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_report_issue`
--
ALTER TABLE `tbl_report_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_master`
--
ALTER TABLE `fees_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `payout_master`
--
ALTER TABLE `payout_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prizepool_master`
--
ALTER TABLE `prizepool_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `rewarded_details`
--
ALTER TABLE `rewarded_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_app_details`
--
ALTER TABLE `tbl_app_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_configuration`
--
ALTER TABLE `tbl_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contest`
--
ALTER TABLE `tbl_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_offline_plyments`
--
ALTER TABLE `tbl_offline_plyments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1571;

--
-- AUTO_INCREMENT for table `tbl_privacy_policy`
--
ALTER TABLE `tbl_privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_push_notification`
--
ALTER TABLE `tbl_push_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_referred`
--
ALTER TABLE `tbl_referred`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_report_issue`
--
ALTER TABLE `tbl_report_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=840;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fees_master`
--
ALTER TABLE `fees_master`
  ADD CONSTRAINT `pkg_frgn_key` FOREIGN KEY (`pkg_id`) REFERENCES `tbl_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prizepool_master`
--
ALTER TABLE `prizepool_master`
  ADD CONSTRAINT `fees_frgn_key` FOREIGN KEY (`fees_id`) REFERENCES `fees_master` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
