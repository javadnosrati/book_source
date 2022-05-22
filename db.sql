-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2022 at 03:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_source`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart`
(
    `id`         int(11) NOT NULL,
    `user_ip`    text    NOT NULL,
    `product_id` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_ip`, `product_id`)
VALUES (26, '::1', 6),
       (27, '::1', 8),
       (28, '::1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments`
(
    `id`           int(11) NOT NULL,
    `username`     text    NOT NULL,
    `user_email`   text    NOT NULL,
    `comment_text` text    NOT NULL,
    `is_confirm`   int(11) NOT NULL DEFAULT 0,
    `product_id`   int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `user_email`, `comment_text`, `is_confirm`, `product_id`)
VALUES (2, 'مهدی خسروی', 'info@xanbil.com', 'تست', 1, 6),
       (3, 'مهدی', 'info@xanbil.com', 'تست', 1, 7),
       (4, 'مهدی خسروی', 'mehdi@gmail.com', 'تست ۶', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders`
(
    `id`          int(11) NOT NULL,
    `total`       int(11) NOT NULL,
    `product_ids` text    NOT NULL,
    `user_email`  text    NOT NULL,
    `is_paid`     int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `product_ids`, `user_email`, `is_paid`)
VALUES (1, 0, '8, 7, 6, ', 'mehdi@gmail.com', 1),
       (2, 0, '8, 6, ', 'mehdi@gmail.com', 1),
       (3, 0, '6, ', 'mehdi@gmail.com', 1),
       (4, 0, '6, ', 'mehdi@gmail.com', 1),
       (5, 4156454, '6, ', 'reza@gmail.com', 1),
       (6, 464000, '6, 7, ', 'mehdi@gmail.com', 0),
       (7, 46000, '6, 8, ', 'mehdi@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products`
(
    `id`            int(11)      NOT NULL,
    `product_name`  text         NOT NULL,
    `product_price` mediumint(9) NOT NULL,
    `product_desc`  text         NOT NULL,
    `product_image` text         NOT NULL,
    `product_date`  timestamp    NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_desc`, `product_image`, `product_date`)
VALUES (6, 'محصول تست ۱', 14000, 'توضیح تستی', 'image2.jpg', '2018-01-20 13:20:20'),
       (7, 'محصول تست ۲', 450000, 'توضیح بعدی', 'image1.jpg', '2018-01-20 13:20:42'),
       (8, 'اموزش برنامه نویسی', 32000, 'محصول اموزش برنامه نویسی', 'image1.jpg', '2018-08-08 16:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `id`           int(11)    NOT NULL,
    `display_name` text       NOT NULL,
    `email`        text       NOT NULL,
    `password`     text       NOT NULL,
    `is_admin`     tinyint(1) NOT NULL DEFAULT 0
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `display_name`, `email`, `password`, `is_admin`)
VALUES (9, 'مهدی خسروی', 'mehdi@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
       (10, 'خسرو مهدوی', 'kosro@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 0);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
