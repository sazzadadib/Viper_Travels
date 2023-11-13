-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql109.infinityfree.com
-- Generation Time: Nov 13, 2023 at 08:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35248617_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_booking`
--

CREATE TABLE `bus_booking` (
  `booking_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `seat_number` varchar(30) NOT NULL,
  `booking_date` date NOT NULL,
  `fare` int(11) NOT NULL,
  `payment_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_booking`
--

INSERT INTO `bus_booking` (`booking_id`, `username`, `bus_id`, `seat_number`, `booking_date`, `fare`, `payment_status`) VALUES
(102, 'user', 1002, '5', '2023-10-25', 1200, NULL),
(103, 'user', 1002, '9', '2023-10-25', 1200, NULL),
(104, 'user', 1014, '11', '2023-10-24', 1400, NULL),
(105, 'user', 1014, '15', '2023-10-24', 1400, NULL),
(106, 'user', 1014, '13', '2023-10-24', 1400, NULL),
(107, 'user', 1014, '23', '2023-10-24', 1400, NULL),
(108, 'user', 1014, '2', '2023-10-24', 1400, NULL),
(109, 'user', 1014, '6', '2023-10-24', 1400, NULL),
(110, 'user', 1014, '8', '2023-10-26', 1400, NULL),
(111, 'user', 1014, '9', '2023-10-26', 1400, NULL),
(112, 'user', 1006, '5', '2023-10-27', 1700, NULL),
(113, 'user', 1006, '21', '2023-10-27', 1700, NULL),
(114, 'user', 1006, '25', '2023-10-27', 1700, NULL),
(115, 'user', 1006, '14', '2023-10-27', 1700, NULL),
(116, 'user', 1006, '15', '2023-10-27', 1700, NULL),
(117, 'user', 1006, '12', '2023-10-27', 1700, NULL),
(118, 'user', 1006, '11', '2023-10-27', 1700, NULL),
(119, 'user', 1006, '7', '2023-10-27', 1700, NULL),
(120, 'user', 1006, '16', '2023-10-27', 1700, NULL),
(121, 'user', 1006, '13', '2023-10-27', 1700, NULL),
(122, 'user', 1006, '19', '2023-10-27', 1700, NULL),
(123, 'user', 1006, '18', '2023-10-27', 1700, NULL),
(124, 'user', 1006, '27', '2023-10-27', 1700, NULL),
(125, 'user', 1013, '10', '2023-10-27', 1700, NULL),
(126, 'user', 1013, '14', '2023-10-27', 1700, NULL),
(127, 'user', 1013, '15', '2023-10-27', 1700, NULL),
(128, 'user', 1013, '21', '2023-10-27', 1700, NULL),
(129, 'user', 1006, '5', '2023-10-30', 1700, NULL),
(130, 'user', 1006, '6', '2023-10-30', 1700, NULL),
(131, 'user', 1006, '8', '2023-10-30', 1700, NULL),
(132, 'user', 1006, '9', '2023-10-30', 1700, NULL),
(133, 'user', 1006, '12', '2023-10-30', 1700, NULL),
(134, 'user', 1014, '8', '2023-10-31', 1400, NULL),
(135, 'user', 1014, '9', '2023-10-31', 1400, NULL),
(136, 'user', 1014, '14', '2023-10-31', 1400, NULL),
(137, 'user', 1014, '15', '2023-10-31', 1400, NULL),
(138, 'user', 1006, '16', '2023-10-30', 1700, NULL),
(139, 'fahim', 1006, '2', '2023-10-10', 1700, NULL),
(140, 'fahim', 1006, '8', '2023-10-10', 1700, NULL),
(141, 'fahim', 1006, '17', '2023-10-10', 1700, NULL),
(142, 'user', 1026, '8', '2023-11-11', 1200, NULL),
(143, 'user', 1026, '9', '2023-11-11', 1200, NULL),
(144, 'user', 1006, '5', '2023-11-09', 1700, NULL),
(145, 'user', 1006, '28', '2023-11-09', 1700, NULL),
(146, 'amit123', 1001, '6', '2023-11-11', 1500, NULL),
(147, 'admin', 1017, '5', '2023-11-11', 1400, NULL),
(148, 'admin', 1017, '9', '2023-11-11', 1400, NULL),
(149, 'user', 1026, '2', '2023-11-15', 1200, NULL),
(150, 'user', 1026, '8', '2023-11-15', 1200, NULL),
(151, 'user', 1002, '5', '2023-11-11', 1200, NULL),
(152, 'user', 1002, '9', '2023-11-11', 1200, NULL),
(153, 'user', 1002, '8', '2023-11-11', 1200, 'Unpaid'),
(154, 'user', 1002, '11', '2023-11-11', 1200, NULL),
(155, 'amit123', 1005, '9', '2023-11-12', 1400, 'Paid'),
(156, 'user', 1005, '14', '2023-11-29', 1400, NULL),
(157, 'user', 1005, '15', '2023-11-29', 1400, NULL),
(158, 'user', 1005, '17', '2023-11-29', 1400, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `bus_id` int(11) NOT NULL,
  `bus_name` varchar(255) DEFAULT NULL,
  `starting_point` varchar(255) DEFAULT NULL,
  `ending_point` varchar(255) DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `reached_time` time DEFAULT NULL,
  `bus_fare` int(11) DEFAULT NULL,
  `bus_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`bus_id`, `bus_name`, `starting_point`, `ending_point`, `departure_time`, `reached_time`, `bus_fare`, `bus_image`) VALUES
(1001, 'Desh Travels', 'Dhaka', 'Chittagong', '08:00:00', '15:30:00', 1500, 'https://seatbooking.com.bd/wp-content/uploads/2021/11/Desh-Travels.jpg'),
(1002, 'Eagle Paribahan', 'Dhaka', 'Sylhet', '09:30:00', '17:00:00', 1200, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9mv4T4n_2SCfJyl_ffLQMQx2SEjmlw9SAESa4yFTaxA2GkSJDOnhXa7ns4MTR0NdT2gQ&usqp=CAU'),
(1003, 'ENA Travels', 'Rajshahi', 'Khulna', '10:15:00', '18:45:00', 1600, 'https://cdn.dhakapost.com/media/imgAll/BG/2021October/ena-20211228125756.jpg'),
(1004, 'Green Line', 'Barishal', 'Dhaka', '11:45:00', '19:15:00', 1300, 'https://i.ytimg.com/vi/xvPflsMWQ88/maxresdefault.jpg'),
(1005, 'Hanif Paribahan', 'Dhaka', 'Sylhet', '13:00:00', '20:30:00', 1400, 'https://chokrojan-bucket.s3.ap-southeast-1.amazonaws.com/company/slides/he_place_slide_3.jpg'),
(1006, 'National Travels', 'Dhaka', 'Khulna', '08:30:00', '16:00:00', 1700, 'https://farm8.staticflickr.com/7548/15538614408_56a26c2ab6_n.jpg'),
(1007, 'Saudi Travels', 'Sylhet', 'Chittagong', '10:00:00', '17:30:00', 1600, 'https://i.pinimg.com/originals/1b/b7/0b/1bb70bb5615b5470f3c31928657d5282.jpg'),
(1008, 'Shyamoli Paribahan', 'Rajshahi', 'Dhaka', '12:15:00', '19:45:00', 1400, 'https://th.bing.com/th/id/OIP.33HG8JOXF4YQnJ3tIkxjNgAAAA?pid=ImgDet'),
(1009, 'Shohag Express', 'Barishal', 'Chapainawabganj', '14:30:00', '22:00:00', 1200, 'https://i.ytimg.com/vi/gSbtSCMpXtU/hqdefault.jpg'),
(1010, 'Desh Travels', 'Dhaka', 'Rajshahi', '09:00:00', '16:30:00', 1600, 'https://static.busbd.com.bd/busbdmedia/WhatsApp%20Image%202019-03-04%20at%2011.18.30%20AM%20(1).1552287686'),
(1011, 'Eagle Paribahan', 'Sylhet', 'Chapainawabganj', '11:30:00', '19:00:00', 1300, 'https://i.ytimg.com/vi/xwIFWUIArak/hqdefault.jpg'),
(1012, 'ENA Travels', 'Chittagong', 'Barishal', '13:45:00', '21:15:00', 1500, 'https://tds-images.thedailystar.net/sites/default/files/styles/very_big_201/public/feature/images/brahmanbaria-road-accident-corr2.jpg'),
(1013, 'Green Line', 'Dhaka', 'Khulna', '16:15:00', '23:45:00', 1700, 'https://greenlinebd.com/wp-content/uploads/2020/08/IMG_5906.jpg'),
(1014, 'Hanif Paribahan', 'Barishal', 'Sylhet', '18:30:00', '02:00:00', 1400, 'https://chokrojan-bucket.s3.ap-southeast-1.amazonaws.com/company/slides/he_place_slide_1.jpg'),
(1015, 'National Travels', 'Khulna', 'Rajshahi', '07:00:00', '14:30:00', 1600, 'https://static.busbd.com.bd/busbdmedia/28378911_2085121928389254_5274871027189970368_n.1525197592'),
(1016, 'Saudi Travels', 'Dhaka', 'Chittagong', '10:45:00', '18:15:00', 1500, 'https://www.arabnews.pk/sites/default/files/styles/n_670_395/public/main-image/2020/12/13/2383966-171201419.png?itok=DHU83P9N'),
(1017, 'Shyamoli Paribahan', 'Dhaka', 'Sylhet', '13:15:00', '20:45:00', 1400, 'https://shyamolitickets.com/images/slide/2.jpg'),
(1018, 'Shohag Express', 'Rajshahi', 'Barishal', '15:30:00', '23:00:00', 1300, 'https://img.12go.co/0/plain/s3://12go-web-static/static/images/operator/16264/class/1721-outside.jpg'),
(1019, 'ENQ', 'Ab', 'CD', '12:45:00', '01:25:00', 120, ''),
(1022, 'ENA', 'Ab', 'CD', '12:45:00', '01:25:00', 120, 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YnVzfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60'),
(1025, 'ENAAd', 'Ab', 'CD', '09:21:00', '17:18:00', 125, ''),
(1026, 'Shohag Express', 'Dhaka', 'Sylhet', '17:00:00', '22:00:00', 1200, 'https://img.12go.com/0/plain/s3://12go-web-static/static/images/operator/16264/class/1721-outside.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_booking`
--

CREATE TABLE `hotel_booking` (
  `booking_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_booking`
--

INSERT INTO `hotel_booking` (`booking_id`, `username`, `hotel_id`, `room_type`, `checkin`, `checkout`, `adults`, `quantity`, `total_price`, `payment_status`) VALUES
(127, 'user', 4005, 'Deluxe', '2023-10-24', '2023-10-25', 3, 2, 720, NULL),
(128, 'user', 4003, 'Deluxe', '2023-10-26', '2023-10-27', 2, 1, 200, NULL),
(129, 'user', 4002, 'Economic', '2023-10-31', '2023-11-02', 1, 1, 220, NULL),
(130, 'amit123', 4001, 'Economic', '2023-11-11', '2023-11-11', 2, 1, 0, NULL),
(131, 'user', 4001, 'Deluxe', '2023-11-11', '2023-11-11', 2, 2, 0, NULL),
(132, 'user', 4001, 'Deluxe', '2023-11-11', '2023-11-18', 2, 2, 3080, 'Paid'),
(133, 'user', 4001, 'Deluxe', '2023-11-11', '2023-11-14', 2, 2, 1320, NULL),
(134, 'user', 4002, 'Economic', '2023-11-11', '2023-11-21', 1, 2, 2200, NULL),
(135, 'amit123', 4003, 'Deluxe', '2023-11-12', '2023-11-15', 3, 2, 1200, 'Paid'),
(136, 'user', 4003, 'Economic', '2023-11-16', '2023-11-18', 2, 1, 260, 'Paid'),
(137, 'Admin', 4011, 'Economic', '2023-11-13', '2023-11-30', 1, 1, 2125, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_loc` varchar(255) NOT NULL,
  `loc_district` varchar(255) NOT NULL,
  `Standard` int(11) DEFAULT NULL,
  `hotel_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`hotel_id`, `hotel_name`, `hotel_loc`, `loc_district`, `Standard`, `hotel_image`) VALUES
(4001, 'Hotel Sajek Palace', 'Sajek', 'Rangamati', 3, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0e/bc/59/3a/sajek-the-queen-of-clouds.jpg?w=700&h=-1&s=1'),
(4002, 'Cox\'s Bazar Paradise Hotel', 'Cox\'s Bazar', 'Cox\'s Bazar', 4, 'https://media-cdn.tripadvisor.com/media/photo-s/12/b1/c8/fc/ocean-paradise-hotel.jpg'),
(4003, 'Sylhet Grand Hotel', 'Jaflong', 'Sylhet', 5, 'https://cf.bstatic.com/xdata/images/hotel/max500/364031722.jpg?k=8aab6c073cf508a36aebdc48fa0de1dc2391affb3d91f62cea64eb545bff58ff&o=&hp=1'),
(4004, 'Bandarban Mountain Resort', 'Bandarban', 'Bandarban', 3, 'https://media-cdn.tripadvisor.com/media/photo-s/0d/69/d1/ea/akashlina-the-resort.jpg'),
(4005, 'Abul Hotel', 'Malibagh', 'Dhaka', 5, 'https://lh3.googleusercontent.com/p/AF1QipMoHGRsL23hkRjaMVpksXvZRh7mn5BO2RZg609m=s680-w680-h510'),
(4008, 'Rose View Hotel', 'Moulvibazar', 'Sylhet', 3, 'https://www.nagarkottrekking.com/files/hotels/287692_14103114370023105375.jpg'),
(4009, 'Hotel Metro International', 'Lamabazar', 'Sylhet', 5, 'https://media-cdn.tripadvisor.com/media/photo-s/05/2b/9e/33/view-of-the-hotel.jpg'),
(4011, 'Abul Hotel', 'Malibagh', 'Dhaka', 4, 'https://lh3.googleusercontent.com/p/AF1QipMoHGRsL23hkRjaMVpksXvZRh7mn5BO2RZg609m=s680-w680-h510');

-- --------------------------------------------------------

--
-- Table structure for table `loc_info`
--

CREATE TABLE `loc_info` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `loc_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loc_info`
--

INSERT INTO `loc_info` (`loc_id`, `loc_name`, `district`, `division`, `country`, `loc_image`) VALUES
(2001, 'Dhaka', 'Dhaka', 'Dhaka', 'Bangladesh', 'https://images.unsplash.com/photo-1630987871777-f7b2d62894d0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'),
(2002, 'Chittagong Port', 'Chittagong', 'Chittagong', 'Bangladesh', 'https://static.fibre2fashion.com/newsresource/images/271/shutterstock-705507505-1_283043.jpg'),
(2003, 'Sylhet', 'Sylhet', 'Sylhet', 'Bangladesh', 'https://cdn.pixabay.com/photo/2018/09/12/22/43/bangladesh-3673378_1280.jpg'),
(2004, 'Cox\'s Bazar Beach', 'Cox\'s Bazar', 'Chittagong', 'Bangladesh', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/e2/f8/43/longest-sea-beach-in.jpg?w=1000&h=-1&s=1'),
(2005, 'Rajshahi University', 'Rajshahi', 'Rajshahi', 'Bangladesh', 'https://www.localguidesconnect.com/t5/image/serverpage/image-id/298102i3BFE1A7075511166/image-size/large?v=v2&px=999'),
(2006, 'Khulna Shipyard', 'Khulna', 'Khulna', 'Bangladesh', 'https://www.khulnashipyard.com/wp-content/uploads/2021/09/Highspeed_boat.jpg'),
(2007, 'Barisal Riverfront', 'Barisal', 'Barisal', 'Bangladesh', 'https://upload.wikimedia.org/wikipedia/commons/7/78/Barisal_Launch_Terninal.jpg'),
(2008, 'Jessore Airport', 'Jessore', 'Khulna', 'Bangladesh', 'https://tds-images.thedailystar.net/sites/default/files/styles/big_202/public/images/2023/07/31/jashore-airport.jpg'),
(2009, 'Comilla Cantonment', 'Comilla', 'Chittagong', 'Bangladesh', 'https://media-cdn.tripadvisor.com/media/photo-s/07/e5/7c/cb/maynamati-war-cemetery.jpg'),
(2010, 'Mahasthangarh', 'Bogra', 'Rajshahi', 'Bangladesh', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Gokul_Medh_06.jpg/1024px-Gokul_Medh_06.jpg'),
(2011, 'Sundarbans Forest', 'Khulna', 'Khulna', 'Bangladesh', 'https://cosmosgroup.sgp1.cdn.digitaloceanspaces.com/news/details/6122000_Mangrove+Forest+Sundarbans+Bangladesh.jpg'),
(2012, 'Paharpur Buddhist Vihara', 'Naogaon', 'Rajshahi', 'Bangladesh', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Paharpur_Buddhist_Bihar.jpg/1024px-Paharpur_Buddhist_Bihar.jpg'),
(2013, 'Saint Martin Island', 'Cox\'s Bazar', 'Chittagong', 'Bangladesh', 'https://media-cdn.tripadvisor.com/media/photo-s/16/a1/4e/77/saint-martin-of-bangladesh.jpg'),
(2014, 'Rangamati Hill Tracts', 'Rangamati', 'Chittagong', 'Bangladesh', 'https://th.bing.com/th/id/R.57515a172f0494c305410e142946dfbf?rik=kIK99VUzZBxIWA&riu=http%3a%2f%2f2.bp.blogspot.com%2f-GeDDnXnEFM4%2fTi8AdzW4MaI%2fAAAAAAAACbs%2f1IJeqFpVgEQ%2fw1200-h630-p-k-no-nu%2fRangamati.jpg&ehk=07Sq0NqKw6j9Pf72xs4rdCgaKN7mD98O4wB%2fvAtkR80%3d&risl=&pid=ImgRaw&r=0'),
(2015, 'Mongla Sea Port', 'Khulna', 'Khulna', 'Bangladesh', 'https://www.lrbtravelteam.com/wp-content/uploads/2020/11/Mongla-Port.png'),
(2016, 'Kuakata Beach', 'Patuakhali', 'Barisal', 'Bangladesh', 'https://i.pinimg.com/originals/9c/5e/2a/9c5e2ac9604f04f35a09261aa825c3ca.jpg'),
(2017, 'Srimangal Tea Gardens', 'Moulvibazar', 'Sylhet', 'Bangladesh', 'https://i.pinimg.com/736x/b6/4b/5c/b64b5cb624aba0e1feb3b2ac021dfa60.jpg'),
(2018, 'Bagerhat Historic Mosque', 'Bagerhat', 'Khulna', 'Bangladesh', 'https://th.bing.com/th/id/OIP.bzzLnHzhcl0MZVXmGmVAUwHaE8?pid=ImgDet'),
(2019, 'Madhabkunda Waterfall', 'Moulvibazar', 'Sylhet', 'Bangladesh', 'https://th.bing.com/th/id/OIP.Em-ycgwRhWtAlo6OD3fzGgHaFB?pid=ImgDet'),
(2020, 'Pabna Mental Hospital', 'Pabna', 'Rajshahi', 'Bangladesh', 'https://th.bing.com/th/id/OIP.wMmxyEqH4TjH-KLqDfb9owHaE6?pid=ImgDet'),
(2021, 'North South University', 'Dhaka', 'Dhaka', 'Bangladesh', 'https://th.bing.com/th/id/OIP.NE5GNHrNudmvKalOcXycFQHaE6?pid=ImgDet'),
(2022, 'Jamuna Future Park', 'Dhaka', 'Dhaka', 'Bangladesh', 'https://media-cdn.tripadvisor.com/media/photo-s/1a/89/56/21/jamuna-future-park.jpg'),
(2023, 'Shahjalal Airport', 'Dhaka', 'Dhaka', 'Bangladesh', 'https://directorsdirectory.com/wp-content/uploads/2021/03/Dhaka-Airport.jpg'),
(2024, 'Chalan Beel', 'Natore', 'Rajshahi', 'Bangladesh', 'https://th.bing.com/th/id/OIP.KFsQl4tbF6G4ZF6wAmlb0gHaD4?pid=ImgDet'),
(2025, 'Kaptai Lake', 'Rangamati', 'Chittagong', 'Bangladesh', 'https://th.bing.com/th/id/OIP.ZXXNU69sk9Olp6xOcdfOvAHaDz?pid=ImgDet');

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `hotel_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `max_pers` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `room_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`hotel_id`, `type_name`, `max_pers`, `price`, `room_image`) VALUES
(4001, 'Deluxe', 3, 220, 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWwlMjByb29tfGVufDB8fDB8fHww&w=1000&q=80'),
(4001, 'Economic', 2, 100, 'https://cdn.pixabay.com/photo/2020/10/18/09/16/bedroom-5664221_1280.jpg'),
(4001, 'Standard', 2, 120, 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'),
(4002, 'Economic', 2, 110, 'https://cdn-cms2.hotelrunner.com/assets/photos/original/31f10999-149d-46bf-b187-3e0981ff8cb2.jpg'),
(4002, 'Standard', 2, 150, 'https://www.bosphorushotel.rs/upload/images/ORIGINAL/IMG_5495.jpg'),
(4003, 'Deluxe', 3, 200, 'https://www.queensangeles.com/media/k2/galleries/219/eco_05.jpg'),
(4003, 'Economic', 2, 130, 'https://www.schiller5.com/files/tao/img/schiller5/galerien_zimmer/Economy_Zimmer_Galerie/Schiller5_Economy_02.jpg'),
(4003, 'Standard', 2, 160, 'https://www.searca.org/templates/yootheme/cache/economy-room-01-a246bd39.jpeg'),
(4004, 'Deluxe', 3, 240, 'https://images.unsplash.com/photo-1631049552057-403cdb8f0658?auto=format&fit=crop&q=80&w=1000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGhvdGVsJTIwcm9vbXxlbnwwfHwwfHx8MA%3D%3D'),
(4004, 'Economic', 2, 100, 'https://images.pexels.com/photos/1579253/pexels-photo-1579253.jpeg?auto=compress&cs=tinysrgb&w=1600'),
(4004, 'Standard', 2, 140, 'https://www.hotelcontractbeds.co.uk/media/3183/hotel-room.jpg'),
(4005, 'Deluxe', 7, 360, 'https://lh3.googleusercontent.com/p/AF1QipMoHGRsL23hkRjaMVpksXvZRh7mn5BO2RZg609m=s680-w680-h510'),
(4005, 'Economic', 3, 125, 'https://lh3.googleusercontent.com/p/AF1QipMoHGRsL23hkRjaMVpksXvZRh7mn5BO2RZg609m=s680-w680-h510'),
(4005, 'Standard', 6, 145, 'https://lh3.googleusercontent.com/p/AF1QipMoHGRsL23hkRjaMVpksXvZRh7mn5BO2RZg609m=s680-w680-h510'),
(4008, 'Deluxe', 3, 260, 'https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'),
(4008, 'Economic', 4, 220, 'https://thumbs.dreamstime.com/b/luxury-hotel-room-king-size-bed-15166031.jpg'),
(4008, 'Standard', 3, 240, 'https://images.pexels.com/photos/262048/pexels-photo-262048.jpeg?auto=compress&cs=tinysrgb&w=600'),
(4009, 'Deluxe', 12, 250, 'https://imageio.forbes.com/specials-images/imageserve/5cdb058a5218470008b0b00f/Nobu-Ryokan-Malibu/0x0.jpg?format=jpg&height=1009&width=2000'),
(4009, 'Economic', 1, 120, 'https://images.pexels.com/photos/237371/pexels-photo-237371.jpeg?auto=compress&cs=tinysrgb&w=600'),
(4011, 'Economic', 3, 125, 'https://lh3.googleusercontent.com/p/AF1QipMoHGRsL23hkRjaMVpksXvZRh7mn5BO2RZg609m=s680-w680-h510');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`fullname`, `username`, `email`, `password`, `contact`, `usertype`) VALUES
('Admin', 'admin', 'admin@vipertravels.com', '$2y$10$7HhgfwOMQzAzGMaWhib2luFiy8u6x4DeNbNdLr3ZN817SPDXthYO.', '0123546987', 'admin'),
('Amit', 'amit123', 'blacknight7830@gmail.com', '$2y$10$8e2PnoDzyXkRtz6R3zUZ..Ul9eRHvvyIH4k1xEAn8byNAQAlZn/AK', '01882162302', 'user'),
('Amit', 'amit1234', 'amit@gmail.com', '$2y$10$Je4Yle9qppLyEJdyoe8PnezF4W2H1855AtRG6SstshEHNobhpKvma', '01882162302', 'user'),
('fahim', 'fahim', 'fahim@gmail.com', '$2y$10$JCk689RuTwJWcA8yXXYFgeDNKU8ZzxldB2k.fY.Rhl0A9kvvdnVtG', '12323123123', 'user'),
('Sazzad Hossain', 'sazzad', 'sazzad@vipertravels.com', '$2y$10$NxvBPYw1yf8uekNIVgFp4eYLUC38bDHi2hFtb9558J4xXrQdZt4zC', '01878009399', 'admin'),
('Sazzad Hossain', 'user', 'user@vipertravels.com', '$2y$10$mO2RfFoIdlCqcatSC3M33eJySMHIkgy6K5va1/r0Bn8FFVQLUUrJu', '0123546988', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_booking`
--
ALTER TABLE `bus_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `userbus` (`username`);

--
-- Indexes for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `userhotel` (`username`),
  ADD KEY `hotel` (`hotel_id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `loc_info`
--
ALTER TABLE `loc_info`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`hotel_id`,`type_name`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_booking`
--
ALTER TABLE `bus_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1027;

--
-- AUTO_INCREMENT for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4012;

--
-- AUTO_INCREMENT for table `loc_info`
--
ALTER TABLE `loc_info`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2027;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_booking`
--
ALTER TABLE `bus_booking`
  ADD CONSTRAINT `bus_id` FOREIGN KEY (`bus_id`) REFERENCES `bus_info` (`bus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userbus` FOREIGN KEY (`username`) REFERENCES `users_data` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD CONSTRAINT `hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_info` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userhotel` FOREIGN KEY (`username`) REFERENCES `users_data` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_info`
--
ALTER TABLE `room_info`
  ADD CONSTRAINT `hotelroom` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_info` (`hotel_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
