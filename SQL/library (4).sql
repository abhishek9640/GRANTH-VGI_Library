-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 06:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `catid` int(4) UNSIGNED DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `catid`, `lastmodified`) VALUES
(1, 'Anuj kumar', 5, '2022-01-22 12:53:03'),
(2, 'Chetan Bhagatt', 6, '2022-01-22 12:53:03'),
(3, 'Anita Desai', 4, '2022-01-22 21:53:41'),
(4, 'HC Verma', 4, '2022-01-22 21:53:45'),
(5, 'R.D. Sharma ', 4, '2022-01-22 21:53:47'),
(9, 'fwdfrwer', 4, '2022-01-22 21:53:55'),
(10, 'Dr. Andy Williams', 5, '2022-12-02 22:11:46'),
(11, 'Kyle Hill', 9, '2022-12-02 22:11:46'),
(12, 'Robert T. Kiyosak', 8, '2022-12-02 22:11:46'),
(13, 'Kelly Barnhill', 8, '2022-12-02 22:11:46'),
(14, 'Herbert Schildt', 5, '2022-12-02 22:11:46'),
(16, 'Corman', 5, '2022-12-02 22:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookrequest`
--

CREATE TABLE `tblbookrequest` (
  `sno` int(5) NOT NULL,
  `collegeId` varchar(20) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `mailid` varchar(40) DEFAULT NULL,
  `category` int(6) UNSIGNED DEFAULT NULL,
  `author` int(6) UNSIGNED DEFAULT NULL,
  `book` int(6) UNSIGNED DEFAULT NULL,
  `otp` varchar(15) DEFAULT NULL,
  `approved` varchar(1) DEFAULT 'N',
  `remarks` varchar(30) DEFAULT '',
  `requestDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(25) DEFAULT NULL,
  `bookImage` longblob NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `bookImage`, `RegDate`, `UpdationDate`) VALUES
(1, 'PHP And MySql programming', 5, 1, '222333', 0x31656665636330636138323265343062376236373363306437396165393433662e6a7067, '2022-01-22 07:23:03', '2022-12-03 22:16:12'),
(3, 'physics', 6, 4, '1111', 0x64643832363762353765306534666565653539313163623165316130336137392e6a7067, '2022-01-22 07:23:03', '2022-12-03 22:16:36'),
(5, 'Murach\'s MySQL', 5, 1, '9350237695', 0x35393339643634363535623464326165343433383330643733616263333562362e6a7067, '2022-01-21 16:42:11', '2022-12-03 22:16:41'),
(6, 'WordPress for Beginners 2022: A Visual Step-by-Step Guide to Mastering WordPress', 5, 10, 'B019MO3WCM', 0x31343461623730366261316362396636633233666436616539633035303262332e6a7067, '2022-01-22 07:16:07', '2022-12-03 22:16:26'),
(7, 'WordPress Mastery Guide:', 5, 11, 'B09NKWH7NP', 0x39303038336135363031343138366538386666636131303238363137326536342e6a7067, '2022-01-22 07:18:03', '2022-12-03 22:16:47'),
(8, 'Rich Dad Poor Dad: What the Rich Teach Their Kids About Money That the Poor and Middle Class Do Not', 8, 12, 'B07C7M8SX9', 0x35323431316232626432613662326530646633656231303934336135623634302e6a7067, '2022-01-22 07:20:39', '2022-12-03 22:16:55'),
(9, 'The Girl Who Drank the Moon', 8, 13, '1848126476', 0x66303563643139386163393333353234356531666466666137393332303761372e6a7067, '2022-01-22 07:22:33', '2022-12-03 22:17:03'),
(10, 'C++: The Complete Reference, 4th Edition', 5, 14, '007053246X', 0x33366166356465393031326266386338303465343939646333633362333361352e6a7067, '2022-01-22 07:23:36', '2022-12-03 22:17:08'),
(11, 'ASP.NET Core 5 for Beginners', 9, 11, 'GBSJ36344563', 0x62316236373838303136626266616231326366643237323236303462616463392e6a7067, '2022-01-22 08:14:21', '2022-12-03 22:15:21'),
(12, 'Design And Analysis of Algorithm', 5, 16, '700434', 0x61326135303665346666383130316361393639366135653137643535656562302e6a7067, '2022-12-02 06:57:22', '2022-12-03 22:15:30'),
(13, 'Java Complete Ref ', 9, 14, '29811', 0x34316332636662356563343838656136396132653361313834396461333332382e6a7067, '2022-12-06 05:26:59', NULL),
(14, 'C++ Complete Ref ', 9, 14, '92821', 0x33623461653137643264326339376563356534303038663566623338306531362e6a7067, '2022-12-06 05:30:02', '2022-12-06 05:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookstocks`
--

CREATE TABLE `tblbookstocks` (
  `bookid` int(5) NOT NULL,
  `totalbooks` int(4) DEFAULT NULL,
  `issuedbooks` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbookstocks`
--

INSERT INTO `tblbookstocks` (`bookid`, `totalbooks`, `issuedbooks`) VALUES
(1, 20, -1),
(3, 15, 0),
(5, 455, 1),
(6, 100, 1),
(7, 53, 0),
(8, 120, 0),
(9, 200, 16),
(10, 142, 1),
(11, 422, 1),
(12, 30, 2),
(13, 100, 0),
(14, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(4, 'Romantic', 1, '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(5, 'Technology', 1, '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(6, 'Science', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:37'),
(7, 'Management', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:35'),
(8, 'General', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:40'),
(9, 'Programming', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaint`
--

CREATE TABLE `tblcomplaint` (
  `sno` int(5) NOT NULL,
  `collegeid` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `MESSAGE` varchar(500) DEFAULT NULL,
  `COMPLAINT_DATE` datetime DEFAULT NULL,
  `COMPLAINT_STATUS` varchar(10) DEFAULT 'PENDING',
  `RESOLVEMESSAGE` varchar(200) DEFAULT '',
  `RESOLVE_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomplaint`
--

INSERT INTO `tblcomplaint` (`sno`, `collegeid`, `subject`, `MESSAGE`, `COMPLAINT_DATE`, `COMPLAINT_STATUS`, `RESOLVEMESSAGE`, `RESOLVE_DATE`) VALUES
(13, '0205CSE042', 'Book request', 'book is not requested', '2022-12-04 01:26:13', 'RESOLVED', 'Now we can request book properly', '2022-12-06 17:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `SNO` int(5) NOT NULL,
  `NAME` varchar(20) DEFAULT NULL,
  `USERId` varchar(15) DEFAULT NULL,
  `EMAILID` varchar(40) DEFAULT NULL,
  `MOBILE` bigint(13) DEFAULT NULL,
  `MESSAGE` varchar(500) DEFAULT NULL,
  `DATE_OF_FEEDBACK` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedbackg`
--

CREATE TABLE `tblfeedbackg` (
  `S no.` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone No` int(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` varchar(200) NOT NULL,
  `Date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbook`
--

CREATE TABLE `tblissuedbook` (
  `sno` int(5) NOT NULL,
  `collegeId` varchar(20) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `mailid` varchar(40) DEFAULT NULL,
  `category` int(6) UNSIGNED DEFAULT NULL,
  `author` int(6) UNSIGNED DEFAULT NULL,
  `book` int(6) UNSIGNED DEFAULT NULL,
  `otp` varchar(15) DEFAULT NULL,
  `issuedDate` datetime DEFAULT NULL,
  `returndate` datetime DEFAULT NULL,
  `fine` int(4) DEFAULT 0,
  `remarks` varchar(20) DEFAULT NULL,
  `actualreturndate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblissuedbook`
--

INSERT INTO `tblissuedbook` (`sno`, `collegeId`, `name`, `mailid`, `category`, `author`, `book`, `otp`, `issuedDate`, `returndate`, `fine`, `remarks`, `actualreturndate`) VALUES
(6, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 5, 1, 1, '551503', '2022-12-03 23:25:40', '2022-12-13 23:25:40', 0, 'RETURNED', '2022-12-03 23:38:23'),
(7, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 5, 16, 12, '202539', '2022-12-03 23:41:19', '2022-12-13 23:41:19', 110, 'RETURNED', '2022-12-24 23:42:08'),
(8, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 8, 13, 9, '320321', '2022-12-04 00:19:51', '2022-12-14 00:19:51', 0, 'RETURNED', '2022-12-04 01:54:06'),
(9, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 8, 13, 9, '902536', '2022-12-04 01:10:30', '2022-12-14 01:10:30', 0, 'ISSUED', NULL),
(10, '0205CSE024', 'Lovely', 'lovely@vgi.ac.in', 8, 13, 9, '123480', '2022-12-04 01:52:35', '2022-12-14 01:52:35', 0, 'ISSUED', NULL),
(11, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 8, 13, 9, '779837', '2022-12-04 20:12:23', '2022-12-14 20:12:23', 0, 'ISSUED', NULL),
(12, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 8, 13, 9, '867901', '2022-12-04 20:25:30', '2022-12-14 20:25:30', 0, 'ISSUED', NULL),
(13, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 5, 1, 5, '484313', '2022-12-04 23:47:05', '2022-12-14 23:47:05', 0, 'ISSUED', NULL),
(14, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 5, 16, 12, '279597', '2022-12-04 23:50:32', '2022-12-14 23:50:32', 0, 'ISSUED', NULL),
(15, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 8, 13, 9, '424410', '2022-12-04 23:53:45', '2022-12-14 23:53:45', 0, 'ISSUED', NULL),
(16, '0205CSE042', 'Abhishek', 'abhishek@gmail.com', 8, 13, 9, '486731', '2022-12-04 23:56:14', '2022-12-14 23:56:14', 0, 'RETURNED', '2022-12-05 00:32:55'),
(17, '0205CSE042', 'Abhishek', 'abhishekgupta9640@gmail.com', 8, 13, 9, '376714', '2022-12-05 00:05:14', '2022-12-15 00:05:14', 0, 'RETURNED', '2022-12-05 00:32:52'),
(18, '0205CSE024', 'Lovely', 'lovelydager51@vgi.ac.in', 8, 13, 9, '715984', '2022-12-05 13:22:20', '2022-12-15 13:22:20', 0, 'ISSUED', NULL),
(19, '0205cse020', 'Atul kumar', 'yadavatul0404@gamil.com', 8, 13, 9, '229971', '2022-12-05 13:24:36', '2022-12-15 13:24:36', 0, 'ISSUED', NULL),
(20, '0205CSE042', 'Abhishek', 'abhishekgupta9640@gmail.com', 8, 13, 9, '972929', '2022-12-05 13:26:08', '2022-12-15 13:26:08', 0, 'RETURNED', '2022-12-05 20:24:11'),
(21, '0205CSE020', 'Atul kumar', 'abhishek.nature22@gamil.com', 8, 13, 9, '672971', '2022-12-05 13:30:01', '2022-12-15 13:30:01', 0, 'RETURNED', '2022-12-05 20:24:17'),
(22, '0205CSE020', 'Atul kumar', 'lovelydager51@gmail.com', 8, 13, 9, '509984', '2022-12-05 14:44:21', '2022-12-15 14:44:21', 0, 'RETURNED', '2022-12-05 22:26:32'),
(23, '0205CSE020', 'Atul kumar', 'aniket2072003@gmail.com', 8, 13, 9, '637480', '2022-12-05 14:45:21', '2022-12-15 14:45:21', 0, 'RETURNED', '2022-12-05 22:26:41'),
(24, '0205CSe024', 'Lovely', 'lovelydager51@gmail.com', 9, 11, 11, '109062', '2022-12-06 01:07:12', '2022-12-16 01:07:12', 0, 'ISSUED', NULL),
(25, '0205CSE042', 'Abhishek', 'aniket2072003@gmail.com', 8, 13, 9, '692434', '2022-12-06 01:17:03', '2022-12-16 01:17:03', 0, 'ISSUED', NULL),
(26, '0205CSE042', 'Abhishek', 'aniket2072003@gmail.com', 8, 13, 9, '703475', '2022-12-06 01:18:41', '2022-12-16 01:18:41', 0, 'ISSUED', NULL),
(27, '0205CSE042', 'Abhishek', 'abhishekgupta9640@gmail.com', 8, 13, 9, '244819', '2022-12-06 01:19:26', '2022-12-16 01:19:26', 0, 'ISSUED', NULL),
(28, '0205CSE042', 'Abhishek', 'abhishekgupta9640@gmail.com', 8, 13, 9, '846161', '2022-12-06 01:21:06', '2022-12-16 01:21:06', 0, 'ISSUED', NULL),
(29, '0205CSE042', 'Abhishek', 'chakshugupta286@gmail.com', 5, 16, 12, '424898', '2022-12-06 13:01:02', '2022-12-16 13:01:02', 0, 'ISSUED', NULL),
(30, '0205CSE042', 'Abhishek', 'aniket2072003@gmail.com', 8, 13, 9, '437947', '2022-12-06 13:14:10', '2022-12-16 13:14:10', 0, 'ISSUED', NULL),
(31, '0205CSE042', 'Abhishek', 'chakshugupta286@gmail.com', 8, 13, 9, '321177', '2022-12-06 13:15:26', '2022-12-16 13:15:26', 0, 'ISSUED', NULL),
(32, '0205cse99', 'Rashmi Bhardwaj', 'rashmibhardwaj754@gmail.com', 8, 13, 9, '682433', '2022-12-06 13:27:34', '2022-12-16 13:27:34', 0, 'ISSUED', NULL),
(33, '0205CSE042', 'Abhishek', 'abhishekgupta9640@gmail.com', 8, 13, 9, '429575', '2022-12-06 17:49:55', '2022-12-16 17:49:55', 0, 'ISSUED', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `collegeid` varchar(50) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `collegeid`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(15, NULL, '0205CSE016', '2022-11-20 05:52:45', NULL, NULL, NULL),
(16, NULL, '0205CSE019', '2022-11-20 10:05:38', NULL, NULL, NULL),
(17, NULL, '0205CSE042', '2022-11-24 20:58:40', NULL, NULL, NULL),
(18, 7, '0205CSE042', '2022-11-25 07:27:03', NULL, NULL, NULL),
(19, 6, '0205CSE011', '2022-11-25 18:41:45', NULL, NULL, NULL),
(20, NULL, 'VGI001', '2022-11-26 05:14:23', NULL, NULL, NULL),
(21, 11, 'VGI001', '2022-11-26 09:13:24', NULL, NULL, NULL),
(22, NULL, 'VGI001', '2022-11-26 09:26:23', NULL, NULL, NULL),
(23, NULL, 'VGI001', '2022-11-26 09:36:18', NULL, NULL, NULL),
(24, 12, 'VGI001', '2022-12-02 07:01:50', NULL, NULL, NULL),
(25, NULL, 'VGI001', '2022-12-02 09:42:09', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `collegeid` varchar(11) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `wmode` varchar(20) NOT NULL DEFAULT 'user',
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `FullName`, `collegeid`, `EmailId`, `MobileNumber`, `Password`, `wmode`, `Status`, `RegDate`, `UpdationDate`) VALUES
(21, 'Aniket', 'VGI001', 'vgionlinelibrary@gmail.com', '9304856287', 'vietji', 'admin', 1, '2022-11-20 14:09:05', '2022-12-06 17:00:02'),
(23, 'Aniket Srivastava', '0205CSE016', 'aniket2072003@gmail.com', '9304856298', 'ANIKET', 'user', 1, '2022-11-20 19:47:42', '2022-12-06 17:00:21'),
(24, 'Abhishek', '0205CSE042', 'abhishekgupta9640@gmail.com', '7004342781', 'abhiji', 'user', 1, '2022-11-22 20:38:15', '2022-12-05 09:17:21'),
(29, 'Atul kumar', '0205CSE020', 'yadavatul0404@gmail.com', '8800591859', 'atul', 'user', 1, '2022-12-05 07:53:56', '2022-12-05 09:16:37'),
(30, 'Lovely', '0205CSE024', 'lovelydager51@gmail.com', '07004342781', 'lov', 'user', 1, '2022-12-05 17:22:32', NULL),
(34, 'Rashmi Bhardwaj', '0205cse99', 'rashmibhardwaj754@gmail.com', '9876543217', '123', 'user', 1, '2022-12-06 07:53:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbookrequest`
--
ALTER TABLE `tblbookrequest`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbookstocks`
--
ALTER TABLE `tblbookstocks`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaint`
--
ALTER TABLE `tblcomplaint`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `tblissuedbook`
--
ALTER TABLE `tblissuedbook`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collegeid` (`collegeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblbookrequest`
--
ALTER TABLE `tblbookrequest`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblbookstocks`
--
ALTER TABLE `tblbookstocks`
  MODIFY `bookid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcomplaint`
--
ALTER TABLE `tblcomplaint`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `SNO` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblissuedbook`
--
ALTER TABLE `tblissuedbook`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
