-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 10:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `el_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL,
  `ans` text COLLATE utf8_bin NOT NULL,
  `ques_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `ans`, `ques_id`) VALUES
(1, 'HighText Machine Language', 1),
(2, 'HyperText and links Markup Language', 1),
(3, 'HyperText Markup Language', 1),
(4, 'None of these', 1),
(5, 'class', 2),
(6, 'id', 2),
(7, 'type', 2),
(8, 'None of these', 2),
(9, 'b', 4),
(10, 'pre', 4),
(11, 'a', 4),
(12, 'br', 4),
(13, 'a format tag', 3),
(14, 'an empty tag', 3),
(15, 'All the above', 3),
(16, 'None of these', 3),
(17, 'ul', 5),
(18, 'ol', 5),
(19, 'li', 5),
(20, 'i', 5),
(21, 'function {function body}', 6),
(22, 'data type functionName(parameters) {function body}', 6),
(23, 'functionName(parameters) {function body}', 6),
(24, 'function functionName(parameters) {function body}', 6),
(25, 'Error', 7),
(26, '42', 7),
(27, '84', 7),
(28, '0', 7),
(29, 'Only i)', 8),
(30, 'Only ii)', 8),
(31, 'i) and ii)', 8),
(32, 'iii) and iv)', 8),
(33, 'iii) and iv)', 9),
(34, 'ii) and iii)', 9),
(35, 'Only i)', 9),
(36, 'ii), iii) and iv)', 9),
(37, 'animation-delay', 10),
(38, 'animation-name', 10),
(39, 'animation-iteration-count', 10),
(40, 'animation-duration', 10);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8_bin NOT NULL,
  `course_desc` text COLLATE utf8_bin NOT NULL,
  `course_author` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_img` text COLLATE utf8_bin NOT NULL,
  `course_duration` text COLLATE utf8_bin NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_original_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES
(29, 'Django', 'Learn how to build web applications and websites with Python and the Django framework. \r\nBasic Python and web development knowledge is all you need.', 'Louis', '../images/courseimg/django.jpg', '1 month', 1100, 1500),
(30, 'HTML', 'The easiest way to learn modern web design, HTML5 step-by-step from scratch. Design AND code a huge project.\r\nReal-world skills to build real-world websites: professional, beautiful and truly responsive websites.\r\n\r\n', 'Harvey', '../images/courseimg/html.jpg', '2 months', 1200, 2000),
(31, 'Javascript', ' The modern JavaScript course for everyone! Master JavaScript with projects, challenges and theory. Many courses in one!\r\nThis is the most complete JavaScript course on WEB-TECHIE. \r\n', 'Donna', '../images/courseimg/javascript.jpg', '12 weeks', 2000, 2700),
(32, 'NodeJS', 'This course was just completely refilmed to give you everything you need to master Node.js in 2021!\r\n\r\nThis includes new content, updated versions, new features, and more.', 'Jessica', '../images/courseimg/nodejs.png', '1 month', 1000, 1500),
(33, 'PHP', 'PHP for Beginners: learn everything you need to become a professional PHP developer with practical exercises & projects.\r\nThen this course will help you get all the fundamentals of Procedural PHP, Object Oriented PHP, MYSQLi. \r\n', 'Rachel', '../images/courseimg/php.png', '15 weeks', 1800, 2500),
(34, 'CSS', 'Learn CSS for the first time or brush up your CSS skills and dive in even deeper. EVERY web developer has to know CSS.', 'Mike', './images/courseimg/css.png', '3 months', 2100, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `respmsg` text COLLATE utf8_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(1, 'ORDS64341714', 'shashwatjha018@gmail.com', 30, 'TXN_SUCCESS', 'Txn Success', 1200, '2021-06-01'),
(2, 'ORDS63584008', 'needs@gmail.com', 34, 'TXN_SUCCESS', 'Txn Success', 2100, '2021-06-03'),
(3, 'ORDS2335672', 'yashrathi1998@gmail.com', 31, 'TXN_SUCCESS', 'Txn Success', 2000, '2021-12-03'),
(6, 'ORDS35263110', 'nidhirathi2312@gmail.com', 30, 'TXN_SUCCESS', 'Txn Success', 1200, '2021-06-15'),
(7, 'ORDS35263110', 'rahul@gmail.com', 29, 'TXN_SUCCESS', 'Txn Success', 1100, '2021-06-03'),
(8, 'ORDS35263110', 'pari234@gmail.com', 32, 'TXN_SUCCESS', 'Txn Success', 1000, '2021-05-03'),
(9, 'ORDS82795652', 'needs@gmail.com', 31, 'TXN_SUCCESS', 'Txn Success', 2000, '2021-06-03'),
(10, 'ORDS82795652', 'shashwatjha018@gmail.com', 31, 'TXN_SUCCESS', 'Txn Success', 2000, '2015-06-03'),
(11, 'ORDS70944788', 'needs@gmail.com', 30, 'TXN_SUCCESS', 'Txn Success', 1200, '2021-06-25'),
(12, 'ORDS77948803', 'nuts@gmail.com', 32, 'TXN_SUCCESS', 'Txn Success', 1000, '2021-06-04'),
(13, 'ORDS5889828', 'needs@gmail.com', 32, 'TXN_SUCCESS', 'Txn Success', 1000, '2021-03-01'),
(14, 'ORDS5283385', 'rahul@gmail.com', 30, 'TXN_SUCCESS', 'Txn Success', 1200, '2021-06-04'),
(15, 'ORDS39128229', 'yashrathi1998@gmail.com', 30, 'TXN_SUCCESS', 'Txn Success', 1200, '2021-06-30'),
(16, 'ORDS30152435', 'nidhirathi2312@gmail.com', 32, 'TXN_SUCCESS', 'Txn Success', 1000, '2021-11-04'),
(17, 'ORDS12336357', 'nidhirathi2312@gmail.com', 31, 'TXN_SUCCESS', 'Txn Success', 2000, '2021-06-04'),
(18, 'ORDS40818765', 'pari234@gmail.com', 33, 'TXN_SUCCESS', 'Txn Success', 1800, '2021-06-04'),
(19, 'ORDS22544874', 'pari234@gmail.com', 34, 'TXN_SUCCESS', 'Txn Success', 2100, '2021-02-11'),
(20, 'ORDS43692034', 'rahul@gmail.com', 31, 'TXN_SUCCESS', 'Txn Success', 2000, '2021-06-04'),
(21, 'ORDS75364078', 'nuts@gmail.com', 34, 'TXN_SUCCESS', 'Txn Success', 2100, '2021-06-04'),
(22, 'ORDS30513442', 'needs@gmail.com', 33, 'TXN_SUCCESS', 'Txn Success', 1800, '2021-06-04'),
(23, 'ORDS84369413', 'shashwatjha018@gmail.com', 32, 'TXN_SUCCESS', 'Txn Success', 1000, '2020-07-05'),
(26, 'ORDS71125614', 'needs@gmail.com', 29, 'TXN_SUCCESS', 'Txn Success', 1100, '2021-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text COLLATE utf8_bin NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(1, 'Great website , very user friendly !', 1),
(2, 'there are so much use cases that i can apply in my life. thanks so much for giving the web development know how into the lecture to help us in understanding the root course', 2),
(4, 'Excellent courses. I started it being a bit skeptical, just with the intention to go quickly through some video scripts. but I changed my mind. There is so much to learn here', 3),
(5, 'A must take for any person wanting to be a Web Developer :)', 4),
(6, 'It was logical well-structured and well researched.', 5),
(7, 'A very clear and easy to digest format. Tracy explains quite complex concepts in plain english and with excellent examples.', 6),
(8, 'Great Website ! Easy to use. Great UI design', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text COLLATE utf8_bin NOT NULL,
  `lesson_desc` text COLLATE utf8_bin NOT NULL,
  `lesson_link` text COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8_bin NOT NULL,
  `lesson_theory` text COLLATE utf8_bin NOT NULL,
  `lesson_notes` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`, `lesson_theory`, `lesson_notes`) VALUES
(6, 'Introduction to HTML', 'This lesson will teach into to html', '../lessonvid/bgvideo.mp4', 30, 'HTML', 'All HTML documents must start with a document type declaration: <!DOCTYPE html>.\r\n\r\nThe HTML document itself begins with <html> and ends with </html>.\r\n\r\nThe visible part of the HTML document is between <body> and </body>.Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged.\r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos dolorem iste consectetur dicta! Temporibus sapiente doloribus sint quisquam ea officia debitis a, molestias iure reprehenderit voluptas consectetur natus perspiciatis veritatis.', '../lessonnotes/html.pdf'),
(7, 'Installation and basics', 'This lesson will teach basics and installation', '../lessonvid/1.mp4', 30, 'HTML', 'A simple text editor is all you need to learn HTML        Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged.\r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos dolorem iste consectetur dicta! Temporibus sapiente doloribus sint quisquam ea officia debitis a, molestias iure reprehenderit voluptas consectetur natus perspiciatis veritatis.', '../lessonnotes/workbook.pdf'),
(8, 'HTML Elements Atrributes', 'This lesson will teach elements and attributes', '../lessonvid/2.mp4', 30, 'HTML', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged.\r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos dolorem iste consectetur dicta! Temporibus sapiente doloribus sint quisquam ea officia debitis a, molestias iure reprehenderit voluptas consectetur natus perspiciatis veritatis.', '../lessonnotes/htmlcheat.pdf'),
(9, 'HTML Table links', 'This lesson will teach html tables', '../lessonvid/bgvideo.mp4', 30, 'HTML', 'The <table> tag defines an HTML table.\r\n\r\nEach table row is defined with a <tr> tag. Each table header is defined with a <th> tag. Each table data/cell is defined with a <td> tag.\r\n\r\nBy default, the text in <th> elements are bold and centered.\r\n\r\nBy default, the text in <td> elements are regular and left-aligned.Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged.\r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nQuos dolorem iste consectetur dicta! Temporibus sapiente doloribus sint quisquam ea officia debitis a, \r\nmolestias iure reprehenderit voluptas consectetur natus perspiciatis veritatis.', '../lessonnotes/htmlcheat.pdf'),
(10, 'CSS Selectors', 'This lesson will teach CSS Selectors\r\n', '../lessonvid/1.mp4', 34, 'CSS', 'CSS Selectors\r\nCSS selectors are used to \"find\" (or select) the HTML elements you want to style.\r\n\r\nWe can divide CSS selectors into five categories:\r\n\r\nSimple selectors (select elements based on name, id, class)\r\nCombinator selectors (select elements based on a specific relationship between them)\r\nPseudo-class selectors (select elements based on a certain state)\r\nPseudo-elements selectors (select and style a part of an element)\r\nAttribute selectors (select elements based on an attribute or attribute value)\r\nThis page will explain the most basic CSS selectors.', '../lessonnotes/css.pdf'),
(11, 'CSS Animations', 'This will teach animations used in css', '../lessonvid/bgvideo.mp4', 34, 'CSS', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged.\r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nQuos dolorem iste consectetur dicta! Temporibus sapiente doloribus sint quisquam ea officia debitis a, \r\nmolestias iure reprehenderit voluptas consectetur natus perspiciatis veritatis.\r\n', '../lessonnotes/csscomplete.pdf'),
(12, 'What is Django ?', 'This lesson will teach basics of Django', '../lessonvid/2.mp4', 29, 'Django', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged.\r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nQuos dolorem iste consectetur dicta! Temporibus sapiente doloribus sint quisquam ea officia debitis a, \r\nmolestias iure reprehenderit voluptas consectetur natus perspiciatis veritatis.', '../lessonnotes/django.pdf'),
(13, 'PHP Intro / Install /Syntax', 'This will teach you essentials of php', '../lessonvid/3.mp4', 33, 'PHP', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged.\r\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\r\nwhen an unknown printer took a galley of type and scrambled it to make a type specimen\r\nbook. It has survived not only five centuries, but also the leap into electronic typesetting,\r\nremaining essentially unchanged Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nQuos dolorem iste consectetur dicta! Temporibus sapiente doloribus sint quisquam ea officia debitis a, \r\nmolestias iure reprehenderit voluptas consectetur natus perspiciatis veritatis.', '../lessonnotes/php.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` int(11) NOT NULL,
  `ques` text COLLATE utf8_bin NOT NULL,
  `ques_ans` text COLLATE utf8_bin NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `ques`, `ques_ans`, `q_id`) VALUES
(1, 'HTML stands for -', 'HyperText Markup Language', 1),
(2, 'Which of the following attribute is used to provide a unique name to an element?', 'id', 1),
(3, 'input is -', 'an empty tag', 1),
(4, 'Which of the following element is responsible for making the text bold in HTML?', 'b', 2),
(5, 'How to create an unordered list (a list with the list items in bullets) in HTML?', 'ul', 2),
(6, 'How to define a function in PHP?', 'function functionName(parameters) {function body}', 3),
(7, 'What will be the output of the following PHP code?\r\n    <?php\r\n    function calc($price, $tax=\"\")\r\n    {\r\n        $total = $price + ($price * $tax);\r\n        echo \"$total\"; \r\n    }\r\n    calc(42);	\r\n    ?>', '42', 3),
(8, 'Which of the following are valid function names?\r\ni) function()\r\nii) €()\r\niii) .function()\r\niv) $function(', 'Only ii)', 3),
(9, 'Which of the following are correct ways of creating an array?\r\ni) state[0] = \"karnataka\";\r\nii) $state[] = array(\"karnataka\");\r\niii) $state[0] = \"karnataka\";\r\niv)  $state = array(\"karnataka\");', 'iii) and iv)', 3),
(10, 'Which of the following property is used to define the animations that should be run?', 'animation-name', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `q_id` int(11) NOT NULL,
  `q_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `q_marks` int(11) NOT NULL,
  `q_duration` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`q_id`, `q_name`, `q_marks`, `q_duration`, `course_id`) VALUES
(1, 'Basics of HTML', 3, '2', 30),
(2, 'HTML Tags', 2, '1', 30),
(3, 'Arrays and Functions', 4, '10', 33),
(4, 'Complete CSS', 1, '1', 34);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `res_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `score` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `q_id`, `stu_email`, `score`, `total_marks`) VALUES
(1, 3, 'needs@gmail.com', 3, 12),
(2, 1, 'nidhirathi2312@gmail.com', 2, 6),
(3, 2, 'shashwatjha018@gmail.com', 2, 4),
(4, 4, 'pari@gmail.com', 0, 0),
(5, 2, '', 2, 4),
(6, 1, 'rahul@gmail.com', 3, 9),
(7, 4, 'needs@gmail.com', 1, 1),
(8, 1, 'nuts@gmail.com', 2, 6),
(9, 1, '', 0, 0),
(10, 1, 'needs@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_occ` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(1, 'Yash', 'yashrathi1998@gmail.com', '12345', 'Frontend Developer', './images/yash.jpg'),
(2, 'Nidhi', 'nidhirathi2312@gmail.com', '6789', 'Student', './images/stu/ni1.jpeg'),
(3, 'Virat Sharma', 'needs@gmail.com', '123456', 'Front End Stack Developer', './images/stu/yash.jpg'),
(4, 'Rahul', 'rahul@gmail.com', 'rahul', 'UX designer', './images/rahul.jpg'),
(5, 'Shashwat', 'shashwatjha018@gmail.com', 'thebest', 'Back End Developer', './images/stu/sj1.jpeg'),
(6, 'Natasha', 'nuts@gmail.com', 'nuts123', 'UI Designer', './images/natasha.jpg'),
(7, 'Paritosh', 'pari234@gmail.com', 'pari10', 'Developer', './images/pari.jpg'),
(8, 'User', 'user@gmail.com', 'abcde', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
