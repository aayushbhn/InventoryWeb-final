-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2022 at 05:37 AM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neparud1_imsv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_entry`
--

CREATE TABLE `data_entry` (
  `SN` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rudraksha` varchar(255) NOT NULL,
  `rudtype_id` int(11) DEFAULT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_cost` decimal(25,2) NOT NULL,
  `price_per_unit` decimal(25,2) NOT NULL,
  `website_price` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `ssp` decimal(25,2) NOT NULL,
  `sspi` decimal(25,2) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `vendor_information` varchar(255) NOT NULL,
  `comid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_entry`
--

INSERT INTO `data_entry` (`SN`, `category`, `rudraksha`, `rudtype_id`, `size`, `quantity`, `total_cost`, `price_per_unit`, `website_price`, `quality`, `ssp`, `sspi`, `comment`, `vendor_information`, `comid`) VALUES
(1, 'Rudraksha', '14 Mukhi', 17, 'Regular', 16, '384000.00', '24000.00', '400', 'Premium', '295.38', '15000.00', 'Old 2022', 'Surya', 'R14Re');

-- --------------------------------------------------------

--
-- Table structure for table `imgfiles`
--

CREATE TABLE `imgfiles` (
  `SN` int(11) NOT NULL,
  `imgID` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imgfiles`
--

INSERT INTO `imgfiles` (`SN`, `imgID`, `file`) VALUES
(1, 1, '9ad3405b-3bab-480e-8745-382a538b2696.jpg'),
(2, 1, 'a741eb30-63b0-4bc4-9b58-1e3d0be44fe4.jpg'),
(3, 1, 'e7d78a87-59dc-476d-9f52-ab567875a44f.jpg'),
(4, 1, 'e61866c0-dcfd-4c73-9c3e-4d4bf836d032.jpg'),
(5, 2, '5a9ce361-909b-45cb-ae87-e38feaf72dd2.jpg'),
(6, 2, '416b8e3c-5611-4ab9-8751-7980a8a75cfe.jpg'),
(7, 2, '574d89f6-43e1-4304-a961-7d03eb66b3ea.jpg'),
(8, 2, 'e491ed63-4615-4952-8f87-d339fa221843.jpg'),
(9, 3, '66c90d93-c435-484c-a0e2-7b253017eaea.jpg'),
(10, 3, '71db7dc3-e84e-421f-9d37-a22df2301ada.jpg'),
(11, 3, '1814dda6-31f1-472b-8223-f3fbd4e60cf3.jpg'),
(12, 3, 'a2f4c414-cfcd-4fd9-b5c8-f74f25287a6d.jpg'),
(13, 4, '0d5d209b-bafe-45bc-ab29-9973dd4bf3ce.jpg'),
(14, 4, 'af9f08ca-e254-491a-b97b-df1b9ac5d3cd.jpg'),
(15, 4, 'cad65a6a-426e-475b-88c3-f4198490eea3.jpg'),
(16, 4, 'f60c43d7-cd75-48c1-a42c-79a42d892175.jpg'),
(17, 5, '5ed3f7ad-4584-4646-8294-add14f80c6c1.jpg'),
(18, 5, '2507ea57-16f3-4b6c-9e07-7a240c2829bc.jpg'),
(19, 5, '9661dfc3-a409-4da2-a2bd-2d83e82e3f5a.jpg'),
(20, 5, '408048a8-fc9d-465c-8176-06795a0fb467.jpg'),
(21, 6, '4dc71e6c-39b0-4321-9979-b19f26d97b79.jpg'),
(22, 6, '35942339-5342-422b-839f-96f9747065a8.jpg'),
(23, 6, 'c18ec4a6-5a60-4099-bf9d-daa3205640be.jpg'),
(24, 6, 'ee0b8b8b-1883-4c9b-a304-680e9f601d89.jpg'),
(25, 7, '6cd6b4a8-9bc7-44e6-a6f9-35568f476307.jpg'),
(26, 7, '46c90511-ffaf-4ed1-ad62-244777775404.jpg'),
(27, 7, 'bd145dc6-11c9-429d-99e8-e08db3c9f5b9.jpg'),
(28, 7, 'df17b830-30a4-4041-9b2f-e6e7cbbd61bd.jpg'),
(29, 8, '2e1a87f4-0c85-4e8b-a418-3b9d772c307d.jpg'),
(30, 8, '3c5666b5-14d2-42a1-9702-3bcb19d50fa5.jpg'),
(31, 8, '0723fc9e-9d09-464c-9f03-a91bd2216c81.jpg'),
(32, 8, 'e4b326b5-bbc1-4785-b839-5cdbc3e38805.jpg'),
(33, 9, '185ccdb7-5e1c-4c29-a738-30f2e856b909.jpg'),
(34, 9, '19849f1f-9827-43ea-afe4-d3e509f6cb14.jpg'),
(35, 9, 'a265c70f-bf41-4693-adf6-a8d76186c0c5.jpg'),
(36, 9, 'd02b6df4-40dd-4e4c-9170-66678cf887fb.jpg'),
(37, 10, '3d24b5dc-36a7-4655-9220-a3818961eab4.jpg'),
(38, 10, '4e94913e-68d6-4b59-8da0-8d6e0a39f2e4.jpg'),
(39, 10, '3102e534-220b-4563-808e-a81ea5e97638.jpg'),
(40, 10, '8967dab3-ef04-4385-9333-e25f1a1dab23.jpg'),
(41, 11, '6a5e047d-d60d-4652-8cf2-f0843dd17626.jpg'),
(42, 11, '7b5e0516-eaef-47d9-84f2-771f18ccd474.jpg'),
(43, 11, '6490fd12-5c44-441b-b1b6-5cfd514d3373.jpg'),
(44, 11, '44414d89-117b-400d-be38-f6f455b938dd.jpg'),
(45, 12, '3acfed91-3295-4b09-af9b-9511ccaf4ef0.jpg'),
(46, 12, '7590f35c-ee7c-465c-8c2d-cb3396fcd89c.jpg'),
(47, 12, '29029218-0f93-4646-a21b-0cbaaf1d62f6.jpg'),
(48, 13, '9b57b982-0fb9-40e7-a445-bc7f1e44833c.jpg'),
(49, 13, '44bfd328-74ea-4fc2-857f-c734919b9a7f.jpg'),
(50, 13, '48064ca0-6c1e-475e-a084-a8cafc0a6d33.jpg'),
(51, 13, 'a8400298-0174-4333-ba88-a982481595a0.jpg'),
(52, 14, '0d2762ab-b8fd-4852-b600-4b7d7413b455.jpg'),
(53, 14, '813bfccc-518e-4a54-baf3-0eabffc5bbc6.jpg'),
(54, 14, 'df4ad255-629d-4b98-b24b-2901ae2e3046.jpg'),
(55, 14, 'fed68636-1e35-46ad-bc22-e7e3df78f87c.jpg'),
(56, 15, '880bd0fc-0c44-4bcf-a198-4e84b4e8c3a2.jpg'),
(57, 15, '1186c350-4921-4ab7-9e52-96b2567ac28e.jpg'),
(58, 15, 'a76bc8fd-3266-47a1-b0f3-dc5e80d61c2c.jpg'),
(59, 15, 'b7106fc4-6a1d-4b67-ae4b-dc3cd9764bd5.jpg'),
(60, 16, '5bbf67f5-3346-4a84-b688-36c57bc6c3f3.jpg'),
(61, 16, '562cdbfb-230c-4252-a0ec-a2c2f4885456.jpg'),
(62, 16, 'acca7583-0b7b-4784-a66e-7645ae5fedb7.jpg'),
(63, 16, 'e30da4c4-c727-4fba-b291-8ba0e9efa8cb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rudrakshaid`
--

CREATE TABLE `rudrakshaid` (
  `SN` int(11) NOT NULL,
  `rudtype_id` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rudrakshaid`
--

INSERT INTO `rudrakshaid` (`SN`, `rudtype_id`) VALUES
(1, '0 Mukhi'),
(2, '1 Mukhi-Savar'),
(3, '1 Mukhi-Round'),
(4, '1 Mukhi-Moon'),
(5, '2 Mukhi'),
(6, '3 Mukhi'),
(7, '4 Mukhi'),
(8, '5 Mukhi'),
(9, '6 Mukhi'),
(10, '7 Mukhi'),
(11, '8 Mukhi'),
(12, '9 Mukhi'),
(13, '10 Mukhi'),
(14, '11 Mukhi'),
(15, '12 Mukhi'),
(16, '13 Mukhi'),
(17, '14 Mukhi'),
(18, '15 Mukhi'),
(19, '16 Mukhi'),
(20, '17 Mukhi'),
(21, '18 Mukhi'),
(22, '19 Mukhi'),
(23, '20 Mukhi'),
(24, '21 Mukhi'),
(25, '22 Mukhi'),
(26, '23 Mukhi'),
(27, '24 Mukhi'),
(28, '25 Mukhi'),
(29, '26 Mukhi'),
(30, 'Custom');

-- --------------------------------------------------------

--
-- Table structure for table `unit_data_entry`
--

CREATE TABLE `unit_data_entry` (
  `unit_sn` int(255) NOT NULL,
  `bulk_id` int(11) DEFAULT NULL,
  `row_name` varchar(25) DEFAULT NULL,
  `ID` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_data_entry`
--

INSERT INTO `unit_data_entry` (`unit_sn`, `bulk_id`, `row_name`, `ID`, `length`, `weight`, `file`) VALUES
(1, 1, 'A1', '3005_1', '30', '05.2', 'e7d78a87-59dc-476d-9f52-ab567875a44f.jpg'),
(2, 1, 'A2', '3004_2', '30.49', '04.4', '574d89f6-43e1-4304-a961-7d03eb66b3ea.jpg'),
(3, 1, 'A4', '2603_3', '26.59', '03.8', '71db7dc3-e84e-421f-9d37-a22df2301ada.jpg'),
(4, 1, 'A5', '2804_4', '28.01', '04.4', 'cad65a6a-426e-475b-88c3-f4198490eea3.jpg'),
(5, 1, 'B2', '2803_5', '28.44', '03.4', '5ed3f7ad-4584-4646-8294-add14f80c6c1.jpg'),
(6, 1, 'B3', '2503_6', '25.45', '03.7', 'ee0b8b8b-1883-4c9b-a304-680e9f601d89.jpg'),
(7, 1, 'B4', '2604_7', '26.27', '04', 'df17b830-30a4-4041-9b2f-e6e7cbbd61bd.jpg'),
(8, 1, 'B5', '2704_8', '27.41', '04', 'e4b326b5-bbc1-4785-b839-5cdbc3e38805.jpg'),
(9, 1, 'C1', '2402_9', '24.40', '02.7', 'a265c70f-bf41-4693-adf6-a8d76186c0c5.jpg'),
(10, 1, 'C2', '2302_10', '23.90', '02.9', '3102e534-220b-4563-808e-a81ea5e97638.jpg'),
(11, 1, 'C3', '2602_11', '26.45', '02.9', '7b5e0516-eaef-47d9-84f2-771f18ccd474.jpg'),
(12, 1, 'C4', '2500_12', '25.59', '00.00', '29029218-0f93-4646-a21b-0cbaaf1d62f6.jpg'),
(13, 1, 'D1', '2301_13', '23.83', '01.9', 'a8400298-0174-4333-ba88-a982481595a0.jpg'),
(14, 1, 'D2', '2402_14', '24.47', '02.8', '0d2762ab-b8fd-4852-b600-4b7d7413b455.jpg'),
(15, 1, 'D3', '2302_15', '23.47', '02.7', '1186c350-4921-4ab7-9e52-96b2567ac28e.jpg'),
(16, 1, 'D4', '2202_16', '22.08', '02.2', '1186c350-4921-4ab7-9e52-96b2567ac28e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`ID`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Aayush Bhandari', 'aayush2658@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(2, 'Nikita Khadka', 'nikita@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(3, 'Nepa Rudraksha', 'neparudraksha@gmail.com', 'Neparudraksha@255', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_entry`
--
ALTER TABLE `data_entry`
  ADD PRIMARY KEY (`SN`),
  ADD KEY `rudtypelink` (`rudtype_id`);

--
-- Indexes for table `imgfiles`
--
ALTER TABLE `imgfiles`
  ADD PRIMARY KEY (`SN`),
  ADD KEY `imglink` (`imgID`);

--
-- Indexes for table `rudrakshaid`
--
ALTER TABLE `rudrakshaid`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `unit_data_entry`
--
ALTER TABLE `unit_data_entry`
  ADD PRIMARY KEY (`unit_sn`),
  ADD KEY `bulk` (`bulk_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_entry`
--
ALTER TABLE `data_entry`
  MODIFY `SN` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imgfiles`
--
ALTER TABLE `imgfiles`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `rudrakshaid`
--
ALTER TABLE `rudrakshaid`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `unit_data_entry`
--
ALTER TABLE `unit_data_entry`
  MODIFY `unit_sn` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_entry`
--
ALTER TABLE `data_entry`
  ADD CONSTRAINT `rudtypelink` FOREIGN KEY (`rudtype_id`) REFERENCES `rudrakshaid` (`SN`);

--
-- Constraints for table `imgfiles`
--
ALTER TABLE `imgfiles`
  ADD CONSTRAINT `imglink` FOREIGN KEY (`imgID`) REFERENCES `unit_data_entry` (`unit_sn`);

--
-- Constraints for table `unit_data_entry`
--
ALTER TABLE `unit_data_entry`
  ADD CONSTRAINT `bulk` FOREIGN KEY (`bulk_id`) REFERENCES `data_entry` (`SN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
