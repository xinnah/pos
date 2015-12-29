-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2015 at 07:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `sl_no` int(255) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_balance` varchar(100) NOT NULL,
  `customer_payment_due` varchar(1000) NOT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_history`
--

CREATE TABLE IF NOT EXISTS `customer_history` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `quotation` varchar(100) NOT NULL,
  `sales_order` varchar(150) NOT NULL,
  `delivery_receipt` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `sl_no` int(255) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `band` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `specification` varchar(250) DEFAULT NULL,
  `uom` varchar(50) DEFAULT NULL,
  `purchase_order_ref` varchar(100) NOT NULL,
  `purchase_cost_per_unit` varchar(100) NOT NULL,
  `sales_price_per_unit` varchar(100) NOT NULL,
  `warehouse_stock` varchar(25) NOT NULL,
  `shop_stock` varchar(25) NOT NULL,
  `total_stock` varchar(25) NOT NULL,
  `stock_value_on_purchase` varchar(100) NOT NULL,
  `stock_value` varchar(100) NOT NULL,
  `stock_value_on_sale` varchar(100) NOT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(255) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` varchar(15) NOT NULL,
  `supplier_address` varchar(200) NOT NULL,
  `supplier_balance` varchar(100) NOT NULL,
  `due_to_supplier` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_history`
--

CREATE TABLE IF NOT EXISTS `supplier_history` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(255) NOT NULL,
  `purchase_order` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
