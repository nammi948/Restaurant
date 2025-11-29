-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2025 at 12:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` double NOT NULL,
  `event` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `email`, `phone`, `event`) VALUES
(1, 'sailu', 'sailu143@gmail.com', 7059758095, ''),
(2, 'sailu', 'sailu143@gmail.com', 7059758095, ''),
(3, 'sailu', 'sailu143@gmail.com', 7059758095, 'Night Party');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `item_id` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `house` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `delivery_fee` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `item_id`, `item_name`, `user_id`, `user_name`, `email`, `phone`, `house`, `street`, `city`, `pincode`, `total_amount`, `delivery_fee`, `grand_total`, `created_at`, `status`) VALUES
(48, 12347, 'paneer tikka', 9, 'dolly', '', '4556667677', 'basti', 'bistupur', 'tatanagar', '830012', 280.00, 25.00, 305.00, '2025-11-29 05:36:47', 'accepted'),
(49, 12346, 'paneer biryani', 9, 'dolly', '2003dollykumari@gmail.com', '4556667677', 'basti', 'bistupur', 'tatanagar', '830012', 560.00, 25.00, 585.00, '2025-11-29 05:57:08', 'accepted'),
(50, 123672, 'dosa', 9, 'dolly', '2003dollykumari@gmail.com', '4556667677', 'basti', 'bistupur', 'tatanagar', '830012', 120.00, 25.00, 145.00, '2025-11-29 07:25:03', 'accepted'),
(51, 2345671, 'chicken biryani', 7, 'abhishek', 'abhi123@gmail.com', '7984833282', 'sai bhadi,nayabhasti.', 'naya bhasti,3 no road,tata nagar.', 'tatanagar', '830012', 420.00, 25.00, 445.00, '2025-11-29 08:18:30', 'accepted'),
(52, 3456782, 'mutton ghost biryani', 15, 'sankar', 'idadasusankar1819@gmail.com', '9652500883', '142-1', 'ravivalasa', 'chipurupalli', '535128', 550.00, 25.00, 575.00, '2025-11-29 10:02:10', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `item_id`, `item_name`, `user_id`, `price`, `qty`, `total`, `created_at`) VALUES
(1, 2345671, 'chicken biryani', 0, 420.00, 1, 420.00, '0000-00-00 00:00:00'),
(2, 2345672, 'fry chicken biryani', 0, 420.00, 1, 420.00, '0000-00-00 00:00:00'),
(3, 8765431, 'prawn biryani', 0, 420.00, 1, 420.00, '0000-00-00 00:00:00'),
(4, 3456781, 'mutton biryani', 0, 550.00, 1, 550.00, '0000-00-00 00:00:00'),
(5, 91234574, 'dry chicken', 0, 420.00, 1, 420.00, '0000-00-00 00:00:00'),
(9, 91234577, 'chicken manchurian', 6, 420.00, 1, 420.00, '0000-00-00 00:00:00'),
(10, 91234560, 'prawn fry', 6, 420.00, 1, 420.00, '0000-00-00 00:00:00'),
(13, 12347, 'paneer tikka', 9, 280.00, 1, 280.00, '2025-11-29 05:36:47'),
(14, 12346, 'paneer biryani', 9, 280.00, 1, 280.00, '2025-11-29 05:57:08'),
(15, 12345, 'paneer fry', 9, 280.00, 1, 280.00, '2025-11-29 05:57:08'),
(16, 123672, 'dosa', 9, 120.00, 1, 120.00, '2025-11-29 07:25:03'),
(17, 2345671, 'chicken biryani', 7, 420.00, 1, 420.00, '2025-11-29 08:18:30'),
(18, 3456782, 'mutton ghost biryani', 15, 550.00, 1, 550.00, '2025-11-29 10:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(20) NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `order_price` double NOT NULL,
  `item_photo` varchar(200) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `order_name`, `order_price`, `item_photo`, `create_at`, `updated_at`, `category`) VALUES
(12345, 'paneer fry', 280, 'uploads/1763711298_paneer.jpg', '2025-11-21 07:48:18', '2025-11-21 07:48:18', 'paneer'),
(12346, 'paneer biryani', 280, 'assets/images/menu/paneer-biryani.avif', '2025-11-11 10:41:48', '2025-11-11 10:41:48', ''),
(12347, 'paneer tikka', 280, 'assets/images/menu/paneer-tikka.avif', '2025-11-11 10:42:30', '2025-11-11 10:42:30', ''),
(123567, 'veg biryani', 280, 'assets/images/menu/veg-biryani.avif', '2025-11-11 10:43:53', '2025-11-11 10:43:53', ''),
(123568, 'veg thali', 280, 'assets/images/menu/veg-thali.avif', '2025-11-11 10:46:23', '2025-11-11 10:46:23', ''),
(123569, 'veg mixed thali', 280, 'assets/images/menu/veg-mixed.avif', '2025-11-11 10:46:23', '2025-11-11 10:46:23', ''),
(123671, 'idly', 120, 'assets/images/menu/idly.avif', '2025-11-11 10:50:02', '2025-11-11 10:50:02', ''),
(123672, 'dosa', 120, 'assets/images/menu/dosa.avif', '2025-11-11 10:50:02', '2025-11-11 10:50:02', ''),
(123673, 'fried idly', 120, 'assets/images/menu/fried-idly.avif', '2025-11-11 10:50:02', '2025-11-11 10:50:02', ''),
(2345671, 'chicken biryani', 420, 'assets/images/menu/biryani.webp', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(2345672, 'fry chicken biryani', 420, 'assets/images/menu/fry-biryani.avif', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(2345673, 'chilli chicken', 420, 'assets/images/menu/chilli-chicken.avif', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(3456781, 'mutton biryani', 550, 'assets/images/menu/mutton.avif', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(3456782, 'mutton ghost biryani', 550, 'assets/images/menu/ghost-mutton-biryani.avif', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(3456783, 'legend mutton biryani', 550, 'assets/images/menu/Legend-mutton-biryani.avif', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(8765431, 'prawn biryani', 420, 'assets/images/menu/fran-biryani.avif', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(8765432, 'prawn fry', 420, 'assets/images/menu/prawn-fry.avif', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(8765433, 'prawn curry', 420, 'assets/images/menu/fran-curry.avif', '2025-11-11 11:12:19', '2025-11-11 11:12:19', ''),
(91234560, 'prawn fry', 420, 'assets/images/menu/prawn-fry.avif', '2025-11-11 11:21:07', '2025-11-11 11:21:07', ''),
(91234565, 'fish chilli', 420, 'assets/images/menu/fish-chilli.avif', '2025-11-11 11:21:07', '2025-11-11 11:21:07', ''),
(91234566, 'fish fry', 420, 'assets/images/menu/fish-fry.avif', '2025-11-11 11:21:07', '2025-11-11 11:21:07', ''),
(91234567, 'fish curry', 420, 'assets/images/menu/fish-curry.avif', '2025-11-11 11:21:07', '2025-11-11 11:21:07', ''),
(91234574, 'dry chicken', 420, 'assets/images/menu/chilli-chicken.avif', '2025-11-11 11:21:07', '2025-11-11 11:21:07', ''),
(91234575, 'appolo fish', 420, 'assets/images/menu/fish-chilli.avif', '2025-11-11 11:21:07', '2025-11-11 11:21:07', ''),
(91234576, 'lollipops', 420, 'assets/images/menu/Lollipop.avif', '2025-11-11 11:21:07', '2025-11-11 11:21:07', ''),
(91234577, 'chicken manchurian', 420, 'assets/images/menu/chicken-manchurian.avif', '2025-11-11 11:21:07', '2025-11-11 11:21:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` double NOT NULL,
  `house` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `password`, `email`, `phone`, `house`, `street`, `city`, `state`, `pincode`, `user`, `created_at`, `updated_at`) VALUES
(4, 'vamsi', 'sailu143', 'vamsinammi143@gmail.com', 8581815125, '', '', '', '', '', 'admin', '2025-11-21 05:49:43', '2025-11-21 05:49:43'),
(6, 'indu', 'nammi', 'indu@gmail.com', 5686458484, 'siridevipuram', 'gavidi', 'chipurupalli', 'andhra', '535128', 'client', '2025-11-21 07:06:03', '2025-11-21 07:06:03'),
(7, 'abhishek', 'abhi', 'abhi123@gmail.com', 7984833282, 'sai bhadi,nayabhasti.', 'naya bhasti,3 no road,tata nagar.', 'tatanagar', 'jharkhand', '830012', 'client', '2025-11-21 07:05:51', '2025-11-21 07:05:51'),
(9, 'dolly', 'dolly', '2003dollykumari@gmail.com', 4556667677, 'basti', 'bistupur', 'tatanagar', 'jharkhand', '830012', 'client', '2025-11-28 07:26:29', '2025-11-28 07:26:29'),
(10, 'sona', 'sona', 'sonasharma42003@gmail.com', 234556778, 'basti', 'bistupur', 'tatanagar', 'jharkhand', '830012', 'client', '2025-11-28 07:30:11', '2025-11-28 07:30:11'),
(11, 'sadvik', 'alludu', 'vamsinammi143@gmail.com', 858181512, 'alluri', 'malkhapuram', 'visakhapatnam', 'andhra', '535128', 'client', '2025-11-28 07:35:30', '2025-11-28 07:35:30'),
(12, 'lasya', 'akka', 'vamsinammi143@gmail.com', 858181512, 'alluri', 'malkhapuram', 'visakhapatnam', 'andhra', '535128', 'client', '2025-11-28 09:48:30', '2025-11-28 09:48:30'),
(13, 'sankar', 'sankar', 'idadasusankar1819@gmail.com', 9652500883, '142-1', 'ravivalasa', 'chipurupalli', 'andhra', '535128', 'client', '2025-11-28 09:48:39', '2025-11-28 09:48:39'),
(14, 'vamsi nammi', 'vamsi', 'vamsinammi143@gmail.com', 858181512, '142-1', 'ravivalasa', 'chipurupalli', 'andhra', '535128', 'client', '2025-11-28 09:48:43', '2025-11-28 09:48:43'),
(15, 'sankar', 'sanku', 'idadasusankar1819@gmail.com', 9652500883, '142-1', 'ravivalasa', 'chipurupalli', 'andhra', '535128', 'client', '2025-11-28 09:49:07', '2025-11-28 09:49:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `order_list` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
