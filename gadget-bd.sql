-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 09:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadget-bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sl` int(11) NOT NULL,
  `d_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `p_date` varchar(255) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sl`, `d_id`, `email`, `p_date`, `total`) VALUES
(85, 'e9f8ff8008b98f01600cf745cb865d3b', 'admin@admin.com', '02:38:am  |  18-12-2021', '4100');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `o_price` double(10,2) NOT NULL,
  `n_price` double(10,2) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description1` varchar(500) NOT NULL,
  `description2` varchar(500) NOT NULL,
  `description3` varchar(500) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `o_price`, `n_price`, `brand`, `description1`, `description2`, `description3`, `type`, `category`, `stock`) VALUES
(1, 'Product//Laptop//laptop1.jpg', 'Dell Inspiron 15', 45000.00, 40000.00, 'Dell', 'Dell Inspiron 15 3505 Ryzen 3', '', '', 'Hardware', 'Laptop', 20),
(2, 'Product//Laptop//Laptop5.jpg', 'Asus Vivobook Go 14', 40000.00, 35000.00, 'Asus', 'Asus Vivobook Go 14 E410MA Celeron N4020 14\" HD Laptop', '', '', 'Hardware', 'Laptop', 15),
(3, 'Product//Laptop//Laptop4.jpg', 'Asus ZenBook 14', 90000.00, 82000.00, 'Asus', 'Asus ZenBook 14 UX425JA Core i5 10th Gen 512GB SSD 14\" FHD Laptop with Windows 10', 'Intel Core i5-1035G1 Processor (6M Cache, 1.00 GHz up to 3.60 GHz)', '8GB LPDDR4X RAM', 'Hardware', 'Laptop', 10),
(4, 'Product//Laptop//Laptop2.jpg', 'HP ZBook Firefly 14', 190000.00, 160000.00, 'HP', 'Model: ZBook Firefly 14 G7', 'Intel Core i7-10510U Processor (8M Cache, 1.80 GHz up to 4.90 GHz)', '16GB DDR4 2666MHz RAM', 'Hardware', 'Laptop', 12),
(5, 'Product//Desktop//Desktop5.jpg', 'AMD Ryzen 9 3900X Gaming PC', 218000.00, 200000.00, 'Ryzen', 'Model: AMD Ryzen 9 3900X', '8GB 3600MHz RAM + 1TB HDD + 250GB SSD', 'RTX 3070 Ti Trinity 8GB Graphics Card', 'Hardware', 'Desktop', 5),
(6, 'Product//Desktop//Desktop4.jpg', 'Intel Core i5-11400 Gaming PC', 120000.00, 105000.00, 'Intel', 'Model: Core i5-11400 11th Gen Gaming PC', '8GB 3600MHz RAM + 1TB HDD + 256GB M.2 PCIe SSD', 'GTX 1660 SUPER SC ULTRA GAMING 6GB Graphics', 'Hardware', 'Desktop', 15),
(7, 'Product//Desktop//Desktop1.jpg', 'Walton Kaiman Ex B', 40000.00, 30000.00, 'Walton', 'Model: Kaiman Ex B WDPCG65051', '8GB DDR4 2666MHz RAM', '128GB M.2 2280 SATA SSD, 1TB 7200 rpm HDD', 'Hardware', 'Desktop', 10),
(8, 'Product//Desktop//Desktop2.jpg', 'Acer Veriton M4660G', 60000.00, 45000.00, 'Acer', 'Model: Veriton M4660G', 'Intel Core i7-8700 Processor (12M Cache, 3.20 GHz, up to 4.60 GHz)', '8GB DDR4 2400 MHz RAM, 1TB 7200 rpm SATA HDD', 'Hardware', 'Desktop', 5),
(9, 'Product//Desktop//Desktop3.jpg', 'ASUS D641MD Intel Core i7', 75000.00, 60000.00, 'Asus', 'Model: ASUS D641MD Brand PC', 'Intel Core i7-9700 Processor (12M Cache, 3.0 GHz up to 4.7 GHz)', '4GB DDR4 RAM', 'Hardware', 'Desktop', 5),
(10, 'Product//Headphone//Headphone1.jpg', 'HP Omen Gaming Headset', 10000.00, 5000.00, 'HP', 'Model: HP Omen Wired Gaming Headset with SteelSeries', 'Connectivity: 3.5mm Adapter', 'Dimensions:205 x 180 x 100 mm', 'Hardware', 'Headphone', 3),
(11, 'Product//Headphone//Headphone2.jpg', 'Asus HV-H2178D Wired Headphone', 3000.00, 2500.00, 'Asus', 'Model: Asus HV-H2178D', 'Frequency: 20Hz to 20KHz', 'Sensitivity: 110 dB ± 3 dB', 'Hardware', 'Headphone', 8),
(12, 'Product//Headphone//Headphone3.jpg', 'ASUS H111 STEREO Headset', 1500.00, 600.00, 'Asus', 'Model: Asus H111', 'Frequency: 20Hz - 20kHz', 'Sensitivity: 100dB +/-3dB', 'Hardware', 'Headphone', 4),
(14, 'Product//Headphone//Headphone4.jpg', 'HP T3 Wireless Bluetooth Headphone', 3000.00, 2000.00, 'HP', 'Model: HP T3', 'Loudspeaker Output: 30 mW', 'Frequency Response: 20 Hz - 20 kHz', 'Hardware', 'Headphone', 6),
(15, 'Product//Headphone//Headphone5.jpg', 'Asus Cerberus V2 3.5mm gaming Headphone', 6000.00, 4000.00, 'Asus', 'Model: Asus Cerberus', '3.5mm audio line-in AUX func5on', 'In-line Microphone Sensitivity: -45 dB ± 3 dB', 'Hardware', 'Headphone', 10),
(16, 'Product//Keyboard//Keyboard1.jpg', 'Asus TUF Gaming K3 RGB Mechanical Keyboard', 7500.00, 6000.00, 'Asus', 'Model: TUF Gaming K3', '19-key-rollover (NKRO) technology', '300 ml spill-resistant frame', 'Hardware', 'Keyboard', 15),
(17, 'Product//Keyboard//Keyboard2.jpg', 'Asus XA03 ROG Strix Gaming Keyboard', 14000.00, 9000.00, 'Asus', 'Model: XA03 ROG Strix Scope', 'Unlimited Customization', 'Great for FPS Games', 'Hardware', 'Keyboard', 10),
(18, 'Product//Keyboard//Keyboard3.jpg', 'Dell KM717 Premier Wireless Keyboard', 9000.00, 5000.00, 'Dell', 'Model: Dell KM717', 'Type : Wireless', 'Weight: 17.5 in x 5.6 in x 1 in', 'Hardware', 'Keyboard', 10),
(19, 'Product//Software//Software1.jpg', 'Microsoft 365 F1 (1 Year Subscription)', 5000.00, 3000.00, 'Microsoft', 'Model: Microsoft 365 F1', 'Connect your workforce', 'Social and intranet', 'Software', 'Cloud Solutions', 6),
(20, 'Product//Software//Software2.jpg', ' Office 365 Enterprise E1 (1 Year Subscription)', 10000.00, 7000.00, 'Microsoft', 'Model: Office 365 Enterprise E1', 'Email, file storage, and sharing', 'Office on the web', 'Software', 'Cloud Solutions', 10),
(21, 'Product//Software//Software3.jpg', 'Microsoft Windows 10 Professional 64bit', 15000.00, 11000.00, 'Microsoft', 'Model: WIN Pro 10 64bit 1PK OEI', 'Processor: 1GHz or faster', 'Licence Type : Perpetual (Life Time)', 'Software', 'Operating System', 18),
(22, 'Product//Software//Software4.jpg', 'Red Hat Enterprise Linux Server', 10000.00, 7000.00, 'Red Hat', 'Model: Red Hat Enterprise Linux Server (Annual Subscription)', 'Easy-to-administer, Simple-to-control', '24x7 for severity 1 and 2 cases', 'Software', 'Operating System', 5),
(23, 'Product//Software//Software5.jpg', 'ESET NOD32 Antivirus (2021 Edition)', 1000.00, 600.00, 'ESET', 'Model: ESET NOD32', 'Reliable protection without slowdowns', 'Light on computer resources', 'Software', 'Anti-virus', 25),
(24, 'Product//Software//Software6.jpg', 'ESET Multi-Device Security Pack', 6000.00, 4000.00, 'ESET', 'Model: ESET Multi-Device Security Pack for 3 User', 'Powerful Antivirus', 'Anti-Phishing\r\nAnti-Theft\r\nPersonal Firewall', 'Software', 'Anti-virus', 15),
(25, 'Product//Software//Software7.jpg', 'ADOBE PREMIERE PRO CC 2021', 1200.00, 600.00, 'Adobe', 'Model: ADOBE PREMIERE PRO CC', 'Small-screen productions', 'Go big on the big screen', 'Software', 'Adobe Softwares', 6),
(26, 'Product//Software//Software8.jpg', 'ADOBE ILLUSTRATOR CC 2021', 1500.00, 800.00, 'Adobe', 'Model: ADOBE ILLUSTRATOR CC', '10x faster zoom', 'Edit once, update everywhere', 'Software', 'Adobe Softwares', 8),
(27, 'Product//Software//Software9.jpg', 'Adobe Photoshop CC 2021', 1100.00, 650.00, 'Adobe', 'Model: Adobe Photoshop CC', 'Content-Aware Crop', 'Face-Aware Liquify', 'Software', 'Adobe Softwares', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signup_date` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `image`) VALUES
(1, 'Erfan', 'Mostafiz', 'erfan_mostafiz', 'Erfan1@gmail.com', '3d33f9221689dd17541b94d6579ce60c', '2021-12-03', 'images/profile_pics/defaults/head_deep_blue.png'),
(2, 'admin', 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2021-11-28', 'images/profile_pics/defaults/head_emerald.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
