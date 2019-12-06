-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 04:18 PM
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
  `breakfast_id` int(32) NOT NULL DEFAULT 0,
  `lunch_id` int(32) NOT NULL DEFAULT 0,
  `dinner_id` int(32) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meals_id`, `date`, `user_id`, `breakfast_id`, `lunch_id`, `dinner_id`) VALUES
(11, '2019-12-06', 1, 3, 2, 1),
(12, '2019-12-07', 1, 1, 0, 0),
(14, '2019-12-08', 1, 3, 0, 0),
(15, '2019-12-09', 1, 0, 2, 0);

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
(2, 'Beef Stir Fry', 0, '2 tablespoons vegetable oil,1 pound beef sirloin, cut into 2-inch strips,1 1/2 cups fresh broccoli florets,1 red bell pepper, cut into matchsticks,2 carrots, thinly sliced,1 green onion, chopped,1 teaspoon minced garlic,2 tablespoons soy sauce,2 tablespoons sesame seeds, toasted', 'Heat vegetable oil in a large wok or skillet over medium-high heat; cook and stir beef until browned, 3 to 4 minutes. Move beef to the side of the wok and add broccoli, bell pepper, carrots, green onion, and garlic to the center of the wok.\r\n\r\nCook and stir vegetables for 2 minutes.\r\nStir beef into vegetables and season with soy sauce and sesame seeds. Continue to cook and stir until vegetables are tender, about 2 more minutes.', 600),
(3, 'Breakfast Burrito', 0, '\r\n4 Eggs, Sausage, cheese, tortillas', 'Make the stuff and wrap it up', 300),
(5, 'Test', 1, 'test,test,test', 'testsetsetsetestset', 1200),
(6, 'Please Work', 1, 'please work', 'please work', 2020),
(7, 'test1 123', 1, 'test1', 'test1', 1),
(8, 'test2 456', 1, 'test2', 'test2', 2),
(9, 'test3 789', 1, 'test3', 'test3', 3),
(10, 'test', 1, '1', '2', 3),
(11, 'Please Dont BReak', 1, 'Please Dont BReak', 'Please Dont BReak\r\nPlease Dont BReak\r\nPlease Dont BReak', 123),
(12, 'Please Dont BReak', 1, 'Please Dont BReak', 'Please Dont BReak\r\nPlease Dont BReak\r\nPlease Dont BReak', 123),
(13, 'test ', 1, 'test1', '1 test\r\n2 test2\r\n3 test3', 1234),
(14, 'Test', 1, 'test', 'test', 1123),
(15, 'Sushi', 1, 'Sushi stuff', '1. Make the sushi with the stuff\r\n2. New line\r\n3. New line', 400);

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
  MODIFY `meals_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
