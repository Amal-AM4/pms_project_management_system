-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 10:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access`
--

CREATE TABLE `tbl_access` (
  `ID` int(11) NOT NULL,
  `COMP_ID` int(11) NOT NULL,
  `USER_ID` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LOGS` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_access`
--

INSERT INTO `tbl_access` (`ID`, `COMP_ID`, `USER_ID`, `PASSWORD`, `LOGS`, `STATUS`) VALUES
(1, 1, 'sans-borne15@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-04-14 12:46:20', 1),
(2, 2, 'techpro12', '6512bd43d9caa6e02c990b0a82652dca', '2023-09-14 13:47:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `CONTENT` longtext NOT NULL,
  `DT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`ID`, `USER_ID`, `TITLE`, `CONTENT`, `DT`) VALUES
(2, 1, 'e-Health Card for Developing Countries ', '<p>Health care system is one of the important sectors in any country for its national interest. Bangladesh is one of the over populated countries in the world. Health care sector in this country is undeveloped and communication technology has not been introduced significantly to&nbsp;<span id=\"more-3588\"></span>improve its quality of service. Growing use of information and communication technology (ICT) facilitates many countries to develop their ICT based e-health card system.</p>\r\n<p>The project presents research, design and implementation of e-Health card based solution that can be used to integrate and to coordinate with heterogeneous IT environment. Using the e-Health card all patient&rsquo;s data, doctor&rsquo;s prescription, patients present and previous health history could be accessible through PDA by the relevant parties. In order to conduct the study, we have followed qualitative research method which includes a survey among the potential parties and collecting relevant data from the existing e-health card system in different countries. It is notable that the research is funded by 1SPIDER. Based on the collected data we have proposed the new PDA based e-health care system.</p>', '2021-05-06 12:26:02'),
(3, 1, 'Android Application for Face Recognition', '<p>This report presents all the processes I use to program an android application of face recognition. At the beginning, I used the android API, after a long study of the android litterature, to make this application. Because of devices problem, I had to&nbsp;<span id=\"more-17094\"></span>forsake this option, and I used the OpenCV librairy, a librairy create for image processing.</p>\r\n<p><span style=\"text-decoration: underline;\"><strong>Mathematical Theories</strong></span></p>\r\n<p>This two equations will be useful for us to compute three distances on the face : the distance between the two eyes, the distance from mouth to left eye and the distance from mouth to right eye. After we will compute also the value of the three angles of the triangle formed by the three lenghts.</p>\r\n<p><span style=\"text-decoration: underline;\"><strong>The Methodology</strong></span></p>\r\n<p>During my project, I always realised my tasks in 5 steps. First, I had to make research on the internet to know how the technologies and how the programming languages work. The targets of my research were tutorials explaining the rules about the librairies I used. I used only internet because all the informations for computer sicence can be find on the net. However, I had to take care about the informations I found. Many tutorials were useless and unsuitable for my problems.</p>', '2021-05-06 12:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_comment`
--

CREATE TABLE `tbl_blog_comment` (
  `ID` int(11) NOT NULL,
  `SENDER_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `COMMENT` varchar(500) NOT NULL,
  `DT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_blog_comment`
--

INSERT INTO `tbl_blog_comment` (`ID`, `SENDER_ID`, `POST_ID`, `COMMENT`, `DT`) VALUES
(1, 2, 3, 'Heyy awesome idea ....', '2021-05-12 07:19:30'),
(2, 3, 3, 'Good job ....', '2021-05-12 07:25:14'),
(4, 3, 2, 'Hello mister, good thinking', '2021-05-12 12:26:00'),
(5, 1, 3, 'Thanks:)', '2021-05-19 11:27:11'),
(6, 1, 2, 'Haa â¤â¤â¤â¤', '2021-05-19 11:29:23'),
(7, 2, 3, 'he he', '2021-05-19 11:29:50'),
(8, 2, 2, 'ðŸ˜Š', '2021-05-19 11:30:48'),
(9, 2, 2, 'ðŸ˜‰ðŸ˜Ž', '2021-05-19 11:31:55'),
(10, 2, 3, 'ðŸ˜˜', '2021-05-19 11:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PACK_ID` int(11) NOT NULL,
  `PACK_NAME` varchar(200) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`ID`, `USER_ID`, `PACK_ID`, `PACK_NAME`, `PRICE`, `STATUS`, `LOGS`) VALUES
(3, 5, 5, 'Blood Bank Management System', 6599, 1, '2023-09-13 17:43:03'),
(4, 5, 15, 'Supermarket Billing System ', 7899, 1, '2023-09-13 17:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `CONTENT` longtext NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`ID`, `EMP_ID`, `NAME`, `CONTENT`, `LOGS`) VALUES
(1, 2, 'PHP', 'PHP is a popular programming language for beginners. PHP is flexible and forgiving, allowing newbies to keep working without stopping to fix common coding errors. PHP is ubiquitous and integral to websites like WordPress and Wix.', '2021-04-26 00:00:00'),
(2, 4, 'Java', 'Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is a general-purpose programming language intended to let application developers write once, run anywhere (WORA),[16] meaning that compiled Java code can run on all platforms that support Java without the need for recompilation.[17] Java applications are typically compiled to bytecode that can run on any Java virtual machine (JVM) regardless of the underlying computer architecture. The syntax of Java is similar to C and C++, but has fewer low-level facilities than either of them. The Java runtime provides dynamic capabilities (such as reflection and runtime code modification) that are typically not available in traditional compiled languages. As of 2019, Java was one of the most popular programming languages in use according to GitHub,[18][19] particularly for client-server web applications, with a reported 9 million developers.', '2021-04-26 11:00:00'),
(3, 2, 'Python', 'Python is an interpreted high-level general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation. Its language constructs as well as its object-oriented approach aim to help programmers write clear, logical code for small and large-scale projects.[29]\r\n\r\nPython is dynamically-typed and garbage-collected. It supports multiple programming paradigms, including structured (particularly, procedural), object-oriented and functional programming. Python is often described as a \"batteries included\" language due to its comprehensive standard library.[30]\r\n\r\nGuido van Rossum began working on Python in the late 1980s, as a successor to the ABC programming language, and first released it in 1991 as Python 0.9.0.[31] Python 2.0 was released in 2000 and introduced new features, such as list comprehensions and a garbage collection system using reference counting and was discontinued with version 2.7.18 in 2020.[32] Python 3.0 was released in 2008 and was a major revision of the language that is not completely backward-compatible and much Python 2 code does not run unmodified on Python 3.', '2021-05-17 09:59:19'),
(4, 2, 'C++', 'C++ is a powerful general-purpose programming language. It can be used to develop operating systems, browsers, games, and so on. C++ supports different ways of programming like procedural, object-oriented, functional, and so on. This makes C++ powerful as well as flexible.\r\n\r\nOur C++ programming tutorial will guide you to learn C++ programming one step at a time.', '2021-05-18 11:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatroom`
--

CREATE TABLE `tbl_chatroom` (
  `ID` int(11) NOT NULL,
  `USER_ONE` int(11) NOT NULL,
  `USER_TWO` int(11) NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_chatroom`
--

INSERT INTO `tbl_chatroom` (`ID`, `USER_ONE`, `USER_TWO`, `LOGS`) VALUES
(1, 1, 2, '2021-05-01 05:38:17'),
(2, 2, 4, '2021-05-01 11:21:25'),
(3, 1, 4, '2021-05-01 10:38:03'),
(4, 3, 2, '2021-05-03 11:45:28'),
(7, 5, 4, '2023-09-13 17:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `ID` int(11) NOT NULL,
  `COMP_NAME` varchar(150) NOT NULL,
  `COMP_LOGO` varchar(500) NOT NULL,
  `ADDRESS` varchar(300) NOT NULL,
  `LONGITUDE` varchar(500) NOT NULL,
  `LATITUDE` varchar(500) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE` bigint(20) NOT NULL,
  `DESCRIPTION` mediumtext NOT NULL,
  `MANAGER_NAME` varchar(50) NOT NULL,
  `USER_ID` varchar(30) NOT NULL,
  `ACTIVATION` int(11) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LOGS` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`ID`, `COMP_NAME`, `COMP_LOGO`, `ADDRESS`, `LONGITUDE`, `LATITUDE`, `EMAIL`, `PHONE`, `DESCRIPTION`, `MANAGER_NAME`, `USER_ID`, `ACTIVATION`, `PASSWORD`, `LOGS`, `STATUS`) VALUES
(1, 'SANS BORNE', 'company/comp_logo/607403c59a4923.59516420.jpg', 'SANS BORNE P.O KALLAMBALAM OPP JAGEE JEWELLERY', '8.763354551154194', '76.79195388198086', 'sans-borne15@gmail.com', 7894561220, '<p><strong>SANS BORNE Limited</strong> (NYSE: WIT, BSE: 507685, NSE: WIPRO) is a leading global information technology, consulting and business process services company. We harness the power of cognitive computing, hyper-automation, robotics, cloud, analytics and emerging technologies to help our clients adapt to the digital world and make them successful. A company recognized globally for its comprehensive portfolio of services, strong commitment to sustainability and good corporate citizenship, we have over 190,000 dedicated employees serving clients across six continents. Together, we discover ideas and connect the dots to build a better and a bold new future.</p>\r\n<p>The Spirit of SANS BORNE is the core of SANS BORNE. These are our Values. It is about who we are. It is our character. It is reflected consistently in all our behavior. The Spirit is deeply rooted in the unchanging essence of SANS BORNE. But it also embraces what we must aspire to be. It is the indivisible synthesis of the four values. The Spirit is a beacon. It is what gives us direction and a clear sense of purpose. It energizes us and is the touchstone for all that we do.</p>\r\n<h5>Key Features</h5>\r\n<ul>\r\n<li>100% Job oriend software training</li>\r\n<li>Experienced IT professtionals</li>\r\n<li>Live Training with our Development Team</li>\r\n</ul>\r\n<h6>Academic Main &amp; Mini Projects- BCA/MCA/B.Sc</h6>', 'Arshad Salam', 'arsha@123', 1, '202cb962ac59075b964b07152d234b70', '2021-04-12 13:54:37', 1),
(2, 'TechPro Projects', 'company/comp_logo/6502b5962ee607.29379312.jpg', '123 Tech Way, Suite 456, Silicon Valley, CA 12345, USA', '76.92712782175907', '8.536775448352397', 'john.doe@techproprojects.com', 7894561230, '<p><strong>Introduction:</strong> TechPro Projects is a leading company specializing in providing high-quality final project solutions for MCA students. Founded in 20XX, our mission is to empower aspiring MCA graduates with innovative, cutting-edge projects that help them excel in their academic journey and launch successful careers in the IT industry.</p>', 'Amal A M', 'techpro12', 1, '6512bd43d9caa6e02c990b0a82652dca', '2023-09-14 12:56:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `ID` int(11) NOT NULL,
  `COMP_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `COVER_PIC` varchar(500) NOT NULL,
  `POST_CONTENT` text NOT NULL,
  `ACT_PRICE` int(11) NOT NULL,
  `DIS_PRICE` int(11) NOT NULL,
  `LOGS` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`ID`, `COMP_ID`, `EMP_ID`, `CATEGORY_ID`, `TITLE`, `COVER_PIC`, `POST_CONTENT`, `ACT_PRICE`, `DIS_PRICE`, `LOGS`, `STATUS`) VALUES
(5, 1, 2, 1, 'Blood Bank Management System', 'pack_img/04162021133800cover.jpg', '<p>Learn Python like a Professional Start from the basics and go all the way to creating your own applications and games.</p>\r\n<p>This is the most comprehensive, yet straight-forward, course for the Python programming language on Udemy! Whether you have never programmed before, already know basic syntax, or want to learn about the advanced features of Python, this course is for you! In this course we will teach you Python 3.</p>\r\n<p>With over 100 lectures and more than 21 hours of video this comprehensive course leaves no stone unturned! This course includes quizzes, tests, coding exercises and homework assignments as well as 3 major projects to create a Python project portfolio!</p>\r\n<p>Learn how to use Python for real-world tasks, such as working with PDF Files, sending emails, reading Excel files, Scraping websites for informations, working with image files, and much more!</p>', 12000, 6599, '2021-04-16 17:08:00', 1),
(6, 1, 4, 2, 'Book Re-sale Application In Java', 'pack_img/04162021143348Amazon_Books.png', '<p>Book shopping App allows users to check for various Books Instruments and can purchase them. The project consists of list of Books displayed in various models and designs. The user may browse through these products as per categories. If the user likes a product he may add it to his shopping cart. The User can view the items based on their names &amp; Price in increasing or decreasing order.<br />This App has an Innovative Floating Cart that is available on each page, which pops up showing the Items that are currently in the cart with minimum details. The User must first register into the system and then is eligible to check out the products. The User has 3 kinds of payment method namely; Debit, Credit card or Cash on Delivery. The Front End of the App is done using Android Studio and SQL serves as a backend to store books lists and inventory data. The products are added by the Admin, The Admin Part uses Asp.Net with JAVA. Thus the online books shopping project brings an entire Books Store online and makes it easy for both buyer and seller to make deals on Books. The User can check his order history or the status of the current order in my orders column. Admin is responsible for changing the status of the orders.</p>\r\n<p>&nbsp;</p>', 8000, 4699, '2021-04-16 18:03:48', 1),
(15, 1, 2, 4, 'Supermarket Billing System ', 'pack_img/05182021082637zwing_pos_banner_blog.jpg', '<p>Supermarket billing system is a very simple mini project in C++, built as a console application without using graphics features. It&rsquo;s just a demonstration of the use of file handling and stream class in C++ language.</p>\r\n<p>The project is relatively simple to understand as there are just a few features. Understanding the source code will give you the idea regarding file handling: how to add, remove, edit, and search data or info to/from file.</p>\r\n<ul>\r\n<li><strong>Bill Report</strong>: It shows the bill report of all the items added in supermarket billing system.</li>\r\n<li><strong>Add, Remove or Edit items</strong>: With this feature you can add, remove and modify item details. In add items, you can add information or details such as item no., item name, manufacturing date, price, quantity, tax percent, and many more.</li>\r\n<li><strong>Show item details</strong>: This feature allows users to see the items and the corresponding details given for the item while adding the item.</li>\r\n</ul>\r\n<p>Some rooms for improvements in this supermarket billing system project include the use of &lsquo;while&rsquo; loop instead of the &lsquo;goto&rsquo; label. Many programmers consider the use of &lsquo;goto&rsquo; label to be not good or less efficient.</p>', 11000, 7899, '2021-05-18 11:56:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_order`
--

CREATE TABLE `tbl_course_order` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `COMPY_ID` int(11) NOT NULL,
  `CARD_HOLDER` varchar(100) NOT NULL,
  `CARD_NO` bigint(20) NOT NULL,
  `EXP_DATE` varchar(10) NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_course_order`
--

INSERT INTO `tbl_course_order` (`ID`, `USER_ID`, `COURSE_ID`, `COMPY_ID`, `CARD_HOLDER`, `CARD_NO`, `EXP_DATE`, `LOGS`) VALUES
(1, 1, 5, 1, 'Shine M', 1234567824683691, '04/25', '2021-04-26 11:22:21'),
(3, 2, 6, 1, 'Archana Raj', 1234567824683691, '11/25', '2021-04-28 15:22:39'),
(4, 1, 6, 1, 'Shine M', 1234567824683691, '04/25', '2021-05-01 10:38:03'),
(5, 3, 5, 1, 'Salu A S', 1234567824683691, '06/26', '2021-05-03 11:45:27'),
(8, 5, 6, 1, 'Askar', 1234567824683691, '08/23', '2023-09-13 17:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_freelancer`
--

CREATE TABLE `tbl_freelancer` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(500) NOT NULL,
  `USER_NAME` varchar(200) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LOGS` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_freelancer`
--

INSERT INTO `tbl_freelancer` (`ID`, `NAME`, `EMAIL`, `USER_NAME`, `PASSWORD`, `LOGS`, `STATUS`) VALUES
(1, 'Amal', 'amalkrishna@gmail.com', 'amal@123', '202cb962ac59075b964b07152d234b70', '2021-03-22 06:11:14', 1),
(2, 'Sherwin M', 'sherwin@gmail.com', 'sherwin@123', '202cb962ac59075b964b07152d234b70', '2021-03-22 10:24:25', 1),
(3, 'Anjana Sunil', 'anju123@gmail.com', 'anju_123', '202cb962ac59075b964b07152d234b70', '2021-07-11 19:27:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `ID` int(11) NOT NULL,
  `COMP_ID` int(11) NOT NULL,
  `PHOTO` varchar(500) NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`ID`, `COMP_ID`, `PHOTO`, `LOGS`) VALUES
(2, 1, 'images/609f9eee8ae417.54594143.jpeg', '2021-05-15 15:44:06'),
(3, 1, 'images/609f9ef58956b0.94820131.jpg', '2021-05-15 15:44:13'),
(4, 1, 'images/609f9efc332481.57032163.jpg', '2021-05-15 15:44:20'),
(5, 1, 'images/609f9f056c4343.51833036.jpg', '2021-05-15 15:44:29'),
(6, 1, 'images/609f9f0e64b6e6.06205384.png', '2021-05-15 15:44:38'),
(7, 1, 'images/6502a6f7565478.28865377.jpeg', '2023-09-14 11:53:51'),
(8, 2, 'images/6502b3658b3580.63160248.jpeg', '2023-09-14 12:46:53'),
(9, 2, 'images/6502b36a2b4a39.07892300.jpg', '2023-09-14 12:46:58'),
(10, 2, 'images/6502b36e9b4a70.28134851.jpg', '2023-09-14 12:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lesson`
--

CREATE TABLE `tbl_lesson` (
  `ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `COMP_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `EP_NAME` varchar(200) NOT NULL,
  `VIDEO` varchar(500) NOT NULL,
  `LOGS` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_lesson`
--

INSERT INTO `tbl_lesson` (`ID`, `COURSE_ID`, `COMP_ID`, `EMP_ID`, `EP_NAME`, `VIDEO`, `LOGS`, `STATUS`) VALUES
(1, 5, 1, 2, 'XAMP Downloading and Installing', 'video/60797e95da1da5.13917100.mp4', '2021-04-16 17:39:57', 1),
(2, 5, 1, 2, 'Getting the Best Editor', 'video/60797ec9344cc1.13801124.mp4', '2021-04-16 17:40:49', 1),
(3, 5, 1, 2, 'Document overview', 'video/60797f7ee33397.24711242.mp4', '2021-04-16 17:43:50', 1),
(4, 5, 1, 2, 'Variable', 'video/60797f986ba221.94854474.mp4', '2021-04-16 17:44:16', 1),
(5, 5, 1, 2, 'Constants', 'video/60797fbacfcb69.05566311.mp4', '2021-04-16 17:44:50', 1),
(6, 5, 1, 2, 'Arrays Functions', 'video/60797fd5f09853.93523663.mp4', '2021-04-16 17:45:17', 1),
(7, 5, 1, 2, 'Numbers', 'video/607980066277b2.69715309.mp4', '2021-04-16 17:46:06', 1),
(8, 5, 1, 2, 'Requirements overview', 'video/60798024b1d199.09531882.mp4', '2021-04-16 17:46:36', 1),
(9, 6, 1, 4, 'Downloading and setting up our environments', 'video/60798457573d07.32898376.mp4', '2021-04-16 18:04:31', 1),
(10, 6, 1, 4, 'Variables', 'video/6079847d252b03.70027507.mp4', '2021-04-16 18:05:09', 1),
(11, 6, 1, 4, 'Numeric operations and String concatenation', 'video/6079848da7b3f9.13205131.mp4', '2021-04-16 18:05:25', 1),
(12, 6, 1, 4, 'Augmented Assignment Operators and Increment and Decrement Operators', 'video/6079849fda3f57.91295546.mp4', '2021-04-16 18:05:43', 1),
(13, 6, 1, 4, 'Getting Input from the user', 'video/607984c01adc14.49411481.mp4', '2021-04-16 18:06:16', 1),
(14, 6, 1, 4, 'Displaying Current time', 'video/607987ffc191b7.36705350.mp4', '2021-04-16 18:20:07', 1),
(15, 15, 1, 2, 'Setting environment', 'video/60a3632a5077b0.29268538.mp4', '2021-05-18 12:18:10', 1),
(16, 15, 1, 2, 'Introduction to project', 'video/60a3634f48e7a3.53266183.mp4', '2021-05-18 12:18:47', 1),
(17, 15, 1, 2, 'Step by step procedure', 'video/60a3636be14131.07543920.mp4', '2021-05-18 12:19:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `ID` int(11) NOT NULL,
  `ROOM_ID` int(11) NOT NULL,
  `SENDER_ID` int(11) NOT NULL,
  `MESSAGE` varchar(500) NOT NULL,
  `DT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`ID`, `ROOM_ID`, `SENDER_ID`, `MESSAGE`, `DT`) VALUES
(1, 1, 1, 'Test Drive!', '2021-05-01 11:04:00'),
(2, 1, 2, 'Check the test drive data.', '2021-05-01 11:10:06'),
(3, 1, 2, 'hello!', '2021-05-01 11:35:00'),
(4, 3, 1, 'hello varsha', '2021-05-01 12:00:00'),
(5, 3, 4, 'hello shine', '2021-05-01 12:04:00'),
(10, 1, 1, 'test drive successfull man', '2021-05-02 11:53:46'),
(11, 1, 1, 'small bug in return data in url.', '2021-05-02 11:54:17'),
(15, 1, 1, 'that bug is also fixed', '2021-05-02 11:59:14'),
(16, 3, 1, 'checking for response.', '2021-05-02 12:02:16'),
(18, 1, 1, 'user chatroom compete!', '2021-05-02 12:46:11'),
(19, 3, 1, 'chatroom complete task in user!', '2021-05-02 12:47:37'),
(20, 1, 2, 'Thank You :)', '2021-05-02 12:51:00'),
(21, 2, 2, 'helo!', '2021-05-02 13:01:20'),
(25, 1, 1, 'yep ðŸ˜‚', '2021-05-03 11:29:03'),
(26, 3, 1, 'â¤â¤â¤', '2021-05-03 11:34:39'),
(27, 4, 2, 'Thank you purchase our course. We will guide you to complete the project by providing this channel open.', '2021-05-03 11:45:28'),
(28, 4, 3, 'Aww ðŸ˜Š', '2021-05-03 11:46:35'),
(29, 1, 1, 'Test Drive!', '2021-05-15 16:27:43'),
(31, 1, 2, 'Hello', '2021-05-15 16:43:47'),
(32, 1, 1, 'Hai are u there', '2021-05-15 16:44:02'),
(33, 1, 2, 'njan evida thanna ind kutty...', '2021-05-15 16:44:23'),
(34, 1, 1, 'prefect okay.....ðŸ˜‚ðŸ‘Œ', '2021-05-15 16:44:49'),
(35, 4, 2, 'Test Drive?', '2021-05-15 16:49:18'),
(36, 4, 3, 'Test data successfull...', '2021-05-15 16:49:57'),
(37, 2, 2, 'Hello mis', '2021-05-15 16:51:53'),
(38, 2, 4, 'Hai....', '2021-05-15 16:52:02'),
(39, 2, 4, 'Msg ippol ann kandath', '2021-05-15 16:52:23'),
(40, 2, 2, 'oh i see', '2021-05-15 16:52:54'),
(41, 2, 4, 'haaa', '2021-05-15 16:53:01'),
(42, 2, 4, 'https://www.youtube.com/watch?v=4xK9zY-3la8', '2021-05-15 16:54:15'),
(48, 7, 4, 'Thank you purchase our course. We will guide you to complete the project by providing this channel open.', '2023-09-13 17:52:50'),
(49, 7, 5, 'evo', '2023-09-13 17:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `ID` int(11) NOT NULL,
  `F_ID` int(11) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `AUTHOR` varchar(100) NOT NULL,
  `PACK_IMG` varchar(500) NOT NULL,
  `PACK_FILE` varchar(500) NOT NULL,
  `ACT_PRICE` int(11) NOT NULL,
  `DIS_PRICE` int(11) NOT NULL,
  `POST_CONT` mediumtext NOT NULL,
  `DOWNLOADS` int(11) NOT NULL,
  `LOGS` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`ID`, `F_ID`, `TITLE`, `CAT_ID`, `AUTHOR`, `PACK_IMG`, `PACK_FILE`, `ACT_PRICE`, `DIS_PRICE`, `POST_CONT`, `DOWNLOADS`, `LOGS`, `STATUS`) VALUES
(3, 2, 'Blood Bank Management System', 1, 'Sherwin M', 'pack_img/03232021073123Annotation_2021-03-23_111031.jpg', 'packages/600260283.zip', 6500, 4699, '<p>The proposed system is designed to help the blood bank administrator to meet the demand of the blood by sending/serving the blood request blood as and whwn required. The proposed system gives the procedural approach of how to bridge the gap between recipent, donor and blood banks. This application will be provide a common ground for all the three parties and will ensure the fulfilment of demand for blood requested by the recipient and blood bank.</p>\r\n<p>The proposed Blood Bank Management System is intended to avoid all the drawbacks of existing system.</p>\r\n<p><strong>Software Specification:</strong></p>\r\n<p>os : windows/linux<br />language: Html,css,js<br />server env: xamp<br />web server: Apache Sever<br />database: MySql</p>\r\n<p><br /><strong>Hardware Specification:</strong></p>\r\n<p>processor: Intel Pentium III or above<br />ram: 1024mb or above<br />hard disk: 20gb or above</p>', 2, '2021-03-23 12:01:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_order`
--

CREATE TABLE `tbl_package_order` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PACK_ID` int(11) NOT NULL,
  `CARD_HOLDER` varchar(50) NOT NULL,
  `CARD_NO` bigint(20) NOT NULL,
  `EXP_DATE` varchar(10) NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_package_order`
--

INSERT INTO `tbl_package_order` (`ID`, `USER_ID`, `PACK_ID`, `CARD_HOLDER`, `CARD_NO`, `EXP_DATE`, `LOGS`) VALUES
(26, 1, 3, 'Shine M', 1234567824683691, '04/25', '2021-04-28 11:13:50'),
(27, 3, 3, 'Salu A S', 1234567824683691, '05/24', '2021-04-28 15:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_public_comment`
--

CREATE TABLE `tbl_public_comment` (
  `ID` int(11) NOT NULL,
  `SENDER_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `COMMENT` varchar(500) NOT NULL,
  `DT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_public_comment`
--

INSERT INTO `tbl_public_comment` (`ID`, `SENDER_ID`, `COURSE_ID`, `COMMENT`, `DT`) VALUES
(1, 2, 5, 'Good package you should try it!', '2021-07-10 08:30:00'),
(2, 1, 5, 'hello', '2021-07-10 13:58:47'),
(3, 1, 5, 'Test drive', '2021-07-10 17:19:36'),
(4, 1, 15, 'Test drive\r\n', '2021-07-10 17:20:21'),
(5, 1, 6, 'ðŸ‘ŒðŸ˜Ž', '2021-07-10 17:23:03'),
(6, 5, 15, 'Good concept\r\n', '2023-09-13 17:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `ID` int(11) NOT NULL,
  `COMP_ID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PROFILE` varchar(500) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `DEPT` varchar(50) NOT NULL,
  `ABOUT` text NOT NULL,
  `USER_ID` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LOGS` datetime NOT NULL,
  `STATUS` int(11) NOT NULL,
  `ACCESS_CONTROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`ID`, `COMP_ID`, `NAME`, `PROFILE`, `EMAIL`, `DEPT`, `ABOUT`, `USER_ID`, `PASSWORD`, `LOGS`, `STATUS`, `ACCESS_CONTROL`) VALUES
(2, 1, 'Athulya Sunil', 'assets/profile/07132021144315face11.jpg', 'athulya123@gmail.com', 'Sr. Software Developer', '<p>I\'m Athulya, I\'m a developer with a passion for teaching. I\'m the <strong>lead instructor</strong> at the London App Brewery, London\'s leading <strong>Programming Bootcamp</strong>. I\'ve helped hundreds of thousands of students learn to code and change their lives by becoming a developer. I\'ve been invited by companies such as Twitter, Facebook and Google to teach their employees.</p><p>My first foray into programming was when I was just 12 years old, wanting to build my own Space Invader game. Since then, I\'ve made <strong>hundred of websites, apps and games</strong>. But most importantly, I realised that my <strong>greatest passion</strong> is teaching. </p><p>I spend most of my time researching how to make <strong>learning to code fun</strong> and make <strong>hard concepts easy to understand</strong>. I apply everything I discover into my bootcamp courses. In my courses, you\'ll find lots of geeky humour but also lots of <strong>explanations and animations</strong> to make sure everything is easy to understand. </p><p><strong>I\'ll be there for you every step of the way.</strong></p>', 'athulya123', '202cb962ac59075b964b07152d234b70', '2021-04-13 19:46:38', 1, 1),
(3, 1, 'Aparna Sunil', 'assets/profile/face20.jpg', 'aparna123@gmail.com', 'Jn. Software Developer & Web Developer', '<p>I\'m Aparna, I\'m a developer with a passion for teaching. I\'m the <strong>lead instructor</strong> at the London App Brewery, London\'s leading <strong>Programming Bootcamp</strong>. I\'ve helped hundreds of thousands of students learn to code and change their lives by becoming a developer. I\'ve been invited by companies such as Twitter, Facebook and Google to teach their employees.</p><p>My first foray into programming was when I was just 12 years old, wanting to build my own Space Invader game. Since then, I\'ve made <strong>hundred of websites, apps and games</strong>. But most importantly, I realised that my <strong>greatest passion</strong> is teaching. </p><p>I spend most of my time researching how to make <strong>learning to code fun</strong> and make <strong>hard concepts easy to understand</strong>. I apply everything I discover into my bootcamp courses. In my courses, you\'ll find lots of geeky humour but also lots of <strong>explanations and animations</strong> to make sure everything is easy to understand. </p><p><strong>I\'ll be there for you every step of the way.</strong></p>', 'aparna@123', '202cb962ac59075b964b07152d234b70', '2021-04-13 19:54:21', 1, 0),
(4, 1, 'Varsha G P', 'assets/profile/face6.jpg', 'varsha123@gmail.com', 'Sr. Software Developer & Web Developer', '<p>I\'m Varsha, I\'m a developer with a passion for teaching. I\'m the <strong>lead instructor</strong> at the London App Brewery, London\'s leading <strong>Programming Bootcamp</strong>. I\'ve helped hundreds of thousands of students learn to code and change their lives by becoming a developer. I\'ve been invited by companies such as Twitter, Facebook and Google to teach their employees.</p><p>My first foray into programming was when I was just 12 years old, wanting to build my own Space Invader game. Since then, I\'ve made <strong>hundred of websites, apps and games</strong>. But most importantly, I realised that my <strong>greatest passion</strong> is teaching. </p><p>I spend most of my time researching how to make <strong>learning to code fun</strong> and make <strong>hard concepts easy to understand</strong>. I apply everything I discover into my bootcamp courses. In my courses, you\'ll find lots of geeky humour but also lots of <strong>explanations and animations</strong> to make sure everything is easy to understand. </p><p><strong>I\'ll be there for you every step of the way.</strong></p>', 'varsha@123', '202cb962ac59075b964b07152d234b70', '2021-04-13 19:56:42', 1, 1),
(5, 1, 'Amal', 'assets/profile/09142023081336images.jpeg', '12@gmail.com', 'MCA', '<p>trrt</p>', 'amal12', '6512bd43d9caa6e02c990b0a82652dca', '2023-09-13 19:01:54', 1, 0),
(6, 1, 'Anaswara', 'assets/profile/09142023082454hellodep.jpg', 'an@gmail.com', 'Sn. Java Developer', 'Update please', 'anas12', '6512bd43d9caa6e02c990b0a82652dca', '2023-09-14 11:53:01', 1, 1),
(7, 2, 'Nafil', 'assets/profile/09142023102046images.jpeg', 'n@gmail.com', 'Sn. Node.js Developer', 'Update please', 'nafil12', '6512bd43d9caa6e02c990b0a82652dca', '2023-09-14 13:48:36', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `FULL_NAME` varchar(50) NOT NULL,
  `PROFILE` varchar(500) NOT NULL,
  `EMAIL` varchar(500) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `DOB` varchar(15) NOT NULL,
  `DEPT` varchar(100) NOT NULL,
  `PHONE` bigint(20) NOT NULL,
  `LOGS` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `FULL_NAME`, `PROFILE`, `EMAIL`, `PASSWORD`, `DOB`, `DEPT`, `PHONE`, `LOGS`, `STATUS`) VALUES
(1, 'Shine M', 'user/assets/profile/face16.jpg', 'shine123@gmail.com', '202cb962ac59075b964b07152d234b70', '2000-04-12', 'Bsc. Computer Science', 9874561230, '2021-04-19 08:00:00', 1),
(2, 'Archana Raj', 'user/assets/profile/face2.jpg', 'archana123@gmail.com', '202cb962ac59075b964b07152d234b70', '2000-04-06', 'BCA', 9874563220, '2021-04-28 10:15:00', 1),
(3, 'Salu A S', 'user/assets/profile/face10.jpg', 'salu123@gmail.com', '202cb962ac59075b964b07152d234b70', '2000-05-11', 'BCA', 9874564320, '2021-04-08 10:15:00', 1),
(4, 'Anjana Sunil', 'user/assets/profile/07112021151949face4.jpg', 'anju123@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-07-11', 'BCA', 9877566230, '2021-07-11 18:49:49', 1),
(5, 'Askar', 'user/assets/profile/09132023134041hellodep.jpg', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-02-04', 'MCA', 1235567890, '2023-09-13 17:10:41', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_access`
--
ALTER TABLE `tbl_access`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COMP_ID` (`COMP_ID`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `tbl_blog_comment`
--
ALTER TABLE `tbl_blog_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SENDER_ID` (`SENDER_ID`),
  ADD KEY `POST_ID` (`POST_ID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PACK_ID` (`PACK_ID`),
  ADD KEY `tbl_cart_ibfk_2` (`USER_ID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `tbl_chatroom`
--
ALTER TABLE `tbl_chatroom`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER_ONE` (`USER_ONE`),
  ADD KEY `USER_TWO` (`USER_TWO`);

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COMP_ID` (`COMP_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`);

--
-- Indexes for table `tbl_course_order`
--
ALTER TABLE `tbl_course_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COMPY_ID` (`COMPY_ID`),
  ADD KEY `COURSE_ID` (`COURSE_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `tbl_freelancer`
--
ALTER TABLE `tbl_freelancer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COMP_ID` (`COMP_ID`);

--
-- Indexes for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COMP_ID` (`COMP_ID`),
  ADD KEY `COURSE_ID` (`COURSE_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ROOM_ID` (`ROOM_ID`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `CAT_ID` (`CAT_ID`);

--
-- Indexes for table `tbl_package_order`
--
ALTER TABLE `tbl_package_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `PACK_ID` (`PACK_ID`);

--
-- Indexes for table `tbl_public_comment`
--
ALTER TABLE `tbl_public_comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SENDER_ID` (`SENDER_ID`),
  ADD KEY `COURSE_ID` (`COURSE_ID`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COMP_ID` (`COMP_ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access`
--
ALTER TABLE `tbl_access`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_blog_comment`
--
ALTER TABLE `tbl_blog_comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_chatroom`
--
ALTER TABLE `tbl_chatroom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_course_order`
--
ALTER TABLE `tbl_course_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_freelancer`
--
ALTER TABLE `tbl_freelancer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_package_order`
--
ALTER TABLE `tbl_package_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_public_comment`
--
ALTER TABLE `tbl_public_comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_access`
--
ALTER TABLE `tbl_access`
  ADD CONSTRAINT `tbl_access_ibfk_1` FOREIGN KEY (`COMP_ID`) REFERENCES `tbl_companies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `tbl_blog_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_blog_comment`
--
ALTER TABLE `tbl_blog_comment`
  ADD CONSTRAINT `tbl_blog_comment_ibfk_1` FOREIGN KEY (`SENDER_ID`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_blog_comment_ibfk_2` FOREIGN KEY (`POST_ID`) REFERENCES `tbl_blog` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`PACK_ID`) REFERENCES `tbl_course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_chatroom`
--
ALTER TABLE `tbl_chatroom`
  ADD CONSTRAINT `tbl_chatroom_ibfk_1` FOREIGN KEY (`USER_ONE`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_chatroom_ibfk_2` FOREIGN KEY (`USER_TWO`) REFERENCES `tbl_team` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `tbl_course_ibfk_1` FOREIGN KEY (`COMP_ID`) REFERENCES `tbl_companies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_course_ibfk_2` FOREIGN KEY (`EMP_ID`) REFERENCES `tbl_team` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_course_ibfk_3` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `tbl_category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_course_order`
--
ALTER TABLE `tbl_course_order`
  ADD CONSTRAINT `tbl_course_order_ibfk_1` FOREIGN KEY (`COMPY_ID`) REFERENCES `tbl_companies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_course_order_ibfk_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `tbl_course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_course_order_ibfk_3` FOREIGN KEY (`USER_ID`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD CONSTRAINT `tbl_gallery_ibfk_1` FOREIGN KEY (`COMP_ID`) REFERENCES `tbl_companies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD CONSTRAINT `tbl_lesson_ibfk_1` FOREIGN KEY (`COMP_ID`) REFERENCES `tbl_companies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lesson_ibfk_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `tbl_course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lesson_ibfk_3` FOREIGN KEY (`EMP_ID`) REFERENCES `tbl_team` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD CONSTRAINT `tbl_message_ibfk_1` FOREIGN KEY (`ROOM_ID`) REFERENCES `tbl_chatroom` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD CONSTRAINT `tbl_package_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `tbl_freelancer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_package_ibfk_2` FOREIGN KEY (`CAT_ID`) REFERENCES `tbl_category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_package_order`
--
ALTER TABLE `tbl_package_order`
  ADD CONSTRAINT `tbl_package_order_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_package_order_ibfk_2` FOREIGN KEY (`PACK_ID`) REFERENCES `tbl_package` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_public_comment`
--
ALTER TABLE `tbl_public_comment`
  ADD CONSTRAINT `tbl_public_comment_ibfk_1` FOREIGN KEY (`SENDER_ID`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_public_comment_ibfk_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `tbl_course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD CONSTRAINT `tbl_team_ibfk_1` FOREIGN KEY (`COMP_ID`) REFERENCES `tbl_companies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
