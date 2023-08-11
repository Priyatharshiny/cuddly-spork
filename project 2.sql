-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 02:04 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(11, 'Anjali', 'anjalikediyal@gmail.com', '4dca9ea6c30fdb1719e21d61b50a22e4'),
(12, 'Siddhi', 'siddhi.singh561@gmail.com', 'a2178d258f532ce27060bcab6cdf69cd'),
(13, 'Rifat', 'rifatmulla7@gmail.com', '865494882dfdb3651eb7737b099baaef');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `food_id` int(20) NOT NULL,
  `food_qty` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `datetime`, `status`) VALUES
(48, 'Anjali', 'Kediyal', 'anjall@gmail.com', '9342162244', 'What kind of different different flavors you provide.', '2022-05-01 20:28:55', 1),
(49, 'Siddhi', 'Singh', 'ss@gmail.com', '9023415672', 'How to be a member of this portal.', '2022-05-01 20:30:43', 1),
(50, 'Rifat ', 'Mulla', 'rr@gmail.com', '8923456123', 'What plans you provide for your sellers.', '2022-05-01 20:33:07', 1),
(52, 'Rita', 'Singh', 'rita@gmail.com', '8060809040', 'What kind of quality you provide to your customers.', '2022-05-18 15:43:36', 1),
(54, '       ', '       ', 'efuhwefuhwdu@gmail1244.com23', '      ', '        ', '2023-08-07 16:35:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`) VALUES
(5, 'What are the delivery and shipping charges ?', '<div>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor puru</div>', '2022-03-12 06:55:40'),
(6, ' How many variesties do you offers ?', '<div>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</div>', '2022-03-12 06:58:13'),
(7, 'Is the food you serve is healthy ?', '<div>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis.</div>', '2022-03-12 06:58:48'),
(9, 'How to order from a specific Baker ?', '<div>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</div>', '2022-03-12 06:59:41'),
(10, 'Do you have return policy ?', '<div>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.</div>', '2022-03-12 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `supplier_username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `customer_username`, `supplier_username`, `email`, `message`) VALUES
(13, 'Ifra', 'Starbakers', 'ifra@gmail.com', 'Yummy Delights.'),
(14, 'John', 'Starbakers', 'john@gmail.com', 'Thankyou for your service.'),
(15, 'Rita', 'Starbakers', 'rita@gmail.com', 'Tasty product. Thankyou'),
(17, 'c', 's', 'priyamakenthiran99@gmail.com', 'sc ds'),
(18, 'priya', '', 'priyamakenthiran99@gmail.com', 'good'),
(19, 'lmklaskf', '', 'vevr@grg.vpm', 'kfspapalmfmsdfm'),
(20, 'skdska', '', 'harshini@gmail.com', 'cnaksc');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(100) NOT NULL,
  `full_name` text NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `delivery_date` date NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `full_name`, `phone_no`, `delivery_date`, `address`) VALUES
(1, 'gerg', '25', '2023-08-31', 'fsdfsdg'),
(2, 'Priya', '76', '2023-09-12', 'Jaffna'),
(3, 'Priya', '076 732 30', '2023-09-12', 'Jaffna'),
(5, 'Priya', '076 732 3093', '2023-09-12', 'Jaffna'),
(6, 'Priya', '076 732 3093', '2023-09-12', 'Jaffna'),
(7, 'Priya', '076 732 3093', '2023-09-12', 'Jaffna'),
(8, 'Priya', '076 732 3093', '2023-09-12', 'Jaffna'),
(9, 'Priya', '076 732 3093', '2023-09-12', 'Jaffna'),
(10, 'Pravinth', '076 700 8396', '2023-09-02', 'Jaffna'),
(11, 'Pravinth', '076 700 8396', '2023-09-02', 'Jaffna'),
(12, 'Pravinth', '076 700 8396', '2023-09-02', 'Jaffna'),
(13, 'vithya', '012 586 4589', '2023-08-25', 'mannar'),
(14, 'kavi', '256 856 7485', '2023-09-09', 'fnksjdfkl'),
(15, 'dmams', '456 856 7485', '2023-09-01', 'sfkmal'),
(16, 'Priya', '023 456 1452', '2023-09-09', 'mannar'),
(17, 'harshini', '012 365 4789', '2023-09-01', 'mannar'),
(20, 'priya', '012 546 7532', '2023-09-01', 'mannar'),
(21, 'Priya', '152 456 7548', '2023-09-12', 'fsg'),
(22, 'vithya', '077 300 5857', '2023-11-10', 'Mannar'),
(23, 'Pravinth', '076 700 8396', '2024-03-21', 'Jaffna'),
(24, 'dhdfh', '588 485 6321', '2023-08-10', 'kgk'),
(25, 'dmlask', '145 586 5412', '2023-09-09', 'mlfkwe'),
(26, 'dmlask', '145 586 5412', '2023-09-09', 'mlfkwe'),
(27, 'dfsdkfn', '125 485 9632', '2023-08-25', 'djsjf'),
(28, 'Priya Pravinth', '076 700 8396', '2023-10-31', 'Murunkan');

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE `order_food` (
  `order_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`order_id`, `title`, `image_name`, `price`, `quantity`, `total_price`, `status`) VALUES
(9, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 3, 0.00, ''),
(9, 'Crisped Cookies', 'Food-Name-6176.jpg', 200.00, 1, 0.00, ''),
(10, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 3, 0.00, ''),
(10, 'Crisped Cookies', 'Food-Name-6176.jpg', 200.00, 2, 0.00, ''),
(10, 'Chocolate Cake', 'Food-Name-6945.jpg', 300.00, 1, 0.00, ''),
(13, 'Chocolate sliced', 'Food-Name-8942.jpg', 200.00, 2, 0.00, ''),
(14, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 3, 0.00, ''),
(14, 'Chocolate Bites', 'Food-Name-4058.jpg', 180.00, 1, 0.00, ''),
(15, 'Chocolate Cake', 'Food-Name-6945.jpg', 300.00, 1, 0.00, ''),
(15, 'Chocolate Bites', 'Food-Name-4058.jpg', 180.00, 1, 0.00, ''),
(16, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 1, 0.00, ''),
(16, 'Crisped Cookies', 'Food-Name-6176.jpg', 200.00, 3, 0.00, ''),
(16, 'Chocolate sliced', 'Food-Name-8942.jpg', 200.00, 2, 0.00, ''),
(17, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 2, 180.00, ''),
(18, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 1, 90.00, ''),
(19, 'Chocolate sliced', 'Food-Name-8942.jpg', 200.00, 1, 200.00, ''),
(20, 'Chocolate Cake', 'Food-Name-6945.jpg', 300.00, 2, 600.00, ''),
(20, 'Chocolate Bites', 'Food-Name-4058.jpg', 180.00, 3, 540.00, ''),
(21, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 1, 90.00, ''),
(22, 'Chocolate Cake', 'Food-Name-6945.jpg', 300.00, 2, 600.00, ''),
(23, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 1, 90.00, ''),
(24, 'Priya', 'Food-Name-2984.jpg', 1500.00, 1, 1500.00, ''),
(25, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 1, 90.00, ''),
(27, 'Chocolate Bites', 'Food-Name-4058.jpg', 180.00, 1, 180.00, ''),
(28, 'Vanilla delight', 'Food-Name-5479.jpg', 90.00, 1, 90.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `username`, `email`, `password`) VALUES
(12, 'Cakesmith', 'cakesmith@gmail.com', '202cb962ac59075b964b07152d234b70'),
(13, 'Starbakers', 'starbakers@gmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'Chefdelights', 'chefdelights@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(5, 'demo2', 'demo2', '900150983cd24fb0d6963f7d28e17f72'),
(11, 'abc', 'abc', '900150983cd24fb0d6963f7d28e17f72'),
(12, 'ghk', 'ghk', '0e3442d022f04f39dc2456eafe27ada2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(18, 'Cupcake', 'Food_Category_158.jpg', 'Yes', 'Yes'),
(25, 'Brownie', 'Food_Category_959.jpg', 'Yes', 'Yes'),
(26, 'Cake', 'Food_Category_907.jpg', 'Yes', 'Yes'),
(27, 'Donuts', 'Food_Category_334.jpg', 'Yes', 'Yes'),
(28, 'Ice-Cream', 'Food_Category_828.jpg', 'Yes', 'Yes'),
(29, 'Cookies', 'Food_Category_568.jpg', 'Yes', 'Yes'),
(30, 'Pastries', 'Food_Category_268.jpg', 'Yes', 'Yes'),
(33, 'Chocolates', 'Food_Category_269.jpg', 'Yes', 'Yes'),
(37, 'Food', 'Food_Category_571.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `supplier_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`, `username`, `supplier_location`) VALUES
(36, 'Vanilla delight', 'cripsed sprinkled with Vanilla icing at the top', 90.00, 'Food-Name-5479.jpg', 30, 'Yes', 'Yes', 'Starbakers', 'Mulund'),
(37, 'Crisped Cookies', 'Chocolate flavoured with chocolate syrup cookies.', 200.00, 'Food-Name-6176.jpg', 29, 'Yes', 'Yes', 'Starbakers', 'Mulund'),
(38, 'Chocolate Bites', 'Chocolate brust cake sliced.', 180.00, 'Food-Name-4058.jpg', 25, 'Yes', 'Yes', 'Starbakers', 'Mulund'),
(39, 'Chocolate Cake', 'Chocolate and Vanilla layered cake.', 300.00, 'Food-Name-6945.jpg', 26, 'Yes', 'Yes', 'Cakesmith', 'Thane'),
(40, 'Chocolate sliced', 'Chocolate brust cake sliced.', 200.00, 'Food-Name-8942.jpg', 25, 'Yes', 'Yes', 'Cakesmith', 'Thane');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(150) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `supplier_username` varchar(50) DEFAULT NULL,
  `supplier_location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `supplier_username`, `supplier_location`) VALUES
(23, 'Crisped Cookies', 200.00, 2, 400.00, '2022-05-18 12:45:29', 'Delivered', 'John', '7678398398', 'john@gmail.com', 'Rose Villa, R. M. Road, Thane', 'Starbakers', 'Mulund'),
(24, 'Chocolate Bites', 180.00, 1, 180.00, '2022-05-18 12:47:40', 'Delivered', 'Ifra', '7845342146', 'ifra@gmail.com', '401-jahnvi Apartment, Mulund West', 'Starbakers', 'Mulund'),
(25, 'Pudding', 120.00, 1, 120.00, '2022-05-18 12:51:55', 'Ordered', 'Ifra', '7845342146', 'ifra@gmail.com', '401-jahnvi Apartment, Mulund West', 'Chefdelights', 'Thane'),
(26, 'Vanilla delight', 90.00, 1, 90.00, '2022-05-18 12:55:38', 'On Delivery', 'Rita', '8060809040', 'rita@gmail.com', 'Sector 12, Navi Mumbai, Maharashtra', 'Starbakers', 'Mulund'),
(29, 'Chocolate sliced', 200.00, 2, 400.00, '2023-08-01 01:34:43', 'On Delivery', 'dcdv', '7566', 'vevr@grg.vpm', 'vev', 'Cakesmith', 'Thane'),
(30, 'Chocolate Bites', 180.00, 1, 180.00, '2023-08-09 06:16:38', 'On Delivery', 'Priya Makenthiran', '0767323039', 'priyamakenthiran99@gmail.com', 'Mannar', 'Starbakers', 'Mulund'),
(31, 'Priya', 1500.00, 1, 1500.00, '2023-08-09 06:21:53', 'Ordered', 'Harshiny', '0767323039', 'harshiny@gmail.com', 'mannar', '', ''),
(32, 'Vanilla delight', 90.00, 1, 90.00, '2023-08-09 08:28:21', 'Ordered', 'mflekg', 'egkmekmg', 'efwegq@rgr.com', 'efkewg', 'Starbakers', 'Mulund');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(15, 'Rita', 'rita@gmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 'John', 'john@gmail.com', '202cb962ac59075b964b07152d234b70'),
(17, 'Ifra', 'ifra@gmail.com', '202cb962ac59075b964b07152d234b70'),
(18, 'Pravinth', 'priyamakenthiran99@gmail.com', '71e91cbc7d97758b5f61926e4e682c12'),
(19, 'Priya', 'priya@gmail.com', 'b1d25af6dfec2c00d1b8c7b0f1f0e7bb'),
(20, 'Vithya', 'vithya@gmail.com', '43a5b52d3dcb700546fbe0903a02a517'),
(21, 'Harshini', 'harshini@gmail.com', '28c094f20574004681d36b8e10650ee0'),
(22, 'Harshiny', 'harshiny@gmail.com', '1c08e5038e2767394a55b89f87956461');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
