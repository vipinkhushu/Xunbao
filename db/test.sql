-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2016 at 11:49 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(200) NOT NULL,
  `questionstatement` varchar(9999) NOT NULL,
  `answer` mediumtext NOT NULL,
  `level` varchar(9999) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `questionstatement`, `answer`, `level`, `time_stamp`) VALUES
(8, '<p>Do you know the recent news?</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Romeo + Juliet were in Marvin&#39;s Room near The Beach.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Inception of unknown made them The Departed.</p>\r\n', 'oscar', '1', '2016-03-02 16:39:47'),
(9, '<p><img alt="Loading Pic..." src="assets/images/Photo3.jpg" style="height:194px; width:259px" />&nbsp;<img alt="Loading" src="assets/images/Photo4.jpg" style="height:181px; width:278px" /></p>\n', 'walt disney', '2', '2016-03-05 11:45:47'),
(10, '<p>The answer is elementsculmyca.com</p>\r\n', '104.27.160.108', '3', '2016-03-02 18:57:24'),
(11, '<p>&quot;Babumoshai mere Fans mujhse koi nahi chheen sakta&quot;.&nbsp;</p>\r\n\r\n<p><img alt="" src="assets/images/Photo9.jpe" style="height:260px; width:194px" /></p>\r\n\r\n<p>&nbsp;&nbsp; &quot;SHOCK LAGA LAGA LAGA SHOCK LAGA&quot;. The FIRST superstar</p>\r\n', 'haveli ram gupta', '4', '2016-03-02 16:50:22'),
(12, '<p>10&nbsp; 0. 0 101 . 1 100 1001 1000 will mark the end of your hunt, and a 5-letter treasure you will find.</p>\r\n', 'india', '5', '2016-03-04 09:40:26'),
(13, '<p><img alt="" src="assets/images/Photo8.jpg" style="height:445px; width:331px" /></p>\n\n<p>Uncle Sam Needs You</p>\n', 'na', '6', '2016-03-05 11:46:37'),
(14, '<p><img alt="" src="assets/images/Photo7.jpg" /></p>\r\n\r\n<p>The one who came after.</p>\r\n', 'danzo shimura', '7', '2016-03-03 19:26:04'),
(15, '<p><img alt="" src="assets/images/Photo1.jpeg" style="height:150px; width:150px" /></p>\n\n<p>I am Lord Baelish,a self made man.I&#39;d warn you not to trust me. ;)</p>\n\n<p>I have a lot to say about chaos.You cool people, your climb is on the modern version.</p>\n', 'escalator', '8', '2016-03-05 12:04:25'),
(16, '<p><img alt="" src="assets/images/Photo2.jpe" style="height:225px; width:225px" /></p>\r\n\r\n<p>Sad to hear organising is an easy task &lt;/3.THORN is a direction, HEAT is an emotion , and HEART is ?</p>\r\n', 'planet', '9', '2016-03-02 16:56:15'),
(18, '<p><img alt="" src="assets/images/Photo5.jpg" style="height:225px; width:300px" /></p>\r\n\r\n<p>Caption : Wish we all had one.:P</p>\r\n', 'freedom 251', '10', '2016-03-03 19:24:20'),
(19, '<p>After a while,I opted for names of alphabetically ordered desserts.You probably know by now what I am.Offer me a chocolate and go to next step.</p>\r\n', 'kitkat', '11', '2016-03-02 17:03:47'),
(20, '<p>&quot;It&#39;s all in the words, people always speak less, its time you speak complete&quot;.</p>\n\n<p>This may help you .&nbsp;</p>\n\n<p>&quot;Your money is yours unless you got what you asked for&quot;.</p>\n', 'paytm', '12', '2016-03-05 11:46:00'),
(21, '<p>&nbsp;The Future Resides There! You can enjoy music too</p>\n', 'tomorrowland', '13', '2016-03-05 17:58:09'),
(22, '<p><img alt="" src="assets/images/Photo6.jpg" style="height:199px; width:300px" /></p>\n\n<p>&nbsp;Do you know what protects us ?</p>\n', 'bulletproof ideas', '14', '2016-03-05 17:58:29'),
(23, '<p>She Threatened People by sending envelope ! What was so threatning in that<br/><img alt="" src="assets/images/Photo10.jpg" style="height:274px; width:234px" /></p>\n', 'orange pips', '15', '2016-03-05 17:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(255) NOT NULL,
  `user` varchar(300) NOT NULL,
  `level` varchar(9999) NOT NULL,
  `answer` varchar(9999) NOT NULL,
  `time_stamp` varchar(300) NOT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(55) NOT NULL,
  `Fuid` varchar(300) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `fblink` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `dp` varchar(800) NOT NULL,
  `level` int(255) NOT NULL DEFAULT '0',
  `lastlogin` varchar(300) NOT NULL,
  `lastSubmission` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `registrationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `referal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13047;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
