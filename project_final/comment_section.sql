-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 04:07 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment_section`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` varchar(130) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `date`, `message`) VALUES
(199, '53', '2020-05-20 07:37:03', 'EDUCATION IS A BACKBONE..\r\nEducation is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. The wealth of knowledge acquired by an individual after studying particular subject matters or experiencing life lessons that provide an understanding of something. Education requires instruction of some sort from an individual or composed literature. The most common forms of education result from years of schooling that incorporates studies of a variety of subjects. The function of education is to teach one to think intensively and to think critically. Intelligence plus character â€“ that is the goal of true education. The goal of education is not to increase the amount of knowledge but to create the possibilities for a child to invent and discover, to create men who are capable of doing new things. It is the most powerful weapon which we can use to change the world.\r\nlet me know about from you...?'),
(200, '49', '2020-05-20 07:54:17', 'What is a paragraph?\r\nParagraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes a paragraph. A paragraph is defined as â€œa group of sentences or a single sentence that forms a unitâ€ (Lunsford and Connors 116). Length and appearance do not determine whether a section in a paper is a paragraph. For instance, in some styles of writing, particularly journalistic styles, a paragraph can be just one sentence long. Ultimately, a paragraph is a sentence or group of sentences that support one main idea. In this handout, we will refer to this as the â€œcontrolling idea,â€ because it controls what happens in the rest of the paragraph.'),
(201, '53', '2020-05-20 08:03:42', 'post a post to ');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `pid` int(11) NOT NULL,
  `userid` int(8) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`pid`, `userid`, `status`) VALUES
(1, 6, 0),
(2, 1, 0),
(3, 2, 1),
(4, 7, 1),
(5, 8, 1),
(6, 8, 1),
(7, 9, 1),
(8, 10, 1),
(9, 11, 1),
(10, 11, 1),
(11, 12, 1),
(12, 11, 1),
(13, 12, 1),
(14, 13, 1),
(15, 14, 1),
(16, 14, 1),
(17, 15, 1),
(18, 16, 1),
(19, 17, 1),
(20, 18, 1),
(21, 30, 0),
(22, 31, 1),
(23, 37, 0),
(24, 39, 1),
(25, 40, 1),
(26, 41, 1),
(27, 42, 1),
(28, 43, 1),
(29, 44, 1),
(30, 45, 1),
(31, 44, 1),
(32, 46, 1),
(33, 44, 1),
(34, 46, 1),
(35, 47, 1),
(36, 41, 1),
(37, 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `rid` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `cid` int(8) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`rid`, `uid`, `cid`, `date`, `message`) VALUES
(67, 1, 170, '2020-04-28 21:05:03', 'my reply to your post\r\n     '),
(68, 1, 171, '2020-04-28 21:05:18', 'always the paragraph\r\n     '),
(86, 1, 188, '2020-05-04 01:06:42', 'good'),
(90, 1, 194, '2020-05-09 03:20:30', 'good the boss'),
(94, 1, 195, '2020-05-12 01:40:21', 'hello'),
(102, 36, 196, '2020-05-17 18:14:38', 'ouk'),
(106, 1, 198, '2020-05-20 00:19:37', 'very good'),
(107, 56, 199, '2020-05-20 07:41:47', 'well said man. you are right.'),
(109, 49, 199, '2020-05-20 07:56:22', 'i agree.'),
(110, 56, 200, '2020-05-20 07:58:38', 'where is teddy?? :('),
(111, 53, 199, '2020-05-20 07:59:29', 'thank you so much. its such an honor :)'),
(112, 53, 200, '2020-05-20 08:02:08', 'dont be sad user1 .. he is under your pillow! be happy :)'),
(113, 49, 201, '2020-05-20 08:05:39', 'why?');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `mobile` int(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `dob` varchar(128) NOT NULL,
  `gender` varchar(64) NOT NULL,
  `department` varchar(64) NOT NULL,
  `designation` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uid`, `pass`, `firstname`, `lastname`, `mobile`, `email`, `dob`, `gender`, `department`, `designation`) VALUES
(1, 'mugu', '1234', 'mugus', 'rahman', 1724053196, '  mr.mugudho@gmail.com  ', '25-11-1998', 'male', 'CSE', 'admin'),
(29, 'mugdho', '1234', 'mahmudur', 'rahman', 1724053196, 'mr.mugdho@gmail.com', '5-9-1919', 'Male', 'CSE', 'admin'),
(36, 'wewew', '12345678', 'mahmudur', 'cx', 1724053196, 'mr.mugdho@gmail.com', '18-11-1926', 'Male', 'Other', 'member'),
(41, 'theBoss', '12345678', 'sdsd', 'rahman', 1724053196, 'mr.mugdho@gmail.com', '19-1-1922', 'Male', 'EEE', 'member'),
(48, 'user_man', '123456789', 'sdsd', 's', 1724053196, 'mr.mugdho@gmail.com', '17-1-1925', 'Male', 'EEs', 'member'),
(49, 'moderator1', '1234', 'Mr. ', 'Moderator', 1724053196, 'x@m.c', '21-3-1971', 'Male', 'CSE', 'moderator'),
(50, 'mahmudur', '1234', 'Md. Mahmudur', 'rahman', 1724053196, 'mr.mugdho@gmail.com', '21-4-1926', 'Male', 'EEE', 'moderator'),
(51, 'sajid', '1234', 'Sajid', 'khan', 2147483647, 'dff@fd.com', '30-9-1925', 'Male', 'BBA', 'moderator'),
(52, 'ishfi', '1234', 'ishfiaq', 'choudhuri', 2147483647, 'louis.fira@gmail.com', '18-2-2016', 'Male', 'CSE', 'moderator'),
(53, 'admin', '1234', 'Mr. ', 'Admin', 1731955482, 'admin@hotmail.com', '18-1-1926', 'Female', 'CSE', 'admin'),
(54, 'saji', '12345', 'sajid ', 'islam', 2147483647, 'dff@fd.com', '30-1-1962', 'Male', 'Other', 'admin'),
(55, 'ishfiaq', '1234', 'ishfi', 'aqqq', 2147483647, 'x@m.c', '21-11-1959', 'Male', 'BBA', 'admin'),
(56, 'user1', '1234', 'Mr. ', 'user', 1724053196, 'dff@fd.com', '21-2-1926', 'Female', 'EEE', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `rid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
