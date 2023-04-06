-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2023 at 12:47 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userID` (`user_id`),
  KEY `fk_productID` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `user_id`) VALUES
(11, 2, 1, 9),
(13, 5, 3, 3),
(14, 3, 2, 7),
(15, 1, 5, 7),
(40, 2, 1, 3),
(48, 7, 1, 1),
(51, 3, 1, 1),
(53, 43, 1, 1),
(55, 3, 1, 9),
(56, 45, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `product_id`) VALUES
(1, 'images/products/1/1.jpg', 1),
(2, 'images/products/1/2.jpg', 1),
(3, 'images/products/1/3.jpg', 1),
(4, 'images/products/1/4.jpg', 1),
(5, 'images/products/2/1.jpg', 2),
(6, 'images/products/2/6.jpg', 2),
(7, 'images/products/2/7.jpg', 2),
(8, 'images/products/2/8.jpg', 2),
(9, 'images/products/3/1.jpg', 3),
(10, 'images/products/3/2.jpg', 3),
(11, 'images/products/3/3.jpg', 3),
(12, 'images/products/3/4.jpg', 3),
(13, 'images/products/4/1.jpg', 4),
(14, 'images/products/4/2.jpg', 4),
(15, 'images/products/4/3.jpg', 4),
(16, 'images/products/4/4.jpg', 4),
(17, 'images/products/5/1.jpg', 5),
(18, 'images/products/5/2.jpg', 5),
(19, 'images/products/5/3.jpg', 5),
(20, 'images/products/6/1.jpg', 6),
(21, 'images/products/6/2.jpg', 6),
(22, 'images/products/6/3.jpg', 6),
(23, 'images/products/6/4.jpg', 6),
(24, 'images/products/7/1.jpg', 7),
(25, 'images/products/7/2.jpg', 7),
(26, 'images/products/7/3.jpg', 7),
(27, 'images/products/7/4.jpg', 7),
(41, 'images/products/43/RMCFMJ0069-01_500x480.webp', 43),
(42, 'images/products/43/RMCFMJ0069-02_500x480.webp', 43),
(43, 'images/products/43/RMCFMJ0069-03_500x480.webp', 43),
(44, 'images/products/43/RMCFMJ0069-04_500x480.webp', 43),
(45, 'images/products/44/FMZ1003REALAJSYAUL-01_500x480.webp', 44),
(46, 'images/products/44/FMZ1003REALAJSYAUL-02_500x480.webp', 44),
(47, 'images/products/44/FMZ1003REALAJSYAUL-04_500x480.jpg', 44),
(48, 'images/products/44/FQ7495REALAJSYLS-03_5a644c7a-c5fd-4c39-ae11-2fd6c0419d07_500x480.webp', 44),
(49, 'images/products/45/HI1654_RMCFMZ0080-01_500x480.webp', 45),
(50, 'images/products/45/HI1654_RMCFMZ0080-03_500x480.webp', 45),
(51, 'images/products/45/HI1654_RMCFMZ0080-06_500x480.webp', 45),
(52, 'images/products/45/rmcfmz0080-blank_500x480.jpg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` float NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `added_at`) VALUES
(1, 'Mens Black &amp; Gold T-Shirt', 'Real Madrid is characterised by its winning spirit and its hunger for trophies. This is why the club has created the Black and Gold collection, a different way of experiencing football for all fans who are in search of the madridista essence. The golden touches are a reflection of the successes and trophies won in the 20th century by the team with the most Champions League trophies in history. The garments are black and gold, where you can see the initials RMCF indicating its exclusive style.', 37.99, '2023-03-22 14:44:33'),
(2, 'Mens Away Shirt 22/23 Purple', 'Always part of football fashion. This adidas Real Madrid away jersey stars in fresh shades and flashes an eye-catching graphic inspired by the stripe spanning the club badge. Built to keep fans comfortable, it includes moisture-wicking AEROREADY and mesh panels. A woven, monochromatic version of that famous badge shares your pride. Made with 100% recycled materials, this product represents just one of our solutions to help end plastic waste.', 90.99, '2023-03-22 14:49:25'),
(3, 'Reversible Anthem Jacket adidas Man 22/23', 'Inspired by their new stadium. This jacket from football is the one worn by Real Madrid players in the moments before their matches. It features an outer shell with embroidered crest and the adidas logo in two colors on a classic white background. The inside features a wavy print inspired by the club\'s third kit. Whichever side you choose, it will be clear to everyone that you are a madridista.', 111.99, '2023-03-22 20:42:34'),
(4, 'adidas Mens Training TTW Parka Black', 'It\'s a fact. The beautiful game isn\'t always played in beautiful weather. Throw on this adidas football parka for protection against the chill. The insulated fill and a droptail hem offer comfortable coverage so you can watch the game, not the storm clouds.', 200.99, '2023-03-22 20:42:34'),
(5, 'Real Madrid Youth Steel Strap Viceroy Chrono Watch Silver/Blue', 'Viceroy Boy\'s Chrono Watch Steel Strap Metal/Blue Real Madrid\r\norViceroy multifunction children\'s and / or women\'s watch from Real Madrid. Stainless steel case and bracelet, silver dial and blue indicator subdials and bezel. Size: 39 mm', 160.99, '2023-03-24 16:27:55'),
(6, 'Children\'s Adaptable Backpack Corporate Black', 'Show your madridista loyalty. Children\'s Backpack Real Madrid. Measures: 32x12x38cm', 65.99, '2023-03-24 16:27:55'),
(7, 'Gaming Led Headphones', 'High-quality 50mm gaming headset with microphone, in-ear volume control, adjustable and lightweight headband for comfort, Rainbow RGB LED effect lights', 50.99, '2023-03-24 16:51:38'),
(43, 'Mens adidas Avengers Warm Up Full Zip Hoody', 'Bring out the superhero in you. The exploits of Real Madrid have set a milestone in sports history. This adidas x Real Madrid hooded jacket is inspired by Marvel\'s Avengers. It features superhero avatars on the back and the crest of the Avengers next to the Real Madrid on the chest. ', 60.99, '2023-04-05 18:36:44'),
(44, 'Mens Real Madrid Away Authentic Shirt 20/21 Pink Long Sleeve', 'No matter how far they go from the Santiago Bernabéu, Real Madrid superstars always put on a show. This football T-shirt from adidas adds extra vibrancy to even the most polished away performance. Its soft fabric keeps you dry, whether you\'re working hard in replays or sweating out the result of a match. A woven club badge stands out on the chest.', 70.99, '2023-04-05 18:38:49'),
(45, 'Mens Third Authentic Long Sleeve Shirt 22/23 Black', 'Even when you have 120 years of success behind you, building for the future is the priority. This adidas Real Madrid authentic jersey takes the new-look Bernabéu as its muse. Woven into its fabric, undulating lines follow the gradients of the stadium\'s sweeping curves, and the lime green, heat-applied details incorporate a metallic effect inspired by the stadium\'s silvery exterior. Created for out-of-this-world football, this shirt will keep you cool with HEAT.RDY and mesh panels. Made with 100% recycled materials, this product represents just one of our solutions to help end plastic waste.', 150.99, '2023-04-05 18:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'Nikola Janjic', 'nikola@gmail.com', '$2y$10$/I7B/Eq4vEZlfyrJWPw7VuBMRJxi/0GTUhIwS9r2ALEIBc9E6SoY.', 1),
(3, 'Test User', 'test@test.com', '$2y$10$SxcV15Iaf0C0ORuFcldRkOuVTP/YerAHHP3e7DVQgKevyEVJEEr0C', 0),
(5, 'Test User 2', 'test2@test.com', '$2y$10$ZMuhmLuFZdvzUl0E704hLO9asSkAVgk0bwHFUR8Q9Ja780l33DIq6', 0),
(6, 'Bogdan Janjic', 'bogdan@gmail.com', '$2y$10$grDd/mIx/YMHrEJ36jKUs.h4HVYoaI.7OYbwmFSNk3Z1Hi7VPUAG2', 0),
(7, 'Nikola', 'nikolapfc88@live.com', '$2y$10$alWLbpx7EmXDmAwD.CgsVuJXfNlQe2vcDs624NNwDGXobPV.fBrRO', 0),
(8, 'Francesco Totti', 'roma@gmail.com', '$2y$10$nqvkAlQLRNupT3/zqx//nu54DnpyXsSGX/GOI7pv1qPRjLKX5iiCO', 0),
(9, 'Ronaldo', 'r9@gmail.com', '$2y$10$xxFIxpAIhFV8PfAhvjwmfuxdohynYrt3JpXnvNlUVh1mRUKzUK5im', 0),
(10, 'Test User 3', 'test3@test.com', '$2y$10$Tg7ndgO6WiGyUbFDNoIjDuUXLpwaL0yFgGKV2xrzaRLSV3OPVjsyO', 0),
(11, 'fghfgh', 'fghf@gmail.com', '$2y$10$TNgF8lPLNwZPyauZxOtJ.OESaA3N4198EPLQSybq9k31VU61w3kDO', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_productID` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
