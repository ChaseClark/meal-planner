-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 05:11 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meal_planner`
--
CREATE DATABASE IF NOT EXISTS `meal_planner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `meal_planner`;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meals_id` int(32) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(32) NOT NULL,
  `breakfast_id` int(32) NOT NULL,
  `lunch_id` int(32) NOT NULL,
  `dinner_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meals_id`, `date`, `user_id`, `breakfast_id`, `lunch_id`, `dinner_id`) VALUES
(1, '2019-11-21', 1, 1, 2, 3),
(2, '2019-11-22', 1, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_custom` tinyint(1) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `calories` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `name`, `is_custom`, `ingredients`, `instructions`, `calories`) VALUES
(1, 'Filet Mignon', 0, '\r\n2 tbsp. olive oil, 4 filet mignon, salt, pepper, 4 tbsp. butter, 1tbsp. roughly chopped rosemary\r\n', '1.Preheat oven to 400°. In a large skillet over medium-high heat, heat oil. Season steak with salt and pepper on both sides. When oil is just about to smoke, add steak. Cook until very seared, about 5 minutes, then flip and add butter and rosemary. Baste with butter and cook another 5 minutes.\r\n\r\n2. Transfer skillet to oven and cook until cooked to your liking, about 10 minutes for medium.\r\n\r\n3. Remove from pan and let rest 5 minutes before slicing.', 500),
(2, 'Salmon', 0, '\r\nSalmon, salt, pepper, other stuff', 'Cook the Salmon', 400),
(3, 'Breakfast Burrito', 0, '\r\n4 Eggs, Sausage, cheese, tortillas', 'Make the stuff and wrap it up', 300);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(32) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin@admin.com', 'admin'),
(2, 'test@test.com', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meals_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meals_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
