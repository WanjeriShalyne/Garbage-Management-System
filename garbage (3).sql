-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 09:26 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garbage`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `customerpassword` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `roadname` varchar(255) NOT NULL,
  `apartments` varchar(255) NOT NULL,
  `house_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerdetails`
--

INSERT INTO `customerdetails` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `customerpassword`, `county`, `town`, `roadname`, `apartments`, `house_number`) VALUES
(1, 'James', 'Kimoni', 'kim1james@gmail.com', 734576321, 'Kimoni2021', ' Nairobi', 'Karen', 'Marula lane', 'Comboni Estate', 45),
(2, 'Rita', 'Mutie', 'ririMut1e@gmail.com', 742251970, 'Tuendemara5', ' Nairobi', 'Karen', 'Marula lane', 'Comboni Estate', 43),
(3, 'Shawn', 'Kamiti', 'shawnkamiti2@gmail.com', 720261962, 'KibetiBlue#', ' Nairobi', 'Dagoretti', 'Twiga close', 'Eden Apartment', 3),
(4, 'Flocy', 'Misik', 'flocymisik5@gmail.com', 718904040, 'TheKing4', ' Nairobi', 'Langata', 'Otiende', 'Kandidi Estate', 2),
(5, 'Kim', 'Kardashian', 'kkkardashian@yahoo.com', 789421869, 'Fridayweek01', ' Nairobi', 'Karen', 'Bogani lane', 'Bogani Estate', 122),
(6, 'Shalyne', 'Wanjeri', 'shaywanjeri@gmail.com', 722677858, 'Twentybob9', ' Nairobi', 'Dagoretti', 'Twiga close', 'Eden Apartment', 21),
(7, 'Irene', 'Mutie', 'irenemutie@gmail.com', 712134578, 'Candycrush23', ' Nairobi', 'Langata', 'Otiende', 'Kandidi Estate', 27),
(8, 'Dolli', 'Kemunto', 'kemunto1@yahoo.com', 799964214, 'Thursday91', ' Nairobi', 'Karen', 'Bogani lane', 'Bogani Estate', 121),
(9, 'Sian', 'Karasha', 'cecekara@gmail.com', 711678943, 'Youtuber874', ' Nairobi', 'South B', 'Giraffe road', 'Zen gardens', 12),
(10, 'Robert', 'Musalia', 'robertmusalia12@gmail.com', 737495599, 'Kidsnextdoor6', ' Kajiado', 'Ngong', 'Maasai road', 'Cit Apartments', 13),
(11, 'Lloyd', 'Nchore', 'nchorellyod@yahoo.com', 729642345, 'Laptopkazi0', ' Kajiado', 'Kiserian', 'Ndege Road', 'Fedha Estate', 1),
(12, 'Flavio', 'Musila', 'musilaflavour@gmail.com', 726543434, 'T0ystory3', ' Kajiado', 'Kiserian', 'Ndege Road', 'Fedha Estate', 12),
(13, 'Zack', 'Kimani', 'kimzack@gmail.com', 734981128, 'Draweryas1de', ' Kajiado', 'Rongai', 'Tasia Road', 'Cola Apartments', 2),
(14, 'Chris', 'Abdallah', 'abdallahchris@gmail.com', 739866222, 'Givemeahundred9', ' Kajiado', 'Matasia', 'Naramat close', 'Mufti Apartments', 13),
(15, 'Edward', 'Mutuku', 'mu.edwardtuku@gmail.com', 711199976, 'Orangeisnewblack7', ' Kajiado', 'Kibiko', 'Tatu road', 'Hadi Apartments', 4),
(16, 'Maureen', 'Murugi', 'mmurugi7mau@gmail.com', 744498235, 'Mashindano_57', ' Kajiado', 'Ngong', 'Lima road', 'Hodi Apartments', 8),
(17, 'Moses', 'Omolo', 'momulo@live.com', 722299956, 'Pillowtalk7', ' Nairobi', 'Langata', 'Lego road', 'Pima Courts', 33),
(18, 'Brian', 'Kiprop', 'brayo100@yahoo.com', 799675000, 'Kenyampya0', ' Kajiado', 'Kiserian', 'Jogoo road', 'Amapiano House', 3),
(19, 'Scholar', 'Andrew', 'sschollzdrew@yahoo.com', 795678026, 'Curtainsdrawn32', ' Kajiado', 'Kiserian', 'Jogoo road', 'Amapiano House', 3),
(20, 'Diana', 'Wanjiku', 'wanjizildee@ncpb.com', 772100984, 'Tomorrowland4', ' Nairobi', ' South B', 'Huduma road', 'Kanji Court', 7),
(21, 'Margret', 'Apondi', 'apondiapondi@live.com', 733767541, 'Fiddlinghome8', ' Nairobi', ' South B', 'Huduma road', 'Kanji Court', 13),
(22, 'Anne', 'Amollo', 'annieamoll0@kcb.com', 782640077, 'Tortoise6', ' Nairobi', ' South B', 'Huduma road', 'Kanji Court', 12),
(23, 'Kevin ', 'Opiyo', 'kevooopiyo@gmail.com', 722565656, 'Songbird702', ' Nairobi', ' South B', 'Huduma road', 'Kanji Court', 15),
(24, 'Sandra', 'Adhiambo', 'adhiambosandra@live.com', 711896985, 'Orangeisnewblack7', ' Nairobi', ' South B', 'Huduma road', 'Kanji Court', 6),
(25, 'Divine', 'Syombua', 'ssyombuadiv@gmail.com', 732123432, 'Subarulega7cy', ' Nairobi', ' South B', 'Huduma road', 'Kanji Court', 3),
(26, 'Hassan', 'Abdi', 'hassanabdi589@gmail.com', 729392156, 'LuvKFCch1cken', ' Kajiado', 'Kibiko', 'Tatu road', 'Hadi Apartments', 3),
(27, 'Hodari', 'Azmon', 'hodariazmon@gmail.com', 791237654, 'Gooddoctor1', ' Kajiado', 'Kibiko', 'Tatu road', 'Hadi Apartments', 7),
(28, 'Kevin', 'Oletepees', 'oletepeeskev@gmail.com', 742916666, 'TahidiHigh6', ' Kajiado', 'Kibiko', 'Tatu road', 'Hadi Apartments', 6),
(29, 'Edward', 'Mutuku', 'mu.edwardtuku@gmail.com', 730909090, 'Salimiajirani', ' Kajiado', 'Kibiko', 'Tatu road', 'Hadi Apartments', 5),
(42, '', '', '', 0, '', 'Nairobi', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customerstatement`
--

CREATE TABLE `customerstatement` (
  `id` int(11) NOT NULL,
  `transaction_description` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `statement_date` date NOT NULL,
  `reference_number` int(11) NOT NULL,
  `customeremail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoicestatement`
--

CREATE TABLE `invoicestatement` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_desc` varchar(100) NOT NULL,
  `customeremail` varchar(255) NOT NULL,
  `service_subscription_code` varchar(255) NOT NULL,
  `service_status` varchar(30) NOT NULL,
  `service_code` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoicestatement`
--

INSERT INTO `invoicestatement` (`id`, `amount`, `invoice_date`, `invoice_desc`, `customeremail`, `service_subscription_code`, `service_status`, `service_code`, `staff_name`) VALUES
(1, 1000, '2021-08-01', 'Residential', 'shaywanjeri@gmail.com', '1001VR', 'Active', 1001, ''),
(2, 1000, '2021-08-20', '2021-08-20', 'shaywanjeri@gmail.com', 'Res9348555', 'active', 1001, 'shaywanjeri@gmail.com'),
(3, 1000, '2021-08-18', '2021-08-18', 'le.mutuku@gmail.com', 'Res9348593', 'active', 1001, 'shaywanjeri@gmail.com'),
(4, 1000, '2021-08-20', '2021-08-20', 'shaywanjeri@gmail.com', 'Res9348555', 'active', 1001, 'shaywanjeri@gmail.com'),
(5, 1000, '2021-08-20', '2021-08-20', 'shaywanjeri@gmail.com', 'Res9348555', 'active', 1001, 'shaywanjeri@gmail.com'),
(6, 1000, '2021-08-20', '2021-08-20', 'shaywanjeri@gmail.com', 'Res9348555', 'active', 1001, 'shaywanjeri@gmail.com'),
(7, 1000, '2021-07-12', '2021-07-12', 'le.mutuku@gmail.com', 'Res9348593', 'active', 1001, 'staff1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `receiptsstatement`
--

CREATE TABLE `receiptsstatement` (
  `id` int(11) NOT NULL,
  `payment_description` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `receipts_date` date NOT NULL,
  `reference_number` int(11) NOT NULL,
  `service_subscription_code` varchar(255) NOT NULL,
  `service_code` int(11) NOT NULL,
  `customeremail` varchar(255) NOT NULL,
  `service_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `servicecharges`
--

CREATE TABLE `servicecharges` (
  `id` int(11) NOT NULL,
  `service_code` int(11) NOT NULL,
  `service_cost` varchar(255) NOT NULL,
  `service_duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicecharges`
--

INSERT INTO `servicecharges` (`id`, `service_code`, `service_cost`, `service_duration`) VALUES
(1, 1001, '1000', '30DAYS'),
(2, 1002, '1000', '30DAYS'),
(3, 1003, '10000', '1DAY');

-- --------------------------------------------------------

--
-- Table structure for table `serviceorder`
--

CREATE TABLE `serviceorder` (
  `id` int(11) NOT NULL,
  `service_code` varchar(100) NOT NULL,
  `service_subscription_code` varchar(100) NOT NULL,
  `customeremail` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceorder`
--

INSERT INTO `serviceorder` (`id`, `service_code`, `service_subscription_code`, `customeremail`, `startdate`, `enddate`, `status`) VALUES
(1, '1001', 'Res9348593', 'kim1james@gmail.com', '2021-07-01', '0000-00-00', 'active'),
(2, '1001', 'Res9348555', 'shaywanjeri@gmail.com', '2021-04-01', '0000-00-00', 'active'),
(3, '1002', '8712678/2021-08-01', 'shaywanjeri@gmail.com', '2021-08-01', '2021-08-31', 'active'),
(5, '1003', '1840630/2021-08-28', 'kkkardashian@yahoo.com', '2021-08-28', '2021-08-27', 'active'),
(7, '1001', '68656092021-09-04', 'shawnkamiti2@gmail.com', '2021-09-04', '2021-09-03', 'active'),
(8, '1002', '97519582021-08-19', 'kim1james@gmail.com', '2021-08-19', '2021-08-17', 'terminated'),
(9, '1002', '47617122021-08-26', 'kim1james@gmail.com', '2021-08-26', '2021-08-20', 'active'),
(10, '1003', '3028503', 'shaywanjeri@gmail.com', '2021-08-01', '2021-08-31', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_code`) VALUES
(1, 'Residential Services', 1001),
(2, 'Commercial Services', 1002),
(3, 'Construction and Demolition Services', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `staff_number` int(11) NOT NULL,
  `staffpassword` varchar(100) NOT NULL,
  `staffrole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `id_number`, `first_name`, `middle_name`, `surname`, `email`, `mobile_number`, `staff_number`, `staffpassword`, `staffrole`) VALUES
(2, 34551205, 'staff1', 'staff1', 'staff1', 'staff1@gmail.com', 715073726, 5100, 'staff', 'staff'),
(3, 32051984, 'staff2', 'staff2', 'staff2', 'staff2@gmail.com', 8663565, 5101, 'staff', 'staff'),
(4, 32051984, 'staff3', 'staff3', 'staff3', 'staff3@gmail.com', 742251970, 5103, 'staff', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerstatement`
--
ALTER TABLE `customerstatement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicestatement`
--
ALTER TABLE `invoicestatement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiptsstatement`
--
ALTER TABLE `receiptsstatement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicecharges`
--
ALTER TABLE `servicecharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceorder`
--
ALTER TABLE `serviceorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customerstatement`
--
ALTER TABLE `customerstatement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicestatement`
--
ALTER TABLE `invoicestatement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receiptsstatement`
--
ALTER TABLE `receiptsstatement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicecharges`
--
ALTER TABLE `servicecharges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `serviceorder`
--
ALTER TABLE `serviceorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
