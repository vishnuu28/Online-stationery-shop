-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2024 at 10:33 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stationery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@stationery.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `bill_id` int(10) NOT NULL,
  `bill_date` date NOT NULL,
  `order_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
CREATE TABLE IF NOT EXISTS `cart_detail` (
  `cart_detail_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`cart_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

DROP TABLE IF EXISTS `category_master`;
CREATE TABLE IF NOT EXISTS `category_master` (
  `cat_id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cat_id`, `category`) VALUES
(1, 'Pen'),
(2, 'Pencil'),
(3, 'Eraser'),
(4, 'book');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

DROP TABLE IF EXISTS `customer_registration`;
CREATE TABLE IF NOT EXISTS `customer_registration` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `gender` varchar(8) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`customer_id`, `customer_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`, `gender`) VALUES
(1, 'Vishnu', 'mograwadi', 'valsad', '9876543210', 'vishnu@yahoo.com', '123456', 'MALE');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `cart_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `shipping_mobile_no` varchar(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `product_name`, `cat_id`, `description`, `price`, `product_img`) VALUES
(1, 'classmate long Notebook Pack Of six', 4, 'Soft Cover, 120 Pages, 272X167mm,single Line(2005035)\r\npack of 6\r\n', 220, 'prod_img/1_1709810688.png'),
(2, 'Navneet Youva', 4, 'Soft Bound/Soft Cover Long Book/Notebook For Students | 21 Cm X 29.7 Cm | Single Line | 172 Pages | Pack Of 6', 400, 'prod_img/2_1709811239.png'),
(3, 'Apsara Mahabar', 4, 'foolscap Longbook33x21 Pages 320 Unruled', 480, 'prod_img/3_1709811379.png'),
(4, 'Hauser XO Ball Pen Tumbler ', 1, 'Hauser XO 0.7mm Ball Pen Tumbler | Sleek Body & Minimalistic Design | Matt Finish & Solid Body Type ', 446, 'prod_img/4_1709811619.png'),
(5, 'FLAIR Ezee ', 1, 'FLAIR Ezee Click 0.7 to 1 mm Ball Pen Jar Pack | Retractable Mechanism With Comfortable Grip For Smooth Writing | Different Playful Body Colors | Blue Ink, Pack of 25 Pens', 200, 'prod_img/5_1709811802.png'),
(6, 'Parker Vector Mettalix Silver Trim Fountain ', 1, 'Parker Vector Mettalix Silver Trim Fountain Pen With Free Quink Blue Ink Bottle (Ink - Blue)', 495, 'prod_img/6_1709811930.png'),
(7, 'Apsara Platinum Extra ', 2, 'Apsara Platinum Extra Dark Pack of 10 Box of 100 Pencils', 600, 'prod_img/7_1709812053.png'),
(8, 'Doms Groove Super Dark Graphite Pencils ', 2, 'Doms Groove Super Dark Graphite Pencils | Innovative Groove For Perfect Grip | Tumbler Set Of 100 Pieces, Multicoloured, Pack Of 1 (DM8438)', 600, 'prod_img/8_1709812154.png'),
(9, 'Doms Color Erasers Jar Pack  ', 3, 'Doms Color Erasers Jar Pack | for Clean & Clear Erasing | Dust Free, Non-Toxic & Safe for Kids | Lesser Flakes & Non Messy | Vibrant Body Colors | Pack of 100 Erasers', 100, 'prod_img/9_1709812260.png'),
(10, 'Doms Triangular Dust Free Fragrance Eraser Jar ', 3, 'Doms Triangular Dust Free Fragrance Eraser Jar Pack | Clean, Dust Free & Good Erasing  | Pack of 50 Pieces', 200, 'prod_img/10_1709812426.png'),
(11, 'FunBlast Professional pencil', 2, 'FunBlast Professional Sketching & Drawing Art  Kit - Drawing Pencils , Graphite Pencil Set, Art Pencils, Shading Pencils Set of 29 Pcs', 923, 'prod_img/11_1709812707.png'),
(12, 'Apsara Mahabar foolscap', 4, 'Apsara Mahabar(foolscap) Longbook33x21 Pages 160 Single Line', 375, 'prod_img/12_1710264251.png'),
(13, 'Edulearnable College Spiral Notebook', 4, 'Edulearnable College Spiral Notebook,A5 3 Pcs pack,Size 5.5x8.2 inches Blank Travel Writing Notebooks Journal,Memo Notepad Sketchbook,Students Office Business Subject Diary Book Journal-Black Cover', 555, 'prod_img/13_1710264352.png'),
(14, 'Navneet Youva pack of three', 4, 'Navneet Youva | My Notes Case Bound Note Book | Single Line | B6 Size | 192 Pages | Pack of 3', 435, 'prod_img/14_1710264466.png'),
(15, 'Brustro Artists Fineart Graphite Pencil', 2, 'Brustro Artists Fineart Graphite Pencil Set of 12 (10B-2H) with Elegant Tin Box', 400, 'prod_img/15_1710264745.png'),
(16, 'BRUSTRO Artists FINEART Graphite Pencil ', 2, 'BRUSTRO Artists â€™ FINEART Graphite Pencil Set of 12 (10B-2H) with Brustro Artists Sketchbook A6 Size Wiro Bound 116 Pages 160 GSM', 565, 'prod_img/16_1710264950.png'),
(17, 'Sunnyglade one forty five Piece Deluxe Art Set', 2, 'Sunnyglade 145 Piece Deluxe Art Set, Wooden Art Box & Drawing Kit with Crayons, Oil Pastels, Colored Pencils, Watercolor Cakes, Sketch Pencils, Paint Brush, Sharpener, Eraser, Color Chart', 2145, 'prod_img/17_1710265075.png'),
(18, 'Reynolds TRIMAX BLUE five COUNT ', 1, 'Reynolds TRIMAX BLUE - 5 COUNT | Roller Ball Point Pen set With Comfortable Grip | Pens For Writing | School and Office Stationery | 0.5mm Tip', 210, 'prod_img/18_1710265167.png'),
(19, 'Parker Classic Antimicrobial ', 1, 'Parker Classic Antimicrobial Cion Coated Ball Pen | Ink Color - Blue | Special Gift For Employees | Leading Pen For Corporate', 645, 'prod_img/19_1710265246.png'),
(20, 'Parker Vector Standard Roller Ball', 1, 'Parker Vector Standard Roller Ball Pen and Ball Pen - Blue Body, Pack of 3', 1650, 'prod_img/20_1710265332.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
