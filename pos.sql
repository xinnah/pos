-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2016 at 06:37 PM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'ashik', '$2y$10$1E0pHeEAI2xFEXHTeaZ8jORTbKl1d9z.PU0Tft73/FzOKflmihWlG'),
(2, 'admin', '$2y$10$iiJY3Hb/1QbTtkUffSdFHezkt04s/n795uK2sqGuS.tNxIH0ASI/O');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `p_o_no` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `purchase_costing` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `delivery_receipts`
--

CREATE TABLE IF NOT EXISTS `delivery_receipts` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `delivery_receipts_no` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `product_description` text NOT NULL,
  `uom` varchar(50) NOT NULL,
  `cost_per_unit` varchar(50) NOT NULL,
  `price_per_unit` varchar(50) NOT NULL,
  `ordered_quantity` varchar(50) NOT NULL,
  `quantity_delivered` varchar(50) NOT NULL,
  `remaining_quantity` varchar(50) NOT NULL,
  `sales_order_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `quotation_reference` varchar(50) NOT NULL,
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
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `sl_no` int(255) NOT NULL AUTO_INCREMENT,
  `customer_id` int(255) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `product_description` text NOT NULL,
  `uom` varchar(50) NOT NULL,
  `cost_per_unit` varchar(50) NOT NULL,
  `price_per_unit` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `delivery_charge` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `overhead_cost`
--

CREATE TABLE IF NOT EXISTS `overhead_cost` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cost_label` varchar(50) NOT NULL,
  `cost_amount` varchar(50) NOT NULL,
  `total_cost` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(50) NOT NULL,
  `purchase_order_no` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `product_description` text NOT NULL,
  `uom` varchar(50) NOT NULL,
  `cost_per_unit` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `taxes` varchar(50) NOT NULL,
  `delivery_charge` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
  `sl_no` int(255) NOT NULL AUTO_INCREMENT,
  `customer_id` int(255) NOT NULL,
  `quotation_no` varchar(20) NOT NULL,
  `product_description` text NOT NULL,
  `uom` varchar(50) NOT NULL,
  `cost_per_unit` varchar(50) NOT NULL,
  `price_per_unit` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `delivery_charge` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `sales_order_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `delivery_receipt_no` varchar(50) NOT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `customer_id` int(255) NOT NULL,
  `quotation_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `total` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
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
