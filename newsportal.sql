-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 02:06 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `offadmin`
--

CREATE TABLE `offadmin` (
  `admin_id` int(11) UNSIGNED NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offadmin`
--

INSERT INTO `offadmin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin@gmail.com', '$2y$10$3G7iIjaXdbCQh4LHEY/qH.ID47t41.7ZPaC/zlAcdaQck1zOAx1BK');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`) VALUES
(11, 'Joe Joseph', '$2y$10$UWbjZ4cc8BesFdlXPVOiR.5DStGdvBqPJKBNEGAPFlPxRQVHxwHbC', 'joejoseph481@gmail.com', 1),
(13, 'Jeswin Antony', '$2y$10$LbXFsm8PN2fG8qrO7YW9Me/I/6tgElm3h6AGUcffMzgl3y4MU6mwS', 'jesanto28@gmail.com', 1),
(14, 'Diya Grace', '$2y$10$3G7iIjaXdbCQh4LHEY/qH.ID47t41.7ZPaC/zlAcdaQck1zOAx1BK', 'diya@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(2, 'Bollywood', 'Bollywood News', '2018-06-06 10:28:09', '2018-06-30 18:41:07', 1),
(3, 'Sports', 'Related to sports news', '2018-06-06 10:35:09', '2018-06-14 11:11:55', 1),
(5, 'Entertainment', 'Entertainment related  News', '2018-06-14 05:32:58', '2018-06-14 05:33:41', 1),
(6, 'Politics', 'Politics', '2018-06-22 15:46:09', '0000-00-00 00:00:00', 1),
(7, 'Business', 'Business', '2018-06-22 15:46:22', '0000-00-00 00:00:00', 1),
(8, 'Breaking News', 'Breaking News Each Hour', '2021-01-30 04:34:44', NULL, 1),
(9, 'Market', 'Live Stock Market NEws', '2021-04-16 06:03:05', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(6, '13', 'joe joseph', 'joejoseph@gmail.com', 'Ronaldo Foreva', '2021-03-24 06:33:28', 1),
(8, '19', 'joe joseph', 'joejoseph1@gmail.com', ' this is a comment', '2021-04-29 03:24:08', 1),
(9, '15', 'Joe Joseph', 'joejoseph@gmail.com', ' this is comment', '2021-04-29 05:20:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About NewsOn ', '', '2018-06-30 18:01:03', '2021-04-29 03:25:43'),
(2, 'contactus', 'Contact Details', '<p><b>NEWS ON&nbsp;</b></p><p>Kanjirappally,</p><p>Kottayam, Kerala</p><p>Email: newson@newson.in</p>', '2018-06-30 18:01:36', '2021-06-01 10:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(13, 'Ronaldo - Player Of the Decade!', 3, 5, '<p><span style=\"font-family: &quot;Droid Serif&quot;, serif; font-size: 16px;\">The 35-year-old, who won five Champions League titles, three Premier Leagues with Manchester United and two LaLiga titles with Real Madrid and as well as the Nations League with Portugal, was deemed to be the best player between 2001 and 2020 by votes from fans around the world and a jury of 25 including players and former coaches.&nbsp;</span><br></p>', '2021-01-30 04:28:16', NULL, 1, 'Ronaldo---Player-Of-the-Decade!', '0a0336cb8fdd5185c29e8ca2b72e4b27.jpg'),
(14, 'Economic Survey pegs FY22 GDP growth at 11%', 7, 9, '<p><span style=\"color: rgb(66, 66, 66); font-family: &quot;PT Serif&quot;, serif; font-size: 16px;\">The Economic Survey 2021-22 projected a growth of 11% for the Indian economy, a V-shaped recovery in growth, on the back of the Covid-19 vaccination drive and a recovery in consumption, even as it emphasised the importance of the government continuing to increase its spending and called for an asset quality review across Indian banks.</span><br></p>', '2021-01-30 04:45:18', '2021-01-30 05:04:00', 1, 'Economic-Survey-pegs-FY22-GDP-growth-at-11%', 'e256353ff2135ce36b2e6a78ddf641f2.jpg'),
(15, 'P Chidambaram takes swipe at govt over Economic Survey  ', 6, 7, '<p><span style=\"font-family: Montserrat, sans-serif; font-size: 12px;\">NEW DELHI: Congress leader P Chidambaram on Friday took a swipe at the government, saying the purpose of the Economic Survey is not clear as it aids the self-congratulatory conclusion that the Modi dispensation implemented \"far sighted policy response for economic recovery\".</span><br style=\"background: transparent; font-size: 12px; margin: 0px; outline-style: initial; outline-width: 0px; padding: 0px; vertical-align: baseline; font-family: Montserrat, sans-serif;\"></p><span style=\"font-family: Montserrat, sans-serif; font-size: 12px;\">The former Union finance minister took to Twitter to say that the \"best decision\" taken by the government is the decision not to print the economic survey.</span><br style=\"background: transparent; font-size: 12px; margin: 0px; outline-style: initial; outline-width: 0px; padding: 0px; vertical-align: baseline; font-family: Montserrat, sans-serif;\"><br style=\"background: transparent; font-size: 12px; margin: 0px; outline-style: initial; outline-width: 0px; padding: 0px; vertical-align: baseline; font-family: Montserrat, sans-serif;\"><span style=\"font-family: Montserrat, sans-serif; font-size: 12px;\">\"Once upon a time, the Survey was the vehicle to communicate to the people in simple language the state of the economy and the prospects in the coming year. Now, the Survey has apparently a different purpose, although the purpose is not clear,\" he said in a tweet</span><br style=\"background: transparent; font-size: 12px; margin: 0px; outline-style: initial; outline-width: 0px; padding: 0px; vertical-align: baseline; font-family: Montserrat, sans-serif;\"><br style=\"background: transparent; font-size: 12px; margin: 0px; outline-style: initial; outline-width: 0px; padding: 0px; vertical-align: baseline; font-family: Montserrat, sans-serif;\"><div style=\"background: transparent; font-size: 12px; margin: 0px; outline-style: initial; outline-width: 0px; padding: 0px; vertical-align: baseline; font-family: arial;\">Read more at:<br style=\"background: transparent; margin: 0px; outline-style: initial; outline-width: 0px; padding: 0px; vertical-align: baseline;\"><span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; outline-style: initial;\">https://economictimes.indiatimes.com/news/politics-and-nation/p-chidambaram-takes-swipe-at-govt-over-economic-survey/articleshow/80596556.cms?utm_source=contentofinterest&amp;utm_medium=text&amp;utm_campaign=cppst</span></div>', '2021-01-30 04:50:59', '2021-01-30 05:02:41', 1, 'P-Chidambaram-takes-swipe-at-govt-over-Economic-Survey--', 'e5a6d9963b378b0b0dfcdacef24fc3e0.jpg'),
(16, 'Man who attacked cops with a sword arrested', 8, 10, '<p>New Delhi: The police have arrested 44 people, including the man who attacked a police officer on Friday with a sword during the clash at singhu border between delhi and Haryana</p>', '2021-01-30 04:54:30', '2021-01-30 05:00:43', 1, 'Man-who-attacked-cops-with-a-sword-arrested', '95a49f92f0ac25e886a69f19c02d63da.jpg'),
(17, 'World Tour Finals: PV Sindhu Finishes Campaign With Win Over Chochuwong Pornpawee', 3, 11, '<p>hello</p>', '2021-01-30 05:07:03', '2021-01-30 05:10:22', 1, 'World-Tour-Finals:-PV-Sindhu-Finishes-Campaign-With-Win-Over-Chochuwong-Pornpawee', '25c87828e4f304d3a0f93dc949999ead.jpg'),
(18, 'hello', 8, 10, '<p>hello indians</p>', '2021-01-30 10:51:05', NULL, 1, 'hello', '04c55210c31806ec3e534b23508747cd.jpg'),
(19, 'Test Post', 3, 5, '<p>this is news about football</p>', '2021-04-16 06:31:55', NULL, 1, 'Test-Post', 'f06fedc56c6ce51f10c4cf50361ac2be.jpg'),
(20, 'Twenty four news', 8, 10, '<p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/zcrUCvBD16k\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br></p>', '2021-06-02 05:48:07', NULL, 1, 'Twenty-four-news', 'bc44558f544b0d0566cd881105830839.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 5, 'Bollywood ', 'Bollywood masala', '2018-06-22 15:45:38', '0000-00-00 00:00:00', 1),
(4, 3, 'Cricket', 'Cricket\r\n\r\n', '2018-06-30 09:00:43', '0000-00-00 00:00:00', 1),
(5, 3, 'Football', 'Football', '2018-06-30 09:00:58', '0000-00-00 00:00:00', 1),
(6, 5, 'Television', 'TeleVision', '2018-06-30 18:59:22', '0000-00-00 00:00:00', 1),
(7, 6, 'National', 'National', '2018-06-30 19:04:29', '0000-00-00 00:00:00', 1),
(8, 6, 'International', 'International', '2018-06-30 19:04:43', '0000-00-00 00:00:00', 1),
(9, 7, 'India', 'India', '2018-06-30 19:08:42', '0000-00-00 00:00:00', 1),
(10, 8, 'National', 'National Breaking News', '2021-01-30 04:36:59', NULL, 1),
(11, 3, 'Badminton', 'Badminton News From all over the globe', '2021-01-30 05:05:34', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offadmin`
--
ALTER TABLE `offadmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offadmin`
--
ALTER TABLE `offadmin`
  MODIFY `admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
