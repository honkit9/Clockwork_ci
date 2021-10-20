-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 07:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clockwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `backenduser`
--

CREATE TABLE `backenduser` (
  `uid` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backenduser`
--

INSERT INTO `backenduser` (`uid`, `username`, `email`, `phone`, `password`) VALUES
(1, 'honkit', 'hk@gmail.com', '011-2165 8075', '123456'),
(2, 'Charles', '', '', '223344'),
(3, 'John Bendela', '', '', '818519u51'),
(6, 'Shawn', 'honkit3213@gmail.com', '849-1842 1042', '11111111');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `Customer_ID` int(5) NOT NULL,
  `Customer_Name` varchar(40) NOT NULL,
  `Customer_Email` varchar(70) NOT NULL,
  `Customer_Phone_Number` varchar(20) NOT NULL,
  `Customer_Password` text NOT NULL,
  `Check_In` date DEFAULT NULL,
  `Check_Out` date DEFAULT NULL,
  `Night` int(2) DEFAULT NULL,
  `Total_Price` int(11) DEFAULT NULL,
  `Customer_Status` int(2) NOT NULL,
  `Customer_Feedback` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`Customer_ID`, `Customer_Name`, `Customer_Email`, `Customer_Phone_Number`, `Customer_Password`, `Check_In`, `Check_Out`, `Night`, `Total_Price`, `Customer_Status`, `Customer_Feedback`) VALUES
(1, 'Alex', 'alex@gmail.com', '024-9812 1049', 'bb39987a2a73d5b776f305e901e7aadfdc505bb3bb28026712784c44eb7c08c23d3ff09af10bf05c787b43cc1db04818aa33a2a224b0781053af463b35b8fc6f', '2020-12-21', '2020-12-23', 2, 560, 1, 1),
(2, 'De Wei Song', '1191200336@student.mmu.edu.my', '011-1111 1112', '683b4ac8db089c0a5a7806b6c43c3b7260d5e0669ff826eabfdddac6335af5dc94b126f2fa0278b5f8a69605e6a5aedec2816d9534363e78e8c7e4f36ca75b93', '2021-01-19', '2021-01-21', 2, 298, 1, 0),
(3, 'Kelly', 'kelly@gmail.com', '022-1382 1312', '52950dfbf91ac086df32c6691e98b22b654416af97f8d807622748f05d1836eb01800e60fc9ed10873905b2138bf8e17f862939274bf765888dca7eabb87b8d6', '2020-12-23', '2020-12-25', 2, 298, 1, 1),
(4, 'Natsu', 'natsu@gmail.com', '018-3435 0381', '122f467f0e3ff9cf03379c40cac468d5eb10beb1bebf66bf9f194ed37797d6fcc2f4fa55c7932b21d3351a567b5f24d21cd9331ed4336e75dc113c6e254d6d20', '2020-12-23', '2020-12-25', 2, 498, 1, 0),
(5, 'Yui', 'yui@gmail.com', '012-1481 4812', '82e80a40b9b29bb1c26a2e10990c8779abe3ad6a00aa845cbb5eebefb355586ed8072a6e116558e6d339a9759dc8acd285493918f41b52e7f44238d00c953ee1', '2020-12-19', '2020-12-21', 2, 36300, 1, 1),
(11, 'honkit', 'honkit@gmail.com', '011-2165 8075', '7e1ef1fab03d181746c735ffb547dd771f2dc1965e0e338f0688987b8b043bc09675b193e01dd013a8150c30ecc4e53617836cce4bf33c6966d152dfb9ef69ec', NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rid` int(11) NOT NULL,
  `rolesname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `rolesname`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_ID` int(5) NOT NULL,
  `Room_Name` varchar(100) NOT NULL,
  `Room_Summary` text DEFAULT NULL,
  `Room_Price` int(4) NOT NULL,
  `Recommendation` text DEFAULT NULL,
  `Room_Image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0published, 1 un\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_ID`, `Room_Name`, `Room_Summary`, `Room_Price`, `Recommendation`, `Room_Image`, `status`) VALUES
(1, 'Super Single Room', 'A hotel room or bedroom designed to be used by just one person.', 149, '1 person (1 adult)', 'single2.jpg', 0),
(2, 'Double Room', 'A room, especially that is designed for two people and has two single beds.', 199, '2 person (2 adult)', 'double2.jpg', 0),
(3, 'Connecting Room', 'A connecting rooms that suitable for family holiday.', 410, '5 person (3 adult, 2 children)', 'connecting2.jpg', 0),
(4, 'Deluxe Room', ' A room that designed for those who loves antique and classic rooms.', 249, '2 person (2 adult)', 'deluxe2.jpg', 0),
(5, 'Event Hall', 'Suitable for all event.', 2500, 'Less than 250', 'event2.jpg', 0),
(6, 'Hall', 'Suitable for big event such as Wedding event and etc.', 18150, 'Less than 500', 'hall2.jpg', 0),
(7, 'King Room', 'A King of the rooms that designed based on the luxury design.', 289, '3 person (2 adult, 1 children)', 'king2.jpg', 0),
(8, 'Presidential Suite', 'A presidential suite of rooms, as in a hotel, suitable for a president or other head of state.', 10000, '2 person (2 adult)', 'presidential2.jpg', 0),
(9, 'Quad Room', 'Rooms that suitable for four person in a room.', 456, '4 person (2 adult, 2 children)', 'quad2.jpg', 0),
(10, 'Queen Room', 'A room that is designed for two people who love to see night scenery and facing the city.', 236, '3 person (2 adult, 1 children)', 'queen4.jpg', 0),
(11, 'Queen Room(High class design)', 'A high class design.', 331, '2 person (2 adult)', 'queen2.jpg', 0),
(12, 'Queen Room(Relaxation design)', 'A relaxation rooms.', 224, '3 person (2 adult, 1 children)', 'queen3.jpg', 0),
(13, 'Queen Room(Suitable for Family)', 'A simple design that suitable for family and kids.', 245, '3 person (2 adult, 1 children)', 'queen5.jpg', 0),
(14, 'Queen(Smoking-Area)', 'A rooms that suitable for a smoker customer and face back of our backyard hotel.', 280, '2 person (2 adult)', 'queen6.jpg', 0),
(15, 'Suite', 'A suite of rooms, consist of 3 queens bed and a connecting rooms that has table, TV sofa and etc.', 546, '5 person or more (3 adult, 2 children)', 'suite2.jpg', 0),
(16, 'Twin Room', 'That designed for those customer who likes small space and not so big.', 149, '2 person (2 adult)', 'twin2.jpg', 0),
(28, 'test', 'test', 22, 'test', 'test', 0),
(29, 'Chaletoleto', '5 star hotel', 380, 'what a good place to enjoy yourself\r\n', 'assets/upload/roomimg/Prevention_(1).png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `urid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL COMMENT '0 remain, 1 deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`urid`, `uid`, `rid`, `delete_status`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 1, 0),
(5, 2, 2, 1),
(6, 2, 3, 0),
(7, 3, 1, 0),
(8, 3, 2, 1),
(9, 3, 3, 0),
(10, 6, 1, 1),
(11, 6, 2, 1),
(12, 6, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backenduser`
--
ALTER TABLE `backenduser`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_ID`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`urid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backenduser`
--
ALTER TABLE `backenduser`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `Customer_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Room_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `urid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
