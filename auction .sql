-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2022 at 09:52 AM
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
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `starting_price` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `store_price` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `product_name`, `starting_price`, `token`, `capacity`, `store_price`, `product_img`, `date`, `time`) VALUES
(1, 'Iphone', 100, 'vGHeSCiIFi8ee3vRQ8tA', 100, 200, '61d7d69c624de4.22992604.jpeg', '2022-01-10', '10:08:00'),
(2, 'Mac', 200, 'FneONIrofCeEcW7HrgUh', 5, 400, '61d9a8c27573d9.18029855.jpeg', '2022-01-10', '10:10:00'),
(3, 'Airpods', 200, 'ww8k2F1YVir7kQUM7mH1', 5, 2000, '61db1538bb1000.73553166.jpeg', '2022-01-10', '10:10:00'),
(5, 'IMac', 200, 'KGqAXY7JvVSbwvgAg4LF', 10, 1100, '61dfcbd358c302.29555814.png', '2022-01-13', '12:22:00'),
(6, 'MeMac', 300, 'K4rlNN8xNTMxgbSLOSti', 10, 1100, '61dfcc78e5e5f6.25413981.png', '2022-01-13', '12:25:00'),
(7, 'TEst', 10, 'CPg9NmwHXrBHkschHPo3', 10, 19, '61dfd05f5de5c5.57150690.png', '2022-01-13', '12:42:00'),
(8, 'test', 10, 'ErIUmK2V7t7EUszZnRda', 10, 10, '61dfd16d39ce02.92933082.png', '2022-01-13', '12:46:00'),
(9, 'test', 10, 'a6UefE94Qm7KPGtNMCv2', 10, 10, '61dfd4c0e7d7d8.56324304.png', '2022-01-13', '13:00:00'),
(10, 'test', 10, 'jpZjlWsEHRBSm3RcCms2', 10, 10, '61dfda51858d97.99043929.png', '2022-01-13', '13:24:00'),
(11, 'Dell XPS 13', 100, '4v7TLXzws68y7bQlI0VY', 5, 200, '61e00b27f14c02.63867757.jpeg', '2022-01-13', '17:05:00'),
(12, 'IMac', 4, 'znjQ2kBHbSmclxla0I5s', 3, 4, '61e019cc57b7a6.07903142.jpeg', '2022-01-14', '17:56:00'),
(13, 'Bus', 4, 'CFVCZDkplgf1blhSA2qN', 3, 4, '61e01a8e13b223.56674456.jpeg', '2022-01-13', '17:59:00'),
(14, 'Tesal Car', 1, 'N6KZ0pgAVQxV9llT3EEH', 3, 1, '61e01f518c1103.19639430.jpeg', '2022-01-13', '18:19:00');

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
(6, 'testing', '/testing', '21', '61d3c478d94412.15775437.jpeg', 'This is a test', '&lt;p&gt;This is a test&lt;/p&gt;\r\n', '2022-01-04 00:00:00', 'This is a test', 'This is a test', 'This is a test', 1),
(7, 'testing', '/test', '21', '61d3e2b8cab4e7.72458112.jpeg', 'this is a test', '&lt;p&gt;this is a test&lt;/p&gt;\r\n', '2022-01-04 00:00:00', 'this is a test', 'this is a test', 'this is a test', 0),
(8, 'Hello This is a test', '/hello', '20', '61d51c347bcd55.86917253.jpeg', 'This is a test. wihite thaqtq fiblsd nsd;ufsadonfsdhfnd;f.ned. kdmns;jf EUFDUBFKJBKDJBFBufghbbvjdbnfe;hf;sdhfd;sn;bf;sdbf;bd;;fbbds;bd;fbds;fbdsfjbdsd;jbd;jdbdjbjkdfbdjf d\r\n', '&lt;p&gt;This is a test. wihite thaqtq fiblsd nsd;ufsadonfsdhfnd;f.ned. kdmns;jf EUFDUBFKJBKDJBFBufghbbvjdbnfe;hf;sdhfd;sn;bf;sdbf;bd;;fbbds;bd;fbds;fbdsfjbdsd;jbd;jdbdjbjkdfbdjf d&lt;br /&gt;\r\n&lt;strong&gt;bfbfbf;udkjbdddbdkdddbdsadsaj ibnwqsdj;jdbusq&lt;/strong&gt;&lt;/p&gt;\r\n', '2022-01-05 00:00:00', 'test', 'test', 'test', 0),
(9, 'For Smart Auction', '/auction', '20', '61dc0032b602d4.57983526.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;img&quot; src=&quot;https://images.unsplash.com/photo-1593642533144-3d62aa4783ec?ixlib=rb-1.2.1&amp;amp;ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHw%3D&amp;amp;auto=format&amp;amp;fit=crop&amp;amp;w=500&amp;amp;q=60&quot; style=&quot;height:334px; width:500px&quot; /&gt;&lt;/p&gt;\r\n', '2022-01-10 00:00:00', 'title', 'title', 'title', 1);

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
(7, 'good day1', 2, '2022-01-01 00:00:00'),
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

--
-- Dumping data for table `bnmi_cms_pages`
--

INSERT INTO `bnmi_cms_pages` (`id`, `type`, `title`, `img`, `desc`, `date_time`, `status`) VALUES
(33, 1, 'Banner', '61d5661bb03d73.64109554.png', 'Your Awesome Auction Website\r\n', '2022-01-05 00:00:00', 2),
(34, 2, 'Create your account', '61d566882d1982.72324757.png', 'create your account and complete your profile.', '2022-01-05 00:00:00', 2),
(35, 2, 'Connect', '61d566b287bba3.83014058.png', 'connect', '2022-01-05 00:00:00', 2),
(36, 2, 'Participate in the auction', '61d566f0650b40.50411101.png', 'take part in the auctions you are in interested in.', '2022-01-05 00:00:00', 2),
(37, 2, 'Win the auction', '61d5672f4eb4b1.83451161.png', 'win the auction and win a products at less than 30% of its value', '2022-01-05 00:00:00', 2),
(38, 3, 'Register an account', '61d57c5b3f3158.19204351.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2022-01-05 00:00:00', 2),
(39, 3, 'Choose Your Package', '61d57cba487f89.02925720.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2022-01-05 00:00:00', 2),
(40, 3, 'Register an account', '61d57d26059cd7.54370383.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2022-01-05 00:00:00', 2),
(41, 3, 'Submit Bid - Free or Paid', '61d57d5c21a450.66159863.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2022-01-05 00:00:00', 2),
(42, 4, 'WHO ARE WE', '61dc11c347a735.90531805.jpeg', 'WHO ARE WE', '2022-01-10 00:00:00', 2),
(43, 5, 'who its works slide', '61dc1d1fc9fa71.10058886.png', 'The free auction system Its very simple: the purchase price of each of the products that we sell on the site is subject to an auction. So you decide how much you want to spend. If the price of the item soars during the auction, you are free to stop there. However, if no other participant outbids your last price proposal, you get the last smartphone at half price for example!', '2022-01-10 00:00:00', 2);

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
(1, 'logo', '61d2e260279de9.29600381.png', 2),
(2, 'favicon', '61d2e278f0d3d1.61614140.png', 2),
(3, 'facebook', 'https://www.facebook.com/aditya.kundra.5', 2),
(4, 'linkedin', 'https://www.linkedin.com/company/adi.kundra', 2),
(5, 'twitter', 'https://www.twitter.com/in/adityakundra', 2),
(6, 'youtube', 'https://www.youtube.com/auralawgic', 2),
(7, 'instagram', 'https://www.instagram.com/adi.kundra', 2),
(10, 'website_name', 'Aditya Kundra', 2),
(11, 'phone_number', '8375085291', 2),
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
(501, 'privacy', '<p>this is a test</p>\r\n', 2),
(502, 'terms', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta incidunt quae optio minus assumenda magnam repellendus maiores voluptatum. Nihil alias voluptatibus quo explicabo sed, beatae a voluptatum consectetur assumenda aliquam!&lt;/p&gt;\r\n', 2),
(503, 'address', 'Delhi,India', 2),
(504, 'resume', 'resume.pdf', 2),
(505, 'condition', '<p>The services, appearing on the Internet site http://www.smartauction.com/, are offered by the company Global bid sarl (hereinafter &ldquo;global bid.sarl&rdquo;) which publishes this site.</p>\r\n\r\n<p>On the whole of the aforementioned site that it publishes, the company Global Bid offers for sale and auction all kinds of products and services.</p>\r\n\r\n<p>The auctions will take place in different rooms (each auction will be orchestrated in a room assigned to it).</p>\r\n\r\n<p>Global Bid is a limited liability company with a capital of 10,000 dinars, whose head office is located at Res. Les dunes Tantana, Akouda, Tunisia, registered in the National Register of Companies under number 1610827Q.</p>\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `reply` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`reply`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `user_id`, `comment`, `date`, `reply`) VALUES
(1, 9, 5, 'This is a test', '2022-01-11', '{\"reply\":[{\"user_id\":\"5\",\"reply\":\"hello you ediot\"},{\"user_id\":\"5\",\"reply\":\"hey\"},{\"user_id\":\"5\",\"reply\":\"hello you ediot\",\"date\":\"2022-01-11\"}]}'),
(2, 9, 5, 'This is a test2', '2022-01-11', '{\"reply\":[{\"user_id\":\"5\",\"reply\":\"hey\",\"date\":\"2022-01-11\"},{\"user_id\":\"5\",\"reply\":\"hello you ediot\",\"date\":\"2022-01-11\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone_number`, `message`) VALUES
(1, 'Uday lal', 'uday@mail.com', '08375085291', 'Hello,\r\nThis  is a test message'),
(2, 'Uday lal', 'udaylal014@gmail.com', '08375085291', 'Hello this is message');

-- --------------------------------------------------------

--
-- Table structure for table `CronJobs`
--

CREATE TABLE `CronJobs` (
  `id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CronJobs`
--

INSERT INTO `CronJobs` (`id`, `auction_id`, `time`, `status`) VALUES
(1, 1, '10:08:00', 'unactive'),
(2, 2, '10:10:00', 'unactive'),
(3, 3, '10:10:00', 'unactive');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `clicks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `price`, `clicks`) VALUES
(8, 100, 16),
(10, 300, 30),
(12, 101, 20);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `auction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `email`, `auction_id`) VALUES
(8, 'adityakundra@bonamisoftware.com', 13),
(9, 'abhaylal122@gmail.com', 13),
(10, 'udaylal014@gmail.com', 13),
(11, 'udaylal014@gmail.com', 13),
(12, 'udaylal014@gmail.com', 13),
(13, 'udaylal014@gmail.com', 13),
(14, 'udaylal014@gmail.com', 13),
(15, 'udaylal014@gmail.com', 13),
(16, 'udaylal014@gmail.com', 13),
(17, 'udaylal014@gmail.com', 13),
(18, 'udaylal014@gmail.com', 13),
(19, 'udaylal014@gmail.com', 13),
(20, 'udaylal014@gmail.com', 14),
(21, 'abhaylal122@gmail.com', 14),
(22, 'adityakundra@bonamisoftware.com', 14);

-- --------------------------------------------------------

--
-- Table structure for table `testomonial`
--

CREATE TABLE `testomonial` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `review` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `media` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testomonial`
--

INSERT INTO `testomonial` (`id`, `Name`, `review`, `status`, `datetime`, `media`, `designation`, `message`) VALUES
(4, 'Uday lal', 2, 1, '2022-01-04 10:48:35', '61d41aec76a3d6.75575077.jpeg', 'test', ''),
(6, 'Abhay lal', 4, 1, '2022-01-04 14:35:56', '61d44d3c87b9a6.49408604.png', 'Software dev', ''),
(7, 'Uday lal', 4, 1, '2022-01-04 14:38:35', '61d44ddbae4c01.16836375.jpeg', 'Software dev', 'This is a test');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `order_id`, `payer_id`, `date`, `time`, `status`, `package_id`) VALUES
(1, 5, '1178118354427370K', 'M8FLDDYPEDFKA', '2022-01-12', '11:51:47', 0, 8),
(4, 5, '0MX13581K1748982X', 'M8FLDDYPEDFKA', '2022-01-12', '01:33:54', 0, 8),
(5, 5, '12F31983H2106464U', 'M8FLDDYPEDFKA', '2022-01-12', '01:47:01', 0, 8);

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
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `profile_img` varchar(255) DEFAULT '',
  `bid_token` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contact`, `address`, `role`, `token`, `status`, `profile_img`, `bid_token`) VALUES
(1, 'uday', 'uday.lal@bonamisoftware.com', '0fa47f59171ffcab72cdfeca4e1e67fe2c7026d2a0eae44e768cbbb97944b768c2ac5373f5cecc011017ac5a1314fd01e4e0674c9f34bc3c084e6d95dce83387', '8375085291', 'B-33 kiran garden uttam nager new delhi - 110059', 'superadmin', '1ZHkmya9DZo3L0frDf4f', 'active', '', 5),
(4, 'Uday', 'uday@mail.com', '521b9ccefbcd14d179e7a1bb877752870a6d620938b28a66a107eac6e6805b9d0989f45b5730508041aa5e710847d439ea74cd312c9355f1f2dae08d40e41d50', '08375085291', 'B-33, kiran garden', 'user', 'uIc0yWAPoahpMbUKSIfa', 'active', '', 5),
(5, 'Uday', 'udaylal014@gmail.com', '521b9ccefbcd14d179e7a1bb877752870a6d620938b28a66a107eac6e6805b9d0989f45b5730508041aa5e710847d439ea74cd312c9355f1f2dae08d40e41d50', '08375085291', 'B-33, kiran garden', 'user', 'Ay6YhNxdkA29xloQ58mB', 'active', '', 492),
(6, 'Abhay lal', 'abhaylal122@gmail.com', '521b9ccefbcd14d179e7a1bb877752870a6d620938b28a66a107eac6e6805b9d0989f45b5730508041aa5e710847d439ea74cd312c9355f1f2dae08d40e41d50', '9205395518', 'B-33, kiran garden', 'user', '6yEOWBCjaz9cRX5wX3KN', 'active', '', 0),
(7, 'adityakundra', 'adityakundra@bonamisoftware.com', '521b9ccefbcd14d179e7a1bb877752870a6d620938b28a66a107eac6e6805b9d0989f45b5730508041aa5e710847d439ea74cd312c9355f1f2dae08d40e41d50', '8375085291', 'New Delhi', 'user', 'S7Xv6fUrZUhdWXmxiMvn', 'active', '', 878);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `use_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `token_value` int(11) NOT NULL,
  `auction_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `use_type`, `date`, `time`, `token_value`, `auction_id`) VALUES
(1, 5, 'add', '2022-01-12', '13:47:01', 16, NULL),
(2, 5, 'remove', '2022-01-13', '11:53:22', 100, 1),
(3, 5, 'remove', '2022-01-13', '12:33:26', 100, 11),
(4, 5, 'remove', '2022-01-13', '12:45:41', 100, 11),
(5, 7, 'remove', '2022-01-13', '13:27:28', 4, 13),
(6, 6, 'remove', '2022-01-13', '13:27:43', 4, 13),
(7, 5, 'remove', '2022-01-13', '13:28:24', 4, 13),
(8, 5, 'remove', '2022-01-13', '13:37:39', 4, 13),
(9, 5, 'remove', '2022-01-13', '13:37:40', 4, 13),
(10, 5, 'remove', '2022-01-13', '13:37:41', 4, 13),
(11, 5, 'remove', '2022-01-13', '13:37:41', 4, 13),
(12, 5, 'remove', '2022-01-13', '13:39:21', 4, 13),
(13, 5, 'remove', '2022-01-13', '13:39:57', 4, 13),
(14, 5, 'remove', '2022-01-13', '13:40:40', 4, 13),
(15, 5, 'remove', '2022-01-13', '13:46:10', 4, 13),
(16, 5, 'remove', '2022-01-13', '13:47:21', 4, 13),
(17, 5, 'remove', '2022-01-13', '13:47:27', 1, 14),
(18, 6, 'remove', '2022-01-13', '13:47:42', 1, 14),
(19, 7, 'remove', '2022-01-13', '13:47:55', 1, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CronJobs`
--
ALTER TABLE `CronJobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testomonial`
--
ALTER TABLE `testomonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bnmi_blog`
--
ALTER TABLE `bnmi_blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bnmi_category`
--
ALTER TABLE `bnmi_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bnmi_cms_pages`
--
ALTER TABLE `bnmi_cms_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `bnmi_general`
--
ALTER TABLE `bnmi_general`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CronJobs`
--
ALTER TABLE `CronJobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `testomonial`
--
ALTER TABLE `testomonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
