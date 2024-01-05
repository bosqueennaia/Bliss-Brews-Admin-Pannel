-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 04:22 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `profile`) VALUES
(1, 'naia', 'naiadhn@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'glitch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `price`, `qty`) VALUES
('UzH7ynJfxmARltq6q5Sx', 'UAVjN46f0bvXSKquej8S', 'aSBHDzG26iXurm6cfoNv', '50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `subject`, `message`) VALUES
('0', '0', 'iam', 'iam@gmail.com', 'shop', 'good'),
('Lm7uFQVcX3czwG0yX5p0', 'UAVjN46f0bvXSKquej8S', 'ibam', 'ibamnaz@gmail.com', 'maths,science', 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address_type` varchar(10) NOT NULL,
  `method` varchar(50) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'in progress',
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`, `date`, `status`, `payment_status`) VALUES
('OGTzld6EmHmNHeXZQkB6', 'UAVjN46f0bvXSKquej8S', 'mahi', '7788669955', 'mahinazir@gmail.com', '507A, 24 back side, Delhi, India, 110019', 'home', 'cash on delivery', 'uOarNNg0n3KD9OvPtItP', '80', '1', '2023-02-28', 'canceled', 'pending'),
('UUFMa328sIAdb3znDXce', 'UAVjN46f0bvXSKquej8S', 'mahi', '7788669955', 'mahinazir@gmail.com', '567G, 24 back side, Delhi, India, 110080', 'home', 'credit or debit card', 'kun96OpQed6Eww6M1URo', '120', '1', '2023-02-28', 'canceled', 'complete'),
('Bsatz7miuWWgXMEx5qzW', 'UAVjN46f0bvXSKquej8S', 'mahi', '7788669955', 'mahinazir@gmail.com', '507A, 24 back side, Delhi, India, 110019', 'home', 'cash on delivery', 'kun96OpQed6Eww6M1URo', '120', '1', '2023-02-28', 'in progress', 'complete'),
('yyD4B276Pg9lfGpRjcr9', 'd5URvsP8VusCXQoCdMBG', 'shalu', '7788669944', 'shaluAnsari@gmail.com', '507A, 24 back side, mumbai, india, 112233', 'office', 'credit or debit card', 'jo35YMmBWpvbCMB65UdA', '160', '2', '2023-02-28', 'canceled', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_detail` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `product_detail`, `status`) VALUES
('PWB', 'Peru Whole Bean', '50', 'p1.jpg', 'Nikmati kopi dengan sentuhan kacang -  kacangan manis dan nuansa cerah citrus yang khas', 'active'),
('EWB', 'Ethiopia Whole Bean', '50', 'p2.jpg', 'Terinspirasi dari lahan tinggi Ethiopia, ciptakan pengalaman kopi dengan aroma bunga, buah - buahan cerah, dan sentuhan manis yang mengagumkan', 'active'),
('CWB', 'Columbia Whole Bean', '50', 'p3.jpg', 'Menawarkan keharmonisan citarasa yang tercipta dari ketinggian daratan dengan paduan rasa coklat, kacang, dan hint buah - buahan segar', 'active'),
('NWB', 'Nicaragua Whole Bean', '50', 'p4.jpg', 'Lahir dari tanah vulkanik, hadirkan cita rasa kopi dengan kelembutan manis dan sentuhan kenari yang khas', 'active'),
('BC', 'Brazil Coffee', '40', 'p5.jpg', 'Ciptaan dari hutan hujan Brazil, kopi ini menghadirkan campuran kacang - kacangan, cokelat, dan buah - buahan tropis yang memikat', 'active'),
('FC', 'French Coffee', '40', 'p6.jpg', 'Dengan kualitas khas Prancis, rasakan kekayaan dark roast dengan sentuhan cokelat dan caramel yang mewah', 'active'),
('AC', 'American Coffee', '40', 'p7.jpg', 'Sebuah perpaduan kopi klasik Amerika yang memukau dengan keharuman dan rasa yang mengingatkan pada tradisi yang kokoh', 'active'),
('KC', 'Kenya Coffee', '40', 'p8.jpg', 'Dari tanah tinggi Kenya, hadirkan pengalaman kopi dengan rasa cerah buah - buahan tropis dan aroma bunga yang memikat', 'active'),
('IC', 'Italian Coffee', '40', 'p9.jpg', 'Merayakan kekuatan rasa Italia dengan paduan yang sempurna antara kepedasan dan manis yang menawan', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
('UAVjN46f0bvXSKquej8S', 'naia', 'queennaia@gmail.com', 'naiq14', 'user'),
('ir7qjxTxaQm9PM5drpEn', 'iam', 'kingiam@gmail.com', 'iamk12', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `price`) VALUES
('FngaVJmk3vBeq3KUmt03', 'UAVjN46f0bvXSKquej8S', 'jo35YMmBWpvbCMB65UdA', '160');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;