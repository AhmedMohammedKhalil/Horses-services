-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 12:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horses`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(5, 'admin', 'admin@gmail.com', '$2y$10$SQ88F4HcaLjT7GSq1SboX.zvwRfsRJtwNjgmtnt632R4IcZg/J9FS');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `details` text NOT NULL,
  `treatment` text NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `title`, `details`, `treatment`, `doctor_id`) VALUES
(4, 'foot surgery case', 'A case of surgery in the left foot lasted four hours, and the result was the return of the horse to its normal state after 4 months', 'Antibiotic\r\nAntibacterial', 1),
(6, 'surgery', 'Abdominal surgery for horse', 'Broad spectrum antibiotic', 1),
(7, 'Arabian horse breeding pr', 'Arabian horse breeding process take 2 hours', 'Anti-Bacterial, Anti-Inflammatory', 2),
(8, 'Abdominal vascular surger', 'Abdominal vascular surgery take 4 hours', 'horse antiparasitic', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `photo` text NOT NULL,
  `specialization` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `description`, `address`, `email`, `phone`, `password`, `photo`, `specialization`) VALUES
(1, 'Ahmed Elharagy', 'Veterinary medicine is one of the most important and prominent specializations in international universities', 'Kuwait,elsalmia', 'ahmedharagy12@gmail.com', '061234', '$2y$10$.K.sUiFXFjwLRmrBjMGnAu/PcnvQI6nXCkzg8O/WJ3BuOhb9PS/6.', '7.jpg', 'Clinical Pathology'),
(2, 'Alaa Elamousy', 'The surgery doors open daily from 08:00 - 18:30. Appointments are not available to book until 08:30. The Surgery telephone systems are operated', 'Kuwait , elwafra', 'alaa15@gmail.com', '695213', '$2y$10$.K.sUiFXFjwLRmrBjMGnAu/PcnvQI6nXCkzg8O/WJ3BuOhb9PS/6.', '7.jpg', 'Obstetrics and gynecology.');

-- --------------------------------------------------------

--
-- Table structure for table `previous_works`
--

CREATE TABLE `previous_works` (
  `id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `placement` text NOT NULL,
  `details` text NOT NULL,
  `job_estimation` varchar(30) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `previous_works`
--

INSERT INTO `previous_works` (`id`, `job_title`, `placement`, `details`, `job_estimation`, `trainer_id`) VALUES
(1, 'Horse trainer', 'Kuait,elsalmia', 'Horse trainer Details', '3 years', 2),
(2, 'Horse trainer', 'Kuait,Elkhairan', 'Horse trainer worked in Kuait,Elkhairan for 1 year', '1 year', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `details` text DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `price` double NOT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `details`, `name`, `price`, `photo`) VALUES
(3, 'Grooming Items', 'This tiny comb is the perfect size to get that hard to pull mane just right.', 'Aluminum Pulling Comb', 1.4, 'JSG29413-600x600.jpg'),
(5, 'Grooming', 'Grooming Kit Bag tools with good price', 'Grooming Kit Bag', 18.3, 'RY-9002-JSG34902.jpg'),
(6, 'Fly Mask w/ Fleece', 'Lycra Material Throughout (Except Ears and Eyes)\r\nMesh Around Eyes and Ears\r\nFits Like a Glove\r\nBinding Around Edges and Tab at Poll For Easy Removal', 'Average Horse Pink Comfor', 28.6, 'FM-2-GRAY.jpg'),
(7, 'PARISOL Horse Fly Shock', 'Highly effective insect protection spray\r\nUp to 8 hours of protection against horseflies, mosquitoes, flies and ticks\r\nParticularly skin- and material-friendly effective ingredient, icaridin\r\nFree from essential oils and perfumes\r\nWithout added colourants and preservatives', 'PARISOL Horse Fly Shock –', 35, 'E1261.jpg'),
(8, 'Tgw Riding Horse', 'Horse Fly Mask, Designed with comfort and convenience in mind. This generously measured fly mask slips easily on and off the horses head for a secure and comfortable fit. Dark blue horse fly masks are the same color as Royal Blue horse fly masks.\r\n\r\nThe fly mask can even be worn over a halter. The snug-fitting lycra helps eliminate gaps between the mask and skin to keep pests out.\r\n\r\nThe soft mesh protects the eyes and ears while providing full visibility. This horse mask won’t be too tight, horse can open their eyes.\r\n\r\nThis horse mask uses Nylon Lycra fabric instead of cheap polyester Lycra fabric with high-strength nylon mesh fabric that covers the face from the horse’s ear to the forehead. The one-piece mask without any hook and loop fasteners. Easy to wear during the process will not stimulate the horse. The secure fit of this mask makes it a great option for the horse that tends to remove traditional, strap-on masks. , which makes the product have better tensile properties and better handle.', 'Tgw Riding Horse Lycra Fl', 12, 'HP-012961-PUR.jpg'),
(9, 'Fly Spray', 'Effectively kills and repels flies, mosquitos, gnats, fleas and ticks\r\n\r\nMicro-emulsified for better penetration of the coat\r\nCan be used on horses, ponies, dogs and premise\r\nNon oily formula with a pleasant citronella scent\r\n32 oz. sprayer\r\nMade in the USA', 'BRONCO Fly Spray (32 oz)', 8, '18444_32oz-500x500-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `photo` text DEFAULT NULL,
  `specialization` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `description`, `address`, `email`, `phone`, `password`, `photo`, `specialization`) VALUES
(1, 'ahmed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu facilisis lectus, sed feugiat tellus nulla eu dolor. Nulla porta bibendum lectus quis euismod. Aliquam volutpat ultricies porttitor. Cras risus nisi, accumsan vel cursus ut, sollicitudin vitae dolor. Fusce scelerisque eleifend lectus in bibendum. Suspendisse lacinia egestas felis a volutpat.\r\n', 'address', 'amk@gmail.com', '695324', '$2y$10$fSVZgvFr/4dsG8zXFACzxeSRxP9G/lAKkynIc9bFKN8U3TX/3E2Ca', NULL, 'horses'),
(2, 'Paul Wiley', 'Incidunt reprehende', 'Quod sit ipsum imped', 'adam@yahoo.com', '695321', '$2y$10$/MdqpBLfLgoBlTTAod1PSu/TXhJM6ZD2gco3rrTlmJyJo0/8DucuK', '6.jpg', 'Dolorem in cupidatat');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_products`
--

CREATE TABLE `trainer_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer_products`
--

INSERT INTO `trainer_products` (`id`, `product_id`, `trainer_id`) VALUES
(5, 3, 1),
(7, 5, 1),
(8, 6, 1),
(9, 7, 1),
(10, 8, 2),
(11, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` text NOT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `phone`, `password`, `photo`) VALUES
(3, 'Ahmed Sadaan', 'kuwait ,Sabah Elahmed', 'ahmedsaadan11@gmail.com', '695325', '$2y$10$8uzkB4gTp5z0lYk.6WukU.GoKKImzfl8cOva//zq0QwRYeggvq2Ri', '9.jpg'),
(4, 'Abed Karam', 'Kuwait,elraafaey', 'abedkaram123@yahoo.com', '695325', '$2y$10$.mXVICdFZS7EPdXiFP.TAe6JJ89IbkWOJHOflBl3dXl2K6A5DdLaq', '23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`id`, `user_id`, `product_id`) VALUES
(4, 3, 9),
(5, 3, 9),
(6, 4, 6),
(7, 4, 7),
(8, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE `user_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reviews`
--

INSERT INTO `user_reviews` (`id`, `user_id`, `review`, `product_id`) VALUES
(3, 3, 'Cheap', 9),
(4, 4, 'excellent', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previous_works`
--
ALTER TABLE `previous_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_products`
--
ALTER TABLE `trainer_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `previous_works`
--
ALTER TABLE `previous_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainer_products`
--
ALTER TABLE `trainer_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `previous_works`
--
ALTER TABLE `previous_works`
  ADD CONSTRAINT `previous_works_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`);

--
-- Constraints for table `trainer_products`
--
ALTER TABLE `trainer_products`
  ADD CONSTRAINT `trainer_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `trainer_products_ibfk_2` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user_orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD CONSTRAINT `user_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
