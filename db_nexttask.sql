-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 06:36 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nexttask`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` varchar(50) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `name`, `address`, `number`, `notes`) VALUES
(1, 'Raymond Lee', '1111 Vancouver Street', '111-111-1111', 'Praesent sit amet ipsum id lacus volutpat dictum vitae ut ante. Duis convallis eleifend ex gravida placerat. Quisque in nulla in augue dapibus gravida. Aliquam semper sagittis porta. Fusce ut facilisis arcu, euismod dignissim libero. Phasellus vel augue et mi semper pretium. Nunc pretium tellus vitae augue sollicitudin ultricies. Ut nec malesuada purus. Cras quis arcu feugiat, scelerisque eros et, vulputate neque. In hac habitasse platea dictumst. Sed lobortis nulla at justo blandit pellentesque. Donec eu tincidunt ex.'),
(7, 'Edward Smith', '2121 Vancouver Street', '222-222-2222', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus lobortis nulla porttitor sollicitudin. Phasellus et dapibus lacus. Praesent cursus orci congue odio ornare tristique. Vivamus dictum nec enim quis lacinia. Pellentesque dapibus, dui ut rhoncus efficitur, felis risus mattis libero, a congue elit turpis facilisis sapien.'),
(8, 'Laura Miller', '3333 Surrey Street', '333-333-3333', ''),
(9, 'Donna Collins', '5555 Vancouver St', '888-888-8888', ''),
(10, 'Gerald Jones', '9999 Burnaby Street', '999-999-9999', 'Suspendisse eget nulla in mi molestie scelerisque quis eu odio. Maecenas in aliquet quam. Suspendisse nibh nibh, imperdiet non cursus eget, porttitor vel lectus. Nam pretium venenatis felis eget placerat. Sed pretium, erat ac dignissim cursus, velit ex porta leo, ac malesuada odio est ac arcu.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `task` text NOT NULL,
  `visitDate` date NOT NULL,
  `frequency` int(11) NOT NULL,
  `notes` text NOT NULL,
  `completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskID`, `customerID`, `task`, `visitDate`, `frequency`, `notes`, `completed`) VALUES
(13, 1, 'Math 8 Tutor', '2018-01-31', 7, 'Praesent sit amet ipsum id lacus volutpat dictum vitae ut ante. Duis convallis eleifend ex gravida placerat. Quisque in nulla in augue dapibus gravida. ', 1),
(14, 7, 'Math 10 Tutor', '2018-02-01', 7, 'Praesent sit amet ipsum id lacus volutpat dictum vitae ut ante. Duis convallis eleifend ex gravida placerat. Quisque in nulla in augue dapibus gravida. ', 0),
(15, 8, 'Math 7 Tutor', '2018-01-31', 7, '', 0),
(16, 9, 'Math 9 Tutor', '2018-02-03', 7, '', 0),
(17, 10, 'Math 8 Tutor', '2018-01-28', 1, '', 1),
(18, 10, 'Math 8 Tutor', '2018-01-29', 1, '', 1),
(19, 10, 'Math 8 Tutor', '2018-01-30', 1, '', 1),
(20, 10, 'Math 8 Tutor', '2018-01-31', 1, 'Sed feugiat, ligula ac tincidunt aliquet, purus justo malesuada ipsum, vitae gravida neque justo quis velit. Maecenas a nulla id sem accumsan ornare. Vestibulum sed quam ut lorem suscipit condimentum id ut quam. Morbi auctor nulla sed laoreet fermentum. Pellentesque eu justo quis erat iaculis convallis.', 0),
(21, 1, 'Math 8 Tutor', '2018-02-01', 7, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `customerID_f` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
