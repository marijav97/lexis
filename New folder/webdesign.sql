-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 12:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `idCourse` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`idCourse`, `name`, `src`, `link`) VALUES
(1, 'HTML Basics', 'html.jpg', 'html-basic.pdf'),
(2, 'HTML For Professionals', 'htmlPro.jpg', 'html5-for-professionals.pdf'),
(3, 'Creating Web Pages', 'xhtml.jpg', 'creating-web-pages.pdf'),
(4, 'CSS Basics', 'css.jpg', 'basic-css.pdf'),
(5, 'CSS Crash Course', 'css3.jpg', 'css-crash-course.pdf'),
(6, 'CSS For Professionals', 'all.jpg', 'css-for-professionals.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `menuLink` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menuText` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `menuLink`, `menuText`, `flag`) VALUES
(1, '#services', 'Services', 1),
(2, '#teams', 'Our Team', 1),
(3, 'works.php', 'Our Work', 2),
(4, 'contact.php', 'Contact', 2),
(5, 'course.php', 'Course', 3),
(6, 'admin.php', 'Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ourteam`
--

CREATE TABLE `ourteam` (
  `idTeam` int(11) NOT NULL,
  `fullName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ourteam`
--

INSERT INTO `ourteam` (`idTeam`, `fullName`, `position`, `description`, `image`) VALUES
(1, 'Lisa Brown', 'The Mastermind', 'Really, she is The Mastermind.', 'team-1.jpg'),
(2, 'Johnathan Deo', 'Creative Head', '\"Design is so simple, that\'s why is so complicated.\"', 'team-2.jpg'),
(3, 'Mike Collins', 'Technical Lead', 'The responsible one.', 'team-3.jpg'),
(4, 'Rita Rose', 'Marketing Head', '\"You don\'t have to do it all by yourself.\"', 'team-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `roleName` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `roleName`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `firstName`, `lastName`, `username`, `email`, `password`, `idRole`) VALUES
(1, 'Marija', 'Vasić', 'marijavasic', 'marijavasic97@gmail.com', 'marija123', 1),
(2, 'Anja', 'Zubac', 'anjazubac', 'anjazubac@yahoo.com', 'anja97', 2),
(3, 'Katarina', 'Raić', 'katarinar', 'katarina@gmail.com ', 'kaca456', 2),
(4, 'Vesna', 'Živanović', 'vesnaz', 'vesnazivanovic@gmail.com', 'vesnaz7', 2),
(19, 'Aleksandar', 'Pekurar', 'aca11', 'aleksandarpekurar@gmail.com', 'acakaca', 2),
(20, 'Milos', 'Radulj', 'raduljm', 'milosradulj4@gmail.com', 'milos01', 2),
(23, 'David', 'Pejicic', 'david9', 'davidp@gmail.com', 'david', 2);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `idWork` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`idWork`, `name`, `description`, `image`) VALUES
(1, 'TV Live', 'TV live Graphic Design', 'images/tv.jpg'),
(2, 'Senior Designer', 'Senior Designer Graphic Design', 'images/designer.jpg'),
(3, 'Ideas', 'Ideas For Life Graphic Design', 'images/ideas.jpg'),
(4, 'LosYork', 'LosYork Graphic Design', 'images/losyork.jpg'),
(5, 'Portfolio', 'Portfolio Website Design', 'images/portfolio.jpg'),
(6, 'Protect Asia', 'Protect Asia Website Design', 'images/protect.jpg'),
(7, 'SpaceM', 'SpaceM Website Design', 'images/spacem.jpg'),
(15, 'Cafe', 'Cafe Website Design', 'images/cafe.jpg'),
(39, 'Mug', 'Mug Graphic Design', 'images/1555779425work-6.jpg'),
(40, 'Bag Graphic', 'Paper Bag Graphic Design', 'images/1555779621work-2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idCourse`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `ourteam`
--
ALTER TABLE `ourteam`
  ADD PRIMARY KEY (`idTeam`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRole` (`idRole`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`idWork`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `idCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ourteam`
--
ALTER TABLE `ourteam`
  MODIFY `idTeam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `idWork` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
