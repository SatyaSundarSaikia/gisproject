-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Server version: 10.5.18-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`, `image`) VALUES
(1, '<p>It is a long established fact that a reader will be distracted the readable content of a page when looking at layout the point of using lorem the is Ipsum less normal distribution of letters.</p>', '1716821578.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'satya@gmail.com', 'admin@2024');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `contact_sub` varchar(100) NOT NULL,
  `contact_msg` varchar(1000) NOT NULL,
  `enq_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_sub`, `contact_msg`, `enq_on`) VALUES
(1, 'satya', 'satya@gmail.com', '1234567890', 'geodata', 'please fatch some data', '27-05-2024'),
(2, 'sam', 'sam@gmail.com', '8210765324', 'demo', 'demo', '29-05-2024'),


-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `phonea` varchar(15) NOT NULL,
  `phoneb` varchar(12) NOT NULL,
  `emaila` varchar(70) NOT NULL,
  `emailb` varchar(70) NOT NULL,
  `website` varchar(70) NOT NULL,
  `logo` varchar(70) NOT NULL,
  `favicon` varchar(70) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `gmap` varchar(2000) NOT NULL,
  `signature` varchar(70) NOT NULL,
  `note` varchar(70) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `gplus` varchar(100) NOT NULL,
  `rss` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `company`, `address`, `city`, `state`, `pin`, `phonea`, `phoneb`, `emaila`, `emailb`, `website`, `logo`, `favicon`, `whatsapp`, `gmap`, `signature`, `note`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `gplus`, `rss`) VALUES
(1, 'Assam Web GIS', 'Bigyan Bhawan,Near IDBI Building, G.S. Road, Guwahati-781005,Assam, India', 'Guwahati', 'ASSAM', '781005', '069138 48401', '', 'dirassac2021@gmail.com', 'rmanamsales@gmail.com', 'www.demoproject.com', '1716817921.png', '1716817846.png', '', '<iframe     src=\"https://www.google.com/maps/embed/v1/place?q=Assam+State+Space+Application+Centre,+GS+Road,+near+IDBI+Bank+ABC,+ABC,+Near+IDBI+Bank,+Sree+Nagar,+Guwahati,+Assam,+India&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8\"></iframe>', 'signature.png', 'THANKING YOU FOR CHOOSING RMANAM.', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `image`) VALUES
(2, 'alexey-artyukh-DLf3uwkRNPA-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(11) NOT NULL,
  `servicename` varchar(50) NOT NULL,
  `servicedetails` varchar(500) NOT NULL,
  `serviceimg` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:Active;0:Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `servicename`, `servicedetails`, `serviceimg`, `status`) VALUES
(1, 'Visualization', 'Explore layers like state, district, and village boundaries, water bodies, forests, roads, \r\nrailways. Draw shapes (points, lines, polygons, freehand) for customization and analysis.', '1716533136.jpg', 1),
(2, 'Measurement and Analysis', 'Measure distances between points or along lines and calculate the area in square \r\nkilometers of drawn features for spatial analysis and planning.', '1716533558.jpg', 1),
(3, 'Search and Location', 'Utilize a geocode locator to search for specific places, enhancing navigation and \r\nexploration efficiency. Drop pins on provided longitude and latitude coordinates, \r\nfacilitating precise location marking on the map.', '1716533694.jpg', 1),
(4, 'Live Location Search', 'Typically works by integrating real-time data from various sources, such as GPS \r\nsatellites, cellular networks, and IoT (Internet of Things) devices. Live location search in GIS \r\nportals leverages real-time data collection, processing, and visualization technologies to \r\nprovide users with dynamic and actionable location information.', '1716533927.jpg', 1),
(5, 'Layer Management', 'Crop layers to display only relevant areas of interest, optimizing map clarity and focus. \r\nAccess a variety of base layers including Open Street Map, Satellite, Standard Map, and \r\nTransport Map to tailor visualization according to requirements.', '1716534279.png', 1),
(6, 'Print Functionality', 'Access available layer files from the catalog, subject to proper authentication. Admin \r\napproval is required for downloading, ensuring data security and integrity.', '1716534341.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHANDIGARH'),
(7, 'CHHATTISGARH'),
(8, 'DADRA AND NAGAR HAVELI'),
(9, 'DAMAN AND DIU'),
(10, 'DELHI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HARYANA'),
(14, 'HIMACHAL PRADESH'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KARNATAKA'),
(18, 'KERALA'),
(19, 'LAKSHADWEEP'),
(20, 'MADHYA PRADESH'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MEGHALAYA'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ODISHA'),
(27, 'PUDUCHERRY'),
(28, 'PUNJAB'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TELANGANA'),
(33, 'TRIPURA'),
(34, 'UTTARAKHAND'),
(35, 'UTTAR PRADESH'),
(36, 'WEST BENGAL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `t_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cnf_password` varchar(30) NOT NULL,
  `t_status` int(11) NOT NULL DEFAULT 1 COMMENT '1:Active;0:Deactive',
  `id_proof` varchar(50) NOT NULL,
  `document` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`t_id`, `name`, `email`, `phone`, `address`, `city`, `state`, `pin`, `password`, `cnf_password`, `t_status`, `id_proof`, `document`) VALUES
(1, 'satya', 'test@test.com', '6001591174', 'Barnachal Path,Byln 1', 'Guwahati', 'Assam', '785603', '12345', '', 1, '', ''),
(2, 'satya1', 'satya@gmail.com1', '8822216159', 'jorhat', 'jorhat', 'assam', '785603', 'satya', '123456', 1, 'Aadhar', 'Screenshot (18).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
