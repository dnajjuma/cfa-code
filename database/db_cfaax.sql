-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2022 at 02:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cfaax`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `Date_time`) VALUES
(38, 'Diana', 'Najjuma', 'diananajjuma92@gmail.com', '$2y$10$gqgrbfMSAAlCF6yXiCjXEexKSKm8GRnv/vi2GqcGptteel6bOiSOm', '2022-07-16 15:46:51'),
(39, 'Trey', 'Kikonyogo', 'ken@gmail.com', '$2y$10$j171jHDZ8YhmPYAKnsoKquUj9CcVJqVpVKVYJ567oxeErUxDDcDwO', '2022-07-18 15:27:17'),
(40, 'Havillah', 'Mirembe', 'havie@gmail.com', '$2y$10$PPjFsO7lK/vA6.c0KCZ/se8yn7C4dDsNeXfcMLQX.pXZgDLQKRRUa', '2022-07-18 15:27:57'),
(41, 'Edward', 'Kalungi', 'edward@gmail.com', '$2y$10$jNdUJhW4m.KiCjJ4s1hpQ.IKmR0KFIppltgnHFBgUn9qPNvj/Lss6', '2022-07-19 12:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `name`, `amount`) VALUES
(1, 'muno', 2000),
(2, 'water', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` int(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `downloads`) VALUES
(1, 0, 145812, 0),
(2, 0, 117927, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrower`
--

CREATE TABLE `tbl_borrower` (
  `id` int(11) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_borrower`
--

INSERT INTO `tbl_borrower` (`id`, `fName`, `lName`, `contact`, `address`) VALUES
(1, 'Dianah', 'Najjuma', '0700004560', 'Makerere'),
(2, 'Hananiah', 'Chagga', '0706234156', 'Mengo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_budget`
--

CREATE TABLE `tbl_budget` (
  `id` int(11) NOT NULL,
  `budget` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chairperson`
--

CREATE TABLE `tbl_chairperson` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `address` varchar(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chairperson`
--

INSERT INTO `tbl_chairperson` (`id`, `name`, `contact`, `address`, `image_url`) VALUES
(38, 'Jessica', '0700004561', 'Kamwokyah', 'IMG-62d7ec9b30d081.62575321.jpg'),
(39, 'Mike', '0784320381', 'Buuga', 'IMG-62d7f5d884a7a2.32471118.jpg'),
(40, 'Elijah', '0706234156', 'Bukoto', 'IMG-62d7f5f9deab45.91296932.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_creditunit`
--

CREATE TABLE `tbl_creditunit` (
  `id` int(11) NOT NULL,
  `creditunit` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_division`
--

CREATE TABLE `tbl_division` (
  `id` int(11) NOT NULL,
  `division` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_division`
--

INSERT INTO `tbl_division` (`id`, `division`) VALUES
(1, 'RUBAGA'),
(2, 'KAWEMPE'),
(5, 'NAKAWA'),
(6, 'MAKINDYE'),
(9, 'CENTRAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `id` double DEFAULT NULL,
  `vslaName` varchar(100) DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `capacity` double DEFAULT NULL,
  `averageage` double DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `males` double DEFAULT NULL,
  `females` double DEFAULT NULL,
  `year` double DEFAULT NULL,
  `savings` double DEFAULT NULL,
  `shareouts` double DEFAULT NULL,
  `loanstaken` double DEFAULT NULL,
  `loansreturned` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `vslaName`, `division`, `location`, `capacity`, `averageage`, `status`, `activity`, `males`, `females`, `year`, `savings`, `shareouts`, `loanstaken`, `loansreturned`) VALUES
(1, 'Muno', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2016, 1500000, 2530691, 2105000, 2105000),
(2, 'Binusu', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2016, 1450900, 3600264, 3109700, 2959000),
(3, 'Zivamutunyo', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2016, 3850800, 5424193, 5500000, 5500000),
(4, 'Mazima', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2016, 2616000, 3454538, 3005000, 2994000),
(5, 'Muda', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2016, 4593700, 4969262, 5007500, 5005000),
(6, 'Anbanked', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, 3523200, 4008414, 3976000, 3806000),
(7, 'Women of the future', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2016, 3021347, 3850116, 4289000, 4200000),
(8, 'Kanomukanasatu', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2016, 3395593, 3634155, 3600000, 3600000),
(9, 'Buwanguzi', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2016, 4512192, 5535032, 5600000, 5600000),
(10, 'Top Cops', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2016, 4216612, 5143793, 5287000, 5200000),
(11, 'Miti emito', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2016, 2716747, 3476034, 3010000, 3010000),
(12, 'Kisa kyamukama', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2016, 3302295, 3930765, 3912000, 3850000),
(13, 'Kwagalana', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, 4416002, 4092465, 4320000, 4230000),
(14, 'Gakyaali', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2016, 3769231, 4859696, 5165000, 5001000),
(15, 'Kwezimba', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2016, 3614242, 4516523, 4412000, 4305000),
(16, 'Tuliwamu', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2016, 3735007, 4344669, 3986000, 3986000),
(17, 'Agali awamu', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2016, 1481326, 2027837, 1640000, 1640000),
(18, 'Kamukamu', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2016, 3867621, 4692945, 4830000, 4720000),
(19, 'Bisente', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2016, 3366308, 5074975, 5312000, 5280000),
(20, 'Cash money', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2016, 3396032, 4256251, 4621000, 4556000),
(21, 'Sekamuli', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2016, 3290000, 1809900, 2900000, 2897000),
(22, 'Nyakisenyi', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2016, 4450000, 4087600, 4300000, 4230000),
(23, 'Kyokasegu', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2016, 5455000, 3906000, 5005600, 4915000),
(24, 'Waswatuliwamu', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2016, 1338000, 2009800, 2434000, 2408300),
(25, 'Gwowonya Eggere', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2016, 1956000, 2707400, 3070000, 2945000),
(26, 'Kabunyata', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, 2658000, 3400000, 3400000, 3200000),
(27, 'Kiriri', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2016, 3089000, 4090000, 4175000, 4050000),
(28, 'Ngomannene', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2016, 4458000, 6167000, 5545000, 5489000),
(29, 'Katimba', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2016, 3940000, 5129000, 4870000, 4780000),
(30, 'Akutwala Ekiro', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2016, 2789000, 3650000, 2900000, 2864000),
(31, 'Bananywa', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2016, 4279400, 5247000, 4540500, 4450000),
(32, 'Kimwanyi', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2016, 1208700, 2230000, 1605000, 1560000),
(33, 'Bulinda', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, 2886000, 3804000, 3280000, 3276000),
(34, 'Wamala', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2016, 2656000, 2930000, 2643000, 2560600),
(35, 'Zzikusoka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2016, 2745600, 2908000, 3060000, 2970000),
(36, 'Kasawo', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2016, 3620000, 3804000, 3508900, 3496000),
(37, 'Kisongoza', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2016, 2440000, 2756000, 2980900, 2780000),
(38, 'Ndegeya', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2016, 2810000, 2230600, 3009800, 2910000),
(39, 'Migade', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2016, 4062000, 4620000, 4550000, 4440000),
(40, 'Kabuwembo', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2016, 4850000, 5430000, 5940000, 5940000),
(41, 'Bulwadda', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2016, 2530000, 2712000, 2580600, 2587000),
(42, 'Balyesiima', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2016, 4620000, 5070000, 5509000, 5500500),
(43, 'Balikyewunya', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2016, 5700000, 6605000, 6910000, 6910000),
(44, 'Saagala Agalamidde', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2016, 2908000, 3910000, 2840000, 2840000),
(45, 'Kitibwa', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2016, 2367000, 2905000, 2850000, 2850000),
(46, 'Lwamatengo', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, 2387000, 2809800, 2500000, 2450000),
(47, 'Bwasandeku', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2016, 2865000, 3198000, 2809800, 2700000),
(48, 'Balikuddembe', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2016, 5890700, 6240000, 6370000, 6270000),
(49, 'Luwafu', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2016, 4759000, 5220000, 4529000, 4429000),
(50, 'Mukwano', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2016, 2643000, 3317800, 2208000, 2145000),
(51, 'Kalungu', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2016, 4548600, 5239000, 5598000, 5465000),
(52, 'Kachera', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2016, 1684000, 2224000, 1630000, 1556000),
(53, 'Galinya', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, 2332000, 2895400, 2550000, 2485000),
(54, 'Bwendero', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2016, 2916000, 3540500, 2606000, 2540000),
(55, 'Bataka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2016, 3276000, 4007000, 4040000, 3990800),
(56, 'Mbirizi', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2016, 2954000, 3605000, 3809000, 3780400),
(57, 'Buwama', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2016, 2435000, 2940000, 2850000, 2788000),
(58, 'Kkasunga', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2016, 2265000, 2904500, 2545700, 2456800),
(59, 'Nyanama', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2016, 3859000, 4705600, 4502300, 4419000),
(60, 'Mutakanya', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2016, 5376000, 6007800, 6500000, 6500000),
(1, 'Muno', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2017, 1800000, 2780000, 3080000, 2880000),
(2, 'Binusu', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2017, 2450900, 3430900, 3381800, 3181800),
(3, 'Zivamutunyo', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2017, 3850800, 4830800, 6181600, 5981600),
(4, 'Mazima', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2017, 3016000, 3996000, 4512000, 4312000),
(5, 'Muda', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2017, 4993700, 5973700, 5467400, 5267400),
(6, 'Anbanked', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2017, 3623200, 4603200, 5726400, 5526400),
(7, 'Women of the future', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2017, 3221347, 4201347, 4922694, 4722694),
(8, 'Kanomukanasatu', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2017, 3495593, 4475593, 5471186, 5271186),
(9, 'Buwanguzi', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2017, 4612192, 5592192, 5704384, 5504384),
(10, 'Top Cops', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2017, 4566612, 5546612, 6113224, 5913224),
(11, 'Miti emito', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2017, 2916747, 3041247, 3457994, 3257994),
(12, 'Kisa kyamukama', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2017, 3982295, 4106795, 5589090, 5389090),
(13, 'Kwagalana', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2017, 4886002, 5010502, 7396504, 7296504),
(14, 'Gakyaali', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2017, 3969231, 4093731, 5562962, 5462962),
(15, 'Kwezimba', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2017, 3814242, 3938742, 5252984, 5152984),
(16, 'Tuliwamu', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2017, 3935007, 4059507, 5494514, 5394514),
(17, 'Agali awamu', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2017, 1981326, 2105826, 1587152, 1487152),
(18, 'Kamukamu', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2017, 4167621, 4292121, 5959742, 5859742),
(19, 'Bisente', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2017, 3766308, 3890808, 5157116, 5057116),
(20, 'Cash money', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2017, 3396032, 3520532, 4416564, 4316564),
(21, 'Sekamuli', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2017, 3590000, 3714500, 4804500, 4704500),
(22, 'Nyakisenyi', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2017, 4650000, 4774500, 6924500, 6824500),
(23, 'Kyokasegu', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2017, 5655000, 5779500, 8934500, 8834500),
(24, 'Waswatuliwamu', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2017, 1638000, 1762500, 900500, 800500),
(25, 'Gwowonya Eggere', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2017, 2106000, 2230500, 1836500, 1736500),
(26, 'Kabunyata', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2017, 2858000, 2982500, 3340500, 3240500),
(27, 'Kiriri', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2017, 3289000, 3413500, 4202500, 4102500),
(28, 'Ngomannene', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2017, 4458000, 4582500, 6540500, 6440500),
(29, 'Katimba', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2017, 4340000, 4464500, 6304500, 6204500),
(30, 'Akutwala Ekiro', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2017, 3259000, 3609000, 4368000, 4318000),
(31, 'Bananywa', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2017, 4579400, 4929400, 7008800, 6958800),
(32, 'Kimwanyi', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2017, 1808700, 2158700, 1467400, 1417400),
(33, 'Bulinda', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2017, 2986000, 3336000, 3822000, 3772000),
(34, 'Wamala', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2017, 2856000, 3206000, 3562000, 3512000),
(35, 'Zzikusoka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2017, 2845600, 3195600, 3541200, 3491200),
(36, 'Kasawo', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2017, 3920000, 4270000, 5690000, 5640000),
(37, 'Kisongoza', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2017, 2440000, 2790000, 2730000, 2680000),
(38, 'Ndegeya', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2017, 2910000, 3260000, 3670000, 3620000),
(39, 'Migade', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2017, 4562000, 4912000, 6974000, 6924000),
(40, 'Kabuwembo', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2017, 5250000, 5600000, 6350000, 6300000),
(41, 'Bulwadda', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2017, 2670000, 3020000, 3190000, 3140000),
(42, 'Balyesiima', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2017, 4760000, 5110000, 5370000, 5320000),
(43, 'Balikyewunya', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2017, 5790000, 6140000, 6430000, 6380000),
(44, 'Saagala Agalamidde', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2017, 2998000, 3348000, 3846000, 3796000),
(45, 'Kitibwa', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2017, 2567000, 2917000, 2984000, 2934000),
(46, 'Lwamatengo', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2017, 2587000, 2937000, 3024000, 2974000),
(47, 'Bwasandeku', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2017, 3065000, 3415000, 3980000, 3930000),
(48, 'Balikuddembe', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2017, 6190700, 6540700, 10231400, 10181400),
(49, 'Luwafu', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2017, 4959000, 5309000, 7768000, 7718000),
(50, 'Mukwano', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2017, 3243000, 3663000, 4406000, 4356000),
(51, 'Kalungu', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2017, 748600, 1168600, 517200, 467200),
(52, 'Kachera', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2017, 2284000, 2704000, 2488000, 2438000),
(53, 'Galinya', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2017, 2532000, 2952000, 2984000, 2934000),
(54, 'Bwendero', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2017, 3116000, 3536000, 4152000, 4102000),
(55, 'Bataka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2017, 3476000, 3896000, 4872000, 4822000),
(56, 'Mbirizi', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2017, 3154000, 3574000, 4228000, 4178000),
(57, 'Buwama', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2017, 2635000, 3055000, 3190000, 3140000),
(58, 'Kkasunga', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2017, 2465000, 2885000, 2850000, 2800000),
(59, 'Nyanama', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2017, 4059000, 4479000, 6038000, 5988000),
(60, 'Mutakanya', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2017, 5676000, 6096000, 6272000, 6222000),
(1, 'Muno', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2018, 943000, 1530691, 1805000, 1670000),
(2, 'Binusu', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2018, 970900, 2600264, 2809700, 2659000),
(3, 'Zivamutunyo', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2018, 3150800, 4424193, 5100000, 4500000),
(4, 'Mazima', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2018, 1916000, 2454538, 2605000, 2554000),
(5, 'Muda', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2018, 3893700, 4369262, 4807500, 4375000),
(6, 'Anbanked', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2018, 2523200, 2608414, 3176000, 2806000),
(7, 'Women of the future', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2018, 2621347, 3350116, 3789000, 3450000),
(8, 'Kanomukanasatu', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2018, 2995593, 3034155, 3100000, 3054000),
(9, 'Buwanguzi', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2018, 3912192, 5035032, 5400000, 5200000),
(10, 'Top Cops', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2018, 3716612, 4743793, 4987000, 4820000),
(11, 'Miti emito', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2018, 1916747, 2476034, 2610000, 2490000),
(12, 'Kisa kyamukama', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2018, 2902295, 3130765, 3212000, 3150000),
(13, 'Kwagalana', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2018, 3916002, 3492465, 4020000, 3530000),
(14, 'Gakyaali', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2018, 3369231, 4359696, 4765000, 4421000),
(15, 'Kwezimba', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2018, 2914242, 3916523, 4012000, 4005000),
(16, 'Tuliwamu', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2018, 3235007, 2344669, 3686000, 2438000),
(17, 'Agali awamu', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2018, 881326, 1027837, 1240000, 1170000),
(18, 'Kamukamu', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2018, 3067621, 4292945, 4430000, 4320000),
(19, 'Bisente', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2018, 3366308, 4874975, 5012000, 4980000),
(20, 'Cash money', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2018, 2896032, 3956251, 4321000, 4156000),
(21, 'Sekamuli', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2018, 2390000, 1809900, 2500000, 1907000),
(22, 'Nyakisenyi', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2018, 3450000, 4087600, 4200000, 4123000),
(23, 'Kyokasegu', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2018, 4455000, 3906000, 4605600, 4015000),
(24, 'Waswatuliwamu', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2018, 1238000, 1509800, 2034000, 1608300),
(25, 'Gwowonya Eggere', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2018, 1456000, 1807400, 2070000, 1945000),
(26, 'Kabunyata', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2018, 2358000, 2800000, 3200000, 2963400),
(27, 'Kiriri', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2018, 2789000, 3290000, 3875000, 3450000),
(28, 'Ngomannene', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2018, 4358000, 5067000, 5245000, 5189000),
(29, 'Katimba', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2018, 3440000, 4029000, 4370000, 4160000),
(30, 'Akutwala Ekiro', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2018, 1789000, 2190000, 2680000, 2234000),
(31, 'Bananywa', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2018, 3879400, 4127000, 4440500, 3950000),
(32, 'Kimwanyi', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2018, 908700, 1140000, 1305000, 1210000),
(33, 'Bulinda', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2018, 2186000, 2804000, 3180000, 2906000),
(34, 'Wamala', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2018, 1956000, 2130000, 2203000, 2190600),
(35, 'Zzikusoka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2018, 2345600, 2568000, 2760000, 2670000),
(36, 'Kasawo', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2018, 3120000, 3404000, 3408900, 3406000),
(37, 'Kisongoza', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2018, 1940000, 2156000, 2280900, 2180000),
(38, 'Ndegeya', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2018, 2010000, 2230600, 2609800, 2310000),
(39, 'Migade', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2018, 3562000, 4120000, 4150000, 4140000),
(40, 'Kabuwembo', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2018, 4650000, 5230000, 5540000, 5327000),
(41, 'Bulwadda', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2018, 1930000, 2112000, 2380600, 2227000),
(42, 'Balyesiima', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2018, 4120000, 4870000, 5109000, 4990500),
(43, 'Balikyewunya', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2018, 5300000, 6205000, 6310000, 6255000),
(44, 'Saagala Agalamidde', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2018, 2108000, 2310000, 2540000, 2437000),
(45, 'Kitibwa', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2018, 1867000, 2405000, 2809600, 2505000),
(46, 'Lwamatengo', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2018, 1987000, 2109800, 2230000, 2110000),
(47, 'Bwasandeku', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2018, 1865000, 2098000, 2109800, 2100000),
(48, 'Balikuddembe', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2018, 4890700, 5540000, 5870000, 5690000),
(49, 'Luwafu', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2018, 3759000, 4120000, 4329000, 4260000),
(50, 'Mukwano', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2018, 1643000, 2017800, 2208000, 2145000),
(51, 'Kalungu', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2018, 4248600, 4809000, 5098000, 4965000),
(52, 'Kachera', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2018, 1084000, 1124000, 1230000, 1156000),
(53, 'Galinya', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2018, 1732000, 1905400, 2150000, 2085000),
(54, 'Bwendero', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2018, 2016000, 2200500, 2506000, 2340000),
(55, 'Bataka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2018, 2876000, 3207000, 3340000, 3290800),
(56, 'Mbirizi', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2018, 2654000, 3105000, 3209000, 3180400),
(57, 'Buwama', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2018, 1935000, 2240000, 2250000, 2248000),
(58, 'Kkasunga', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2018, 1765000, 2104500, 2345700, 2236800),
(59, 'Nyanama', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2018, 3459000, 4205600, 4302300, 4219000),
(60, 'Mutakanya', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2018, 4976000, 5807800, 6045000, 5954000),
(1, 'Muno', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2019, 943000, 1530691, 1805000, 1670000),
(2, 'Binusu', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2019, 970900, 2600264, 2809700, 2659000),
(3, 'Zivamutunyo', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2019, 3150800, 4424193, 5100000, 4500000),
(4, 'Mazima', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2019, 1916000, 2454538, 2605000, 2554000),
(5, 'Muda', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2019, 3893700, 4369262, 4807500, 4375000),
(6, 'Anbanked', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2019, 2523200, 2608414, 3176000, 2806000),
(7, 'Women of the future', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2019, 2621347, 3350116, 3789000, 3450000),
(8, 'Kanomukanasatu', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2019, 2995593, 3034155, 3100000, 3054000),
(9, 'Buwanguzi', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2019, 3912192, 5035032, 5400000, 5200000),
(10, 'Top Cops', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2019, 3716612, 4743793, 4987000, 4820000),
(11, 'Miti emito', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2019, 1916747, 2476034, 2610000, 2490000),
(12, 'Kisa kyamukama', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2019, 2902295, 3130765, 3212000, 3150000),
(13, 'Kwagalana', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2019, 3916002, 3492465, 4020000, 3530000),
(14, 'Gakyaali', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2019, 3369231, 4359696, 4765000, 4421000),
(15, 'Kwezimba', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2019, 2914242, 3916523, 4012000, 4005000),
(16, 'Tuliwamu', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2019, 3235007, 2344669, 3686000, 2438000),
(17, 'Agali awamu', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2019, 881326, 1027837, 1240000, 1170000),
(18, 'Kamukamu', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2019, 3067621, 4292945, 4430000, 4320000),
(19, 'Bisente', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2019, 3366308, 4874975, 5012000, 4980000),
(20, 'Cash money', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2019, 2896032, 3956251, 4321000, 4156000),
(21, 'Sekamuli', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2019, 2390000, 1809900, 2500000, 1907000),
(22, 'Nyakisenyi', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2019, 3450000, 4087600, 4200000, 4123000),
(23, 'Kyokasegu', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2019, 4455000, 3906000, 4605600, 4015000),
(24, 'Waswatuliwamu', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2019, 1238000, 1509800, 2034000, 1608300),
(25, 'Gwowonya Eggere', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2019, 1456000, 1807400, 2070000, 1945000),
(26, 'Kabunyata', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2019, 2358000, 2800000, 3200000, 2963400),
(27, 'Kiriri', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2019, 2789000, 3290000, 3875000, 3450000),
(28, 'Ngomannene', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2019, 4358000, 5067000, 5245000, 5189000),
(29, 'Katimba', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2019, 3440000, 4029000, 4370000, 4160000),
(30, 'Akutwala Ekiro', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2019, 1789000, 2190000, 2680000, 2234000),
(31, 'Bananywa', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2019, 3879400, 4127000, 4440500, 3950000),
(32, 'Kimwanyi', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2019, 908700, 1140000, 1305000, 1210000),
(33, 'Bulinda', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2019, 2186000, 2804000, 3180000, 2906000),
(34, 'Wamala', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2019, 1956000, 2130000, 2203000, 2190600),
(35, 'Zzikusoka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2019, 2345600, 2568000, 2760000, 2670000),
(36, 'Kasawo', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2019, 3120000, 3404000, 3408900, 3406000),
(37, 'Kisongoza', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2019, 1940000, 2156000, 2280900, 2180000),
(38, 'Ndegeya', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2019, 2010000, 2230600, 2609800, 2310000),
(39, 'Migade', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2019, 3562000, 4120000, 4150000, 4140000),
(40, 'Kabuwembo', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2019, 4650000, 5230000, 5540000, 5327000),
(41, 'Bulwadda', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2019, 1930000, 2112000, 2380600, 2227000),
(42, 'Balyesiima', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2019, 4120000, 4870000, 5109000, 4990500),
(43, 'Balikyewunya', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2019, 5300000, 6205000, 6310000, 6255000),
(44, 'Saagala Agalamidde', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2019, 2108000, 2310000, 2540000, 2437000),
(45, 'Kitibwa', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2019, 1867000, 2405000, 2809600, 2505000),
(46, 'Lwamatengo', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2019, 1987000, 2109800, 2230000, 2110000),
(47, 'Bwasandeku', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2019, 1865000, 2098000, 2109800, 2100000),
(48, 'Balikuddembe', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2019, 4890700, 5540000, 5870000, 5690000),
(49, 'Luwafu', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2019, 3759000, 4120000, 4329000, 4260000),
(50, 'Mukwano', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2019, 1643000, 2017800, 2208000, 2145000),
(51, 'Kalungu', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2019, 4248600, 4809000, 5098000, 4965000),
(52, 'Kachera', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2019, 1084000, 1124000, 1230000, 1156000),
(53, 'Galinya', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2019, 1732000, 1905400, 2150000, 2085000),
(54, 'Bwendero', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2019, 2016000, 2200500, 2506000, 2340000),
(55, 'Bataka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2019, 2876000, 3207000, 3340000, 3290800),
(56, 'Mbirizi', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2019, 2654000, 3105000, 3209000, 3180400),
(57, 'Buwama', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2019, 1935000, 2240000, 2250000, 2248000),
(58, 'Kkasunga', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2019, 1765000, 2104500, 2345700, 2236800),
(59, 'Nyanama', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2019, 3459000, 4205600, 4302300, 4219000),
(60, 'Mutakanya', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2019, 4976000, 5807800, 6045000, 5954000),
(1, 'Muno', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2020, 843000, 1230691, 1005000, 870000),
(2, 'Binusu', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2020, 770900, 1600264, 2409700, 2259000),
(3, 'Zivamutunyo', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2020, 2850800, 3424193, 4500000, 3500000),
(4, 'Mazima', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2020, 1716000, 2054538, 2205000, 1854000),
(5, 'Muda', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2020, 3493700, 3969262, 4107500, 3475000),
(6, 'Anbanked', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2020, 1723200, 2308414, 2876000, 2306000),
(7, 'Women of the future', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2020, 1021347, 2550116, 3389000, 3050000),
(8, 'Kanomukanasatu', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2020, 2295593, 2534155, 2900000, 2654000),
(9, 'Buwanguzi', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2020, 3112192, 4035032, 4000000, 3600000),
(10, 'Top Cops', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2020, 2916612, 3743793, 4687000, 4520000),
(11, 'Miti emito', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2020, 916747, 1476034, 2410000, 2390000),
(12, 'Kisa kyamukama', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2020, 2102295, 2730765, 2912000, 2850000),
(13, 'Kwagalana', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2020, 3016002, 3292465, 3520000, 3430000),
(14, 'Gakyaali', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2020, 2109231, 3559696, 4565000, 4321000),
(15, 'Kwezimba', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2020, 1914242, 3016523, 3812000, 3705000),
(16, 'Tuliwamu', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2020, 1735007, 1944669, 2486000, 2238000),
(17, 'Agali awamu', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2020, 441326, 827837, 1040000, 870000),
(18, 'Kamukamu', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2020, 2167621, 3092945, 3530000, 3020000),
(19, 'Bisente', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2020, 2266308, 3174975, 3412000, 2900000),
(20, 'Cash money', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2020, 2096032, 3056251, 3521000, 3056000),
(21, 'Sekamuli', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2020, 1490000, 1509900, 1600000, 1407000),
(22, 'Nyakisenyi', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2020, 2450000, 3587600, 4000000, 4000000),
(23, 'Kyokasegu', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2020, 2905000, 3506000, 3905600, 3905600),
(24, 'Waswatuliwamu', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2020, 638000, 1209800, 1734000, 1708300),
(25, 'Gwowonya Eggere', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2020, 9056000, 1507400, 1870000, 1845000),
(26, 'Kabunyata', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2020, 1658000, 2200000, 2900000, 2863400),
(27, 'Kiriri', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2020, 2089000, 2120000, 3500000, 3500000),
(28, 'Ngomannene', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2020, 3258000, 3667000, 4845000, 4800000),
(29, 'Katimba', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2020, 2640000, 3129000, 3970000, 3760000),
(30, 'Akutwala Ekiro', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2020, 1189000, 1890000, 2480000, 2334000),
(31, 'Bananywa', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2020, 2279400, 3527000, 3940500, 3900000),
(32, 'Kimwanyi', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2020, 608700, 840000, 1005000, 890000),
(33, 'Bulinda', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2020, 1686000, 1904000, 2980000, 2806000),
(34, 'Wamala', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2020, 1256000, 1630000, 1803000, 1790600),
(35, 'Zzikusoka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2020, 1645600, 2168000, 2560000, 2470000),
(36, 'Kasawo', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2020, 2120000, 2904000, 3000900, 2906000),
(37, 'Kisongoza', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2020, 1140000, 1756000, 1980900, 1900000),
(38, 'Ndegeya', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2020, 1010000, 1330600, 2409800, 2300000),
(39, 'Migade', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2020, 2962000, 3320000, 4150000, 4140000),
(40, 'Kabuwembo', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2020, 3350000, 4030000, 4500000, 447000),
(41, 'Bulwadda', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2020, 1330000, 1912000, 2080600, 1827000),
(42, 'Balyesiima', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2020, 3120000, 4070000, 4509000, 4490500),
(43, 'Balikyewunya', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2020, 4100000, 5005000, 5510000, 5415000),
(44, 'Saagala Agalamidde', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2020, 1608000, 1910000, 2340000, 2337000),
(45, 'Kitibwa', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2020, 967000, 1505000, 2509600, 2505000),
(46, 'Lwamatengo', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2020, 1187000, 1709800, 2120000, 2100000),
(47, 'Bwasandeku', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2020, 965000, 1448000, 1709800, 1600000),
(48, 'Balikuddembe', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2020, 2990700, 3340000, 5470000, 5400000),
(49, 'Luwafu', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2020, 2359000, 3020000, 3459000, 3360000),
(50, 'Mukwano', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2020, 943000, 1217800, 2008000, 2000000),
(51, 'Kalungu', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2020, 3148600, 4009000, 4598000, 4005000),
(52, 'Kachera', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2020, 674000, 1124000, 1200000, 956000),
(53, 'Galinya', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2020, 932000, 1705400, 2550000, 2485000),
(54, 'Bwendero', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2020, 1116000, 1500500, 2406000, 2240000),
(55, 'Bataka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2020, 1676000, 2507000, 3340000, 3200800),
(56, 'Mbirizi', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2020, 1354000, 2105000, 3009000, 2980400),
(57, 'Buwama', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2020, 1135000, 1640000, 2050000, 2000000),
(58, 'Kkasunga', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2020, 1065000, 1674500, 2035700, 1986800),
(59, 'Nyanama', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2020, 2159000, 3205600, 3402300, 3402300),
(60, 'Mutakanya', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2020, 2276000, 3207800, 5500500, 5500500),
(1, 'Muno', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2021, 1203000, 2003000, 2000000, 250000),
(2, 'Binusu', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2021, 1320900, 2120900, 4009000, 2259000),
(3, 'Zivamutunyo', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2021, 3250800, 4050800, 5250000, 3500000),
(4, 'Mazima', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2021, 2216000, 3016000, 3604000, 1854000),
(5, 'Muda', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2021, 3793700, 4593700, 5225000, 3475000),
(6, 'Anbanked', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2021, 2123200, 2923200, 4056000, 2306000),
(7, 'Women of the future', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2021, 1921347, 2721347, 4800000, 3050000),
(8, 'Kanomukanasatu', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2021, 2695593, 3495593, 4404000, 2654000),
(9, 'Buwanguzi', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2021, 3612192, 4412192, 5350000, 3600000),
(10, 'Top Cops', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2021, 3316612, 4116612, 6270000, 4520000),
(11, 'Miti emito', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2021, 1316747, 2116747, 4140000, 2390000),
(12, 'Kisa kyamukama', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2021, 2602295, 3402295, 4600000, 2850000),
(13, 'Kwagalana', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2021, 3616002, 4416002, 5180000, 3430000),
(14, 'Gakyaali', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2021, 2909231, 3709231, 6071000, 4321000),
(15, 'Kwezimba', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2021, 2414242, 3214242, 5455000, 3705000),
(16, 'Tuliwamu', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2021, 2335007, 3135007, 3988000, 2238000),
(17, 'Agali awamu', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2021, 981326, 1781326, 2620000, 870000),
(18, 'Kamukamu', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2021, 2167621, 2967621, 4770000, 3020000),
(19, 'Bisente', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2021, 2866308, 3666308, 4650000, 2900000),
(20, 'Cash money', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2021, 2696032, 3496032, 4806000, 3056000),
(21, 'Sekamuli', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2021, 1990000, 2790000, 3157000, 1407000),
(22, 'Nyakisenyi', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2021, 2850000, 3650000, 5750000, 4000000),
(23, 'Kyokasegu', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2021, 3205000, 4005000, 5655600, 3905600),
(24, 'Waswatuliwamu', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2021, 998000, 1798000, 3458300, 1708300),
(25, 'Gwowonya Eggere', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2021, 1456000, 2256000, 3595000, 1845000),
(26, 'Kabunyata', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2021, 2258000, 3058000, 4613400, 2863400),
(27, 'Kiriri', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2021, 2589000, 3389000, 5250000, 3500000),
(28, 'Ngomannene', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2021, 3658000, 4458000, 6550000, 4800000),
(29, 'Katimba', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2021, 3140000, 3940000, 5510000, 3760000),
(30, 'Akutwala Ekiro', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2021, 1989000, 2619000, 4084000, 2334000),
(31, 'Bananywa', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2021, 2879400, 3509400, 5650000, 3900000),
(32, 'Kimwanyi', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2021, 1008700, 1638700, 2640000, 890000),
(33, 'Bulinda', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2021, 2086000, 2716000, 4556000, 2806000),
(34, 'Wamala', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2021, 1956000, 2586000, 3540600, 1790600),
(35, 'Zzikusoka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2021, 2145600, 2775600, 4220000, 2470000),
(36, 'Kasawo', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2021, 2620000, 3250000, 4656000, 2906000),
(37, 'Kisongoza', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2021, 1840000, 2470000, 3650000, 1900000),
(38, 'Ndegeya', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2021, 1510000, 2140000, 4050000, 2300000),
(39, 'Migade', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2021, 3262000, 3892000, 5890000, 4140000),
(40, 'Kabuwembo', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2021, 3750000, 4380000, 3197000, 1447000),
(41, 'Bulwadda', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2021, 1930000, 2560000, 3577000, 1827000),
(42, 'Balyesiima', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2021, 3620000, 4250000, 6240500, 4490500),
(43, 'Balikyewunya', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2021, 4600000, 5230000, 7165000, 5415000),
(44, 'Saagala Agalamidde', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2021, 2108000, 2738000, 4087000, 2337000),
(45, 'Kitibwa', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2021, 1367000, 1997000, 4255000, 2505000),
(46, 'Lwamatengo', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2021, 1687000, 2317000, 3850000, 2100000),
(47, 'Bwasandeku', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2021, 1365000, 1995000, 3350000, 1600000),
(48, 'Balikuddembe', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2021, 3390700, 4020700, 7150000, 5400000),
(49, 'Luwafu', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2021, 2959000, 3589000, 5110000, 3360000),
(50, 'Mukwano', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2021, 1843000, 2473000, 3750000, 2000000),
(51, 'Kalungu', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2021, 3648600, 4278600, 5755000, 4005000),
(52, 'Kachera', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2021, 1274000, 1904000, 2706000, 956000),
(53, 'Galinya', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2021, 1232000, 1862000, 4235000, 2485000),
(54, 'Bwendero', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2021, 1616000, 2246000, 3990000, 2240000),
(55, 'Bataka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2021, 2176000, 2806000, 4950800, 3200800),
(56, 'Mbirizi', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2021, 1654000, 2284000, 4730400, 2980400),
(57, 'Buwama', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2021, 1635000, 2265000, 3750000, 2000000),
(58, 'Kkasunga', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2021, 1665000, 2295000, 3736800, 1986800),
(59, 'Nyanama', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2021, 2559000, 3189000, 5152300, 3402300),
(60, 'Mutakanya', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2021, 2676000, 3306000, 7250500, 5500500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interest`
--

CREATE TABLE `tbl_interest` (
  `id` int(11) NOT NULL,
  `rate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_interest`
--

INSERT INTO `tbl_interest` (`id`, `rate`) VALUES
(3, '3'),
(4, '1'),
(5, '5'),
(6, '2'),
(7, '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan`
--

CREATE TABLE `tbl_loan` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `borrower` varchar(25) NOT NULL,
  `collector` varchar(25) NOT NULL,
  `plan` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `tamount` int(11) NOT NULL,
  `end_date` date DEFAULT NULL,
  `loan_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loantypes`
--

CREATE TABLE `tbl_loantypes` (
  `id` int(11) NOT NULL,
  `loan_type` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_loantypes`
--

INSERT INTO `tbl_loantypes` (`id`, `loan_type`, `description`) VALUES
(2, 'Personal loan', 'For personal purposes'),
(4, 'Small business loan', 'Small business loan'),
(5, 'Mortgage loan', 'For rent');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(255) NOT NULL,
  `memberName` varchar(25) NOT NULL,
  `nextOfKin` varchar(25) NOT NULL,
  `age` int(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `memberName`, `nextOfKin`, `age`, `contact`, `address`) VALUES
(12, 'john', 'Emma', 33, '0706234156', 'Kamwokya'),
(13, 'Nekesa', 'Ninsiima', 30, '0700678954', 'Makerere'),
(14, 'Gorretti', 'Jagenda', 26, '0789546321', 'Buuga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plan`
--

CREATE TABLE `tbl_plan` (
  `id` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_plan`
--

INSERT INTO `tbl_plan` (`id`, `plan`, `rate`) VALUES
(1, 1, 3),
(3, 2, 4),
(4, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Date_time` varchar(255) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `firstname`, `lastname`, `email`, `password`, `Date_time`, `contact`, `address`) VALUES
(38, 'Diana', 'Najjuma', 'diananajjuma92@gmail.com', '$2y$10$gqgrbfMSAAlCF6yXiCjXEexKSKm8GRnv/vi2GqcGptteel6bOiSOm', '2022-07-16 15:46:51', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vsla`
--

CREATE TABLE `tbl_vsla` (
  `id` int(255) NOT NULL,
  `vslaName` varchar(25) NOT NULL,
  `capacity` int(11) NOT NULL,
  `location` varchar(25) NOT NULL,
  `chairperson` varchar(25) NOT NULL,
  `status` varchar(11) NOT NULL,
  `meeting` varchar(10) NOT NULL,
  `activity` text NOT NULL,
  `males` int(25) NOT NULL,
  `females` int(25) NOT NULL,
  `savings` int(25) NOT NULL,
  `averageage` int(25) NOT NULL,
  `creditunit` int(25) NOT NULL,
  `rateofLending` varchar(25) NOT NULL,
  `year` int(25) NOT NULL,
  `shareouts` int(25) NOT NULL,
  `division` varchar(255) NOT NULL,
  `loanstaken` int(11) NOT NULL,
  `loansreturned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vsla`
--

INSERT INTO `tbl_vsla` (`id`, `vslaName`, `capacity`, `location`, `chairperson`, `status`, `meeting`, `activity`, `males`, `females`, `savings`, `averageage`, `creditunit`, `rateofLending`, `year`, `shareouts`, `division`, `loanstaken`, `loansreturned`) VALUES
(34, 'future', 20, 'Mengo', 'Mike', 'ACTIVE', 'Sunday', 'Mobile money', 6, 14, 200000, 25, 5, '5', 2018, 3000000, 'RUBAGA', 150000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vslaaa`
--

CREATE TABLE `tbl_vslaaa` (
  `ID` double DEFAULT NULL,
  `VSLA` varchar(100) DEFAULT NULL,
  `Division` varchar(100) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Capacity` double DEFAULT NULL,
  `Average_Age_group` double DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Activity` varchar(100) DEFAULT NULL,
  `Male` double DEFAULT NULL,
  `Female` double DEFAULT NULL,
  `Year` double DEFAULT NULL,
  `Savings` varchar(100) DEFAULT NULL,
  `Shareouts` double DEFAULT NULL,
  `Loans_Taken_` varchar(100) DEFAULT NULL,
  `Loan_Amount_Returned_` varchar(100) DEFAULT NULL,
  `column_15` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vslaaa`
--

INSERT INTO `tbl_vslaaa` (`ID`, `VSLA`, `Division`, `Location`, `Capacity`, `Average_Age_group`, `Status`, `Activity`, `Male`, `Female`, `Year`, `Savings`, `Shareouts`, `Loans_Taken_`, `Loan_Amount_Returned_`, `column_15`) VALUES
(1, 'Muno', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2016, '\"USh1', 500, '000\"', '\"2', 530),
(2, 'Binusu', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2016, '\"USh1', 450, '900\"', '\"3', 600),
(3, 'Zivamutunyo', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2016, '\"USh3', 850, '800\"', '\"5', 424),
(4, 'Mazima', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2016, '\"USh2', 616, '000\"', '\"3', 454),
(5, 'Muda', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2016, '\"USh4', 593, '700\"', '\"4', 969),
(6, 'Anbanked', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, '\"USh3', 523, '200\"', '\"4', 8),
(7, 'Women of the future', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2016, '\"USh3', 21, '347\"', '\"3', 850),
(8, 'Kanomukanasatu', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2016, '\"USh3', 395, '593\"', '\"3', 634),
(9, 'Buwanguzi', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2016, '\"USh4', 512, '192\"', '\"5', 535),
(10, 'Top Cops', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2016, '\"USh4', 216, '612\"', '\"5', 143),
(11, 'Miti emito', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2016, '\"USh2', 716, '747\"', '\"3', 476),
(12, 'Kisa kyamukama', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2016, '\"USh3', 302, '295\"', '\"3', 930),
(13, 'Kwagalana', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, '\"USh4', 416, '002\"', '\"4', 92),
(14, 'Gakyaali', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2016, '\"USh3', 769, '231\"', '\"4', 859),
(15, 'Kwezimba', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2016, '\"USh3', 614, '242\"', '\"4', 516),
(16, 'Tuliwamu', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2016, '\"USh3', 735, '007\"', '\"4', 344),
(17, 'Agali awamu', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2016, '\"USh1', 481, '326\"', '\"2', 27),
(18, 'Kamukamu', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2016, '\"USh3', 867, '621\"', '\"4', 692),
(19, 'Bisente', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2016, '\"USh3', 366, '308\"', '\"5', 74),
(20, 'Cash money', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2016, '\"USh3', 396, '032\"', '\"4', 256),
(21, 'Sekamuli', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2016, '\"USh3', 290, '000\"', '\"1', 809),
(22, 'Nyakisenyi', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2016, '\"USh4', 450, '000\"', '\"4', 87),
(23, 'Kyokasegu', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2016, '\"USh5', 455, '000\"', '\"3', 906),
(24, 'Waswatuliwamu', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2016, '\"USh1', 338, '000\"', '\"2', 9),
(25, 'Gwowonya Eggere', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2016, '\"USh1', 956, '000\"', '\"2', 707),
(26, 'Kabunyata', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, '\"USh2', 658, '000\"', '\"3', 400),
(27, 'Kiriri', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2016, '\"USh3', 89, '000\"', '\"4', 90),
(28, 'Ngomannene', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2016, '\"USh4', 458, '000\"', '\"6', 167),
(29, 'Katimba', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2016, '\"USh3', 940, '000\"', '\"5', 129),
(30, 'Akutwala Ekiro', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2016, '\"USh2', 789, '000\"', '\"3', 650),
(31, 'Bananywa', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2016, '\"USh4', 279, '400\"', '\"5', 247),
(32, 'Kimwanyi', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2016, '\"USh1', 208, '700\"', '\"2', 230),
(33, 'Bulinda', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, '\"USh2', 886, '000\"', '\"3', 804),
(34, 'Wamala', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2016, '\"USh2', 656, '000\"', '\"2', 930),
(35, 'Zzikusoka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2016, '\"USh2', 745, '600\"', '\"2', 908),
(36, 'Kasawo', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2016, '\"USh3', 620, '000\"', '\"3', 804),
(37, 'Kisongoza', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2016, '\"USh2', 440, '000\"', '\"2', 756),
(38, 'Ndegeya', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2016, '\"USh2', 810, '000\"', '\"2', 230),
(39, 'Migade', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2016, '\"USh4', 62, '000\"', '\"4', 620),
(40, 'Kabuwembo', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2016, '\"USh4', 850, '000\"', '\"5', 430),
(41, 'Bulwadda', 'NAKAWA', 'Kamwokya', 30, 33, 'ACTIVE', 'Book making', 12, 18, 2016, '\"USh2', 530, '000\"', '\"2', 712),
(42, 'Balyesiima', 'NAKAWA', 'Bukoto', 34, 40, 'ACTIVE', 'Maize Milling', 12, 22, 2016, '\"USh4', 620, '000\"', '\"5', 70),
(43, 'Balikyewunya', 'NAKAWA', 'Ntinda', 31, 38, 'ACTIVE', 'Mobile Money', 7, 24, 2016, '\"USh5', 700, '000\"', '\"6', 605),
(44, 'Saagala Agalamidde', 'NAKAWA', 'Kisenyi', 34, 31, 'ACTIVE', 'Book making', 10, 21, 2016, '\"USh2', 908, '000\"', '\"3', 910),
(45, 'Kitibwa', 'KAWEMPE', 'Makindye', 32, 24, 'ACTIVE', 'Book making', 11, 21, 2016, '\"USh2', 367, '000\"', '\"2', 905),
(46, 'Lwamatengo', 'KAWEMPE', 'Kamwokya', 33, 43, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, '\"USh2', 387, '000\"', '\"2', 809),
(47, 'Bwasandeku', 'KAWEMPE', 'Ntinda', 33, 26, 'ACTIVE', 'Hand Crafts', 9, 24, 2016, '\"USh2', 865, '000\"', '\"3', 198),
(48, 'Balikuddembe', 'KAWEMPE', 'Buziga', 32, 58, 'ACTIVE', 'Silver fish selling', 10, 22, 2016, '\"USh5', 890, '700\"', '\"6', 240),
(49, 'Luwafu', 'RUBAGA', 'Katwe', 32, 23, 'ACTIVE', 'Metal Welders', 11, 11, 2016, '\"USh4', 759, '000\"', '\"5', 220),
(50, 'Mukwano', 'RUBAGA', 'Kamwokya', 31, 42, 'ACTIVE', 'Book making', 7, 24, 2016, '\"USh2', 643, '000\"', '\"3', 317),
(51, 'Kalungu', 'RUBAGA', 'Wakaliga', 32, 54, 'ACTIVE', 'Maize Milling', 7, 25, 2016, '\"USh4', 548, '600\"', '\"5', 239),
(52, 'Kachera', 'RUBAGA', 'Nateete', 30, 33, 'ACTIVE', 'Paper bag making', 8, 22, 2016, '\"USh1', 684, '000\"', '\"2', 224),
(53, 'Galinya', 'MAKINDYE', 'Ggaba', 33, 54, 'ACTIVE', 'Hand Crafts', 10, 23, 2016, '\"USh2', 332, '000\"', '\"2', 895),
(54, 'Bwendero', 'MAKINDYE', 'Mutundwe', 31, 22, 'ACTIVE', 'Art and Craft', 6, 25, 2016, '\"USh2', 916, '000\"', '\"3', 540),
(55, 'Bataka', 'MAKINDYE', 'Bukoto', 33, 42, 'ACTIVE', 'Maize Milling', 7, 25, 2016, '\"USh3', 276, '000\"', '\"4', 7),
(56, 'Mbirizi', 'MAKINDYE', 'Kamwokya', 32, 48, 'ACTIVE', 'Maize Milling', 7, 24, 2016, '\"USh2', 954, '000\"', '\"3', 605),
(57, 'Buwama', 'CENTRAL', 'Bukoto', 33, 30, 'ACTIVE', 'Book making', 10, 23, 2016, '\"USh2', 435, '000\"', '\"2', 940),
(58, 'Kkasunga', 'CENTRAL', 'Wakaliga', 32, 43, 'ACTIVE', 'Book making', 6, 26, 2016, '\"USh2', 265, '000\"', '\"2', 904),
(59, 'Nyanama', 'CENTRAL', 'Kisenyi', 31, 57, 'ACTIVE', 'Metal Welders', 5, 26, 2016, '\"USh3', 859, '000\"', '\"4', 705),
(60, 'Mutakanya', 'CENTRAL', 'Kyengera', 31, 39, 'ACTIVE', 'Silver fish selling', 7, 24, 2016, '\"USh5', 376, '000\"', '\"6', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vslaz`
--

CREATE TABLE `tbl_vslaz` (
  `id` int(11) NOT NULL,
  `vsla` varchar(25) NOT NULL,
  `savings` int(25) NOT NULL,
  `location` varchar(30) NOT NULL,
  `capacity` int(25) NOT NULL,
  `averageage` int(25) NOT NULL,
  `activity` varchar(25) NOT NULL,
  `male` int(25) NOT NULL,
  `female` int(25) NOT NULL,
  `rateofLending` varchar(25) NOT NULL,
  `year` year(4) NOT NULL,
  `shareouts` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_borrower`
--
ALTER TABLE `tbl_borrower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chairperson`
--
ALTER TABLE `tbl_chairperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_creditunit`
--
ALTER TABLE `tbl_creditunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_division`
--
ALTER TABLE `tbl_division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loan`
--
ALTER TABLE `tbl_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loantypes`
--
ALTER TABLE `tbl_loantypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vsla`
--
ALTER TABLE `tbl_vsla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vslaz`
--
ALTER TABLE `tbl_vslaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_borrower`
--
ALTER TABLE `tbl_borrower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_chairperson`
--
ALTER TABLE `tbl_chairperson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_creditunit`
--
ALTER TABLE `tbl_creditunit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_division`
--
ALTER TABLE `tbl_division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_loan`
--
ALTER TABLE `tbl_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_loantypes`
--
ALTER TABLE `tbl_loantypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_vsla`
--
ALTER TABLE `tbl_vsla`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_vslaz`
--
ALTER TABLE `tbl_vslaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
