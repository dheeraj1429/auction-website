-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2022 at 08:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_blog`
--

CREATE TABLE `bnmi_blog` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `cat` varchar(150) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `short_desc` varchar(250) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `meta_desc` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bnmi_blog`
--

INSERT INTO `bnmi_blog` (`id`, `name`, `url`, `cat`, `img`, `short_desc`, `desc`, `post_date`, `meta_title`, `meta_keyword`, `meta_desc`, `status`) VALUES
(4, 'This is a test2', '/test', '20', '', 'This is a test', '&lt;p&gt;This is a test&lt;/p&gt;\r\n', '2022-01-03 00:00:00', 'This is a test', 'This is a test', 'This is a test', 1),
(5, 'this is a test', '/test2', '21', './media/img/blog/61d2a8c74e9705.56806589.jpeg', 'This nis a test', '&lt;p&gt;This nis a test&lt;/p&gt;\r\n', '2022-01-03 00:00:00', 'This nis a test', 'This nis a test', 'This nis a test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_category`
--

CREATE TABLE `bnmi_category` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 2,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bnmi_category`
--

INSERT INTO `bnmi_category` (`id`, `name`, `status`, `date_time`) VALUES
(7, 'good day1', 1, '2022-01-01 00:00:00'),
(8, 'test1', 1, '2022-01-01 00:00:00'),
(20, 'google', 2, '2022-01-03 00:00:00'),
(21, 'test', 2, '2022-01-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_cms_pages`
--

CREATE TABLE `bnmi_cms_pages` (
  `id` int(10) NOT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `img` varchar(300) DEFAULT 'default.jpg',
  `desc` text DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '0=delete, 1=inactive, 2=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_general`
--

CREATE TABLE `bnmi_general` (
  `id` int(100) NOT NULL,
  `key_name` varchar(255) NOT NULL,
  `key_value` text NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bnmi_general`
--

INSERT INTO `bnmi_general` (`id`, `key_name`, `key_value`, `status`) VALUES
(1, 'logo', 'logo.png', 2),
(2, 'favicon', 'favicon.png', 2),
(3, 'facebook', 'https://www.facebook.com/aditya.kundra.5', 2),
(4, 'linkedin', 'https://www.linkedin.com/company/adi.kundra', 2),
(5, 'twitter', 'https://www.twitter.com/in/adityakundra', 2),
(6, 'youtube', 'https://www.youtube.com/auralawgic', 2),
(7, 'instagram', 'https://www.instagram.com/adi.kundra', 2),
(10, 'website_name', 'Aditya Kundra', 2),
(11, 'phone_number', '7011429667', 2),
(12, 'email', 'info@adityakundra.com', 2),
(14, 'desc', '', 2),
(15, 'meta_title', 'Auralawgic', 2),
(16, 'meta_desc', 'Auralawgic', 2),
(17, 'meta_head', '', 2),
(18, 'meta_body', '', 2),
(19, 'header_bg', '#c9b38c ', 2),
(20, 'header_text', '#ffffff', 2),
(21, 'btn_bg', '#c9b38c ', 2),
(22, 'btn_text', '#ffffff', 2),
(26, 'maps', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13998.564143122005!2d77.2773484!3d28.7003827!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe63184f23b0716ee!2sProfshineTech.com%20%7C%20Website%20Design%20%26%20Digital%20Marketing%20Company%20in%20Yamuna%20Vihar%2C%20Delhi%20-%20India!5e0!3m2!1sen!2sin!4v1577947675167!5m2!1sen!2sin', 2),
(27, 'mailer_email', 'noreply@adityakundra.com', 2),
(29, 'footer-about', '&lt;p&gt;Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nuncIt showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy&lt;/p&gt;\r\n', 2),
(101, 'html', '100', 2),
(102, 'css', '60', 2),
(103, 'bootstrap', '40', 2),
(104, 'php', '70', 2),
(501, 'privacy', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!&lt;/p&gt;\r\n', 2),
(502, 'terms', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!&lt;/p&gt;\r\n', 2),
(503, 'address', 'Delhi,India', 2),
(504, 'resume', 'resume.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contact`, `address`, `role`, `token`) VALUES
(1, 'uday', 'udaylal014@gmail.com', '0fa47f59171ffcab72cdfeca4e1e67fe2c7026d2a0eae44e768cbbb97944b768c2ac5373f5cecc011017ac5a1314fd01e4e0674c9f34bc3c084e6d95dce83387', '8375085291', 'B-33 kiran garden uttam nager new delhi - 110059', 'superadmin', '1ZHkmya9DZo3L0frDf4f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bnmi_blog`
--
ALTER TABLE `bnmi_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_category`
--
ALTER TABLE `bnmi_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_cms_pages`
--
ALTER TABLE `bnmi_cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_general`
--
ALTER TABLE `bnmi_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bnmi_blog`
--
ALTER TABLE `bnmi_blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bnmi_category`
--
ALTER TABLE `bnmi_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bnmi_cms_pages`
--
ALTER TABLE `bnmi_cms_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bnmi_general`
--
ALTER TABLE `bnmi_general`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
