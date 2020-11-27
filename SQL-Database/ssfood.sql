-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2020 at 02:19 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactno` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `contactno`, `email`, `creationDate`, `updationDate`) VALUES
(1, 'John', 'John@Admin.lk', '', 0, '', '2020-07-24 16:21:18', '2020-07-24 18:21:18'),
(2, 'ikirupan@gmail.com', 'Master_1006', 'Kirupan Inpathas', 0, '', '2020-11-13 15:19:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Breakfast_Recipes', 'Morning_Foods', '2020-07-24 16:21:18', '2020-07-24 18:21:18'),
(2, 'Lunch_Recipes', 'Lunch_Foods', '2020-07-24 16:21:18', '2020-07-24 18:21:18'),
(3, 'Dinner_Recipes', 'Dinner_Foods', '2020-07-24 16:21:18', '2020-07-24 18:21:18'),
(4, 'Dessert_Recipes', 'Taste_Foods', '2020-07-24 16:21:18', '2020-07-24 18:21:18'),
(5, 'Juice', 'Juice ', '2020-11-24 07:35:41', NULL),
(6, 'Soft Drinks', 'Soda ', '2020-11-24 07:36:29', NULL),
(7, 'Special Recipes', 'Special Recipes ', '2020-11-24 07:36:29', NULL),
(10, 'lunch', 'uhbhjvh', '2020-11-27 05:25:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(30000) NOT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `creation`) VALUES
(1, 'Kirupan Inpathas', 'ikirupan@gmail.com', '', 'So yummy , nice experince', '2020-11-26 11:00:19'),
(2, 'Abinesh', 'abi@m.com', '', 'Ok ', '2020-11-26 11:00:19'),
(3, 'Kiru', 'kjhgcgfxyfughjbvcgj@vbnkjkhvghc.com', '', 'iuyfdufylfrt7liughjfo68gi', '2020-11-26 11:00:40'),
(4, 'Inpathas Kirupathas', 'ikirupan@gmail.com', 'please', 'OKey', '2020-11-27 14:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(4) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(14, 1, 2, '1', 1, '2020-11-17 09:33:26', 'COD', NULL),
(15, 2, 2, '1', 1, '2020-11-17 09:34:23', 'COD', NULL),
(16, 2, 2, '13', 1, '2020-11-17 09:34:23', 'COD', NULL),
(17, 2, 2, '25', 1, '2020-11-17 09:34:23', 'COD', NULL),
(36, 3, 2, '17', 1, '2020-11-23 12:55:00', NULL, NULL),
(39, 4, 2, '17', 1, '2020-11-23 13:16:23', NULL, NULL),
(40, 5, 2, '17', 1, '2020-11-23 13:17:11', NULL, NULL),
(41, 5, 2, '18', 1, '2020-11-23 13:17:12', NULL, NULL),
(42, 5, 2, '19', 1, '2020-11-23 13:17:12', NULL, NULL),
(43, 5, 2, '20', 1, '2020-11-23 13:17:12', NULL, NULL),
(44, 6, 2, '17', 2, '2020-11-23 13:23:01', 'COD', NULL),
(45, 6, 2, '18', 1, '2020-11-23 13:23:01', 'COD', NULL),
(46, 6, 2, '19', 1, '2020-11-23 13:23:01', 'COD', NULL),
(47, 6, 2, '20', 1, '2020-11-23 13:23:01', 'COD', NULL),
(48, 7, 2, '21', 1, '2020-11-23 13:38:30', 'COD', NULL),
(49, 8, 2, '21', 1, '2020-11-23 13:39:20', 'COD', NULL),
(50, 9, 2, '20', 1, '2020-11-23 14:39:41', 'COD', NULL),
(51, 9, 2, '21', 1, '2020-11-23 14:39:41', 'COD', NULL),
(52, 10, 2, '18', 1, '2020-11-23 14:44:59', 'COD', NULL),
(53, 11, 2, '18', 1, '2020-11-23 15:02:40', 'COD', NULL),
(54, 12, 2, '17', 1, '2020-11-24 03:01:42', 'COD', NULL),
(55, 13, 2, '18', 1, '2020-11-24 13:43:34', 'COD', NULL),
(56, 14, 2, '18', 1, '2020-11-24 13:44:20', 'COD', NULL),
(57, 14, 2, '22', 1, '2020-11-24 13:44:20', 'COD', NULL),
(58, 15, 2, '18', 1, '2020-11-24 14:34:49', 'COD', NULL),
(59, 15, 2, '20', 1, '2020-11-24 14:34:49', 'COD', NULL),
(60, 15, 2, '22', 1, '2020-11-24 14:34:49', 'COD', NULL),
(61, 16, 2, '17', 1, '2020-11-24 14:52:22', 'COD', NULL),
(62, 17, 2, '17', 1, '2020-11-25 04:32:34', 'COD', NULL),
(63, 18, 2, '12', 1, '2020-11-25 04:43:43', 'COD', NULL),
(64, 19, 5, '17', 1, '2020-11-25 08:31:22', 'COD', NULL),
(65, 20, 2, '1', 1, '2020-11-26 08:31:55', 'COD', NULL),
(66, 21, 2, '17', 1, '2020-11-27 05:12:00', 'COD', NULL),
(67, 21, 2, '18', 1, '2020-11-27 05:12:00', 'COD', NULL),
(68, 22, 2, '25', 1, '2020-11-27 05:22:19', 'COD', NULL),
(69, 23, 6, '17', 1, '2020-11-27 05:33:45', 'COD', NULL),
(70, 23, 6, '18', 1, '2020-11-27 05:33:45', 'COD', NULL),
(71, 23, 6, '19', 1, '2020-11-27 05:33:45', 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

DROP TABLE IF EXISTS `ordertrackhistory`;
CREATE TABLE IF NOT EXISTS `ordertrackhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'in Process', 'Order has been Shipped.', '2020-07-24 16:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

DROP TABLE IF EXISTS `productreviews`;
CREATE TABLE IF NOT EXISTS `productreviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `review` longtext,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `name`, `email`, `review`, `reviewDate`) VALUES
(1, 3, 'Shajanthan', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT WITH AFFORDABLE PRICE', '2020-07-24 16:21:18'),
(3, 30, 'Abinesh', 'abinesh@gmail.com', 'rf', '2020-11-25 14:20:17'),
(4, 17, 'sinthuja', 'sivasinthu5@gmail.com', 'fgfyuyuk', '2020-11-27 05:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 1, 1, 'Best-Ever Parfait', 'E-Shopper (pvt) Ltd', 200, 0, 'This blueberry compote is incredible.', 'Banana-Pancakes.jpg', 'Banana-Pancakes.jpg', 'Banana-Pancakes.jpg', 0, 'In stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(2, 1, 2, 'Caramelized Onion Matzo Brei', 'E-Shopper (pvt) Ltd', 200, 0, 'Breakfast doesn\'t get any more comforting.', 'ButterMilk-Pancakes.jpg', 'ButterMilk-Pancakes.jpg', 'ButterMilk-Pancakes.jpg', 40, 'In stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(3, 1, 3, 'Best-Ever Migas', 'E-Shopper (pvt) Ltd', 180, 0, 'We\'re pretty sure that this might become a new go-to in your morning repertoire.', 'Chocolate-Cake.jpg', 'Chocolate-Cake.jpg', 'Chocolate-Cake.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(4, 1, 4, 'Healthy Pumpkin Muffins', 'E-Shopper (pvt) Ltd', 220, 0, 'We might have dubbed these guys healthy, but they sure don\'t taste like it!', 'Fluffy-Pancakes.jpg', 'Fluffy-Pancakes.jpg', 'Fluffy-Pancakes.jpg', 50, 'In stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(5, 1, 5, 'Crustless Quiche', 'E-Shopper (pvt) Ltd', 200, 0, 'Don\'t worry, this low-carb dish is still full of flavor.', 'Hot-Chocolate-Pancakes.jpg', 'Hot-Chocolate-Pancakes.jpg', 'Hot-Chocolate-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(6, 1, 6, 'Instant Pot Hash', 'E-Shopper (pvt) Ltd', 300, 0, 'Veggies, potatoes, and protein are the keys to a filling breakfast.', 'Strawberry-Pancakes.jpg', 'Strawberry-Pancakes.jpg', 'Strawberry-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(7, 1, 7, 'Instant Pot Steel Cut Oats', 'E-Shopper (pvt) Ltd', 170, 0, 'Let your Instant Pot do allll the work.', 'Nutella-Pancakes.jpg', 'Nutella-Pancakes.jpg', 'Nutella-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(8, 1, 8, 'Brussels Sprouts Hash', 'E-Shopper (pvt) Ltd', 160, 0, 'Our favorite low-carb hash.', 'Strawberry-Pancakes.jpg', 'Strawberry-Pancakes.jpg', 'Strawberry-Pancakes.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(9, 2, 1, 'Best-Ever Farro Salad', 'E-Shopper (pvt) Ltd', 350, 0, 'There are so many ways to customize this meal: change up the protein, add in some nuts, or try a new dressing.', 'BeefRice.jpg', 'BeefRice.jpg', 'BeefRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(10, 2, 2, 'Collard Wrap Bento Boxes', 'E-Shopper (pvt) Ltd', 300, 0, 'Collards are the new kale.', 'ChickenRice.jpg', 'ChickenRice.jpg', 'ChickenRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(11, 2, 3, 'Avocado Chicken Salad', 'E-Shopper (pvt) Ltd', 650, 0, 'Avo and chicken are always a solid combo.', 'ChineseRice.jpg', 'ChineseRice.jpg', 'ChineseRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(12, 2, 4, 'Egg Roll Bowls', 'E-Shopper (pvt) Ltd', 250, 0, 'Take-out Chinese can be a heavy lunch, but these egg roll bowls are just the right amount of filling.', 'FishRice.jpg', 'FishRice.jpg', 'FishRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(13, 2, 5, 'Cobb Egg Salad', 'E-Shopper (pvt) Ltd', 330, 0, 'The upgrade your egg salad deserves.', 'SpiccyRice.jpg', 'SpiccyRice.jpg', 'SpiccyRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(14, 2, 6, 'Perfect Ham And Cheese Sandwich', 'E-Shopper (pvt) Ltd', 600, 0, 'Sourdough gives this classic sandwich a leg up.', 'ThaiRice.jpg', 'ThaiRice.jpg', 'ThaiRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(15, 2, 7, 'Roasted Beet Goat Cheese Salad', 'E-Shopper (pvt) Ltd', 200, 0, 'Goat cheese adds a creamy, tangy taste to this not-so-basic salad.', 'VegetableRice.jpg', 'VegetableRice.jpg', 'VegetableRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(16, 2, 8, 'Lemon Chicken Wraps', 'E-Shopper (pvt) Ltd', 180, 0, 'That creamy Sriracha sauce, though.', 'YellowRice.jpg', 'YellowRice.jpg', 'YellowRice.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(17, 3, 1, 'Spaghetti and Meatballs', 'E-Shopper (pvt) Ltd', 320, 0, 'Making your own meatballs and sauce makes it even better.', 'Beef-Kottu.jpg', 'Beef-Kottu.jpg', 'Beef-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(18, 3, 2, 'Chicken and Artichoke Rice Casserole', 'E-Shopper (pvt) Ltd', 400, 0, 'This comforting chicken casserole needs to be in your winter dinner rotation.', 'Chicken-Kottu.jpg', 'Chicken-Kottu.jpg', 'Chicken-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(19, 3, 3, 'Chicken Alfredo', 'E-Shopper (pvt) Ltd', 280, 0, 'This is the easiest, creamiest chicken alfredo you will ever make.', 'Dolphin-Kottu.jpg', 'Dolphin-Kottu.jpg', 'Dolphin-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(20, 3, 4, 'Easy Chicken Parm', 'E-Shopper (pvt) Ltd', 160, 0, 'The idiot-proof way to make chicken parm.', 'Egg-Kottu.jpg', 'Egg-Kottu.jpg', 'Egg-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(21, 3, 5, 'Posole', 'E-Shopper (pvt) Ltd', 220, 0, 'Enjoy the comfort of this Mexican favorite without any of the work.', 'Kothu-Parotta.jpg', 'Kothu-Parotta.jpg', 'Kothu-Parotta.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(22, 3, 6, 'Slow Cooker Chicken Thighs', 'E-Shopper (pvt) Ltd', 650, 0, 'Not mad at all about how easy these are.', 'Mixed-Kottu.jpg', 'Mixed-Kottu.jpg', 'Mixed-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(23, 3, 7, 'Cheesy Baked Meatballs', 'E-Shopper (pvt) Ltd', 500, 0, 'Add more mozz for an even gooey-er bake.', 'Mutton-Kottu.jpg', 'Mutton-Kottu.jpg', 'Mutton-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(24, 3, 8, 'Chicken and Rice Casserole', 'E-Shopper (pvt) Ltd', 150, 0, 'There is literally only one dirty dish to clean with this recipe.', 'Veg-Kottu.jpg', 'Veg-Kottu.jpg', 'Veg-Kottu.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(25, 4, 1, 'Chocolate Babka', 'E-Shopper (pvt) Ltd', 250, 0, 'This is a stunner.', 'Chocolate-Dessert.jpg', 'Chocolate-Dessert.jpg', 'Chocolate-Dessert.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(26, 4, 2, 'Milk & Oreos Cake', 'E-Shopper (pvt) Ltd', 300, 0, 'Impress EVERYONE with this showstopper of a cake.', 'Fruit-Cream-Cheese.jpg', 'Fruit-Cream-Cheese.jpg', 'Fruit-Cream-Cheese.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(27, 4, 3, 'Chocolate Pudding Pie', 'E-Shopper (pvt) Ltd', 280, 0, 'This pie is picture perfect and chock-full of chocolate.', 'Fruit-Custard.jpg', 'Fruit-Custard.jpg', 'Fruit-Custard.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(28, 4, 4, 'Strawberry Chocolate Mousse Cups', 'E-Shopper (pvt) Ltd', 550, 0, 'You can\'t go wrong with these indulgent and romantic mousse cups.', 'Fruit-Pizza.jpg', 'Fruit-Pizza.jpg', 'Fruit-Pizza.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(29, 4, 5, 'Samoa Dessert Lasagna', 'E-Shopper (pvt) Ltd', 400, 0, 'Samoa-flavored lasagna? Our dreams have come true.', 'Ice-Cream-Waffle.jpg', 'Ice-Cream-Waffle.jpg', 'Ice-Cream-Waffle.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(30, 4, 6, 'Red Velvet Oreo Brownies', 'E-Shopper (pvt) Ltd', 650, 0, 'WOW @ these brownies...they\'ll disappear the instant you put them on the table!', 'Kitkat-Ice-Cream-Pie.jpg', 'Kitkat-Ice-Cream-Pie.jpg', 'Kitkat-Ice-Cream-Pie.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(31, 4, 7, 'Death By Chocolate Ice Cream', 'E-Shopper (pvt) Ltd', 200, 0, 'We don\'t say this lightly: This will be the best chocolate ice cream of your life.', 'Strawberry-Cake.jpg', 'Strawberry-Cake.jpg', 'Strawberry-Cake.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(32, 4, 8, 'Peanut Butter Explosion Cake', 'E-Shopper (pvt) Ltd', 150, 0, 'For this one you\'ll need an Instant Pot but man, oh, man is it worth it.', 'Strawberry-Short-Cake.jpg', 'Strawberry-Short-Cake.jpg', 'Strawberry-Short-Cake.jpg', 0, 'In Stock', '2020-07-24 16:21:18', '2020-07-24 17:21:18'),
(33, 5, 1, 'Orecchiette With Broccoli Rabe', 'E-Shopper (pvt) Ltd', 290, NULL, 'Show some love for broccoli rabe, would ya?', NULL, NULL, NULL, 50, 'In stock', '2020-11-26 20:33:50', NULL),
(34, 5, 2, 'BLT Sushi', 'E-Shopper (pvt) Ltd', 190, NULL, 'The low-carb sandwich substitute thats SO fun to eat.', NULL, NULL, NULL, 50, 'In stock', '2020-11-26 20:35:02', NULL),
(35, 5, 3, 'Garlic Butter Potatoes', 'E-Shopper (pvt) Ltd', 400, NULL, 'These are basically just cheesy garlic potatoes and we love em.', NULL, NULL, NULL, 50, 'In stock', '2020-11-26 20:35:55', NULL),
(36, 5, 4, 'Instant Pot Sweet Potatoes', 'E-Shopper (pvt) Ltd', 250, 0, 'So simple, but still super filling.', 'Instant Pot Sweet Potatoes', 'Instant Pot Sweet Potatoes', 'Instant Pot Sweet Potatoes', 0, 'In stock', '2020-11-26 20:28:09', NULL),
(37, 5, 5, 'Garlic Parmesan Flounder', 'E-Shopper (pvt) Ltd', 250, 0, 'We can never say no when it comes to garlic and Parmesan.', 'Instant Pot Sweet Potatoes', 'Instant Pot Sweet Potatoes', 'Instant Pot Sweet Potatoes', 0, 'In stock', '2020-11-26 20:29:24', NULL),
(38, 5, 6, 'Spinach Artichoke Zucchini Bites', 'E-Shopper (pvt) Ltd', 250, 0, 'Its no secret: We love Trader Joes frozen food.', 'Instant Pot Sweet Potatoes', 'Instant Pot Sweet Potatoes', 'Instant Pot Sweet Potatoes', 0, 'In stock', '2020-11-26 20:31:08', NULL),
(39, 5, 7, 'Fettuccine Alfredo', 'E-Shopper (pvt) Ltd', 250, 0, 'Need to use up some leftover chicken? Throw it in!', 'Instant Pot Sweet Potatoes', 'Instant Pot Sweet Potatoes', 'Instant Pot Sweet Potatoes', 0, 'In stock', '2020-11-26 20:31:47', NULL),
(40, 5, 8, 'Boursin-Stuffed Chicken', 'E-Shopper (pvt) Ltd', 300, NULL, 'Worthy of a holiday meal or dinner party, but with none of the usual stress.', NULL, NULL, NULL, 50, 'In stock', '2020-11-26 20:32:40', NULL),
(41, 8, 1, 'rtuyyi', 'rtryyuioio', 567, NULL, 'dfhjk', NULL, NULL, NULL, 30, 'ghjhkilk', '2020-11-27 05:26:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Vanilla Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(2, 1, 'Butter Milk Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(3, 1, 'Banana Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(4, 1, 'Nutella Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(5, 1, 'Strawberry Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(6, 1, 'Nutella Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(7, 1, 'Bacon Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(8, 1, 'Ihop Pancakes', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(9, 2, 'Chicken Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(10, 2, 'Beef Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(11, 2, 'Chinese Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(12, 2, 'Fish Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(13, 2, 'Vegetable Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(14, 2, 'Yellow Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(15, 2, 'Thai Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(16, 2, 'Spicy Rice', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(17, 3, 'Mixed Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(18, 3, 'Beef Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(19, 3, 'Chicken Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(20, 3, 'Chinese Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(21, 3, 'Vegetable Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(22, 3, 'Egg Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(23, 3, 'Mutton Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(24, 3, 'Chili Kottu', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(25, 4, 'Chocolate Dessert', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(26, 4, 'KitKat Icecream Pie', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(27, 4, 'Chocolate Cake', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(28, 4, 'Strawberry Cake', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(29, 4, 'Fruit Pizza', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(30, 4, 'Ice Cream Waffle', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(31, 4, 'Fruit Custard', '2020-07-24 17:21:18', '2020-07-24 17:21:18'),
(32, 4, 'Fruit Cream Cheese', '2020-07-24 17:21:18', '2020-07-24 17:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'johnshajanthan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-07-24 17:28:38', '', 1),
(2, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-13 15:04:09', NULL, 0),
(3, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-13 15:06:26', '13-11-2020 08:47:57 PM', 1),
(4, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-13 16:34:27', '13-11-2020 10:04:30 PM', 1),
(5, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-16 10:40:34', NULL, 1),
(6, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-16 11:19:26', NULL, 1),
(7, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-17 07:20:51', NULL, 1),
(8, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-17 09:30:30', '17-11-2020 03:59:36 PM', 1),
(9, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 03:13:41', NULL, 1),
(10, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 03:14:05', NULL, 1),
(11, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 03:14:12', NULL, 1),
(12, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 04:33:29', NULL, 1),
(13, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 05:22:14', NULL, 1),
(14, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 13:30:11', NULL, 1),
(15, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 14:44:50', NULL, 1),
(16, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 15:02:11', NULL, 1),
(17, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 15:18:15', NULL, 1),
(18, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-23 16:42:14', NULL, 1),
(19, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 02:42:11', NULL, 1),
(20, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 05:37:05', '24-11-2020 11:07:24 AM', 1),
(21, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 05:37:46', '24-11-2020 11:42:07 AM', 1),
(22, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 06:12:14', '24-11-2020 11:42:49 AM', 1),
(23, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 06:13:16', NULL, 1),
(24, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 13:42:42', '24-11-2020 08:06:52 PM', 1),
(25, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 14:47:46', '24-11-2020 08:33:58 PM', 1),
(26, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-24 15:15:32', NULL, 1),
(27, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 04:32:18', NULL, 1),
(28, 'abinesh@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 08:22:04', '25-11-2020 01:53:28 PM', 1),
(29, 'Kavin@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 08:24:00', '25-11-2020 01:56:12 PM', 1),
(30, 'Mugesh@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 08:26:43', NULL, 1),
(31, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:02:19', NULL, 1),
(32, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:03:12', NULL, 1),
(33, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:03:58', NULL, 1),
(34, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:07:09', NULL, 1),
(35, '1', 0x3a3a3100000000000000000000000000, '2020-11-25 18:09:34', NULL, 1),
(36, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:13:02', NULL, 1),
(37, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:17:28', NULL, 1),
(38, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:18:39', NULL, 1),
(39, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:19:00', NULL, 1),
(40, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-25 18:54:10', NULL, 1),
(41, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 01:12:40', NULL, 1),
(42, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 02:05:43', NULL, 1),
(43, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 05:00:58', NULL, 1),
(44, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 05:09:58', NULL, 1),
(45, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 06:37:36', NULL, 1),
(46, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 07:38:13', NULL, 1),
(47, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 08:16:54', NULL, 1),
(48, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 08:17:22', NULL, 1),
(49, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 08:31:49', NULL, 1),
(50, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 10:50:34', NULL, 1),
(51, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 15:27:40', NULL, 1),
(52, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 15:42:54', NULL, 1),
(53, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-26 15:43:12', NULL, 1),
(54, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 01:37:54', '27-11-2020 07:07:59 AM', 1),
(55, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 01:38:27', NULL, 1),
(56, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 03:29:06', NULL, 1),
(57, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:18:05', NULL, 1),
(58, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:19:12', NULL, 1),
(59, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:20:19', NULL, 1),
(60, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:21:57', NULL, 1),
(61, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:22:03', NULL, 1),
(62, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:23:00', NULL, 1),
(63, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:24:04', NULL, 1),
(64, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:24:35', NULL, 1),
(65, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:25:59', NULL, 1),
(66, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:26:04', NULL, 1),
(67, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:27:53', '27-11-2020 09:57:59 AM', 1),
(68, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:29:02', '27-11-2020 09:59:04 AM', 1),
(69, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 04:29:13', NULL, 1),
(70, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 05:11:18', NULL, 1),
(71, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 05:14:58', '27-11-2020 10:49:03 AM', 1),
(72, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 05:19:05', NULL, 1),
(73, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 05:21:51', NULL, 1),
(74, 'sivasinthu5@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 05:29:35', NULL, 1),
(75, 'ikirupan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-27 13:30:51', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'John Shajanthan', 'johnshajanthan@gmail.com', 7615148888, 'Abcd@0149', 'Kondavil East ', 'Northern', 'Jaffna', 40000, 'Kondavil', 'Northern', 'Jaffna', 40000, '2020-07-24 17:28:38', ''),
(2, 'Kirupan', 'ikirupan@gmail.com', 770221046, 'Master_1006', 'Karaveddy East , Karaveddy', 'Jaffna', 'Nelliady', 40000, 'Karaveddy', 'Nothern Province', 'Nelliady', 40040, '2020-11-13 15:06:20', NULL),
(3, 'Abinesh', 'abinesh@gmail.com', 770221049, 'Master', 'Karaveddy east , karaveddy.', 'jaffna', 'Nelliady', 50000, 'Karaveddy east , karaveddy.', 'Jaffna', 'Nelliady', 40040, '2020-11-25 08:21:44', NULL),
(4, 'Kavin', 'Kavin@gmail.com', 770221056, 'Master', 'Karaveddy east , karaveddy.', 'Jaffna', 'Nelliady', 40040, 'Karaveddy east , karaveddy.', '40,000', 'Nelliady', 0, '2020-11-25 08:24:00', NULL),
(5, 'Mugesh', 'Mugesh@gmail.com', 770221049, 'Mugesh', 'Karaveddy east , karaveddy.', 'jaffna', 'Nelliady', 50000, 'Karaveddy east , karaveddy.', 'Jaffna', 'Nelliady', 40040, '2020-11-25 08:26:43', NULL),
(6, 'sinthuja', 'sivasinthu5@gmail.com', 7786457665, 'sivaa', 'karaveddy east', 'Nothern Province', 'nelliyady', 40000, 'karaveddy', 'karaveddy east', 'nelliyady', 40000, '2020-11-27 05:29:35', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
