-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2016 at 01:28 PM
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
  `password` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `privilege`) VALUES
(1, 'ashik', '$2y$10$1E0pHeEAI2xFEXHTeaZ8jORTbKl1d9z.PU0Tft73/FzOKflmihWlG', 'Admin'),
(2, 'admin', '$2y$10$iiJY3Hb/1QbTtkUffSdFHezkt04s/n795uK2sqGuS.tNxIH0ASI/O', 'Admin'),
(3, 'xinnah', '$2y$10$1E0pHeEAI2xFEXHTeaZ8jORTbKl1d9z.PU0Tft73/FzOKflmihWlG', 'Admin'),
(5, 'Tanvir', '$2y$10$giVLRJms4GIcjJGOYLK6wez2gdYmXbgSxMwYwiYvQyR1Zz8yPNs9O', 'Sales Man');

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
  `customer_id` int(255) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `contact_person_no` varchar(50) NOT NULL,
  `customer_balance` varchar(100) NOT NULL,
  `customer_payment_due` varchar(1000) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_address`, `contact_person`, `contact_person_no`, `customer_balance`, `customer_payment_due`) VALUES
(8, 'xinnah', '01832059065', '', '', '', '', '40'),
(9, 'Ashik', '01788314078', '', '', '', '', '100');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE IF NOT EXISTS `customer_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(255) NOT NULL,
  `pay_amount` int(255) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `pay_time_date` datetime NOT NULL,
  `received_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customer` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`id`, `customer_id`, `pay_amount`, `notes`, `pay_time_date`, `received_by`) VALUES
(19, 9, 1200, 'readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a moreless normal distribution of letters', '2016-03-04 11:25:17', 'ashik'),
(20, 8, 100, 'sadfasdfsaf', '2016-03-04 11:27:43', 'ashik'),
(21, 9, 300, ' dsadfsadfsadfsadfsadfsadfsafsadfsadfsad', '2016-03-04 11:34:35', 'ashik'),
(22, 8, 50, '', '2016-03-04 11:37:41', 'ashik'),
(23, 8, 400, 'demo payment for pen', '2016-03-04 16:27:43', 'xinnah'),
(24, 8, 100, 'pay to customer for pen', '2016-03-04 16:28:38', 'xinnah');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_receipts`
--

CREATE TABLE IF NOT EXISTS `delivery_receipts` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `delivery_receipts_no` varchar(50) NOT NULL,
  `sales_order_no` varchar(50) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `uom` varchar(255) NOT NULL,
  `ordered_quantity` varchar(50) NOT NULL,
  `quantity_delivered` varchar(50) NOT NULL,
  `remaining_quantity` varchar(50) NOT NULL,
  `delivered_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `delivery_receipts`
--

INSERT INTO `delivery_receipts` (`id`, `date`, `delivery_receipts_no`, `sales_order_no`, `customer_id`, `product_description`, `uom`, `ordered_quantity`, `quantity_delivered`, `remaining_quantity`, `delivered_by`) VALUES
(5, '2016-02-23', '1', '1', '8', 'Laptop', 'Box = (100 pcs)', '1', '1', '0', 'xinnah');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `sl_no` int(255) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `specification` varchar(250) DEFAULT NULL,
  `uom` varchar(50) DEFAULT NULL,
  `purchase_cost_per_unit` varchar(100) NOT NULL,
  `sales_price_per_unit` varchar(100) NOT NULL,
  `warehouse_stock` varchar(25) NOT NULL,
  `shop_stock` varchar(25) NOT NULL,
  `total_stock` varchar(25) NOT NULL,
  `stock_value_on_purchase` varchar(100) NOT NULL,
  `stock_value` varchar(100) NOT NULL,
  `stock_value_on_sale` varchar(100) NOT NULL,
  `purchase_order_ref` varchar(100) NOT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`sl_no`, `barcode`, `product_name`, `category`, `product_code`, `brand`, `model`, `specification`, `uom`, `purchase_cost_per_unit`, `sales_price_per_unit`, `warehouse_stock`, `shop_stock`, `total_stock`, `stock_value_on_purchase`, `stock_value`, `stock_value_on_sale`, `purchase_order_ref`, `added_by`) VALUES
(53, '', 'pen', 'Laptop Accessories', '', 'Apple', '', '', 'Pcs', '10', '12', '5', '15', '20', '200', '', '240', '', 'Md Ali Zinnah'),
(54, '543254', 'Shirt', 'Others', '2441564', 'HP', 'XFDDF', 'dsafhsdafsd', 'Box = (100 pcs)', '500', '600', '10', '6', '16', '10000', '', '12000', '56412', 'Md Ali Zinnah'),
(55, 'WESAS1422', 'laptop', 'Laptop Accessories', '2441565', 'Apple', 'SMISDA2154', 'sfdsf', 'Box = (100 pcs)', '100', '120', '5', '14', '19', '2000', '', '2400', '541212', 'admin'),
(56, '48518651', 'iPhone ', 'Others', '2441566', 'Apple', 'I_PHONE42', 'KLJKdf', 'Box = (100 pcs)', '100000', '120000', '10', '10', '20', '300000', '', '360000', '455123', 'admin'),
(57, '', ' Samsung Phone', 'Others', '2441567', 'Samsung', 'SLM-3', 'dfdsfdsf', 'Box = (12pcs)', '5000', '6000', '10', '10', '20', '80000', '', '96000', '54712', 'xinnah'),
(58, '48518651', 'iPhone ', 'Others', '2441568', 'Apple', 'I_PHONE42', 'KLJKdf', 'Box = (100 pcs)', '100000', '120000', '10', '10', '20', '300000', '', '360000', '455123', 'ashik'),
(59, '48518651', 'Asus ', 'Truck', '2441569', 'Apple', 'dsfa', 'KLJKdf', 'Box = (100 pcs)', '100000', '120000', '0', '1', '1', '40000', '', '30000', '455123', 'Farfafor'),
(60, '48518651', 'Asus ', 'Truck', '2441570', 'Apple', 'dsfa', 'KLJKdf', 'Box = (100 pcs)', '100000', '120000', '0', '1', '1', '40000', '', '30000', '455123', 'Zinnah'),
(61, '48518651', 'Asus ', 'Truck', '2441571', 'Apple', 'dsfa', 'KLJKdf', 'Box = (100 pcs)', '100000', '120000', '0', '1', '1', '40000', '', '30000', '455123', 'Ashik'),
(62, '48518651', 'Asus ', 'Truck', '2441572', 'Apple', 'dsfa', 'KLJKdf', 'Box = (100 pcs)', '100000', '120000', '0', '1', '1', '40000', '', '30000', '455123', 'Shakil'),
(63, '48518651', 'Asus ', 'Truck', '2441573', 'Apple', 'dsfa', 'KLJKdf', 'Box = (100 pcs)', '100000', '120000', '0', '1', '1', '40000', '', '30000', '455123', 'Saddam'),
(64, '48518651', 'Asus ', 'Truck', '2441574', 'Apple', 'dsfa', 'KLJKdf', 'Box = (100 pcs)', '100000', '120000', '0', '1', '1', '40000', '', '30000', '455123', 'Mushdiq'),
(65, '48518651', 'Asus ', 'Truck', '2441575', 'Apple', 'dsfa', 'KLJKdf', 'Box = (100 pcs)', '100', '120', '0', '1', '1', '100', '', '120', '455123', 'Ashik'),
(66, '48518651', 'Pepsi', 'Others', '2441576', 'Apple', 'Black', 'KLJKdf', 'Box = (100 pcs)', '80', '1000', '17', '4', '21', '300000', '', '360000', '455123', 'Tanveer');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `invoice_date` date NOT NULL,
  `customer_id` int(255) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_description` text NOT NULL,
  `uom` text NOT NULL,
  `cost_per_unit` varchar(1000) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `quantity` varchar(1000) NOT NULL,
  `cost_amount` varchar(255) NOT NULL,
  `amount` varchar(1000) NOT NULL,
  `vat` varchar(1000) NOT NULL,
  `delivery_charge` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_date`, `customer_id`, `invoice_no`, `notes`, `barcode`, `product_description`, `uom`, `cost_per_unit`, `price`, `quantity`, `cost_amount`, `amount`, `vat`, `delivery_charge`, `total`, `paid`, `due`) VALUES
(22, '2016-02-23', 8, '1', '', 'WESAS1422 , 48518651', 'laptop , Pepsi', 'Box = (100 pcs) , Box = (100 pcs)', '100 , 80', '120 , 1000', '2 , 1', '200 , 80', '240.00 , 1000', '62.00', '8', '', '1300', '10.00'),
(23, '2016-02-23', 9, '2', '', 'WESAS1422', 'laptop', 'Box = (100 pcs)', '100', '120', '1', '100', '120', '0', '', '', '', '120.00'),
(24, '2016-02-23', 9, '3', '', '48518651', 'Pepsi', 'Box = (100 pcs)', '80', '1000', '1', '80', '1000', '0', '', '', '', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logo_section`
--

CREATE TABLE IF NOT EXISTS `logo_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `logo_section`
--

INSERT INTO `logo_section` (`id`, `image`, `name`) VALUES
(1, '1.png', 'korea IT');

-- --------------------------------------------------------

--
-- Table structure for table `overhead_cost`
--

CREATE TABLE IF NOT EXISTS `overhead_cost` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cost_label` varchar(50) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `total_cost` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `overhead_cost`
--

INSERT INTO `overhead_cost` (`id`, `date`, `cost_label`, `notes`, `total_cost`) VALUES
(15, '2016-02-23', 'Cost', 'Service', '40');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE IF NOT EXISTS `product_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(50) NOT NULL,
  `po_date` date NOT NULL,
  `purchase_order_no` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `uom` varchar(50) NOT NULL,
  `cost_per_unit` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `delivery_charge` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `po_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `supplier_id`, `po_date`, `purchase_order_no`, `product_description`, `uom`, `cost_per_unit`, `quantity`, `amount`, `vat`, `tax`, `delivery_charge`, `total`, `paid`, `due`, `po_status`) VALUES
(1, '1', '2016-03-03', '', '', '', '', '', '600', '90', '0', '55', '745', '245', '500', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `quotation_date` date NOT NULL,
  `customer_id` int(255) NOT NULL,
  `quotation_no` varchar(50) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `uom` varchar(255) NOT NULL,
  `cost_per_unit` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `delivery_charge` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `sales_order_no` varchar(50) NOT NULL,
  `delivery_receipt_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `quotation_date`, `customer_id`, `quotation_no`, `notes`, `barcode`, `product_description`, `uom`, `cost_per_unit`, `price`, `quantity`, `amount`, `vat`, `delivery_charge`, `discount`, `total`, `sales_order_no`, `delivery_receipt_no`) VALUES
(97, '2016-02-23', 8, '1', '', 'WESAS1422', 'laptop', 'Box = (100 pcs)', '100', '120', '1', '120', '0', '', '', '120.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `replacement`
--

CREATE TABLE IF NOT EXISTS `replacement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `notes` text NOT NULL,
  `previous_item` text NOT NULL,
  `replaced_item` text NOT NULL,
  `cost_adjusted` varchar(255) NOT NULL,
  `amount_to_be_adjusted` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `replace_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `replacement`
--

INSERT INTO `replacement` (`id`, `date`, `customer_id`, `invoice_no`, `notes`, `previous_item`, `replaced_item`, `cost_adjusted`, `amount_to_be_adjusted`, `vat`, `replace_by`) VALUES
(12, '2016-02-23', 8, 1, '', 'a:7:{s:7:"barcode";s:9:" 48518651";s:19:"product_description";s:6:" Pepsi";s:3:"uom";s:16:" Box = (100 pcs)";s:13:"cost_per_unit";s:3:" 80";s:14:"price_per_unit";s:5:" 1000";s:8:"quantity";s:2:" 1";s:6:"amount";s:5:" 1000";}', 'a:7:{s:7:"barcode";s:9:"WESAS1422";s:19:"product_description";s:6:"laptop";s:3:"uom";s:15:"Box = (100 pcs)";s:13:"cost_per_unit";s:3:"100";s:14:"price_per_unit";s:3:"120";s:8:"quantity";s:1:"2";s:6:"amount";s:6:"240.00";}', '-120', '760', '0', 'xinnah'),
(13, '2016-02-23', 8, 1, '', 'a:7:{s:7:"barcode";s:10:"WESAS1422 ";s:19:"product_description";s:7:"laptop ";s:3:"uom";s:16:"Box = (100 pcs) ";s:13:"cost_per_unit";s:4:"100 ";s:14:"price_per_unit";s:4:"120 ";s:8:"quantity";s:2:"2 ";s:6:"amount";s:7:"240.00 ";}', 'a:7:{s:7:"barcode";s:9:"WESAS1422";s:19:"product_description";s:6:"laptop";s:3:"uom";s:15:"Box = (100 pcs)";s:13:"cost_per_unit";s:3:"100";s:14:"price_per_unit";s:3:"120";s:8:"quantity";s:1:"3";s:6:"amount";s:6:"360.00";}', '-100', '-120', '0', 'xinnah'),
(14, '2016-02-23', 8, 1, '', 'a:7:{s:7:"barcode";s:9:" 48518651";s:19:"product_description";s:6:" Pepsi";s:3:"uom";s:16:" Box = (100 pcs)";s:13:"cost_per_unit";s:3:" 80";s:14:"price_per_unit";s:5:" 1000";s:8:"quantity";s:2:" 1";s:6:"amount";s:5:" 1000";}', 'a:7:{s:7:"barcode";s:6:"543254";s:19:"product_description";s:5:"Shirt";s:3:"uom";s:15:"Box = (100 pcs)";s:13:"cost_per_unit";s:3:"500";s:14:"price_per_unit";s:3:"600";s:8:"quantity";s:1:"2";s:6:"amount";s:7:"1200.00";}', '-920', '-200', '0', 'xinnah'),
(15, '2016-03-04', 8, 1, '', 'a:7:{s:7:"barcode";s:10:"WESAS1422 ";s:19:"product_description";s:7:"laptop ";s:3:"uom";s:16:"Box = (100 pcs) ";s:13:"cost_per_unit";s:4:"100 ";s:14:"price_per_unit";s:4:"120 ";s:6:"amount";s:7:"240.00 ";s:8:"quantity";s:1:"1";}', 'a:7:{s:7:"barcode";s:6:"543254";s:19:"product_description";s:5:"Shirt";s:3:"uom";s:15:"Box = (100 pcs)";s:13:"cost_per_unit";s:3:"500";s:14:"price_per_unit";s:3:"600";s:8:"quantity";s:1:"1";s:6:"amount";s:3:"600";}', '-400', '-360', '0', 'xinnah');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `so_date` date NOT NULL,
  `customer_id` int(255) NOT NULL,
  `sales_order_no` varchar(20) NOT NULL,
  `quotation_no` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `uom` varchar(255) NOT NULL,
  `cost_per_unit` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `delivery_charge` varchar(255) NOT NULL,
  `total` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `so_date`, `customer_id`, `sales_order_no`, `quotation_no`, `invoice_no`, `notes`, `barcode`, `product_description`, `uom`, `cost_per_unit`, `price`, `quantity`, `amount`, `vat`, `delivery_charge`, `total`, `paid`, `due`) VALUES
(13, '2016-02-23', 8, '1', '', '', '', 'WESAS1422', 'laptop', 'Box = (100 pcs)', '100', '120', '1', '120', '0', '', '', '', '120.00'),
(14, '2016-02-23', 9, '2', '', '', '', 'WESAS1422', 'laptop', 'Box = (100 pcs)', '100', '120', '1', '120', '0', '', '', '', '120.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_person`
--

CREATE TABLE IF NOT EXISTS `sales_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_person_name` varchar(255) NOT NULL,
  `sales_person_phone` varchar(255) NOT NULL,
  `sales_person_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(255) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` varchar(15) NOT NULL,
  `supplier_address` varchar(200) NOT NULL,
  `supplier_balance` varchar(100) NOT NULL,
  `due_to_supplier` varchar(1000) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_address`, `supplier_balance`, `due_to_supplier`) VALUES
(1, 'Zinnah', '01832059065', 'Nikunja', '', '50');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE IF NOT EXISTS `supplier_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(255) NOT NULL,
  `pay_amount` int(255) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `pay_time_date` datetime NOT NULL,
  `received_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_supplier` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `supplier_payment`
--

INSERT INTO `supplier_payment` (`id`, `supplier_id`, `pay_amount`, `notes`, `pay_time_date`, `received_by`) VALUES
(13, 1, 450, '', '2016-03-03 17:55:00', 'ashik'),
(14, 1, 500, '', '2016-03-03 18:00:57', 'ashik'),
(15, 1, 50, '', '2016-03-03 18:02:40', 'ashik'),
(16, 1, 100, 'dsasdafsadfsadfsadf', '2016-03-04 12:17:11', 'ashik'),
(17, 1, 150, '', '2016-03-04 12:17:31', 'ashik'),
(18, 1, 50, 'pay to supplier', '2016-03-04 17:18:37', 'xinnah');

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

CREATE TABLE IF NOT EXISTS `terms_condition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` text NOT NULL,
  `quotation` text NOT NULL,
  `sales` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `terms_condition`
--

INSERT INTO `terms_condition` (`id`, `invoice`, `quotation`, `sales`) VALUES
(1, '<p>1.These Terms And Conditions, &quot;Agreement&quot; Means These Terms And Conditions And The Terms.</p>\r\n\r\n<p>2.These Terms And Conditions, &quot;Agreement&quot; Means These Terms And Conditions And The Terms And Conditions Set Out On The Attached Buyer&#39;s Order .</p>\r\n\r\n<p>3.These Terms And Conditions, &quot;Agreement&quot; Means These Terms And Conditions And The Terms And Conditions Set Out On The Attached Buyer&#39;s Order .</p>\r\n', '<ol>\r\n	<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over&nbsp;</li>\r\n</ol>\r\n', '<ol>\r\n	<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over&nbsp;</li>\r\n	<li>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_measurement`
--

CREATE TABLE IF NOT EXISTS `unit_of_measurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
