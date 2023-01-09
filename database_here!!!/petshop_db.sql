-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 02:01 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Dog'),
(2, 'cat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `complete_address` varchar(200) DEFAULT NULL,
  `email_address` varchar(500) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `civil_status` varchar(200) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `birth_date` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `image_profile` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`client_id`, `first_name`, `middle_name`, `last_name`, `complete_address`, `email_address`, `contact_number`, `civil_status`, `age`, `birth_date`, `username`, `password`, `status`, `gender`, `image_profile`) VALUES
(2, 'junil', 'a', 'toledo', 'mambugan antipolo city', 'nel@gmail.com', '09789797898', 'marriage', 0, '2021-09-06', 'nel', 'nel123', 'Inactive', 'Male', 'client_uploads/duality-a-kevin-durant-story.png'),
(4, 'nario', 'a', 'luis', 'francisville', 'nario@gmail.com', '09789789879', 'Single', 23, '2021-09-28', 'nario', 'nario123', 'Active', 'Male', 'client_uploads/anduin.png'),
(5, 'richard', 'a', 'toledo', 'mambugan', 'richard@gmail.com', '09776787686', 'Single', 34, '2021-09-08', 'richard', 'richard123', 'Active', 'Male', 'client_uploads/download.png'),
(6, 'jenalyn', 'r', 'onrubia', 'francia', 'jhen@gmail.com', '09575756757', 'Legally Separated', NULL, '2021-09-28', 'jhen', 'jhen123', 'Inactive', 'Female', 'client_uploads/images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `reference_no` varchar(200) DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `item` varchar(200) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `date_created` text NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `reference_no`, `customer_name`, `item`, `qty`, `price`, `status`, `remarks`, `date_created`) VALUES
(2, '170921-208', 'richard', 'Pet beds', '1', '4500', 'Received', 'nakuha kuna ang pinadala niyo na higaan', '2021-09-18 01:55:56'),
(3, '170921-767', 'nario', 'Pet dental care', '1', '560', 'Cancelled', 'nawala ako ng pera', '2021-09-18 01:59:57'),
(4, '170921-120', 'nel', 'Pet grooming', '1', '450', 'Approved', 'salamat sa approved', '2021-09-18 02:01:38'),
(5, '180921-866', 'jhen', 'Pet beds', '5', '8500', 'Received', 'madami ako order', '2021-09-18 12:26:58'),
(6, '180921-767', 'nel', 'Pet dental care', '2', '3500', 'Received', 'ito sa vendor', '2021-09-18 13:55:09'),
(8, '180921-782', 'richard', 'Pet dental care', '4', '6700', 'To Deliver', 'sample lamang ito', '2021-09-18 20:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `reference_no` varchar(200) DEFAULT NULL,
  `amount_paid` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `customers` varchar(200) DEFAULT NULL,
  `paid_by` varchar(200) DEFAULT NULL,
  `process_by` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `reference_no`, `amount_paid`, `status`, `remarks`, `customers`, `paid_by`, `process_by`) VALUES
(3, '120921-9997', '500', 'unpaid', 'hindi pa nakakabayad', 'Luis, Nario', 'ron', 'admin'),
(4, '120921-8255', '660', 'paid', 'bayad na', 'Toledo, Junil', 'kuri', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petmanagement`
--

CREATE TABLE `tbl_petmanagement` (
  `petmanagement_id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `vendor` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petmanagement`
--

INSERT INTO `tbl_petmanagement` (`petmanagement_id`, `description`, `category_name`, `vendor`, `status`, `images`) VALUES
(1, 'desc1', 'Dog', 'Nel', 'good condition', 'uploads/3253.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT NULL,
  `vendor_price` varchar(200) DEFAULT NULL,
  `retail_price` varchar(200) DEFAULT NULL,
  `disc` varchar(200) DEFAULT NULL,
  `vendor` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_code`, `product_name`, `detail`, `category`, `qty`, `vendor_price`, `retail_price`, `disc`, `vendor`, `status`) VALUES
(1, '424-5555', 'Pet grooming', 'fix the animal\'s hair', 'Pet grooming', '1', '500', '200', '', 'Nel', 'paid'),
(2, '234-5435', 'Pet products', 'bed of dog', 'Pet beds', '1', '450', '300', '', 'Maria', 'paid'),
(3, '234-5366', 'cature oral care', 'mouthwash for cat&dog', 'Pet dental care', '1', '600', '588', '2', 'Nel', 'pending'),
(4, '4234-54535', 'supa dog bed', 'ito higaan ni dogie', 'Pet beds', '1', '1000', '980', '2', 'Nel', 'peding');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

CREATE TABLE `tbl_productcategory` (
  `productcategory_id` int(11) NOT NULL,
  `productcategory_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`productcategory_id`, `productcategory_name`) VALUES
(1, 'Pet food'),
(2, 'Pet beds'),
(3, 'Pet dental care'),
(4, 'Pet grooming');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `services_id` int(11) NOT NULL,
  `reference_no` varchar(200) DEFAULT NULL,
  `service` varchar(200) DEFAULT NULL,
  `service_detail` varchar(200) DEFAULT NULL,
  `vendor` varchar(200) DEFAULT NULL,
  `service_fee` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`services_id`, `reference_no`, `service`, `service_detail`, `vendor`, `service_fee`) VALUES
(1, '160921-82054', 'Pet grooming', 'fix hair', 'Nel', '500'),
(2, '160921-77257', 'Pet products', 'shampo', 'Nel', '399'),
(3, '160921-91265', 'Pet care', 'removing kuto', 'Maria', '899');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_category` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `avatar`, `full_name`, `username`, `password`, `contact`, `email`, `user_category`, `status`) VALUES
(3, 'user_uploads/guldan.png', 'admin a. admin', 'admin', 'a1Bz20ym1wql90834wEz02f865b53623b121fd34ee5426c792e5c33af8c227', '09697897979', 'admin@gmail.com', 'administrator', 'Active'),
(4, 'user_uploads/i.png', 'junil a. toledo', 'nel', 'a1Bz20ym1wql90834wEz025fd00371820533da4391a56b59d8c94f921f945d', '09789879879', 'nel@gmail.com', 'admin', 'Active'),
(5, 'user_uploads/900_675_p4-1__20190417115014.png', 'maria o obal', 'maria', 'a1Bz20ym1wql90834wEz02edcac06643020979563080b8345520a27e9fa3bc', '09768686788', 'maria@gmail.com', 'admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergroup`
--

CREATE TABLE `tbl_usergroup` (
  `usergroup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` text DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `allow_add` tinyint(1) DEFAULT 0,
  `allow_edit` tinyint(1) DEFAULT 0,
  `allow_delete` tinyint(1) DEFAULT 0,
  `allow_export` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usergroup`
--

INSERT INTO `tbl_usergroup` (`usergroup_id`, `user_id`, `status`, `description`, `allow_add`, `allow_edit`, `allow_delete`, `allow_export`) VALUES
(1, 3, 'Super Admin', 'control all', 1, 1, 1, 1),
(3, 4, 'Admin Assistant', 'asssistant lang ako', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(11) NOT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `about_company` varchar(500) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `company_name`, `contact_person`, `email`, `contact_number`, `website`, `about_company`, `username`, `password`) VALUES
(1, 'otto shoes', 'erwin estrella', 'nel@gmail.com', '096978987999', 'www.nel.com', 'this company is all about shoes', 'nel', 'nel123'),
(2, 'marco food corp.', 'inshek', 'marcofood@gmail.com', '09898798999', 'www.marco.com', 'all about food', 'maria', 'maria123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_petmanagement`
--
ALTER TABLE `tbl_petmanagement`
  ADD PRIMARY KEY (`petmanagement_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
  ADD PRIMARY KEY (`productcategory_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_usergroup`
--
ALTER TABLE `tbl_usergroup`
  ADD PRIMARY KEY (`usergroup_id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_petmanagement`
--
ALTER TABLE `tbl_petmanagement`
  MODIFY `petmanagement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
  MODIFY `productcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_usergroup`
--
ALTER TABLE `tbl_usergroup`
  MODIFY `usergroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
