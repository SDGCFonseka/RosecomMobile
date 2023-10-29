-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 03:05 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL,
  `category_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `driver_email` varchar(45) NOT NULL,
  `driver_contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `login_status` tinyint(4) NOT NULL,
  `login_pwChange` tinyint(4) NOT NULL,
  `user_user_id` int(11) NOT NULL,
  `role_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_status`, `login_pwChange`, `user_user_id`, `role_role_id`) VALUES
(457, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 727, 0),
(458, 'R181284', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 728, 0),
(459, 'gayan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 0, 729, 0);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(45) NOT NULL,
  `module_image` varchar(45) NOT NULL,
  `module_url` varchar(45) NOT NULL,
  `module_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_color` varchar(45) NOT NULL,
  `product description` varchar(100) NOT NULL,
  `product_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL,
  `role_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_status`) VALUES
(1, 'super_user', 0);

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
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_nic` varchar(255) NOT NULL,
  `user_mobile_no` varchar(20) NOT NULL,
  `user_landline_no` varchar(20) NOT NULL,
  `user_email_address` varchar(255) NOT NULL,
  `user_address1` varchar(255) NOT NULL,
  `user_address2` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_profile_image` varchar(255) NOT NULL,
  `user_reg_date` date NOT NULL,
  `user_last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_dob`, `user_gender`, `user_nic`, `user_mobile_no`, `user_landline_no`, `user_email_address`, `user_address1`, `user_address2`, `user_city`, `user_profile_image`, `user_reg_date`, `user_last_update`, `user_status`) VALUES
(727, 'Gaya', 'Fonseka', '2022-01-13', '0', '200028903687', '', '0112932801', 'sandaruwan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageF.jpg', '0000-00-00', '2022-01-19 09:07:31', 0),
(728, 'Gayann', 'Fonseka', '2022-01-13', '1', '200028903610', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', '0000-00-00', '2022-01-19 09:13:16', 0),
(729, 'Gayan', 'Fonseka', '2022-01-06', '1', '200028903680', '', '0112932801', 'gayan@gmail.com', '1195/B/1', 'Dalupitiya road, Hunupitiya', 'Wattala', 'defaultimageM.jpg', '0000-00-00', '2022-01-19 09:26:38', 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `grn`
--
ALTER TABLE `grn`
  ADD PRIMARY KEY (`grn _id`);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_license_img`
--
ALTER TABLE `driver_license_img`
  MODIFY `driver_licnese_img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grn`
--
ALTER TABLE `grn`
  MODIFY `grn _id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=730;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
