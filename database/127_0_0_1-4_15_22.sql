-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 09:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rosecom_db`
--
CREATE DATABASE IF NOT EXISTS `rosecom_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rosecom_db`;

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE `backup` (
  `backup_id` int(11) NOT NULL,
  `backup_name` varchar(45) NOT NULL,
  `backup_date` datetime NOT NULL,
  `backup_location` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_description` varchar(120) NOT NULL,
  `brand_image` varchar(50) NOT NULL,
  `brand_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_description`, `brand_image`, `brand_status`) VALUES
(60, 'Sony', 'Sony Electronics is a leading provider of audio/video electronics and information technology product.', '1643803186_sony.png', 1),
(61, 'Apple', 'Discover the innovative world of Apple.', '1643792815_apple.png', 1),
(62, 'Xiaomi', 'A global company producing quality products at honest pricing.', '1643792900_xiaomi.png', 1),
(63, 'Huawei', 'Huawei is a leading global provider of information and communications technology (ICT) infrastructure.', '1643793053_hauwei.png', 1),
(64, 'Sonyf', 'dsfsdfdsfdsfds\r\n\r\n\r\n\r\n\r\n', 'logo2.png', 1),
(65, 'Sonydfsf', 'dsfdsfsdf\r\n', 'logo2.png', 0),
(66, 'sdfsdf', 'sdfdsfdsfdsf', 'logo2.png', 0),
(67, 'sdfsdfrwe', 'dsfdsfds', 'logo2.png', 0),
(68, 'fgdfg', 'ertertret', 'logo2.png', 0),
(69, 'retert', 'ertertret', 'logo2.png', 0),
(70, 'drgfgd', 'gdfgdfgfd', 'logo2.png', 0),
(71, 'dsfdsf', 'sdfsdfsdfsd', 'logo2.png', 0),
(72, 'ewrwe', 'rwerwer', 'logo2.png', 0),
(73, 'gdfgdf', 'gdfgfd', 'logo2.png', 0),
(74, 'dsfsdfsd', 'fdsfsdfdsf', 'logo2.png', 0),
(75, 'dfgdfg', 'dfgdfg', 'logo2.png', 0),
(76, 'rtert', 'etretre', 'logo2.png', 0),
(77, 'retretre', 'retret', 'logo2.png', 0),
(78, 'erwerwe', 'rwerwer', 'logo2.png', 0),
(79, 'werwe', 'rwerwer', 'logo2.png', 0),
(80, 'werwer', 'werwer', 'logo2.png', 0),
(81, 'rtyrty', 'rtyrtyrty', 'logo2.png', 0),
(82, 'ewrewr', 'rwerwerew', 'logo2.png', 0),
(83, 'fdgdfg', 'dfgdfg', 'logo2.png', 0),
(84, 'dfgdfgfdg', 'dfgdfg', 'logo2.png', 0),
(85, 'werewrwe', 'rwerwer', 'logo2.png', 0),
(86, 'tyutyu', 'tyutyu', 'logo2.png', 0),
(87, 'dfgdfgdf', 'gdfgdfgdfg', 'logo2.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL,
  `category_image` varchar(45) NOT NULL,
  `category_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `category_status`) VALUES
(1, 'Headphone', '1644119839_category.jpg', 1),
(2, 'Phone', '1644119848_category.jpg', 1),
(3, 'Speakers', 'category.jpg', 1),
(4, 'PowerAdapter', 'category.jpg', 1),
(5, 'Earphone', 'category.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuslogin`
--

CREATE TABLE `cuslogin` (
  `cusLogin_id` int(11) NOT NULL,
  `cusLogin_username` varchar(45) NOT NULL,
  `cusLogin_password` int(11) NOT NULL,
  `cusLogin_status` int(11) NOT NULL,
  `customer_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(45) NOT NULL,
  `customer_last_name` varchar(45) NOT NULL,
  `customer_dob` date NOT NULL,
  `customer_gender` varchar(45) NOT NULL,
  `customer_nic` varchar(45) NOT NULL,
  `customer_mobile_no` varchar(45) NOT NULL,
  `customer_landline_no` varchar(45) NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `customer_address1` int(11) NOT NULL,
  `customer_address2` int(11) NOT NULL,
  `customer_city` varchar(45) NOT NULL,
  `customer_postal_code` int(11) NOT NULL,
  `customer_profile_img` varchar(45) NOT NULL,
  `customer_reg_date` date NOT NULL,
  `customer_last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_status` tinyint(4) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `customer_customer_id` int(11) NOT NULL,
  `order_order_id` int(11) NOT NULL,
  `delivery_employee_delivery_employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_first_name` varchar(45) NOT NULL,
  `driver_last_name` varchar(45) NOT NULL,
  `driver_license` varchar(45) NOT NULL,
  `driver_vehicle_num` varchar(45) NOT NULL,
  `driver_email_address` varchar(45) NOT NULL,
  `driver_contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_first_name`, `driver_last_name`, `driver_license`, `driver_vehicle_num`, `driver_email_address`, `driver_contact`) VALUES
(1, 'Mhommadh', 'Abhim', '', '', 'gayan1@gmail.com', '0756483952');

-- --------------------------------------------------------

--
-- Table structure for table `driver_license_img`
--

CREATE TABLE `driver_license_img` (
  `driver_licnese_img_id` int(11) NOT NULL,
  `driver_licnese_img_name` varchar(45) NOT NULL,
  `driver_driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_content` varchar(1000) NOT NULL,
  `faq_cus_name` varchar(45) NOT NULL,
  `faq_cus_email` varchar(45) NOT NULL,
  `faq_date_time` datetime NOT NULL,
  `faq_time` time NOT NULL,
  `faq_status` tinyint(4) NOT NULL,
  `customer_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `feature_id` int(11) NOT NULL,
  `feature_name` varchar(80) NOT NULL,
  `feature_type_feature_type_id` int(11) NOT NULL,
  `feature_category_feature_category_id` int(11) NOT NULL,
  `feature_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`feature_id`, `feature_name`, `feature_type_feature_type_id`, `feature_category_feature_category_id`, `feature_status`) VALUES
(1, 'microSDXC (dedicated slot)', 1, 1, 0),
(2, ' 64GB 4GB RAM, 128GB 4GB RAM, 128GB 6GB RAM', 2, 1, 0),
(3, 'GSM / HSPA / LTE', 3, 2, 1),
(4, 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 4, 2, 0),
(5, 'HSDPA 850 / 900 / 1900 / 2100', 5, 2, 1),
(6, ' 1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41', 6, 2, 1),
(7, '2021, August 18', 8, 3, 1),
(8, 'Available. Released 2021, August 20', 9, 3, 1),
(9, 'microSDHC (dedicated slot)', 1, 1, 1),
(10, '32GB 3GB RAM, 64GB 4GB RAM, 128GB 4GB RAM, 128GB 6', 2, 1, 1),
(11, '32GB 3GB RAM, 64GB 4GB RAM, 128GB 4GB RAM, 128GB 6', 2, 1, 1),
(12, 'microSDHC (dedicated slot)2', 1, 1, 1),
(13, 'microSDHC (dedicated slot)4', 1, 1, 0),
(14, 'microSDXC (dedicated slot)4', 1, 1, 1),
(15, 'erwerew', 1, 1, 1),
(16, 'terter', 1, 1, 1),
(17, 'dsfdsfds', 1, 1, 1),
(18, 'ewrewrew', 2, 1, 1),
(19, 'dgfrterte', 1, 1, 1),
(20, 'fgdfgdfgdf', 1, 1, 1),
(21, 'dsfdsfsd', 1, 1, 1),
(22, 'asdasdasd', 1, 1, 1),
(23, 'dsfdsfdsf', 1, 1, 1),
(24, 'safsfasf', 1, 1, 1),
(25, 'asdasdas', 1, 1, 1),
(26, 'sdfsdfdsf', 1, 1, 1),
(27, 'dfsdfsdf', 1, 1, 1),
(28, 'fdsfdsf', 1, 1, 0),
(29, 'Yes', 46, 9, 1),
(31, 'No', 46, 9, 1),
(32, 'Yes', 45, 9, 1),
(33, 'No', 45, 9, 1),
(34, '162.3 x 77.2 x 8.9 mm (6.39 x 3.04 x 0.35 in)', 10, 4, 1),
(35, '199 g (7.02 oz)', 11, 4, 1),
(36, 'Glass front (Gorilla Glass 5), plastic frame, plastic back', 11, 4, 1),
(37, 'Glass front (Gorilla Glass 5), plastic frame, plastic back', 51, 4, 1),
(38, 'Dual SIM (Nano-SIM, dual stand-by)', 12, 4, 1),
(39, 'IPS LCD, 450 nits (typ)', 13, 5, 1),
(40, '6.53 inches, 104.7 cm2 (~83.5% screen-to-body ratio)', 14, 5, 1),
(41, '1080 x 2340 pixels, 19.5:9 ratio (~395 ppi density)', 15, 5, 1),
(42, 'Corning Gorilla Glass 5', 16, 5, 1),
(43, 'Android 10, upgradable to Android 11, MIUI 12.5 E', 17, 6, 1),
(44, 'MediaTek Helio G85 (12nm)', 18, 6, 1),
(45, 'Octa-core (2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)', 19, 6, 1),
(46, 'Mali-G52 MC2', 20, 6, 1),
(47, 'Quad', 21, 7, 1),
(48, 'Dual', 21, 7, 1),
(49, 'Single', 21, 7, 1),
(50, '48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF\r\n8 MP, f/2.2, 118˚ (ultrawide), 1', 22, 7, 1),
(51, 'LED flash, HDR, panorama', 23, 7, 1),
(52, '1080p@30fps', 24, 7, 1),
(53, 'Single', 25, 8, 1),
(54, 'Dual', 25, 8, 1),
(55, '13 MP, f/2.3, 29mm (standard), 1/3.1\", 1.12µm', 26, 8, 1),
(56, 'HDR, panorama', 27, 8, 1),
(57, '1080p@30fps', 28, 8, 1),
(58, 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', 29, 10, 1),
(59, '5.0, A2DP, LE', 30, 10, 1),
(60, 'Yes, with A-GPS, GLONASS, GALILEO, BDS', 31, 10, 1),
(61, 'Yes (market/region dependent)\r\nM2003J15SG (Yes); M2003J15SS (No)', 32, 10, 1),
(62, 'Yes', 33, 10, 1),
(63, 'No', 33, 10, 1),
(64, 'FM radio, built-in antenna', 34, 10, 1),
(65, '	USB Type-C 2.0', 35, 10, 1),
(66, 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', 36, 11, 1),
(67, 'Li-Po 5020 mAh, non-removable', 37, 12, 1),
(68, 'Fast charging 18W\r\nReverse charging 9W', 38, 12, 1),
(69, 'Contrast ratio: 1242:1 (nominal)', 41, 13, 1),
(70, 'Photo / Video', 42, 13, 1),
(71, '-30.1 LUFS (Below average)', 43, 13, 1),
(72, 'Endurance rating 125h', 44, 13, 1),
(73, 'Forest Green, Midnight Grey, Polar White', 47, 14, 1),
(74, 'M2003J15SC, M2003J15SG, M2003J15SS', 48, 14, 1),
(75, '0.84 W/kg (head)     0.90 W/kg (body)', 49, 14, 1),
(76, '0.80 W/kg (head)     1.14 W/kg (body)', 50, 14, 1),
(77, 'HSPA 42.2/5.76 Mbps, LTE-A', 64, 2, 1),
(78, 'RTERTRETERT', 4, 2, 0),
(79, 'ERTERTER', 4, 2, 1),
(80, 'dfgdfgdf', 52, 15, 1),
(81, 'dfgdgdf', 52, 15, 1),
(82, 'retertre', 52, 15, 1),
(83, 'retert', 52, 15, 1),
(84, 'dfgdfgdfgdf', 52, 15, 1),
(85, 'thtry', 52, 15, 1),
(86, 'fghfgh', 52, 15, 1),
(87, 'vnbnvb', 52, 15, 1),
(88, 'bvnvbnvnb', 52, 15, 1),
(89, 'vnbnbv', 52, 15, 1),
(90, 'dfhdfhf', 52, 15, 1),
(91, 'ertertert', 52, 15, 1),
(92, 'ertertertrete', 52, 15, 1),
(93, 'hgfhgfh', 54, 16, 1),
(94, 'ghjghjghjgh', 54, 16, 1),
(95, 'dgfsdgdf', 54, 16, 1),
(96, 'dfgdfg', 54, 16, 1),
(97, 'retertetr', 52, 15, 1),
(98, 'sdfdfsdf', 52, 15, 1),
(99, 'tewrterte', 52, 15, 1),
(100, 'fdgdgdfg', 52, 15, 1),
(101, '1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41,6,8', 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feature_category`
--

CREATE TABLE `feature_category` (
  `feature_category_id` int(11) NOT NULL,
  `feature_category_name` varchar(45) NOT NULL,
  `category_category_id` int(11) NOT NULL,
  `feature_category_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_category`
--

INSERT INTO `feature_category` (`feature_category_id`, `feature_category_name`, `category_category_id`, `feature_category_status`) VALUES
(1, 'Memory', 2, 1),
(2, 'Network', 2, 1),
(3, 'Launched', 2, 1),
(4, 'Body', 2, 1),
(5, 'Display', 2, 1),
(6, 'Platform', 2, 1),
(7, 'Main Camera', 2, 1),
(8, 'Selifie Camera', 2, 1),
(9, 'Sound', 2, 1),
(10, 'Comms', 2, 1),
(11, 'Features', 2, 1),
(12, 'Battery', 2, 1),
(13, 'Tests', 2, 1),
(14, 'Misc', 2, 1),
(15, 'Appearance', 1, 1),
(16, 'Body', 1, 1),
(17, 'Frequency', 1, 1),
(18, 'Comms', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feature_type`
--

CREATE TABLE `feature_type` (
  `feature_type_id` int(11) NOT NULL,
  `feature_type_name` varchar(45) NOT NULL,
  `feature_category_feature_category_id` int(11) NOT NULL,
  `feature_type_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_type`
--

INSERT INTO `feature_type` (`feature_type_id`, `feature_type_name`, `feature_category_feature_category_id`, `feature_type_status`) VALUES
(1, 'Card Slot', 1, 1),
(2, 'Internal', 1, 1),
(3, 'Technology', 2, 1),
(4, '2G Bands', 2, 1),
(5, '3G Bands', 2, 1),
(6, '4G Bands', 2, 1),
(7, '5G Bands', 2, 1),
(8, 'Announced', 3, 1),
(9, 'Status', 3, 1),
(10, 'Dimension', 4, 1),
(11, 'Weight', 4, 1),
(12, 'SIM', 4, 1),
(13, 'Type', 5, 1),
(14, 'Size', 5, 1),
(15, 'Resolution', 5, 1),
(16, 'Protection', 5, 1),
(17, 'OS', 6, 1),
(18, 'Chipset', 6, 1),
(19, 'CPU', 6, 1),
(20, 'GPU', 6, 1),
(21, 'Camera Setup', 7, 1),
(22, 'Camera Pixel', 7, 1),
(23, 'Features', 7, 1),
(24, 'Video', 7, 1),
(25, 'Camera Setup', 8, 1),
(26, 'Camera Pixel', 8, 1),
(27, 'Features', 8, 1),
(28, 'Video', 8, 1),
(29, 'WLAN', 10, 1),
(30, 'Bluetooth', 10, 1),
(31, 'GPS', 10, 1),
(32, 'NFC', 10, 1),
(33, 'Infrared port', 10, 1),
(34, 'Radio', 10, 1),
(35, 'USB', 10, 1),
(36, 'Sensors', 11, 1),
(37, 'Type', 12, 1),
(38, 'Charging', 12, 1),
(41, 'Display', 13, 1),
(42, 'Camera', 13, 1),
(43, 'Loudspeaker', 13, 1),
(44, 'Battery Life', 13, 1),
(45, 'Loudspeaker', 9, 1),
(46, '3.5 mm Jack', 9, 1),
(47, 'Colors', 14, 1),
(48, 'Models', 14, 1),
(49, 'SAR', 14, 1),
(50, 'SAR EU', 14, 1),
(51, 'Build', 4, 1),
(52, 'Colors', 15, 1),
(53, 'Style', 15, 1),
(54, 'Dimension', 16, 1),
(55, 'Material', 16, 1),
(56, 'Frequency Response', 17, 1),
(57, 'Frequency Response(Active Operation)', 17, 1),
(58, 'Frequency Response(Bluetooth Communication)', 17, 1),
(59, 'Sensitivities', 17, 1),
(60, 'Bluetooth', 18, 1),
(61, 'NFC', 18, 1),
(62, 'Wifi', 18, 1),
(63, 'Type', 15, 1),
(64, 'Speed', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_startcount` int(11) NOT NULL,
  `customer_customer_id` int(11) NOT NULL,
  `invoice_invoice_id` int(11) NOT NULL,
  `invoice_invoice_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `function_id` int(11) NOT NULL,
  `function_name` varchar(45) NOT NULL,
  `module_module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`function_id`, `function_name`, `module_module_id`) VALUES
(1, 'Add User', 1),
(2, 'Edit User', 1),
(5, 'Active/Inactive User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

CREATE TABLE `grn` (
  `grn _id` int(11) NOT NULL,
  `grn_ref_id` int(11) NOT NULL,
  `grn_received_date` date NOT NULL,
  `grn_price` decimal(10,0) NOT NULL,
  `grn_status` tinyint(4) NOT NULL,
  `grn_payment_status` tinyint(4) NOT NULL,
  `supplier_supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `headphone_model`
--

CREATE TABLE `headphone_model` (
  `headphone_model_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `headphone_model_name` varchar(50) NOT NULL,
  `headphone_model_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(45) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_time` time NOT NULL,
  `invoice_total` decimal(10,2) NOT NULL,
  `invoice_type` varchar(45) NOT NULL,
  `invoice_discount` int(11) NOT NULL,
  `invoice_balance` decimal(10,2) NOT NULL,
  `invoice_sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL,
  `logout_date` date NOT NULL,
  `logout_time` time NOT NULL,
  `user_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(45) NOT NULL,
  `login_password` varchar(45) NOT NULL,
  `login_status` tinyint(4) NOT NULL DEFAULT 1,
  `login_pwChange` tinyint(4) NOT NULL,
  `user_user_id` int(11) NOT NULL,
  `role_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_status`, `login_pwChange`, `user_user_id`, `role_role_id`) VALUES
(541, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 812, 0),
(542, 'admin2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 813, 0),
(543, 'admin3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 814, 0),
(544, 'julie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 815, 0),
(545, 'somana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 816, 0),
(546, 'admin8', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 817, 0),
(547, 'kokila', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 818, 0),
(548, 'admin1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 819, 0),
(549, 'admin9', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 820, 0),
(550, 'sunil', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 821, 0),
(551, 'admin12', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 0, 822, 0);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(45) NOT NULL,
  `module_image` varchar(45) NOT NULL,
  `module_url` varchar(45) NOT NULL,
  `module_status` tinyint(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_image`, `module_url`, `module_status`) VALUES
(1, 'User Manage', '', 'This is User Management', 1),
(2, 'Customer Manage', '', 'This is Customer Management', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_has_role`
--

CREATE TABLE `module_has_role` (
  `module_module_id` int(11) NOT NULL,
  `role_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_has_role`
--

INSERT INTO `module_has_role` (`module_module_id`, `role_role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_total_price` decimal(10,0) NOT NULL,
  `payment_type` varchar(45) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_ref_id` int(11) NOT NULL,
  `user_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phone_model_a`
--

CREATE TABLE `phone_model_a` (
  `phone_model_a_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `phone_model_a_name` varchar(60) NOT NULL,
  `phone_model_a_technology` varchar(60) NOT NULL,
  `phone_model_a_2gbands` varchar(60) NOT NULL,
  `phone_model_a_3gbands` varchar(60) NOT NULL,
  `phone_model_a_4gbands` varchar(60) NOT NULL,
  `phone_model_a_5gbands` varchar(60) NOT NULL,
  `phone_model_a_speed` varchar(60) NOT NULL,
  `phone_model_a_announced` varchar(60) NOT NULL,
  `phone_model_a_state` varchar(60) NOT NULL,
  `phone_model_a_dimension` varchar(60) NOT NULL,
  `phone_model_a_weight` varchar(60) NOT NULL,
  `phone_model_a_sim` varchar(60) NOT NULL,
  `phone_model_a_type` varchar(60) NOT NULL,
  `phone_model_a_size` varchar(60) NOT NULL,
  `phone_model_a_resolution` varchar(60) NOT NULL,
  `phone_model_a_protection` varchar(60) NOT NULL,
  `phone_model_a_os` varchar(60) NOT NULL,
  `phone_model_a_chipset` varchar(60) NOT NULL,
  `phone_model_a_cpu` varchar(60) NOT NULL,
  `phone_model_a_gpu` varchar(60) NOT NULL,
  `phone_model_a_cardslot` varchar(60) NOT NULL,
  `phone_model_a_internal` varchar(60) NOT NULL,
  `phone_model_a_m_cam_setup` varchar(60) NOT NULL,
  `phone_model_a_m_cam_pixel` varchar(60) NOT NULL,
  `phone_model_a_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_model_a`
--

INSERT INTO `phone_model_a` (`phone_model_a_id`, `product_product_id`, `phone_model_a_name`, `phone_model_a_technology`, `phone_model_a_2gbands`, `phone_model_a_3gbands`, `phone_model_a_4gbands`, `phone_model_a_5gbands`, `phone_model_a_speed`, `phone_model_a_announced`, `phone_model_a_state`, `phone_model_a_dimension`, `phone_model_a_weight`, `phone_model_a_sim`, `phone_model_a_type`, `phone_model_a_size`, `phone_model_a_resolution`, `phone_model_a_protection`, `phone_model_a_os`, `phone_model_a_chipset`, `phone_model_a_cpu`, `phone_model_a_gpu`, `phone_model_a_cardslot`, `phone_model_a_internal`, `phone_model_a_m_cam_setup`, `phone_model_a_m_cam_pixel`, `phone_model_a_status`) VALUES
(34, 93, 'Redmi note 9', 'GSM / HSPA / LTE', '', '', '', '', 'HSPA 42.2/5.76 Mbps, LTE-A', '2021, August 18', 'Available. Released 2021, August 20', '162.3 x 77.2 x 8.9 mm (6.39 x 3.04 x 0.35 in)', '199 g (7.02 oz)', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD, 450 nits (typ)', '6.53 inches, 104.7 cm2 (~83.5% screen-to-body ratio)', '1080 x 2340 pixels, 19.5:9 ratio (~395 ppi density)', 'Corning Gorilla Glass 5', '', '', '', '', '', '', '', '', 1),
(35, 93, 'frgdfghdfgEREWR', 'GSM / HSPA / LTE', 'ERTERTER', '', '', '', 'HSPA 42.2/5.76 Mbps, LTE-A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(36, 93, 'redmi note 9_64', 'GSM / HSPA / LTE', '', '', '', '', 'HSPA 42.2/5.76 Mbps, LTE-A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(37, 93, 'redmi note 9_128gb', 'GSM / HSPA / LTE', '', 'HSDPA 850 / 900 / 1900 / 2100', ' 1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41', '', 'HSPA 42.2/5.76 Mbps, LTE-A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(38, 93, 'frgdfghdfgdfsf', 'GSM / HSPA / LTE', 'ERTERTER', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(39, 93, 'frgdfghdfg123456', 'GSM / HSPA / LTE', 'ERTERTER', 'HSDPA 850 / 900 / 1900 / 2100', ' 1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41', '', 'HSPA 42.2/5.76 Mbps, LTE-A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(40, 94, 'frgdfghdfg', 'GSM / HSPA / LTE', 'ERTERTER', 'HSDPA 850 / 900 / 1900 / 2100', ' 1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(41, 93, 'frgdfghdfg', 'GSM / HSPA / LTE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(42, 93, 'werwerwe', 'GSM / HSPA / LTE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(43, 0, 'frgdfghdfg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(44, 0, 'asdasdas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(45, 0, 'sdasdsad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(46, 0, 'ertertetetre', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(47, 0, 'ewrwerewrew', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(48, 0, 'dfsdfdsfdsfds', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(49, 0, 'dfgdfgdfgdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(50, 0, 'frgdfghdfg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(51, 0, 'ertertretert', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(52, 0, 'frgdfghdfg', 'GSM / HSPA / LTE', 'ERTERTER', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(53, 0, 'frgdfghdfg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(54, 0, 'dsfdsfdsfsd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(55, 0, 'dsfdsfdsfsdfds', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(56, 93, 'frgdfghdfg', 'GSM / HSPA / LTE', 'ERTERTER', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(57, 93, 'frgdfghdfg', 'GSM / HSPA / LTE', 'ERTERTER', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(58, 93, 'frgdfghdfg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(59, 93, 'frgdfghdfg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(60, 93, 'sdfdsfsdfds', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(61, 93, 'dfgdfgdfgdfg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(62, 93, 'dsfsdfdsf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(63, 93, 'dsfdsfdsfsdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(64, 93, 'frgdfghdfg1234567890', 'GSM / HSPA / LTE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(65, 93, 'frgdfghdfg', 'GSM / HSPA / LTE', 'ERTERTER', 'HSDPA 850 / 900 / 1900 / 2100', ' 1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(66, 93, 'efswdfsd5454545', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phone_model_b`
--

CREATE TABLE `phone_model_b` (
  `phone_model_b_id` int(11) NOT NULL,
  `phone_model_a_phone_model_a_id` int(11) NOT NULL,
  `phone_model_b_m_cam_feature` varchar(60) NOT NULL,
  `phone_model_b_m_cam_vid` varchar(60) NOT NULL,
  `phone_model_b_s_cam_setup` varchar(60) NOT NULL,
  `phone_model_b_s_cam_pixel` varchar(60) NOT NULL,
  `phone_model_b_s_cam_feature` varchar(60) NOT NULL,
  `phone_model_b_s_cam_vid` varchar(60) NOT NULL,
  `phone_model_b_l_speaker` varchar(60) NOT NULL,
  `phone_model_b_jack` varchar(60) NOT NULL,
  `phone_model_b_wlan` varchar(60) NOT NULL,
  `phone_model_b_bt` varchar(60) NOT NULL,
  `phone_model_b_gps` varchar(60) NOT NULL,
  `phone_model_b_nfc` varchar(60) NOT NULL,
  `phone_model_b_ir` varchar(60) NOT NULL,
  `phone_model_b_radio` varchar(60) NOT NULL,
  `phone_model_b_usb` varchar(60) NOT NULL,
  `phone_model_b_sensor` varchar(60) NOT NULL,
  `phone_model_b_bat_type` varchar(60) NOT NULL,
  `phone_model_b_bat_charge` varchar(60) NOT NULL,
  `phone_model_b_color` varchar(60) NOT NULL,
  `phone_model_b_models` varchar(60) NOT NULL,
  `phone_model_b_sar` varchar(60) NOT NULL,
  `phone_model_b_sar_eu` varchar(60) NOT NULL,
  `phone_model_b_t_display` varchar(60) NOT NULL,
  `phone_model_b_t_cam` varchar(60) NOT NULL,
  `phone_model_b_lspeakert` varchar(60) NOT NULL,
  `phone_model_b_t_battery` varchar(60) NOT NULL,
  `phone_model_b_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_model_b`
--

INSERT INTO `phone_model_b` (`phone_model_b_id`, `phone_model_a_phone_model_a_id`, `phone_model_b_m_cam_feature`, `phone_model_b_m_cam_vid`, `phone_model_b_s_cam_setup`, `phone_model_b_s_cam_pixel`, `phone_model_b_s_cam_feature`, `phone_model_b_s_cam_vid`, `phone_model_b_l_speaker`, `phone_model_b_jack`, `phone_model_b_wlan`, `phone_model_b_bt`, `phone_model_b_gps`, `phone_model_b_nfc`, `phone_model_b_ir`, `phone_model_b_radio`, `phone_model_b_usb`, `phone_model_b_sensor`, `phone_model_b_bat_type`, `phone_model_b_bat_charge`, `phone_model_b_color`, `phone_model_b_models`, `phone_model_b_sar`, `phone_model_b_sar_eu`, `phone_model_b_t_display`, `phone_model_b_t_cam`, `phone_model_b_lspeakert`, `phone_model_b_t_battery`, `phone_model_b_status`) VALUES
(98, 34, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Contrast ratio: 1242:1 (nominal)', '', '', '', 1),
(99, 35, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '-30.1 LUFS (Below average)', '', 0),
(100, 36, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Forest Green, Midnight Grey, Polar White', 'M2003J15SC, M2003J15SG, M2003J15SS', '0.84 W/kg (head)     0.90 W/kg (body)', '0.80 W/kg (head)     1.14 W/kg (body)', 'Contrast ratio: 1242:1 (nominal)', 'Photo / Video', '-30.1 LUFS (Below average)', 'Endurance rating 125h', 1),
(101, 37, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.84 W/kg (head)     0.90 W/kg (body)', '0.80 W/kg (head)     1.14 W/kg (body)', 'Contrast ratio: 1242:1 (nominal)', '', '', '', 1),
(102, 38, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(103, 39, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(104, 40, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(105, 41, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(106, 42, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(107, 43, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(108, 44, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(109, 45, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(110, 46, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(111, 47, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(112, 48, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(113, 49, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(114, 50, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(115, 51, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(116, 52, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(117, 53, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(118, 54, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(119, 55, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(120, 56, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(121, 57, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(122, 58, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(123, 59, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(124, 60, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(125, 61, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(126, 62, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(127, 63, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(128, 64, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(129, 65, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(130, 66, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phone_model_image`
--

CREATE TABLE `phone_model_image` (
  `phone_model_image_id` int(11) NOT NULL,
  `phone_model_image_name` varchar(50) NOT NULL,
  `phone_model_a_phone_model_a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_model_image`
--

INSERT INTO `phone_model_image` (`phone_model_image_id`, `phone_model_image_name`, `phone_model_a_phone_model_a_id`) VALUES
(1, '', 34),
(2, '', 34),
(3, 'product.jpg', 34),
(4, 'product.jpg', 34),
(5, '', 35),
(6, 'product.jpg', 35),
(7, 'product.jpg', 35),
(8, 'product.jpg', 35),
(10, 'product.jpg', 36),
(11, 'product.jpg', 36),
(12, 'product.jpg', 36),
(21, 'product.jpg', 39),
(22, 'product.jpg', 39),
(23, 'product.jpg', 39),
(24, 'product.jpg', 39),
(25, 'product.jpg', 40),
(26, 'product.jpg', 40),
(27, 'product.jpg', 40),
(28, 'product.jpg', 40),
(29, 'product.jpg', 41),
(30, 'product.jpg', 41),
(31, 'product.jpg', 41),
(32, 'product.jpg', 41),
(33, 'product.jpg', 42),
(34, 'product.jpg', 42),
(35, 'product.jpg', 42),
(36, 'product.jpg', 42),
(37, 'product.jpg', 43),
(38, 'product.jpg', 43),
(39, 'product.jpg', 43),
(40, 'product.jpg', 43),
(41, 'product.jpg', 44),
(42, 'product.jpg', 44),
(43, 'product.jpg', 44),
(44, 'product.jpg', 44),
(45, 'product.jpg', 45),
(46, 'product.jpg', 45),
(47, 'product.jpg', 45),
(48, 'product.jpg', 45),
(49, 'product.jpg', 46),
(50, 'product.jpg', 46),
(51, 'product.jpg', 46),
(52, 'product.jpg', 46),
(53, 'product.jpg', 47),
(54, 'product.jpg', 47),
(55, 'product.jpg', 47),
(56, 'product.jpg', 47),
(57, 'product.jpg', 48),
(58, 'product.jpg', 48),
(59, 'product.jpg', 48),
(60, 'product.jpg', 48),
(61, 'product.jpg', 49),
(62, 'product.jpg', 49),
(63, 'product.jpg', 49),
(64, 'product.jpg', 49),
(65, 'product.jpg', 50),
(66, 'product.jpg', 50),
(67, 'product.jpg', 50),
(68, 'product.jpg', 50),
(69, 'product.jpg', 51),
(70, 'product.jpg', 51),
(71, 'product.jpg', 51),
(72, 'product.jpg', 51),
(73, 'product.jpg', 52),
(74, 'product.jpg', 52),
(75, 'product.jpg', 52),
(76, 'product.jpg', 52),
(77, 'product.jpg', 53),
(78, 'product.jpg', 53),
(79, 'product.jpg', 53),
(80, 'product.jpg', 53),
(81, 'product.jpg', 54),
(82, 'product.jpg', 54),
(83, 'product.jpg', 54),
(84, 'product.jpg', 54),
(85, 'product.jpg', 55),
(86, 'product.jpg', 55),
(87, 'product.jpg', 55),
(88, 'product.jpg', 55),
(89, 'product.jpg', 56),
(90, 'product.jpg', 56),
(91, 'product.jpg', 56),
(92, 'product.jpg', 56),
(93, 'product.jpg', 57),
(94, 'product.jpg', 57),
(95, 'product.jpg', 57),
(96, 'product.jpg', 57),
(97, 'product.jpg', 58),
(98, 'product.jpg', 58),
(99, 'product.jpg', 58),
(100, 'product.jpg', 58),
(101, 'product.jpg', 59),
(102, 'product.jpg', 59),
(103, 'product.jpg', 59),
(104, 'product.jpg', 59),
(105, 'product.jpg', 60),
(106, 'product.jpg', 60),
(107, 'product.jpg', 60),
(108, 'product.jpg', 60),
(109, 'product.jpg', 61),
(110, 'product.jpg', 61),
(111, 'product.jpg', 61),
(112, 'product.jpg', 61),
(113, 'product.jpg', 62),
(114, 'product.jpg', 62),
(115, 'product.jpg', 62),
(116, 'product.jpg', 62),
(117, 'product.jpg', 63),
(118, 'product.jpg', 63),
(119, 'product.jpg', 63),
(120, 'product.jpg', 63),
(121, 'product.jpg', 64),
(122, 'product.jpg', 64),
(123, 'product.jpg', 64),
(124, 'product.jpg', 64),
(125, 'redmi note 9-1649822266.jpg', 65),
(126, 'redmi note 9-2-1649822266.jpg', 65),
(127, 'product.jpg', 65),
(128, 'product.jpg', 65),
(133, 'redmi note 9-1649934627.jpg', 66),
(134, 'redmi note 9-2-1649934627.jpg', 66),
(140, 'product.jpg', 36),
(169, 'redmi note 9-2.jpg', 38),
(174, 'redmi note 9.jpg', 38),
(175, 'redmi note 9-2-1649964530.jpg', 38);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `category_category_id` int(11) NOT NULL,
  `brand_brand_id` int(11) NOT NULL,
  `product_os` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_category_id`, `brand_brand_id`, `product_os`, `product_description`, `product_status`) VALUES
(93, 'Redmi note 9', 2, 60, 'Miui 12, Android 10(Upgradable to android 11)', '<p>Redmi note 9 is the best low end phone for game seekers</p>\r\n', 0),
(94, 'Redmi note 9 pro', 2, 62, 'Miui 12, Android 10', '<p>Redmi note 9&nbsp; pro bring great experience to gamers</p>\r\n', 1),
(95, 'redmi notee', 1, 60, '', '', 1),
(96, 'redmi note 9 t', 2, 61, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_image_name` varchar(45) NOT NULL,
  `product_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_image_name`, `product_product_id`) VALUES
(222, 'redmi note 9.jpg', 93),
(223, 'redmi note 9-2.jpg', 93),
(224, 'product.jpg', 93),
(225, 'product.jpg', 93),
(226, 'redmi note 9.jpg', 94),
(227, 'product.jpg', 94),
(228, 'product.jpg', 94),
(229, 'product.jpg', 94),
(230, '5WChazv-batman-wallpaper-1920x1080.jpg', 95),
(231, 'batman_11-wallpaper-1920x1080.jpg', 95),
(232, 'product.jpg', 95),
(233, 'product.jpg', 95),
(234, '6mTa7Lb-batman-wallpaper-1920x1080.jpg', 96),
(235, 'batman_11-wallpaper-1920x1080.jpg', 96),
(236, 'product.jpg', 96),
(237, 'product.jpg', 96);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL,
  `role_description` varchar(120) NOT NULL,
  `role_status` tinyint(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_description`, `role_status`) VALUES
(1, 'Super User', 'This user has full access to all privilages in the system', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_date` date NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `sales_product_r_price` decimal(10,0) NOT NULL,
  `sales_product_subtotal` decimal(10,0) NOT NULL,
  `invoice_invoice_id` int(11) NOT NULL,
  `invoice_invoice_number` varchar(45) NOT NULL,
  `product_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_count` int(11) NOT NULL,
  `stock_currentCount` varchar(45) NOT NULL,
  `stock_cost_per_unit` decimal(10,0) NOT NULL,
  `stock_product_reg_price` decimal(10,0) NOT NULL,
  `stock_amount_paid` decimal(10,0) NOT NULL,
  `stock_status` tinyint(4) NOT NULL,
  `grn_grn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `company_email` varchar(45) NOT NULL,
  `company_address1` varchar(45) NOT NULL,
  `company_address2` varchar(45) NOT NULL,
  `company_address3` varchar(45) NOT NULL,
  `company_contact1` varchar(45) NOT NULL,
  `company_contact2` varchar(45) NOT NULL,
  `supplier_age` varchar(45) NOT NULL,
  `supplier_name` varchar(45) NOT NULL,
  `supplier_email` varchar(45) NOT NULL,
  `supplier_contact` varchar(45) NOT NULL,
  `supplier_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(45) NOT NULL,
  `user_last_name` varchar(45) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` varchar(45) NOT NULL,
  `user_nic` varchar(45) NOT NULL,
  `user_mobile_no` varchar(45) NOT NULL,
  `user_landline_no` varchar(45) NOT NULL,
  `user_email_address` varchar(45) NOT NULL,
  `user_address1` varchar(45) NOT NULL,
  `user_address2` varchar(45) NOT NULL,
  `user_city` varchar(45) NOT NULL,
  `user_profile_image` varchar(45) NOT NULL,
  `role_role_id` int(11) NOT NULL,
  `user_reg_date` date NOT NULL,
  `user_last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_dob`, `user_gender`, `user_nic`, `user_mobile_no`, `user_landline_no`, `user_email_address`, `user_address1`, `user_address2`, `user_city`, `user_profile_image`, `role_role_id`, `user_reg_date`, `user_last_update`, `user_status`) VALUES
(812, 'Gayann', 'Fonseka', '2000-10-23', '1', '200028903687', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649916237_20190520_201650.jpg', 0, '2022-02-05', '2022-04-14 06:03:57', 1),
(813, 'Mary', 'Fonseka', '2000-07-15', '0', '200028903612', '', '0112932801', 'mary@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649916416_20190520_200539.jpg', 0, '2022-02-05', '2022-04-14 06:06:56', 1),
(814, 'Nimal', 'Perera', '2000-02-01', '1', '200028903684', '', '0112932801', 'nimal@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '20190907_150127.jpg', 0, '2022-02-05', '2022-04-13 14:27:16', 1),
(815, 'Julie', 'Samson', '2000-08-11', '0', '200028903601', '', '0112932801', 'julie@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649860098_20190520_201650.jpg', 0, '2022-02-05', '2022-04-13 14:28:18', 0),
(816, 'Somana', 'Fonseka', '2000-01-10', '1', '200028903680', '0714569899', '0112932801', 'somana@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649852792_20190907_150127.jpg', 0, '2022-02-05', '2022-04-13 12:26:32', 1),
(817, 'Gayan', 'Fonseka', '2000-10-15', '1', '200028903630', '0756483952', '0112932801', 'gayan9@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649853020_20190907_150127.jpg', 0, '2022-02-06', '2022-04-13 12:30:20', 0),
(818, 'Kokila', 'Fonseka', '2000-11-07', '0', '200028903681', '', '0112932801', 'kokila12@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649857681_20190831_114858.jpg', 1, '2022-02-08', '2022-04-13 13:48:01', 1),
(819, 'Gayan', 'Fonseka', '1998-06-03', '1', '199828903688', '', '0112932801', 'gayan8@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649853349_20191011_111629.jpg', 1, '2022-02-08', '2022-04-13 12:35:49', 1),
(820, 'Gayan', 'Fonseka', '2002-02-17', '1', '200228903687', '', '0112932801', 'gayan5@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649915942_20190811_121537.jpg', 1, '2022-02-08', '2022-04-14 05:59:02', 1),
(821, 'Sunil', 'Perera', '2001-06-22', '1', '200128903687', '0756483952', '0112932801', 'sunil@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-02-22', '2022-04-14 05:56:41', 1),
(822, 'Gayan', 'Fonseka', '2000-02-05', '1', '200028903686', '', '0112932801', 'gayan12@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1649857905_1649857585_20191011_111629.jpg', 1, '2022-04-13', '2022-04-13 13:51:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_privilages`
--

CREATE TABLE `user_privilages` (
  `function_function_id` int(11) NOT NULL,
  `user_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_privilages`
--

INSERT INTO `user_privilages` (`function_function_id`, `user_user_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 819),
(2, 819),
(1, 821),
(2, 821),
(5, 821),
(1, 822),
(2, 822);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cuslogin`
--
ALTER TABLE `cuslogin`
  ADD PRIMARY KEY (`cusLogin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `driver_license_img`
--
ALTER TABLE `driver_license_img`
  ADD PRIMARY KEY (`driver_licnese_img_id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `feature_category`
--
ALTER TABLE `feature_category`
  ADD PRIMARY KEY (`feature_category_id`);

--
-- Indexes for table `feature_type`
--
ALTER TABLE `feature_type`
  ADD PRIMARY KEY (`feature_type_id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `grn`
--
ALTER TABLE `grn`
  ADD PRIMARY KEY (`grn _id`);

--
-- Indexes for table `headphone_model`
--
ALTER TABLE `headphone_model`
  ADD PRIMARY KEY (`headphone_model_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `phone_model_a`
--
ALTER TABLE `phone_model_a`
  ADD PRIMARY KEY (`phone_model_a_id`);

--
-- Indexes for table `phone_model_b`
--
ALTER TABLE `phone_model_b`
  ADD PRIMARY KEY (`phone_model_b_id`);

--
-- Indexes for table `phone_model_image`
--
ALTER TABLE `phone_model_image`
  ADD PRIMARY KEY (`phone_model_image_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cuslogin`
--
ALTER TABLE `cuslogin`
  MODIFY `cusLogin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver_license_img`
--
ALTER TABLE `driver_license_img`
  MODIFY `driver_licnese_img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `feature_category`
--
ALTER TABLE `feature_category`
  MODIFY `feature_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feature_type`
--
ALTER TABLE `feature_type`
  MODIFY `feature_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grn`
--
ALTER TABLE `grn`
  MODIFY `grn _id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `headphone_model`
--
ALTER TABLE `headphone_model`
  MODIFY `headphone_model_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=552;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_model_a`
--
ALTER TABLE `phone_model_a`
  MODIFY `phone_model_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `phone_model_b`
--
ALTER TABLE `phone_model_b`
  MODIFY `phone_model_b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `phone_model_image`
--
ALTER TABLE `phone_model_image`
  MODIFY `phone_model_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=823;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
