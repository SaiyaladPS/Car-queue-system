-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(100) NOT NULL,
  `car_name` varchar(255) DEFAULT NULL,
  `car_num` varchar(255) DEFAULT NULL,
  `car_status` varchar(255) DEFAULT NULL,
  `car_qty` varchar(255) DEFAULT NULL,
  `car_remak` varchar(255) DEFAULT NULL,
  `qu_id` int(100) DEFAULT NULL,
  `dr_id` int(100) DEFAULT NULL,
  `ti_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_name`, `car_num`, `car_status`, `car_qty`, `car_remak`, `qu_id`, `dr_id`, `ti_id`) VALUES
(1, 'ລົດຕູ', 'ຈກ 5848', 'Full', '2', '', 3, 3, 3),
(2, 'ລົດເມ', 'ກກ 55213', 'Loose', '0', '', 1, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `des_id` int(100) NOT NULL,
  `des_in` varchar(255) DEFAULT NULL,
  `des_out` varchar(255) DEFAULT NULL,
  `des_price` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`des_id`, `des_in`, `des_out`, `des_price`) VALUES
(5, 'ສາຍເໜືອ1', 'ສາຍເໜືອ2', 350000.00),
(6, 'ປາກຂະຍຸຸງ', 'ສາຍເໜືອ2', 630000.00),
(7, 'ໂພນໜີ', 'ສາຍເໜືອ', 13000.00);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dis_id` int(100) NOT NULL,
  `dis_name` varchar(255) DEFAULT NULL,
  `pro_id` int(100) DEFAULT NULL,
  `dis_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `dis_name`, `pro_id`, `dis_remak`) VALUES
(2, 'ວຽງຄຳ', 2, ''),
(4, 'ໄຊຍະບູລີ', 1, ''),
(6, 'ໂພນທອງ', 6, '້າ່');

-- --------------------------------------------------------

--
-- Table structure for table `driving`
--

CREATE TABLE `driving` (
  `dr_id` int(100) NOT NULL,
  `dr_name` varchar(255) NOT NULL,
  `dr_gander` varchar(255) DEFAULT NULL,
  `dr_dob` date NOT NULL,
  `dr_tel` varchar(100) NOT NULL,
  `qu_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `dis_id` int(100) NOT NULL,
  `vi_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driving`
--

INSERT INTO `driving` (`dr_id`, `dr_name`, `dr_gander`, `dr_dob`, `dr_tel`, `qu_id`, `pro_id`, `dis_id`, `vi_id`) VALUES
(3, 'ຈັນດາລາ', 'Girl', '2023-12-05', '20555555', 3, 2, 2, 1),
(4, 'ວັນມະນີ ແສງພະຈັນ', 'Male', '2023-12-12', '20999999', 1, 1, 4, 2),
(6, 'ແສງຈັນ ສຸກວັນມາ', 'Male', '2023-12-05', '2252222', 3, 2, 2, 5),
(10, 'ກາຟິວ', 'Male', '2023-12-07', '2055115', 4, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `pa_id` int(100) NOT NULL,
  `pa_name` varchar(255) DEFAULT NULL,
  `pa_tel` varchar(255) DEFAULT NULL,
  `pa_price` decimal(12,2) DEFAULT NULL,
  `pa_date` date DEFAULT NULL,
  `pa_pass` varchar(100) DEFAULT NULL,
  `car_id` int(100) DEFAULT NULL,
  `ti_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`pa_id`, `pa_name`, `pa_tel`, `pa_price`, `pa_date`, `pa_pass`, `car_id`, `ti_id`) VALUES
(6, 'ມີ', '2055457', 630000.00, '2023-12-18', 'ປາກຂະຍຸຸງ-ສາຍເໜືອ2', 1, 3),
(7, 'ເຈ', '20554844', 350000.00, '2023-12-19', 'ສາຍເໜືອ1-ສາຍເໜືອ2', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `pro_id` int(100) NOT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`pro_id`, `pro_name`, `pro_remak`) VALUES
(1, 'ໄຊຍະບູລີ', ''),
(2, 'ວຽງຈັນ', ''),
(3, 'ນະຄອນຫຼວງ', ''),
(4, 'ຫຼວງພະບາງ', ''),
(6, 'ຈຳປາສັກ', 'hjgh');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `qu_id` int(100) NOT NULL,
  `qu_name` varchar(255) DEFAULT NULL,
  `qu_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`qu_id`, `qu_name`, `qu_remak`) VALUES
(1, 'ສາຍເໜືອ', ''),
(3, 'ປາກຂະຍຸຸງ', ''),
(4, 'ໂພນໜີ', '');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `ti_id` int(100) NOT NULL,
  `ti_name` time DEFAULT NULL,
  `ti_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`ti_id`, `ti_name`, `ti_remak`) VALUES
(3, '07:00:00', ''),
(5, '09:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `us_id` int(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `us_name` varchar(255) DEFAULT NULL,
  `us_gander` varchar(255) DEFAULT NULL,
  `us_dob` date DEFAULT NULL,
  `us_tel` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `us_status` varchar(100) DEFAULT NULL,
  `pro_id` int(100) DEFAULT NULL,
  `dis_id` int(100) DEFAULT NULL,
  `vi_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `img`, `us_name`, `us_gander`, `us_dob`, `us_tel`, `username`, `password`, `us_status`, `pro_id`, `dis_id`, `vi_id`) VALUES
(9, '1.jpg', 'Mona', 'Male', '2023-12-12', '20556254', 'mona', '202cb962ac59075b964b07152d234b70', 'admin', 1, 4, 2),
(10, '3.jpg', 'Nata', 'Girl', '2023-12-04', '20551254', 'nata', '202cb962ac59075b964b07152d234b70', 'user', 2, 2, 1),
(11, '2.jpg', 'MyTer', 'Male', '2023-12-01', '20551125', 'myter', '202cb962ac59075b964b07152d234b70', 'admin', 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `vi_id` int(100) NOT NULL,
  `pro_id` int(100) DEFAULT NULL,
  `dis_id` int(100) DEFAULT NULL,
  `vi_name` varchar(255) DEFAULT NULL,
  `vi_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`vi_id`, `pro_id`, `dis_id`, `vi_name`, `vi_remak`) VALUES
(1, 2, 2, 'ໂນນສະຫວ່າງ', ''),
(2, 1, 4, 'ນາຕໍນ້ອຍ', ''),
(4, 1, 4, 'ລອງປໍ', ''),
(5, 2, 2, 'ໂພນໝີ', ''),
(7, 6, 6, 'ດອນຊາດ', '່້່າ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `dr_id` (`dr_id`),
  ADD KEY `qu_id` (`qu_id`),
  ADD KEY `ti_id` (`ti_id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`des_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `driving`
--
ALTER TABLE `driving`
  ADD PRIMARY KEY (`dr_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `vi_id` (`vi_id`),
  ADD KEY `qu_id` (`qu_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`pa_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `ti_id` (`ti_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`qu_id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`ti_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `vi_id` (`vi_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`vi_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `des_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dis_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driving`
--
ALTER TABLE `driving`
  MODIFY `dr_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `pa_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `qu_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `ti_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `us_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `vi_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`dr_id`) REFERENCES `driving` (`dr_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`qu_id`) REFERENCES `queue` (`qu_id`),
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`ti_id`) REFERENCES `timer` (`ti_id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`);

--
-- Constraints for table `driving`
--
ALTER TABLE `driving`
  ADD CONSTRAINT `driving_ibfk_1` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`),
  ADD CONSTRAINT `driving_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `driving_ibfk_3` FOREIGN KEY (`vi_id`) REFERENCES `village` (`vi_id`),
  ADD CONSTRAINT `driving_ibfk_4` FOREIGN KEY (`qu_id`) REFERENCES `queue` (`qu_id`);

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `passengers_ibfk_2` FOREIGN KEY (`ti_id`) REFERENCES `timer` (`ti_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`vi_id`) REFERENCES `village` (`vi_id`);

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `village_ibfk_1` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`),
  ADD CONSTRAINT `village_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
