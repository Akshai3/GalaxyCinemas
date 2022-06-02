-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 01:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galaxy_cinemas`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `uid` int(30) NOT NULL,
  `fname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `uname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `phno` bigint(100) NOT NULL,
  `pass` varchar(200) CHARACTER SET latin1 NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'Approved',
  `isAdmin` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`uid`, `fname`, `uname`, `email`, `phno`, `pass`, `status`, `isAdmin`) VALUES
(2, 'Mrudul A Thakadiyel', 'Mrudul', 'mrudul@gmail.com', 7489562147, 'a93e1669a3924937b28c1bc15061f927', 'Approved', 0),
(3, 'abc1', 'abc', 'abc@g.com', 8745454554, '23e63f3fbafa8878bed54e5aeb3d36a9', 'Approved', 0),
(6, 'Akshai Biju', 'Akshai', 'akshaibiju3@gmail.com', 7489562147, '5584574f6d3501e41e4c04eebbb4148e', 'Approved', 0),
(7, 'Vinu R', 'vinu', 'vinu@gmail.com', 8796541278, '0d324dea4350d90f5b0ba47b90a1b411', 'Approved', 0),
(9, 'Mrudul', 'mrudul123', 'mrudul@gmail.com', 8796541278, 'e23b44e8909dd92522eaa8931d85a5d6', 'Approved', 0),
(10, 'Ligin Abraham', 'ligin', 'ligin@gmail.com', 8796541278, 'b98bf69c8996bc74fcb6416c3afee01a', 'Approved', 0),
(11, 'manas', 'manasp', 'manas@gmail.com', 9565874587, '8dd43ae0638e1ce2690e2e3cfa653923', 'Approved', 0),
(12, 'Akshai BIJu', 'Akshai003', 'akshaibiju3@gmail.com', 8796541278, '23e63f3fbafa8878bed54e5aeb3d36a9', 'Approved', 0),
(14, 'Jose K', 'jose', 'jose@gmail.com', 8796541278, 'b0a880f82caaf97863a61818fb2ff395', 'Approved', 0),
(15, 'Alantina Mathew', 'Alantina', 'alantina@gmail.com', 9966774466, '1146a55a233a518bd00ca614e1222b60', 'Approved', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `book_id` int(11) NOT NULL,
  `ticket_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre_id',
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'Number of seats',
  `seatRow` int(11) NOT NULL,
  `seatCol` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(12) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'Theatre Id',
  `category_desc` text NOT NULL,
  `image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `category_createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `t_id`, `category_desc`, `image`, `category_createDate`) VALUES
(1, 'Popcorn', 1, 'Popcorn (also called popped corn, popcorns or pop-corn) is a variety of corn kernel which expands and puffs up when heated; the same names also refer to the foodstuff produced by the expansion.', '1.jpg', '2022-04-07 23:54:10'),
(2, 'Icecream', 1, 'Ice cream is a sweetened frozen food typically eaten as a snack or dessert.', 'ice.jpg', '2022-04-07 23:55:31'),
(3, 'Drinks', 1, 'Soft drinks typically contain carbonated water, high fructose corn syrup (sugar), caramel color, caffeine, phosphoric acid, citric acid, natural flavors, carbon dioxide, organic diol, and Brominated vegetable oil', 'drink.jpg', '2022-04-07 23:57:24'),
(22, 'r4r4', 1, 'r4r4r4', 'frooti.jpg', '2022-05-06 14:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'username',
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `uid`, `username`, `password`, `user_type`) VALUES
(1, 0, 'Admin', 'Admin123', 0),
(2, 1, 'Theatre1', 'Theatre1', 1),
(3, 2, 'Theatre2', 'Theatre2', 1),
(4, 3, 'Theatre3', 'Theatre3', 1),
(6, 2, 'Mrudul', 'a93e1669a3924937b28c1bc15061f927', 2),
(7, 4, 'THR227442', 'PWD549289', 1),
(8, 5, 'THR301566', 'PWD711078', 1),
(9, 6, 'THR866277', 'PWD769779', 1),
(10, 3, 'abc', '23e63f3fbafa8878bed54e5aeb3d36a9', 2),
(12, 7, 'THR168563', 'PWD900628', 1),
(13, 8, 'THR257708', 'PWD554436', 1),
(14, 9, 'THR647298', 'PWD964502', 1),
(16, 6, 'Akshai', '5584574f6d3501e41e4c04eebbb4148e', 2),
(17, 7, 'vinu', '0d324dea4350d90f5b0ba47b90a1b411', 2),
(18, 7, 'vinu', '0d324dea4350d90f5b0ba47b90a1b411', 2),
(19, 2, 'mrudul123', 'e23b44e8909dd92522eaa8931d85a5d6', 2),
(20, 10, 'ligin', 'b98bf69c8996bc74fcb6416c3afee01a', 2),
(21, 11, 'manasp', '8dd43ae0638e1ce2690e2e3cfa653923', 2),
(22, 6, 'Akshai003', '23e63f3fbafa8878bed54e5aeb3d36a9', 2),
(23, 10, 'THR660953', 'PWD461337', 1),
(24, 11, 'THR539093', 'PWD721941', 1),
(25, 12, 'THR595002', 'PWD464105', 1),
(26, 13, 'THR595002', 'PWD464105', 1),
(27, 14, 'THR262226', 'PWD562879', 1),
(28, 15, 'THR477105', 'PWD997336', 1),
(29, 16, 'THR404567', 'PWD497902', 1),
(30, 17, 'THR404567', 'PWD497902', 1),
(31, 18, 'THR841996', 'PWD239936', 1),
(32, 19, 'THR841996', 'PWD239936', 1),
(33, 20, 'THR313909', 'PWD471888', 1),
(34, 21, 'THR675712', 'PWD735818', 1),
(35, 22, 'THR769218', 'PWD398909', 1),
(36, 23, 'THR764285', 'PWD617041', 1),
(37, 24, 'THR639208', 'PWD462302', 1),
(38, 25, 'THR312996', 'PWD321871', 1),
(39, 6, 'Akshai', '23e63f3fbafa8878bed54e5aeb3d36a9', 2),
(40, 14, 'jose', 'b0a880f82caaf97863a61818fb2ff395', 2),
(41, 26, 'THR972800', 'PWD579575', 1),
(42, 15, 'Alantina', '1146a55a233a518bd00ca614e1222b60', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movie`
--

CREATE TABLE `tbl_movie` (
  `movie_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `movie_name` varchar(256) CHARACTER SET latin1 NOT NULL,
  `cast` varchar(500) CHARACTER SET latin1 NOT NULL,
  `desc` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `video_url` varchar(200) CHARACTER SET latin1 NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 means active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_movie`
--

INSERT INTO `tbl_movie` (`movie_id`, `t_id`, `movie_name`, `cast`, `desc`, `release_date`, `image`, `video_url`, `status`) VALUES
(4, 0, 'Beast', 'Vijay, Pooja Hedge, Shine Tom Chacko', 'Beast is an upcoming Indian Tamil-language action thriller film written and directed by Nelson and produced by Sun Pictures.', '2022-04-05', 'images/img1.jpg', 'https://www.youtube.com/watch?v=0E1kVRRi6lk&ab_channel=SunTV', 0),
(5, 0, 'K.G.F: Chapter 2', 'Yash, Sanjay Dutt, Srinidhi Shetty', 'After killing Garuda, Rocky, whose name strikes fear in the heart of his foes, becomes the uplifter of people struggling at the KGF by helping and fighting for them. His allies look up to Rocky as their savior. Now, he will have to face his biggest foe Adheera and learn more about his past.', '2022-04-05', 'images/img2.jpg', 'https://www.youtube.com/watch?v=tLeTx5OdjZs&ab_channel=HombaleFilms', 0),
(6, 0, 'RRR', 'N.T. Rama Rao. Jr', 'A tale of two legendary revolutionaries and their journey far away from home. After their journey they return home to start fighting back against British colonialists in the 1920s.', '2022-04-05', 'images/3.jpg', 'https://www.youtube.com/watch?v=oO8TTM2FgIA&ab_channel=LycaProductions', 0),
(14, 0, '12th Man', 'Mohanlal,Anu Sithara,Anusree', '12th Man is a 2022 Indian Malayalam-language Mystery thriller film', '2022-05-28', 'images/img1.jpg', 'https://www.youtube.com/watch?v=V81jMFrawAk', 0),
(15, 1, 'dsd', 'Tom Holland, Zendaya', 'dsd', '2022-05-31', 'images/movie004.jpg', 'https://www.youtube.com/watch?v=oO8TTM2FgIA&ab_channel=LycaProductions', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cast` varchar(100) CHARACTER SET latin1 NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(800) CHARACTER SET latin1 NOT NULL,
  `attachment` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `name`, `cast`, `news_date`, `description`, `attachment`) VALUES
(4, 'Doctor Strange in the Multiverse of Madness', 'Benedict Cumberbatch, Elizabeth Olsen, Benedict Wong, Rachel McAdams', '2022-05-13', 'Dr Stephen Strange casts a forbidden spell that opens a portal to the multiverse. However, a threat emerges that may be too big for his team to handle.', 'news_images/4.jpg'),
(5, 'Jana Gana Mana', 'Prithviraj Sukumaran, Suraj Venjaramoodu, Mamta Mohandas', '2022-04-30', 'Jana Gana Mana is an upcoming Indian political thriller vigilante film written by Sharis Mohammed and directed by Dijo Jose Antony.', 'news_images/5.jpg'),
(6, 'Thor: Love and Thunder', 'Chris Hemsworth, Natalie Portman, Christian Bale', '2022-07-05', 'Thor: Love and Thunder is an upcoming American superhero film based on the Marvel Comics character Thor, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is intended to be the direct sequel to Thor: Ragnarok and the 29th film in the Marvel Cinematic Universe', 'news_images/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screens`
--

CREATE TABLE `tbl_screens` (
  `screen_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_screens`
--

INSERT INTO `tbl_screens` (`screen_id`, `t_id`, `screen_name`) VALUES
(1, 1, 'screen 1'),
(2, 1, 'screen 2'),
(4, 1, 'screen 3'),
(5, 1, 'screen 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screentype`
--

CREATE TABLE `tbl_screentype` (
  `screen_id` int(11) NOT NULL,
  `sty_id` int(11) NOT NULL COMMENT 'screen type Id',
  `type_name` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `scRow` varchar(100) CHARACTER SET latin1 NOT NULL,
  `scCol` varchar(100) CHARACTER SET latin1 NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'Number of Seats',
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_screentype`
--

INSERT INTO `tbl_screentype` (`screen_id`, `sty_id`, `type_name`, `position`, `scRow`, `scCol`, `seats`, `charge`) VALUES
(1, 1, 'Gold', 3, '5', '5', 25, 50),
(1, 2, 'Platinum', 2, '6', '6', 36, 60),
(2, 3, 'Gold', 3, '6', '7', 42, 55),
(1, 4, 'Diamond', 1, '8', '9', 72, 80),
(2, 12, 'Platinum', 2, '6', '7', 42, 60),
(2, 13, 'Platinum', 2, '7', '8', 56, 80),
(4, 14, 'Gold', 3, '5', '8', 40, 50),
(4, 15, 'Platinum', 2, '5', '4', 20, 60),
(5, 16, 'Gold', 3, '8', '2', 16, 50),
(5, 17, 'Platinum', 2, '3', '3', 9, 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `s_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `theatre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shows`
--

INSERT INTO `tbl_shows` (`s_id`, `st_id`, `theatre_id`, `movie_id`, `start_date`, `status`, `r_status`) VALUES
(1, 1, 1, 4, '2022-05-04', 1, 1),
(2, 2, 1, 4, '2022-05-04', 1, 1),
(3, 3, 1, 5, '2022-05-05', 1, 1),
(4, 6, 1, 5, '2022-05-06', 1, 0),
(5, 7, 1, 5, '2022-05-06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_show_time`
--

CREATE TABLE `tbl_show_time` (
  `st_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET latin1 NOT NULL COMMENT 'noon,second etc',
  `start_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_show_time`
--

INSERT INTO `tbl_show_time` (`st_id`, `screen_id`, `name`, `start_time`) VALUES
(1, 1, 'First', '10:00:00'),
(2, 1, 'Second', '12:30:00'),
(3, 2, 'First', '10:00:00'),
(4, 2, 'Noon', '12:30:00'),
(5, 2, 'Second', '18:30:00'),
(6, 4, 'Matinee', '16:30:00'),
(7, 5, 'First', '08:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_snackbook`
--

CREATE TABLE `tbl_snackbook` (
  `order_id` int(11) NOT NULL,
  `snackId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(200) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_snackbook`
--

INSERT INTO `tbl_snackbook` (`order_id`, `snackId`, `itemQuantity`, `user_id`, `amount`, `orderDate`, `status`) VALUES
(1, 8, 6, 2, 180, '2022-05-06 09:13:22', 0),
(2, 8, 6, 2, 180, '2022-05-06 09:13:42', 0),
(3, 7, 5, 2, 175, '2022-05-06 09:25:05', 0),
(7, 10, 1, 2, 66, '2022-05-06 14:55:16', 0),
(8, 5, 5, 15, 200, '2022-05-06 15:13:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_snacks`
--

CREATE TABLE `tbl_snacks` (
  `snackId` int(12) NOT NULL,
  `snackName` varchar(255) NOT NULL,
  `snackPrice` int(12) NOT NULL,
  `snackDesc` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `snackCategoryId` int(12) NOT NULL,
  `snackPubDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_snacks`
--

INSERT INTO `tbl_snacks` (`snackId`, `snackName`, `snackPrice`, `snackDesc`, `image`, `snackCategoryId`, `snackPubDate`) VALUES
(5, 'Chocolate Popcorn', 40, 'Chocolate Popcorn is a sellable item listed under Snack. It is developed from a recipe found in American Pop Fun Sweets for the Whole Family.\r\n', 'chocpop.jpg', 1, '2022-04-08 00:10:48'),
(6, 'Cheese Popcorn', 40, ' This cheese popcorn recipe uses real cheddar and butter for a savory snack the whole family will love, and it only takes 5 minutes to make', 'cheezepop.jpg', 1, '2022-04-08 00:12:31'),
(7, 'Chocolate Icecream', 35, 'This ice cream is smooth and creamy. The chocolate is rich and deep. Use quality ingredients, and it will turn out perfectly! Invest in good cocoa', 'chocoice.jpg', 2, '2022-04-08 00:13:42'),
(8, 'Frooti', 30, 'Frooti is a mango-flavoured drink sold in India. It is made with natural flavours and mango-concentrate. It is the flagship product and most successful drink product made by Parle Agro. ', 'frooti.jpg', 3, '2022-04-08 00:16:10'),
(10, 'rfrf', 66, 'frf4', 'pepsi.jpg', 22, '2022-05-06 14:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatre`
--

CREATE TABLE `tbl_theatre` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `place` varchar(100) CHARACTER SET latin1 NOT NULL,
  `state` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phno` bigint(100) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_theatre`
--

INSERT INTO `tbl_theatre` (`id`, `name`, `address`, `place`, `state`, `phno`, `mail`, `pin`) VALUES
(1, 'Aiswarya Cinemas', 'Kattappana Kanjiyar road', 'Kattappana', 'kerala', 8978458745, 'Theatre1@gmail.com', 685512),
(2, 'R D Cinemas', 'Mundakayam Town , kottayam dist', 'Mundakayam', 'Kottayam', 6548451235, 'Theatre2@gmail.com', 685514),
(3, 'Sagara', 'kattapana Town', 'Kattapana', 'Kerala', 8945745215, 'Theatre3@gmail.com', 685514),
(9, 'Grace', 'periyar', 'periyar', 'kerala', 8798745478, 'manasp@mca.ajce.in', 685512),
(26, 'asdf', 'kumily', 'kumily', 'kerala', 8887898788, 'akshaibiju3@gmail.com', 685533);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viewcart`
--

CREATE TABLE `tbl_viewcart` (
  `cartItemId` int(11) NOT NULL,
  `snackId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_viewcart`
--

INSERT INTO `tbl_viewcart` (`cartItemId`, `snackId`, `itemQuantity`, `userId`, `addedDate`) VALUES
(21, 8, 4, 2, '2022-05-31 23:11:57'),
(22, 8, 3, 2, '2022-05-31 23:37:10'),
(23, 6, 4, 2, '2022-05-31 23:37:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `tbl_screentype`
--
ALTER TABLE `tbl_screentype`
  ADD PRIMARY KEY (`sty_id`);

--
-- Indexes for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_snackbook`
--
ALTER TABLE `tbl_snackbook`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_snacks`
--
ALTER TABLE `tbl_snacks`
  ADD PRIMARY KEY (`snackId`);

--
-- Indexes for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_viewcart`
--
ALTER TABLE `tbl_viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `uid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_screentype`
--
ALTER TABLE `tbl_screentype`
  MODIFY `sty_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'screen type Id', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_snackbook`
--
ALTER TABLE `tbl_snackbook`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_snacks`
--
ALTER TABLE `tbl_snacks`
  MODIFY `snackId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_viewcart`
--
ALTER TABLE `tbl_viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
