-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2018 at 05:24 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `woodstock`
--
CREATE DATABASE IF NOT EXISTS `woodstock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `woodstock`;

-- --------------------------------------------------------

--
-- Table structure for table `5b0e90866eeff`
--

CREATE TABLE IF NOT EXISTS `5b0e90866eeff` (
  `itemid` varchar(100) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(11) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `5b0e90866eeff`
--

INSERT INTO `5b0e90866eeff` (`itemid`, `price`, `iname`, `QTY`, `IPRICE`) VALUES
('5ad7e835e7e70', NULL, 'Forzza Damien Queen Size Bed (Matt Finish, Wenge)', 1, 10999);

-- --------------------------------------------------------

--
-- Table structure for table `5b0e90866ef1a`
--

CREATE TABLE IF NOT EXISTS `5b0e90866ef1a` (
  `serialid` varchar(100) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(20) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'prepare for dispatch',
  `delivery_date` date DEFAULT NULL,
  PRIMARY KEY (`serialid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `5b0e90866ef1a`
--

INSERT INTO `5b0e90866ef1a` (`serialid`, `orderid`, `iid`, `iname`, `QTY`, `IPRICE`, `username`, `status`, `delivery_date`) VALUES
('5b0e927aa5852', '5b0e9274c9481', '5ad7e835e7e70', 'Forzza Damien Queen Size Bed (Matt Finish, Wenge)', 1, 10999, 'Karan.kadiya.15@gmail.com', 'prepare for dispatch', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `5b081ffdd725a`
--

CREATE TABLE IF NOT EXISTS `5b081ffdd725a` (
  `itemid` varchar(100) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(11) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `5b081ffdd725a`
--

INSERT INTO `5b081ffdd725a` (`itemid`, `price`, `iname`, `QTY`, `IPRICE`) VALUES
('5b07ca5a297c8', NULL, '3-seater sofa', 1, 36399),
('5b14dc3fa1f18', NULL, 'xyz', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `5b081ffdd7260`
--

CREATE TABLE IF NOT EXISTS `5b081ffdd7260` (
  `serialid` varchar(100) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(20) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'prepare for dispatch',
  `delivery_date` date DEFAULT NULL,
  PRIMARY KEY (`serialid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `5b23a7a780afa`
--

CREATE TABLE IF NOT EXISTS `5b23a7a780afa` (
  `itemid` varchar(100) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(11) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `5b23a7a780afa`
--

INSERT INTO `5b23a7a780afa` (`itemid`, `price`, `iname`, `QTY`, `IPRICE`, `status`) VALUES
('5ad87a5d0d49e', NULL, 'Spacewood Carnival Queen Size Bed without Storage (Natural Wenge)', 1, 10000, 'buy');

-- --------------------------------------------------------

--
-- Table structure for table `5b23a7a780aff`
--

CREATE TABLE IF NOT EXISTS `5b23a7a780aff` (
  `serialid` varchar(100) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(20) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'prepare for dispatch',
  `delivery_date` date DEFAULT NULL,
  PRIMARY KEY (`serialid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `5b23a7a780aff`
--

INSERT INTO `5b23a7a780aff` (`serialid`, `orderid`, `iid`, `iname`, `QTY`, `IPRICE`, `username`, `status`, `delivery_date`) VALUES
('5b23a86eb1f12', '5b23a85f25769', '5b150a6a5403e', 'abc', 1, 23, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL),
('5b23ab5c21508', '5b23ab57b5a93', '5b150a6a5403e', 'abc', 1, 23, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL),
('5b23abeadc5ba', '5b23abe768409', '5b14dc3fa1f18', 'xyz', 1, 10, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL),
('5b23ac592d1ef', '5b23ac4f5dafc', '5b14dc3fa1f18', 'xyz', 1, 10, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL),
('5b23add1c78a4', '5b23adce6cb9d', '5b14dc3fa1f18', 'xyz', 2, 20, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL),
('5b23ae89a4b6b', '5b23ae842c183', '5ad7e835e7e70', 'Forzza Damien Queen Size Bed (Matt Finish, Wenge)', 1, 10999, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL),
('5b23b07c3acc1', '5b23b03194324', '5ad7e835e7e70', 'Forzza Damien Queen Size Bed (Matt Finish, Wenge)', 1, 10999, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL),
('5b23b07c52c9a', '5b23b03194324', '5b07ca5a297c8', '3-seater sofa', 1, 36399, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL),
('5b23b0d703d04', '5b23b0c5a1dc2', '5ad87a5d0d49e', 'Spacewood Carnival Queen Size Bed without Storage (Natural Wenge)', 1, 10000, 'ranarajan49@gmail.com', 'prepare for dispatch', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
('5ad107300ddb2', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `userid` varchar(100) NOT NULL,
  `card_num` bigint(50) NOT NULL,
  `c_holder_nm` varchar(100) NOT NULL,
  `cvv` text NOT NULL,
  `pin` text NOT NULL,
  `exp_date` date DEFAULT NULL,
  `amount` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`userid`, `card_num`, `c_holder_nm`, `cvv`, `pin`, `exp_date`, `amount`) VALUES
('5adcabc9d6fa0', 1234567891011121, 'Ram Kumar', '123', '123456', '2019-03-22', 100000),
('5add7d0b38d6f', 1020304050607080, 'Riya Kumari', '880', '567890', '2019-01-01', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `favourite_tbl`
--

CREATE TABLE IF NOT EXISTS `favourite_tbl` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(100) NOT NULL,
  `fur_name` varchar(100) NOT NULL,
  `fur_price` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `favourite_tbl`
--

INSERT INTO `favourite_tbl` (`f_id`, `c_id`, `fur_name`, `fur_price`, `email_id`) VALUES
(2, '5b07ca5a297c8', '3-seater sofa', '36399', 'ranarajan49@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE IF NOT EXISTS `furniture` (
  `c_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `cost` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `total` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`c_id`, `name`, `description`, `cost`, `color`, `total`, `category`, `image`) VALUES
('5ad7e71e193c6', 'The Original Bedstead Company Mortlake Iron/Metal Queen', 'Manufactured to British Standards (BS1725). Designed to last a lifetime.', 1234, 'black', 1, 'bed', 'store_images/5adc41963875f.jpg'),
('5ad7e60ce2621', 'Urban Ladder Yorktown Trundle Sheesham Wood Single Size Bed (Mahogany)', 'Product Dimensions: Length (98 cm), Width (90 cm), Height (202 cm) Primary Material: Rosewood Color: Mahogany, Style: Contemporary Bed Size: Single Assembly Required: The product requires carpenter assembly and will be provided by the seller', 26999, 'white', 10, 'bed', 'store_images/5ad7e60ce14fa.jpg'),
('5ad7e77c6c527', 'Urban Ladder Merritt Sheesham Wood Single Size Trundle Bed (Mahogany Finish)', 'Product Dimensions: Length (73.3 inches), Width (37.4 inches), Height (6.4 inches) Primary Material: Sheesham Wood', 11999, 'white', 10, 'bed', 'store_images/5ad7e77c6c231.jpg'),
('5ad7e7d9c3916', 'Spacewood Joy Queen Size Bed (Woodpore Finish, Natural Wenge)', 'Product Dimensions: Length (204 cm), Width (157 cm), Height (72 cm) Primary Material: Engineered Wood', 10499, 'natural', 11, 'bed', 'store_images/5ad7e7d9c356d.jpg'),
('5ad7e835e7e70', 'Forzza Damien Queen Size Bed (Matt Finish, Wenge)', 'Product Dimensions: Length (159.5 cm), Width (206.5 cm), Height (88.5 cm) Primary Material: Engineered Wood Color: Wenge, Finish: Matt Finish, Style: Contemporary Bed Size: Queen', 10999, 'black', 6, 'bed', 'store_images/5ad7e835e7af7.jpeg'),
('5ad879a99b2c4', 'Furny Brogan Three Seater Sofa (Grey)', 'Primary Material: Solid wood, Upholstery Material: Premium Fabric Color: Grey, Style: Modern, Seating Capacity: Three seater. Assembly Required: The product requires carpenter assembly and will be provided by the brand/seller. Warranty Details: The 12 months ', 20000, 'gray', 0, 'bed', 'store_images/5ad879a99b2b6.jpg'),
('5ad87a5d0d49e', 'Spacewood Carnival Queen Size Bed without Storage (Natural Wenge)', 'Product Dimensions: Length (81 inches), Width (64 inches), Height (31 inches) Primary Material: Engineered Wood (Particle Board) Color: Natural Wenge, Style: Modern', 10000, 'white', 11, 'bed', 'store_images/5ad87a5d0d1b0.jpg'),
('5ad87ace7dbe6', 'Forzza Leo Four Seater Dining Table Set (Dark Walnut)', 'Length (119 cm), Width (69 cm), Height (73.8 cm) Primary Material: Engineered wood Color: Dark Walnut, Style: Contemporary', 6000, 'dark ', 0, 'dining_table', 'store_images/5ad87ace7d8da.jpg'),
('5add84adc77c7', 'Computer table for student and office use', 'computer table, 2 ft length, 3 ft width', 3000, 'wooden', 20, 'computer_table', 'store_images/5add84adc7561.jpg'),
('5b07ca5a297c8', '3-seater sofa', '84.5'' and very comfortable to seat on', 36399, 'Brown', 2, 'sofa', 'store_images/5b07ca5a28eeb.jpg'),
('5b0cea9085423', 'xyz', 'sad', 122, 'red', 1, 'bed', 'store_images/5b0cee3b395a4.jpg'),
('5b14dc3fa1f18', 'xyz', 'sdasd', 10, 'red', -3, 'popular', 'store_images/5b14dc3fa06a0.jpg'),
('5b150a6a5403e', 'abc', 'asd', 23, 'red', -1, 'popular', 'store_images/5b150a6a526d6.png');

-- --------------------------------------------------------

--
-- Table structure for table `medi_register`
--

CREATE TABLE IF NOT EXISTS `medi_register` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(200) NOT NULL,
  `cart_nm` varchar(100) DEFAULT NULL,
  `order_tbl_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medi_register`
--

INSERT INTO `medi_register` (`name`, `email`, `gender`, `contact`, `dob`, `password`, `cart_nm`, `order_tbl_id`, `status`, `link`) VALUES
('ram', 'ram@gmail.com', 'male', 8092347023, '2005-01-01', 'pkEd11V0upP6k', '5ad84eaee279f', '5ad84eaee27a4', '', ''),
('yunus', 'yunus@gmail.com', 'male', 8903458903, '1998-01-01', 'pkiGDfRUQQd62', '5ad876271f904', '5ad876271f91a', '', ''),
('riya', 'riya@gmail.com', 'female', 7839457982, '2009-01-01', 'pkGsMHguT.loo', '5ad99b3d7f7a3', '5ad99b3d7f7ad', '', ''),
('goku', 'goku@gmail.com', 'male', 7023702370, '2000-01-01', 'pkfQCwYvZKqrI', '5add89d125ef6', '5add89d125efb', '', ''),
('wewqewe', 'cool@gmail.com', 'male', 12323, '1111-11-11', 'pktBmYuUESSfg', '5b07d6bf9daac', '5b07d6bf9dab0', '', ''),
('Karan', 'Karan.kadiya.15@gmail.com', 'male', 2324242342, '0011-01-01', 'pk5EKmtxLALgE', '5b0e90866eeff', '5b0e90866ef1a', 'true', 'Karan.kadiya.15@gmail.comd279b7b85c'),
('Rajan Rana', 'ranarajan49@gmail.com', 'male', 3242342342, '0001-01-01', 'pk5EKmtxLALgE', '5b23a7a780afa', '5b23a7a780aff', 'true', 'ranarajan49@gmail.comdebcaf71be');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE IF NOT EXISTS `order_table` (
  `order_id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `username`, `name`, `address`, `city`, `state`, `pincode`, `email`, `phone`, `status`) VALUES
('5adeb044ac6de', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'Verified'),
('5adeaffe82d52', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5adeafc201a1c', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5adeaf46114a6', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5adeaf437ae90', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5adeaf15a5b47', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5adeaf04c49d3', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5adeaf013a579', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add923b0ff0a', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add91f114ee5', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add91e36b664', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add91d37c373', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add91d0e6d77', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add91b45e948', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add91b22648b', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add9175eb94b', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add916c7ecee', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add9153327cc', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add914707416', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add9138cb6a5', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5add90dcbb94e', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 9732916078, 'verifying'),
('5b07b651563a7', 'ranarajan49@gmail.com', 'Rajan Rana', 'asdasdas', 'ad', 'asd', '380022', 'ranarajan49@gmail.com', 9016577441, 'Verified'),
('5b07baab092e1', 'ranarajan49@gmail.com', 'Rajan Rana', 'sad', 'sad', 'asd', '132123', 'ranarajan49@gmail.com', 2133213132, 'Verified'),
('5b07cc22ecfda', 'ranarajan49@gmail.com', 'Rajan Rana', 'asd', 'dff', 'dfd', '232323', 'ranarajan49@gmail.com', 2132312311, 'Verified'),
('5b07cd3ab8f23', 'ranarajan49@gmail.com', 'Rajan Rana', 'sasd', 'sad', 'sa', '2112', 'ranarajan49@gmail.com', 2131232312, 'Verified'),
('5b090ea109ff6', 'ranarajan49@gmail.com', 'Rajan Rana', 'sdasdsa', 'sadasd', 'asd', '12323', 'ranarajan49@gmail.com', 1221312313, 'Verified'),
('5b0cf7b801951', 'ranarajan49@gmail.com', 'asd', 'sad', 'asd', 'sad', '23', 'w@s.x', 2131231231, 'verifying'),
('5b0e925f40c32', 'Karan.kadiya.15@gmail.com', 'karan', 'asas', 'saaa', 'asd', '3213', 'ds@l.c', 2313231232, 'verifying'),
('5b1a0966557e0', 'ranarajan49@gmail.com', 'Rajan Rana', 'sdas', 'asdasd', 'sasd', '121312', 'sdas@g.com', 1231231231, 'verifying'),
('5b1a0ac1afc8a', 'ranarajan49@gmail.com', 'Rajan Rana', 'asda', 'asddasd', 'sdds', '231323', 'sdas@g.com', 2311231231, 'verifying'),
('5b1a1475606ed', 'ranarajan49@gmail.com', 'llll', 'lllll', 'lllll', 'lllll', '342423', 'qqq@s.x', 2132131223, 'verifying'),
('5b1a15691d474', 'ranarajan49@gmail.com', 'Rajan Rana', 'sadasd', 'sad', 'sad', '121232', 'sadas@sd.c', 1233112322, 'verifying'),
('5b1a159aad89d', 'ranarajan49@gmail.com', 'Rajan Rana', 'asdasdas', 'asdasd', 'asda', '234231', 'dasd@s.xc', 1231231234, 'verifying'),
('5b1a163731cc8', 'ranarajan49@gmail.com', 'Rajan Rana', 'sdasd', 'asdas', '2asdas', '123123', 'dsd@c.d', 2131232312, 'verifying'),
('5b1a198dc026f', 'ranarajan49@gmail.com', 'asdas', 'dasdas', 'asdas', 'sdasd', '231231', 'sadas@ds.cs', 2312312312, 'verifying'),
('5b1a19fc8eb6b', 'ranarajan49@gmail.com', 'kasjdask', 'jksjdka', 'jdaskjdk', 'jdkasjdk', '312312', 'skadjaskd@dk.dd', 8423742384, 'verifying'),
('5b1a1ab01fd62', 'ranarajan49@gmail.com', 'ASdasdas', 'adsd', 'sadasas', 'asdsd', '123243', 'asdsad@d.c', 2133435346, 'verifying'),
('5b1a1b1a72a8e', 'ranarajan49@gmail.com', 'asasd', 'asddas', 'sadjk', 'k', '202020', 'sdm@sd.d', 2101239023, 'verifying'),
('5b1a1b86edf88', 'ranarajan49@gmail.com', 'sdaas', 'skdj', 'jk', 'k', '090009', 'kdk@d.c', 8348484848, 'verifying'),
('5b1a20b963e09', 'ranarajan49@gmail.com', 'sas', 'sd', 'sad', 'asd', '231323', 'ssd@d.c', 1232312331, 'verifying'),
('5b23a84abfff5', 'ranarajan49@gmail.com', 'Rajan Rana', 'asdasd', 'asdas', 'asdas', '231232', 'ranarajan49@gmail.com', 9012323123, 'verifying'),
('5b23ab4194ba6', 'ranarajan49@gmail.com', 'sd', 'as', 'asd', 'asd', '231312', 'ranarajan49@gmail.com', 2312232231, 'verifying'),
('5b23abd5d5d42', 'ranarajan49@gmail.com', 'Rajan Rana', 'sas', 'sa', 'asd', '123231', 'sadas@ds.cs', 2131232132, 'verifying'),
('5b23ac36ad4f0', 'ranarajan49@gmail.com', 'Rajan Rana', 'asd', 'asd', 'asd', '213213', 'asdsad@d.c', 8238812383, 'verifying'),
('5b23adc0135fa', 'ranarajan49@gmail.com', 'sd', 'wdas', 'das', 'dsa', '233423', 'sadas@ds.cs', 1231232132, 'verifying'),
('5b23ae70d1bef', 'ranarajan49@gmail.com', 'sadas', 'dsa', 'as', 'asd', '321121', 'qqq@s.x', 2131231231, 'verifying'),
('5b23afafd7d41', 'ranarajan49@gmail.com', 'sadas', 'sad', 'asd', 's', '213122', 'asdsad@d.c', 1232132131, 'verifying'),
('5b23afe97064a', 'ranarajan49@gmail.com', 'adadsa', 'asdas', 'dsa', 'xcz', '232312', 'asdsad@d.c', 1231231231, 'verifying'),
('5b23b01d7cbaf', 'ranarajan49@gmail.com', 'asd', 'jk', 'k', 'j', '219838', 'asdsad@d.c', 1231231231, 'verifying'),
('5b23b0b3d4822', 'ranarajan49@gmail.com', 'shcjHJ', 'jj', 'hj', 'j', '122812', 'asdsad@d.c', 2132311231, 'verifying');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `order_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nameOnCard` varchar(100) NOT NULL,
  `cardNumber` bigint(16) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `cvv` int(3) DEFAULT NULL,
  `transection_id` varchar(100) DEFAULT NULL,
  `pin` int(10) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`order_id`, `username`, `nameOnCard`, `cardNumber`, `exp_date`, `cvv`, `transection_id`, `pin`) VALUES
('5adeb0478137d', 'ram@gmail.com', 'Riya Kumari', 1020304050607080, '2019-01-01', NULL, '5adeb61f45b82', 567890),
('', 'ram@gmail.com', 'Ram Kumar', 1234567891011121, '2019-03-22', NULL, '5adeb013d4b09', 123456),
('5add92486127c', 'goku@gmail.com', 'Ram Kumar', 1234567891011121, '2019-03-22', NULL, '5add92cbb016a', 123456),
('5adcd0fe73eee', 'ram@gmail.com', 'Ram Kumar', 1234567891011121, '2019-03-22', NULL, '5adcd18775ae4', 123456),
('5b07b6f657d33', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b07cd4b2bc7f', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b090eb9630b9', 'ranarajan49@gmail.com', 'Rajan Rana', 1234545232342342, '2020-01-01', NULL, '5b09171b2202a', 1223),
('5b0cf7c82a8c9', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b0e9274c9481', 'Karan.kadiya.15@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b1a0ae6106b6', 'ranarajan49@gmail.com', 'Rajan Rana', 2123123123123123, '0001-01-01', NULL, '5b1a140fedad3', 2132),
('5b1a148747268', 'ranarajan49@gmail.com', 'asas', 1112123123123122, '0001-01-01', NULL, '5b1a14f9f3119', 1234),
('5b1a1584a54da', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b1a15a878e1b', 'ranarajan49@gmail.com', 'Rajan Rana', 8928939823823872, '0002-02-04', NULL, '5b1a15be131ae', 1234),
('5b1a164ab8921', 'ranarajan49@gmail.com', 'asd', 3131231312311233, '0001-01-01', NULL, '5b1a16583aa77', 2133),
('5b1a199993c9e', 'ranarajan49@gmail.com', 'R', 3213213123121121, '0001-01-01', NULL, '5b1a19ab21129', 1238),
('5b1a1a0c09380', 'ranarajan49@gmail.com', 'rar', 1232838388338383, '0002-12-02', NULL, '5b1a1a1eee1c5', 1239),
('5b1a1ac41d1d7', 'ranarajan49@gmail.com', 'Ra', 7823237123781237, '0001-01-01', NULL, '5b1a1ad009438', 21312),
('5b1a1b2e81602', 'ranarajan49@gmail.com', 'asdda', 2338348348348488, '0001-11-01', NULL, '5b1a1b3fbaede', 5456),
('5b1a20c819950', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b23a85f25769', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b23ab57b5a93', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b23abe768409', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b23ac4f5dafc', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b23adce6cb9d', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b23ae842c183', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b23b03194324', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL),
('5b23b0c5a1dc2', 'ranarajan49@gmail.com', 'Cash on delivery', NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
