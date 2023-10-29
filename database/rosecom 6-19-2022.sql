-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 10:31 AM
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
(60, 'Sony', 'Sony Electronics is a leading provider of audio/video electronics and information technology product.', '1654315942_1643790975_sony.png', 1),
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
(87, 'dfgdfgdf', 'gdfgdfgdfg', 'logo2.png', 0),
(88, 'Sonydgdfgdf', 'tertret', 'logo2.png', 1),
(89, 'ewrtwetew', 'wetwe', 'logo2.png', 1),
(90, 'ewrtwetew', 'wetwe', 'logo2.png', 1),
(91, 'retet', 'erter', 'logo2.png', 1),
(92, 'ertert', 'er', 'logo2.png', 1),
(93, 'GEDGDF', 'ERTRE', 'logo2.png', 1),
(94, 'WETET', 'WEWT', 'logo2.png', 1),
(95, 'SonySDGDS', 'SDGS', 'logo2.png', 1),
(96, 'GFVDGHDGDFGD', 'WER', 'logo2.png', 1),
(97, 'RETRE', 'RETERT', 'logo2.png', 1),
(98, 'DSGDSGSD', 'SDGSDGSD', 'logo2.png', 1),
(99, 'ERTRETRE', 'ERTRE', 'logo2.png', 1);

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
(1, 'Headphone', 'category.jpg', 1),
(2, 'Phone', 'category.jpg', 1),
(3, 'Speakers', 'category.jpg', 1),
(4, 'PowerAdapter', 'category.jpg', 1),
(5, 'Earphone', 'category.jpg', 1),
(16, 'dsfsdf', 'category.jpg', 1),
(17, 'dsfdsf', 'category.jpg', 1),
(18, 'retert', 'category.jpg', 1),
(19, 'wrwere', 'category.jpg', 1);

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
  `customer_address1` varchar(50) NOT NULL,
  `customer_address2` varchar(50) NOT NULL,
  `customer_city` varchar(45) NOT NULL,
  `customer_postal_code` varchar(50) NOT NULL,
  `customer_profile_image` varchar(45) NOT NULL,
  `customer_reg_date` date NOT NULL,
  `customer_last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_status` tinyint(4) NOT NULL DEFAULT 1,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_dob`, `customer_gender`, `customer_nic`, `customer_mobile_no`, `customer_landline_no`, `customer_email`, `customer_address1`, `customer_address2`, `customer_city`, `customer_postal_code`, `customer_profile_image`, `customer_reg_date`, `customer_last_update`, `customer_status`, `order_id`) VALUES
(1, 'Gaya', 'Fonseka', '2002-01-08', '1', '200234678967', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '11300', '1652447938_20190108_145953.jpg', '2022-05-13', '2022-06-10 11:29:27', 1, 0),
(2, 'Gayan', 'Fonseka', '2002-01-08', '0', '200234678967', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '11300', '1652446532_20190108_145953.jpg', '2022-05-13', '2022-05-15 07:37:48', 0, 0),
(3, 'Gayan', 'Fonseka', '2002-01-08', '1', '200234678967', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '11300', 'defaultimageM.jpg', '2022-05-13', '2022-05-13 18:05:22', 1, 0),
(4, 'Gayan', 'Fonseka', '2003-06-18', '0', '200334678966', '0756483952', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '11300', '1652439844_20190108_143530.jpg', '2022-05-13', '2022-05-15 17:22:38', 1, 0),
(5, 'Gayan', 'Fonseka', '2002-01-15', '1', '200234678956', '0756483952', '0112932801', 'gayan34@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '11300', 'defaultimageM.jpg', '2022-06-03', '2022-06-03 09:21:05', 1, 0),
(6, 'Gayan', 'Fonseka', '2004-02-08', '1', '200434678967', '', '0112932801', 'gayan349@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '11300', 'defaultimageM.jpg', '2022-06-03', '2022-06-03 09:22:34', 1, 0);

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
(82, 'retertre', 52, 15, 0),
(83, 'retert', 52, 15, 0),
(84, 'dfgdfgdfgdf', 52, 15, 0),
(85, 'thtry', 52, 15, 0),
(86, 'fghfgh', 52, 15, 0),
(87, 'vnbnvb', 52, 15, 0),
(88, 'bvnvbnvnb', 52, 15, 0),
(89, 'vnbnbv', 52, 15, 0),
(90, 'dfhdfhf', 52, 15, 0),
(91, 'ertertert', 52, 15, 1),
(92, 'ertertertrete', 52, 15, 1),
(93, 'hgfhgfh', 54, 16, 0),
(94, 'ghjghjghjgh', 54, 16, 1),
(95, 'dgfsdgdf', 54, 16, 1),
(96, 'dfgdfg', 54, 16, 0),
(97, 'retertetr', 52, 15, 0),
(98, 'sdfdfsdf', 52, 15, 1),
(99, 'tewrterte', 52, 15, 1),
(100, 'fdgdgdfg', 52, 15, 1),
(101, '1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41,6,8', 6, 2, 1),
(102, 'werwerwr', 52, 15, 1),
(103, 'sadasdas', 52, 15, 1),
(104, 'fdsfdsfds', 52, 15, 1),
(105, 'uiyiyu', 52, 15, 1),
(106, 'tyutyutyu', 52, 15, 1),
(107, 'ytututyu', 52, 15, 1),
(108, 'dfsgdgd', 52, 15, 1),
(109, 'dfhfhdfh', 52, 15, 1),
(110, 'yuiyuiyui', 52, 15, 1),
(111, 'rtyrtyrty', 52, 15, 1),
(112, 'dgfsdgsgsdg', 52, 15, 1),
(113, 'dsfdfsdfds', 52, 15, 1),
(114, 'dfgdfg', 52, 15, 1),
(115, 'dsfsdfds', 52, 15, 1),
(116, 'dfgdfgdfg', 52, 15, 1),
(117, 'gdfgfgdg', 52, 15, 1),
(118, 'dsgsdgds', 52, 15, 1),
(119, 'dfgdfgdfdfg', 52, 15, 1);

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
  `grn_ref_id` varchar(50) NOT NULL,
  `grn_received_date` date NOT NULL,
  `grn_price` decimal(10,2) NOT NULL,
  `grn_status` tinyint(4) NOT NULL,
  `grn_payment_status` tinyint(4) NOT NULL,
  `supplier_supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`grn _id`, `grn_ref_id`, `grn_received_date`, `grn_price`, `grn_status`, `grn_payment_status`, `supplier_supplier_id`) VALUES
(64, '2353523gsdg', '2022-06-07', '4.00', 0, 0, 1),
(65, '2353523gsdg', '2022-06-09', '546.00', 0, 0, 1),
(66, '34534tgretgdrf', '2022-05-31', '6.00', 0, 0, 1),
(67, '', '0000-00-00', '0.00', 0, 0, 0),
(68, '', '0000-00-00', '0.00', 0, 0, 0),
(69, '', '0000-00-00', '0.00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `headphone_model`
--

CREATE TABLE `headphone_model` (
  `headphone_model_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `headphone_model_name` varchar(50) NOT NULL,
  `headphone_model_price` decimal(10,2) NOT NULL,
  `headphone_model_type` varchar(45) NOT NULL,
  `headphone_model_colors` varchar(50) NOT NULL,
  `headphone_model_style` varchar(45) NOT NULL,
  `headphone_model_dimension` varchar(50) NOT NULL,
  `headphone_model_material` varchar(50) NOT NULL,
  `headphone_model_fResponse` varchar(50) NOT NULL,
  `headphone_model_fResponseA` varchar(50) NOT NULL,
  `headphone_model_fResponseBt` varchar(50) NOT NULL,
  `headphone_model_sensivity` varchar(50) NOT NULL,
  `headphone_model_nfc` varchar(50) NOT NULL,
  `headphone_model_bt` varchar(50) NOT NULL,
  `headphone_model_wifi` varchar(50) NOT NULL,
  `headphone_model_descrip` varchar(1000) NOT NULL,
  `headphone_model_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headphone_model`
--

INSERT INTO `headphone_model` (`headphone_model_id`, `product_product_id`, `headphone_model_name`, `headphone_model_price`, `headphone_model_type`, `headphone_model_colors`, `headphone_model_style`, `headphone_model_dimension`, `headphone_model_material`, `headphone_model_fResponse`, `headphone_model_fResponseA`, `headphone_model_fResponseBt`, `headphone_model_sensivity`, `headphone_model_nfc`, `headphone_model_bt`, `headphone_model_wifi`, `headphone_model_descrip`, `headphone_model_status`) VALUES
(11, 99, 'headphone_sony7', '4000.00', '', '', '', '', '', '', '', '', '', '', '', '', '<p>Best Headphone Brand in the world best</p>\r\n', 1),
(14, 99, 'Sony_headphone_v8', '3800.00', '', '', '', 'ghjghjghjgh', '', '', '', '', '', '', '', '', '', 1),
(15, 99, 'headphone_sony5v3', '6400.00', '', 'dfgdfgdfgdf', '', 'ghjghjghjgh', '', '', '', '', '', '', '', '', '', 1),
(16, 101, 'Xioami Headphone_v2', '5000.00', '', '', '', '', '', '', '', '', '', '', '', '', '<p>Xiomi headphones offers a good bass and surround</p>\r\n', 1),
(17, 101, 'headphone', '40.00', '', 'dfgdgdf', '', '', '', '', '', '', '', '', '', '', '', 1),
(18, 99, 'headphoneret', '4000.00', '', '', '', '', '', '', '', '', '', '', '', '', '<p>ertertertret re tre tre ter ter tet&nbsp;</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `headphone_model_image`
--

CREATE TABLE `headphone_model_image` (
  `headphone_model_image_id` int(11) NOT NULL,
  `headphone_model_image_name` varchar(50) NOT NULL,
  `headphone_model_headphone_model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headphone_model_image`
--

INSERT INTO `headphone_model_image` (`headphone_model_image_id`, `headphone_model_image_name`, `headphone_model_headphone_model_id`) VALUES
(16, 'download-1650507915.jpg', 11),
(18, 'download-1650567455.jpg', 14),
(19, 'download-1650567665.jpg', 15),
(25, 'www-YTS-MX-1650954000.jpg', 16),
(30, 'download (1).jpg', 17),
(31, 'download-1651154309.jpg', 17),
(32, 'images-1651154309.jpg', 17),
(33, 'download (1)-1651475306.jpg', 18),
(34, 'download-1651475306.jpg', 18);

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
(542, 'admin2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 813, 0),
(543, 'admin3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 814, 0),
(544, 'julie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 815, 0),
(545, 'somana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 816, 0),
(546, 'admin8', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 817, 0),
(547, 'kokila', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 818, 0),
(548, 'admin1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 819, 0),
(549, 'admin9', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 820, 0),
(550, 'sunil', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 821, 0),
(551, 'admin12', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 0, 822, 0),
(552, '', '', 1, 0, 812, 0),
(553, 'Singithi12', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 0, 823, 0),
(554, 'admin34', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 824, 0),
(555, 'admin89', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 825, 0),
(556, 'admin123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 826, 0),
(557, 'admin5', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 827, 0),
(558, 'gayanchanuka107', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 828, 0),
(559, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 0, 829, 0),
(560, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 0, 830, 0),
(561, 'R181284', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 831, 0),
(562, 'superi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 0, 832, 0);

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
(2, 'Customer Manage', '', 'This is Customer Management', 1),
(5, 'Supplier Manage', '', 'This is Supplier Management', 1);

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
(2, 1),
(5, 1);

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
  `phone_model_a_price` decimal(10,2) NOT NULL,
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

INSERT INTO `phone_model_a` (`phone_model_a_id`, `product_product_id`, `phone_model_a_name`, `phone_model_a_price`, `phone_model_a_technology`, `phone_model_a_2gbands`, `phone_model_a_3gbands`, `phone_model_a_4gbands`, `phone_model_a_5gbands`, `phone_model_a_speed`, `phone_model_a_announced`, `phone_model_a_state`, `phone_model_a_dimension`, `phone_model_a_weight`, `phone_model_a_sim`, `phone_model_a_type`, `phone_model_a_size`, `phone_model_a_resolution`, `phone_model_a_protection`, `phone_model_a_os`, `phone_model_a_chipset`, `phone_model_a_cpu`, `phone_model_a_gpu`, `phone_model_a_cardslot`, `phone_model_a_internal`, `phone_model_a_m_cam_setup`, `phone_model_a_m_cam_pixel`, `phone_model_a_status`) VALUES
(71, 98, 'Redmi note 3', '34000.00', 'GSM / HSPA / LTE', 'ERTERTER', 'HSDPA 850 / 900 / 1900 / 2100', ' 1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41', '', 'HSPA 42.2/5.76 Mbps, LTE-A', '2021, August 18', 'Available. Released 2021, August 20', '162.3 x 77.2 x 8.9 mm (6.39 x 3.04 x 0.35 in)', '199 g (7.02 oz)', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD, 450 nits (typ)', '6.53 inches, 104.7 cm2 (~83.5% screen-to-body ratio)', '1080 x 2340 pixels, 19.5:9 ratio (~395 ppi density)', 'Corning Gorilla Glass 5', 'Android 10, upgradable to Android 11, MIUI 12.5 E', 'MediaTek Helio G85 (12nm)', 'Octa-core (2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)', 'Mali-G52 MC2', 'microSDHC (dedicated slot)', '32GB 3GB RAM, 64GB 4GB RAM, 128GB 4GB RAM, 128GB 6', '', '', 0),
(72, 98, 'Redmi note 9_128gb', '56500.00', 'GSM / HSPA / LTE', 'ERTERTER', 'HSDPA 850 / 900 / 1900 / 2100', ' 1, 2, 3, 4, 5, 7, 8, 20, 28, 38, 40, 41', '', 'HSPA 42.2/5.76 Mbps, LTE-A', '2021, August 18', 'Available. Released 2021, August 20', '162.3 x 77.2 x 8.9 mm (6.39 x 3.04 x 0.35 in)', '199 g (7.02 oz)', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD, 450 nits (typ)', '6.53 inches, 104.7 cm2 (~83.5% screen-to-body ratio)', '1080 x 2340 pixels, 19.5:9 ratio (~395 ppi density)', 'Corning Gorilla Glass 5', 'Android 10, upgradable to Android 11, MIUI 12.5 E', '', '', '', '', '', '', '', 1),
(73, 98, 'Redmi note 9_64', '2343.00', 'GSM / HSPA / LTE', 'ERTERTER', 'HSDPA 850 / 900 / 1900 / 2100', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(74, 98, 'Redmi note 9_64r', '4567.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(75, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(76, 98, 'Redmi note 9_64', '5435.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(77, 98, 'Redmi note 9_64', '5435.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(78, 98, 'Redmi note 9_64gb', '656.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(79, 98, 'Redmi note 9', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(80, 98, 'Redmi note 9 64gb', '5678.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(81, 98, 'Redmi note 9_64gb', '656.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(82, 98, 'Redmi note 9_64gb', '656.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(83, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(84, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(85, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(86, 98, 'fgdfgdf', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(87, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(88, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(89, 98, 'dfdfgdf', '545435.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(90, 98, 'dfgdfgd', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(91, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(92, 98, 'eretert', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(93, 98, 'reter', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(94, 98, 'etertre', '436534.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(95, 98, 'Redmi note 9_64', '657.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(96, 98, 'eterter', '34654.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(97, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(98, 98, 'Redmi note 9', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(99, 98, 'Redmi note 9 64gb', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(100, 98, 'Redmi note 9_64gb', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(101, 98, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(102, 103, 'Redmi note 9_128', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(103, 103, 'Redmi note 9 64gb', '1234.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(104, 103, 'Redmi note 9_64', '943.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1);

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
(133, 71, 'LED flash, HDR, panorama', '1080p@30fps', 'Single', '', 'HDR, panorama', '1080p@30fps', 'Yes', 'Yes', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, BDS', '', 'Yes', 'FM radio, built-in antenna', '	USB Type-C 2.0', '', 'Li-Po 5020 mAh, non-removable', 'Fast charging 18W\r\nReverse charging 9W', 'Forest Green, Midnight Grey, Polar White', 'M2003J15SC, M2003J15SG, M2003J15SS', '', '0.80 W/kg (head)     1.14 W/kg (body)', 'Contrast ratio: 1242:1 (nominal)', 'Photo / Video', '-30.1 LUFS (Below average)', 'Endurance rating 125h', 0),
(134, 72, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(135, 73, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(136, 74, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(137, 75, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(138, 76, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(139, 77, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(140, 78, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(141, 79, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(142, 80, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(143, 81, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(144, 82, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(145, 83, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(146, 84, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(147, 85, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(148, 86, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(149, 87, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(150, 88, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(151, 89, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(152, 90, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(153, 91, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(154, 92, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(155, 93, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(156, 94, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(157, 95, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(158, 96, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(159, 97, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(160, 98, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(161, 99, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(162, 100, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(163, 101, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(164, 102, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(165, 103, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1),
(166, 104, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1);

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
(242, 'redmi note 9-1650507603.jpg', 72),
(253, 'www.YTS.MX.jpg', 0),
(256, 'www-YTS-MX-1650919776.jpg', 0),
(267, 'redmi note 9-1651131377.jpg', 73),
(268, 'redmi note 9-2-1651131377.jpg', 73),
(269, 'redmi note 9-1651131697.jpg', 74),
(270, 'redmi note 9-2-1651131697.jpg', 74),
(271, 'redmi note 9-1651131824.jpg', 75),
(272, 'redmi note 9-2-1651131824.jpg', 75),
(273, 'redmi note 9-1651132050.jpg', 76),
(274, 'redmi note 9-2-1651132050.jpg', 76),
(275, 'redmi note 9-1651132064.jpg', 77),
(276, 'redmi note 9-2-1651132064.jpg', 77),
(277, 'redmi note 9-1651134718.jpg', 91),
(278, 'redmi note 9-2-1651134718.jpg', 91),
(279, 'redmi note 9-1651139070.jpg', 100),
(280, 'redmi note 9-2-1651139070.jpg', 100),
(281, 'redmi note 9-1651139198.jpg', 101),
(282, 'redmi note 9-2-1651139198.jpg', 101),
(283, 'redmi note 9-1651151971.jpg', 102),
(284, 'redmi note 9-2-1651151971.jpg', 102),
(285, 'redmi note 9-1651152063.jpg', 103),
(286, 'redmi note 9-2-1651152063.jpg', 103),
(287, 'redmi note 9-1651155643.jpg', 104),
(288, 'redmi note 9-2-1651155643.jpg', 104),
(289, 'redmi note 9.jpg', 71),
(290, 'redmi note 9-2-1651476587.jpg', 71),
(291, 'redmi note 9-1654491852.jpg', 78),
(292, 'redmi note 9-2-1654491852.jpg', 78),
(293, 'www-YTS-MX-1654945425.jpg', 79);

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
(98, 'redmi note 965', 2, 62, 'Miui 12, Android 10(', '<p>This is a mid range p<strong>hone forghffffgfhgfhfhfghfhewrewfdsf&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p>\r\n\r\n<p><strong>xdcgsdgsdgdsgdgsfd4352354534</strong></p>\r\n', 0),
(99, 'Sony Headphones', 1, 60, '', '<p>Best for listerners and speakers</p>\r\n', 1),
(100, 'redmi note 9 pro', 2, 62, 'Miui 12, Android 11', '', 1),
(101, 'Xiomi Headphone', 1, 62, '', '', 1),
(102, 'redmi note 9rter', 1, 60, '4550', '<p>etewtwetwe</p>\r\n', 1),
(103, 'redmi note 96', 2, 60, '5475475', '<p>dfhdfhdfhdfh</p>\r\n', 1),
(104, 'redmi note 97', 2, 60, '5443534', '<p>e456tretrterterter</p>\r\n', 1),
(105, 'redmi note 95', 1, 60, 'dsfsdf', '', 1),
(106, 'redmi note 9', 1, 60, 'ryhrtyrtyrtyr', '', 1),
(107, 'redmi note 956', 1, 60, 'werwerwerwe', '<p>werwerewr ew rew rwer wer we rw</p>\r\n', 1),
(108, 'redmi note 9gdfg', 1, 60, '3454TGDF', '<p>DFGDFGDFGDFG</p>\r\n', 1),
(109, 'GDFGDFGRY', 1, 60, 'ERYRE YRYRE YRE', '<p>Y ERYERYER YER ER YRE</p>\r\n', 1),
(110, 'redmi note 9DSFSD', 2, 88, 'DFDSFSDF', '<p>DSFDSFDS</p>\r\n', 1),
(111, 'rfet etwet w', 2, 60, 'wetew twetwe t', '<p>ew twetewwe twetwet wet wetwe t</p>\r\n', 1),
(112, '544334 634 634', 1, 60, '3453 4534 3   4', '<p>34 634 6346 4 644yghfdhdfhdf</p>\r\n', 1),
(113, 'redmi note 9werwe', 1, 60, 'werew rew', '<p>&nbsp;rew rwe rwe rwe we rwe&nbsp;</p>\r\n', 1),
(114, 'redmi note 9htyh', 1, 60, 're yre', '<p>rtyery ey</p>\r\n', 1),
(115, 'redmi note 9htyh', 1, 60, 're yre', '<p>rtyery ey</p>\r\n', 1),
(116, 'ew t wet ewtw t ', 1, 60, 'we tewtwe', '<p>t wet wet we twe twe tew</p>\r\n', 1),
(117, 'redmi note 9efewrwe', 1, 60, 'werw erew rewrwe', '<p>&nbsp;rew rew rwe rwe rwe rwe rwe w rwe rww&nbsp;</p>\r\n\r\n<hr />\r\n<p>erew rwew ere wrwe r w</p>\r\n\r\n<hr />\r\n<p>rwerew rer</p>\r\n', 1),
(118, 'redmi note 934534 5', 1, 60, '34 534534 5345', '<p>5 34534 53 tgdfhgds gdfhdfh df hd</p>\r\n', 1),
(119, 'redmi note 9et', 4, 60, 'wer wr we', '<p>w rwer wer ew rew rwe rew&nbsp;</p>\r\n', 1),
(120, '43 t34grfgh dyghrhre', 1, 60, 'er tre t4yerehre', '<p>r yreyeryer yre yre yreyre yey</p>\r\n', 1),
(121, ' 34634346tyyreyhre', 1, 61, 'er yre yre yre', '<p>er yre yrey ery erye</p>\r\n', 1),
(122, '2 43432423', 1, 60, 'dsgds gsd gd s g', '<p>&nbsp;dsgsd gds gsd gds gsd gsd gsd gsdg</p>\r\n', 1),
(123, ' 23423423DSGDSHGDFHDFH', 1, 60, 'DF EYERE YERYERYE', '<p>&nbsp;YRE YER YERRE YE RYRE YER ER YE</p>\r\n', 1),
(124, 'REWRW R W', 1, 60, ' RW QWE QWEQW E', '<p>QW EQW EQW QW EQW EQW EQW&nbsp;</p>\r\n', 1),
(125, 'W ETEW TWETW', 1, 60, 'W TEW T34643RYRE', '<p>ERYER YER E RY ERY ERE</p>\r\n', 1),
(126, 'REW EW REWR', 1, 60, 'Q WEQW EQW E', '<p>QW EQ WEQW EQW QW EQW EQW EQW</p>\r\n', 1),
(127, 'WE REW REW', 1, 60, ' WEREWR WER ', '<p>WE REWRWE RWEW ERWR</p>\r\n', 1),
(128, 'ret er terter', 4, 60, 'qw rwrtqwr', '<p>w qrqw r qwr qwr</p>\r\n', 1),
(129, ' wrtwetew tew', 1, 60, 'eqwr qwrwr ', '<p>q wrqwr qwrqw qw rqw rqw</p>\r\n', 1),
(130, 'redmi note 9ew ew', 2, 60, 'w erewrwe r', '<p>we rew rwe rwe r</p>\r\n', 1),
(131, 'tre terterte', 1, 60, 'er terter', '<p>re ter ter ter ter ter erter&nbsp;</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_has_grn`
--

CREATE TABLE `product_has_grn` (
  `product_product_id` int(11) NOT NULL,
  `grn_grn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(263, 'download-1650593124.jpg', 101),
(275, 'redmi note 9-1650906608.jpg', 100),
(301, 'redmi note 9-1650911007.jpg', 102),
(302, 'redmi note 9-2-1650911007.jpg', 102),
(303, 'redmi note 9-1650911046.jpg', 103),
(304, 'redmi note 9-2-1650911046.jpg', 103),
(305, 'redmi note 9-1650913318.jpg', 104),
(306, 'redmi note 9-2-1650913318.jpg', 104),
(307, 'redmi note 9-1650914420.jpg', 105),
(313, 'redmi note 9-1650916550.jpg', 99),
(315, 'www.YTS.MX.jpg', 105),
(317, 'redmi note 9-1651119107.jpg', 98),
(319, 'redmi note 9-1652176940.jpg', 107),
(321, 'redmi note 9-1653647410.jpg', 106),
(322, 'redmi note 9-2-1653647410.jpg', 106),
(323, 'redmi note 9-1654322429.jpg', 108),
(324, 'redmi note 9-2-1654322429.jpg', 108),
(325, 'redmi note 9-1654322506.jpg', 109),
(326, 'redmi note 9-2-1654322506.jpg', 109),
(327, 'redmi note 9-1654322770.jpg', 110),
(328, 'redmi note 9-2-1654322770.jpg', 110),
(329, 'redmi note 9-1654324587.jpg', 111),
(330, 'redmi note 9-2-1654324587.jpg', 111),
(331, 'redmi note 9-1654325160.jpg', 112),
(332, 'redmi note 9-2-1654325160.jpg', 112),
(333, '6mTa7Lb-batman-wallpaper-1920x1080.jpg', 113),
(334, 'dsfdf.jpg', 0),
(335, 'Gn6c2Wp-batman-wallpaper-1920x1080.jpg', 0),
(336, '8zWl891-batman-wallpaper-1920x1080.jpg', 117),
(337, 'batman_11-wallpaper-1920x1080.jpg', 117),
(338, 'batman_11-wallpaper-1920x1080-1654326614.jpg', 118),
(339, 'batman23.jpg', 118),
(340, '8zWl891-batman-wallpaper-1920x1080-1654327271', 121),
(341, 'dGfBYK6-batman-wallpaper-1920x1080.jpg', 122),
(342, 'dsfdf-1654327551.jpg', 122),
(344, 'batman_11-wallpaper-1920x1080-1654327667.jpg', 123),
(348, 'batman_11-wallpaper-1920x1080-1654327839.jpg', 125),
(349, '5WChazv-batman-wallpaper-1920x1080.jpg', 126),
(352, '8zWl891-batman-wallpaper-1920x1080-1654329127', 129),
(353, 'batman_11-wallpaper-1920x1080-1654329127.jpg', 129),
(354, 'redmi note 9-1654329192.jpg', 130),
(355, 'redmi note 9-2-1654329192.jpg', 130),
(356, 'download (1).jpg', 131),
(357, 'download-1654329377.jpg', 131),
(360, 'redmi note 9-1654332504.jpg', 98),
(362, 'redmi note 9-2-1654371714.jpg', 107);

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
  `stock_currentCount` int(11) NOT NULL,
  `stock_res_date` date NOT NULL,
  `stock_color` varchar(50) NOT NULL,
  `stock_cost_per_unit` decimal(10,2) NOT NULL,
  `stock_product_reg_price` decimal(10,2) NOT NULL,
  `stock_amount_paid` decimal(10,2) NOT NULL,
  `category_category_id` int(11) NOT NULL,
  `brand_brand_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `product_model_id` int(11) NOT NULL,
  `stock_status` tinyint(4) NOT NULL DEFAULT 1,
  `grn_grn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_count`, `stock_currentCount`, `stock_res_date`, `stock_color`, `stock_cost_per_unit`, `stock_product_reg_price`, `stock_amount_paid`, `category_category_id`, `brand_brand_id`, `product_product_id`, `product_model_id`, `stock_status`, `grn_grn_id`) VALUES
(68, 23423, 0, '2022-06-07', '#6b0f0f', '2342.00', '54856666.00', '2342.00', 1, 60, 99, 11, 1, 64),
(69, 23423, 0, '2022-06-07', '#c75757', '2342.00', '54856666.00', '2342.00', 1, 60, 99, 14, 1, 64),
(70, 45654, 0, '2022-06-09', '#b54545', '5464.00', '99999999.99', '546.00', 1, 60, 99, 11, 1, 65),
(71, 34534, 0, '2022-05-31', '#d23737', '3453.00', '99999999.99', '3453.00', 1, 60, 99, 11, 1, 66),
(72, 34534, 0, '2022-05-31', '#b23434', '3453.00', '99999999.99', '3453.00', 1, 60, 99, 14, 1, 66);

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
  `supplier_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `company_email`, `company_address1`, `company_address2`, `company_address3`, `company_contact1`, `company_contact2`, `supplier_age`, `supplier_name`, `supplier_email`, `supplier_contact`, `supplier_status`) VALUES
(1, 'reter', 'tretre@gmail.com', 'tretret', 'retret', 'retretre', '', '0712398563', '1998-01-27', 'ruwan', 'retert@gmail.com', '0712487348', 1),
(2, 'hellophones', 'gsdg@gmail.com', '1195/B/1', '23523 5', '23 23  ', '0712598635', '', '2000-10-04', 'ruwan', 'hhjds@gmail.com', '0756483952', 1);

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
(812, 'Gayan', 'Fonseka', '2000-10-23', '0', '200028903687', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1654245126_20191011_111629.jpg', 1, '2022-02-05', '2022-06-10 07:27:16', 1),
(813, 'Mary', 'Fonseka', '2000-07-15', '1', '200028903612', '', '0112932801', 'mary@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-02-05', '2022-06-10 07:08:12', 0),
(814, 'Nimal', 'Perera', '2000-02-01', '1', '200028903684', '', '0112932801', 'nimal@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1652249338_20190108_165035.jpg', 1, '2022-02-05', '2022-06-09 04:43:13', 1),
(815, 'Julie', 'Samson', '2000-08-11', '0', '200028903601', '', '0112932801', 'julie@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1652208134_20191224_215347.jpg', 0, '2022-02-05', '2022-05-10 18:42:14', 0),
(816, 'Somana', 'Fonseka', '2000-01-10', '1', '200028903680', '0714569899', '0112932801', 'somana@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1652249436_20190108_143526.jpg', 0, '2022-02-05', '2022-05-11 06:10:36', 1),
(817, 'Gayan', 'Fonseka', '2000-10-15', '1', '200028903630', '0756483952', '0112932801', 'gayan9@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1652249411_20190108_164939.jpg', 0, '2022-02-06', '2022-06-09 04:41:40', 0),
(818, 'Kokila', 'Fonseka', '2000-11-07', '0', '200028903681', '', '0112932801', 'kokila12@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1652250768_20190108_165035.jpg', 1, '2022-02-08', '2022-05-11 06:32:48', 1),
(819, 'Gayan', 'Fonseka', '1998-06-03', '1', '199828903688', '', '0112932801', 'gayan8@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1652238858_batman23.jpg', 1, '2022-02-08', '2022-05-11 03:14:18', 1),
(820, 'Gayan', 'Fonseka', '2002-02-17', '1', '200228903687', '', '0112932801', 'gayan5@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-02-08', '2022-05-12 18:26:24', 1),
(821, 'Sunill', 'Perera', '2001-06-22', '1', '200128903687', '0756483952', '0112932801', 'sunil@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', '1652240629_20191104_111410.jpg', 1, '2022-02-22', '2022-05-11 06:03:57', 0),
(822, 'Gayan', 'Fonseka', '2000-02-05', '1', '200028903686', '', '0112932801', 'gayan12@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-04-13', '2022-05-11 06:03:12', 1),
(823, 'Sigithi', 'Athukorala', '1998-10-13', '1', '199828903687', '0756483952', '0112932801', 'athukorala@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-05-11', '2022-05-11 08:59:01', 1),
(824, 'Gayan', 'Fonseka', '2000-05-12', '1', '200028904345', '', '0112932801', 'gayan4@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-05-28', '2022-05-28 04:40:27', 1),
(825, 'Gayan', 'Fonseka', '2002-02-06', '1', '200223433566', '', '0112932801', 'gayan23@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-05-28', '2022-05-28 04:43:21', 1),
(826, 'Gayan', 'Fonseka', '2003-02-19', '1', '200345678906', '', '0112932801', 'sandaruwan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-05-28', '2022-05-28 04:45:20', 1),
(827, 'Gayan', 'Fonseka', '2000-02-08', '1', '200028903685', '', '0112932801', 'pathirana@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-05-28', '2022-05-28 04:47:31', 1),
(828, 'Gayan', 'Fonseka', '2004-02-11', '1', '200428903687', '0756483952', '0112932801', 'gayan123@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-05-28', '2022-06-09 07:32:24', 0),
(829, 'Gayan', 'Fonseka', '2000-10-23', '1', '200028903687', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '0000-00-00', '2022-05-28 07:46:43', 1),
(830, 'Gaya', 'Fonseka', '2000-10-23', '1', '200028903687', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '0000-00-00', '2022-05-28 07:46:54', 1),
(831, 'Gayan', 'Fonseka', '2001-06-06', '1', '200128903683', '0756483952', '0112932801', 'gayan43@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-06-03', '2022-06-03 09:15:11', 1),
(832, 'Gayan', 'Fonseka', '2002-01-10', '1', '200229905545', '', '0112932801', 'sandaruwan323@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', 1, '2022-06-03', '2022-06-03 09:17:16', 1);

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
(2, 822),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 823),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 820),
(2, 820),
(5, 820),
(1, 820),
(2, 820),
(5, 820),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 813),
(2, 813),
(5, 813),
(1, 813),
(2, 813),
(5, 813),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 813),
(2, 813),
(5, 813),
(1, 824),
(2, 824),
(5, 824),
(1, 825),
(2, 825),
(5, 825),
(1, 826),
(2, 826),
(5, 826),
(1, 827),
(2, 827),
(5, 827),
(1, 828),
(2, 828),
(5, 828),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 829),
(2, 829),
(5, 829),
(1, 830),
(2, 830),
(5, 830),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 813),
(2, 813),
(5, 813),
(1, 813),
(2, 813),
(5, 813),
(1, 813),
(2, 813),
(5, 813),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 813),
(2, 813),
(5, 813),
(1, 813),
(2, 813),
(5, 813),
(1, 813),
(2, 813),
(5, 813),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 813),
(2, 813),
(5, 813),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 831),
(2, 831),
(5, 831),
(1, 832),
(2, 832),
(5, 832),
(1, 812),
(2, 812),
(5, 812),
(1, 813),
(2, 813),
(5, 813),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 813),
(2, 813),
(5, 813),
(1, 818),
(2, 818),
(5, 818),
(1, 814),
(2, 814),
(5, 814),
(1, 814),
(2, 814),
(5, 814),
(1, 813),
(2, 813),
(5, 813),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812),
(1, 812),
(2, 812),
(5, 812);

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
-- Indexes for table `headphone_model_image`
--
ALTER TABLE `headphone_model_image`
  ADD PRIMARY KEY (`headphone_model_image_id`);

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cuslogin`
--
ALTER TABLE `cuslogin`
  MODIFY `cusLogin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

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
  MODIFY `grn _id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `headphone_model`
--
ALTER TABLE `headphone_model`
  MODIFY `headphone_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `headphone_model_image`
--
ALTER TABLE `headphone_model_image`
  MODIFY `headphone_model_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_model_a`
--
ALTER TABLE `phone_model_a`
  MODIFY `phone_model_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `phone_model_b`
--
ALTER TABLE `phone_model_b`
  MODIFY `phone_model_b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `phone_model_image`
--
ALTER TABLE `phone_model_image`
  MODIFY `phone_model_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=833;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
