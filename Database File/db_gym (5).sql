-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2022 at 11:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'polash', 'admin', 'abc@gmail.com', '4756c77f32f14b12aa71e976505e02b5', 0),
(2, 'Jibon', 'admin', 'apu@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` int(255) NOT NULL,
  `zip` int(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `fname`, `lname`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`, `code`) VALUES
(33, 'Apu Sarkar', 'Sarkar', 'kjolsshah,sylhet sadar, sylhetf', 'Sylhet', 0, 3101, 1738589714, 'sarkarapu112@gmail.com', '202cb962ac59075b964b07152d234b70', '1fa446b3f319a78563f6212ec826442f'),
(34, 'Apu Sarkar', 'Sarkar', 'kjolsshah,sylhet sadar, sylhetf', 'Sylhet', 0, 3101, 1738589714, 'sarkarapu111@gmail.com', '202cb962ac59075b964b07152d234b70', 'df14069e656ac56b29219b8d28769dbe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(44, 9, 11, ' Workout Bench and Weight Bar ', 1, 11501.00, 'upload/b8a4c667ee.jpg', '2022-06-28 01:54:35', 1),
(45, 9, 10, 'Workout Bench and Weight Bar', 1, 85408.00, 'upload/246097609e.jpg', '2022-07-10 14:45:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `packId` int(11) NOT NULL,
  `sessionNo` varchar(255) NOT NULL,
  `packName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `body` text NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`packId`, `sessionNo`, `packName`, `price`, `body`, `type`) VALUES
(4, '002', 'Standard', 50.00, '<p>@5 team members&nbsp; @5GB storage @2000 request per day @ 40000 users</p>', 0),
(5, '001', 'Basic', 150.00, '<p>@5 team members&nbsp; @5GB storage @2000 request per day @ 40000 users</p>', 1),
(6, '003', 'Premium', 300.00, '<p>@5 team members&nbsp; @5GB storage @2000 request per day @ 40000 users</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `body` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `price`, `body`, `image`) VALUES
(6, 'Watch', 343.00, '<p>dDAF DFF&nbsp;</p>', 'upload/7e4443f3d4.jpg'),
(7, 'Mini Dumbell', 2000.00, '<p>iuegfug fdufgu fdufg&nbsp;</p>', 'upload/b79ba7eb06.jpg'),
(8, 'tradmill', 10000.00, '<p>yfyuf fuf fu fuyf&nbsp;</p>', 'upload/a8710d0a14.jpg'),
(9, 'weight per kg', 200.00, '<p>lkgls sbg d sgihg sigb</p>', 'upload/296061c939.jpg'),
(10, 'Workout Bench and Weight Bar', 85408.00, '<h1 class=\"title h1 mb-2\">Marcy Smith Cage Machine with Workout Bench and Weight Bar Home Gym Equipment SM-4008</h1>', 'upload/246097609e.jpg'),
(11, ' Workout Bench and Weight Bar ', 11501.00, '<h1 class=\"title h1 mb-2\">ody Rider Elliptical Machine and Stationary Bike with Seat and Easy Computer, Dual Trainer 2-in-1 Cardio Exercise Machine, Home Gym, Workout Equipment BRD2000, Black &amp; grey, One Size</h1>', 'upload/b8a4c667ee.jpg'),
(12, 'Fitness SF-RW1205 Rowing Machine', 11059.00, '<h1 class=\"title h1 mb-2\">Sunny Health &amp; Fitness SF-RW1205 Rowing Machine Rower with 12 Level Adjustable Resistance, Digital Monitor and 220 LB Max Weight</h1>', 'upload/fc9b9882f8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `idd` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `trainerName` varchar(255) NOT NULL,
  `trainerIntro` varchar(255) NOT NULL,
  `sessionNo` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`idd`, `cmrId`, `id`, `trainerName`, `trainerIntro`, `sessionNo`, `category`, `price`, `date`, `status`) VALUES
(25, 9, 2, ' JIBON KUMAR DAS', 'Beginner gym workout for strength', '01', 'For Personal', 150.00, '2022-06-28 01:55:16', 1),
(26, 9, 2, ' JIBON KUMAR DAS', 'Beginner gym workout for strength', '01', 'For Personal', 150.00, '2022-07-04 21:31:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sesscart`
--

CREATE TABLE `tbl_sesscart` (
  `sesscartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `trainerName` varchar(255) NOT NULL,
  `trainerIntro` varchar(255) NOT NULL,
  `sessionNo` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sesscart`
--

INSERT INTO `tbl_sesscart` (`sesscartId`, `sId`, `id`, `trainerName`, `trainerIntro`, `sessionNo`, `category`, `price`) VALUES
(13, 'j7c49eip5rshrenuq099lejbp0', 2, ' JIBON KUMAR DAS', 'Beginner gym workout for strength', '01', '', 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tsession`
--

CREATE TABLE `tbl_tsession` (
  `id` int(11) NOT NULL,
  `trainerName` varchar(255) NOT NULL,
  `sessionNo` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `trainerIntro` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `infoone` varchar(255) NOT NULL,
  `infotwo` varchar(255) NOT NULL,
  `infothree` varchar(255) NOT NULL,
  `infofour` varchar(255) NOT NULL,
  `infofive` varchar(255) NOT NULL,
  `infosix` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tsession`
--

INSERT INTO `tbl_tsession` (`id`, `trainerName`, `sessionNo`, `category`, `trainerIntro`, `price`, `infoone`, `infotwo`, `infothree`, `infofour`, `infofive`, `infosix`) VALUES
(1, ' PROSENJITH CHANDA', '02', 'For TeamWise', 'Beginner gym workout for males', 50.00, 'Seated chest press (10 reps x 4 sets)', 'Seated rows (10 reps x 4 sets)', 'Wide grip lat pulldown (10 reps x 4 sets)', 'Seated leg press (10 reps x 4 sets)', 'Dumbbell bicep curls (10 reps x 4 sets)', 'Cable rotations/twists (10 reps x 4 sets)'),
(2, ' JIBON KUMAR DAS', '01', 'For Personal', 'Beginner gym workout for strength', 150.00, 'Barbell push press (6 reps x 4 sets)', 'Dumbbell single arm row (6 reps x 4 sets)', 'Shoulder lateral raise (6 reps x 4 sets)', 'Bench press (6 reps x 4 sets)', 'Pull ups/assisted pull ups (6 reps x 4 sets)', 'Cable overhead tricep extensions (8 reps x 4 sets)'),
(3, ' MAZID MAZIDI ', '03', 'For Personal', 'Beginner gym circuit programme', 300.00, 'Seated chest press (10 reps x 4 sets)', 'Dumbbell single arm row (6 reps x 4 sets)', 'Wide grip lat pulldown (10 reps x 4 sets)', 'Seated leg press (10 reps x 4 sets)', 'Pull ups/assisted pull ups (6 reps x 4 sets)', 'Cable overhead tricep extensions (8 reps x 4 sets)'),
(4, 'Maria D, Souza ', '004', 'For TeamWise', 'Beginner gym workout for males', 343.00, 'Barbell push press (6 reps x 4 sets)', 'Seated rows (10 reps x 4 sets)', 'Wide grip lat pulldown (10 reps x 4 sets)', 'Seated leg press (10 reps x 4 sets)', 'Pull ups/assisted pull ups (6 reps x 4 sets)', 'Cable rotations/twists (10 reps x 4 sets)'),
(5, 'Apu Sarkar ', '005', 'For TeamWise', 'Beginner gym workout for males', 5443.00, 'Barbell push press (6 reps x 4 sets)', 'Seated rows (10 reps x 4 sets)', 'Shoulder lateral raise (6 reps x 4 sets)', 'Seated leg press (10 reps x 4 sets)', 'Dumbbell bicep curls (10 reps x 4 sets)', 'Cable rotations/twists (10 reps x 4 sets)'),
(6, 'Roberto Allan(T) ', '007', 'For Personal', 'Beginner gym circuit programme', 567.00, 'Seated chest press (10 reps x 4 sets)', 'Dumbbell single arm row (6 reps x 4 sets)', 'Wide grip lat pulldown (10 reps x 4 sets)', 'Bench press (6 reps x 4 sets)', 'Pull ups/assisted pull ups (6 reps x 4 sets)', 'Cable rotations/twists (10 reps x 4 sets)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`packId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`idd`);

--
-- Indexes for table `tbl_sesscart`
--
ALTER TABLE `tbl_sesscart`
  ADD PRIMARY KEY (`sesscartId`);

--
-- Indexes for table `tbl_tsession`
--
ALTER TABLE `tbl_tsession`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `packId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_sesscart`
--
ALTER TABLE `tbl_sesscart`
  MODIFY `sesscartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_tsession`
--
ALTER TABLE `tbl_tsession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
